<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PropertySubmissionController extends Controller
{
    /**
     * Show the property submission form.
     */
    public function create(): View
    {
        return view('properties.post');
    }

    /**
     * Handle submission of a new property.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'tagline' => 'nullable|string|max:255',
            'description' => 'required|string',
            'property_type' => 'required|in:villa,apartment,plot,commercial,penthouse',
            'status' => 'required|in:for_sale,for_rent',
            'price' => 'required|numeric|min:1',
            'price_display' => 'required|string|max:100',
            'location' => 'required|string|max:255',
            'city' => 'required|string|max:100',
            'bedrooms' => 'nullable|integer|min:0',
            'bathrooms' => 'nullable|integer|min:0',
            'area_sqft' => 'required|integer|min:10',
            'parking_spaces' => 'nullable|integer|min:0',
            'is_eco_friendly' => 'nullable|boolean',
            'contact_phone' => 'required|string|max:50',
            'contact_email' => 'required|email|max:100',
            'main_image' => 'nullable|image|max:8192',
            'image_url' => 'nullable|url|max:500',
            'amenities' => 'nullable|array',
        ]);

        $mainImagePath = 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=1200&q=80';

        if ($request->hasFile('main_image')) {
            $mainImagePath = $request->file('main_image')->store('properties', 'public');
        } elseif (!empty($validated['image_url'])) {
            $mainImagePath = $validated['image_url'];
        }

        $property = Property::create([
            'user_id' => Auth::id(),
            'title' => $validated['title'],
            'slug' => Str::slug($validated['title']) . '-' . Str::random(5),
            'tagline' => $validated['tagline'] ?? null,
            'description' => $validated['description'],
            'property_type' => $validated['property_type'],
            'status' => $validated['status'],
            'price' => $validated['price'],
            'price_display' => $validated['price_display'],
            'location' => $validated['location'],
            'city' => $validated['city'],
            'state' => 'India',
            'bedrooms' => $validated['bedrooms'] ?? null,
            'bathrooms' => $validated['bathrooms'] ?? null,
            'area_sqft' => $validated['area_sqft'],
            'parking_spaces' => $validated['parking_spaces'] ?? 1,
            'is_eco_friendly' => $request->boolean('is_eco_friendly'),
            'is_featured' => false,
            'is_approved' => true,
            'main_image' => $mainImagePath,
            'amenities' => $validated['amenities'] ?? [],
            'contact_phone' => $validated['contact_phone'],
            'contact_email' => $validated['contact_email'],
        ]);

        return redirect()->route('properties.show', $property->slug)
            ->with('success', 'Your property has been listed successfully! Thank you for choosing AG Homes.');
    }
}
