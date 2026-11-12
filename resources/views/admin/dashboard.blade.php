@extends('admin.layouts.admin')

@section('title', 'Admin Dashboard')
@section('header_title', 'Administrative Overview')

@section('content')

    <!-- Welcome Banner with Live Clock & System Status -->
    <div class="mb-8 bg-white border border-slate-200/80 rounded-3xl p-6 sm:p-7 shadow-xs flex flex-col lg:flex-row lg:items-center justify-between gap-6">
        <div class="flex items-center space-x-4">
            <div class="w-14 h-14 rounded-2xl bg-gradient-to-tr from-emerald-600 to-teal-500 text-white flex items-center justify-center text-2xl shadow-lg shadow-emerald-500/20 shrink-0">
                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                </svg>
            </div>
            <div>
                <div class="flex items-center space-x-2">
                    <h3 class="text-xl font-black text-slate-900 tracking-tight">Welcome, {{ Auth::user()->name }}</h3>
                    <span class="bg-emerald-50 text-emerald-800 text-[10px] font-extrabold px-2 py-0.5 rounded-full border border-emerald-200">
                        Active Session
                    </span>
                </div>
                <p class="text-xs text-slate-500 mt-1">Here is a summary of your property portfolio, client leads, and site performance today.</p>
            </div>
        </div>

        <div class="flex flex-wrap items-center gap-3 shrink-0">
            <div class="px-3.5 py-2 rounded-xl bg-slate-50 border border-slate-200/80 text-xs font-semibold text-slate-600 flex items-center space-x-2">
                <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                <span>Production Environment</span>
                <span class="text-slate-300">|</span>
                <span class="font-mono text-slate-500 text-[11px]">{{ date('D, d M Y') }}</span>
            </div>
            <a href="{{ route('admin.properties.create') }}" class="px-4 py-2 bg-brand-primary hover:bg-brand-dark text-white rounded-xl text-xs font-bold transition shadow-sm shadow-emerald-600/20 flex items-center space-x-1.5">
                <span>+ Add Property</span>
            </a>
        </div>
    </div>

    <!-- 6 KPI Metric Cards -->
    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-4 mb-8">
        
        <!-- Total Properties -->
        <div class="bg-white border border-slate-200/80 p-5 rounded-2xl shadow-xs hover:shadow-md hover:border-slate-300 transition duration-200 flex flex-col justify-between">
            <div class="flex items-center justify-between">
                <span class="text-[11px] text-slate-500 font-bold uppercase tracking-wider">Properties</span>
                <div class="w-8 h-8 rounded-xl bg-emerald-50 text-emerald-700 flex items-center justify-center">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                </div>
            </div>
            <div class="my-3">
                <div class="text-3xl font-black text-slate-900 tracking-tight">{{ $stats['total_properties'] }}</div>
                <div class="text-[11px] text-emerald-700 font-bold mt-1 flex items-center space-x-1">
                    <span>Listed & Active</span>
                </div>
            </div>
            <a href="{{ route('admin.properties.index') }}" class="text-[11px] font-bold text-slate-500 hover:text-emerald-700 flex items-center space-x-1">
                <span>View catalog</span>
                <span>&rarr;</span>
            </a>
        </div>

        <!-- Eco Homes -->
        <div class="bg-white border border-slate-200/80 p-5 rounded-2xl shadow-xs hover:shadow-md hover:border-slate-300 transition duration-200 flex flex-col justify-between">
            <div class="flex items-center justify-between">
                <span class="text-[11px] text-slate-500 font-bold uppercase tracking-wider">Eco Homes</span>
                <div class="w-8 h-8 rounded-xl bg-teal-50 text-teal-700 flex items-center justify-center">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/>
                    </svg>
                </div>
            </div>
            <div class="my-3">
                <div class="text-3xl font-black text-teal-700 tracking-tight">{{ $stats['eco_properties'] }}</div>
                <div class="text-[11px] text-slate-500 font-medium mt-1">Green Certified</div>
            </div>
            <span class="text-[11px] font-bold text-teal-700">100% Certified</span>
        </div>

        <!-- Total Leads -->
        <div class="bg-white border border-slate-200/80 p-5 rounded-2xl shadow-xs hover:shadow-md hover:border-slate-300 transition duration-200 flex flex-col justify-between">
            <div class="flex items-center justify-between">
                <span class="text-[11px] text-slate-500 font-bold uppercase tracking-wider">Total Leads</span>
                <div class="w-8 h-8 rounded-xl bg-blue-50 text-blue-700 flex items-center justify-center">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                </div>
            </div>
            <div class="my-3">
                <div class="text-3xl font-black text-slate-900 tracking-tight">{{ $stats['total_inquiries'] }}</div>
                <div class="text-[11px] text-blue-700 font-bold mt-1">Client Inquiries</div>
            </div>
            <a href="{{ route('admin.inquiries.index') }}" class="text-[11px] font-bold text-slate-500 hover:text-blue-700 flex items-center space-x-1">
                <span>View leads</span>
                <span>&rarr;</span>
            </a>
        </div>

        <!-- New Inquiries -->
        <div class="bg-white border border-slate-200/80 p-5 rounded-2xl shadow-xs hover:shadow-md hover:border-slate-300 transition duration-200 flex flex-col justify-between {{ $stats['new_inquiries'] > 0 ? 'ring-2 ring-rose-500/20' : '' }}">
            <div class="flex items-center justify-between">
                <span class="text-[11px] text-slate-500 font-bold uppercase tracking-wider">New Leads</span>
                <div class="w-8 h-8 rounded-xl bg-rose-50 text-rose-700 flex items-center justify-center">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                    </svg>
                </div>
            </div>
            <div class="my-3">
                <div class="text-3xl font-black text-rose-600 tracking-tight">{{ $stats['new_inquiries'] }}</div>
                <div class="text-[11px] text-rose-600 font-bold mt-1">Action Required</div>
            </div>
            <a href="{{ route('admin.inquiries.index', ['status' => 'new']) }}" class="text-[11px] font-bold text-rose-600 hover:text-rose-700 flex items-center space-x-1">
                <span>Respond now</span>
                <span>&rarr;</span>
            </a>
        </div>

        <!-- Gallery Assets -->
        <div class="bg-white border border-slate-200/80 p-5 rounded-2xl shadow-xs hover:shadow-md hover:border-slate-300 transition duration-200 flex flex-col justify-between">
            <div class="flex items-center justify-between">
                <span class="text-[11px] text-slate-500 font-bold uppercase tracking-wider">Gallery</span>
                <div class="w-8 h-8 rounded-xl bg-amber-50 text-amber-700 flex items-center justify-center">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"/>
                    </svg>
                </div>
            </div>
            <div class="my-3">
                <div class="text-3xl font-black text-slate-900 tracking-tight">{{ $stats['gallery_items'] }}</div>
                <div class="text-[11px] text-slate-500 font-medium mt-1">Project Photos</div>
            </div>
            <a href="{{ route('admin.gallery.index') }}" class="text-[11px] font-bold text-slate-500 hover:text-amber-700 flex items-center space-x-1">
                <span>Upload photos</span>
                <span>&rarr;</span>
            </a>
        </div>

        <!-- Site Media Banners -->
        <div class="bg-white border border-slate-200/80 p-5 rounded-2xl shadow-xs hover:shadow-md hover:border-slate-300 transition duration-200 flex flex-col justify-between">
            <div class="flex items-center justify-between">
                <span class="text-[11px] text-slate-500 font-bold uppercase tracking-wider">Banners</span>
                <div class="w-8 h-8 rounded-xl bg-purple-50 text-purple-700 flex items-center justify-center">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                </div>
            </div>
            <div class="my-3">
                <div class="text-3xl font-black text-purple-700 tracking-tight">{{ $stats['site_images'] }}</div>
                <div class="text-[11px] text-slate-500 font-medium mt-1">Custom Banners</div>
            </div>
            <a href="{{ route('admin.site-images.index') }}" class="text-[11px] font-bold text-slate-500 hover:text-purple-700 flex items-center space-x-1">
                <span>Edit visuals</span>
                <span>&rarr;</span>
            </a>
        </div>

    </div>

    <!-- Quick Action Control Cards (3 Columns) -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        
        <!-- Action 1: Master Settings -->
        <div class="bg-white border border-slate-200/80 rounded-3xl p-6 shadow-xs hover:shadow-md transition duration-200 flex flex-col justify-between group">
            <div class="space-y-3">
                <div class="w-10 h-10 rounded-2xl bg-purple-50 text-purple-700 flex items-center justify-center font-bold">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"/>
                    </svg>
                </div>
                <div>
                    <h4 class="font-extrabold text-slate-900 text-base">Full Website Master Settings</h4>
                    <p class="text-xs text-slate-500 mt-1 leading-relaxed">
                        Control brand identity, colors, team members, client reviews, and FAQs dynamically from one panel.
                    </p>
                </div>
            </div>
            <div class="pt-5 mt-4 border-t border-slate-100">
                <a href="{{ route('admin.settings.index') }}" class="text-xs font-black text-emerald-700 group-hover:text-emerald-800 flex items-center space-x-1">
                    <span>Open Master Settings</span>
                    <span>&rarr;</span>
                </a>
            </div>
        </div>

        <!-- Action 2: Visual Banners -->
        <div class="bg-white border border-slate-200/80 rounded-3xl p-6 shadow-xs hover:shadow-md transition duration-200 flex flex-col justify-between group">
            <div class="space-y-3">
                <div class="w-10 h-10 rounded-2xl bg-indigo-50 text-indigo-700 flex items-center justify-center font-bold">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                </div>
                <div>
                    <h4 class="font-extrabold text-slate-900 text-base">Site Images & Banners</h4>
                    <p class="text-xs text-slate-500 mt-1 leading-relaxed">
                        Replace your homepage hero picture, logos, mission visual, contact banner, and login screen backgrounds.
                    </p>
                </div>
            </div>
            <div class="pt-5 mt-4 border-t border-slate-100">
                <a href="{{ route('admin.site-images.index') }}" class="text-xs font-black text-indigo-700 group-hover:text-indigo-800 flex items-center space-x-1">
                    <span>Manage All 10 Banners</span>
                    <span>&rarr;</span>
                </a>
            </div>
        </div>

        <!-- Action 3: Add New Listing -->
        <div class="bg-gradient-to-br from-emerald-800 to-teal-900 text-white rounded-3xl p-6 shadow-md shadow-emerald-950/10 flex flex-col justify-between">
            <div class="space-y-3">
                <div class="w-10 h-10 rounded-2xl bg-white/10 backdrop-blur-sm text-emerald-300 flex items-center justify-center font-bold border border-white/20">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                </div>
                <div>
                    <h4 class="font-black text-white text-base">Publish New Property</h4>
                    <p class="text-xs text-emerald-100 mt-1 leading-relaxed">
                        Add a luxury villa, eco apartment, or residential plot with price, amenities, and photo gallery.
                    </p>
                </div>
            </div>
            <div class="pt-5 mt-4 border-t border-white/10">
                <a href="{{ route('admin.properties.create') }}" class="px-4 py-2 bg-white text-emerald-950 hover:bg-emerald-50 text-xs font-black rounded-xl transition shadow-xs inline-flex items-center space-x-1">
                    <span>Create New Listing &rarr;</span>
                </a>
            </div>
        </div>

    </div>

    <!-- Two Column Recent Activity -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        
        <!-- Recent Client Inquiries -->
        <div class="bg-white border border-slate-200/80 rounded-3xl p-6 sm:p-7 shadow-xs">
            <div class="flex items-center justify-between mb-5 pb-3 border-b border-slate-100">
                <div>
                    <h3 class="font-extrabold text-base text-slate-900">Recent Customer Inquiries</h3>
                    <p class="text-xs text-slate-500 mt-0.5">Leads submitted via property pages and contact forms</p>
                </div>
                <a href="{{ route('admin.inquiries.index') }}" class="text-xs font-bold text-emerald-700 hover:text-emerald-800 flex items-center space-x-1">
                    <span>View All Leads</span>
                    <span>&rarr;</span>
                </a>
            </div>

            <div class="space-y-3">
                @forelse($recentInquiries as $inq)
                    <div class="p-4 bg-slate-50/70 hover:bg-slate-50 border border-slate-200/70 rounded-2xl flex items-center justify-between text-xs transition duration-150">
                        <div class="min-w-0 pr-3">
                            <div class="flex items-center space-x-2">
                                <span class="font-black text-slate-900 text-sm truncate">{{ $inq->name }}</span>
                                <span class="px-2.5 py-0.5 rounded-full text-[10px] font-extrabold uppercase tracking-wider {{ $inq->status === 'new' ? 'bg-rose-50 text-rose-700 border border-rose-200' : 'bg-emerald-50 text-emerald-700 border border-emerald-200' }}">
                                    {{ $inq->status }}
                                </span>
                            </div>
                            <div class="text-slate-600 text-xs mt-1 flex flex-wrap items-center gap-2">
                                <a href="tel:{{ $inq->phone }}" class="font-bold text-emerald-700 hover:underline">📞 {{ $inq->phone }}</a>
                                <span>&bull;</span>
                                <span class="text-slate-500 truncate">{{ $inq->email }}</span>
                            </div>
                            @if($inq->message)
                                <div class="text-slate-600 text-[11px] mt-2 line-clamp-1 italic bg-white px-2.5 py-1.5 rounded-lg border border-slate-200/60">
                                    &ldquo;{{ $inq->message }}&rdquo;
                                </div>
                            @endif
                        </div>
                        <div class="shrink-0 flex items-center space-x-2">
                            <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $inq->phone) }}?text=Hello%20{{ urlencode($inq->name) }},%20thank%20you%20for%20contacting%20us." target="_blank" class="p-2 bg-[#25D366]/10 text-[#25D366] hover:bg-[#25D366] hover:text-white rounded-xl transition" title="WhatsApp Lead">
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                                    <path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.711 2.598 2.664-.698c.969.584 1.961.949 2.796.949 3.182 0 5.768-2.587 5.769-5.767.001-3.182-2.585-5.769-5.769-5.769zm3.366 8.163c-.141.398-.711.758-1.042.807-.323.048-.737.078-2.392-.609-1.996-.827-3.256-2.883-3.356-3.016-.099-.134-.805-1.071-.805-2.043 0-.972.51-1.45.692-1.649.182-.198.397-.248.529-.248.132 0 .265.003.38.009.123.007.288-.047.45.342.166.398.563 1.373.612 1.473.05.1.083.217.017.348-.066.133-.1.216-.199.332-.099.117-.208.261-.297.35-.1.1-.205.209-.089.409.116.199.516.852 1.109 1.38 1.053.937 1.942 1.228 2.218 1.365.276.137.439.116.602-.07.163-.186.7-.813.886-1.092.186-.279.372-.232.628-.139.256.093 1.623.765 1.902.904.279.14.465.209.535.326.07.116.07.674-.071 1.072z"/>
                                </svg>
                            </a>
                            <a href="{{ route('admin.inquiries.index') }}" class="px-3 py-1.5 bg-white hover:bg-slate-100 border border-slate-300 rounded-xl text-[11px] font-bold text-slate-700 transition shadow-2xs">
                                Review
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="text-xs text-slate-400 py-10 text-center">
                        <div class="text-3xl mb-2">📬</div>
                        <p class="font-bold text-slate-700">No customer inquiries yet</p>
                        <p class="text-[11px] text-slate-400 mt-0.5">Inquiries from the website contact forms will appear here.</p>
                    </div>
                @endforelse
            </div>
        </div>

        <!-- Latest Properties Published -->
        <div class="bg-white border border-slate-200/80 rounded-3xl p-6 sm:p-7 shadow-xs">
            <div class="flex items-center justify-between mb-5 pb-3 border-b border-slate-100">
                <div>
                    <h3 class="font-extrabold text-base text-slate-900">Latest Properties</h3>
                    <p class="text-xs text-slate-500 mt-0.5">Recently published residential & commercial listings</p>
                </div>
                <a href="{{ route('admin.properties.index') }}" class="text-xs font-bold text-emerald-700 hover:text-emerald-800 flex items-center space-x-1">
                    <span>Manage Catalog</span>
                    <span>&rarr;</span>
                </a>
            </div>

            <div class="space-y-3">
                @foreach($recentProperties as $prop)
                    <div class="p-3.5 bg-slate-50/70 hover:bg-slate-50 border border-slate-200/70 rounded-2xl flex items-center space-x-3.5 text-xs transition duration-150">
                        <img src="{{ $prop->main_image_url }}" alt="{{ $prop->title }}" class="w-14 h-14 rounded-xl object-cover shrink-0 bg-slate-200 border border-slate-200 shadow-2xs">
                        <div class="min-w-0 flex-grow">
                            <div class="font-black text-slate-900 text-sm truncate">{{ $prop->title }}</div>
                            <div class="text-emerald-700 font-black text-xs mt-0.5">{{ $prop->price_display }}</div>
                            <div class="text-slate-500 text-[11px] truncate flex items-center space-x-1 mt-0.5">
                                <span>📍</span>
                                <span>{{ $prop->location }}, {{ $prop->city }}</span>
                            </div>
                        </div>
                        <div class="shrink-0 flex items-center space-x-1.5">
                            <a href="{{ route('properties.show', $prop->slug) }}" target="_blank" class="p-2 text-slate-400 hover:text-slate-700 rounded-xl hover:bg-white border border-transparent hover:border-slate-200 transition" title="Preview Public Page">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                                </svg>
                            </a>
                            <a href="{{ route('admin.properties.edit', $prop->id) }}" class="px-3 py-1.5 bg-white hover:bg-slate-100 border border-slate-300 rounded-xl text-[11px] font-bold text-slate-700 transition shadow-2xs">
                                Edit
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>

@endsection
