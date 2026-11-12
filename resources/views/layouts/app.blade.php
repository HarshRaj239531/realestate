<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', ($siteSettings['brand_name'] ?? 'AG HOMES INDIA') . ' | Eco-Friendly Luxury Real Estate')</title>
    <meta name="description" content="@yield('meta_description', $siteSettings['brand_tagline'] ?? 'Find Eco-Friendly Homes Easily. Featured one stop destination for real estate.')">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:ital,wght@0,400..700;1,400..700&family=Montserrat:wght@600;700;800;900&display=swap" rel="stylesheet">

    <!-- Centralized Dynamic Brand Styling (Non-Hardcoded Colors) -->
    <style>
        :root {
            --brand-primary: {{ $siteSettings['brand_primary_color'] ?? '#2f9049' }};
            --brand-primary-dark: {{ $siteSettings['brand_primary_dark'] ?? '#236c37' }};
            --brand-primary-light: {{ $siteSettings['brand_primary_light'] ?? '#3ea55a' }};
            --brand-topbar: {{ $siteSettings['brand_topbar_color'] ?? '#18202d' }};
            --brand-accent: {{ $siteSettings['brand_accent_color'] ?? '#0284c7' }};
        }
    </style>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-50 text-slate-800 font-sans antialiased selection:bg-emerald-600 selection:text-white flex flex-col min-h-screen">

    <!-- 1. Top Bar (Dark Charcoal/Slate) -->
    <div class="bg-brand-topbar text-slate-300 text-xs py-2 px-4 sm:px-8 border-b border-slate-800">
        <div class="max-w-7xl mx-auto flex flex-col sm:flex-row justify-between items-center gap-2">
            <!-- Contact snippet -->
            <div class="flex items-center space-x-6 text-slate-300">
                <a href="tel:{{ $siteSettings['contact_phone'] ?? '+919876543210' }}" class="flex items-center space-x-1.5 hover:text-white transition">
                    <svg class="w-3.5 h-3.5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                    </svg>
                    <span>{{ $siteSettings['contact_phone'] ?? '+91 98765 43210' }}</span>
                </a>
                <span class="hidden md:inline-block text-slate-600">|</span>
                <span class="hidden md:flex items-center space-x-1.5 text-slate-400">
                    <svg class="w-3.5 h-3.5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                    <span class="truncate max-w-xs">{{ $siteSettings['contact_address'] ?? 'Gurugram, India' }}</span>
                </span>
            </div>

            <!-- Social Media Icons in Circular Badges -->
            <div class="flex items-center space-x-2">
                <a href="{{ $siteSettings['social_facebook'] ?? '#' }}" target="_blank" rel="noopener" aria-label="Facebook" class="w-6 h-6 rounded-full bg-slate-800 hover:bg-emerald-600 text-slate-300 hover:text-white flex items-center justify-center text-[11px] transition">
                    f
                </a>
                <a href="{{ $siteSettings['social_instagram'] ?? '#' }}" target="_blank" rel="noopener" aria-label="Instagram" class="w-6 h-6 rounded-full bg-slate-800 hover:bg-emerald-600 text-slate-300 hover:text-white flex items-center justify-center text-[11px] transition">
                    📸
                </a>
                <a href="{{ $siteSettings['social_linkedin'] ?? '#' }}" target="_blank" rel="noopener" aria-label="LinkedIn" class="w-6 h-6 rounded-full bg-slate-800 hover:bg-emerald-600 text-slate-300 hover:text-white flex items-center justify-center text-[10px] font-bold transition">
                    in
                </a>
                <a href="{{ $siteSettings['social_twitter'] ?? '#' }}" target="_blank" rel="noopener" aria-label="Twitter" class="w-6 h-6 rounded-full bg-slate-800 hover:bg-emerald-600 text-slate-300 hover:text-white flex items-center justify-center text-[10px] font-bold transition">
                    𝕏
                </a>
                <a href="{{ $siteSettings['social_youtube'] ?? '#' }}" target="_blank" rel="noopener" aria-label="YouTube" class="w-6 h-6 rounded-full bg-slate-800 hover:bg-emerald-600 text-slate-300 hover:text-white flex items-center justify-center text-[10px] transition">
                    ▶
                </a>
                <button onclick="toggleQuickEnquiry()" class="ml-2 px-2 py-0.5 rounded text-[11px] bg-slate-800 hover:bg-emerald-700 text-emerald-300 transition flex items-center space-x-1">
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                    <span>Search</span>
                </button>
            </div>
        </div>
    </div>

    <!-- 2. Main Navbar with Emerald Green background & Angled Logo Badge -->
    <header class="bg-brand-primary sticky top-0 z-40 shadow-lg">
        <div class="max-w-7xl mx-auto flex items-stretch justify-between">
            
            <!-- Logo Section with Angled White Badge matching design -->
            <div class="relative bg-white py-2.5 px-6 sm:px-10 clip-logo-badge flex items-center shadow-md">
                <a href="{{ route('home') }}" class="flex items-center space-x-2">
                    @php
                        $logoUrl = isset($siteImages['site_logo']) ? $siteImages['site_logo']->url : asset('images/site/logo.svg');
                    @endphp
                    <img src="{{ $logoUrl }}" alt="{{ $siteSettings['brand_name'] ?? 'AG HOMES INDIA' }}" class="h-10 sm:h-12 w-auto object-contain">
                </a>
            </div>

            <!-- Desktop Navigation Links -->
            <nav class="hidden lg:flex items-center space-x-7 px-4 text-sm font-medium text-white">
                <a href="{{ route('home') }}" class="py-2 transition hover:text-emerald-100 {{ request()->routeIs('home') ? 'border-b-2 border-white font-semibold' : '' }}">
                    Home
                </a>
                <a href="{{ route('properties.index') }}" class="py-2 transition hover:text-emerald-100 {{ request()->routeIs('properties.*') ? 'border-b-2 border-white font-semibold' : '' }}">
                    Property
                </a>
                <!-- Replaced Blog & News with Gallery per user request -->
                <a href="{{ route('gallery.index') }}" class="py-2 transition hover:text-emerald-100 {{ request()->routeIs('gallery.*') ? 'border-b-2 border-white font-semibold' : '' }}">
                    Gallery
                </a>
                <a href="{{ route('post-property.create') }}" class="py-2 transition hover:text-emerald-100 {{ request()->routeIs('post-property.*') ? 'border-b-2 border-white font-semibold' : '' }}">
                    Post Property
                </a>

                <!-- About Us Dropdown -->
                <div class="relative group">
                    <a href="{{ route('about') }}" class="py-2 flex items-center space-x-1 transition hover:text-emerald-100 {{ request()->routeIs('about') ? 'border-b-2 border-white font-semibold' : '' }}">
                        <span>About Us</span>
                        <svg class="w-3.5 h-3.5 group-hover:rotate-180 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </a>
                    <div class="absolute left-0 mt-1 w-48 bg-white text-slate-800 rounded-xl shadow-xl py-2 hidden group-hover:block border border-slate-100 animate-fadeIn z-50">
                        <a href="{{ route('about') }}#story" class="block px-4 py-2 text-xs hover:bg-emerald-50 hover:text-emerald-700 transition">Our Story & Heritage</a>
                        <a href="{{ route('about') }}#mission" class="block px-4 py-2 text-xs hover:bg-emerald-50 hover:text-emerald-700 transition">Vision & Eco Mission</a>
                        <a href="{{ route('about') }}#leadership" class="block px-4 py-2 text-xs hover:bg-emerald-50 hover:text-emerald-700 transition">Leadership Team</a>
                        <a href="{{ route('about') }}#why-us" class="block px-4 py-2 text-xs hover:bg-emerald-50 hover:text-emerald-700 transition">Why Choose AG Homes</a>
                    </div>
                </div>

                <a href="{{ route('contact') }}" class="py-2 transition hover:text-emerald-100 {{ request()->routeIs('contact') ? 'border-b-2 border-white font-semibold' : '' }}">
                    Contact
                </a>
            </nav>

            <!-- Right Action Buttons (Register & Login) matching image style -->
            <div class="flex items-center space-x-3 px-4 py-2">
                @auth
                    <!-- Authenticated Dropdown -->
                    <div class="relative group">
                        <button class="flex items-center space-x-2 text-xs font-semibold bg-emerald-800/60 hover:bg-emerald-800 text-white px-3.5 py-2 rounded-full border border-emerald-400/30 transition">
                            <span class="w-6 h-6 rounded-full bg-white text-emerald-800 flex items-center justify-center font-bold text-xs uppercase">
                                {{ substr(Auth::user()->name, 0, 1) }}
                            </span>
                            <span class="hidden sm:inline">{{ Auth::user()->name }}</span>
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                        <div class="absolute right-0 mt-1 w-44 bg-white text-slate-800 rounded-xl shadow-xl py-2 hidden group-hover:block border border-slate-100 z-50">
                            @if(Auth::user()->isAdmin())
                                <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 text-xs font-semibold text-emerald-700 hover:bg-emerald-50 transition">
                                    ⚙️ Admin Dashboard
                                </a>
                                <div class="border-t border-slate-100 my-1"></div>
                            @endif
                            <a href="{{ route('post-property.create') }}" class="block px-4 py-2 text-xs hover:bg-slate-50 transition">Post a Property</a>
                            <form method="POST" action="{{ route('logout') }}" class="block">
                                @csrf
                                <button type="submit" class="w-full text-left px-4 py-2 text-xs text-rose-600 hover:bg-rose-50 transition">
                                    Log Out
                                </button>
                            </form>
                        </div>
                    </div>
                @else
                    <!-- + Register Button (Pill outline) -->
                    <a href="{{ route('register') }}" class="inline-flex items-center space-x-1.5 text-xs font-semibold text-white bg-emerald-700/70 hover:bg-emerald-700 border border-emerald-300/40 px-3.5 py-1.5 sm:px-4 sm:py-2 rounded-full transition shadow-sm">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                        </svg>
                        <span>+ Register</span>
                    </a>

                    <!-- Login Button (Solid Pill) -->
                    <a href="{{ route('login') }}" class="inline-flex items-center space-x-1.5 text-xs font-semibold text-white bg-brand-dark hover:bg-emerald-950 border border-emerald-500/50 px-3.5 py-1.5 sm:px-4 sm:py-2 rounded-full transition shadow-sm">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
                        </svg>
                        <span>Login</span>
                    </a>
                @endauth

                <!-- Mobile Menu Button -->
                <button onclick="toggleMobileMenu()" class="lg:hidden p-2 text-white hover:text-emerald-200">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Drawer -->
        <div id="mobileMenu" class="hidden lg:hidden bg-emerald-900 text-white px-6 py-4 space-y-3 border-t border-emerald-700">
            <a href="{{ route('home') }}" class="block py-1.5 text-sm font-medium hover:text-emerald-300">Home</a>
            <a href="{{ route('properties.index') }}" class="block py-1.5 text-sm font-medium hover:text-emerald-300">Property</a>
            <a href="{{ route('gallery.index') }}" class="block py-1.5 text-sm font-medium hover:text-emerald-300">Gallery</a>
            <a href="{{ route('post-property.create') }}" class="block py-1.5 text-sm font-medium hover:text-emerald-300">Post Property</a>
            <a href="{{ route('about') }}" class="block py-1.5 text-sm font-medium hover:text-emerald-300">About Us</a>
            <a href="{{ route('contact') }}" class="block py-1.5 text-sm font-medium hover:text-emerald-300">Contact</a>
            @auth
                @if(Auth::user()->isAdmin())
                    <a href="{{ route('admin.dashboard') }}" class="block py-1.5 text-sm font-medium text-emerald-300">Admin Control Center</a>
                @endif
                <form method="POST" action="{{ route('logout') }}" class="pt-2">
                    @csrf
                    <button type="submit" class="text-rose-300 text-sm font-medium">Log Out</button>
                </form>
            @endauth
        </div>
    </header>

    <!-- Global Alert / Flash Messages -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-3 w-full">
        @if (session('success'))
            <div class="bg-emerald-50 border-l-4 border-emerald-500 p-4 rounded-md shadow-sm mb-3 flex items-center justify-between">
                <div class="flex items-center space-x-3 text-emerald-800 text-sm font-medium">
                    <svg class="w-5 h-5 text-emerald-500 shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    <span>{{ session('success') }}</span>
                </div>
                <button onclick="this.parentElement.remove()" class="text-emerald-600 hover:text-emerald-900">&times;</button>
            </div>
        @endif

        @if (session('error'))
            <div class="bg-rose-50 border-l-4 border-rose-500 p-4 rounded-md shadow-sm mb-3 flex items-center justify-between">
                <div class="flex items-center space-x-3 text-rose-800 text-sm font-medium">
                    <svg class="w-5 h-5 text-rose-500 shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                    </svg>
                    <span>{{ session('error') }}</span>
                </div>
                <button onclick="this.parentElement.remove()" class="text-rose-600 hover:text-rose-900">&times;</button>
            </div>
        @endif
    </div>

    <!-- Main Content Slot -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- 3. Floating WhatsApp Button (Bottom-Left) matching reference design -->
    <a href="https://wa.me/{{ $siteSettings['contact_whatsapp'] ?? '919876543210' }}?text=Hello%20AG%20Homes,%20I%20am%20interested%20in%20eco-friendly%20properties." target="_blank" rel="noopener" aria-label="Chat on WhatsApp" class="fixed bottom-6 left-6 z-50 w-13 h-13 sm:w-14 sm:h-14 bg-[#25D366] hover:bg-[#20ba59] text-white rounded-full flex items-center justify-center shadow-2xl hover:scale-110 transition-transform duration-300 group">
        <svg class="w-7 h-7 sm:w-8 sm:h-8 fill-current" viewBox="0 0 24 24">
            <path d="M12.031 2C6.495 2 2 6.495 2 12.031c0 1.996.586 3.864 1.599 5.437L2 22l4.675-1.564a9.986 9.986 0 005.356 1.595h.005c5.536 0 10.031-4.496 10.031-10.031C22.067 6.495 17.572 2 12.031 2zm5.836 14.199c-.244.688-1.42 1.32-1.954 1.399-.505.076-1.157.108-3.714-.954-3.197-1.326-5.244-4.577-5.402-4.788-.159-.211-1.3-1.73-1.3-3.3 0-1.57.82-2.344 1.111-2.662.29-.317.635-.396.847-.396.211 0 .423.002.608.01.196.01.458-.074.717.548.265.635.9 2.196.98 2.355.079.159.132.344.026.556-.105.211-.158.343-.317.528-.159.185-.333.413-.476.556-.158.158-.323.33-.138.647.185.317.82 1.353 1.761 2.19 1.209 1.076 2.228 1.411 2.545 1.57.318.158.503.132.688-.079.185-.212.793-.926 1.005-1.243.212-.317.423-.264.714-.158.291.106 1.85.872 2.167 1.031.317.159.529.238.608.37.079.133.079.768-.165 1.456z"/>
        </svg>
        <span class="absolute left-16 bg-slate-900 text-white text-xs font-semibold px-3 py-1.5 rounded-lg shadow-lg opacity-0 group-hover:opacity-100 transition-opacity duration-200 pointer-events-none whitespace-nowrap">
            Chat with an Advisor
        </span>
    </a>

    <!-- 4. Floating QUICK ENQUIRY Vertical Tab (Right Viewport Edge) matching design -->
    <button onclick="toggleQuickEnquiry()" class="fixed top-1/2 right-0 -translate-y-1/2 z-50 bg-brand-topbar hover:bg-brand-primary text-white text-xs font-bold tracking-widest uppercase py-4 px-2 rounded-l-md shadow-2xl transition duration-200 flex items-center justify-center cursor-pointer border-l-2 border-emerald-400">
        <span class="vertical-text">QUICK ENQUIRY</span>
    </button>

    <!-- Quick Enquiry Modal / Drawer -->
    <div id="quickEnquiryModal" class="fixed inset-0 bg-slate-950/70 z-50 backdrop-blur-sm hidden items-center justify-center p-4">
        <div class="bg-white rounded-2xl max-w-lg w-full p-6 sm:p-8 shadow-2xl relative border border-slate-100 animate-fadeIn">
            <button onclick="toggleQuickEnquiry()" class="absolute top-4 right-4 text-slate-400 hover:text-slate-700 text-2xl font-bold">&times;</button>
            <div class="mb-5">
                <span class="text-xs font-bold uppercase tracking-wider text-emerald-700 bg-emerald-100 px-2.5 py-1 rounded-full">Fast Response Guarantee</span>
                <h3 class="text-2xl font-extrabold text-slate-900 mt-2">Quick Property Enquiry</h3>
                <p class="text-xs text-slate-600 mt-1">Tell us your real estate needs and our verified green home consultants will contact you within 30 minutes.</p>
            </div>
            <form method="POST" action="{{ route('inquiries.store') }}" class="space-y-4">
                @csrf
                <input type="hidden" name="inquiry_type" value="quick_enquiry">
                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1">Your Full Name *</label>
                    <input type="text" name="name" required placeholder="e.g. Amit Sharma" class="w-full text-sm border border-slate-300 rounded-lg px-3.5 py-2.5 focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1">Phone Number *</label>
                        <input type="tel" name="phone" required placeholder="+91 98765 43210" class="w-full text-sm border border-slate-300 rounded-lg px-3.5 py-2.5 focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1">Email Address *</label>
                        <input type="email" name="email" required placeholder="amit@example.com" class="w-full text-sm border border-slate-300 rounded-lg px-3.5 py-2.5 focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                    </div>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1">Interested In</label>
                    <select name="subject" class="w-full text-sm border border-slate-300 rounded-lg px-3.5 py-2.5 focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                        <option value="Eco Haven Forest Villas">Eco Haven Forest Villas</option>
                        <option value="Residential Eco Plots">Residential Eco Plots</option>
                        <option value="Biophilic Penthouses">Biophilic Penthouses</option>
                        <option value="General Consultation">General Property Consultation</option>
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1">Your Requirement / Message *</label>
                    <textarea name="message" rows="3" required placeholder="Looking for a 3/4 BHK Villa in Gurgaon with solar power..." class="w-full text-sm border border-slate-300 rounded-lg px-3.5 py-2 focus:ring-2 focus:ring-emerald-500 focus:outline-none"></textarea>
                </div>
                <button type="submit" class="w-full py-3 bg-brand-primary hover:bg-brand-dark text-white font-bold rounded-xl text-sm transition shadow-lg">
                    Submit Quick Enquiry
                </button>
            </form>
        </div>
    </div>

    <!-- 5. Footer -->
    <footer class="bg-brand-topbar text-slate-400 mt-auto border-t border-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-14">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10">
                <!-- Column 1: Brand Info -->
                <div class="space-y-4">
                    <div class="bg-white rounded-lg p-2.5 inline-block">
                        <img src="{{ $logoUrl }}" alt="{{ $siteSettings['brand_name'] ?? 'AG HOMES INDIA' }}" class="h-10 w-auto">
                    </div>
                    <p class="text-xs leading-relaxed text-slate-400">
                        {{ $siteSettings['brand_name'] ?? 'AG HOMES INDIA' }} is India's pioneer in luxury eco-friendly residences, biophilic architecture, and zero-carbon sustainable communities.
                    </p>
                    <div class="flex items-center space-x-3 text-sm text-slate-300">
                        <span class="w-2.5 h-2.5 rounded-full bg-emerald-500 animate-pulse"></span>
                        <span class="text-xs font-medium text-emerald-400">IGBC & LEED Certified Developments</span>
                    </div>
                </div>

                <!-- Column 2: Quick Links -->
                <div>
                    <h4 class="text-white font-bold text-sm uppercase tracking-wider mb-4 border-b border-slate-800 pb-2">Quick Navigation</h4>
                    <ul class="space-y-2 text-xs">
                        <li><a href="{{ route('home') }}" class="hover:text-emerald-400 transition">Home</a></li>
                        <li><a href="{{ route('properties.index') }}" class="hover:text-emerald-400 transition">Featured Properties</a></li>
                        <li><a href="{{ route('gallery.index') }}" class="hover:text-emerald-400 transition">Photo & Project Gallery</a></li>
                        <li><a href="{{ route('post-property.create') }}" class="hover:text-emerald-400 transition">List Your Property</a></li>
                        <li><a href="{{ route('about') }}" class="hover:text-emerald-400 transition">About Our Legacy</a></li>
                        <li><a href="{{ route('contact') }}" class="hover:text-emerald-400 transition">Get In Touch</a></li>
                    </ul>
                </div>

                <!-- Column 3: Property Types -->
                <div>
                    <h4 class="text-white font-bold text-sm uppercase tracking-wider mb-4 border-b border-slate-800 pb-2">Property Categories</h4>
                    <ul class="space-y-2 text-xs">
                        <li><a href="{{ route('properties.index', ['type' => 'villa']) }}" class="hover:text-emerald-400 transition">Solar Luxury Villas</a></li>
                        <li><a href="{{ route('properties.index', ['type' => 'penthouse']) }}" class="hover:text-emerald-400 transition">Biophilic Penthouses</a></li>
                        <li><a href="{{ route('properties.index', ['type' => 'plot']) }}" class="hover:text-emerald-400 transition">Freehold Gated Plots</a></li>
                        <li><a href="{{ route('properties.index', ['type' => 'apartment']) }}" class="hover:text-emerald-400 transition">Green Apartments</a></li>
                        <li><a href="{{ route('properties.index', ['type' => 'commercial']) }}" class="hover:text-emerald-400 transition">Net-Zero Commercial</a></li>
                        <li><a href="{{ route('properties.index', ['eco_friendly' => 1]) }}" class="hover:text-emerald-400 transition">100% Eco-Living Special</a></li>
                    </ul>
                </div>

                <!-- Column 4: Contact & Admin Link -->
                <div>
                    <h4 class="text-white font-bold text-sm uppercase tracking-wider mb-4 border-b border-slate-800 pb-2">Contact Details</h4>
                    <ul class="space-y-3 text-xs">
                        <li class="flex items-start space-x-2">
                            <span class="text-emerald-400 mt-0.5">📍</span>
                            <span>{{ $siteSettings['contact_address'] ?? 'Skyline Tower, Golf Course Road, Gurugram' }}</span>
                        </li>
                        <li class="flex items-center space-x-2">
                            <span class="text-emerald-400">📞</span>
                            <a href="tel:{{ $siteSettings['contact_phone'] ?? '+919876543210' }}" class="hover:text-white">{{ $siteSettings['contact_phone'] ?? '+91 98765 43210' }}</a>
                        </li>
                        <li class="flex items-center space-x-2">
                            <span class="text-emerald-400">✉️</span>
                            <a href="mailto:{{ $siteSettings['contact_email'] ?? 'info@aghomesindia.com' }}" class="hover:text-white">{{ $siteSettings['contact_email'] ?? 'info@aghomesindia.com' }}</a>
                        </li>
                    </ul>

                    <div class="mt-6 pt-4 border-t border-slate-800/80">
                        <a href="{{ route('admin.login') }}" class="inline-flex items-center space-x-2 text-[11px] text-slate-400 hover:text-emerald-400 transition">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                            </svg>
                            <span>Staff / Admin Control Panel</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Bottom Copyright Bar -->
            <div class="mt-12 pt-6 border-t border-slate-800 text-center flex flex-col sm:flex-row justify-between items-center text-xs text-slate-500">
                <p>&copy; {{ date('Y') }} {{ $siteSettings['brand_name'] ?? 'AG HOMES INDIA' }}. All rights reserved.</p>
                <p class="mt-2 sm:mt-0">Built with Laravel & Tailwind CSS. Designed for sustainable living.</p>
            </div>
        </div>
    </footer>

    <!-- Interactive Scripts -->
    <script>
        function toggleMobileMenu() {
            const menu = document.getElementById('mobileMenu');
            menu.classList.toggle('hidden');
        }

        function toggleQuickEnquiry() {
            const modal = document.getElementById('quickEnquiryModal');
            if (modal.classList.contains('hidden')) {
                modal.classList.remove('hidden');
                modal.classList.add('flex');
            } else {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
            }
        }
    </script>
</body>
</html>
