@extends('admin.layouts.admin')

@section('title', 'Theme Colors & Site Settings')
@section('header_title', 'Brand Theme & Global Configurations')

@section('content')

    <div class="max-w-4xl mx-auto space-y-8">
        
        <div class="mb-6">
            <h3 class="text-xl font-black text-white">Centralized Brand Theme & Settings</h3>
            <p class="text-xs text-slate-400 mt-1">
                Colors and brand parameters are dynamically managed from this dashboard. Any change you save here instantly propagates across all pages without any hardcoded code changes.
            </p>
        </div>

        <form method="POST" action="{{ route('admin.settings.update') }}" class="space-y-8">
            @csrf

            <!-- Section 1: Dynamic Theme Colors -->
            <div class="bg-slate-900 border border-slate-800 rounded-3xl p-6 sm:p-8 shadow-sm space-y-6">
                <div class="border-b border-slate-800 pb-3 flex items-center justify-between">
                    <div>
                        <h4 class="text-base font-extrabold text-white flex items-center space-x-2">
                            <span>🎨 Dynamic Color Palette</span>
                        </h4>
                        <p class="text-xs text-slate-400 mt-0.5">Control the primary theme colors across navigation, buttons, badges, and accents.</p>
                    </div>
                    <span class="text-[10px] font-bold text-emerald-400 bg-emerald-950 px-2 py-0.5 rounded border border-emerald-800">Live Propagation</span>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                    <!-- Primary Color -->
                    <div class="p-4 bg-slate-950 rounded-2xl border border-slate-800 space-y-3">
                        <label class="block text-xs font-bold text-slate-300">Primary Color (Header / CTAs)</label>
                        <div class="flex items-center space-x-3">
                            <input type="color" name="brand_primary_color" value="{{ $siteSettings['brand_primary_color'] ?? '#2f9049' }}" class="w-12 h-12 rounded-xl cursor-pointer bg-transparent border-0 p-0">
                            <div>
                                <input type="text" name="brand_primary_color" value="{{ $siteSettings['brand_primary_color'] ?? '#2f9049' }}" class="text-xs px-2.5 py-1.5 bg-slate-900 border border-slate-700 rounded-lg text-white font-mono w-28">
                                <div class="text-[10px] text-slate-500 mt-0.5">Hex Code</div>
                            </div>
                        </div>
                    </div>

                    <!-- Dark Shade -->
                    <div class="p-4 bg-slate-950 rounded-2xl border border-slate-800 space-y-3">
                        <label class="block text-xs font-bold text-slate-300">Dark Shade (Hover States)</label>
                        <div class="flex items-center space-x-3">
                            <input type="color" name="brand_primary_dark" value="{{ $siteSettings['brand_primary_dark'] ?? '#236c37' }}" class="w-12 h-12 rounded-xl cursor-pointer bg-transparent border-0 p-0">
                            <div>
                                <input type="text" name="brand_primary_dark" value="{{ $siteSettings['brand_primary_dark'] ?? '#236c37' }}" class="text-xs px-2.5 py-1.5 bg-slate-900 border border-slate-700 rounded-lg text-white font-mono w-28">
                                <div class="text-[10px] text-slate-500 mt-0.5">Hex Code</div>
                            </div>
                        </div>
                    </div>

                    <!-- Topbar Color -->
                    <div class="p-4 bg-slate-950 rounded-2xl border border-slate-800 space-y-3">
                        <label class="block text-xs font-bold text-slate-300">Topbar & Footer (Slate/Dark)</label>
                        <div class="flex items-center space-x-3">
                            <input type="color" name="brand_topbar_color" value="{{ $siteSettings['brand_topbar_color'] ?? '#18202d' }}" class="w-12 h-12 rounded-xl cursor-pointer bg-transparent border-0 p-0">
                            <div>
                                <input type="text" name="brand_topbar_color" value="{{ $siteSettings['brand_topbar_color'] ?? '#18202d' }}" class="text-xs px-2.5 py-1.5 bg-slate-900 border border-slate-700 rounded-lg text-white font-mono w-28">
                                <div class="text-[10px] text-slate-500 mt-0.5">Hex Code</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section 2: Hero Section Copy -->
            <div class="bg-slate-900 border border-slate-800 rounded-3xl p-6 sm:p-8 shadow-sm space-y-4">
                <div class="border-b border-slate-800 pb-3">
                    <h4 class="text-base font-extrabold text-white">🏠 Hero Section Texts</h4>
                    <p class="text-xs text-slate-400">Headlines and badges shown on the homepage.</p>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-300 mb-1">Hero Floating Badge Text</label>
                    <input type="text" name="hero_pill_badge" value="{{ $siteSettings['hero_pill_badge'] ?? '🏠 RealEstate' }}" class="w-full text-xs px-3.5 py-2.5 bg-slate-950 border border-slate-800 rounded-xl text-white">
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-300 mb-1">Hero Main Heading</label>
                    <input type="text" name="hero_title" value="{{ $siteSettings['hero_title'] ?? 'Find Eco-Friendly Homes Easily' }}" class="w-full text-xs px-3.5 py-2.5 bg-slate-950 border border-slate-800 rounded-xl text-white">
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-300 mb-1">Hero Subtitle</label>
                    <textarea name="hero_subtitle" rows="2" class="w-full text-xs px-3.5 py-2.5 bg-slate-950 border border-slate-800 rounded-xl text-white">{{ $siteSettings['hero_subtitle'] ?? 'Featured one stop destination for all your real estate needs...' }}</textarea>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 pt-2">
                    <div>
                        <label class="block text-[11px] font-semibold text-slate-300 mb-1">Experience Stat</label>
                        <input type="text" name="stat_experience" value="{{ $siteSettings['stat_experience'] ?? '15+' }}" class="w-full text-xs px-3 py-2 bg-slate-950 border border-slate-800 rounded-xl text-white">
                    </div>
                    <div>
                        <label class="block text-[11px] font-semibold text-slate-300 mb-1">Projects Stat</label>
                        <input type="text" name="stat_projects" value="{{ $siteSettings['stat_projects'] ?? '50+' }}" class="w-full text-xs px-3 py-2 bg-slate-950 border border-slate-800 rounded-xl text-white">
                    </div>
                    <div>
                        <label class="block text-[11px] font-semibold text-slate-300 mb-1">Families Stat</label>
                        <input type="text" name="stat_families" value="{{ $siteSettings['stat_families'] ?? '10K+' }}" class="w-full text-xs px-3 py-2 bg-slate-950 border border-slate-800 rounded-xl text-white">
                    </div>
                </div>
            </div>

            <!-- Section 3: Contact & Business Details -->
            <div class="bg-slate-900 border border-slate-800 rounded-3xl p-6 sm:p-8 shadow-sm space-y-4">
                <div class="border-b border-slate-800 pb-3">
                    <h4 class="text-base font-extrabold text-white">📞 Contact & Business Information</h4>
                    <p class="text-xs text-slate-400">Official contact points displayed on header, footer, and contact page.</p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-semibold text-slate-300 mb-1">Support Phone</label>
                        <input type="text" name="contact_phone" value="{{ $siteSettings['contact_phone'] ?? '+91 98765 43210' }}" class="w-full text-xs px-3.5 py-2.5 bg-slate-950 border border-slate-800 rounded-xl text-white">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-300 mb-1">Official Email</label>
                        <input type="email" name="contact_email" value="{{ $siteSettings['contact_email'] ?? 'info@aghomesindia.com' }}" class="w-full text-xs px-3.5 py-2.5 bg-slate-950 border border-slate-800 rounded-xl text-white">
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-semibold text-slate-300 mb-1">WhatsApp Number (Without + or spaces)</label>
                        <input type="text" name="contact_whatsapp" value="{{ $siteSettings['contact_whatsapp'] ?? '919876543210' }}" class="w-full text-xs px-3.5 py-2.5 bg-slate-950 border border-slate-800 rounded-xl text-white">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-300 mb-1">Brand Name</label>
                        <input type="text" name="brand_name" value="{{ $siteSettings['brand_name'] ?? 'RealEstate' }}" class="w-full text-xs px-3.5 py-2.5 bg-slate-950 border border-slate-800 rounded-xl text-white">
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-300 mb-1">Head Office Address</label>
                    <textarea name="contact_address" rows="2" class="w-full text-xs px-3.5 py-2.5 bg-slate-950 border border-slate-800 rounded-xl text-white">{{ $siteSettings['contact_address'] ?? 'Skyline Tower, 4th Floor, Golf Course Extension Road, Gurugram, Haryana 122002' }}</textarea>
                </div>
            </div>

            <!-- Submit Button -->
            <div>
                <button type="submit" class="w-full py-4 bg-brand-primary hover:bg-brand-dark text-white font-extrabold rounded-2xl text-sm transition shadow-xl">
                    Save All Changes & Update Live Theme
                </button>
            </div>
        </form>

    </div>

@endsection

