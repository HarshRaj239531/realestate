<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    /**
     * Display a listing of properties with filtering and sorting.
     */
    public function index(Request $request): View
    {
        $query = Property::query()->where('is_approved', true);

        if ($request->filled('keyword')) {
            $keyword = $request->input('keyword');
            $query->where(function ($q) use ($keyword) {
                $q->where('title', 'like', "%{$keyword}%")
                  ->orWhere('location', 'like', "%{$keyword}%")
                  ->orWhere('city', 'like', "%{$keyword}%")
                  ->orWhere('description', 'like', "%{$keyword}%");
            });
        }

        if ($request->filled('type') && $request->input('type') !== 'all') {
            $query->where('property_type', $request->input('type'));
        }

        if ($request->filled('status') && $request->input('status') !== 'all') {
            $query->where('status', $request->input('status'));
        }

        if ($request->filled('city') && $request->input('city') !== 'all') {
            $query->where('city', $request->input('city'));
        }

        if ($request->filled('bedrooms') && $request->input('bedrooms') !== 'all') {
            $query->where('bedrooms', '>=', (int) $request->input('bedrooms'));
        }

        if ($request->boolean('eco_friendly')) {
            $query->where('is_eco_friendly', true);
        }

        if ($request->filled('sort')) {
            switch ($request->input('sort')) {
                case 'price_low':
                    $query->orderBy('price', 'asc');
                    break;
                case 'price_high':
                    $query->orderBy('price', 'desc');
                    break;
                case 'area':
                    $query->orderBy('area_sqft', 'desc');
                    break;
                default:
                    $query->latest();
                    break;
            }
        } else {
            $query->latest();
        }

        $properties = $query->paginate(9)->withQueryString();

        $cities = Property::query()
            ->where('is_approved', true)
            ->distinct()
            ->pluck('city')
            ->filter();

        return view('properties.index', compact('properties', 'cities'));
    }

    /**
     * Display a single property detail page.
     */
    public function show(string $slug): View
    {
        $property = Property::query()
            ->where('slug', $slug)
            ->where('is_approved', true)
            ->firstOrFail();

        $similarProperties = Property::query()
            ->where('is_approved', true)
            ->where('id', '!=', $property->id)
            ->where(function ($q) use ($property) {
                $q->where('property_type', $property->property_type)
                  ->orWhere('city', $property->city);
            })
            ->take(3)
            ->get();

        return view('properties.show', compact('property', 'similarProperties'));
    }
}

