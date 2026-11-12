@extends('admin.layouts.admin')

@section('title', 'Admin Dashboard')
@section('header_title', 'Administrative Overview')

@section('content')

    <!-- Welcome Banner with Quick Live Status -->
    <div class="mb-8 flex flex-col md:flex-row md:items-center justify-between gap-4 bg-white p-6 rounded-3xl border border-slate-200/80 shadow-xs">
        <div class="flex items-center space-x-4">
            <div class="w-12 h-12 rounded-2xl bg-emerald-100 text-emerald-700 flex items-center justify-center text-2xl shadow-inner shrink-0">
                🏡
            </div>
            <div>
                <h3 class="text-lg font-black text-slate-900 tracking-tight">Welcome back, {{ Auth::user()->name }}!</h3>
                <p class="text-xs text-slate-500 mt-0.5">Here is what is happening across your listings, client leads, and site performance today.</p>
            </div>
        </div>
        <div class="flex items-center space-x-2 shrink-0">
            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-emerald-50 text-emerald-700 border border-emerald-200">
                <span class="w-2 h-2 rounded-full bg-emerald-500 mr-2 animate-pulse"></span>
                System Live & Operational
            </span>
            <a href="{{ route('home') }}" target="_blank" class="px-4 py-2 bg-slate-900 hover:bg-slate-800 text-white rounded-xl text-xs font-bold transition flex items-center space-x-1 shadow-xs">
                <span>Preview Site &rarr;</span>
            </a>
        </div>
    </div>

    <!-- 6 High-Impact Stat Cards -->
    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-4 mb-8">
        
        <!-- Total Properties -->
        <div class="bg-white border border-slate-200/80 p-5 rounded-2xl shadow-xs hover:shadow-md hover:border-slate-300 transition duration-200 flex flex-col justify-between">
            <div class="flex items-center justify-between">
                <span class="text-[11px] text-slate-500 font-bold uppercase tracking-wider">Properties</span>
                <span class="w-7 h-7 rounded-lg bg-emerald-50 text-emerald-600 flex items-center justify-center text-sm font-bold">🏡</span>
            </div>
            <div class="my-3">
                <div class="text-3xl font-black text-slate-900">{{ $stats['total_properties'] }}</div>
                <div class="text-[11px] text-emerald-700 font-bold mt-1 flex items-center">
                    <span>Listed & Active</span>
                </div>
            </div>
            <a href="{{ route('admin.properties.index') }}" class="text-[11px] font-bold text-emerald-600 hover:text-emerald-700">Manage &rarr;</a>
        </div>

        <!-- Eco Homes -->
        <div class="bg-white border border-slate-200/80 p-5 rounded-2xl shadow-xs hover:shadow-md hover:border-slate-300 transition duration-200 flex flex-col justify-between">
            <div class="flex items-center justify-between">
                <span class="text-[11px] text-slate-500 font-bold uppercase tracking-wider">Eco Homes</span>
                <span class="w-7 h-7 rounded-lg bg-teal-50 text-teal-600 flex items-center justify-center text-sm font-bold">🌱</span>
            </div>
            <div class="my-3">
                <div class="text-3xl font-black text-teal-600">{{ $stats['eco_properties'] }}</div>
                <div class="text-[11px] text-slate-500 font-medium mt-1">Green Certified</div>
            </div>
            <span class="text-[11px] font-semibold text-slate-400">100% Verified</span>
        </div>

        <!-- Total Leads -->
        <div class="bg-white border border-slate-200/80 p-5 rounded-2xl shadow-xs hover:shadow-md hover:border-slate-300 transition duration-200 flex flex-col justify-between">
            <div class="flex items-center justify-between">
                <span class="text-[11px] text-slate-500 font-bold uppercase tracking-wider">Total Leads</span>
                <span class="w-7 h-7 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center text-sm font-bold">📈</span>
            </div>
            <div class="my-3">
                <div class="text-3xl font-black text-slate-900">{{ $stats['total_inquiries'] }}</div>
                <div class="text-[11px] text-blue-600 font-semibold mt-1">Client Inquiries</div>
            </div>
            <a href="{{ route('admin.inquiries.index') }}" class="text-[11px] font-bold text-blue-600 hover:text-blue-700">View All &rarr;</a>
        </div>

        <!-- New Inquiries -->
        <div class="bg-white border border-slate-200/80 p-5 rounded-2xl shadow-xs hover:shadow-md hover:border-slate-300 transition duration-200 flex flex-col justify-between {{ $stats['new_inquiries'] > 0 ? 'ring-2 ring-rose-500/20' : '' }}">
            <div class="flex items-center justify-between">
                <span class="text-[11px] text-slate-500 font-bold uppercase tracking-wider">New Leads</span>
                <span class="w-7 h-7 rounded-lg bg-rose-50 text-rose-600 flex items-center justify-center text-sm font-bold">🔥</span>
            </div>
            <div class="my-3">
                <div class="text-3xl font-black text-rose-600">{{ $stats['new_inquiries'] }}</div>
                <div class="text-[11px] text-rose-600 font-bold mt-1">Action Required</div>
            </div>
            <a href="{{ route('admin.inquiries.index', ['status' => 'new']) }}" class="text-[11px] font-bold text-rose-600 hover:text-rose-700">Reply Now &rarr;</a>
        </div>

        <!-- Gallery Items -->
        <div class="bg-white border border-slate-200/80 p-5 rounded-2xl shadow-xs hover:shadow-md hover:border-slate-300 transition duration-200 flex flex-col justify-between">
            <div class="flex items-center justify-between">
                <span class="text-[11px] text-slate-500 font-bold uppercase tracking-wider">Gallery</span>
                <span class="w-7 h-7 rounded-lg bg-amber-50 text-amber-600 flex items-center justify-center text-sm font-bold">📸</span>
            </div>
            <div class="my-3">
                <div class="text-3xl font-black text-slate-900">{{ $stats['gallery_items'] }}</div>
                <div class="text-[11px] text-slate-500 font-medium mt-1">Photos Uploaded</div>
            </div>
            <a href="{{ route('admin.gallery.index') }}" class="text-[11px] font-bold text-amber-600 hover:text-amber-700">Upload &rarr;</a>
        </div>

        <!-- Site Images -->
        <div class="bg-white border border-slate-200/80 p-5 rounded-2xl shadow-xs hover:shadow-md hover:border-slate-300 transition duration-200 flex flex-col justify-between">
            <div class="flex items-center justify-between">
                <span class="text-[11px] text-slate-500 font-bold uppercase tracking-wider">Site Media</span>
                <span class="w-7 h-7 rounded-lg bg-emerald-50 text-emerald-600 flex items-center justify-center text-sm font-bold">🖼️</span>
            </div>
            <div class="my-3">
                <div class="text-3xl font-black text-emerald-600">{{ $stats['site_images'] }}</div>
                <div class="text-[11px] text-emerald-700 font-medium mt-1">Custom Banners</div>
            </div>
            <a href="{{ route('admin.site-images.index') }}" class="text-[11px] font-bold text-emerald-600 hover:text-emerald-700">Edit Banners &rarr;</a>
        </div>

    </div>

    <!-- Quick Action Featured Capability Banner -->
    <div class="bg-gradient-to-r from-emerald-900 via-emerald-800 to-teal-900 rounded-3xl p-6 sm:p-8 mb-8 text-white flex flex-col md:flex-row items-start md:items-center justify-between gap-6 shadow-md shadow-emerald-950/10">
        <div class="space-y-2">
            <span class="text-[11px] font-extrabold uppercase tracking-widest text-emerald-300 bg-emerald-950/80 px-3 py-1 rounded-full border border-emerald-500/30">
                ⭐ Centralized Control
            </span>
            <h3 class="text-2xl font-black text-white tracking-tight">Full Website Customization & Visual Banners</h3>
            <p class="text-xs sm:text-sm text-emerald-100 max-w-2xl leading-relaxed">
                Seamlessly change logos, hero typography, contact info, brand colors, leadership team, testimonials, and FAQs from one central control panel.
            </p>
        </div>
        <div class="flex flex-wrap items-center gap-3 shrink-0">
            <a href="{{ route('admin.settings.index') }}" class="px-5 py-3 bg-white hover:bg-emerald-50 text-emerald-950 text-xs font-black rounded-xl transition shadow-md">
                Open Master Settings &rarr;
            </a>
            <a href="{{ route('admin.site-images.index') }}" class="px-5 py-3 bg-emerald-700/60 hover:bg-emerald-700 text-white text-xs font-bold rounded-xl transition border border-emerald-500/40">
                Images & Banners
            </a>
        </div>
    </div>

    <!-- Two Column Recent Activity -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        
        <!-- Recent Client Inquiries -->
        <div class="bg-white border border-slate-200/80 rounded-3xl p-6 sm:p-7 shadow-xs">
            <div class="flex items-center justify-between mb-5 pb-3 border-b border-slate-100">
                <div>
                    <h3 class="font-extrabold text-base text-slate-900">Recent Client Inquiries</h3>
                    <p class="text-xs text-slate-500 mt-0.5">Leads submitted via property pages and contact form</p>
                </div>
                <a href="{{ route('admin.inquiries.index') }}" class="text-xs font-bold text-emerald-700 hover:text-emerald-800 flex items-center space-x-1">
                    <span>View All</span>
                    <span>&rarr;</span>
                </a>
            </div>

            <div class="space-y-3">
                @forelse($recentInquiries as $inq)
                    <div class="p-4 bg-slate-50/70 hover:bg-slate-50 border border-slate-200/70 rounded-2xl flex items-center justify-between text-xs transition duration-150">
                        <div class="min-w-0 pr-3">
                            <div class="flex items-center space-x-2">
                                <span class="font-black text-slate-900 text-sm truncate">{{ $inq->name }}</span>
                                <span class="px-2 py-0.5 rounded-full text-[10px] font-bold uppercase tracking-wider {{ $inq->status === 'new' ? 'bg-rose-100 text-rose-700 border border-rose-200' : 'bg-emerald-100 text-emerald-800 border border-emerald-200' }}">
                                    {{ $inq->status }}
                                </span>
                            </div>
                            <div class="text-slate-600 text-xs mt-1 flex flex-wrap items-center gap-2">
                                <span class="font-medium text-emerald-700">📞 {{ $inq->phone }}</span>
                                <span>&bull;</span>
                                <span class="text-slate-500 truncate">{{ $inq->email }}</span>
                            </div>
                            @if($inq->message)
                                <div class="text-slate-500 text-[11px] mt-1.5 line-clamp-1 italic bg-white px-2 py-1 rounded border border-slate-200/60">
                                    &ldquo;{{ $inq->message }}&rdquo;
                                </div>
                            @endif
                        </div>
                        <div class="shrink-0 text-right">
                            <a href="{{ route('admin.inquiries.index') }}" class="px-3 py-1.5 bg-white hover:bg-slate-100 border border-slate-300 rounded-lg text-[11px] font-bold text-slate-700 transition shadow-2xs">
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
                    <p class="text-xs text-slate-500 mt-0.5">Recently added residential & commercial listings</p>
                </div>
                <a href="{{ route('admin.properties.index') }}" class="text-xs font-bold text-emerald-700 hover:text-emerald-800 flex items-center space-x-1">
                    <span>Manage All</span>
                    <span>&rarr;</span>
                </a>
            </div>

            <div class="space-y-3">
                @foreach($recentProperties as $prop)
                    <div class="p-3.5 bg-slate-50/70 hover:bg-slate-50 border border-slate-200/70 rounded-2xl flex items-center space-x-3.5 text-xs transition duration-150">
                        <img src="{{ $prop->main_image_url }}" alt="{{ $prop->title }}" class="w-14 h-14 rounded-xl object-cover shrink-0 bg-slate-200 border border-slate-200 shadow-2xs">
                        <div class="min-w-0 flex-grow">
                            <div class="font-black text-slate-900 text-sm truncate">{{ $prop->title }}</div>
                            <div class="text-emerald-700 font-extrabold text-xs mt-0.5">{{ $prop->price_display }}</div>
                            <div class="text-slate-500 text-[11px] truncate flex items-center space-x-1 mt-0.5">
                                <span>📍</span>
                                <span>{{ $prop->location }}, {{ $prop->city }}</span>
                            </div>
                        </div>
                        <div class="shrink-0 flex items-center space-x-1.5">
                            <a href="{{ route('properties.show', $prop->slug) }}" target="_blank" class="p-1.5 text-slate-400 hover:text-slate-700 rounded-lg hover:bg-white border border-transparent hover:border-slate-200 transition" title="Preview Public Page">
                                👁️
                            </a>
                            <a href="{{ route('admin.properties.edit', $prop->id) }}" class="px-3 py-1.5 bg-white hover:bg-slate-100 border border-slate-300 rounded-lg text-[11px] font-bold text-slate-700 transition shadow-2xs">
                                Edit
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>

@endsection
