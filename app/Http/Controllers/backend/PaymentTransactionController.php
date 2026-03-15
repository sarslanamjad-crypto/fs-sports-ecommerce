<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\PaymentTransaction;
use Illuminate\Http\Request;

class PaymentTransactionController extends Controller
{
    public function index()
    {
        $items = PaymentTransaction::all();
        return view('backend.payment-transaction.index', compact('items'));
    }

    public function create()
    {
        return view('backend.payment-transaction.create');
    }

    public function store(Request $request)
    {
        PaymentTransaction::create($request->all());
        return redirect()->route('admin.payment-transaction.index')->with('success', 'Created successfully.');
    }

    public function show($id)
    {
        // view details
    }

    public function edit($id)
    {
        $item = PaymentTransaction::findOrFail($id);
        return view('backend.payment-transaction.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = PaymentTransaction::findOrFail($id);
        $item->update($request->all());
        return redirect()->route('admin.payment-transaction.index')->with('success', 'Updated successfully.');
    }

    public function destroy($id)
    {
        PaymentTransaction::destroy($id);
        return redirect()->route('admin.payment-transaction.index')->with('success', 'Deleted successfully.');
    }
}
