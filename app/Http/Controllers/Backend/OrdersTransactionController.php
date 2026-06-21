<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\OrdersTransaction;
use Illuminate\Http\Request;

class OrdersTransactionController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->query('status');
        $query = OrdersTransaction::query();
        if ($status && in_array($status, ['pending', 'confirmed', 'delivered'])) {
            $query->where('order_status', $status);
        } else {
            $status = null;
        }
        if ($request->filled('search')) {
            $query->where('user_id', 'LIKE', '%' . $request->search . '%');
        }
        $items = $query->get();
        return view('backend.orders-transaction.index', compact('items', 'status'));
    }

    public function create()
    {
        return view('backend.orders-transaction.create');
    }

    public function store(Request $request)
    {
        OrdersTransaction::create($request->all());
        return redirect()->route('admin.orders-transaction.index')->with('success', 'Created successfully.');
    }

    public function show($id)
    {
        // view details
    }

    public function edit($id)
    {
        $item = OrdersTransaction::findOrFail($id);
        return view('backend.orders-transaction.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = OrdersTransaction::findOrFail($id);
        $item->update($request->all());
        return redirect()->route('admin.orders-transaction.index')->with('success', 'Updated successfully.');
    }

    public function destroy($id)
    {
        OrdersTransaction::destroy($id);
        return redirect()->route('admin.orders-transaction.index')->with('success', 'Deleted successfully.');
    }
}
