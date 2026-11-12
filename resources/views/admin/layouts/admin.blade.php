<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-slate-900">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Admin Dashboard') | {{ $siteSettings['brand_name'] ?? 'AG HOMES INDIA' }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:wght@400..700&display=swap" rel="stylesheet">

    <!-- Centralized Dynamic Colors in Admin too -->
    <style>
        :root {
            --brand-primary: {{ $siteSettings['brand_primary_color'] ?? '#2f9049' }};
            --brand-primary-dark: {{ $siteSettings['brand_primary_dark'] ?? '#236c37' }};
            --brand-topbar: {{ $siteSettings['brand_topbar_color'] ?? '#18202d' }};
        }
    </style>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-full bg-slate-950 text-slate-100 font-sans flex antialiased">

    <!-- Sidebar Navigation -->
    <aside class="w-64 bg-slate-900 border-r border-slate-800 flex flex-col shrink-0 min-h-screen">
        
        <!-- Logo Header -->
        <div class="p-5 border-b border-slate-800 flex items-center justify-between">
            <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-2">
                <span class="w-8 h-8 rounded-lg bg-emerald-600 text-white flex items-center justify-center font-bold text-sm shadow">
                    AG
                </span>
                <div>
                    <div class="font-extrabold text-sm text-white tracking-wide">AG HOMES</div>
                    <div class="text-[10px] text-emerald-400 font-bold uppercase tracking-wider">Admin Panel</div>
                </div>
            </a>
        </div>

        <!-- Navigation Links -->
        <nav class="flex-grow p-4 space-y-1 text-xs font-semibold">
            
            <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-3 px-3.5 py-2.5 rounded-xl transition {{ request()->routeIs('admin.dashboard') ? 'bg-brand-primary text-white font-bold' : 'text-slate-400 hover:text-white hover:bg-slate-800' }}">
                <span class="text-base">📊</span>
                <span>Dashboard Overview</span>
            </a>

            <!-- High Priority: Site Images Manager -->
            <a href="{{ route('admin.site-images.index') }}" class="flex items-center space-x-3 px-3.5 py-2.5 rounded-xl transition {{ request()->routeIs('admin.site-images.*') ? 'bg-brand-primary text-white font-bold shadow-md' : 'text-emerald-400 hover:text-white hover:bg-slate-800' }}">
                <span class="text-base">🖼️</span>
                <span>Site Images & Banners</span>
                <span class="ml-auto bg-emerald-950 text-emerald-300 text-[9px] px-1.5 py-0.5 rounded uppercase font-bold border border-emerald-800">Custom</span>
            </a>

            <a href="{{ route('admin.properties.index') }}" class="flex items-center space-x-3 px-3.5 py-2.5 rounded-xl transition {{ request()->routeIs('admin.properties.*') ? 'bg-brand-primary text-white font-bold' : 'text-slate-400 hover:text-white hover:bg-slate-800' }}">
                <span class="text-base">🏡</span>
                <span>Manage Properties</span>
            </a>

            <a href="{{ route('admin.gallery.index') }}" class="flex items-center space-x-3 px-3.5 py-2.5 rounded-xl transition {{ request()->routeIs('admin.gallery.*') ? 'bg-brand-primary text-white font-bold' : 'text-slate-400 hover:text-white hover:bg-slate-800' }}">
                <span class="text-base">📸</span>
                <span>Manage Gallery</span>
            </a>

            <a href="{{ route('admin.inquiries.index') }}" class="flex items-center space-x-3 px-3.5 py-2.5 rounded-xl transition {{ request()->routeIs('admin.inquiries.*') ? 'bg-brand-primary text-white font-bold' : 'text-slate-400 hover:text-white hover:bg-slate-800' }}">
                <span class="text-base">📬</span>
                <span>Inquiries & Leads</span>
                @php
                    $newInquiriesCount = \App\Models\Inquiry::where('status', 'new')->count();
                @endphp
                @if($newInquiriesCount > 0)
                    <span class="ml-auto bg-rose-600 text-white text-[10px] px-2 py-0.5 rounded-full font-bold">
                        {{ $newInquiriesCount }}
                    </span>
                @endif
            </a>

            <a href="{{ route('admin.settings.index') }}" class="flex items-center space-x-3 px-3.5 py-2.5 rounded-xl transition {{ request()->routeIs('admin.settings.*') ? 'bg-brand-primary text-white font-bold' : 'text-slate-400 hover:text-white hover:bg-slate-800' }}">
                <span class="text-base">🎨</span>
                <span>Theme Colors & Settings</span>
            </a>

            <div class="pt-6 pb-2">
                <div class="text-[10px] font-bold text-slate-500 uppercase tracking-widest px-3">Quick Navigation</div>
            </div>

            <a href="{{ route('home') }}" target="_blank" class="flex items-center space-x-3 px-3.5 py-2.5 rounded-xl text-slate-400 hover:text-emerald-400 hover:bg-slate-800 transition">
                <span class="text-base">🌐</span>
                <span>View Public Site &rarr;</span>
            </a>
        </nav>

        <!-- Admin Profile & Logout -->
        <div class="p-4 border-t border-slate-800 text-xs">
            <div class="flex items-center justify-between">
                <div>
                    <div class="font-bold text-white">{{ Auth::user()->name }}</div>
                    <div class="text-[10px] text-slate-500">{{ Auth::user()->email }}</div>
                </div>
                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <button type="submit" class="p-2 text-rose-400 hover:text-rose-300 hover:bg-rose-950/50 rounded-lg transition" title="Log Out">
                        🚪
                    </button>
                </form>
            </div>
        </div>

    </aside>

    <!-- Main Admin Content Area -->
    <div class="flex-grow flex flex-col min-w-0 bg-slate-950 min-h-screen overflow-y-auto">
        
        <!-- Top Admin Header -->
        <header class="bg-slate-900 border-b border-slate-800 py-3.5 px-6 sm:px-8 flex items-center justify-between">
            <h2 class="text-lg font-bold text-white">
                @yield('header_title', 'Control Center')
            </h2>
            <div class="flex items-center space-x-3">
                <a href="{{ route('admin.properties.create') }}" class="px-3 py-1.5 bg-brand-primary hover:bg-brand-dark text-white rounded-lg text-xs font-bold transition flex items-center space-x-1 shadow">
                    <span>+ Add Property</span>
                </a>
            </div>
        </header>

        <!-- Flash Notifications -->
        <div class="px-6 sm:px-8 pt-4">
            @if (session('success'))
                <div class="bg-emerald-950/80 border border-emerald-500/50 text-emerald-200 text-xs p-3.5 rounded-xl mb-4 flex items-center justify-between shadow">
                    <span>✓ {{ session('success') }}</span>
                    <button onclick="this.parentElement.remove()" class="text-emerald-400 hover:text-white">&times;</button>
                </div>
            @endif
            @if (session('error'))
                <div class="bg-rose-950/80 border border-rose-500/50 text-rose-200 text-xs p-3.5 rounded-xl mb-4 flex items-center justify-between shadow">
                    <span>✕ {{ session('error') }}</span>
                    <button onclick="this.parentElement.remove()" class="text-rose-400 hover:text-white">&times;</button>
                </div>
            @endif
        </div>

        <main class="p-6 sm:p-8 flex-grow">
            @yield('content')
        </main>
    </div>

</body>
</html>

