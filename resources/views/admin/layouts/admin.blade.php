<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-slate-50">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Admin Dashboard') | {{ $siteSettings['brand_name'] ?? 'RealEstate' }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:wght@400..700&display=swap" rel="stylesheet">

    <!-- Centralized Dynamic Colors in Admin -->
    <style>
        :root {
            --brand-primary: {{ $siteSettings['brand_primary_color'] ?? '#2f9049' }};
            --brand-primary-dark: {{ $siteSettings['brand_primary_dark'] ?? '#236c37' }};
            --brand-topbar: {{ $siteSettings['brand_topbar_color'] ?? '#18202d' }};
        }
    </style>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-full bg-slate-50 text-slate-800 font-sans flex antialiased">

    <!-- Sidebar Navigation -->
    <aside class="w-64 bg-white border-r border-slate-200/80 flex flex-col shrink-0 min-h-screen shadow-[1px_0_10px_rgba(0,0,0,0.02)] z-20">
        
        <!-- Logo Header -->
        <div class="p-5 border-b border-slate-100 flex items-center justify-between">
            <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-3">
                <div class="w-9 h-9 rounded-xl bg-gradient-to-tr from-emerald-700 to-emerald-500 text-white flex items-center justify-center font-black text-sm shadow-md shadow-emerald-500/20">
                    RE
                </div>
                <div>
                    <div class="font-extrabold text-sm text-slate-900 tracking-tight">{{ $siteSettings['brand_name'] ?? 'RealEstate' }}</div>
                    <div class="text-[10px] text-emerald-700 font-bold uppercase tracking-wider flex items-center space-x-1">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                        <span>Control Center</span>
                    </div>
                </div>
            </a>
        </div>

        <!-- Navigation Links -->
        <nav class="flex-grow p-4 space-y-1.5 text-xs font-semibold overflow-y-auto">
            
            <a href="{{ route('admin.dashboard') }}" 
               class="flex items-center space-x-3 px-3.5 py-2.5 rounded-xl transition duration-150 {{ request()->routeIs('admin.dashboard') ? 'bg-emerald-50 text-emerald-900 font-bold border border-emerald-200/70 shadow-xs' : 'text-slate-600 hover:text-slate-900 hover:bg-slate-100/70' }}">
                <span class="text-base">📊</span>
                <span>Dashboard Overview</span>
            </a>

            <!-- High Priority: Site Images Manager -->
            <a href="{{ route('admin.site-images.index') }}" 
               class="flex items-center space-x-3 px-3.5 py-2.5 rounded-xl transition duration-150 {{ request()->routeIs('admin.site-images.*') ? 'bg-emerald-50 text-emerald-900 font-bold border border-emerald-200/70 shadow-xs' : 'text-slate-600 hover:text-slate-900 hover:bg-slate-100/70' }}">
                <span class="text-base">🖼️</span>
                <span>Images & Banners</span>
                <span class="ml-auto bg-emerald-100 text-emerald-800 text-[9px] px-2 py-0.5 rounded-full uppercase font-bold border border-emerald-200">Visual</span>
            </a>

            <a href="{{ route('admin.properties.index') }}" 
               class="flex items-center space-x-3 px-3.5 py-2.5 rounded-xl transition duration-150 {{ request()->routeIs('admin.properties.*') ? 'bg-emerald-50 text-emerald-900 font-bold border border-emerald-200/70 shadow-xs' : 'text-slate-600 hover:text-slate-900 hover:bg-slate-100/70' }}">
                <span class="text-base">🏡</span>
                <span>Manage Properties</span>
            </a>

            <a href="{{ route('admin.gallery.index') }}" 
               class="flex items-center space-x-3 px-3.5 py-2.5 rounded-xl transition duration-150 {{ request()->routeIs('admin.gallery.*') ? 'bg-emerald-50 text-emerald-900 font-bold border border-emerald-200/70 shadow-xs' : 'text-slate-600 hover:text-slate-900 hover:bg-slate-100/70' }}">
                <span class="text-base">📸</span>
                <span>Photo Gallery</span>
            </a>

            <a href="{{ route('admin.inquiries.index') }}" 
               class="flex items-center space-x-3 px-3.5 py-2.5 rounded-xl transition duration-150 {{ request()->routeIs('admin.inquiries.*') ? 'bg-emerald-50 text-emerald-900 font-bold border border-emerald-200/70 shadow-xs' : 'text-slate-600 hover:text-slate-900 hover:bg-slate-100/70' }}">
                <span class="text-base">📬</span>
                <span>Inquiries & Leads</span>
                @php
                    $newInquiriesCount = \App\Models\Inquiry::where('status', 'new')->count();
                @endphp
                @if($newInquiriesCount > 0)
                    <span class="ml-auto bg-rose-100 text-rose-700 text-[10px] px-2 py-0.5 rounded-full font-bold border border-rose-200">
                        {{ $newInquiriesCount }} New
                    </span>
                @endif
            </a>

            <a href="{{ route('admin.settings.index') }}" 
               class="flex items-center space-x-3 px-3.5 py-2.5 rounded-xl transition duration-150 {{ request()->routeIs('admin.settings.*') ? 'bg-emerald-50 text-emerald-900 font-bold border border-emerald-200/70 shadow-xs' : 'text-slate-600 hover:text-slate-900 hover:bg-slate-100/70' }}">
                <span class="text-base">⚙️</span>
                <span>Master Settings</span>
                <span class="ml-auto bg-amber-100 text-amber-800 text-[9px] px-2 py-0.5 rounded-full uppercase font-bold border border-amber-200">Full</span>
            </a>

            <div class="pt-6 pb-2">
                <div class="text-[10px] font-bold text-slate-400 uppercase tracking-widest px-3">Public Portal</div>
            </div>

            <a href="{{ route('home') }}" target="_blank" class="flex items-center space-x-3 px-3.5 py-2.5 rounded-xl text-slate-600 hover:text-emerald-700 hover:bg-slate-100/70 transition">
                <span class="text-base">🌐</span>
                <span>Open Live Website</span>
                <svg class="w-3.5 h-3.5 ml-auto text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                </svg>
            </a>
        </nav>

        <!-- Admin Profile & Logout Footer -->
        <div class="p-4 border-t border-slate-100 bg-slate-50/50 text-xs">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-3 min-w-0">
                    <div class="w-8 h-8 rounded-full bg-slate-900 text-white font-bold flex items-center justify-center text-xs shrink-0 shadow-sm">
                        {{ strtoupper(substr(Auth::user()->name ?? 'AD', 0, 2)) }}
                    </div>
                    <div class="min-w-0">
                        <div class="font-bold text-slate-900 truncate">{{ Auth::user()->name }}</div>
                        <div class="text-[10px] text-slate-500 truncate">Administrator</div>
                    </div>
                </div>
                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <button type="submit" class="p-2 text-slate-400 hover:text-rose-600 hover:bg-rose-50 rounded-lg transition" title="Log Out">
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
        <header class="bg-white/95 backdrop-blur-md border-b border-slate-200/80 py-3.5 px-6 sm:px-8 flex items-center justify-between sticky top-0 z-30 shadow-xs">
            <div>
                <h2 class="text-lg font-black text-slate-900 tracking-tight">
                    @yield('header_title', 'Control Center')
                </h2>
                <p class="text-xs text-slate-500 hidden sm:block">Manage your real estate listings, visual media, client inquiries, and global settings</p>
            </div>
            
            <div class="flex items-center space-x-3">
                <a href="{{ route('admin.settings.index') }}" class="px-3.5 py-2 bg-slate-100 hover:bg-slate-200/80 text-slate-700 rounded-xl text-xs font-bold transition flex items-center space-x-1.5 border border-slate-200">
                    <span>⚙️ Settings</span>
                </a>
                <a href="{{ route('admin.properties.create') }}" class="px-4 py-2 bg-brand-primary hover:bg-brand-dark text-white rounded-xl text-xs font-bold transition flex items-center space-x-1.5 shadow-sm shadow-emerald-600/20">
                    <span>+ Add Property</span>
                </a>
            </div>
        </header>

        <!-- Flash Notifications -->
        <div class="px-6 sm:px-8 pt-4">
            @if (session('success'))
                <div class="bg-emerald-50 border border-emerald-200 text-emerald-800 text-xs p-3.5 rounded-2xl mb-4 flex items-center justify-between shadow-xs">
                    <span class="flex items-center space-x-2">
                        <span class="font-bold text-emerald-600 text-sm">✓</span>
                        <span>{{ session('success') }}</span>
                    </span>
                    <button onclick="this.parentElement.remove()" class="text-emerald-500 hover:text-emerald-900 text-lg leading-none">&times;</button>
                </div>
            @endif
            @if (session('error'))
                <div class="bg-rose-50 border border-rose-200 text-rose-800 text-xs p-3.5 rounded-2xl mb-4 flex items-center justify-between shadow-xs">
                    <span class="flex items-center space-x-2">
                        <span class="font-bold text-rose-600 text-sm">✕</span>
                        <span>{{ session('error') }}</span>
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
