@extends('layouts.app')

@section('title', $property->title . ' | ' . ($siteSettings['brand_name'] ?? 'AG HOMES INDIA'))
@section('meta_description', Str::limit(strip_tags($property->description), 160))

@section('content')

    <!-- Breadcrumb & Top Bar -->
    <div class="bg-white border-b border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
            <nav class="flex text-xs font-medium text-slate-500 space-x-2">
                <a href="{{ route('home') }}" class="hover:text-emerald-700">Home</a>
                <span>/</span>
                <a href="{{ route('properties.index') }}" class="hover:text-emerald-700">Properties</a>
                <span>/</span>
                <span class="text-slate-900 truncate">{{ $property->title }}</span>
            </nav>
        </div>
    </div>

    <!-- Main Property Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-12">
        
        <!-- Header Info -->
        <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-4 mb-8">
            <div>
                <div class="flex flex-wrap items-center gap-2 mb-2">
                    <span class="bg-brand-primary text-white text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider">
                        {{ ucfirst($property->property_type) }}
                    </span>
                    <span class="bg-slate-900 text-white text-xs font-semibold px-3 py-1 rounded-full">
                        {{ ucfirst(str_replace('_', ' ', $property->status)) }}
                    </span>
                    @if($property->is_eco_friendly)
                        <span class="bg-emerald-100 text-emerald-800 border border-emerald-300 text-xs font-bold px-3 py-1 rounded-full flex items-center space-x-1">
                            <span>🌱 IGBC Eco-Certified</span>
                        </span>
                    @endif
                </div>
                <h1 class="text-2xl sm:text-4xl font-extrabold text-slate-900 tracking-tight">
                    {{ $property->title }}
                </h1>
                <p class="text-sm text-slate-500 mt-1 flex items-center space-x-1.5">
                    <svg class="w-4 h-4 text-emerald-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                    <span>{{ $property->location }}, {{ $property->city }}, {{ $property->state }}</span>
                </p>
            </div>

            <div class="lg:text-right">
                <div class="text-xs text-slate-400 font-semibold uppercase tracking-wider">Listing Price</div>
                <div class="text-3xl sm:text-4xl font-black text-brand-primary tracking-tight">
                    {{ $property->price_display }}
                </div>
                <div class="text-[11px] text-slate-500 mt-0.5">Govt charges & stamp duty applicable</div>
            </div>
        </div>

        <!-- Photo Gallery Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 mb-12">
            <!-- Main Hero Image (Col Span 2) -->
            <div class="lg:col-span-2 rounded-2xl overflow-hidden shadow-lg h-[340px] sm:h-[480px] bg-slate-900 relative">
                <img id="mainViewer" src="{{ $property->main_image_url }}" alt="{{ $property->title }}" class="w-full h-full object-cover">
            </div>

            <!-- Thumbnail Sidebar -->
            <div class="grid grid-cols-2 lg:grid-cols-1 gap-3 h-full">
                @foreach(array_slice($property->all_images, 0, 3) as $imgUrl)
                    <div class="rounded-xl overflow-hidden h-[155px] bg-slate-100 cursor-pointer border-2 border-transparent hover:border-emerald-500 transition duration-200"
                         onclick="document.getElementById('mainViewer').src = '{{ $imgUrl }}'">
                        <img src="{{ $imgUrl }}" alt="{{ $property->title }}" class="w-full h-full object-cover">
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Content Grid (2 Columns: Left details, Right inquiry sidebar) -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10 items-start">
            
            <!-- Left 2 Cols: Specs, Overview, Description, Amenities -->
            <div class="lg:col-span-2 space-y-10">

                <!-- Key Specs Strip -->
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-200/80 grid grid-cols-2 sm:grid-cols-4 gap-4 text-center">
                    <div class="p-3 bg-slate-50 rounded-xl">
                        <div class="text-2xl mb-1">📐</div>
                        <div class="text-sm font-extrabold text-slate-900">{{ number_format($property->area_sqft) }} Sq. Ft</div>
                        <div class="text-[11px] text-slate-400 uppercase tracking-wider">Super Built-up</div>
                    </div>

                    <div class="p-3 bg-slate-50 rounded-xl">
                        <div class="text-2xl mb-1">🛏️</div>
                        <div class="text-sm font-extrabold text-slate-900">{{ $property->bedrooms ?? 'Open' }} Bedrooms</div>
                        <div class="text-[11px] text-slate-400 uppercase tracking-wider">Configuration</div>
                    </div>

                    <div class="p-3 bg-slate-50 rounded-xl">
                        <div class="text-2xl mb-1">🚿</div>
                        <div class="text-sm font-extrabold text-slate-900">{{ $property->bathrooms ?? 'Open' }} Bathrooms</div>
                        <div class="text-[11px] text-slate-400 uppercase tracking-wider">Fittings</div>
                    </div>

                    <div class="p-3 bg-slate-50 rounded-xl">
                        <div class="text-2xl mb-1">🚗</div>
                        <div class="text-sm font-extrabold text-slate-900">{{ $property->parking_spaces }} Covered</div>
                        <div class="text-[11px] text-slate-400 uppercase tracking-wider">EV Car Parking</div>
                    </div>
                </div>

                <!-- Description -->
                <div class="bg-white rounded-2xl p-6 sm:p-8 shadow-sm border border-slate-200/80 space-y-4">
                    <h3 class="text-xl font-bold text-slate-900 border-b border-slate-100 pb-3">
                        Property Description & Architectural Concept
                    </h3>
                    @if($property->tagline)
                        <p class="text-emerald-700 font-semibold text-sm">
                            "{{ $property->tagline }}"
                        </p>
                    @endif
                    <div class="text-sm text-slate-600 leading-relaxed space-y-3">
                        {!! nl2br(e($property->description)) !!}
                    </div>
                </div>

                <!-- Amenities & Sustainable Highlights -->
                @if(is_array($property->amenities) && count($property->amenities) > 0)
                    <div class="bg-white rounded-2xl p-6 sm:p-8 shadow-sm border border-slate-200/80 space-y-6">
                        <h3 class="text-xl font-bold text-slate-900 border-b border-slate-100 pb-3 flex items-center justify-between">
                            <span>Amenities & Sustainable Features</span>
                            <span class="text-xs font-semibold text-emerald-700 bg-emerald-50 px-2.5 py-1 rounded-full">Verified</span>
                        </h3>
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-3">
                            @foreach($property->amenities as $amenity)
                                <div class="flex items-center space-x-2 text-xs text-slate-700 bg-slate-50 p-3 rounded-xl border border-slate-100 font-medium">
                                    <span class="w-5 h-5 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center shrink-0">
                                        ✓
                                    </span>
                                    <span>{{ $amenity }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- Location & Address Card -->
                <div class="bg-white rounded-2xl p-6 sm:p-8 shadow-sm border border-slate-200/80 space-y-4">
                    <h3 class="text-xl font-bold text-slate-900 border-b border-slate-100 pb-3">
                        Location Overview
                    </h3>
                    <p class="text-xs text-slate-600">
                        <strong>Address:</strong> {{ $property->address ?? $property->location }}, {{ $property->city }}, {{ $property->state }}
                    </p>
                    <div class="rounded-xl overflow-hidden h-64 bg-slate-200 relative flex items-center justify-center">
                        <!-- Map Placeholder Graphic -->
                        <div class="text-center p-6 space-y-2">
                            <div class="text-4xl">🗺️</div>
                            <div class="font-bold text-slate-800 text-sm">Interactive GPS Location Map</div>
                            <div class="text-xs text-slate-500 max-w-sm">Site visits arranged with private chauffeur pickup on request. Contact our sales office for exact geo-coordinates.</div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Right 1 Col: Sticky Contact / Schedule Visit Sidebar -->
            <div class="lg:sticky lg:top-24 space-y-6">
                
                <!-- Inquiry Box -->
                <div class="bg-white rounded-2xl p-6 sm:p-7 shadow-lg border border-slate-200">
                    <span class="text-xs font-bold text-emerald-700 bg-emerald-50 px-2.5 py-1 rounded-full uppercase tracking-wider">
                        Direct Agent Inquiry
                    </span>
                    <h3 class="text-xl font-extrabold text-slate-900 mt-2">Book a Private Site Tour</h3>
                    <p class="text-xs text-slate-500 mt-1 mb-5">Fill in your information to receive the digital brochure, payment plans, and schedule a personalized tour.</p>

                    <form method="POST" action="{{ route('inquiries.store') }}" class="space-y-3.5">
                        @csrf
                        <input type="hidden" name="property_id" value="{{ $property->id }}">
                        <input type="hidden" name="inquiry_type" value="schedule_visit">
                        <input type="hidden" name="subject" value="Inquiry for {{ $property->title }}">

                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Full Name *</label>
                            <input type="text" name="name" required placeholder="Your Name" class="w-full text-xs sm:text-sm px-3.5 py-2.5 bg-slate-50 border border-slate-300 rounded-xl focus:bg-white focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Email Address *</label>
                            <input type="email" name="email" required placeholder="your.email@example.com" class="w-full text-xs sm:text-sm px-3.5 py-2.5 bg-slate-50 border border-slate-300 rounded-xl focus:bg-white focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Phone Number *</label>
                            <input type="tel" name="phone" required placeholder="+91 98765 43210" class="w-full text-xs sm:text-sm px-3.5 py-2.5 bg-slate-50 border border-slate-300 rounded-xl focus:bg-white focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Preferred Visit Date & Note</label>
                            <textarea name="message" rows="3" required placeholder="I am available on Saturday morning to visit this property..." class="w-full text-xs sm:text-sm px-3.5 py-2 bg-slate-50 border border-slate-300 rounded-xl focus:bg-white focus:ring-2 focus:ring-emerald-500 focus:outline-none"></textarea>
                        </div>

                        <button type="submit" class="w-full py-3 bg-brand-primary hover:bg-brand-dark text-white font-bold rounded-xl text-xs sm:text-sm transition shadow-md">
                            Schedule Site Walkthrough
                        </button>
                    </form>

                    <!-- Direct Connect Buttons -->
                    <div class="mt-5 pt-4 border-t border-slate-100 grid grid-cols-2 gap-2 text-center">
                        <a href="tel:{{ $property->contact_phone ?? $siteSettings['contact_phone'] ?? '+919876543210' }}" class="py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-800 text-xs font-bold rounded-xl transition flex items-center justify-center space-x-1">
                            <span>📞 Call Sales</span>
                        </a>
                        <a href="https://wa.me/{{ $siteSettings['contact_whatsapp'] ?? '919876543210' }}?text=Hello,%20I%20am%20interested%20in%20{{ urlencode($property->title) }}" target="_blank" class="py-2.5 bg-emerald-50 hover:bg-emerald-100 text-emerald-700 text-xs font-bold rounded-xl transition flex items-center justify-center space-x-1">
                            <span>💬 WhatsApp</span>
                        </a>
                    </div>
                </div>

                <!-- Verified Security Badge -->
                <div class="bg-slate-50 p-4 rounded-2xl border border-slate-200/80 text-xs text-slate-600 flex items-center space-x-3">
                    <span class="text-2xl">🛡️</span>
                    <div>
                        <div class="font-bold text-slate-900">RERA & Title Clear Property</div>
                        <div class="text-[11px] text-slate-500">100% verified legal documentation, ready for registry & home loan approval.</div>
                    </div>
                </div>

            </div>

        </div>

        <!-- Similar Properties Recommendations -->
        @if($similarProperties->count() > 0)
            <div class="mt-20 pt-10 border-t border-slate-200">
                <h3 class="text-2xl font-extrabold text-slate-900 mb-6">Similar Premium Properties</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @foreach($similarProperties as $sim)
                        <div class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-md border border-slate-200 transition">
                            <div class="h-44 overflow-hidden relative">
                                <img src="{{ $sim->main_image_url }}" alt="{{ $sim->title }}" class="w-full h-full object-cover">
                                <span class="absolute bottom-2 left-2 bg-slate-900/80 text-emerald-400 text-xs font-bold px-2 py-0.5 rounded">
                                    {{ $sim->price_display }}
                                </span>
                            </div>
                            <div class="p-4">
                                <h4 class="font-bold text-sm text-slate-900 line-clamp-1">
                                    <a href="{{ route('properties.show', $sim->slug) }}" class="hover:text-emerald-700">
                                        {{ $sim->title }}
                                    </a>
                                </h4>
                                <p class="text-xs text-slate-500 mt-1">{{ $sim->location }}, {{ $sim->city }}</p>
                                <a href="{{ route('properties.show', $sim->slug) }}" class="mt-3 block text-center text-xs font-bold text-emerald-700 bg-emerald-50 hover:bg-emerald-100 py-1.5 rounded-lg transition">
                                    View Property
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

    </div>

@endsection
