<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Enquiry;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EnquiryController extends Controller
{
    public function index(): View
    {
        $enquiries = Enquiry::latest()->paginate(25);
        $newCount  = Enquiry::new()->count();

        return view('admin.enquiries.index', compact('enquiries', 'newCount'));
    }

    public function show(Enquiry $enquiry): View
    {
        // Auto-mark as read when first opened
        if ($enquiry->status === 'new') {
            $enquiry->update(['status' => 'read']);
        }

        return view('admin.enquiries.show', compact('enquiry'));
    }

    public function update(Request $request, Enquiry $enquiry): RedirectResponse
    {
        $request->validate([
            'status' => ['required', 'in:new,read,responded'],
        ]);

        $enquiry->update(['status' => $request->status]);

        return back()->with('success', 'Status updated.');
    }

    public function destroy(Enquiry $enquiry): RedirectResponse
    {
        $enquiry->delete();

        return redirect()->route('admin.enquiries.index')
            ->with('success', 'Enquiry deleted.');
    }
}
