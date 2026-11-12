@extends('layouts.app')

@section('title', 'About Our Legacy & Green Vision | ' . ($siteSettings['brand_name'] ?? 'RealEstate'))
@section('meta_description', 'Discover how RealEstate is redefining luxury real estate with biophilic architecture, zero-carbon engineering, and sustainable development.')

@section('content')

    <!-- Banner Header -->
    @php
        $aboutHero = isset($siteImages['about_hero']) ? $siteImages['about_hero']->url : 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=1600&q=80';
        $missionHero = isset($siteImages['about_mission']) ? $siteImages['about_mission']->url : 'https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?auto=format&fit=crop&w=1600&q=80';
    @endphp
    <div class="relative py-16 sm:py-24 bg-slate-900 bg-cover bg-center overflow-hidden" 
         style="background-image: linear-gradient(to right, rgba(15, 23, 42, 0.90), rgba(15, 23, 42, 0.75)), url('{{ $aboutHero }}');">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white relative z-10" data-motion="fade-up">
            <span class="text-xs font-bold uppercase tracking-widest text-emerald-400 bg-emerald-950/70 border border-emerald-500/30 px-3.5 py-1.5 rounded-full">
                15+ Years of Excellence
            </span>
            <h1 class="text-3xl sm:text-5xl font-black text-white mt-3 tracking-tight">
                Pioneering Sustainable Luxury Living
            </h1>
            <p class="text-slate-300 text-sm sm:text-base max-w-2xl mx-auto mt-2">
                We design and build homes that exist in equilibrium with their natural environment—delivering timeless architectural elegance, clean renewable energy, and unmatched comfort.
            </p>
        </div>
    </div>

    <!-- Story Section -->
    <section id="story" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div class="space-y-6" data-motion="fade-left">
                <span class="text-xs font-bold uppercase tracking-wider text-emerald-700 bg-emerald-100 px-3 py-1 rounded-full">
                    Our Story
                </span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 leading-tight">
                    Where Architectural Elegance Meets Environmental Consciousness
                </h2>
                <p class="text-sm text-slate-600 leading-relaxed">
                    Founded in 2011, <strong>{{ $siteSettings['brand_name'] ?? 'RealEstate' }}</strong> emerged with a resolute vision: to eradicate the conflict between luxury living and environmental stewardship.
                </p>
                <p class="text-sm text-slate-600 leading-relaxed">
                    Over the last 15 years, we have handed over keys to more than 10,000 delighted families across 50+ masterplanned developments. Every villa, apartment, and plot we develop adheres to strict IGBC and LEED green building benchmarks—utilizing locally sourced stone, certified timber, smart thermal insulation, and integrated renewable power.
                </p>
                
                <div class="pt-2 grid grid-cols-3 gap-4 border-t border-slate-100 text-center" data-motion-stagger>
                    <div class="p-3 bg-emerald-50 rounded-xl">
                        <div class="text-2xl font-black text-brand-primary">15+</div>
                        <div class="text-[11px] text-slate-600 font-semibold mt-0.5">Years Legacy</div>
                    </div>
                    <div class="p-3 bg-emerald-50 rounded-xl">
                        <div class="text-2xl font-black text-brand-primary">50+</div>
                        <div class="text-[11px] text-slate-600 font-semibold mt-0.5">Green Projects</div>
                    </div>
                    <div class="p-3 bg-emerald-50 rounded-xl">
                        <div class="text-2xl font-black text-brand-primary">10K+</div>
                        <div class="text-[11px] text-slate-600 font-semibold mt-0.5">Happy Clients</div>
                    </div>
                </div>
            </div>

            <div class="relative" data-motion="fade-right">
                <div class="rounded-3xl overflow-hidden shadow-2xl border-4 border-white">
                    <img src="{{ $aboutHero }}" alt="Our Story" class="w-full h-[460px] object-cover">
                </div>
            </div>
        </div>
    </section>

    <!-- Mission & Vision Section -->
    <section id="mission" class="bg-slate-900 text-white py-20 relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                
                <div class="order-2 lg:order-1 relative" data-motion="fade-left">
                    <div class="rounded-3xl overflow-hidden shadow-2xl border-4 border-slate-800">
                        <img src="{{ $missionHero }}" alt="Mission & Vision" class="w-full h-[460px] object-cover">
                    </div>
                </div>

                <div class="order-1 lg:order-2 space-y-6" data-motion="fade-right">
                    <span class="text-xs font-bold uppercase tracking-wider text-emerald-400 bg-emerald-950/80 border border-emerald-500/40 px-3 py-1 rounded-full">
                        Our Guiding Principles
                    </span>
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-white leading-tight">
                        Our Vision for Zero-Carbon Living
                    </h2>
                    
                    <div class="space-y-4">
                        <div class="bg-slate-800/70 p-5 rounded-2xl border border-slate-700">
                            <h4 class="text-base font-bold text-emerald-400 flex items-center space-x-2">
                                <span>🎯 Our Mission</span>
                            </h4>
                            <p class="text-xs text-slate-300 mt-1.5 leading-relaxed">
                                To engineer and deliver biophilic communities that produce more clean energy than they consume, preserve natural groundwater aquifers, and elevate residents' physical and mental wellness.
                            </p>
                        </div>

                        <div class="bg-slate-800/70 p-5 rounded-2xl border border-slate-700">
                            <h4 class="text-base font-bold text-emerald-400 flex items-center space-x-2">
                                <span>🌍 Our 2030 Vision</span>
                            </h4>
                            <p class="text-xs text-slate-300 mt-1.5 leading-relaxed">
                                To lead India's residential transformation toward 100% net-zero emissions, proving that high-end luxury, biophilia, and ecological responsibility can coexist seamlessly.
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Why Choose Us Pillars -->
    <section id="why-us" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
        <div class="text-center max-w-2xl mx-auto mb-14" data-motion="fade-up">
            <span class="text-xs font-bold uppercase tracking-wider text-emerald-700 bg-emerald-100 px-3 py-1 rounded-full">
                Core Advantages
            </span>
            <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 mt-2">
                Why Families Trust {{ $siteSettings['brand_name'] ?? 'RealEstate' }}
            </h2>
            <p class="text-sm text-slate-600 mt-2">
                Four uncompromised standards embedded in every foundation we lay.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6" data-motion-stagger>
            <div class="bg-white p-6 rounded-2xl border border-slate-200/80 shadow-sm hover:shadow-md transition">
                <div class="w-12 h-12 rounded-xl bg-emerald-100 text-emerald-700 flex items-center justify-center text-2xl mb-4">
                    ⚡
                </div>
                <h4 class="font-bold text-slate-900 text-base mb-1">Rooftop Solar Grids</h4>
                <p class="text-xs text-slate-500 leading-relaxed">Direct grid-tied solar panels powering high-efficiency HVAC and shared lighting amenities.</p>
            </div>

            <div class="bg-white p-6 rounded-2xl border border-slate-200/80 shadow-sm hover:shadow-md transition">
                <div class="w-12 h-12 rounded-xl bg-emerald-100 text-emerald-700 flex items-center justify-center text-2xl mb-4">
                    💧
                </div>
                <h4 class="font-bold text-slate-900 text-base mb-1">100% Water Recharging</h4>
                <p class="text-xs text-slate-500 leading-relaxed">Percolation pits, rainwater storage reservoirs, and indigenous drip-irrigation landscaping.</p>
            </div>

            <div class="bg-white p-6 rounded-2xl border border-slate-200/80 shadow-sm hover:shadow-md transition">
                <div class="w-12 h-12 rounded-xl bg-emerald-100 text-emerald-700 flex items-center justify-center text-2xl mb-4">
                    📜
                </div>
                <h4 class="font-bold text-slate-900 text-base mb-1">Clear Legal Titles</h4>
                <p class="text-xs text-slate-500 leading-relaxed">Zero litigation, fully approved masterplans, RERA registered developments with seamless banking approvals.</p>
            </div>

            <div class="bg-white p-6 rounded-2xl border border-slate-200/80 shadow-sm hover:shadow-md transition">
                <div class="w-12 h-12 rounded-xl bg-emerald-100 text-emerald-700 flex items-center justify-center text-2xl mb-4">
                    📈
                </div>
                <h4 class="font-bold text-slate-900 text-base mb-1">High Appreciation ROI</h4>
                <p class="text-xs text-slate-500 leading-relaxed">Strategic growth corridors in Gurugram and Delhi NCR delivering proven 18-24% capital appreciation.</p>
            </div>
        </div>
    </section>

@endsection

