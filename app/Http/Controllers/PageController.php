<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class PageController extends Controller
{
    /**
     * Display the About Us page.
     */
    public function about(): View
    {
        return view('pages.about');
    }

    /**
     * Display the Contact Us page.
     */
    public function contact(): View
    {
        return view('pages.contact');
    }
}
