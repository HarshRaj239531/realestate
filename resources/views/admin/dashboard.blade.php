@extends('admin.layouts.admin')

@section('title', 'Admin Dashboard')
@section('header_title', 'Administrative Overview')

@section('content')

    <!-- Stats Row -->
    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-4 mb-8">
        <div class="bg-slate-900 border border-slate-800 p-4 rounded-2xl">
            <div class="text-xs text-slate-400 font-semibold uppercase">Total Properties</div>
            <div class="text-2xl font-black text-white mt-1">{{ $stats['total_properties'] }}</div>
            <div class="text-[10px] text-emerald-400 mt-0.5">Listed & Active</div>
        </div>

        <div class="bg-slate-900 border border-slate-800 p-4 rounded-2xl">
            <div class="text-xs text-slate-400 font-semibold uppercase">Eco Homes</div>
            <div class="text-2xl font-black text-emerald-400 mt-1">{{ $stats['eco_properties'] }}</div>
            <div class="text-[10px] text-slate-400 mt-0.5">Green Certified</div>
        </div>

        <div class="bg-slate-900 border border-slate-800 p-4 rounded-2xl">
            <div class="text-xs text-slate-400 font-semibold uppercase">Total Leads</div>
            <div class="text-2xl font-black text-white mt-1">{{ $stats['total_inquiries'] }}</div>
            <div class="text-[10px] text-blue-400 mt-0.5">Client Inquiries</div>
        </div>

        <div class="bg-slate-900 border border-slate-800 p-4 rounded-2xl">
            <div class="text-xs text-slate-400 font-semibold uppercase">New Inquiries</div>
            <div class="text-2xl font-black text-rose-400 mt-1">{{ $stats['new_inquiries'] }}</div>
            <div class="text-[10px] text-rose-300 mt-0.5">Action Needed</div>
        </div>

        <div class="bg-slate-900 border border-slate-800 p-4 rounded-2xl">
            <div class="text-xs text-slate-400 font-semibold uppercase">Gallery Items</div>
            <div class="text-2xl font-black text-white mt-1">{{ $stats['gallery_items'] }}</div>
            <div class="text-[10px] text-slate-400 mt-0.5">Photos Uploaded</div>
        </div>

        <div class="bg-slate-900 border border-slate-800 p-4 rounded-2xl">
            <div class="text-xs text-slate-400 font-semibold uppercase">Site Images</div>
            <div class="text-2xl font-black text-emerald-400 mt-1">{{ $stats['site_images'] }}</div>
            <div class="text-[10px] text-emerald-300 mt-0.5">Editable Sections</div>
        </div>
    </div>

    <!-- Quick Action Banner: Site Images Manager Feature Highlight -->
    <div class="bg-gradient-to-r from-emerald-950 via-slate-900 to-slate-900 border border-emerald-500/40 rounded-3xl p-6 sm:p-8 mb-8 flex flex-col md:flex-row items-start md:items-center justify-between gap-4 shadow-xl">
        <div class="space-y-1">
            <span class="text-xs font-bold text-emerald-400 bg-emerald-950 px-2.5 py-1 rounded-full uppercase tracking-wider border border-emerald-800">
                ⭐ Featured Admin Capability
            </span>
            <h3 class="text-xl font-black text-white mt-2">Manage All Website Images & Banners</h3>
            <p class="text-xs text-slate-300 max-w-xl">
                Replace your homepage hero background, official logo, about page showcase, CTA banners, and contact visuals with one click.
            </p>
        </div>
        <a href="{{ route('admin.site-images.index') }}" class="px-6 py-3 bg-brand-primary hover:bg-brand-dark text-white text-xs font-bold rounded-xl transition shadow-lg shrink-0">
            Open Site Images Manager &rarr;
        </a>
    </div>

    <!-- Two Column Recent Activity -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        
        <!-- Recent Inquiries -->
        <div class="bg-slate-900 border border-slate-800 rounded-3xl p-6 shadow-sm">
            <div class="flex items-center justify-between mb-4">
                <h3 class="font-bold text-sm text-white">Recent Client Inquiries</h3>
                <a href="{{ route('admin.inquiries.index') }}" class="text-xs text-emerald-400 hover:underline">View All &rarr;</a>
            </div>

            <div class="space-y-3">
                @forelse($recentInquiries as $inq)
                    <div class="p-3.5 bg-slate-950/70 border border-slate-800 rounded-xl flex items-center justify-between text-xs">
                        <div>
                            <div class="font-bold text-white">{{ $inq->name }}</div>
                            <div class="text-slate-400 text-[11px]">{{ $inq->phone }} &bull; {{ $inq->email }}</div>
                            <div class="text-slate-500 text-[10px] mt-0.5">{{ Str::limit($inq->message, 60) }}</div>
                        </div>
                        <div>
                            <span class="px-2 py-0.5 rounded-full text-[10px] font-bold uppercase {{ $inq->status === 'new' ? 'bg-rose-950 text-rose-300 border border-rose-800' : 'bg-emerald-950 text-emerald-300 border border-emerald-800' }}">
                                {{ $inq->status }}
                            </span>
                        </div>
                    </div>
                @empty
                    <div class="text-xs text-slate-500 py-6 text-center">No inquiries received yet.</div>
                @endforelse
            </div>
        </div>

        <!-- Recent Properties -->
        <div class="bg-slate-900 border border-slate-800 rounded-3xl p-6 shadow-sm">
            <div class="flex items-center justify-between mb-4">
                <h3 class="font-bold text-sm text-white">Latest Properties</h3>
                <a href="{{ route('admin.properties.index') }}" class="text-xs text-emerald-400 hover:underline">Manage All &rarr;</a>
            </div>

            <div class="space-y-3">
                @foreach($recentProperties as $prop)
                    <div class="p-3 bg-slate-950/70 border border-slate-800 rounded-xl flex items-center space-x-3 text-xs">
                        <img src="{{ $prop->main_image_url }}" alt="{{ $prop->title }}" class="w-12 h-12 rounded-lg object-cover shrink-0">
                        <div class="min-w-0 flex-grow">
                            <div class="font-bold text-white truncate">{{ $prop->title }}</div>
                            <div class="text-emerald-400 font-semibold text-[11px]">{{ $prop->price_display }}</div>
                            <div class="text-slate-500 text-[10px] truncate">{{ $prop->location }}, {{ $prop->city }}</div>
                        </div>
                        <div>
                            <a href="{{ route('admin.properties.edit', $prop->id) }}" class="px-2.5 py-1 bg-slate-800 hover:bg-slate-700 text-slate-300 rounded text-[11px] transition">
                                Edit
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>

@endsection
