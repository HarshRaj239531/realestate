@extends('admin.layouts.admin')

@section('title', 'Master Site Settings')
@section('header_title', 'Master Site & Brand Settings')

@section('content')

    <div class="max-w-6xl mx-auto space-y-6">
        
        <!-- Header Banner -->
        <div class="bg-white border border-slate-200/80 rounded-3xl p-6 sm:p-8 shadow-xs flex flex-col md:flex-row md:items-center justify-between gap-6">
            <div class="space-y-1">
                <div class="flex items-center space-x-2">
                    <span class="text-[10px] font-extrabold uppercase tracking-widest text-emerald-800 bg-emerald-50 px-3 py-1 rounded-full border border-emerald-200">
                        Central Control Engine
                    </span>
                    <span class="text-xs text-slate-400 font-medium">• Zero Code Required</span>
                </div>
                <h3 class="text-2xl font-black text-slate-900 tracking-tight">Complete Website Customizer</h3>
                <p class="text-xs text-slate-500 max-w-2xl leading-relaxed">
                    Update all text, theme palette, leadership portraits, reviews, FAQs, contact details, and social links in real-time across the live website.
                </p>
            </div>
            <div class="shrink-0 flex items-center space-x-3">
                <button type="button" onclick="openSettingsDrawer()" class="px-4 py-2 bg-purple-50 hover:bg-purple-100 text-purple-700 text-xs font-extrabold rounded-xl transition border border-purple-200 flex items-center space-x-1.5 shadow-2xs">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    <span>Open in Slide Drawer</span>
                </button>
                <div class="px-3.5 py-2 rounded-xl bg-slate-50 border border-slate-200/80 text-xs font-semibold text-slate-600 flex items-center space-x-2 hidden sm:flex">
                    <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                    <span>Live Auto-Sync</span>
                </div>
            </div>
        </div>

        <form method="POST" action="{{ route('admin.settings.update') }}" id="settingsForm" class="space-y-6">
            @csrf

            <!-- Navigation Tabs Bar (Modern Pill Tabs with Crisp SVG Icons) -->
            <div class="bg-white border border-slate-200/80 rounded-2xl p-2 shadow-xs flex flex-wrap items-center gap-1.5 sticky top-20 z-20">
                <button type="button" onclick="switchTab('tab-theme')" id="btn-tab-theme" class="tab-btn px-4 py-2 rounded-xl text-xs font-bold transition flex items-center space-x-2 bg-emerald-50 text-emerald-900 border border-emerald-200/80 shadow-2xs">
                    <svg class="w-3.5 h-3.5 text-emerald-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"/></svg>
                    <span>Colors & Theme</span>
                </button>
                <button type="button" onclick="switchTab('tab-general')" id="btn-tab-general" class="tab-btn px-4 py-2 rounded-xl text-xs font-bold transition flex items-center space-x-2 text-slate-600 hover:text-slate-900 hover:bg-slate-100">
                    <svg class="w-3.5 h-3.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                    <span>General & Brand</span>
                </button>
                <button type="button" onclick="switchTab('tab-contact')" id="btn-tab-contact" class="tab-btn px-4 py-2 rounded-xl text-xs font-bold transition flex items-center space-x-2 text-slate-600 hover:text-slate-900 hover:bg-slate-100">
                    <svg class="w-3.5 h-3.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                    <span>Contact & Offices</span>
                </button>
                <button type="button" onclick="switchTab('tab-hero')" id="btn-tab-hero" class="tab-btn px-4 py-2 rounded-xl text-xs font-bold transition flex items-center space-x-2 text-slate-600 hover:text-slate-900 hover:bg-slate-100">
                    <svg class="w-3.5 h-3.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                    <span>Hero & Stats</span>
                </button>
                <button type="button" onclick="switchTab('tab-team')" id="btn-tab-team" class="tab-btn px-4 py-2 rounded-xl text-xs font-bold transition flex items-center space-x-2 text-slate-600 hover:text-slate-900 hover:bg-slate-100">
                    <svg class="w-3.5 h-3.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                    <span>Leadership Team</span>
                </button>
                <button type="button" onclick="switchTab('tab-testimonials')" id="btn-tab-testimonials" class="tab-btn px-4 py-2 rounded-xl text-xs font-bold transition flex items-center space-x-2 text-slate-600 hover:text-slate-900 hover:bg-slate-100">
                    <svg class="w-3.5 h-3.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
                    <span>Testimonials</span>
                </button>
                <button type="button" onclick="switchTab('tab-faqs')" id="btn-tab-faqs" class="tab-btn px-4 py-2 rounded-xl text-xs font-bold transition flex items-center space-x-2 text-slate-600 hover:text-slate-900 hover:bg-slate-100">
                    <svg class="w-3.5 h-3.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <span>FAQs Accordion</span>
                </button>
                <button type="button" onclick="switchTab('tab-social')" id="btn-tab-social" class="tab-btn px-4 py-2 rounded-xl text-xs font-bold transition flex items-center space-x-2 text-slate-600 hover:text-slate-900 hover:bg-slate-100">
                    <svg class="w-3.5 h-3.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/></svg>
                    <span>Social Media</span>
                </button>

                <div class="ml-auto pl-2">
                    <button type="submit" class="px-5 py-2.5 bg-brand-primary hover:bg-brand-dark text-white text-xs font-extrabold rounded-xl transition shadow-sm shadow-emerald-600/25 flex items-center space-x-1.5">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        <span>Save Changes</span>
                    </button>
                </div>
            </div>

            <!-- TAB 1: THEME & BRAND COLORS -->
            <div id="tab-theme" class="tab-panel bg-white border border-slate-200/80 rounded-3xl p-6 sm:p-8 shadow-xs space-y-6">
                <div class="border-b border-slate-100 pb-4 flex items-center justify-between">
                    <div>
                        <h4 class="text-lg font-black text-slate-900 flex items-center space-x-2">
                            <span>Dynamic Color Palette</span>
                        </h4>
                        <p class="text-xs text-slate-500 mt-0.5">Control the primary theme colors across navigation, buttons, badges, and accents.</p>
                    </div>
                    <span class="text-[10px] font-bold text-emerald-800 bg-emerald-50 px-3 py-1 rounded-full border border-emerald-200">Live Propagation</span>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    <!-- Primary Color -->
                    <div class="p-5 bg-slate-50/70 rounded-2xl border border-slate-200/80 space-y-3">
                        <label class="block text-xs font-bold text-slate-700">Primary Color (Buttons & Badges)</label>
                        <div class="flex items-center space-x-3">
                            <input type="color" name="brand_primary_color" id="picker_primary" value="{{ $siteSettings['brand_primary_color'] ?? '#2f9049' }}" class="w-12 h-12 rounded-xl cursor-pointer bg-white border border-slate-300 p-0.5 shadow-2xs" onchange="document.getElementById('text_primary').value = this.value">
                            <div>
                                <input type="text" name="brand_primary_color" id="text_primary" value="{{ $siteSettings['brand_primary_color'] ?? '#2f9049' }}" class="text-xs px-2.5 py-1.5 bg-white border border-slate-300 rounded-lg text-slate-800 font-mono w-28 focus:ring-1 focus:ring-emerald-500" onkeyup="document.getElementById('picker_primary').value = this.value">
                                <div class="text-[10px] text-slate-400 mt-0.5 font-medium">Default: #2f9049</div>
                            </div>
                        </div>
                    </div>

                    <!-- Dark Shade -->
                    <div class="p-5 bg-slate-50/70 rounded-2xl border border-slate-200/80 space-y-3">
                        <label class="block text-xs font-bold text-slate-700">Dark Shade (Hover States)</label>
                        <div class="flex items-center space-x-3">
                            <input type="color" name="brand_primary_dark" id="picker_dark" value="{{ $siteSettings['brand_primary_dark'] ?? '#236c37' }}" class="w-12 h-12 rounded-xl cursor-pointer bg-white border border-slate-300 p-0.5 shadow-2xs" onchange="document.getElementById('text_dark').value = this.value">
                            <div>
                                <input type="text" name="brand_primary_dark" id="text_dark" value="{{ $siteSettings['brand_primary_dark'] ?? '#236c37' }}" class="text-xs px-2.5 py-1.5 bg-white border border-slate-300 rounded-lg text-slate-800 font-mono w-28 focus:ring-1 focus:ring-emerald-500" onkeyup="document.getElementById('picker_dark').value = this.value">
                                <div class="text-[10px] text-slate-400 mt-0.5 font-medium">Default: #236c37</div>
                            </div>
                        </div>
                    </div>

                    <!-- Topbar Color -->
                    <div class="p-5 bg-slate-50/70 rounded-2xl border border-slate-200/80 space-y-3">
                        <label class="block text-xs font-bold text-slate-700">Topbar & Dark Elements</label>
                        <div class="flex items-center space-x-3">
                            <input type="color" name="brand_topbar_color" id="picker_topbar" value="{{ $siteSettings['brand_topbar_color'] ?? '#18202d' }}" class="w-12 h-12 rounded-xl cursor-pointer bg-white border border-slate-300 p-0.5 shadow-2xs" onchange="document.getElementById('text_topbar').value = this.value">
                            <div>
                                <input type="text" name="brand_topbar_color" id="text_topbar" value="{{ $siteSettings['brand_topbar_color'] ?? '#18202d' }}" class="text-xs px-2.5 py-1.5 bg-white border border-slate-300 rounded-lg text-slate-800 font-mono w-28 focus:ring-1 focus:ring-emerald-500" onkeyup="document.getElementById('picker_topbar').value = this.value">
                                <div class="text-[10px] text-slate-400 mt-0.5 font-medium">Default: #18202d</div>
                            </div>
                        </div>
                    </div>

                    <!-- Accent Color -->
                    <div class="p-5 bg-slate-50/70 rounded-2xl border border-slate-200/80 space-y-3">
                        <label class="block text-xs font-bold text-slate-700">Accent Gold & Highlights</label>
                        <div class="flex items-center space-x-3">
                            <input type="color" name="brand_accent_color" id="picker_accent" value="{{ $siteSettings['brand_accent_color'] ?? '#d97706' }}" class="w-12 h-12 rounded-xl cursor-pointer bg-white border border-slate-300 p-0.5 shadow-2xs" onchange="document.getElementById('text_accent').value = this.value">
                            <div>
                                <input type="text" name="brand_accent_color" id="text_accent" value="{{ $siteSettings['brand_accent_color'] ?? '#d97706' }}" class="text-xs px-2.5 py-1.5 bg-white border border-slate-300 rounded-lg text-slate-800 font-mono w-28 focus:ring-1 focus:ring-emerald-500" onkeyup="document.getElementById('picker_accent').value = this.value">
                                <div class="text-[10px] text-slate-400 mt-0.5 font-medium">Default: #d97706</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- TAB 2: GENERAL & BRAND IDENTITY -->
            <div id="tab-general" class="tab-panel hidden bg-white border border-slate-200/80 rounded-3xl p-6 sm:p-8 shadow-xs space-y-5">
                <div class="border-b border-slate-100 pb-3">
                    <h4 class="text-lg font-black text-slate-900">General Brand Identity</h4>
                    <p class="text-xs text-slate-500">Core company naming and public brand identity parameters.</p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1.5">Official Brand / Company Name</label>
                        <input type="text" name="brand_name" value="{{ $siteSettings['brand_name'] ?? 'RealEstate' }}" class="w-full text-xs sm:text-sm px-3.5 py-2.5 bg-slate-50 border border-slate-300 rounded-xl focus:bg-white focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                        <p class="text-[11px] text-slate-400 mt-1">Appears in navbar, footer, page titles, and disclaimers.</p>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1.5">Brand Tagline / Slogan</label>
                        <input type="text" name="brand_tagline" value="{{ $siteSettings['brand_tagline'] ?? 'Find Eco-Friendly Homes Easily' }}" class="w-full text-xs sm:text-sm px-3.5 py-2.5 bg-slate-50 border border-slate-300 rounded-xl focus:bg-white focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                        <p class="text-[11px] text-slate-400 mt-1">Shown in the header subtext and metadata.</p>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1.5">Currency Symbol</label>
                        <input type="text" name="currency_symbol" value="{{ $siteSettings['currency_symbol'] ?? '₹' }}" class="w-full text-xs sm:text-sm px-3.5 py-2.5 bg-slate-50 border border-slate-300 rounded-xl focus:bg-white focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                        <p class="text-[11px] text-slate-400 mt-1">e.g. ₹ or $ for all listed property pricing.</p>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1.5">Copyright Statement</label>
                        <input type="text" name="copyright_text" value="{{ $siteSettings['copyright_text'] ?? '© ' . date('Y') . ' RealEstate Infratech Ltd. All rights reserved.' }}" class="w-full text-xs sm:text-sm px-3.5 py-2.5 bg-slate-50 border border-slate-300 rounded-xl focus:bg-white focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1.5">Footer Brand Summary</label>
                    <textarea name="site_footer_about" rows="3" class="w-full text-xs sm:text-sm px-3.5 py-2.5 bg-slate-50 border border-slate-300 rounded-xl focus:bg-white focus:ring-2 focus:ring-emerald-500 focus:outline-none">{{ $siteSettings['site_footer_about'] ?? 'Pioneering sustainable and biophilic luxury living spaces with 100% verified legal chain documentation and zero brokerage across Delhi NCR and West UP.' }}</textarea>
                </div>
            </div>

            <!-- TAB 3: CONTACT & OFFICES -->
            <div id="tab-contact" class="tab-panel hidden bg-white border border-slate-200/80 rounded-3xl p-6 sm:p-8 shadow-xs space-y-5">
                <div class="border-b border-slate-100 pb-3">
                    <h4 class="text-lg font-black text-slate-900">Contact & Office Information</h4>
                    <p class="text-xs text-slate-500">Official contact points displayed on topbar, footer, and contact page.</p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1.5">Primary Sales Phone</label>
                        <input type="text" name="contact_phone" value="{{ $siteSettings['contact_phone'] ?? '+91 98765 43210' }}" class="w-full text-xs sm:text-sm px-3.5 py-2.5 bg-slate-50 border border-slate-300 rounded-xl focus:bg-white focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1.5">Official Support Email</label>
                        <input type="email" name="contact_email" value="{{ $siteSettings['contact_email'] ?? 'info@realestate.com' }}" class="w-full text-xs sm:text-sm px-3.5 py-2.5 bg-slate-50 border border-slate-300 rounded-xl focus:bg-white focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1.5">WhatsApp Number (International Digits Only)</label>
                        <input type="text" name="contact_whatsapp" value="{{ $siteSettings['contact_whatsapp'] ?? '919876543210' }}" class="w-full text-xs sm:text-sm px-3.5 py-2.5 bg-slate-50 border border-slate-300 rounded-xl focus:bg-white focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                        <p class="text-[11px] text-slate-400 mt-1">Used for floating WhatsApp button and instant lead chat (e.g. 919876543210).</p>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1.5">Visiting / Office Hours</label>
                        <input type="text" name="contact_hours" value="{{ $siteSettings['contact_hours'] ?? 'Mon - Sat: 9:30 AM - 7:00 PM | Sun: Appointment Only' }}" class="w-full text-xs sm:text-sm px-3.5 py-2.5 bg-slate-50 border border-slate-300 rounded-xl focus:bg-white focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1.5">Head Office Physical Address</label>
                    <textarea name="contact_address" rows="2" class="w-full text-xs sm:text-sm px-3.5 py-2.5 bg-slate-50 border border-slate-300 rounded-xl focus:bg-white focus:ring-2 focus:ring-emerald-500 focus:outline-none">{{ $siteSettings['contact_address'] ?? 'Skyline Tower, 4th Floor, Golf Course Extension Road, Gurugram, Haryana 122002' }}</textarea>
                </div>
            </div>

            <!-- TAB 4: HOMEPAGE HERO & STATS COUNTERS -->
            <div id="tab-hero" class="tab-panel hidden bg-white border border-slate-200/80 rounded-3xl p-6 sm:p-8 shadow-xs space-y-5">
                <div class="border-b border-slate-100 pb-3">
                    <h4 class="text-lg font-black text-slate-900">Homepage Hero Banner & Key Metrics</h4>
                    <p class="text-xs text-slate-500">Customize the prime hero area and animated achievement counters on the homepage.</p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1.5">Hero Floating Badge Text</label>
                        <input type="text" name="hero_pill_badge" value="{{ $siteSettings['hero_pill_badge'] ?? '🏠 RealEstate' }}" class="w-full text-xs sm:text-sm px-3.5 py-2.5 bg-slate-50 border border-slate-300 rounded-xl focus:bg-white focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1.5">Hero CTA Button Text</label>
                        <input type="text" name="hero_cta_text" value="{{ $siteSettings['hero_cta_text'] ?? 'Explore Now' }}" class="w-full text-xs sm:text-sm px-3.5 py-2.5 bg-slate-50 border border-slate-300 rounded-xl focus:bg-white focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1.5">Hero Main Title</label>
                    <input type="text" name="hero_title" value="{{ $siteSettings['hero_title'] ?? 'Find Eco-Friendly Homes Easily' }}" class="w-full text-xs sm:text-sm px-3.5 py-2.5 bg-slate-50 border border-slate-300 rounded-xl focus:bg-white focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1.5">Hero Subtitle</label>
                    <textarea name="hero_subtitle" rows="2" class="w-full text-xs sm:text-sm px-3.5 py-2.5 bg-slate-50 border border-slate-300 rounded-xl focus:bg-white focus:ring-2 focus:ring-emerald-500 focus:outline-none">{{ $siteSettings['hero_subtitle'] ?? 'Featured one stop destination for all your real estate needs. Explore premium plots and homes designed for you.' }}</textarea>
                </div>

                <div class="pt-4 border-t border-slate-100">
                    <h5 class="text-sm font-extrabold text-slate-900 mb-3">Live Achievement Stats Counters</h5>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                        <!-- Stat 1 -->
                        <div class="p-4 bg-slate-50 rounded-2xl border border-slate-200">
                            <label class="block text-[11px] font-bold text-slate-600 mb-1">Stat 1 Value</label>
                            <input type="text" name="stat_experience" value="{{ $siteSettings['stat_experience'] ?? '15+' }}" class="w-full text-xs px-3 py-2 bg-white border border-slate-300 rounded-lg font-bold text-emerald-700 mb-2">
                            <label class="block text-[11px] font-bold text-slate-600 mb-1">Stat 1 Label</label>
                            <input type="text" name="stat_experience_label" value="{{ $siteSettings['stat_experience_label'] ?? 'Years Experience' }}" class="w-full text-xs px-3 py-2 bg-white border border-slate-300 rounded-lg">
                        </div>

                        <!-- Stat 2 -->
                        <div class="p-4 bg-slate-50 rounded-2xl border border-slate-200">
                            <label class="block text-[11px] font-bold text-slate-600 mb-1">Stat 2 Value</label>
                            <input type="text" name="stat_projects" value="{{ $siteSettings['stat_projects'] ?? '50+' }}" class="w-full text-xs px-3 py-2 bg-white border border-slate-300 rounded-lg font-bold text-emerald-700 mb-2">
                            <label class="block text-[11px] font-bold text-slate-600 mb-1">Stat 2 Label</label>
                            <input type="text" name="stat_projects_label" value="{{ $siteSettings['stat_projects_label'] ?? 'Premium Projects' }}" class="w-full text-xs px-3 py-2 bg-white border border-slate-300 rounded-lg">
                        </div>

                        <!-- Stat 3 -->
                        <div class="p-4 bg-slate-50 rounded-2xl border border-slate-200">
                            <label class="block text-[11px] font-bold text-slate-600 mb-1">Stat 3 Value</label>
                            <input type="text" name="stat_families" value="{{ $siteSettings['stat_families'] ?? '10K+' }}" class="w-full text-xs px-3 py-2 bg-white border border-slate-300 rounded-lg font-bold text-emerald-700 mb-2">
                            <label class="block text-[11px] font-bold text-slate-600 mb-1">Stat 3 Label</label>
                            <input type="text" name="stat_families_label" value="{{ $siteSettings['stat_families_label'] ?? 'Happy Families' }}" class="w-full text-xs px-3 py-2 bg-white border border-slate-300 rounded-lg">
                        </div>

                        <!-- Stat 4 -->
                        <div class="p-4 bg-slate-50 rounded-2xl border border-slate-200">
                            <label class="block text-[11px] font-bold text-slate-600 mb-1">Stat 4 Value</label>
                            <input type="text" name="stat_acres" value="{{ $siteSettings['stat_acres'] ?? '250+' }}" class="w-full text-xs px-3 py-2 bg-white border border-slate-300 rounded-lg font-bold text-emerald-700 mb-2">
                            <label class="block text-[11px] font-bold text-slate-600 mb-1">Stat 4 Label</label>
                            <input type="text" name="stat_acres_label" value="{{ $siteSettings['stat_acres_label'] ?? 'Acres Developed' }}" class="w-full text-xs px-3 py-2 bg-white border border-slate-300 rounded-lg">
                        </div>
                    </div>
                </div>
            </div>

            <!-- TAB 5: LEADERSHIP TEAM ("THE MINDS OF TRUST") -->
            <div id="tab-team" class="tab-panel hidden bg-white border border-slate-200/80 rounded-3xl p-6 sm:p-8 shadow-xs space-y-6">
                <div class="border-b border-slate-100 pb-3">
                    <h4 class="text-lg font-black text-slate-900">Leadership Team Section ("The Minds of Trust")</h4>
                    <p class="text-xs text-slate-500">Edit titles, photos, names, and designations of the executive team shown on the homepage.</p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Section Tagline / Subtitle</label>
                        <input type="text" name="team_subtitle" value="{{ $siteSettings['team_subtitle'] ?? 'EXPERTS BEHIND S.K.' }}" class="w-full text-xs px-3.5 py-2.5 bg-slate-50 border border-slate-300 rounded-xl">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Section Main Heading</label>
                        <input type="text" name="team_title" value="{{ $siteSettings['team_title'] ?? 'THE MINDS OF TRUST' }}" class="w-full text-xs px-3.5 py-2.5 bg-slate-50 border border-slate-300 rounded-xl">
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
                    
                    <!-- Member 1 -->
                    <div class="p-4 bg-slate-50 rounded-2xl border border-slate-200 space-y-3">
                        <div class="font-bold text-xs text-emerald-800 uppercase tracking-wider">Executive 1</div>
                        <div>
                            <label class="block text-[11px] font-semibold text-slate-600 mb-1">Full Name</label>
                            <input type="text" name="team_member_1_name" value="{{ $siteSettings['team_member_1_name'] ?? 'SANDEEP TYAGI' }}" class="w-full text-xs px-3 py-2 bg-white border border-slate-300 rounded-lg font-bold">
                        </div>
                        <div>
                            <label class="block text-[11px] font-semibold text-slate-600 mb-1">Role / Designation</label>
                            <input type="text" name="team_member_1_role" value="{{ $siteSettings['team_member_1_role'] ?? 'FOUNDER & CEO' }}" class="w-full text-xs px-3 py-2 bg-white border border-slate-300 rounded-lg">
                        </div>
                        <div>
                            <label class="block text-[11px] font-semibold text-slate-600 mb-1">Photo URL</label>
                            <input type="text" name="team_member_1_image" value="{{ $siteSettings['team_member_1_image'] ?? 'https://images.unsplash.com/photo-1560250097-0b93528c311a?auto=format&fit=crop&w=800&q=85' }}" class="w-full text-xs px-3 py-2 bg-white border border-slate-300 rounded-lg">
                        </div>
                    </div>

                    <!-- Member 2 -->
                    <div class="p-4 bg-slate-50 rounded-2xl border border-slate-200 space-y-3">
                        <div class="font-bold text-xs text-emerald-800 uppercase tracking-wider">Executive 2</div>
                        <div>
                            <label class="block text-[11px] font-semibold text-slate-600 mb-1">Full Name</label>
                            <input type="text" name="team_member_2_name" value="{{ $siteSettings['team_member_2_name'] ?? 'RAJEEV TYAGI' }}" class="w-full text-xs px-3 py-2 bg-white border border-slate-300 rounded-lg font-bold">
                        </div>
                        <div>
                            <label class="block text-[11px] font-semibold text-slate-600 mb-1">Role / Designation</label>
                            <input type="text" name="team_member_2_role" value="{{ $siteSettings['team_member_2_role'] ?? 'ACQUISITION MANAGER' }}" class="w-full text-xs px-3 py-2 bg-white border border-slate-300 rounded-lg">
                        </div>
                        <div>
                            <label class="block text-[11px] font-semibold text-slate-600 mb-1">Photo URL</label>
                            <input type="text" name="team_member_2_image" value="{{ $siteSettings['team_member_2_image'] ?? 'https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?auto=format&fit=crop&w=800&q=85' }}" class="w-full text-xs px-3 py-2 bg-white border border-slate-300 rounded-lg">
                        </div>
                    </div>

                    <!-- Member 3 -->
                    <div class="p-4 bg-slate-50 rounded-2xl border border-slate-200 space-y-3">
                        <div class="font-bold text-xs text-emerald-800 uppercase tracking-wider">Executive 3</div>
                        <div>
                            <label class="block text-[11px] font-semibold text-slate-600 mb-1">Full Name</label>
                            <input type="text" name="team_member_3_name" value="{{ $siteSettings['team_member_3_name'] ?? 'PAWAN TYAGI' }}" class="w-full text-xs px-3 py-2 bg-white border border-slate-300 rounded-lg font-bold">
                        </div>
                        <div>
                            <label class="block text-[11px] font-semibold text-slate-600 mb-1">Role / Designation</label>
                            <input type="text" name="team_member_3_role" value="{{ $siteSettings['team_member_3_role'] ?? 'SALES & ROI SPECIALIST' }}" class="w-full text-xs px-3 py-2 bg-white border border-slate-300 rounded-lg">
                        </div>
                        <div>
                            <label class="block text-[11px] font-semibold text-slate-600 mb-1">Photo URL</label>
                            <input type="text" name="team_member_3_image" value="{{ $siteSettings['team_member_3_image'] ?? 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=800&q=85' }}" class="w-full text-xs px-3 py-2 bg-white border border-slate-300 rounded-lg">
                        </div>
                    </div>

                    <!-- Member 4 -->
                    <div class="p-4 bg-slate-50 rounded-2xl border border-slate-200 space-y-3">
                        <div class="font-bold text-xs text-emerald-800 uppercase tracking-wider">Executive 4</div>
                        <div>
                            <label class="block text-[11px] font-semibold text-slate-600 mb-1">Full Name</label>
                            <input type="text" name="team_member_4_name" value="{{ $siteSettings['team_member_4_name'] ?? 'NEHA GUPTA' }}" class="w-full text-xs px-3 py-2 bg-white border border-slate-300 rounded-lg font-bold">
                        </div>
                        <div>
                            <label class="block text-[11px] font-semibold text-slate-600 mb-1">Role / Designation</label>
                            <input type="text" name="team_member_4_role" value="{{ $siteSettings['team_member_4_role'] ?? 'CUSTOMER SUCCESS' }}" class="w-full text-xs px-3 py-2 bg-white border border-slate-300 rounded-lg">
                        </div>
                        <div>
                            <label class="block text-[11px] font-semibold text-slate-600 mb-1">Photo URL</label>
                            <input type="text" name="team_member_4_image" value="{{ $siteSettings['team_member_4_image'] ?? 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&w=800&q=85' }}" class="w-full text-xs px-3 py-2 bg-white border border-slate-300 rounded-lg">
                        </div>
                    </div>

                </div>
            </div>

            <!-- TAB 6: CLIENT TESTIMONIALS ("TRUSTED BY THOUSANDS") -->
            <div id="tab-testimonials" class="tab-panel hidden bg-white border border-slate-200/80 rounded-3xl p-6 sm:p-8 shadow-xs space-y-6">
                <div class="border-b border-slate-100 pb-3">
                    <h4 class="text-lg font-black text-slate-900">Client Testimonials ("Trusted by Thousands")</h4>
                    <p class="text-xs text-slate-500">Edit client reviews, names, ratings, and quotes displayed on the homepage.</p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Section Tagline / Subtitle</label>
                        <input type="text" name="testimonials_subtitle" value="{{ $siteSettings['testimonials_subtitle'] ?? 'WHAT OUR CLIENTS SAY' }}" class="w-full text-xs px-3.5 py-2.5 bg-slate-50 border border-slate-300 rounded-xl">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Section Main Heading</label>
                        <input type="text" name="testimonials_title" value="{{ $siteSettings['testimonials_title'] ?? 'TRUSTED BY THOUSANDS' }}" class="w-full text-xs px-3.5 py-2.5 bg-slate-50 border border-slate-300 rounded-xl">
                    </div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    
                    <!-- Review 1 -->
                    <div class="p-5 bg-slate-50 rounded-2xl border border-slate-200 space-y-3">
                        <div class="font-bold text-xs text-emerald-800 uppercase tracking-wider">Testimonial 1</div>
                        <div>
                            <label class="block text-[11px] font-semibold text-slate-600 mb-1">Client Name</label>
                            <input type="text" name="review_1_name" value="{{ $siteSettings['review_1_name'] ?? 'AMIT KHANNA' }}" class="w-full text-xs px-3 py-2 bg-white border border-slate-300 rounded-lg font-bold">
                        </div>
                        <div>
                            <label class="block text-[11px] font-semibold text-slate-600 mb-1">Role & City</label>
                            <input type="text" name="review_1_role" value="{{ $siteSettings['review_1_role'] ?? 'BUYER, RAJ NAGAR EXT.' }}" class="w-full text-xs px-3 py-2 bg-white border border-slate-300 rounded-lg">
                        </div>
                        <div>
                            <label class="block text-[11px] font-semibold text-slate-600 mb-1">Highlight Badge Tag</label>
                            <input type="text" name="review_1_tag" value="{{ $siteSettings['review_1_tag'] ?? 'Zero Brokerage Deal' }}" class="w-full text-xs px-3 py-2 bg-white border border-slate-300 rounded-lg">
                        </div>
                        <div>
                            <label class="block text-[11px] font-semibold text-slate-600 mb-1">Review Quote</label>
                            <textarea name="review_1_quote" rows="4" class="w-full text-xs px-3 py-2 bg-white border border-slate-300 rounded-lg leading-relaxed">{{ $siteSettings['review_1_quote'] ?? 'Dealing with S.K. Infratech was remarkably seamless. They guided me through every step of the legal registry. Their zero-brokerage model saved me ₹80,000 while ensuring completely transparent legal possession.' }}</textarea>
                        </div>
                    </div>

                    <!-- Review 2 -->
                    <div class="p-5 bg-slate-50 rounded-2xl border border-slate-200 space-y-3">
                        <div class="font-bold text-xs text-amber-800 uppercase tracking-wider">Testimonial 2 (Featured)</div>
                        <div>
                            <label class="block text-[11px] font-semibold text-slate-600 mb-1">Client Name</label>
                            <input type="text" name="review_2_name" value="{{ $siteSettings['review_2_name'] ?? 'VIKAS PANWAR' }}" class="w-full text-xs px-3 py-2 bg-white border border-slate-300 rounded-lg font-bold">
                        </div>
                        <div>
                            <label class="block text-[11px] font-semibold text-slate-600 mb-1">Role & City</label>
                            <input type="text" name="review_2_role" value="{{ $siteSettings['review_2_role'] ?? 'SELLER, MEERUT' }}" class="w-full text-xs px-3 py-2 bg-white border border-slate-300 rounded-lg">
                        </div>
                        <div>
                            <label class="block text-[11px] font-semibold text-slate-600 mb-1">Highlight Badge Tag</label>
                            <input type="text" name="review_2_tag" value="{{ $siteSettings['review_2_tag'] ?? 'Verified Quick Sale' }}" class="w-full text-xs px-3 py-2 bg-white border border-slate-300 rounded-lg">
                        </div>
                        <div>
                            <label class="block text-[11px] font-semibold text-slate-600 mb-1">Review Quote</label>
                            <textarea name="review_2_quote" rows="4" class="w-full text-xs px-3 py-2 bg-white border border-slate-300 rounded-lg leading-relaxed">{{ $siteSettings['review_2_quote'] ?? 'I needed urgent liquidity for my business and wanted to sell my plot. Their site team visited within 2 hours and handed over the token advance the next morning. Fair valuation and absolute integrity!' }}</textarea>
                        </div>
                    </div>

                    <!-- Review 3 -->
                    <div class="p-5 bg-slate-50 rounded-2xl border border-slate-200 space-y-3">
                        <div class="font-bold text-xs text-slate-800 uppercase tracking-wider">Testimonial 3</div>
                        <div>
                            <label class="block text-[11px] font-semibold text-slate-600 mb-1">Client Name</label>
                            <input type="text" name="review_3_name" value="{{ $siteSettings['review_3_name'] ?? 'RITU JHA' }}" class="w-full text-xs px-3 py-2 bg-white border border-slate-300 rounded-lg font-bold">
                        </div>
                        <div>
                            <label class="block text-[11px] font-semibold text-slate-600 mb-1">Role & City</label>
                            <input type="text" name="review_3_role" value="{{ $siteSettings['review_3_role'] ?? 'INVESTOR, DELHI' }}" class="w-full text-xs px-3 py-2 bg-white border border-slate-300 rounded-lg">
                        </div>
                        <div>
                            <label class="block text-[11px] font-semibold text-slate-600 mb-1">Highlight Badge Tag</label>
                            <input type="text" name="review_3_tag" value="{{ $siteSettings['review_3_tag'] ?? 'Legal Peace of Mind' }}" class="w-full text-xs px-3 py-2 bg-white border border-slate-300 rounded-lg">
                        </div>
                        <div>
                            <label class="block text-[11px] font-semibold text-slate-600 mb-1">Review Quote</label>
                            <textarea name="review_3_quote" rows="4" class="w-full text-xs px-3 py-2 bg-white border border-slate-300 rounded-lg leading-relaxed">{{ $siteSettings['review_3_quote'] ?? 'Title documentation was my biggest concern when investing in property. But their legal department thoroughly verified 30 years of chain title deeds and revenue records. Pure legal peace of mind.' }}</textarea>
                        </div>
                    </div>

                </div>
            </div>

            <!-- TAB 7: FREQUENTLY ASKED QUESTIONS (FAQS) -->
            <div id="tab-faqs" class="tab-panel hidden bg-white border border-slate-200/80 rounded-3xl p-6 sm:p-8 shadow-xs space-y-6">
                <div class="border-b border-slate-100 pb-3">
                    <h4 class="text-lg font-black text-slate-900">Frequently Asked Questions (FAQs)</h4>
                    <p class="text-xs text-slate-500">Edit the animated accordion questions and answers displayed on the homepage.</p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Section Tagline / Subtitle</label>
                        <input type="text" name="faq_subtitle" value="{{ $siteSettings['faq_subtitle'] ?? 'FREQUENTLY ASKED QUESTIONS' }}" class="w-full text-xs px-3.5 py-2.5 bg-slate-50 border border-slate-300 rounded-xl">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Section Main Heading</label>
                        <input type="text" name="faq_title" value="{{ $siteSettings['faq_title'] ?? 'CLARITY & LEGAL PEACE OF MIND' }}" class="w-full text-xs px-3.5 py-2.5 bg-slate-50 border border-slate-300 rounded-xl">
                    </div>
                </div>

                <div class="space-y-4">
                    
                    <!-- FAQ 1 -->
                    <div class="p-4 bg-slate-50 rounded-2xl border border-slate-200 space-y-2">
                        <label class="block text-xs font-bold text-emerald-800">FAQ #1 Question</label>
                        <input type="text" name="faq_1_q" value="{{ $siteSettings['faq_1_q'] ?? 'ARE THE PROPERTY TITLES AND DOCUMENTS 100% GUARANTEED?' }}" class="w-full text-xs px-3.5 py-2 bg-white border border-slate-300 rounded-xl font-bold">
                        <label class="block text-[11px] font-semibold text-slate-600 pt-1">FAQ #1 Answer</label>
                        <textarea name="faq_1_a" rows="3" class="w-full text-xs px-3.5 py-2 bg-white border border-slate-300 rounded-xl">{{ $siteSettings['faq_1_a'] ?? 'Every property in our verified inventory is directly acquired and legally vetted by our senior counsel. We conduct exhaustive 30-year chain title searches, revenue mutation checks, and encumbrance inspections before offering any listing. You are always welcome to request document copies for independent verification with your own lawyer.' }}</textarea>
                    </div>

                    <!-- FAQ 2 -->
                    <div class="p-4 bg-slate-50 rounded-2xl border border-slate-200 space-y-2">
                        <label class="block text-xs font-bold text-emerald-800">FAQ #2 Question</label>
                        <input type="text" name="faq_2_q" value="{{ $siteSettings['faq_2_q'] ?? 'WHAT IF AN ISSUE ARISES DURING THE REGISTRY PROCESS?' }}" class="w-full text-xs px-3.5 py-2 bg-white border border-slate-300 rounded-xl font-bold">
                        <label class="block text-[11px] font-semibold text-slate-600 pt-1">FAQ #2 Answer</label>
                        <textarea name="faq_2_a" rows="3" class="w-full text-xs px-3.5 py-2 bg-white border border-slate-300 rounded-xl">{{ $siteSettings['faq_2_a'] ?? 'Our in-house legal team assists you in person at the Sub-Registrar and Tehsil office from Day 1 through final physical possession. In the rare event of any unresolvable title defect or dispute, we provide a 100% token refund guarantee in writing.' }}</textarea>
                    </div>

                    <!-- FAQ 3 -->
                    <div class="p-4 bg-slate-50 rounded-2xl border border-slate-200 space-y-2">
                        <label class="block text-xs font-bold text-emerald-800">FAQ #3 Question</label>
                        <input type="text" name="faq_3_q" value="{{ $siteSettings['faq_3_q'] ?? 'CAN THE PROPERTY PRICE BE NEGOTIATED?' }}" class="w-full text-xs px-3.5 py-2 bg-white border border-slate-300 rounded-xl font-bold">
                        <label class="block text-[11px] font-semibold text-slate-600 pt-1">FAQ #3 Answer</label>
                        <textarea name="faq_3_a" rows="3" class="w-full text-xs px-3.5 py-2 bg-white border border-slate-300 rounded-xl">{{ $siteSettings['faq_3_a'] ?? 'All our pricing is direct-from-owner with zero third-party middleman and zero brokerage commission. While our quoted prices are highly competitive, our sales directors offer reasonable flexibility on payment milestones and token terms during in-person discussions.' }}</textarea>
                    </div>

                    <!-- FAQ 4 -->
                    <div class="p-4 bg-slate-50 rounded-2xl border border-slate-200 space-y-2">
                        <label class="block text-xs font-bold text-emerald-800">FAQ #4 Question</label>
                        <input type="text" name="faq_4_q" value="{{ $siteSettings['faq_4_q'] ?? 'WHAT PAYMENT MODES AND SCHEDULES ARE ACCEPTED?' }}" class="w-full text-xs px-3.5 py-2 bg-white border border-slate-300 rounded-xl font-bold">
                        <label class="block text-[11px] font-semibold text-slate-600 pt-1">FAQ #4 Answer</label>
                        <textarea name="faq_4_a" rows="3" class="w-full text-xs px-3.5 py-2 bg-white border border-slate-300 rounded-xl">{{ $siteSettings['faq_4_a'] ?? 'We accept payments through Cheque, RTGS, NEFT, Net Banking, and pre-approved Bank Home Loans. All transactions are officially recorded with government stamp duty receipts for absolute financial compliance and security.' }}</textarea>
                    </div>

                    <!-- FAQ 5 -->
                    <div class="p-4 bg-slate-50 rounded-2xl border border-slate-200 space-y-2">
                        <label class="block text-xs font-bold text-emerald-800">FAQ #5 Question</label>
                        <input type="text" name="faq_5_q" value="{{ $siteSettings['faq_5_q'] ?? 'HOW CAN I INDEPENDENTLY VERIFY THE REGISTRY STATUS?' }}" class="w-full text-xs px-3.5 py-2 bg-white border border-slate-300 rounded-xl font-bold">
                        <label class="block text-[11px] font-semibold text-slate-600 pt-1">FAQ #5 Answer</label>
                        <textarea name="faq_5_a" rows="3" class="w-full text-xs px-3.5 py-2 bg-white border border-slate-300 rounded-xl">{{ $siteSettings['faq_5_a'] ?? 'We provide certified hard copies of the Khasra number, Revenue Khatauni, Encumbrance Certificate (EC), and Tehsil records directly retrieved from the official government land registry portal for your independent legal vetting.' }}</textarea>
                    </div>

                    <!-- FAQ 6 -->
                    <div class="p-4 bg-slate-50 rounded-2xl border border-slate-200 space-y-2">
                        <label class="block text-xs font-bold text-emerald-800">FAQ #6 Question</label>
                        <input type="text" name="faq_6_q" value="{{ $siteSettings['faq_6_q'] ?? 'DO YOU ACQUIRE RESIDENTIAL AND AGRICULTURAL LAND IN DELHI NCR & WEST UP?' }}" class="w-full text-xs px-3.5 py-2 bg-white border border-slate-300 rounded-xl font-bold">
                        <label class="block text-[11px] font-semibold text-slate-600 pt-1">FAQ #6 Answer</label>
                        <textarea name="faq_6_a" rows="3" class="w-full text-xs px-3.5 py-2 bg-white border border-slate-300 rounded-xl">{{ $siteSettings['faq_6_a'] ?? 'Yes. If your land parcel holds a clean freehold title, direct road access, and clear revenue demarcations, our acquisition team conducts an on-site inspection within 24 to 48 hours to propose a fair market valuation and token advance.' }}</textarea>
                    </div>

                </div>
            </div>

            <!-- TAB 8: SOCIAL MEDIA & LINKS -->
            <div id="tab-social" class="tab-panel hidden bg-white border border-slate-200/80 rounded-3xl p-6 sm:p-8 shadow-xs space-y-5">
                <div class="border-b border-slate-100 pb-3">
                    <h4 class="text-lg font-black text-slate-900">Social Media Channels & External Links</h4>
                    <p class="text-xs text-slate-500">Official social profiles linked in the topbar and footer icons.</p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1.5">Facebook Page URL</label>
                        <input type="url" name="social_facebook" value="{{ $siteSettings['social_facebook'] ?? 'https://facebook.com' }}" class="w-full text-xs sm:text-sm px-3.5 py-2.5 bg-slate-50 border border-slate-300 rounded-xl focus:bg-white focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1.5">Instagram Profile URL</label>
                        <input type="url" name="social_instagram" value="{{ $siteSettings['social_instagram'] ?? 'https://instagram.com' }}" class="w-full text-xs sm:text-sm px-3.5 py-2.5 bg-slate-50 border border-slate-300 rounded-xl focus:bg-white focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1.5">LinkedIn Page URL</label>
                        <input type="url" name="social_linkedin" value="{{ $siteSettings['social_linkedin'] ?? 'https://linkedin.com' }}" class="w-full text-xs sm:text-sm px-3.5 py-2.5 bg-slate-50 border border-slate-300 rounded-xl focus:bg-white focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1.5">Twitter / X URL</label>
                        <input type="url" name="social_twitter" value="{{ $siteSettings['social_twitter'] ?? 'https://twitter.com' }}" class="w-full text-xs sm:text-sm px-3.5 py-2.5 bg-slate-50 border border-slate-300 rounded-xl focus:bg-white focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                    </div>

                    <div class="sm:col-span-2">
                        <label class="block text-xs font-bold text-slate-700 mb-1.5">YouTube Channel URL</label>
                        <input type="url" name="social_youtube" value="{{ $siteSettings['social_youtube'] ?? 'https://youtube.com' }}" class="w-full text-xs sm:text-sm px-3.5 py-2.5 bg-slate-50 border border-slate-300 rounded-xl focus:bg-white focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                    </div>
                </div>
            </div>

            <!-- Bottom Master Save Button -->
            <div class="pt-4 sticky bottom-4 z-20">
                <div class="bg-white/95 backdrop-blur-md p-3 rounded-2xl border border-slate-200 shadow-xl flex items-center justify-between gap-4">
                    <div class="text-xs text-slate-500 pl-3 hidden sm:block">
                        Ready to apply changes? They will take effect across the entire public website instantly.
                    </div>
                    <button type="submit" class="w-full sm:w-auto px-8 py-3.5 bg-brand-primary hover:bg-brand-dark text-white font-black rounded-xl text-xs sm:text-sm transition shadow-sm shadow-emerald-600/30 flex items-center justify-center space-x-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        <span>Save All Configurations</span>
                    </button>
                </div>
            </div>

        </form>

    </div>

    <!-- Tab Switching Script -->
    <script>
        function switchTab(tabId) {
            // Hide all panels
            document.querySelectorAll('.tab-panel').forEach(panel => {
                panel.classList.add('hidden');
            });

            // Remove active style from all buttons
            document.querySelectorAll('.tab-btn').forEach(btn => {
                btn.className = 'tab-btn px-4 py-2 rounded-xl text-xs font-bold transition flex items-center space-x-2 text-slate-600 hover:text-slate-900 hover:bg-slate-100';
                const icon = btn.querySelector('svg');
                if (icon) icon.className = 'w-3.5 h-3.5 text-slate-400';
            });

            // Show selected panel
            const activePanel = document.getElementById(tabId);
            if (activePanel) {
                activePanel.classList.remove('hidden');
            }

            // Set active button style
            const activeBtn = document.getElementById('btn-' + tabId);
            if (activeBtn) {
                activeBtn.className = 'tab-btn px-4 py-2 rounded-xl text-xs font-bold transition flex items-center space-x-2 bg-emerald-50 text-emerald-900 border border-emerald-200/80 shadow-2xs';
                const icon = activeBtn.querySelector('svg');
                if (icon) icon.className = 'w-3.5 h-3.5 text-emerald-700';
            }
        }
    </script>

@endsection
