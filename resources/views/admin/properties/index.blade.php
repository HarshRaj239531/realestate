@extends('admin.layouts.admin')

@section('title', 'Manage Properties')
@section('header_title', 'All Listed Properties')

@section('content')

    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 mb-6">
        <div>
            <h3 class="text-xl font-black text-white">Properties Catalog</h3>
            <p class="text-xs text-slate-400">Total of {{ $properties->total() }} properties published</p>
        </div>
        <a href="{{ route('admin.properties.create') }}" class="px-4 py-2 bg-brand-primary hover:bg-brand-dark text-white rounded-xl text-xs font-bold transition shadow flex items-center space-x-1.5">
            <span>+ Add New Property</span>
        </a>
    </div>

    <!-- Search / Filter Bar -->
    <div class="bg-slate-900 border border-slate-800 p-4 rounded-2xl mb-6">
        <form method="GET" action="{{ route('admin.properties.index') }}" class="flex flex-col sm:flex-row gap-3">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Search by title, location, or city..." class="flex-grow text-xs px-3.5 py-2.5 bg-slate-950 border border-slate-800 rounded-xl text-white focus:outline-none focus:ring-1 focus:ring-emerald-500">
            <select name="type" class="text-xs px-3 py-2.5 bg-slate-950 border border-slate-800 rounded-xl text-white focus:outline-none">
                <option value="all">All Types</option>
                <option value="villa" {{ request('type') == 'villa' ? 'selected' : '' }}>Villa</option>
                <option value="apartment" {{ request('type') == 'apartment' ? 'selected' : '' }}>Apartment</option>
                <option value="penthouse" {{ request('type') == 'penthouse' ? 'selected' : '' }}>Penthouse</option>
                <option value="plot" {{ request('type') == 'plot' ? 'selected' : '' }}>Plot</option>
                <option value="commercial" {{ request('type') == 'commercial' ? 'selected' : '' }}>Commercial</option>
            </select>
            <button type="submit" class="px-5 py-2.5 bg-slate-800 hover:bg-slate-700 text-white rounded-xl text-xs font-bold transition">
                Filter
            </button>
            @if(request()->hasAny(['search', 'type']))
                <a href="{{ route('admin.properties.index') }}" class="px-3.5 py-2.5 bg-slate-800 text-slate-400 hover:text-white rounded-xl text-xs flex items-center justify-center">
                    Clear
                </a>
            @endif
        </form>
    </div>

    <!-- Properties Table -->
    <div class="bg-slate-900 border border-slate-800 rounded-3xl overflow-hidden shadow-sm">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead class="bg-slate-950/70 text-slate-400 uppercase tracking-wider text-[10px] border-b border-slate-800">
                    <tr>
                        <th class="py-3.5 px-4">Property</th>
                        <th class="py-3.5 px-4">Type</th>
                        <th class="py-3.5 px-4">Price</th>
                        <th class="py-3.5 px-4">Location</th>
                        <th class="py-3.5 px-4 text-center">Eco-Certified</th>
                        <th class="py-3.5 px-4 text-center">Featured</th>
                        <th class="py-3.5 px-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-800 text-slate-300">
                    @forelse($properties as $prop)
                        <tr class="hover:bg-slate-800/40 transition">
                            <td class="py-3 px-4">
                                <div class="flex items-center space-x-3">
                                    <img src="{{ $prop->main_image_url }}" alt="{{ $prop->title }}" class="w-12 h-12 rounded-xl object-cover shrink-0 bg-slate-950">
                                    <div class="min-w-0">
                                        <a href="{{ route('properties.show', $prop->slug) }}" target="_blank" class="font-bold text-white hover:text-emerald-400 truncate block">
                                            {{ $prop->title }}
                                        </a>
                                        <div class="text-[11px] text-slate-500">{{ number_format($prop->area_sqft) }} Sq. Ft</div>
                                    </div>
                                </div>
                            </td>
                            <td class="py-3 px-4">
                                <span class="capitalize bg-slate-950 px-2 py-0.5 rounded text-[11px]">
                                    {{ $prop->property_type }}
                                </span>
                            </td>
                            <td class="py-3 px-4 font-bold text-emerald-400">
                                {{ $prop->price_display }}
                            </td>
                            <td class="py-3 px-4 text-slate-400">
                                {{ $prop->location }}, {{ $prop->city }}
                            </td>
                            <td class="py-3 px-4 text-center">
                                @if($prop->is_eco_friendly)
                                    <span class="text-emerald-400 font-bold" title="Eco Friendly">🌱 Yes</span>
                                @else
                                    <span class="text-slate-600">-</span>
                                @endif
                            </td>
                            <td class="py-3 px-4 text-center">
                                <form method="POST" action="{{ route('admin.properties.toggle-featured', $prop->id) }}">
                                    @csrf
                                    <button type="submit" class="text-xs px-2 py-0.5 rounded transition {{ $prop->is_featured ? 'bg-amber-950 text-amber-300 border border-amber-800' : 'bg-slate-800 text-slate-500' }}">
                                        {{ $prop->is_featured ? '⭐ Featured' : 'Normal' }}
                                    </button>
                                </form>
                            </td>
                            <td class="py-3 px-4 text-right space-x-2">
                                <a href="{{ route('properties.show', $prop->slug) }}" target="_blank" class="text-slate-400 hover:text-white" title="Preview Public Page">
                                    👁️
                                </a>
                                <a href="{{ route('admin.properties.edit', $prop->id) }}" class="text-emerald-400 hover:underline font-semibold">
                                    Edit
                                </a>
                                <form method="POST" action="{{ route('admin.properties.destroy', $prop->id) }}" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this property?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-rose-400 hover:text-rose-300 font-semibold ml-1">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="py-8 text-center text-slate-500">
                                No properties found. Click "+ Add New Property" to create one.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="p-4 border-t border-slate-800">
            {{ $properties->links() }}
        </div>
    </div>

@endsection

