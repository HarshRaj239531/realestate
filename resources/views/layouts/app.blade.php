<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', ($siteSettings['brand_name'] ?? 'RealEstate') . ' | Eco-Friendly Luxury Real Estate')</title>
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
<body class="bg-slate-50 text-slate-800 font-sans antialiased selection:bg-emerald-600 selection:text-white flex flex-col min-h-screen relative">

    <!-- Framer Motion Reading & Scroll Progress Bar -->
    <div id="scroll-progress-bar" class="fixed top-0 left-0 right-0 h-1 sm:h-1.5 bg-gradient-to-r from-emerald-500 via-teal-400 to-amber-500 origin-left z-[9999] pointer-events-none transform scale-x-0"></div>

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

            <!-- Social Media Icons in Circular Badges with clean SVGs -->
            <div class="flex items-center space-x-2">
                <a href="{{ $siteSettings['social_facebook'] ?? '#' }}" target="_blank" rel="noopener" aria-label="Facebook" class="w-6 h-6 rounded-full bg-slate-800 hover:bg-emerald-600 text-slate-300 hover:text-white flex items-center justify-center transition">
                    <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 24 24">
                        <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                    </svg>
                </a>
                <a href="{{ $siteSettings['social_instagram'] ?? '#' }}" target="_blank" rel="noopener" aria-label="Instagram" class="w-6 h-6 rounded-full bg-slate-800 hover:bg-emerald-600 text-slate-300 hover:text-white flex items-center justify-center transition">
                    <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 24 24">
                        <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                    </svg>
                </a>
                <a href="{{ $siteSettings['social_linkedin'] ?? '#' }}" target="_blank" rel="noopener" aria-label="LinkedIn" class="w-6 h-6 rounded-full bg-slate-800 hover:bg-emerald-600 text-slate-300 hover:text-white flex items-center justify-center transition">
                    <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 24 24">
                        <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/>
                    </svg>
                </a>
                <a href="{{ $siteSettings['social_twitter'] ?? '#' }}" target="_blank" rel="noopener" aria-label="Twitter / X" class="w-6 h-6 rounded-full bg-slate-800 hover:bg-emerald-600 text-slate-300 hover:text-white flex items-center justify-center transition">
                    <svg class="w-3 h-3 fill-current" viewBox="0 0 24 24">
                        <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/>
                    </svg>
                </a>
                <a href="{{ $siteSettings['social_youtube'] ?? '#' }}" target="_blank" rel="noopener" aria-label="YouTube" class="w-6 h-6 rounded-full bg-slate-800 hover:bg-emerald-600 text-slate-300 hover:text-white flex items-center justify-center transition">
                    <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 24 24">
                        <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                    </svg>
                </a>
                <button onclick="toggleQuickEnquiry()" class="ml-2 px-2.5 py-1 rounded text-[11px] bg-slate-800 hover:bg-emerald-700 text-emerald-300 hover:text-white transition flex items-center space-x-1.5 cursor-pointer">
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                    <span>Search</span>
                </button>
            </div>
        </div>
    </div>

    <!-- 2. Main Navbar with Rich Green background & Flush-Left Angled White Logo Badge with Stylish Blue Border Stripe -->
    <header class="bg-brand-primary sticky top-0 z-40 shadow-xl border-b-2 border-emerald-900/40 w-full">
        <div class="w-full flex items-stretch justify-between min-h-[82px] sm:min-h-[90px] relative">
            
            <!-- Flush Left Angled Brand Logo Area (starts at viewport left edge x=0) -->
            <div class="flex items-stretch flex-shrink-0 z-10">
                <!-- Solid White Box from x=0 with generous padding -->
                <div class="bg-white flex items-center pl-4 sm:pl-8 md:pl-12 lg:pl-16 pr-3 sm:pr-5 shadow-sm">
                    <a href="{{ route('home') }}" class="flex items-center space-x-2 py-2">
                        @php
                            $logoUrl = isset($siteImages['site_logo']) ? $siteImages['site_logo']->url : asset('images/site/logo.svg');
                        @endphp
                        <img src="{{ $logoUrl }}" alt="{{ $siteSettings['brand_name'] ?? 'RealEstate' }}" class="h-12 sm:h-14 md:h-16 w-auto object-contain">
                    </a>
                </div>

                <!-- Crisp Angled Cut with Diagonal Cyan/Blue Stripe divider matching reference design -->
                <div class="relative w-[48px] sm:w-[64px] h-full self-stretch flex-shrink-0 pointer-events-none -ml-[1px]">
                    <svg class="w-full h-full block" viewBox="0 0 64 100" preserveAspectRatio="none">
                        <defs>
                            <linearGradient id="navBlueStripe" x1="0%" y1="0%" x2="100%" y2="100%">
                                <stop offset="0%" stop-color="#38bdf8" />
                                <stop offset="50%" stop-color="#0284c7" />
                                <stop offset="100%" stop-color="#1e40af" />
                            </linearGradient>
                        </defs>
                        <!-- Seamless extension of white background into the angle -->
                        <polygon points="0,0 16,0 64,100 0,100" fill="#ffffff" />
                        <!-- High-definition 6.5px Blue Diagonal Stripe -->
                        <line x1="16" y1="0" x2="64" y2="100" stroke="url(#navBlueStripe)" stroke-width="6.5" />
                    </svg>
                </div>
            </div>

            <!-- Navigation Links Container (spans the remaining rich green area) -->
            <div class="flex-1 flex items-center justify-end xl:justify-center px-4 sm:px-8 lg:px-12">
                <!-- Desktop Navigation Links -->
                <nav class="hidden lg:flex items-center space-x-8 xl:space-x-11 text-[15px] xl:text-[16px] font-semibold text-white tracking-wide">
                    <a href="{{ route('home') }}" class="py-2 transition duration-150 {{ request()->routeIs('home') ? 'border-b-[3px] border-white font-bold text-white' : 'text-white/95 hover:text-white hover:border-b-2 hover:border-white/70' }}">
                        Home
                    </a>
                    <a href="{{ route('properties.index') }}" class="py-2 transition duration-150 {{ request()->routeIs('properties.*') ? 'border-b-[3px] border-white font-bold text-white' : 'text-white/95 hover:text-white hover:border-b-2 hover:border-white/70' }}">
                        Property
                    </a>
                    <!-- Replaced Blog & News with Gallery per user request -->
                    <a href="{{ route('gallery.index') }}" class="py-2 transition duration-150 {{ request()->routeIs('gallery.*') ? 'border-b-[3px] border-white font-bold text-white' : 'text-white/95 hover:text-white hover:border-b-2 hover:border-white/70' }}">
                        Gallery
                    </a>
                    <a href="{{ route('post-property.create') }}" class="py-2 transition duration-150 {{ request()->routeIs('post-property.*') ? 'border-b-[3px] border-white font-bold text-white' : 'text-white/95 hover:text-white hover:border-b-2 hover:border-white/70' }}">
                        Post Property
                    </a>

                    <!-- About Us Dropdown -->
                    <div class="relative group">
                        <a href="{{ route('about') }}" class="py-2 flex items-center space-x-1.5 transition duration-150 {{ request()->routeIs('about') ? 'border-b-[3px] border-white font-bold text-white' : 'text-white/95 hover:text-white hover:border-b-2 hover:border-white/70' }}">
                            <span>About Us</span>
                            <svg class="w-4 h-4 group-hover:rotate-180 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </a>
                        <div class="absolute left-0 mt-1 w-52 bg-white text-slate-800 rounded-xl shadow-2xl py-2 hidden group-hover:block border border-slate-100 animate-fadeIn z-50">
                            <a href="{{ route('about') }}#story" class="block px-4 py-2.5 text-xs font-semibold hover:bg-emerald-50 hover:text-emerald-700 transition">Our Story & Heritage</a>
                            <a href="{{ route('about') }}#mission" class="block px-4 py-2.5 text-xs font-semibold hover:bg-emerald-50 hover:text-emerald-700 transition">Vision & Eco Mission</a>
                            <a href="{{ route('about') }}#leadership" class="block px-4 py-2.5 text-xs font-semibold hover:bg-emerald-50 hover:text-emerald-700 transition">Leadership Team</a>
                            <a href="{{ route('about') }}#why-us" class="block px-4 py-2.5 text-xs font-semibold hover:bg-emerald-50 hover:text-emerald-700 transition">Why Choose RealEstate</a>
                        </div>
                    </div>

                    <a href="{{ route('contact') }}" class="py-2 transition duration-150 {{ request()->routeIs('contact') ? 'border-b-[3px] border-white font-bold text-white' : 'text-white/95 hover:text-white hover:border-b-2 hover:border-white/70' }}">
                        Contact
                    </a>
                </nav>

                <!-- Mobile Menu Toggle Button -->
                <div class="flex lg:hidden items-center pr-2">
                    <button onclick="toggleMobileMenu()" class="p-2 text-white hover:text-emerald-200 focus:outline-none">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                    </button>
                </div>
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

    <!-- Global Alert / Flash Messages (Only shown when messages exist) -->
    @if (session('success') || session('error'))
        <div class="fixed top-20 right-6 z-50 max-w-md w-full animate-fadeIn">
            @if (session('success'))
                <div class="bg-emerald-900 text-white p-4 rounded-xl shadow-2xl mb-3 flex items-center justify-between border border-emerald-500">
                    <div class="flex items-center space-x-3 text-sm font-medium">
                        <svg class="w-5 h-5 text-emerald-400 shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <span>{{ session('success') }}</span>
                    </div>
                    <button onclick="this.parentElement.remove()" class="text-emerald-300 hover:text-white">&times;</button>
                </div>
            @endif

            @if (session('error'))
                <div class="bg-rose-900 text-white p-4 rounded-xl shadow-2xl mb-3 flex items-center justify-between border border-rose-500">
                    <div class="flex items-center space-x-3 text-sm font-medium">
                        <svg class="w-5 h-5 text-rose-400 shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                        </svg>
                        <span>{{ session('error') }}</span>
                    </div>
                    <button onclick="this.parentElement.remove()" class="text-rose-300 hover:text-white">&times;</button>
                </div>
            @endif
        </div>
    @endif

    <!-- Main Content Slot (Zero Gap directly below header) -->
    <main class="flex-grow p-0 m-0">
        @yield('content')
    </main>

    <!-- 3. Floating WhatsApp Widget (Bottom-Left) matching user design perfectly -->
    <div class="fixed bottom-6 left-6 z-50 flex flex-col items-start space-y-3">
        <!-- Top Chat Bubble with Dismiss button and offset green pill -->
        <div id="whatsappChatBubble" class="flex items-center space-x-2.5 transition-all duration-300">
            <!-- Small Black Circle Close Button -->
            <button onclick="dismissWhatsAppBubble()" 
                    type="button"
                    aria-label="Close chat prompt" 
                    class="w-6 h-6 rounded-full bg-black text-white hover:bg-slate-800 flex items-center justify-center transition shadow-md cursor-pointer shrink-0">
                <svg class="w-2.5 h-2.5 stroke-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>

            <!-- "Chat with us" Pill with vibrant green offset shadow -->
            <a href="https://wa.me/{{ $siteSettings['contact_whatsapp'] ?? '919876543210' }}?text=Hello%20RealEstate,%20I%20am%20interested%20in%20eco-friendly%20properties." 
               target="_blank" 
               rel="noopener" 
               class="relative group block select-none">
                <!-- Bottom-right offset green shape -->
                <div class="absolute inset-0 translate-y-1 bg-[#00e785] rounded-full"></div>
                <!-- Main white pill with dark border -->
                <div class="relative bg-white border-[1.5px] border-slate-900 rounded-full px-5 py-1.5 sm:py-2 flex items-center justify-center shadow-sm group-hover:-translate-y-0.5 group-active:translate-y-0.5 transition-transform duration-150">
                    <span class="text-slate-900 font-bold text-[14px] sm:text-[15px] tracking-tight whitespace-nowrap">Chat with us</span>
                </div>
            </a>
        </div>

        <!-- Floating Green WhatsApp Circle -->
        <a href="https://wa.me/{{ $siteSettings['contact_whatsapp'] ?? '919876543210' }}?text=Hello%20RealEstate,%20I%20am%20interested%20in%20eco-friendly%20properties." 
           target="_blank" 
           rel="noopener" 
           aria-label="Chat with us on WhatsApp" 
           class="w-14 h-14 bg-[#00e785] hover:bg-[#00d475] text-white rounded-full flex items-center justify-center shadow-xl shadow-emerald-500/30 hover:scale-105 active:scale-95 transition-all duration-200">
            <svg class="w-7 h-7 fill-white" viewBox="0 0 24 24">
                <path d="M12.031 2C6.495 2 2 6.495 2 12.031c0 1.996.586 3.864 1.599 5.437L2 22l4.675-1.564a9.986 9.986 0 005.356 1.595h.005c5.536 0 10.031-4.496 10.031-10.031C22.067 6.495 17.572 2 12.031 2zm5.836 14.199c-.244.688-1.42 1.32-1.954 1.399-.505.076-1.157.108-3.714-.954-3.197-1.326-5.244-4.577-5.402-4.788-.159-.211-1.3-1.73-1.3-3.3 0-1.57.82-2.344 1.111-2.662.29-.317.635-.396.847-.396.211 0 .423.002.608.01.196.01.458-.074.717.548.265.635.9 2.196.98 2.355.079.159.132.344.026.556-.105.211-.158.343-.317.528-.159.185-.333.413-.476.556-.158.158-.323.33-.138.647.185.317.82 1.353 1.761 2.19 1.209 1.076 2.228 1.411 2.545 1.57.318.158.503.132.688-.079.185-.212.793-.926 1.005-1.243.212-.317.423-.264.714-.158.291.106 1.85.872 2.167 1.031.317.159.529.238.608.37.079.133.079.768-.165 1.456z"/>
            </svg>
        </a>
    </div>

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
                        <img src="{{ $logoUrl }}" alt="{{ $siteSettings['brand_name'] ?? 'RealEstate' }}" class="h-10 w-auto">
                    </div>
                    <p class="text-xs leading-relaxed text-slate-400">
                        {{ $siteSettings['brand_name'] ?? 'RealEstate' }} is India's pioneer in luxury eco-friendly residences, biophilic architecture, and zero-carbon sustainable communities.
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
                            <a href="mailto:{{ $siteSettings['contact_email'] ?? 'info@realestate.com' }}" class="hover:text-white">{{ $siteSettings['contact_email'] ?? 'info@realestate.com' }}</a>
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
                <p>&copy; {{ date('Y') }} {{ $siteSettings['brand_name'] ?? 'RealEstate' }}. All rights reserved.</p>
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

        function dismissWhatsAppBubble() {
            const bubble = document.getElementById('whatsappChatBubble');
            if (bubble) {
                bubble.classList.add('opacity-0', 'scale-90', 'pointer-events-none');
                setTimeout(() => bubble.remove(), 250);
                sessionStorage.setItem('wa_bubble_dismissed', 'true');
            }
        }

        document.addEventListener('DOMContentLoaded', () => {
            if (sessionStorage.getItem('wa_bubble_dismissed') === 'true') {
                const bubble = document.getElementById('whatsappChatBubble');
                if (bubble) bubble.remove();
            }
        });
    </script>
    @stack('scripts')
</body>
</html>

