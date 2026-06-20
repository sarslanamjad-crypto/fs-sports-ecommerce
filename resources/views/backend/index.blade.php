@extends('backend.layouts.main')
@section('title', 'Dashboard — FS Sports')
@section('main-container')
<style>
/* ── Dashboard-specific styles ── */
.kpi-card{border-radius:16px;border:none;overflow:hidden;position:relative;transition:transform .2s,box-shadow .2s}
.kpi-card:hover{transform:translateY(-4px);box-shadow:0 20px 25px -5px rgba(0,0,0,.1),0 10px 10px -5px rgba(0,0,0,.04)!important}
.kpi-card .card-body{padding:1rem!important}
.kpi-icon{width:46px;height:46px;border-radius:10px;display:flex;align-items:center;justify-content:center;font-size:1.1rem}
.kpi-label{font-size:.7rem;font-weight:700;text-transform:uppercase;letter-spacing:.08em;color:#94a3b8}
.kpi-value{font-size:1.35rem;font-weight:800;color:#1e293b;margin:2px 0;white-space:nowrap;overflow:hidden;text-overflow:ellipsis}
.kpi-sub{font-size:.75rem;font-weight:600}
.chart-card{border-radius:16px;border:none}
.chart-card .card-header{background:#fff;border-bottom:1px solid #e2e8f0;border-radius:16px 16px 0 0!important;padding:1rem 1.25rem}
.chart-card .card-header h6{font-size:.85rem;font-weight:700;color:#334155;margin:0}
.chart-card .card-header h6 i{color:#6366f1;margin-right:6px}
.chart-area-wrap{position:relative;height:320px}
.chart-pie-wrap{position:relative;height:280px}
.chart-bar-wrap{position:relative;height:280px}
.legend-dot{display:inline-block;width:10px;height:10px;border-radius:50%;margin-right:5px}
.legend-item{display:inline-flex;align-items:center;margin-right:14px;font-size:.78rem;color:#64748b;font-weight:600}
.stat-mini{border-radius:12px;border:none;transition:transform .15s}.stat-mini:hover{transform:translateY(-2px)}
.stat-mini .stat-icon{width:42px;height:42px;border-radius:10px;display:flex;align-items:center;justify-content:center}
.pulse-dot{width:8px;height:8px;border-radius:50%;display:inline-block;margin-right:6px;animation:pulse-anim 2s infinite}
@keyframes pulse-anim{0%,100%{opacity:1}50%{opacity:.4}}
/* Loading skeleton */
.skel{background:linear-gradient(90deg,#e2e8f0 25%,#f1f5f9 50%,#e2e8f0 75%);background-size:200% 100%;animation:shimmer 1.5s infinite;border-radius:6px;height:28px;width:80px;display:inline-block}
@keyframes shimmer{0%{background-position:200% 0}100%{background-position:-200% 0}}
/* Chart loading overlay */
.chart-loading{position:relative;pointer-events:none}
.chart-loading::after{content:'';position:absolute;inset:0;background:rgba(255,255,255,.7);border-radius:16px;z-index:5;animation:shimmer 1.5s infinite;background:linear-gradient(90deg,rgba(255,255,255,.5) 25%,rgba(241,245,249,.8) 50%,rgba(255,255,255,.5) 75%);background-size:200% 100%}
.chart-loading canvas{filter:blur(2px);transition:filter .2s}
/* Range dropdown */
.range-bar{display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:8px}
.range-bar .badge-range{padding:6px 16px;border-radius:8px;font-size:.78rem;font-weight:700;cursor:pointer;border:1.5px solid #e2e8f0;background:#fff;color:#64748b;transition:all .2s}
.range-bar .badge-range:hover{border-color:#6366f1;color:#6366f1}
.range-bar .badge-range.active{background:#6366f1;color:#fff;border-color:#6366f1;box-shadow:0 4px 6px -1px rgba(99,102,241,.3)}
.custom-date-input:focus {
    background: #1e293b !important;
    color: #f8fafc !important;
    border-color: #ea580c !important;
    box-shadow: 0 0 0 0.2rem rgba(249, 115, 22, 0.25) !important;
}
.fade-in{animation:fadeIn .4s ease}
@keyframes fadeIn{from{opacity:0;transform:translateY(6px)}to{opacity:1;transform:translateY(0)}}
/* Tailwind Grid Polyfill for Bootstrap Dashboard */
.grid { display: grid !important; }
.grid-cols-2 { grid-template-columns: repeat(2, minmax(0, 1fr)) !important; }
.grid-cols-3 { grid-template-columns: repeat(3, minmax(0, 1fr)) !important; }
.grid-rows-2 { grid-template-rows: repeat(2, minmax(0, 1fr)) !important; }
.gap-4 { gap: 1rem !important; }
.h-full { height: 100% !important; }
.items-center { align-items: center !important; }
.w-full { width: 100% !important; }
.bg-slate-900 { background-color: #0f172a !important; }
.border-slate-800 { border-color: #1e293b !important; }
.text-slate-400 { color: #94a3b8 !important; }
.w-64 { width: 16rem !important; }
.z-50 { z-index: 50 !important; }
.stock-tooltip {
    position: absolute;
    right: 0;
    margin-top: 0.5rem;
    padding: 0.75rem;
    width: 16rem;
    background-color: #0f172a;
    border: 1px solid #1e293b;
    font-size: 0.75rem;
    border-radius: 0.5rem;
    box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.15), 0 10px 10px -5px rgba(0, 0, 0, 0.05);
    z-index: 50;
    color: #ffffff;
    text-align: left;
    line-height: 1.4;
}
.stock-tooltip-item {
    display: flex;
    align-items: flex-start;
    gap: 8px;
    margin-top: 8px;
}
</style>

<div class="container-fluid py-3">

    {{-- ── Date Range Filter Bar ── --}}
    <div class="range-bar mb-3" id="rangeBar">
        <div>
            <h5 class="mb-0 font-weight-bold" style="color:#1e293b"><i class="fas fa-tachometer-alt mr-2" style="color:#6366f1"></i>Dashboard</h5>
            <small class="text-muted" id="rangeLabelText">Showing: Last 30 Days</small>
        </div>
        <div class="d-flex align-items-center flex-wrap gap-2">
            <!-- Custom Date Inputs -->
            <div class="d-inline-flex align-items-center mr-2" style="gap: 6px;">
                <span class="text-muted mr-1" style="font-size: 0.78rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em;">Custom:</span>
                <input type="date" id="start_date" name="start_date" class="form-control form-control-sm custom-date-input" style="background: #1e293b; color: #f8fafc; border: 1.5px solid #f97316; border-radius: 8px; font-weight: 700; width: 135px; padding: 3px 8px; height: auto;">
                <span class="text-muted" style="font-size: 0.78rem; font-weight: 700; text-transform: uppercase;">to</span>
                <input type="date" id="end_date" name="end_date" class="form-control form-control-sm custom-date-input" style="background: #1e293b; color: #f8fafc; border: 1.5px solid #f97316; border-radius: 8px; font-weight: 700; width: 135px; padding: 3px 8px; height: auto;">
            </div>
            
            <span class="badge-range" data-range="7d">7 Days</span>
            <span class="badge-range active" data-range="30d">30 Days</span>
            <span class="badge-range" data-range="90d">90 Days</span>
            <span class="badge-range" data-range="this_month">This Month</span>
            <span class="badge-range" data-range="this_year">This Year</span>
        </div>
    </div>

    {{-- ── ROW 1 — Primary KPI Cards with % Change ── --}}
    <div class="row mb-2">
        {{-- Revenue --}}
        <div class="col-xl-3 col-md-6 mb-3">
            <a href="{{ route('admin.finance-report.index') }}" class="text-decoration-none" style="display: block; color: inherit;">
                <div class="card kpi-card shadow h-100" style="cursor: pointer;">
                    <div class="card-body d-flex align-items-center">
                        <div class="kpi-icon mr-3" style="background:rgba(16,185,129,.12);color:#10b981"><i class="fas fa-coins"></i></div>
                        <div class="flex-grow-1">
                            <div class="kpi-label">Total Revenue</div>
                            <div class="kpi-value" id="kpi-total-revenue"><span class="skel"></span></div>
                            <div class="kpi-sub" id="kpi-revenue-change"><span class="skel" style="width:120px;height:14px"></span></div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        {{-- Orders --}}
        <div class="col-xl-3 col-md-6 mb-3">
            <a href="{{ route('admin.orders-transaction.index') }}" class="text-decoration-none" style="display: block; color: inherit;">
                <div class="card kpi-card shadow h-100" style="cursor: pointer;">
                    <div class="card-body d-flex align-items-center">
                        <div class="kpi-icon mr-3" style="background:rgba(99,102,241,.12);color:#6366f1"><i class="fas fa-shopping-bag"></i></div>
                        <div class="flex-grow-1">
                            <div class="kpi-label">Total Orders</div>
                            <div class="kpi-value" id="kpi-total-orders"><span class="skel"></span></div>
                            <div class="kpi-sub" id="kpi-orders-change"><span class="skel" style="width:120px;height:14px"></span></div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        {{-- Status Sidebar Card --}}
        <div class="col-xl-3 col-md-6 mb-3">
            <div class="card kpi-card shadow h-100">
                <div class="card-body p-2 d-flex flex-column h-100">
                    <div class="px-2 pt-1 pb-1">
                        <span style="font-size: 0.7rem; font-weight: 800; text-transform: uppercase; letter-spacing: 0.08em; color: #64748b;">Order Status</span>
                    </div>
                    <div class="grid grid-cols-3 gap-1.5 flex-grow-1 items-center">
                        <!-- Left: Pending Orders -->
                        <a href="{{ route('admin.orders-transaction.index', ['status' => 'pending']) }}" class="text-decoration-none" style="display: block; color: inherit; height: 100%;">
                            <div class="d-flex flex-column align-items-center justify-content-center p-1.5 rounded h-100" style="background:rgba(245,158,11,0.03); border: 1px solid rgba(245,158,11,0.08); min-width: 0; cursor: pointer; transition: all 0.2s;" onmouseover="this.style.background='rgba(245,158,11,0.08)'; this.style.transform='translateY(-2px)';" onmouseout="this.style.background='rgba(245,158,11,0.03)'; this.style.transform='none';">
                                <div class="kpi-icon flex-shrink-0 mb-1" style="background:rgba(245,158,11,.12);color:#f59e0b;width:26px;height:26px;font-size:0.65rem; border-radius: 6px; display: flex; align-items: center; justify-content: center;"><i class="fas fa-clock"></i></div>
                                <div class="font-weight-bold text-center" style="font-size: 0.6rem; color: #475569; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.2;">Pending</div>
                                <div class="font-weight-bold mt-0.5" style="font-size:0.95rem;color:#1e293b; line-height: 1;" id="kpi-pending-orders"><span class="skel" style="height:12px;width:12px"></span></div>
                            </div>
                        </a>

                        <!-- Middle: Confirmed Orders -->
                        <a href="{{ route('admin.orders-transaction.index', ['status' => 'confirmed']) }}" class="text-decoration-none" style="display: block; color: inherit; height: 100%;">
                            <div class="d-flex flex-column align-items-center justify-content-center p-1.5 rounded h-100" style="background:rgba(99,102,241,0.03); border: 1px solid rgba(99,102,241,0.08); min-width: 0; cursor: pointer; transition: all 0.2s;" onmouseover="this.style.background='rgba(99,102,241,0.08)'; this.style.transform='translateY(-2px)';" onmouseout="this.style.background='rgba(99,102,241,0.03)'; this.style.transform='none';">
                                <div class="kpi-icon flex-shrink-0 mb-1" style="background:rgba(99,102,241,.12);color:#6366f1;width:26px;height:26px;font-size:0.65rem; border-radius: 6px; display: flex; align-items: center; justify-content: center;"><i class="fas fa-check-circle"></i></div>
                                <div class="font-weight-bold text-center" style="font-size: 0.6rem; color: #475569; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.2;">Confirm</div>
                                <div class="font-weight-bold mt-0.5" style="font-size:0.95rem;color:#1e293b; line-height: 1;" id="kpi-confirmed-orders"><span class="skel" style="height:12px;width:12px"></span></div>
                            </div>
                        </a>

                        <!-- Right: Delivered Orders -->
                        <a href="{{ route('admin.orders-transaction.index', ['status' => 'delivered']) }}" class="text-decoration-none" style="display: block; color: inherit; height: 100%;">
                            <div class="d-flex flex-column align-items-center justify-content-center p-1.5 rounded h-100" style="background:rgba(16,185,129,0.03); border: 1px solid rgba(16,185,129,0.08); min-width: 0; cursor: pointer; transition: all 0.2s;" onmouseover="this.style.background='rgba(16,185,129,0.08)'; this.style.transform='translateY(-2px)';" onmouseout="this.style.background='rgba(16,185,129,0.03)'; this.style.transform='none';">
                                <div class="kpi-icon flex-shrink-0 mb-1" style="background:rgba(16,185,129,.12);color:#10b981;width:26px;height:26px;font-size:0.65rem; border-radius: 6px; display: flex; align-items: center; justify-content: center;"><i class="fas fa-shipping-fast"></i></div>
                                <div class="font-weight-bold text-center" style="font-size: 0.6rem; color: #475569; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.2;">Deliver</div>
                                <div class="font-weight-bold mt-0.5" style="font-size:0.95rem;color:#1e293b; line-height: 1;" id="kpi-delivered-orders"><span class="skel" style="height:12px;width:12px"></span></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        {{-- Product Restock Alert --}}
        <div class="col-xl-3 col-md-6 mb-3">
            <a href="{{ route('admin.products-inventory.index', ['filter' => 'low_stock']) }}" class="text-decoration-none" style="display: block; color: inherit;">
                <div class="card kpi-card shadow h-100" style="cursor: pointer;">
                    <div class="card-body d-flex align-items-center">
                        <div class="kpi-icon mr-3" style="background:rgba(239,68,68,.12);color:#ef4444"><i class="fas fa-exclamation-triangle"></i></div>
                        <div class="flex-grow-1">
                            <div class="kpi-label">Product restock alert</div>
                            <div class="kpi-value" id="kpi-low-stock"><span class="skel"></span></div>
                            <div class="kpi-sub" style="color: #ef4444; font-weight: 700;">Low Stock Items</div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>


    {{-- ── ROW 2 — Secondary Mini-Stat Cards ── --}}
    <div class="row mb-2">
        @php $miniStats = [
            ['icon'=>'fas fa-box','bg'=>'rgba(6,182,212,.12)','clr'=>'#06b6d4','label'=>'Products','val'=>$TotalProducts, 'url'=>route('admin.products-inventory.index')],
            ['icon'=>'fas fa-users','bg'=>'rgba(99,102,241,.12)','clr'=>'#6366f1','label'=>'Customers','val'=>$TotalCustomers, 'url'=>route('admin.customer.index')],
            ['icon'=>'fas fa-user-tie','bg'=>'rgba(100,116,139,.12)','clr'=>'#64748b','label'=>'Team','val'=>$TotalTeam, 'url'=>route('team.show')],
            ['icon'=>'fas fa-envelope-open-text','bg'=>'rgba(16,185,129,.12)','clr'=>'#10b981','label'=>'Joinings','val'=>$whatsappJoiningsCount, 'url'=>route('admin.newsletter-subscriber.index')],
        ]; @endphp
        @foreach($miniStats as $ms)
        <div class="col-xl-3 col-md-6 mb-3">
            <a href="{{ $ms['url'] }}" class="text-decoration-none" style="display: block; color: inherit;">
                <div class="card stat-mini shadow-sm h-100" style="cursor: pointer;">
                    <div class="card-body d-flex align-items-center py-3">
                        <div class="stat-icon mr-3" style="background:{{$ms['bg']}};color:{{$ms['clr']}}"><i class="{{$ms['icon']}}"></i></div>
                        <div>
                            <div style="font-size:.7rem;font-weight:700;text-transform:uppercase;letter-spacing:.06em;color:#94a3b8">{{$ms['label']}}</div>
                            <div style="font-size:1.25rem;font-weight:800;color:#1e293b">{{$ms['val']}}</div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>

    {{-- ── ROW 3 — Revenue Trend (wide) + Finance Trend (narrow) ── --}}
    <div class="row mb-2">
        <div class="col-xl-8 col-lg-7 mb-3">
            <div class="card chart-card shadow">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h6><i class="fas fa-chart-area"></i> Revenue Trend — Last 30 Days</h6>
                    <span class="badge badge-light text-muted" style="font-size:.72rem" id="revBadge"></span>
                </div>
                <div class="card-body"><div class="chart-area-wrap"><canvas id="chartRevenueTrend"></canvas></div></div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-5 mb-3">
            <div class="card chart-card shadow h-100">
                <div class="card-header"><h6><i class="fas fa-coins"></i> Finance: Cash vs Debit (30 Days)</h6></div>
                <div class="card-body"><div class="chart-bar-wrap"><canvas id="chartFinanceTrend"></canvas></div></div>
            </div>
        </div>
    </div>

    {{-- ── ROW 4 — Low Stock (wide) + Payment Methods (narrow) ── --}}
    <div class="row mb-2">
        <div class="col-xl-8 col-lg-7 mb-3">
            <div class="card chart-card shadow h-100">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h6><i class="fas fa-boxes"></i> Top 5 Low-Stock Products</h6>
                    <div class="position-relative" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                        <span class="badge d-inline-flex align-items-center" style="background:rgba(99,102,241,.12);color:#6366f1;font-size:.72rem;padding: 4px 8px; border-radius: 6px; cursor: pointer;">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mr-1" style="width:0.85rem; height:0.85rem; display: inline-block; vertical-align: text-top;">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.852l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
                            </svg>
                            Stock Thresholds
                        </span>
                        <div x-show="open" 
                             x-transition:enter="transition ease-out duration-150"
                             x-transition:enter-start="opacity-0 transform scale-95"
                             x-transition:enter-end="opacity-100 transform scale-100"
                             x-transition:leave="transition ease-in duration-100"
                             x-transition:leave-start="opacity-100 transform scale-100"
                             x-transition:leave-end="opacity-0 transform scale-95"
                             class="absolute right-0 mt-2 p-3 w-64 bg-slate-900 border border-slate-800 text-xs rounded-lg shadow-xl z-50 text-white stock-tooltip"
                             style="display: none;">
                            <div class="font-weight-bold mb-2 pb-1" style="border-bottom: 1px solid #334155; color: #f8fafc;">Stock Thresholds</div>
                            <div class="stock-tooltip-item">
                                <span style="font-size: 0.95rem; line-height: 1;">🔴</span>
                                <div>
                                    <div class="font-weight-bold" style="color: #ef4444;">Red Indicator (&lt; 5 items)</div>
                                    <div class="text-slate-400" style="font-size: 0.7rem; margin-top: 1px;">Critical stock alert. High risk of stock-out.</div>
                                </div>
                            </div>
                            <div class="stock-tooltip-item">
                                <span style="font-size: 0.95rem; line-height: 1;">🟠</span>
                                <div>
                                    <div class="font-weight-bold" style="color: #f59e0b;">Orange Indicator (5 - 15 items)</div>
                                    <div class="text-slate-400" style="font-size: 0.7rem; margin-top: 1px;">Low stock threshold. Restock recommended soon.</div>
                                </div>
                            </div>
                            <div class="stock-tooltip-item">
                                <span style="font-size: 0.95rem; line-height: 1;">🟢</span>
                                <div>
                                    <div class="font-weight-bold" style="color: #10b981;">Green Indicator (&gt; 15 items)</div>
                                    <div class="text-slate-400" style="font-size: 0.7rem; margin-top: 1px;">Satisfactory inventory level.</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body"><div class="chart-bar-wrap"><canvas id="chartLowStock"></canvas></div></div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-5 mb-3">
            <div class="card chart-card shadow h-100">
                <div class="card-header"><h6><i class="fas fa-credit-card"></i> Payment Methods</h6></div>
                <div class="card-body d-flex flex-column justify-content-center">
                    <div class="chart-pie-wrap"><canvas id="chartPaymentMethods"></canvas></div>
                    <div class="text-center mt-3" id="paymentMethodsLegend"></div>
                </div>
            </div>
        </div>
    </div>

    {{-- ── ROW 5 — Quick Overview (full width) ── --}}
    <div class="row mb-2">
        <div class="col-12 mb-3">
            <div class="card chart-card shadow h-100">
                <div class="card-header"><h6><i class="fas fa-tachometer-alt"></i> Quick Overview</h6></div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm mb-0" style="border-collapse:separate;border-spacing:0 6px">
                            <thead><tr>
                                <th style="border:0;padding:.5rem 1rem">Metric</th><th style="border:0" class="text-center">Count</th>
                                <th style="border:0;padding:.5rem 1rem">Metric</th><th style="border:0" class="text-center">Count</th>
                                <th style="border:0;padding:.5rem 1rem">Metric</th><th style="border:0" class="text-center">Count</th>
                            </tr></thead>
                            <tbody>
                                <tr style="background:#f8fafc;border-radius:8px">
                                    <td style="border:0;border-radius:8px 0 0 8px;padding:.75rem 1rem"><i class="fas fa-user-shield mr-2" style="color:#ef4444"></i>Admins</td>
                                    <td style="border:0;font-weight:800" class="text-center">{{ $TotalAdmins }}</td>
                                    <td style="border:0;padding:.75rem 1rem"><i class="fas fa-project-diagram mr-2" style="color:#6366f1"></i>Projects</td>
                                    <td style="border:0;font-weight:800" class="text-center">{{ $TotalProjects }}</td>
                                    <td style="border:0;border-radius:0 8px 8px 0;padding:.75rem 1rem"><i class="fas fa-question-circle mr-2" style="color:#10b981"></i>FAQs</td>
                                    <td style="border:0;font-weight:800" class="text-center">{{ $TotalFAQs }}</td>
                                </tr>
                                <tr>
                                    <td style="border:0;padding:.75rem 1rem"><i class="fas fa-truck mr-2" style="color:#fb923c"></i>Suppliers</td>
                                    <td style="border:0;font-weight:800" class="text-center">{{ $TotalSuppliers }}</td>
                                    <td style="border:0;padding:.75rem 1rem"><i class="fas fa-store mr-2" style="color:#06b6d4"></i>Branches</td>
                                    <td style="border:0;font-weight:800" class="text-center">{{ $TotalBranches }}</td>
                                    <td style="border:0;padding:.75rem 1rem"><i class="fas fa-industry mr-2" style="color:#64748b"></i>Manufacturers</td>
                                    <td style="border:0;font-weight:800" class="text-center">{{ $TotalManufacturers }}</td>
                                </tr>
                                <tr style="background:#f8fafc;border-radius:8px">
                                    <td style="border:0;border-radius:8px 0 0 8px;padding:.75rem 1rem"><i class="fas fa-users mr-2" style="color:#8b5cf6"></i>Customers</td>
                                    <td style="border:0;font-weight:800" class="text-center">{{ $TotalCustomers }}</td>
                                    <td style="border:0;padding:.75rem 1rem"><i class="fas fa-box mr-2" style="color:#ec4899"></i>Products</td>
                                    <td style="border:0;font-weight:800" class="text-center">{{ $TotalProducts }}</td>
                                    <td style="border:0;border-radius:0 8px 8px 0;padding:.75rem 1rem"><i class="fas fa-shopping-bag mr-2" style="color:#10b981"></i>Orders</td>
                                    <td style="border:0;font-weight:800" class="text-center">{{ $TotalOrders }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function(){

    var P = {
        indigo:'#6366f1',emerald:'#10b981',amber:'#f59e0b',
        red:'#ef4444',cyan:'#06b6d4',slate:'#64748b',
        gridLine:'rgba(148,163,184,.12)',font:'#64748b'
    };
    Chart.defaults.global.defaultFontFamily="'Nunito',-apple-system,sans-serif";
    Chart.defaults.global.defaultFontColor=P.font;
    Chart.defaults.global.defaultFontSize=12;

    function currency(n){return 'Rs '+Number(n).toLocaleString('en-PK',{minimumFractionDigits:2});}

    /* ── Custom tooltip ── */
    function customTooltip(tm){
        var el=document.getElementById('chartjs-tooltip');
        if(!el){el=document.createElement('div');el.id='chartjs-tooltip';el.style.cssText='background:#1e293b;color:#f8fafc;border-radius:10px;padding:10px 14px;font-size:12px;pointer-events:none;position:absolute;transition:all .15s ease;box-shadow:0 10px 15px -3px rgba(0,0,0,.2);z-index:9999';document.body.appendChild(el);}
        if(tm.opacity===0){el.style.opacity=0;return;}
        el.style.opacity=1;
        if(tm.body){var lines=tm.body.map(function(b){return b.lines;}),titles=tm.title||[],h='<div style="font-weight:700;margin-bottom:4px;color:#94a3b8;font-size:11px">'+titles.join('')+'</div>';lines.forEach(function(l){h+='<div>'+l+'</div>';});el.innerHTML=h;}
        var pos=this._chart.canvas.getBoundingClientRect();
        el.style.left=pos.left+window.pageXOffset+tm.caretX+'px';
        el.style.top=pos.top+window.pageYOffset+tm.caretY-10+'px';
    }

    /* ── Chart instance storage ── */
    var charts={revenue:null,finance:null,lowStock:null,payment:null};
    var currentRange='30d';
    var _lastData=null;

    /* ── Skeleton helpers ── */
    var chartCards=document.querySelectorAll('.chart-card');
    function showLoading(){chartCards.forEach(function(c){c.classList.add('chart-loading');});}
    function hideLoading(){chartCards.forEach(function(c){c.classList.remove('chart-loading');});}
    function skelVal(id){var e=document.getElementById(id);if(e)e.innerHTML='<span class="skel" style="width:90px;height:24px"></span>';}

    /* ═══════════════════════════════════════════════════
       MAIN: loadDashboard(range)
       ═══════════════════════════════════════════════════ */
    function loadDashboard(range, startDate, endDate){
        showLoading();
        skelVal('kpi-total-revenue');skelVal('kpi-total-orders');skelVal('kpi-total-customers');skelVal('kpi-pending-orders');skelVal('kpi-confirmed-orders');skelVal('kpi-delivered-orders');skelVal('kpi-low-stock');

        var url = "{{ route('admin.dashboard-stats') }}";
        if (startDate && endDate) {
            url += "?start_date=" + startDate + "&end_date=" + endDate;
            currentRange = null;
        } else {
            currentRange = range || '30d';
            url += "?range=" + currentRange;
        }

        fetch(url)
        .then(function(r){return r.json();})
        .then(function(data){
            _lastData=data;
            document.getElementById('rangeLabelText').textContent='Showing: '+(data.range_label||currentRange);

            // Dynamically update date inputs
            document.getElementById('start_date').value = data.start_date;
            document.getElementById('end_date').value = data.end_date;

            // Dynamically update chart card headers
            var revTitle = document.querySelector('.chart-card h6 i.fa-chart-area');
            if (revTitle && revTitle.parentNode) {
                revTitle.parentNode.innerHTML = '<i class="fas fa-chart-area"></i> Revenue Trend — ' + data.range_label;
            }
            var finTitle = document.querySelector('.chart-card h6 i.fa-coins');
            if (finTitle && finTitle.parentNode) {
                finTitle.parentNode.innerHTML = '<i class="fas fa-coins"></i> Finance: Cash vs Debit (' + data.range_label + ')';
            }

            /* ── KPI Cards with % change indicators ── */
            var s=data.summary;
            setKpi('kpi-total-revenue',currency(s.total_revenue));
            setKpi('kpi-total-orders',s.total_orders);
            setKpi('kpi-total-customers',s.total_customers);
            setKpi('kpi-pending-orders',s.pending_orders);
            setKpi('kpi-confirmed-orders',s.confirmed_orders);
            setKpi('kpi-delivered-orders',s.delivered_orders);
            setKpi('kpi-low-stock',s.low_stock_count);

            // % change badges
            pctBadge('kpi-revenue-change', s.revenue_change_pct, 'vs last month');
            pctBadge('kpi-orders-change', s.orders_change_pct, s.orders_today+' today • vs last month');
            pctBadge('kpi-customers-change', s.customers_change_pct, s.customers_this_month+' new this month');

            var badge=document.getElementById('revBadge');
            if(badge)badge.textContent=data.range_label+': '+currency(s.total_revenue);

            /* ── 1. Revenue Trend ── */
            if(charts.revenue){
                charts.revenue.data.labels=data.revenue_trend.labels;
                charts.revenue.data.datasets[0].data=data.revenue_trend.revenue;
                charts.revenue.options.tooltips.callbacks.label=function(item){return currency(item.yLabel)+'  •  '+data.revenue_trend.order_counts[item.index]+' orders';};
                charts.revenue.update();
            } else {
                var ctxR=document.getElementById('chartRevenueTrend').getContext('2d');
                var grad=ctxR.createLinearGradient(0,0,0,320);grad.addColorStop(0,'rgba(99,102,241,0.25)');grad.addColorStop(1,'rgba(99,102,241,0.01)');
                charts.revenue=new Chart(ctxR,{type:'line',data:{labels:data.revenue_trend.labels,datasets:[{label:'Revenue',data:data.revenue_trend.revenue,backgroundColor:grad,borderColor:P.indigo,pointBackgroundColor:P.indigo,pointBorderColor:'#fff',pointBorderWidth:2,pointRadius:3,pointHoverRadius:6,pointHoverBackgroundColor:'#fff',pointHoverBorderColor:P.indigo,pointHoverBorderWidth:3,borderWidth:2.5,fill:true,lineTension:.35}]},options:{maintainAspectRatio:false,scales:{xAxes:[{gridLines:{display:false,drawBorder:false},ticks:{maxTicksLimit:8,padding:10}}],yAxes:[{gridLines:{color:P.gridLine,drawBorder:false},ticks:{beginAtZero:true,padding:10,callback:function(v){return currency(v);}}}]},legend:{display:false},tooltips:{enabled:false,custom:customTooltip,callbacks:{label:function(item){return currency(item.yLabel)+'  •  '+data.revenue_trend.order_counts[item.index]+' orders';}}}}});
            }

            /* ── 2. Finance Trend ── */
            var finance = data.finance || data.finance_trend;
            if(charts.finance){
                charts.finance.data.labels=finance.labels;
                charts.finance.data.datasets[0].data=finance.cash;
                charts.finance.data.datasets[1].data=finance.debit;
                charts.finance.update();
            } else {
                charts.finance=new Chart(document.getElementById('chartFinanceTrend'),{type:'bar',data:{labels:finance.labels,datasets:[{label:'Cash',data:finance.cash,backgroundColor:P.emerald,hoverBackgroundColor:'#059669',stack:'s',barPercentage:.6},{label:'Debit',data:finance.debit,backgroundColor:P.indigo,hoverBackgroundColor:'#4f46e5',stack:'s',barPercentage:.6}]},options:{maintainAspectRatio:false,scales:{xAxes:[{stacked:true,gridLines:{display:false,drawBorder:false},ticks:{maxTicksLimit:8,padding:8}}],yAxes:[{stacked:true,gridLines:{color:P.gridLine,drawBorder:false},ticks:{beginAtZero:true,padding:10,callback:function(v){return currency(v);}}}]},tooltips:{enabled:false,custom:customTooltip,callbacks:{label:function(item){return item.dataset.label+': '+currency(item.yLabel);}}}}});
            }

            /* ── 3. Low Stock ── */
            var sc=data.low_stock_products.stock.map(function(v){return v<=5?P.red:(v<=15?P.amber:P.emerald);});
            if(charts.lowStock){
                charts.lowStock.data.labels=data.low_stock_products.labels;
                charts.lowStock.data.datasets[0].data=data.low_stock_products.stock;
                charts.lowStock.data.datasets[0].backgroundColor=sc;
                charts.lowStock.update();
            } else {
                charts.lowStock=new Chart(document.getElementById('chartLowStock'),{type:'horizontalBar',data:{labels:data.low_stock_products.labels,datasets:[{label:'Stock',data:data.low_stock_products.stock,backgroundColor:sc,borderWidth:0,barPercentage:.55}]},options:{maintainAspectRatio:false,scales:{xAxes:[{gridLines:{color:P.gridLine,drawBorder:false},ticks:{beginAtZero:true,stepSize:1,padding:8}}],yAxes:[{gridLines:{display:false,drawBorder:false},ticks:{padding:8}}]},legend:{display:false},tooltips:{enabled:false,custom:customTooltip,callbacks:{label:function(item){return 'Stock: '+item.xLabel+'  •  Price: '+currency(data.low_stock_products.prices[item.index]);}}}}});
            }

            /* ── 4. Payment Methods ── */
            if(charts.payment){
                charts.payment.data.labels=data.payment_methods.labels;
                charts.payment.data.datasets[0].data=data.payment_methods.data;
                charts.payment.data.datasets[0].backgroundColor=data.payment_methods.colors;
                charts.payment.update();
            } else {
                charts.payment=new Chart(document.getElementById('chartPaymentMethods'),{type:'pie',data:{labels:data.payment_methods.labels,datasets:[{data:data.payment_methods.data,backgroundColor:data.payment_methods.colors,borderColor:'#fff',borderWidth:3,hoverBorderWidth:4}]},options:{maintainAspectRatio:false,legend:{display:false},tooltips:{enabled:false,custom:customTooltip,callbacks:{label:function(t,d){return d.labels[t.index]+': '+d.datasets[0].data[t.index]+' transactions';}}},animation:{animateScale:true}}});
            }
            var pm='';data.payment_methods.labels.forEach(function(l,i){pm+='<span class="legend-item"><span class="legend-dot" style="background:'+data.payment_methods.colors[i]+'"></span>'+l+'</span>';});
            document.getElementById('paymentMethodsLegend').innerHTML=pm;

            hideLoading();
        })
        .catch(function(err){console.error('Dashboard error:',err);hideLoading();});
    }

    function setKpi(id,val){var e=document.getElementById(id);if(e){e.textContent=val;e.classList.add('fade-in');setTimeout(function(){e.classList.remove('fade-in');},500);}}

    function pctBadge(id,pct,label){
        var e=document.getElementById(id);if(!e)return;
        var color=pct>0?'#10b981':(pct<0?'#ef4444':'#94a3b8');
        var icon=pct>0?'fa-arrow-up':(pct<0?'fa-arrow-down':'fa-minus');
        var bg=pct>0?'rgba(16,185,129,.1)':(pct<0?'rgba(239,68,68,.1)':'rgba(148,163,184,.1)');
        e.innerHTML='<span style="display:inline-flex;align-items:center;gap:4px;padding:2px 8px;border-radius:6px;background:'+bg+';color:'+color+';font-weight:700;font-size:.72rem"><i class="fas '+icon+'" style="font-size:.6rem"></i>'+Math.abs(pct)+'%</span> <span class="text-muted" style="font-size:.72rem">'+label+'</span>';
        e.classList.add('fade-in');setTimeout(function(){e.classList.remove('fade-in');},500);
    }

    /* ── Custom date event listeners ── */
    var startInput = document.getElementById('start_date');
    var endInput = document.getElementById('end_date');

    function handleCustomDateChange() {
        var startVal = startInput.value;
        var endVal = endInput.value;
        if (startVal && endVal) {
            document.querySelectorAll('.badge-range').forEach(function(b){b.classList.remove('active');});
            loadDashboard(null, startVal, endVal);
        }
    }

    startInput.addEventListener('change', handleCustomDateChange);
    endInput.addEventListener('change', handleCustomDateChange);

    /* ── Range bar click handler ── */
    document.getElementById('rangeBar').addEventListener('click',function(e){
        var btn=e.target.closest('.badge-range');
        if(!btn)return;
        document.querySelectorAll('.badge-range').forEach(function(b){b.classList.remove('active');});
        btn.classList.add('active');
        loadDashboard(btn.dataset.range);
    });

    /* ── Initial load ── */
    loadDashboard('30d');
});
</script>
@endpush
@endsection

