<?php

namespace App\Http\Controllers;

use App\Models\GalleryItem;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Display the gallery showcase page with category filters.
     */
    public function index(Request $request): View
    {
        $category = $request->query('category', 'all');

        $query = GalleryItem::query()->orderBy('sort_order');

        if ($category !== 'all') {
            $query->where('category', $category);
        }

        $items = $query->paginate(12)->withQueryString();

        $categories = [
            'all' => 'All Projects',
            'villas' => 'Luxury Villas',
            'eco_homes' => 'Eco-Friendly Living',
            'exterior' => 'Exterior & Architecture',
            'interior' => 'Interiors & Kitchens',
            'plots' => 'Gated Land & Plots',
        ];

        return view('gallery.index', compact('items', 'categories', 'category'));
    }
}
