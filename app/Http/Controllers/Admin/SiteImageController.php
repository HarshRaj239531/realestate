<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteImage;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class SiteImageController extends Controller
{
    /**
     * Display all configurable site images for the admin.
     */
    public function index(): View
    {
        $images = SiteImage::all();

        return view('admin.site-images.index', compact('images'));
    }

    /**
     * Update a specific site image via upload or direct URL.
     */
    public function update(Request $request, int $id): RedirectResponse
    {
        $image = SiteImage::findOrFail($id);

        $validated = $request->validate([
            'image_file' => 'nullable|image|max:12288', // up to 12MB
            'image_url' => 'nullable|string|max:1000',
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:1000',
            'reset_to_default' => 'nullable|boolean',
        ]);

        if ($request->boolean('reset_to_default')) {
            if ($image->image_path && !str_starts_with($image->image_path, 'images/') && Storage::disk('public')->exists($image->image_path)) {
                Storage::disk('public')->delete($image->image_path);
            }
            $image->image_path = null;
            $image->save();

            Cache::forget("site_image_{$image->section_key}");

            return back()->with('success', "'{$image->title}' has been reset to its default visual.");
        }

        if ($request->hasFile('image_file')) {
            // Delete old uploaded file if it was custom
            if ($image->image_path && !str_starts_with($image->image_path, 'images/') && Storage::disk('public')->exists($image->image_path)) {
                Storage::disk('public')->delete($image->image_path);
            }

            $path = $request->file('image_file')->store('site', 'public');
            $image->image_path = $path;
        } elseif (!empty($validated['image_url'])) {
            $image->image_path = $validated['image_url'];
        }

        if (!empty($validated['title'])) {
            $image->title = $validated['title'];
        }
        if (isset($validated['description'])) {
            $image->description = $validated['description'];
        }

        $image->save();

        Cache::forget("site_image_{$image->section_key}");

        return back()->with('success', "'{$image->title}' updated successfully! New image is now live on the website.");
    }
}

