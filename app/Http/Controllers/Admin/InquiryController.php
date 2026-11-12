<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Inquiry;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class InquiryController extends Controller
{
    public function index(Request $request): View
    {
        $query = Inquiry::with('property')->latest();

        if ($request->filled('status') && $request->input('status') !== 'all') {
            $query->where('status', $request->input('status'));
        }

        if ($request->filled('type') && $request->input('type') !== 'all') {
            $query->where('inquiry_type', $request->input('type'));
        }

        $inquiries = $query->paginate(15)->withQueryString();

        return view('admin.inquiries.index', compact('inquiries'));
    }

    public function updateStatus(Request $request, int $id): RedirectResponse
    {
        $inquiry = Inquiry::findOrFail($id);

        $validated = $request->validate([
            'status' => 'required|in:new,contacted,closed',
            'admin_notes' => 'nullable|string|max:1000',
        ]);

        $inquiry->status = $validated['status'];
        if (isset($validated['admin_notes'])) {
            $inquiry->admin_notes = $validated['admin_notes'];
        }
        $inquiry->save();

        return back()->with('success', "Inquiry from {$inquiry->name} marked as {$inquiry->status}.");
    }

    public function destroy(int $id): RedirectResponse
    {
        $inquiry = Inquiry::findOrFail($id);
        $inquiry->delete();

        return back()->with('success', 'Inquiry deleted successfully.');
    }
}

