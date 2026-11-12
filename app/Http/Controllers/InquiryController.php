<?php

namespace App\Http\Controllers;

use App\Models\Inquiry;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class InquiryController extends Controller
{
    /**
     * Store a newly created inquiry.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'phone' => 'required|string|max:30',
            'message' => 'required|string|max:2000',
            'subject' => 'nullable|string|max:200',
            'inquiry_type' => 'nullable|string|in:general,quick_enquiry,schedule_visit,property_inquiry',
            'property_id' => 'nullable|exists:properties,id',
        ]);

        Inquiry::create([
            'property_id' => $validated['property_id'] ?? null,
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'subject' => $validated['subject'] ?? 'Website Inquiry',
            'message' => $validated['message'],
            'inquiry_type' => $validated['inquiry_type'] ?? 'general',
            'status' => 'new',
        ]);

        return back()->with('success', 'Thank you! Your inquiry has been sent successfully. Our property advisor will reach out to you shortly.');
    }
}
