<?php

namespace App\Http\Controllers;

use App\Models\GalleryItem;
use App\Models\Property;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    /**
     * Display the application homepage.
     */
    public function index(): View
    {
        $featuredProperties = Property::query()
            ->where('is_approved', true)
            ->where('is_featured', true)
            ->latest()
            ->take(6)
            ->get();

        $latestProperties = Property::query()
            ->where('is_approved', true)
            ->latest()
            ->take(6)
            ->get();

        $galleryItems = GalleryItem::query()
            ->orderBy('sort_order')
            ->take(6)
            ->get();

        $cities = Property::query()
            ->where('is_approved', true)
            ->distinct()
            ->pluck('city')
            ->filter();

        return view('home', compact('featuredProperties', 'latestProperties', 'galleryItems', 'cities'));
    }
}
