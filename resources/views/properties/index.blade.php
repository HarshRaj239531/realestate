@extends('layouts.app')

@section('title', 'Properties Catalog | ' . ($siteSettings['brand_name'] ?? 'AG HOMES INDIA'))
@section('meta_description', 'Explore eco-friendly luxury villas, apartments, penthouses, and residential plots in Gurugram and India.')

@section('content')

    <!-- Banner Header -->
    @php
        $propHero = isset($siteImages['properties_hero']) ? $siteImages['properties_hero']->url : 'https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?auto=format&fit=crop&w=1600&q=80';
    @endphp
    <div class="relative py-16 sm:py-24 bg-slate-900 bg-cover bg-center overflow-hidden" 
         style="background-image: linear-gradient(to right, rgba(15, 23, 42, 0.90), rgba(15, 23, 42, 0.75)), url('{{ $propHero }}');">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white relative z-10">
            <span class="text-xs font-bold uppercase tracking-widest text-emerald-400 bg-emerald-950/70 border border-emerald-500/30 px-3.5 py-1.5 rounded-full">
                Verified Listings
            </span>
            <h1 class="text-3xl sm:text-5xl font-black text-white mt-3 tracking-tight">
                Explore Available Properties
            </h1>
            <p class="text-slate-300 text-sm sm:text-base max-w-xl mx-auto mt-2">
                Discover IGBC & LEED certified sustainable homes, luxury villas, and prime plots designed for a greener tomorrow.
            </p>
        </div>
    </div>

    <!-- Filter Bar & Results Container -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        
        <!-- Filter Card -->
        <div class="bg-white rounded-2xl shadow-sm border border-slate-200/80 p-5 mb-10">
            <form method="GET" action="{{ route('properties.index') }}" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4">
                
                <!-- Keyword -->
                <div>
                    <label class="block text-xs font-bold text-slate-600 mb-1">Search Keyword / Location</label>
                    <input type="text" name="keyword" value="{{ request('keyword') }}" placeholder="Sector, locality, title..." class="w-full text-xs sm:text-sm px-3.5 py-2.5 bg-slate-50 border border-slate-300 rounded-xl focus:bg-white focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                </div>

                <!-- Type -->
                <div>
                    <label class="block text-xs font-bold text-slate-600 mb-1">Property Type</label>
                    <select name="type" class="w-full text-xs sm:text-sm px-3.5 py-2.5 bg-slate-50 border border-slate-300 rounded-xl focus:bg-white focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                        <option value="all">All Types</option>
                        <option value="villa" {{ request('type') == 'villa' ? 'selected' : '' }}>Luxury Villa</option>
                        <option value="apartment" {{ request('type') == 'apartment' ? 'selected' : '' }}>Apartment</option>
                        <option value="penthouse" {{ request('type') == 'penthouse' ? 'selected' : '' }}>Penthouse</option>
                        <option value="plot" {{ request('type') == 'plot' ? 'selected' : '' }}>Residential Plot</option>
                        <option value="commercial" {{ request('type') == 'commercial' ? 'selected' : '' }}>Commercial Space</option>
                    </select>
                </div>

                <!-- Status -->
                <div>
                    <label class="block text-xs font-bold text-slate-600 mb-1">Listing Status</label>
                    <select name="status" class="w-full text-xs sm:text-sm px-3.5 py-2.5 bg-slate-50 border border-slate-300 rounded-xl focus:bg-white focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                        <option value="all">All Statuses</option>
                        <option value="for_sale" {{ request('status') == 'for_sale' ? 'selected' : '' }}>For Sale (Buy)</option>
                        <option value="for_rent" {{ request('status') == 'for_rent' ? 'selected' : '' }}>For Rent</option>
                    </select>
                </div>

                <!-- City -->
                <div>
                    <label class="block text-xs font-bold text-slate-600 mb-1">City</label>
                    <select name="city" class="w-full text-xs sm:text-sm px-3.5 py-2.5 bg-slate-50 border border-slate-300 rounded-xl focus:bg-white focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                        <option value="all">All Cities</option>
                        @foreach($cities as $c)
                            <option value="{{ $c }}" {{ request('city') == $c ? 'selected' : '' }}>{{ $c }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Actions -->
                <div class="flex items-end space-x-2">
                    <button type="submit" class="flex-grow py-2.5 bg-brand-primary hover:bg-brand-dark text-white font-bold rounded-xl text-xs sm:text-sm transition shadow-sm">
                        Apply Filters
                    </button>
                    @if(request()->hasAny(['keyword', 'type', 'status', 'city', 'bedrooms', 'eco_friendly', 'sort']))
                        <a href="{{ route('properties.index') }}" class="px-3.5 py-2.5 bg-slate-200 hover:bg-slate-300 text-slate-700 font-bold rounded-xl text-xs transition" title="Clear All Filters">
                            Reset
                        </a>
                    @endif
                </div>
            </form>

            <!-- Quick Filter Pill: Eco-Certified -->
            <div class="mt-4 pt-3 border-t border-slate-100 flex flex-wrap items-center justify-between text-xs text-slate-500">
                <div class="flex items-center space-x-2">
                    <span class="font-semibold text-slate-700">Quick Filters:</span>
                    <a href="{{ route('properties.index', array_merge(request()->query(), ['eco_friendly' => request('eco_friendly') ? null : 1])) }}" 
                       class="px-3 py-1 rounded-full text-xs font-semibold transition {{ request('eco_friendly') ? 'bg-emerald-600 text-white' : 'bg-slate-100 text-slate-700 hover:bg-emerald-50' }}">
                        🌱 Eco-Certified Only
                    </a>
                    <a href="{{ route('properties.index', array_merge(request()->query(), ['type' => 'villa'])) }}" 
                       class="px-3 py-1 rounded-full text-xs font-semibold transition {{ request('type') == 'villa' ? 'bg-brand-primary text-white' : 'bg-slate-100 text-slate-700 hover:bg-slate-200' }}">
                        Villas
                    </a>
                    <a href="{{ route('properties.index', array_merge(request()->query(), ['type' => 'plot'])) }}" 
                       class="px-3 py-1 rounded-full text-xs font-semibold transition {{ request('type') == 'plot' ? 'bg-brand-primary text-white' : 'bg-slate-100 text-slate-700 hover:bg-slate-200' }}">
                        Plots
                    </a>
                </div>

                <div class="mt-2 sm:mt-0 font-medium text-slate-600">
                    Showing <span class="font-bold text-slate-900">{{ $properties->total() }}</span> properties
                </div>
            </div>
        </div>

        <!-- Property Grid -->
        @if($properties->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($properties as $prop)
                    <div class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 border border-slate-200/80 flex flex-col group">
                        
                        <!-- Image Box -->
                        <div class="relative h-60 overflow-hidden bg-slate-100">
                            <img src="{{ $prop->main_image_url }}" alt="{{ $prop->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            <div class="absolute inset-0 bg-gradient-to-t from-slate-950/60 via-transparent to-transparent"></div>
                            
                            <!-- Badges -->
                            <div class="absolute top-3 left-3 flex flex-wrap gap-1.5">
                                @if($prop->is_eco_friendly)
                                    <span class="bg-emerald-600 text-white text-[11px] font-bold px-2.5 py-1 rounded-full shadow-md flex items-center space-x-1">
                                        <span>🌱 Eco-Certified</span>
                                    </span>
                                @endif
                                <span class="bg-slate-900/80 backdrop-blur-sm text-white text-[11px] font-semibold px-2.5 py-1 rounded-full">
                                    {{ ucfirst(str_replace('_', ' ', $prop->status)) }}
                                </span>
                            </div>

                            <!-- Price Tag -->
                            <div class="absolute bottom-3 left-3 text-white">
                                <span class="text-xl font-extrabold tracking-tight drop-shadow-md text-emerald-300">
                                    {{ $prop->price_display }}
                                </span>
                            </div>

                            <div class="absolute bottom-3 right-3 text-white text-xs bg-black/40 backdrop-blur-sm px-2.5 py-1 rounded-md">
                                {{ ucfirst($prop->property_type) }}
                            </div>
                        </div>

                        <!-- Content -->
                        <div class="p-6 flex flex-col flex-grow">
                            <div class="text-xs font-semibold text-emerald-700 mb-1 flex items-center space-x-1">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                                <span>{{ $prop->location }}, {{ $prop->city }}</span>
                            </div>

                            <h3 class="text-lg font-bold text-slate-900 group-hover:text-emerald-700 transition line-clamp-1 mb-2">
                                <a href="{{ route('properties.show', $prop->slug) }}">
                                    {{ $prop->title }}
                                </a>
                            </h3>

                            <p class="text-xs text-slate-500 line-clamp-2 mb-4 leading-relaxed">
                                {{ $prop->tagline ?? Str::limit($prop->description, 100) }}
                            </p>

                            <!-- Specs Bar -->
                            <div class="mt-auto pt-4 border-t border-slate-100 grid grid-cols-3 text-center text-xs text-slate-600 gap-2 mb-4">
                                @if($prop->bedrooms)
                                    <div>
                                        <div class="font-bold text-slate-900">{{ $prop->bedrooms }} Beds</div>
                                        <div class="text-[10px] text-slate-400 uppercase">Bedrooms</div>
                                    </div>
                                @else
                                    <div>
                                        <div class="font-bold text-slate-900">Open</div>
                                        <div class="text-[10px] text-slate-400 uppercase">Layout</div>
                                    </div>
                                @endif

                                @if($prop->bathrooms)
                                    <div>
                                        <div class="font-bold text-slate-900">{{ $prop->bathrooms }} Baths</div>
                                        <div class="text-[10px] text-slate-400 uppercase">Bathrooms</div>
                                    </div>
                                @else
                                    <div>
                                        <div class="font-bold text-slate-900">Freehold</div>
                                        <div class="text-[10px] text-slate-400 uppercase">Title</div>
                                    </div>
                                @endif

                                <div>
                                    <div class="font-bold text-slate-900">{{ number_format($prop->area_sqft) }}</div>
                                    <div class="text-[10px] text-slate-400 uppercase">Sq. Ft</div>
                                </div>
                            </div>

                            <a href="{{ route('properties.show', $prop->slug) }}" class="w-full py-2.5 text-center bg-slate-100 hover:bg-brand-primary hover:text-white text-slate-800 font-bold text-xs rounded-xl transition duration-200">
                                Explore Details & Floorplan
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-12 flex justify-center">
                {{ $properties->links() }}
            </div>
        @else
            <div class="bg-white rounded-2xl p-12 text-center border border-slate-200 shadow-sm max-w-lg mx-auto">
                <div class="text-4xl mb-3">🏡</div>
                <h3 class="text-lg font-bold text-slate-800">No properties matched your search</h3>
                <p class="text-xs text-slate-500 mt-1 mb-5">Try resetting your filters or adjusting your location and property type.</p>
                <a href="{{ route('properties.index') }}" class="px-6 py-2.5 bg-brand-primary text-white text-xs font-bold rounded-xl shadow-md hover:bg-brand-dark transition">
                    View All Properties
                </a>
            </div>
        @endif

    </div>

@endsection

