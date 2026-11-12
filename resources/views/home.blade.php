@extends('layouts.app')

@section('title', ($siteSettings['brand_name'] ?? 'RealEstate') . ' | Find Eco-Friendly Homes Easily')

@section('content')

    <!-- 1. HERO SECTION (Matching User Image Perfectly) -->
    @php
        $heroBg = isset($siteImages['hero_bg']) ? $siteImages['hero_bg']->url : 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=2400&q=85';
    @endphp
    <section class="relative min-h-[580px] lg:min-h-[660px] flex items-center bg-slate-900 bg-cover bg-center bg-no-repeat overflow-hidden" 
             style="background-image: linear-gradient(to right, rgba(15, 23, 42, 0.88) 0%, rgba(15, 23, 42, 0.65) 45%, rgba(15, 23, 42, 0.20) 100%), url('{{ $heroBg }}');">
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 lg:py-28 relative z-10 w-full">
            <div class="max-w-2xl text-white space-y-6">
                
                <!-- Floating Badge (🏠 RealEstate) -->
                <div class="inline-flex items-center space-x-2 bg-white/15 backdrop-blur-md border border-white/25 px-4 py-1.5 rounded-full text-xs font-semibold tracking-wide text-white shadow-sm">
                    <span>{{ $siteSettings['hero_pill_badge'] ?? '🏠 RealEstate' }}</span>
                </div>

                <!-- Main Hero Heading -->
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-black leading-tight tracking-tight text-white drop-shadow-md">
                    {{ $siteSettings['hero_title'] ?? 'Find Eco-Friendly Homes Easily' }}
                </h1>

                <!-- Hero Subtitle -->
                <p class="text-base sm:text-lg text-slate-200/90 font-normal leading-relaxed max-w-xl">
                    {{ $siteSettings['hero_subtitle'] ?? 'Featured one stop destination for all your real estate needs. Explore premium plots and homes designed for you.' }}
                </p>

                <!-- Explore Now CTA Button (Pill shape emerald green) -->
                <div class="pt-2">
                    <a href="#properties-section" class="inline-flex items-center space-x-2 px-8 py-3.5 bg-brand-primary hover:bg-brand-dark text-white text-sm font-bold rounded-full transition duration-300 shadow-xl hover:shadow-emerald-500/30 transform hover:-translate-y-0.5">
                        <span>{{ $siteSettings['hero_cta_text'] ?? 'Explore Now' }}</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                        </svg>
                    </a>
                </div>

                <!-- Stats Row (15+ Years, 50+ Projects, 10K+ Families) -->
                <div class="pt-8 grid grid-cols-3 gap-6 sm:gap-10 border-t border-white/20 max-w-lg">
                    <div>
                        <div class="text-2xl sm:text-3xl font-extrabold text-white">
                            {{ $siteSettings['stat_experience'] ?? '15+' }}
                        </div>
                        <div class="text-xs sm:text-sm text-slate-300 font-medium mt-0.5">
                            {{ $siteSettings['stat_experience_label'] ?? 'Years Experience' }}
                        </div>
                    </div>
                    <div>
                        <div class="text-2xl sm:text-3xl font-extrabold text-white">
                            {{ $siteSettings['stat_projects'] ?? '50+' }}
                        </div>
                        <div class="text-xs sm:text-sm text-slate-300 font-medium mt-0.5">
                            {{ $siteSettings['stat_projects_label'] ?? 'Premium Projects' }}
                        </div>
                    </div>
                    <div>
                        <div class="text-2xl sm:text-3xl font-extrabold text-white">
                            {{ $siteSettings['stat_families'] ?? '10K+' }}
                        </div>
                        <div class="text-xs sm:text-sm text-slate-300 font-medium mt-0.5">
                            {{ $siteSettings['stat_families_label'] ?? 'Happy Families' }}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- 2. INTERACTIVE PROPERTY SEARCH WIDGET (Overlapping bottom hero) -->
    <section class="max-w-6xl mx-auto px-4 -mt-10 relative z-20">
        <div class="bg-white rounded-2xl shadow-2xl p-4 sm:p-6 border border-slate-100">
            <form method="GET" action="{{ route('properties.index') }}" class="space-y-4">
                
                <!-- Status Tabs -->
                <div class="flex items-center space-x-2 border-b border-slate-100 pb-3 text-xs font-bold uppercase tracking-wider">
                    <label class="cursor-pointer">
                        <input type="radio" name="status" value="all" checked class="peer sr-only">
                        <span class="px-3.5 py-1.5 rounded-full text-slate-600 peer-checked:bg-brand-primary peer-checked:text-white transition">All Properties</span>
                    </label>
                    <label class="cursor-pointer">
                        <input type="radio" name="status" value="for_sale" class="peer sr-only">
                        <span class="px-3.5 py-1.5 rounded-full text-slate-600 peer-checked:bg-brand-primary peer-checked:text-white transition">Buy</span>
                    </label>
                    <label class="cursor-pointer">
                        <input type="radio" name="status" value="for_rent" class="peer sr-only">
                        <span class="px-3.5 py-1.5 rounded-full text-slate-600 peer-checked:bg-brand-primary peer-checked:text-white transition">Rent</span>
                    </label>
                    <label class="cursor-pointer">
                        <input type="checkbox" name="eco_friendly" value="1" class="peer sr-only">
                        <span class="px-3.5 py-1.5 rounded-full text-emerald-700 bg-emerald-50 peer-checked:bg-emerald-600 peer-checked:text-white transition flex items-center space-x-1">
                            <span>🌱 Eco-Certified Only</span>
                        </span>
                    </label>
                </div>

                <!-- Input Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3">
                    <!-- Keyword/Location -->
                    <div>
                        <label class="block text-[11px] font-bold text-slate-500 uppercase tracking-wider mb-1">Location / Keyword</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-400">
                                📍
                            </span>
                            <input type="text" name="keyword" placeholder="Golf Course Rd, Sector 65..." class="w-full text-xs sm:text-sm pl-9 pr-3 py-2.5 bg-slate-50 border border-slate-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                        </div>
                    </div>

                    <!-- Property Type -->
                    <div>
                        <label class="block text-[11px] font-bold text-slate-500 uppercase tracking-wider mb-1">Property Type</label>
                        <select name="type" class="w-full text-xs sm:text-sm px-3 py-2.5 bg-slate-50 border border-slate-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                            <option value="all">All Types</option>
                            <option value="villa">Luxury Villa</option>
                            <option value="apartment">Green Apartment</option>
                            <option value="penthouse">Biophilic Penthouse</option>
                            <option value="plot">Residential Plot</option>
                            <option value="commercial">Commercial Space</option>
                        </select>
                    </div>

                    <!-- Bedrooms -->
                    <div>
                        <label class="block text-[11px] font-bold text-slate-500 uppercase tracking-wider mb-1">Bedrooms</label>
                        <select name="bedrooms" class="w-full text-xs sm:text-sm px-3 py-2.5 bg-slate-50 border border-slate-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                            <option value="all">Any BHK</option>
                            <option value="2">2+ BHK</option>
                            <option value="3">3+ BHK</option>
                            <option value="4">4+ BHK</option>
                            <option value="5">5+ BHK</option>
                        </select>
                    </div>

                    <!-- Search Button -->
                    <div class="flex items-end">
                        <button type="submit" class="w-full py-2.5 bg-brand-primary hover:bg-brand-dark text-white font-bold rounded-xl text-xs sm:text-sm transition flex items-center justify-center space-x-2 shadow-md">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                            <span>Search Properties</span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </section>

    <!-- 3. FEATURED ECO-FRIENDLY PROPERTIES SECTION -->
    <section id="properties-section" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-12">
            <div>
                <div class="inline-flex items-center space-x-1.5 text-xs font-bold text-emerald-700 bg-emerald-100 px-3 py-1 rounded-full uppercase tracking-wider">
                    <span>🌿 Sustainable Living</span>
                </div>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 mt-2">
                    Featured Green & Eco Homes
                </h2>
                <p class="text-sm text-slate-600 mt-2 max-w-xl">
                    Discover prime properties built with renewable energy, rainwater conservation, zero-VOC materials, and lush natural surroundings.
                </p>
            </div>
            <div class="mt-4 md:mt-0">
                <a href="{{ route('properties.index') }}" class="inline-flex items-center space-x-1 text-sm font-bold text-brand-primary hover:text-brand-dark transition">
                    <span>View All Properties</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </a>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($featuredProperties as $prop)
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
    </section>

    <!-- 4. ECO-LIVING COMMITMENT SHOWCASE (Demonstrating Green Values) -->
    @php
        $ecoImg = isset($siteImages['eco_feature']) ? $siteImages['eco_feature']->url : 'https://images.unsplash.com/photo-1512917774080-9991f1c4c750?auto=format&fit=crop&w=1200&q=80';
    @endphp
    <section class="bg-emerald-900 text-white py-20 relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                
                <div class="space-y-6">
                    <span class="inline-flex items-center text-xs font-bold uppercase tracking-wider bg-emerald-800 text-emerald-300 px-3 py-1 rounded-full border border-emerald-700">
                        Why We Build Green
                    </span>
                    <h2 class="text-3xl sm:text-4xl font-extrabold leading-tight text-white">
                        Preserving Nature Without Compromising Luxury
                    </h2>
                    <p class="text-sm text-emerald-100/90 leading-relaxed">
                        Every home developed under {{ $siteSettings['brand_name'] ?? 'RealEstate' }} is engineered for longevity and environmental balance. We integrate renewable solar energy, harvested rainwater management, and biophilic architectural principles that drastically reduce energy costs while promoting wellness.
                    </p>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-2">
                        <div class="bg-emerald-800/60 p-4 rounded-xl border border-emerald-700/50">
                            <div class="text-2xl mb-1">☀️</div>
                            <h4 class="font-bold text-sm text-white">Solar Powered Grid</h4>
                            <p class="text-xs text-emerald-200/80 mt-1">Up to 70% energy savings with on-roof photovoltaic solar installations.</p>
                        </div>
                        <div class="bg-emerald-800/60 p-4 rounded-xl border border-emerald-700/50">
                            <div class="text-2xl mb-1">🌧️</div>
                            <h4 class="font-bold text-sm text-white">Rainwater Harvesting</h4>
                            <p class="text-xs text-emerald-200/80 mt-1">Groundwater recharge wells and dual-plumbing greywater systems.</p>
                        </div>
                        <div class="bg-emerald-800/60 p-4 rounded-xl border border-emerald-700/50">
                            <div class="text-2xl mb-1">🌲</div>
                            <h4 class="font-bold text-sm text-white">Natural Surroundings</h4>
                            <p class="text-xs text-emerald-200/80 mt-1">Properties nestled within pine woods, organic fruit groves & green belts.</p>
                        </div>
                        <div class="bg-emerald-800/60 p-4 rounded-xl border border-emerald-700/50">
                            <div class="text-2xl mb-1">⚡</div>
                            <h4 class="font-bold text-sm text-white">EV Infrastructure</h4>
                            <p class="text-xs text-emerald-200/80 mt-1">Dedicated electric vehicle charging ports integrated into private parking.</p>
                        </div>
                    </div>

                    <div class="pt-2">
                        <a href="{{ route('about') }}" class="inline-flex items-center space-x-2 px-6 py-3 bg-white text-emerald-900 font-bold rounded-full text-xs hover:bg-emerald-100 transition shadow-lg">
                            <span>Read Our Full Sustainability Manifesto</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                            </svg>
                        </a>
                    </div>
                </div>

                <div class="relative">
                    <div class="rounded-3xl overflow-hidden shadow-2xl border-4 border-emerald-700/40">
                        <img src="{{ $ecoImg }}" alt="Eco Friendly Living" class="w-full h-[450px] object-cover">
                    </div>
                    <div class="absolute -bottom-6 -left-6 bg-brand-topbar text-white p-5 rounded-2xl shadow-2xl border border-slate-700 max-w-xs hidden sm:block">
                        <div class="text-emerald-400 font-extrabold text-2xl">Zero Carbon</div>
                        <div class="text-xs text-slate-300 mt-1">Our certified projects neutralize their environmental impact within 5 years.</div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- 5. GALLERY HIGHLIGHT SECTION (Replacing Blog & News per user request) -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-12">
            <div>
                <span class="text-xs font-bold uppercase tracking-wider text-emerald-700 bg-emerald-100 px-3 py-1 rounded-full">Visual Showcase</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 mt-2">Architecture & Project Gallery</h2>
                <p class="text-sm text-slate-600 mt-2">A photographic glimpse into our sustainable villas, biophilic interiors, and masterplanned communities.</p>
            </div>
            <div class="mt-4 md:mt-0">
                <a href="{{ route('gallery.index') }}" class="inline-flex items-center space-x-1.5 text-sm font-bold text-brand-primary hover:text-brand-dark transition">
                    <span>Explore Full Gallery</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </a>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($galleryItems as $item)
                <div class="group relative rounded-2xl overflow-hidden shadow-md h-72 bg-slate-900">
                    <img src="{{ $item->image_url }}" alt="{{ $item->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500 opacity-90 group-hover:opacity-100">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                    
                    <div class="absolute top-4 left-4">
                        <span class="bg-emerald-600/90 text-white text-[11px] font-bold px-2.5 py-1 rounded-full uppercase tracking-wider">
                            {{ ucfirst(str_replace('_', ' ', $item->category)) }}
                        </span>
                    </div>

                    <div class="absolute bottom-4 left-4 right-4 text-white">
                        <h4 class="font-bold text-base group-hover:text-emerald-300 transition line-clamp-1">{{ $item->title }}</h4>
                        @if($item->location)
                            <p class="text-xs text-slate-300 flex items-center space-x-1 mt-0.5">
                                <span>📍</span>
                                <span>{{ $item->location }}</span>
                            </p>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <!-- 6. THE MINDS OF TRUST (LEADERSHIP & EXPERTS SECTION) -->
    <section class="py-20 bg-white border-t border-slate-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Section Header -->
            <div class="text-center max-w-3xl mx-auto mb-14">
                <span class="inline-block text-xs sm:text-sm font-bold uppercase tracking-[0.28em] text-amber-700">
                    EXPERTS BEHIND {{ $siteSettings['brand_name'] ?? 'S.K.' }}
                </span>
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black text-slate-900 tracking-tight mt-2.5">
                    THE MINDS OF TRUST
                </h2>
                <div class="w-14 h-1 bg-amber-600/80 mx-auto mt-4 rounded-full"></div>
            </div>

            <!-- Leadership Team Grid -->
            @php
                $teamMembers = [
                    [
                        'name' => 'SANDEEP TYAGI',
                        'role' => 'FOUNDER & CEO',
                        'image' => 'https://images.unsplash.com/photo-1560250097-0b93528c311a?auto=format&fit=crop&w=800&q=85',
                    ],
                    [
                        'name' => 'RAJEEV TYAGI',
                        'role' => 'ACQUISITION MANAGER',
                        'image' => 'https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?auto=format&fit=crop&w=800&q=85',
                    ],
                    [
                        'name' => 'PAWAN TYAGI',
                        'role' => 'SALES & ROI SPECIALIST',
                        'image' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=800&q=85',
                    ],
                    [
                        'name' => 'NEHA GUPTA',
                        'role' => 'CUSTOMER SUCCESS',
                        'image' => 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&w=800&q=85',
                    ],
                ];
            @endphp

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 sm:gap-8">
                @foreach($teamMembers as $member)
                    <div class="group text-center flex flex-col">
                        <!-- Portrait Box -->
                        <div class="relative w-full aspect-[4/3] overflow-hidden bg-slate-100 rounded-sm shadow-sm border border-slate-200/70 group-hover:shadow-lg transition-all duration-300">
                            <img src="{{ $member['image'] }}" 
                                 alt="{{ $member['name'] }}" 
                                 class="w-full h-full object-cover object-top filter grayscale contrast-105 group-hover:grayscale-0 group-hover:scale-105 transition-all duration-500 ease-out">
                            <div class="absolute inset-0 bg-gradient-to-t from-slate-950/20 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        </div>

                        <!-- Info -->
                        <div class="mt-4 space-y-1">
                            <h3 class="text-sm sm:text-base font-extrabold text-slate-900 uppercase tracking-wider group-hover:text-emerald-700 transition duration-200">
                                {{ $member['name'] }}
                            </h3>
                            <p class="text-[11px] font-semibold text-slate-500 uppercase tracking-[0.20em]">
                                {{ $member['role'] }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section>

    <!-- 7. CLIENT TESTIMONIALS & REVIEWS SECTION -->
    <section class="py-20 bg-slate-50 border-t border-slate-200/70 relative overflow-hidden">
        <!-- Subtle Background Decors -->
        <div class="absolute -top-24 -right-24 w-96 h-96 bg-emerald-100/50 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute -bottom-24 -left-24 w-96 h-96 bg-slate-200/50 rounded-full blur-3xl pointer-events-none"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            
            <!-- Section Header -->
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-14">
                <div>
                    <div class="inline-flex items-center space-x-2 text-xs font-bold uppercase tracking-wider text-emerald-800 bg-emerald-100/80 px-3.5 py-1.5 rounded-full border border-emerald-200/60">
                        <span>⭐ Client Testimonials</span>
                        <span class="text-emerald-500">•</span>
                        <span>4.9 / 5 Rating</span>
                    </div>
                    <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black text-slate-900 tracking-tight mt-3">
                        What Our Homeowners Say
                    </h2>
                    <p class="text-sm sm:text-base text-slate-600 mt-2 max-w-xl">
                        Real experiences from families and investors who built their sustainable future with us.
                    </p>
                </div>

                <div class="mt-4 md:mt-0 flex items-center space-x-2 text-xs font-semibold text-slate-500">
                    <span class="inline-flex items-center text-amber-500">
                        @for($i = 0; $i < 5; $i++)
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                        @endfor
                    </span>
                    <span class="font-bold text-slate-800">1,200+ Verified Buyers</span>
                </div>
            </div>

            <!-- Testimonials Grid -->
            @php
                $testimonials = [
                    [
                        'name' => 'Vikramaditya & Ananya Singhania',
                        'role' => 'Villa Owners, Sector 65',
                        'badge' => 'Solar Villa Buyer',
                        'image' => 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=400&q=80',
                        'rating' => 5,
                        'text' => 'Moving into an eco-certified villa cut our electricity bills by nearly 65% with the integrated rooftop solar grid. The cross-ventilation and natural lighting make the home feel completely refreshed every single day. The best decision for our family!',
                    ],
                    [
                        'name' => 'Dr. Rajesh K. Nair',
                        'role' => 'Investor, Greenbelt Farms',
                        'badge' => 'Verified Investor',
                        'image' => 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?auto=format&fit=crop&w=400&q=80',
                        'rating' => 5,
                        'text' => 'The absolute transparency shown by the leadership team is rare in the NCR property market. 100% clear titles, zero litigation, and meticulous groundwater recharge planning. My investment appreciated significantly within just 18 months.',
                    ],
                    [
                        'name' => 'Meera Kapoor & Family',
                        'role' => 'Resident, Biophilic Skyline',
                        'badge' => 'Penthouse Resident',
                        'image' => 'https://images.unsplash.com/photo-1580489944761-15a19d654956?auto=format&fit=crop&w=400&q=80',
                        'rating' => 5,
                        'text' => 'From our first site visit to the keys handover, the customer success team treated us like family. Our kids adore the private fruit groves and organic play areas. Living sustainably without sacrificing luxury is truly possible here.',
                    ],
                ];
            @endphp

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($testimonials as $item)
                    <div class="bg-white rounded-2xl p-7 sm:p-8 shadow-sm hover:shadow-xl transition-all duration-300 border border-slate-200/80 flex flex-col justify-between relative group">
                        
                        <!-- Decorative Quote Icon -->
                        <div class="absolute top-6 right-6 text-slate-100 group-hover:text-emerald-50 transition-colors duration-300">
                            <svg class="w-12 h-12 fill-current" viewBox="0 0 32 32">
                                <path d="M10 8c-3.3 0-6 2.7-6 6v10h10V14h-6c0-2.2 1.8-4 4-4V8zm14 0c-3.3 0-6 2.7-6 6v10h10V14h-6c0-2.2 1.8-4 4-4V8z"/>
                            </svg>
                        </div>

                        <!-- Top: Star Rating + Tag -->
                        <div class="relative z-10 space-y-4">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-1 text-amber-400">
                                    @for($i = 0; $i < $item['rating']; $i++)
                                        <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                        </svg>
                                    @endfor
                                </div>
                                <span class="text-[10px] font-bold uppercase tracking-wider px-2.5 py-1 rounded-full bg-emerald-50 text-emerald-700 border border-emerald-100">
                                    {{ $item['badge'] }}
                                </span>
                            </div>

                            <!-- Testimonial Quote -->
                            <p class="text-sm text-slate-700 leading-relaxed italic">
                                "{{ $item['text'] }}"
                            </p>
                        </div>

                        <!-- Bottom: User Identity -->
                        <div class="pt-6 mt-6 border-t border-slate-100 flex items-center space-x-3.5 relative z-10">
                            <img src="{{ $item['image'] }}" 
                                 alt="{{ $item['name'] }}" 
                                 class="w-12 h-12 rounded-full object-cover border-2 border-emerald-500/30 shadow-sm flex-shrink-0">
                            <div>
                                <h4 class="text-sm font-bold text-slate-900 group-hover:text-emerald-700 transition">
                                    {{ $item['name'] }}
                                </h4>
                                <p class="text-[11px] text-slate-500 font-medium">
                                    {{ $item['role'] }}
                                </p>
                            </div>
                        </div>

                    </div>
                @endforeach
            </div>

            <!-- Trust Stats Footer -->
            <div class="mt-14 pt-10 border-t border-slate-200/60 grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
                <div class="p-4 bg-white/60 rounded-xl border border-slate-100 shadow-xs">
                    <div class="text-2xl sm:text-3xl font-black text-slate-900">99.4%</div>
                    <div class="text-[11px] font-bold text-slate-500 uppercase tracking-wider mt-1">Satisfaction Rate</div>
                </div>
                <div class="p-4 bg-white/60 rounded-xl border border-slate-100 shadow-xs">
                    <div class="text-2xl sm:text-3xl font-black text-brand-primary">10,000+</div>
                    <div class="text-[11px] font-bold text-slate-500 uppercase tracking-wider mt-1">Keys Delivered</div>
                </div>
                <div class="p-4 bg-white/60 rounded-xl border border-slate-100 shadow-xs">
                    <div class="text-2xl sm:text-3xl font-black text-slate-900">100%</div>
                    <div class="text-[11px] font-bold text-slate-500 uppercase tracking-wider mt-1">Clean Title Deeded</div>
                </div>
                <div class="p-4 bg-white/60 rounded-xl border border-slate-100 shadow-xs">
                    <div class="text-2xl sm:text-3xl font-black text-emerald-600">65% Avg</div>
                    <div class="text-[11px] font-bold text-slate-500 uppercase tracking-wider mt-1">Power Savings</div>
                </div>
            </div>

        </div>
    </section>

    <!-- 8. CALL TO ACTION / QUICK INQUIRY BANNER -->
    @php
        $ctaBg = isset($siteImages['cta_banner']) ? $siteImages['cta_banner']->url : 'https://images.unsplash.com/photo-1613490493576-7fde63acd811?auto=format&fit=crop&w=1600&q=80';
    @endphp
    <section class="relative py-20 bg-cover bg-center overflow-hidden" 
             style="background-image: linear-gradient(rgba(24, 32, 45, 0.90), rgba(24, 32, 45, 0.90)), url('{{ $ctaBg }}');">
        <div class="max-w-5xl mx-auto px-4 text-center text-white space-y-6">
            <span class="text-xs font-bold uppercase tracking-widest text-emerald-400 bg-emerald-950/60 border border-emerald-500/40 px-3.5 py-1.5 rounded-full">
                Begin Your Journey
            </span>
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-white tracking-tight">
                Ready to Find Your Sustainable Dream Home?
            </h2>
            <p class="text-sm sm:text-base text-slate-300 max-w-2xl mx-auto leading-relaxed">
                Schedule a private site visit with our senior architects and green real estate advisors. We guide you through energy metrics, customized layouts, and flexible payment plans.
            </p>
            <div class="flex flex-wrap justify-center gap-4 pt-4">
                <button onclick="toggleQuickEnquiry()" class="px-8 py-3.5 bg-brand-primary hover:bg-brand-dark text-white font-bold rounded-full text-sm transition shadow-xl">
                    Schedule a Site Walkthrough
                </button>
                <a href="tel:{{ $siteSettings['contact_phone'] ?? '+919876543210' }}" class="px-8 py-3.5 bg-slate-800 hover:bg-slate-700 text-white font-bold rounded-full text-sm transition border border-slate-700">
                    Call: {{ $siteSettings['contact_phone'] ?? '+91 98765 43210' }}
                </a>
            </div>
        </div>
    </section>

@endsection

