<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\NewsletterSubscriber;
use Illuminate\Http\Request;

class NewsletterSubscriberController extends Controller
{
    public function index()
    {
        $items = NewsletterSubscriber::all();
        return view('backend.newsletter-subscriber.index', compact('items'));
    }

    public function create()
    {
        return view('backend.newsletter-subscriber.create');
    }

    public function store(Request $request)
    {
        NewsletterSubscriber::create($request->all());
        return redirect()->route('admin.newsletter-subscriber.index')->with('success', 'Created successfully.');
    }

    public function show($id)
    {
        // view details
    }

    public function edit($id)
    {
        $item = NewsletterSubscriber::findOrFail($id);
        return view('backend.newsletter-subscriber.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = NewsletterSubscriber::findOrFail($id);
        $item->update($request->all());
        return redirect()->route('admin.newsletter-subscriber.index')->with('success', 'Updated successfully.');
    }

    public function destroy($id)
    {
        NewsletterSubscriber::destroy($id);
        return redirect()->route('admin.newsletter-subscriber.index')->with('success', 'Deleted successfully.');
    }
}
