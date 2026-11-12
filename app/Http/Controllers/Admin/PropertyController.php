<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Property;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PropertyController extends Controller
{
    public function index(Request $request): View
    {
        $query = Property::query();

        if ($request->filled('search')) {
            $s = $request->input('search');
            $query->where(function ($q) use ($s) {
                $q->where('title', 'like', "%{$s}%")
                  ->orWhere('city', 'like', "%{$s}%")
                  ->orWhere('location', 'like', "%{$s}%");
            });
        }

        if ($request->filled('type') && $request->input('type') !== 'all') {
            $query->where('property_type', $request->input('type'));
        }

        $properties = $query->latest()->paginate(10)->withQueryString();

        return view('admin.properties.index', compact('properties'));
    }

    public function create(): View
    {
        return view('admin.properties.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'tagline' => 'nullable|string|max:255',
            'description' => 'required|string',
            'property_type' => 'required|in:villa,apartment,plot,commercial,penthouse',
            'status' => 'required|in:for_sale,for_rent',
            'price' => 'required|numeric|min:0',
            'price_display' => 'required|string|max:100',
            'location' => 'required|string|max:255',
            'city' => 'required|string|max:100',
            'bedrooms' => 'nullable|integer|min:0',
            'bathrooms' => 'nullable|integer|min:0',
            'area_sqft' => 'required|integer|min:1',
            'parking_spaces' => 'nullable|integer|min:0',
            'is_featured' => 'nullable|boolean',
            'is_eco_friendly' => 'nullable|boolean',
            'main_image_file' => 'nullable|image|max:8192',
            'main_image_url' => 'nullable|string|max:500',
            'amenities_raw' => 'nullable|string',
            'contact_phone' => 'nullable|string|max:50',
            'contact_email' => 'nullable|email|max:100',
        ]);

        $mainImage = 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=1200&q=80';

        if ($request->hasFile('main_image_file')) {
            $mainImage = $request->file('main_image_file')->store('properties', 'public');
        } elseif (!empty($validated['main_image_url'])) {
            $mainImage = $validated['main_image_url'];
        }

        $amenities = [];
        if (!empty($validated['amenities_raw'])) {
            $amenities = array_values(array_filter(array_map('trim', explode(',', $validated['amenities_raw']))));
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
            'is_featured' => $request->boolean('is_featured'),
            'is_eco_friendly' => $request->boolean('is_eco_friendly'),
            'is_approved' => true,
            'main_image' => $mainImage,
            'amenities' => $amenities,
            'contact_phone' => $validated['contact_phone'] ?? '+91 98765 43210',
            'contact_email' => $validated['contact_email'] ?? 'sales@aghomesindia.com',
        ]);

        return redirect()->route('admin.properties.index')
            ->with('success', "Property '{$property->title}' has been created successfully!");
    }

    public function edit(int $id): View
    {
        $property = Property::findOrFail($id);

        return view('admin.properties.edit', compact('property'));
    }

    public function update(Request $request, int $id): RedirectResponse
    {
        $property = Property::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'tagline' => 'nullable|string|max:255',
            'description' => 'required|string',
            'property_type' => 'required|in:villa,apartment,plot,commercial,penthouse',
            'status' => 'required|in:for_sale,for_rent',
            'price' => 'required|numeric|min:0',
            'price_display' => 'required|string|max:100',
            'location' => 'required|string|max:255',
            'city' => 'required|string|max:100',
            'bedrooms' => 'nullable|integer|min:0',
            'bathrooms' => 'nullable|integer|min:0',
            'area_sqft' => 'required|integer|min:1',
            'parking_spaces' => 'nullable|integer|min:0',
            'is_featured' => 'nullable|boolean',
            'is_eco_friendly' => 'nullable|boolean',
            'main_image_file' => 'nullable|image|max:8192',
            'main_image_url' => 'nullable|string|max:500',
            'amenities_raw' => 'nullable|string',
            'contact_phone' => 'nullable|string|max:50',
            'contact_email' => 'nullable|email|max:100',
        ]);

        if ($request->hasFile('main_image_file')) {
            if ($property->main_image && Storage::disk('public')->exists($property->main_image)) {
                Storage::disk('public')->delete($property->main_image);
            }
            $property->main_image = $request->file('main_image_file')->store('properties', 'public');
        } elseif (!empty($validated['main_image_url'])) {
            $property->main_image = $validated['main_image_url'];
        }

        if (isset($validated['amenities_raw'])) {
            $property->amenities = array_values(array_filter(array_map('trim', explode(',', $validated['amenities_raw']))));
        }

        $property->title = $validated['title'];
        $property->tagline = $validated['tagline'] ?? null;
        $property->description = $validated['description'];
        $property->property_type = $validated['property_type'];
        $property->status = $validated['status'];
        $property->price = $validated['price'];
        $property->price_display = $validated['price_display'];
        $property->location = $validated['location'];
        $property->city = $validated['city'];
        $property->bedrooms = $validated['bedrooms'] ?? null;
        $property->bathrooms = $validated['bathrooms'] ?? null;
        $property->area_sqft = $validated['area_sqft'];
        $property->parking_spaces = $validated['parking_spaces'] ?? 1;
        $property->is_featured = $request->boolean('is_featured');
        $property->is_eco_friendly = $request->boolean('is_eco_friendly');
        $property->contact_phone = $validated['contact_phone'] ?? $property->contact_phone;
        $property->contact_email = $validated['contact_email'] ?? $property->contact_email;
        $property->save();

        return redirect()->route('admin.properties.index')
            ->with('success', "Property '{$property->title}' updated successfully!");
    }

    public function destroy(int $id): RedirectResponse
    {
        $property = Property::findOrFail($id);
        $title = $property->title;
        $property->delete();

        return redirect()->route('admin.properties.index')
            ->with('success', "Property '{$title}' was deleted successfully.");
    }

    public function toggleFeatured(int $id): RedirectResponse
    {
        $property = Property::findOrFail($id);
        $property->is_featured = !$property->is_featured;
        $property->save();

        $status = $property->is_featured ? 'marked as Featured' : 'removed from Featured';
        return back()->with('success', "Property '{$property->title}' has been {$status}.");
    }
}

