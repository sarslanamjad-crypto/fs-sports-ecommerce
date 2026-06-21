<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\OrdersTransaction;
use App\Models\FinanceReport;
use App\Models\ProductsInventory;
use App\Models\Customer;
use App\Models\PaymentTransaction;
use App\Models\NewsletterSubscriber;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardStatsController extends Controller
{
    /**
     * Return all dashboard chart data as a single JSON response.
     * Accepts ?range= query param: 7d, 30d (default), 90d, this_month, this_year
     */
    public function index(Request $request)
    {
        $startDate = $request->query('start_date');
        $endDate = $request->query('end_date');

        if ($startDate && $endDate) {
            $start = Carbon::parse($startDate)->startOfDay();
            $end = Carbon::parse($endDate)->endOfDay();
            $days = $start->diffInDays($end) + 1;
            
            $range = [
                'start' => $start,
                'end'   => $end,
                'days'  => $days,
                'label' => $start->format('M d, Y') . ' - ' . $end->format('M d, Y')
            ];
        } else {
            $range = $this->resolveRange($request->query('range', '30d'));
        }

        return response()->json([
            'range_label'          => $range['label'],
            'start_date'           => $range['start']->format('Y-m-d'),
            'end_date'             => $range['end']->format('Y-m-d'),
            'revenue_trend'        => $this->revenueTrend($range),
            'order_status'         => $this->orderStatusDistribution($range),
            'low_stock_products'   => $this->lowStockProducts(),
            'finance_trend'        => $this->financeReportTrend($range),
            'finance'              => $this->financeReportTrend($range),
            'payment_methods'      => $this->paymentMethodBreakdown($range),
            'summary'              => $this->summaryCards($range),
        ]);
    }

    /* ------------------------------------------------------------------ */
    /*  Resolve date range from query string                               */
    /* ------------------------------------------------------------------ */
    private function resolveRange(string $key): array
    {
        $now = Carbon::now();

        switch ($key) {
            case '7d':
                return ['start' => $now->copy()->subDays(6)->startOfDay(), 'end' => $now->copy()->endOfDay(), 'days' => 7,   'label' => 'Last 7 Days'];
            case '90d':
                return ['start' => $now->copy()->subDays(89)->startOfDay(), 'end' => $now->copy()->endOfDay(), 'days' => 90,  'label' => 'Last 90 Days'];
            case 'this_month':
                $start = $now->copy()->startOfMonth();
                $days  = $now->diffInDays($start) + 1;
                return ['start' => $start, 'end' => $now->copy()->endOfDay(), 'days' => $days, 'label' => 'This Month'];
            case 'this_year':
                $start = $now->copy()->startOfYear();
                $days  = $now->diffInDays($start) + 1;
                return ['start' => $start, 'end' => $now->copy()->endOfDay(), 'days' => $days, 'label' => 'This Year'];
            default: // 30d
                return ['start' => $now->copy()->subDays(29)->startOfDay(), 'end' => $now->copy()->endOfDay(), 'days' => 30,  'label' => 'Last 30 Days'];
        }
    }

    /* ------------------------------------------------------------------ */
    /*  1. Revenue Trend (Line / Area chart)                               */
    /* ------------------------------------------------------------------ */
    private function revenueTrend(array $range): array
    {
        $revenue = OrdersTransaction::select(
                DB::raw("DATE(created_at) as date"),
                DB::raw("SUM(total_amount) as total"),
                DB::raw("COUNT(*) as order_count")
            )
            ->whereIn('order_status', ['confirmed', 'delivered'])
            ->whereBetween('created_at', [$range['start'], $range['end']])
            ->groupBy(DB::raw("DATE(created_at)"))
            ->orderBy('date', 'asc')
            ->get()
            ->keyBy('date');

        $labels = [];
        $data   = [];
        $counts = [];
        $fmt    = $range['days'] > 60 ? 'M d' : 'M d'; // could use 'M Y' for yearly

        for ($i = $range['days'] - 1; $i >= 0; $i--) {
            $date     = $range['end']->copy()->subDays($i)->format('Y-m-d');
            $labels[] = Carbon::parse($date)->format($fmt);
            $data[]   = isset($revenue[$date]) ? round((float) $revenue[$date]->total, 2) : 0;
            $counts[] = isset($revenue[$date]) ? (int) $revenue[$date]->order_count : 0;
        }

        return ['labels' => $labels, 'revenue' => $data, 'order_counts' => $counts];
    }

    /* ------------------------------------------------------------------ */
    /*  2. Order Status Distribution (Doughnut)                            */
    /* ------------------------------------------------------------------ */
    private function orderStatusDistribution(array $range): array
    {
        $statuses = OrdersTransaction::select('order_status', DB::raw('COUNT(*) as total'))
            ->whereBetween('created_at', [$range['start'], $range['end']])
            ->groupBy('order_status')
            ->get();

        $labels = []; $data = [];
        $colors = [
            'Pending'    => '#f59e0b',
            'Completed'  => '#10b981',
            'Cancelled'  => '#ef4444',
            'Processing' => '#6366f1',
            'Shipped'    => '#06b6d4',
        ];
        $bgColors = [];

        foreach ($statuses as $row) {
            $status    = ucfirst($row->order_status ?? 'Unknown');
            $labels[]  = $status;
            $data[]    = (int) $row->total;
            $bgColors[] = $colors[$status] ?? '#858796';
        }

        return ['labels' => $labels, 'data' => $data, 'colors' => $bgColors];
    }

    /* ------------------------------------------------------------------ */
    /*  3. Low Stock Products (unchanged by date)                          */
    /* ------------------------------------------------------------------ */
    private function lowStockProducts(): array
    {
        $products = ProductsInventory::select('id', 'title', 'current_stock', 'price')
            ->where('is_activated', true)
            ->orderBy('current_stock', 'asc')
            ->limit(5)
            ->get();

        $labels = []; $data = []; $prices = [];
        foreach ($products as $p) {
            $labels[] = $p->title;
            $data[]   = (int) $p->current_stock;
            $prices[] = round((float) $p->price, 2);
        }
        return ['labels' => $labels, 'stock' => $data, 'prices' => $prices];
    }

    /* ------------------------------------------------------------------ */
    /*  4. Finance Report Trend (Stacked Bar)                              */
    /* ------------------------------------------------------------------ */
    private function financeReportTrend(array $range): array
    {
        $payments = DB::table('orders_transactions')
            ->join('payment_transactions', 'orders_transactions.id', '=', 'payment_transactions.order_id')
            ->select(
                DB::raw('DATE(orders_transactions.created_at) as date'),
                'payment_transactions.payment_method',
                DB::raw('SUM(orders_transactions.total_amount) as total')
            )
            ->whereIn('orders_transactions.order_status', ['confirmed', 'delivered'])
            ->whereBetween('orders_transactions.created_at', [$range['start'], $range['end']])
            ->groupBy(DB::raw('DATE(orders_transactions.created_at)'), 'payment_transactions.payment_method')
            ->get();

        $grouped = [];
        foreach ($payments as $p) {
            $date = $p->date;
            if (!isset($grouped[$date])) {
                $grouped[$date] = ['cash' => 0.0, 'debit' => 0.0, 'total' => 0.0];
            }
            $method = strtoupper($p->payment_method ?? '');
            $isCash = in_array($method, ['CASH', 'COD']);
            if ($isCash) {
                $grouped[$date]['cash'] += (float) $p->total;
            } else {
                $grouped[$date]['debit'] += (float) $p->total;
            }
            $grouped[$date]['total'] += (float) $p->total;
        }

        $labels = []; $cash = []; $debit = []; $totals = [];
        for ($i = $range['days'] - 1; $i >= 0; $i--) {
            $dateStr  = $range['end']->copy()->subDays($i)->format('Y-m-d');
            $labels[] = Carbon::parse($dateStr)->format('M d');
            $cash[]   = isset($grouped[$dateStr]) ? round($grouped[$dateStr]['cash'], 2)   : 0.0;
            $debit[]  = isset($grouped[$dateStr]) ? round($grouped[$dateStr]['debit'], 2)  : 0.0;
            $totals[] = isset($grouped[$dateStr]) ? round($grouped[$dateStr]['total'], 2)  : 0.0;
        }

        return [
            'labels'      => $labels,
            'cash'        => $cash,
            'debit'       => $debit,
            'cashTotals'  => $cash,
            'debitTotals' => $debit,
            'totals'      => $totals
        ];
    }

    /* ------------------------------------------------------------------ */
    /*  5. Payment Method Breakdown (Pie)                                  */
    /* ------------------------------------------------------------------ */
    private function paymentMethodBreakdown(array $range): array
    {
        $methods = PaymentTransaction::select('payment_method', DB::raw('COUNT(*) as total'))
            ->whereBetween('created_at', [$range['start'], $range['end']])
            ->groupBy('payment_method')
            ->get();

        $labels = []; $data = [];
        $colors = [
            'Cash'          => '#10b981',
            'Debit Card'    => '#6366f1',
            'Credit Card'   => '#06b6d4',
            'Online'        => '#f59e0b',
            'Bank Transfer' => '#64748b',
        ];
        $bgColors = [];
        foreach ($methods as $row) {
            $method     = ucwords($row->payment_method ?? 'Unknown');
            $labels[]   = $method;
            $data[]     = (int) $row->total;
            $bgColors[] = $colors[$method] ?? '#' . substr(md5($method), 0, 6);
        }
        return ['labels' => $labels, 'data' => $data, 'colors' => $bgColors];
    }

    /* ------------------------------------------------------------------ */
    /*  6. Summary KPI Cards                                               */
    /* ------------------------------------------------------------------ */
    private function summaryCards(array $range): array
    {
        $today        = Carbon::today();
        $thisMonth    = Carbon::now()->startOfMonth();
        $lastMonth    = Carbon::now()->subMonth()->startOfMonth();
        $lastMonthEnd = Carbon::now()->subMonth()->endOfMonth();

        // Revenue comparison
        $revenueThisMonth = OrdersTransaction::whereIn('order_status', ['confirmed', 'delivered'])
            ->where('created_at', '>=', $thisMonth)
            ->sum('total_amount');
        $revenueLastMonth = OrdersTransaction::whereIn('order_status', ['confirmed', 'delivered'])
            ->whereBetween('created_at', [$lastMonth, $lastMonthEnd])
            ->sum('total_amount');
        $revenueChange    = $this->pctChange($revenueThisMonth, $revenueLastMonth);

        // Orders comparison
        $ordersThisMonth = OrdersTransaction::where('created_at', '>=', $thisMonth)->count();
        $ordersLastMonth = OrdersTransaction::whereBetween('created_at', [$lastMonth, $lastMonthEnd])->count();
        $ordersChange    = $this->pctChange($ordersThisMonth, $ordersLastMonth);

        // Customers comparison
        $customersThisMonth = Customer::where('created_at', '>=', $thisMonth)->count();
        $customersLastMonth = Customer::whereBetween('created_at', [$lastMonth, $lastMonthEnd])->count();
        $customersChange    = $this->pctChange($customersThisMonth, $customersLastMonth);

        // Range-specific
        $rangeRevenue = OrdersTransaction::whereIn('order_status', ['confirmed', 'delivered'])
            ->whereBetween('created_at', [$range['start'], $range['end']])
            ->sum('total_amount');
        $rangeOrders  = OrdersTransaction::whereBetween('created_at', [$range['start'], $range['end']])->count();

        return [
            'total_revenue'         => round((float) $rangeRevenue, 2),
            'revenue_this_month'    => round((float) $revenueThisMonth, 2),
            'revenue_last_month'    => round((float) $revenueLastMonth, 2),
            'revenue_change_pct'    => $revenueChange,

            'total_orders'          => $rangeOrders,
            'orders_today'          => OrdersTransaction::whereDate('created_at', $today)->count(),
            'orders_this_month'     => $ordersThisMonth,
            'orders_change_pct'     => $ordersChange,

            'pending_orders'        => OrdersTransaction::where('order_status', 'pending')
                                             ->whereBetween('created_at', [$range['start'], $range['end']])->count(),
            'confirmed_orders'      => OrdersTransaction::where('order_status', 'confirmed')
                                             ->whereBetween('created_at', [$range['start'], $range['end']])->count(),
            'delivered_orders'      => OrdersTransaction::where('order_status', 'delivered')
                                             ->whereBetween('created_at', [$range['start'], $range['end']])->count(),

            'total_products'        => ProductsInventory::count(),
            'low_stock_count'       => ProductsInventory::where('current_stock', '<=', 10)
                                             ->where('is_activated', true)->count(),

            'total_customers'       => Customer::count(),
            'customers_this_month'  => $customersThisMonth,
            'customers_change_pct'  => $customersChange,

            'newsletter_subs'       => NewsletterSubscriber::count(),
            'contact_messages'      => Contact::count(),
        ];
    }

    /** Calculate percentage change between current and previous period */
    private function pctChange($current, $previous): float
    {
        if ($previous > 0) {
            return round((($current - $previous) / $previous) * 100, 1);
        }
        return $current > 0 ? 100.0 : 0.0;
    }
}
