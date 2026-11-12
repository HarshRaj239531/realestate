<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-slate-50">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Admin Dashboard') | {{ $siteSettings['brand_name'] ?? 'RealEstate' }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Instrument+Sans:wght@400..700&display=swap" rel="stylesheet">

    <!-- Centralized Dynamic Colors in Admin -->
    <style>
        :root {
            --brand-primary: {{ $siteSettings['brand_primary_color'] ?? '#2f9049' }};
            --brand-primary-dark: {{ $siteSettings['brand_primary_dark'] ?? '#236c37' }};
            --brand-topbar: {{ $siteSettings['brand_topbar_color'] ?? '#18202d' }};
        }
        body {
            font-family: 'Plus Jakarta Sans', 'Instrument Sans', sans-serif;
        }
    </style>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-full bg-[#f8fafc] text-slate-800 flex antialiased selection:bg-emerald-500 selection:text-white">

    <!-- Sidebar Navigation -->
    <aside class="w-72 bg-white border-r border-slate-200/80 flex flex-col shrink-0 min-h-screen z-20 transition-all duration-200">
        
        <!-- Workspace / Brand Header -->
        <div class="p-5 border-b border-slate-100 flex items-center justify-between">
            <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-3 group">
                <div class="w-10 h-10 rounded-2xl bg-gradient-to-tr from-emerald-700 via-emerald-600 to-teal-500 text-white flex items-center justify-center font-black text-sm shadow-md shadow-emerald-600/25 group-hover:scale-105 transition-transform">
                    RE
                </div>
                <div class="min-w-0">
                    <div class="font-black text-sm text-slate-900 tracking-tight flex items-center space-x-1.5 truncate">
                        <span>{{ $siteSettings['brand_name'] ?? 'RealEstate' }}</span>
                        <span class="bg-emerald-50 text-emerald-800 text-[9px] font-extrabold uppercase px-1.5 py-0.5 rounded border border-emerald-200">PRO</span>
                    </div>
                    <div class="text-[11px] text-slate-400 font-medium truncate flex items-center space-x-1.5 mt-0.5">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                        <span>Management Suite</span>
                    </div>
                </div>
            </a>
        </div>

        <!-- Quick Search Pill in Sidebar -->
        <div class="px-4 pt-4 pb-1">
            <div class="relative">
                <svg class="w-3.5 h-3.5 absolute left-3 top-1/2 -translate-y-1/2 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
                <input type="text" placeholder="Quick find... (Ctrl+K)" 
                       class="w-full text-xs pl-8 pr-10 py-2 bg-slate-50 border border-slate-200/80 rounded-xl text-slate-700 placeholder:text-slate-400 focus:bg-white focus:outline-none focus:ring-1 focus:ring-emerald-500 transition">
                <kbd class="absolute right-2.5 top-1/2 -translate-y-1/2 text-[9px] font-bold text-slate-400 bg-white px-1.5 py-0.5 rounded border border-slate-200 shadow-2xs">⌘K</kbd>
            </div>
        </div>

        <!-- Navigation Groups -->
        <nav class="flex-grow p-4 space-y-6 text-xs font-semibold overflow-y-auto">
            
            <!-- Group 1: CORE -->
            <div class="space-y-1">
                <div class="text-[10px] font-extrabold text-slate-400 uppercase tracking-widest px-3 mb-2">Core Overview</div>
                
                <a href="{{ route('admin.dashboard') }}" 
                   class="flex items-center space-x-3 px-3.5 py-2.5 rounded-xl transition duration-150 {{ request()->routeIs('admin.dashboard') ? 'bg-emerald-50/90 text-emerald-900 font-bold border border-emerald-200 shadow-xs' : 'text-slate-600 hover:text-slate-900 hover:bg-slate-50' }}">
                    <svg class="w-4 h-4 {{ request()->routeIs('admin.dashboard') ? 'text-emerald-700' : 'text-slate-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                    <span>Dashboard Analytics</span>
                </a>

                <a href="{{ route('admin.inquiries.index') }}" 
                   class="flex items-center space-x-3 px-3.5 py-2.5 rounded-xl transition duration-150 {{ request()->routeIs('admin.inquiries.*') ? 'bg-emerald-50/90 text-emerald-900 font-bold border border-emerald-200 shadow-xs' : 'text-slate-600 hover:text-slate-900 hover:bg-slate-50' }}">
                    <svg class="w-4 h-4 {{ request()->routeIs('admin.inquiries.*') ? 'text-rose-600' : 'text-slate-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                    <span>Customer Leads</span>
                    @php
                        $newInquiriesCount = \App\Models\Inquiry::where('status', 'new')->count();
                    @endphp
                    @if($newInquiriesCount > 0)
                        <span class="ml-auto bg-rose-50 text-rose-700 text-[10px] px-2 py-0.5 rounded-full font-extrabold border border-rose-200">
                            {{ $newInquiriesCount }} New
                        </span>
                    @endif
                </a>
            </div>

            <!-- Group 2: CATALOG & CONTENT -->
            <div class="space-y-1">
                <div class="text-[10px] font-extrabold text-slate-400 uppercase tracking-widest px-3 mb-2">Inventory & Media</div>
                
                <a href="{{ route('admin.properties.index') }}" 
                   class="flex items-center space-x-3 px-3.5 py-2.5 rounded-xl transition duration-150 {{ request()->routeIs('admin.properties.*') ? 'bg-emerald-50/90 text-emerald-900 font-bold border border-emerald-200 shadow-xs' : 'text-slate-600 hover:text-slate-900 hover:bg-slate-50' }}">
                    <svg class="w-4 h-4 {{ request()->routeIs('admin.properties.*') ? 'text-teal-700' : 'text-slate-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                    </svg>
                    <span>Properties Catalog</span>
                </a>

                <a href="{{ route('admin.site-images.index') }}" 
                   class="flex items-center space-x-3 px-3.5 py-2.5 rounded-xl transition duration-150 {{ request()->routeIs('admin.site-images.*') ? 'bg-emerald-50/90 text-emerald-900 font-bold border border-emerald-200 shadow-xs' : 'text-slate-600 hover:text-slate-900 hover:bg-slate-50' }}">
                    <svg class="w-4 h-4 {{ request()->routeIs('admin.site-images.*') ? 'text-indigo-700' : 'text-slate-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                    <span>Visual Banners</span>
                    <span class="ml-auto bg-indigo-50 text-indigo-700 text-[9px] px-2 py-0.5 rounded-full uppercase font-bold border border-indigo-200">10 Banners</span>
                </a>

                <a href="{{ route('admin.gallery.index') }}" 
                   class="flex items-center space-x-3 px-3.5 py-2.5 rounded-xl transition duration-150 {{ request()->routeIs('admin.gallery.*') ? 'bg-emerald-50/90 text-emerald-900 font-bold border border-emerald-200 shadow-xs' : 'text-slate-600 hover:text-slate-900 hover:bg-slate-50' }}">
                    <svg class="w-4 h-4 {{ request()->routeIs('admin.gallery.*') ? 'text-amber-600' : 'text-slate-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                    <span>Photo Showcase</span>
                </a>
            </div>

            <!-- Group 3: CONFIGURATION -->
            <div class="space-y-1">
                <div class="text-[10px] font-extrabold text-slate-400 uppercase tracking-widest px-3 mb-2">Master Controls</div>
                
                <a href="{{ route('admin.settings.index') }}" 
                   class="flex items-center space-x-3 px-3.5 py-2.5 rounded-xl transition duration-150 {{ request()->routeIs('admin.settings.*') ? 'bg-emerald-50/90 text-emerald-900 font-bold border border-emerald-200 shadow-xs' : 'text-slate-600 hover:text-slate-900 hover:bg-slate-50' }}">
                    <svg class="w-4 h-4 {{ request()->routeIs('admin.settings.*') ? 'text-purple-600' : 'text-slate-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"/>
                    </svg>
                    <span>Master Site Settings</span>
                    <span class="ml-auto bg-amber-50 text-amber-800 text-[9px] px-2 py-0.5 rounded-full uppercase font-bold border border-amber-200">Control All</span>
                </a>

                <a href="{{ route('home') }}" target="_blank" class="flex items-center space-x-3 px-3.5 py-2.5 rounded-xl text-slate-600 hover:text-emerald-700 hover:bg-slate-50 transition">
                    <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                    </svg>
                    <span>View Public Website</span>
                </a>
            </div>

        </nav>

        <!-- Admin Profile & Logout Footer -->
        <div class="p-4 border-t border-slate-100 bg-slate-50/60 text-xs">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-3 min-w-0">
                    <div class="w-9 h-9 rounded-full bg-slate-900 text-white font-extrabold flex items-center justify-center text-xs shrink-0 shadow-sm border border-slate-700">
                        {{ strtoupper(substr(Auth::user()->name ?? 'AD', 0, 2)) }}
                    </div>
                    <div class="min-w-0">
                        <div class="font-extrabold text-slate-900 truncate">{{ Auth::user()->name }}</div>
                        <div class="text-[10px] text-slate-500 truncate flex items-center space-x-1">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                            <span>Super Administrator</span>
                        </div>
                    </div>
                </div>
                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <button type="submit" class="p-2 text-slate-400 hover:text-rose-600 hover:bg-rose-50 rounded-xl transition" title="Log Out Securely">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                        </svg>
                    </button>
                </form>
            </div>
        </div>

    </aside>

    <!-- Main Admin Content Area -->
    <div class="flex-grow flex flex-col min-w-0 bg-[#f8fafc] min-h-screen overflow-y-auto">
        
        <!-- Top Modern Header -->
        <header class="bg-white/95 backdrop-blur-md border-b border-slate-200/80 py-3.5 px-6 sm:px-8 flex items-center justify-between sticky top-0 z-30 shadow-2xs">
            <div class="flex items-center space-x-4">
                <div>
                    <h2 class="text-lg font-black text-slate-900 tracking-tight flex items-center space-x-2">
                        <span>@yield('header_title', 'Control Center')</span>
                    </h2>
                    <div class="text-xs text-slate-500 hidden sm:flex items-center space-x-2 mt-0.5">
                        <span>Workspace</span>
                        <span class="text-slate-300">/</span>
                        <span class="text-emerald-700 font-semibold">Active Production</span>
                    </div>
                </div>
            </div>
            
            <div class="flex items-center space-x-3">
                <a href="{{ route('home') }}" target="_blank" class="px-3 py-1.5 bg-slate-50 hover:bg-slate-100 text-slate-700 rounded-xl text-xs font-semibold transition flex items-center space-x-1.5 border border-slate-200 hidden md:flex">
                    <svg class="w-3.5 h-3.5 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                    </svg>
                    <span>View Site</span>
                </a>
                <a href="{{ route('admin.settings.index') }}" class="px-3.5 py-2 bg-slate-100 hover:bg-slate-200/80 text-slate-700 rounded-xl text-xs font-bold transition flex items-center space-x-1.5 border border-slate-200">
                    <svg class="w-3.5 h-3.5 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"/>
                    </svg>
                    <span>Settings</span>
                </a>
                <a href="{{ route('admin.properties.create') }}" class="px-4 py-2 bg-brand-primary hover:bg-brand-dark text-white rounded-xl text-xs font-bold transition flex items-center space-x-1.5 shadow-sm shadow-emerald-600/25">
                    <span>+ Add Property</span>
                </a>
            </div>
        </header>

        <!-- Flash Notifications -->
        <div class="px-6 sm:px-8 pt-4">
            @if (session('success'))
                <div class="bg-emerald-50 border border-emerald-200 text-emerald-800 text-xs p-3.5 rounded-2xl mb-4 flex items-center justify-between shadow-xs">
                    <span class="flex items-center space-x-2">
                        <span class="w-5 h-5 rounded-full bg-emerald-600 text-white flex items-center justify-center font-bold text-xs shrink-0">✓</span>
                        <span class="font-medium">{{ session('success') }}</span>
                    </span>
                    <button onclick="this.parentElement.remove()" class="text-emerald-500 hover:text-emerald-900 text-lg leading-none">&times;</button>
                </div>
            @endif
            @if (session('error'))
                <div class="bg-rose-50 border border-rose-200 text-rose-800 text-xs p-3.5 rounded-2xl mb-4 flex items-center justify-between shadow-xs">
                    <span class="flex items-center space-x-2">
                        <span class="w-5 h-5 rounded-full bg-rose-600 text-white flex items-center justify-center font-bold text-xs shrink-0">✕</span>
                        <span class="font-medium">{{ session('error') }}</span>
                    </span>
                    <button onclick="this.parentElement.remove()" class="text-rose-500 hover:text-rose-900 text-lg leading-none">&times;</button>
                </div>
            @endif
        </div>

        <main class="p-6 sm:p-8 flex-grow">
            @yield('content')
        </main>
    </div>

</body>
</html>
