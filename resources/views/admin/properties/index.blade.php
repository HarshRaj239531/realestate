@extends('admin.layouts.admin')

@section('title', 'Manage Properties')
@section('header_title', 'All Listed Properties')

@section('content')

    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 mb-6">
        <div>
            <h3 class="text-xl font-black text-slate-900">Properties Catalog</h3>
            <p class="text-xs text-slate-500">Total of {{ $properties->total() }} properties published across your catalog</p>
        </div>
        <a href="{{ route('admin.properties.create') }}" class="px-4 py-2.5 bg-brand-primary hover:bg-brand-dark text-white rounded-xl text-xs font-bold transition shadow-xs flex items-center space-x-1.5 shadow-emerald-600/20">
            <span>+ Add New Property</span>
        </a>
    </div>

    <!-- Search / Filter Bar -->
    <div class="bg-white border border-slate-200/80 p-4 rounded-2xl mb-6 shadow-xs">
        <form method="GET" action="{{ route('admin.properties.index') }}" class="flex flex-col sm:flex-row gap-3">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Search by title, location, or city..." class="flex-grow text-xs px-3.5 py-2.5 bg-slate-50 border border-slate-300 rounded-xl text-slate-800 focus:bg-white focus:outline-none focus:ring-2 focus:ring-emerald-500">
            <select name="type" class="text-xs px-3.5 py-2.5 bg-slate-50 border border-slate-300 rounded-xl text-slate-700 focus:bg-white focus:outline-none">
                <option value="all">All Types</option>
                <option value="villa" {{ request('type') == 'villa' ? 'selected' : '' }}>Villa</option>
                <option value="apartment" {{ request('type') == 'apartment' ? 'selected' : '' }}>Apartment</option>
                <option value="penthouse" {{ request('type') == 'penthouse' ? 'selected' : '' }}>Penthouse</option>
                <option value="plot" {{ request('type') == 'plot' ? 'selected' : '' }}>Plot</option>
                <option value="commercial" {{ request('type') == 'commercial' ? 'selected' : '' }}>Commercial</option>
            </select>
            <button type="submit" class="px-5 py-2.5 bg-slate-900 hover:bg-slate-800 text-white rounded-xl text-xs font-bold transition shadow-xs">
                Filter
            </button>
            @if(request()->hasAny(['search', 'type']))
                <a href="{{ route('admin.properties.index') }}" class="px-4 py-2.5 bg-slate-100 text-slate-600 hover:text-slate-900 border border-slate-200 rounded-xl text-xs font-semibold flex items-center justify-center">
                    Clear
                </a>
            @endif
        </form>
    </div>

    <!-- Properties Table -->
    <div class="bg-white border border-slate-200/80 rounded-3xl overflow-hidden shadow-xs">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead class="bg-slate-50/80 text-slate-600 uppercase tracking-wider text-[10px] font-bold border-b border-slate-200">
                    <tr>
                        <th class="py-3.5 px-5">Property</th>
                        <th class="py-3.5 px-4">Type</th>
                        <th class="py-3.5 px-4">Price</th>
                        <th class="py-3.5 px-4">Location</th>
                        <th class="py-3.5 px-4 text-center">Eco-Certified</th>
                        <th class="py-3.5 px-4 text-center">Featured</th>
                        <th class="py-3.5 px-5 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-slate-600">
                    @forelse($properties as $prop)
                        <tr class="hover:bg-slate-50/70 transition">
                            <td class="py-3.5 px-5">
                                <div class="flex items-center space-x-3.5">
                                    <img src="{{ $prop->main_image_url }}" alt="{{ $prop->title }}" class="w-12 h-12 rounded-xl object-cover shrink-0 bg-slate-100 border border-slate-200">
                                    <div class="min-w-0">
                                        <a href="{{ route('properties.show', $prop->slug) }}" target="_blank" class="font-extrabold text-slate-900 hover:text-emerald-700 truncate block text-sm">
                                            {{ $prop->title }}
                                        </a>
                                        <div class="text-[11px] text-slate-400 mt-0.5">{{ number_format($prop->area_sqft) }} Sq. Ft</div>
                                    </div>
                                </div>
                            </td>
                            <td class="py-3.5 px-4">
                                <span class="capitalize bg-slate-100 text-slate-700 font-semibold px-2.5 py-1 rounded-md text-[11px] border border-slate-200">
                                    {{ $prop->property_type }}
                                </span>
                            </td>
                            <td class="py-3.5 px-4 font-black text-emerald-700 text-xs">
                                {{ $prop->price_display }}
                            </td>
                            <td class="py-3.5 px-4 text-slate-500">
                                {{ $prop->location }}, {{ $prop->city }}
                            </td>
                            <td class="py-3.5 px-4 text-center">
                                @if($prop->is_eco_friendly)
                                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-emerald-50 text-emerald-800 border border-emerald-200">
                                        🌱 Eco Home
                                    </span>
                                @else
                                    <span class="text-slate-400">-</span>
                                @endif
                            </td>
                            <td class="py-3.5 px-4 text-center">
                                <form method="POST" action="{{ route('admin.properties.toggle-featured', $prop->id) }}">
                                    @csrf
                                    <button type="submit" class="text-xs px-2.5 py-1 rounded-full font-bold transition {{ $prop->is_featured ? 'bg-amber-100 text-amber-800 border border-amber-300' : 'bg-slate-100 text-slate-500 hover:bg-slate-200' }}">
                                        {{ $prop->is_featured ? '⭐ Featured' : 'Normal' }}
                                    </button>
                                </form>
                            </td>
                            <td class="py-3.5 px-5 text-right space-x-2">
                                <a href="{{ route('properties.show', $prop->slug) }}" target="_blank" class="p-1.5 text-slate-400 hover:text-slate-700 hover:bg-slate-100 rounded-lg inline-block transition" title="Preview Public Page">
                                    👁️
                                </a>
                                <a href="{{ route('admin.properties.edit', $prop->id) }}" class="px-2.5 py-1 bg-white hover:bg-slate-100 border border-slate-300 rounded-lg text-slate-700 font-bold hover:text-emerald-700 text-xs shadow-2xs">
                                    Edit
                                </a>
                                <form method="POST" action="{{ route('admin.properties.destroy', $prop->id) }}" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this property?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-1 text-slate-400 hover:text-rose-600 rounded-lg transition" title="Delete">
                                        🗑️
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="py-12 text-center text-slate-400">
                                <div class="text-3xl mb-2">🏡</div>
                                <p class="font-bold text-slate-700">No properties found.</p>
                                <p class="text-xs text-slate-400 mt-0.5">Click "+ Add New Property" to publish your first listing.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="p-4 border-t border-slate-100 bg-slate-50/50">
            {{ $properties->links() }}
        </div>
    </div>

@endsection
