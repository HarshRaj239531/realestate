<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GalleryItem;
use App\Models\Inquiry;
use App\Models\Property;
use App\Models\SiteImage;
use Illuminate\Contracts\View\View;

class DashboardController extends Controller
{
    /**
     * Show the administrator dashboard overview.
     */
    public function index(): View
    {
        $stats = [
            'total_properties' => Property::count(),
            'eco_properties' => Property::where('is_eco_friendly', true)->count(),
            'total_inquiries' => Inquiry::count(),
            'new_inquiries' => Inquiry::where('status', 'new')->count(),
            'gallery_items' => GalleryItem::count(),
            'site_images' => SiteImage::count(),
        ];

        $recentInquiries = Inquiry::latest()->take(5)->get();
        $recentProperties = Property::latest()->take(5)->get();
        $siteImages = SiteImage::all();

        return view('admin.dashboard', compact('stats', 'recentInquiries', 'recentProperties', 'siteImages'));
    }
}
