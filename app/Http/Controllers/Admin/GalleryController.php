<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GalleryItem;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index(): View
    {
        $items = GalleryItem::orderBy('sort_order')->latest()->paginate(15);

        return view('admin.gallery.index', compact('items'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|in:all,exterior,interior,villas,eco_homes,plots',
            'location' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image_file' => 'nullable|image|max:8192',
            'image_url' => 'nullable|string|max:500',
            'is_featured' => 'nullable|boolean',
        ]);

        $imagePath = 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=1200&q=80';

        if ($request->hasFile('image_file')) {
            $imagePath = $request->file('image_file')->store('gallery', 'public');
        } elseif (!empty($validated['image_url'])) {
            $imagePath = $validated['image_url'];
        }

        GalleryItem::create([
            'title' => $validated['title'],
            'category' => $validated['category'],
            'location' => $validated['location'] ?? null,
            'description' => $validated['description'] ?? null,
            'image_path' => $imagePath,
            'is_featured' => $request->boolean('is_featured'),
            'sort_order' => GalleryItem::count() + 1,
        ]);

        return back()->with('success', 'New gallery photo added successfully!');
    }

    public function destroy(int $id): RedirectResponse
    {
        $item = GalleryItem::findOrFail($id);
        if ($item->image_path && Storage::disk('public')->exists($item->image_path)) {
            Storage::disk('public')->delete($item->image_path);
        }
        $item->delete();

        return back()->with('success', 'Gallery item deleted successfully.');
    }
}
