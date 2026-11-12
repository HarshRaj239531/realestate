<!-- Premium Slide-Over Settings Drawer -->
<div id="settingsDrawerOverlay" 
     class="fixed inset-0 z-50 overflow-hidden opacity-0 pointer-events-none transition-opacity duration-300 ease-in-out" 
     aria-labelledby="slide-over-title" 
     role="dialog" 
     aria-modal="true">
    
    <!-- Background Backdrop with Blur -->
    <div class="fixed inset-0 bg-slate-950/40 backdrop-blur-xs transition-opacity" 
         onclick="closeSettingsDrawer()"></div>

    <div class="fixed inset-y-0 right-0 max-w-full flex pl-10 z-50">
        <!-- Slide-over Panel -->
        <div id="settingsDrawerPanel" 
             class="w-screen max-w-2xl bg-white shadow-2xl border-l border-slate-200/90 flex flex-col transform translate-x-full transition-transform duration-300 ease-out">
            
            <!-- Drawer Header -->
            <div class="p-6 border-b border-slate-100 flex items-center justify-between bg-white sticky top-0 z-20">
                <div class="flex items-center space-x-3.5">
                    <div class="w-10 h-10 rounded-2xl bg-purple-50 text-purple-700 flex items-center justify-center font-bold shrink-0 border border-purple-200/60 shadow-2xs">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"/>
                        </svg>
                    </div>
                    <div>
                        <div class="flex items-center space-x-2">
                            <h3 class="text-base font-black text-slate-900 tracking-tight" id="slide-over-title">Master Settings</h3>
                            <span class="bg-emerald-50 text-emerald-800 text-[9px] font-extrabold uppercase px-2 py-0.5 rounded-full border border-emerald-200">
                                Live Sync
                            </span>
                        </div>
                        <p class="text-xs text-slate-500 mt-0.5">Control branding, color palette, leadership, reviews & FAQs</p>
                    </div>
                </div>

                <div class="flex items-center space-x-2">
                    <kbd class="hidden sm:inline-block text-[10px] font-bold text-slate-400 bg-slate-100 px-2 py-1 rounded-md border border-slate-200">ESC</kbd>
                    <button type="button" 
                            onclick="closeSettingsDrawer()" 
                            class="p-2 text-slate-400 hover:text-slate-700 hover:bg-slate-100 rounded-xl transition" 
                            title="Close Settings (Esc)">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Drawer Horizontal Category Pills -->
            <div class="px-6 py-2.5 bg-slate-50/80 border-b border-slate-100 overflow-x-auto flex items-center space-x-1.5 scrollbar-none sticky top-[89px] z-10 shrink-0">
                <button type="button" onclick="switchDrawerTab('d-tab-theme')" id="btn-d-tab-theme" class="drawer-tab-btn px-3 py-1.5 rounded-xl text-xs font-bold transition flex items-center space-x-1.5 bg-white text-emerald-900 border border-emerald-200 shadow-2xs shrink-0">
                    <span>🎨 Colors</span>
                </button>
                <button type="button" onclick="switchDrawerTab('d-tab-general')" id="btn-d-tab-general" class="drawer-tab-btn px-3 py-1.5 rounded-xl text-xs font-bold transition flex items-center space-x-1.5 text-slate-600 hover:text-slate-900 hover:bg-white shrink-0">
                    <span>🏢 Brand</span>
                </button>
                <button type="button" onclick="switchDrawerTab('d-tab-contact')" id="btn-d-tab-contact" class="drawer-tab-btn px-3 py-1.5 rounded-xl text-xs font-bold transition flex items-center space-x-1.5 text-slate-600 hover:text-slate-900 hover:bg-white shrink-0">
                    <span>📞 Contact</span>
                </button>
                <button type="button" onclick="switchDrawerTab('d-tab-hero')" id="btn-d-tab-hero" class="drawer-tab-btn px-3 py-1.5 rounded-xl text-xs font-bold transition flex items-center space-x-1.5 text-slate-600 hover:text-slate-900 hover:bg-white shrink-0">
                    <span>🏠 Hero & Stats</span>
                </button>
                <button type="button" onclick="switchDrawerTab('d-tab-team')" id="btn-d-tab-team" class="drawer-tab-btn px-3 py-1.5 rounded-xl text-xs font-bold transition flex items-center space-x-1.5 text-slate-600 hover:text-slate-900 hover:bg-white shrink-0">
                    <span>👥 Team</span>
                </button>
                <button type="button" onclick="switchDrawerTab('d-tab-testimonials')" id="btn-d-tab-testimonials" class="drawer-tab-btn px-3 py-1.5 rounded-xl text-xs font-bold transition flex items-center space-x-1.5 text-slate-600 hover:text-slate-900 hover:bg-white shrink-0">
                    <span>💬 Reviews</span>
                </button>
                <button type="button" onclick="switchDrawerTab('d-tab-faqs')" id="btn-d-tab-faqs" class="drawer-tab-btn px-3 py-1.5 rounded-xl text-xs font-bold transition flex items-center space-x-1.5 text-slate-600 hover:text-slate-900 hover:bg-white shrink-0">
                    <span>❓ FAQs</span>
                </button>
                <button type="button" onclick="switchDrawerTab('d-tab-social')" id="btn-d-tab-social" class="drawer-tab-btn px-3 py-1.5 rounded-xl text-xs font-bold transition flex items-center space-x-1.5 text-slate-600 hover:text-slate-900 hover:bg-white shrink-0">
                    <span>🌐 Social</span>
                </button>
            </div>

            <!-- Drawer Scrollable Form Body -->
            <form id="drawerSettingsForm" 
                  method="POST" 
                  action="{{ route('admin.settings.update') }}" 
                  onsubmit="handleDrawerSettingsSubmit(event)" 
                  class="flex-grow overflow-y-auto p-6 sm:p-7 space-y-6">
                @csrf

                <!-- Notification Alert inside Drawer -->
                <div id="drawerSuccessAlert" class="hidden bg-emerald-50 border border-emerald-200 text-emerald-800 text-xs p-3.5 rounded-2xl flex items-center justify-between shadow-2xs">
                    <span class="flex items-center space-x-2">
                        <span class="font-bold text-emerald-600">✓</span>
                        <span id="drawerSuccessMessage">Settings saved in real-time!</span>
                    </span>
                    <button type="button" onclick="this.parentElement.classList.add('hidden')" class="text-emerald-500 hover:text-emerald-900">&times;</button>
                </div>

                <!-- TAB 1: THEME & BRAND COLORS -->
                <div id="d-tab-theme" class="drawer-panel space-y-5">
                    <div class="border-b border-slate-100 pb-3">
                        <h4 class="text-sm font-black text-slate-900 uppercase tracking-wider">Dynamic Color Palette</h4>
                        <p class="text-xs text-slate-500 mt-0.5">Colors propagate instantly to navigation, buttons, badges, and accents.</p>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <!-- Primary Color -->
                        <div class="p-4 bg-slate-50/70 rounded-2xl border border-slate-200 space-y-2">
                            <label class="block text-xs font-bold text-slate-700">Primary Brand Green</label>
                            <div class="flex items-center space-x-3">
                                <input type="color" name="brand_primary_color" id="drawer_picker_primary" value="{{ $siteSettings['brand_primary_color'] ?? '#2f9049' }}" class="w-10 h-10 rounded-xl cursor-pointer bg-white border border-slate-300 p-0.5 shadow-2xs" onchange="document.getElementById('drawer_text_primary').value = this.value">
                                <input type="text" name="brand_primary_color" id="drawer_text_primary" value="{{ $siteSettings['brand_primary_color'] ?? '#2f9049' }}" class="text-xs px-2.5 py-1.5 bg-white border border-slate-300 rounded-lg text-slate-800 font-mono w-28" onkeyup="document.getElementById('drawer_picker_primary').value = this.value">
                            </div>
                        </div>

                        <!-- Dark Hover -->
                        <div class="p-4 bg-slate-50/70 rounded-2xl border border-slate-200 space-y-2">
                            <label class="block text-xs font-bold text-slate-700">Dark Shade (Hover States)</label>
                            <div class="flex items-center space-x-3">
                                <input type="color" name="brand_primary_dark" id="drawer_picker_dark" value="{{ $siteSettings['brand_primary_dark'] ?? '#236c37' }}" class="w-10 h-10 rounded-xl cursor-pointer bg-white border border-slate-300 p-0.5 shadow-2xs" onchange="document.getElementById('drawer_text_dark').value = this.value">
                                <input type="text" name="brand_primary_dark" id="drawer_text_dark" value="{{ $siteSettings['brand_primary_dark'] ?? '#236c37' }}" class="text-xs px-2.5 py-1.5 bg-white border border-slate-300 rounded-lg text-slate-800 font-mono w-28" onkeyup="document.getElementById('drawer_picker_dark').value = this.value">
                            </div>
                        </div>

                        <!-- Topbar Color -->
                        <div class="p-4 bg-slate-50/70 rounded-2xl border border-slate-200 space-y-2">
                            <label class="block text-xs font-bold text-slate-700">Topbar & Footer Dark</label>
                            <div class="flex items-center space-x-3">
                                <input type="color" name="brand_topbar_color" id="drawer_picker_topbar" value="{{ $siteSettings['brand_topbar_color'] ?? '#18202d' }}" class="w-10 h-10 rounded-xl cursor-pointer bg-white border border-slate-300 p-0.5 shadow-2xs" onchange="document.getElementById('drawer_text_topbar').value = this.value">
                                <input type="text" name="brand_topbar_color" id="drawer_text_topbar" value="{{ $siteSettings['brand_topbar_color'] ?? '#18202d' }}" class="text-xs px-2.5 py-1.5 bg-white border border-slate-300 rounded-lg text-slate-800 font-mono w-28" onkeyup="document.getElementById('drawer_picker_topbar').value = this.value">
                            </div>
                        </div>

                        <!-- Accent Color -->
                        <div class="p-4 bg-slate-50/70 rounded-2xl border border-slate-200 space-y-2">
                            <label class="block text-xs font-bold text-slate-700">Accent Gold / Amber</label>
                            <div class="flex items-center space-x-3">
                                <input type="color" name="brand_accent_color" id="drawer_picker_accent" value="{{ $siteSettings['brand_accent_color'] ?? '#d97706' }}" class="w-10 h-10 rounded-xl cursor-pointer bg-white border border-slate-300 p-0.5 shadow-2xs" onchange="document.getElementById('drawer_text_accent').value = this.value">
                                <input type="text" name="brand_accent_color" id="drawer_text_accent" value="{{ $siteSettings['brand_accent_color'] ?? '#d97706' }}" class="text-xs px-2.5 py-1.5 bg-white border border-slate-300 rounded-lg text-slate-800 font-mono w-28" onkeyup="document.getElementById('drawer_picker_accent').value = this.value">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- TAB 2: GENERAL & BRAND IDENTITY -->
                <div id="d-tab-general" class="drawer-panel hidden space-y-4">
                    <div class="border-b border-slate-100 pb-3">
                        <h4 class="text-sm font-black text-slate-900 uppercase tracking-wider">Brand Identity</h4>
                        <p class="text-xs text-slate-500">Core company name, currency, and footer summary.</p>
                    </div>

                    <div class="space-y-4">
                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">Official Brand Name</label>
                            <input type="text" name="brand_name" value="{{ $siteSettings['brand_name'] ?? 'RealEstate' }}" class="w-full text-xs sm:text-sm px-3.5 py-2.5 bg-slate-50 border border-slate-300 rounded-xl focus:bg-white focus:outline-none focus:ring-1 focus:ring-emerald-500">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">Tagline</label>
                            <input type="text" name="brand_tagline" value="{{ $siteSettings['brand_tagline'] ?? 'Find Eco-Friendly Homes Easily' }}" class="w-full text-xs sm:text-sm px-3.5 py-2.5 bg-slate-50 border border-slate-300 rounded-xl focus:bg-white focus:outline-none">
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-bold text-slate-700 mb-1">Currency Symbol</label>
                                <input type="text" name="currency_symbol" value="{{ $siteSettings['currency_symbol'] ?? '₹' }}" class="w-full text-xs px-3.5 py-2.5 bg-slate-50 border border-slate-300 rounded-xl">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-700 mb-1">Copyright Note</label>
                                <input type="text" name="copyright_text" value="{{ $siteSettings['copyright_text'] ?? '© ' . date('Y') . ' RealEstate Infratech Ltd.' }}" class="w-full text-xs px-3.5 py-2.5 bg-slate-50 border border-slate-300 rounded-xl">
                            </div>
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">Footer About Text</label>
                            <textarea name="site_footer_about" rows="3" class="w-full text-xs px-3.5 py-2.5 bg-slate-50 border border-slate-300 rounded-xl">{{ $siteSettings['site_footer_about'] ?? 'Pioneering sustainable and biophilic luxury living spaces with 100% verified legal chain documentation and zero brokerage.' }}</textarea>
                        </div>
                    </div>
                </div>

                <!-- TAB 3: CONTACT & OFFICES -->
                <div id="d-tab-contact" class="drawer-panel hidden space-y-4">
                    <div class="border-b border-slate-100 pb-3">
                        <h4 class="text-sm font-black text-slate-900 uppercase tracking-wider">Contact & Office Locations</h4>
                        <p class="text-xs text-slate-500">Official sales contact lines and physical head office address.</p>
                    </div>

                    <div class="space-y-4">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-bold text-slate-700 mb-1">Primary Sales Phone</label>
                                <input type="text" name="contact_phone" value="{{ $siteSettings['contact_phone'] ?? '+91 98765 43210' }}" class="w-full text-xs px-3.5 py-2.5 bg-slate-50 border border-slate-300 rounded-xl">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-700 mb-1">Support Email</label>
                                <input type="email" name="contact_email" value="{{ $siteSettings['contact_email'] ?? 'info@realestate.com' }}" class="w-full text-xs px-3.5 py-2.5 bg-slate-50 border border-slate-300 rounded-xl">
                            </div>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-bold text-slate-700 mb-1">WhatsApp Number (e.g. 919876543210)</label>
                                <input type="text" name="contact_whatsapp" value="{{ $siteSettings['contact_whatsapp'] ?? '919876543210' }}" class="w-full text-xs px-3.5 py-2.5 bg-slate-50 border border-slate-300 rounded-xl">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-700 mb-1">Visiting Hours</label>
                                <input type="text" name="contact_hours" value="{{ $siteSettings['contact_hours'] ?? 'Mon - Sat: 9:30 AM - 7:00 PM' }}" class="w-full text-xs px-3.5 py-2.5 bg-slate-50 border border-slate-300 rounded-xl">
                            </div>
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">Head Office Address</label>
                            <textarea name="contact_address" rows="2" class="w-full text-xs px-3.5 py-2.5 bg-slate-50 border border-slate-300 rounded-xl">{{ $siteSettings['contact_address'] ?? 'Skyline Tower, 4th Floor, Golf Course Extension Road, Gurugram, Haryana 122002' }}</textarea>
                        </div>
                    </div>
                </div>

                <!-- TAB 4: HERO & STATS -->
                <div id="d-tab-hero" class="drawer-panel hidden space-y-4">
                    <div class="border-b border-slate-100 pb-3">
                        <h4 class="text-sm font-black text-slate-900 uppercase tracking-wider">Homepage Hero & Key Counters</h4>
                        <p class="text-xs text-slate-500">Live banner text and counter metrics on homepage.</p>
                    </div>

                    <div class="space-y-4">
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-bold text-slate-700 mb-1">Hero Floating Badge</label>
                                <input type="text" name="hero_pill_badge" value="{{ $siteSettings['hero_pill_badge'] ?? '🏠 RealEstate' }}" class="w-full text-xs px-3.5 py-2.5 bg-slate-50 border border-slate-300 rounded-xl">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-700 mb-1">Hero CTA Button</label>
                                <input type="text" name="hero_cta_text" value="{{ $siteSettings['hero_cta_text'] ?? 'Explore Now' }}" class="w-full text-xs px-3.5 py-2.5 bg-slate-50 border border-slate-300 rounded-xl">
                            </div>
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">Hero Main Title</label>
                            <input type="text" name="hero_title" value="{{ $siteSettings['hero_title'] ?? 'Find Eco-Friendly Homes Easily' }}" class="w-full text-xs px-3.5 py-2.5 bg-slate-50 border border-slate-300 rounded-xl font-bold">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">Hero Subtitle</label>
                            <textarea name="hero_subtitle" rows="2" class="w-full text-xs px-3.5 py-2.5 bg-slate-50 border border-slate-300 rounded-xl">{{ $siteSettings['hero_subtitle'] ?? 'Featured one stop destination for all your real estate needs.' }}</textarea>
                        </div>

                        <div class="grid grid-cols-2 gap-4 pt-2">
                            <div class="p-3 bg-slate-50 rounded-xl border border-slate-200">
                                <label class="block text-[10px] font-bold text-slate-600 mb-1">Experience Stat</label>
                                <input type="text" name="stat_experience" value="{{ $siteSettings['stat_experience'] ?? '15+' }}" class="w-full text-xs px-2.5 py-1.5 bg-white border border-slate-300 rounded-lg font-bold text-emerald-700 mb-1">
                                <input type="text" name="stat_experience_label" value="{{ $siteSettings['stat_experience_label'] ?? 'Years Experience' }}" class="w-full text-[11px] px-2.5 py-1 bg-white border border-slate-300 rounded-lg">
                            </div>
                            <div class="p-3 bg-slate-50 rounded-xl border border-slate-200">
                                <label class="block text-[10px] font-bold text-slate-600 mb-1">Projects Stat</label>
                                <input type="text" name="stat_projects" value="{{ $siteSettings['stat_projects'] ?? '50+' }}" class="w-full text-xs px-2.5 py-1.5 bg-white border border-slate-300 rounded-lg font-bold text-emerald-700 mb-1">
                                <input type="text" name="stat_projects_label" value="{{ $siteSettings['stat_projects_label'] ?? 'Premium Projects' }}" class="w-full text-[11px] px-2.5 py-1 bg-white border border-slate-300 rounded-lg">
                            </div>
                            <div class="p-3 bg-slate-50 rounded-xl border border-slate-200">
                                <label class="block text-[10px] font-bold text-slate-600 mb-1">Families Stat</label>
                                <input type="text" name="stat_families" value="{{ $siteSettings['stat_families'] ?? '10K+' }}" class="w-full text-xs px-2.5 py-1.5 bg-white border border-slate-300 rounded-lg font-bold text-emerald-700 mb-1">
                                <input type="text" name="stat_families_label" value="{{ $siteSettings['stat_families_label'] ?? 'Happy Families' }}" class="w-full text-[11px] px-2.5 py-1 bg-white border border-slate-300 rounded-lg">
                            </div>
                            <div class="p-3 bg-slate-50 rounded-xl border border-slate-200">
                                <label class="block text-[10px] font-bold text-slate-600 mb-1">Acres Stat</label>
                                <input type="text" name="stat_acres" value="{{ $siteSettings['stat_acres'] ?? '250+' }}" class="w-full text-xs px-2.5 py-1.5 bg-white border border-slate-300 rounded-lg font-bold text-emerald-700 mb-1">
                                <input type="text" name="stat_acres_label" value="{{ $siteSettings['stat_acres_label'] ?? 'Acres Developed' }}" class="w-full text-[11px] px-2.5 py-1 bg-white border border-slate-300 rounded-lg">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- TAB 5: LEADERSHIP TEAM -->
                <div id="d-tab-team" class="drawer-panel hidden space-y-4">
                    <div class="border-b border-slate-100 pb-3">
                        <h4 class="text-sm font-black text-slate-900 uppercase tracking-wider">Leadership Team ("The Minds of Trust")</h4>
                        <p class="text-xs text-slate-500">Customize executive portraits and roles on homepage.</p>
                    </div>

                    <div class="grid grid-cols-2 gap-3">
                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">Section Subtitle</label>
                            <input type="text" name="team_subtitle" value="{{ $siteSettings['team_subtitle'] ?? 'EXPERTS BEHIND S.K.' }}" class="w-full text-xs px-3 py-2 bg-slate-50 border border-slate-300 rounded-xl">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">Section Title</label>
                            <input type="text" name="team_title" value="{{ $siteSettings['team_title'] ?? 'THE MINDS OF TRUST' }}" class="w-full text-xs px-3 py-2 bg-slate-50 border border-slate-300 rounded-xl">
                        </div>
                    </div>

                    <div class="space-y-3">
                        <!-- Member 1 -->
                        <div class="p-3 bg-slate-50 rounded-xl border border-slate-200 grid grid-cols-1 sm:grid-cols-3 gap-2 text-xs">
                            <input type="text" name="team_member_1_name" value="{{ $siteSettings['team_member_1_name'] ?? 'SANDEEP TYAGI' }}" placeholder="Name" class="px-2.5 py-1.5 bg-white border border-slate-300 rounded-lg font-bold">
                            <input type="text" name="team_member_1_role" value="{{ $siteSettings['team_member_1_role'] ?? 'FOUNDER & CEO' }}" placeholder="Role" class="px-2.5 py-1.5 bg-white border border-slate-300 rounded-lg">
                            <input type="text" name="team_member_1_image" value="{{ $siteSettings['team_member_1_image'] ?? 'https://images.unsplash.com/photo-1560250097-0b93528c311a?auto=format&fit=crop&w=800&q=85' }}" placeholder="Photo URL" class="px-2.5 py-1.5 bg-white border border-slate-300 rounded-lg text-[11px]">
                        </div>
                        <!-- Member 2 -->
                        <div class="p-3 bg-slate-50 rounded-xl border border-slate-200 grid grid-cols-1 sm:grid-cols-3 gap-2 text-xs">
                            <input type="text" name="team_member_2_name" value="{{ $siteSettings['team_member_2_name'] ?? 'RAJEEV TYAGI' }}" placeholder="Name" class="px-2.5 py-1.5 bg-white border border-slate-300 rounded-lg font-bold">
                            <input type="text" name="team_member_2_role" value="{{ $siteSettings['team_member_2_role'] ?? 'ACQUISITION MANAGER' }}" placeholder="Role" class="px-2.5 py-1.5 bg-white border border-slate-300 rounded-lg">
                            <input type="text" name="team_member_2_image" value="{{ $siteSettings['team_member_2_image'] ?? 'https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?auto=format&fit=crop&w=800&q=85' }}" placeholder="Photo URL" class="px-2.5 py-1.5 bg-white border border-slate-300 rounded-lg text-[11px]">
                        </div>
                        <!-- Member 3 -->
                        <div class="p-3 bg-slate-50 rounded-xl border border-slate-200 grid grid-cols-1 sm:grid-cols-3 gap-2 text-xs">
                            <input type="text" name="team_member_3_name" value="{{ $siteSettings['team_member_3_name'] ?? 'PAWAN TYAGI' }}" placeholder="Name" class="px-2.5 py-1.5 bg-white border border-slate-300 rounded-lg font-bold">
                            <input type="text" name="team_member_3_role" value="{{ $siteSettings['team_member_3_role'] ?? 'SALES & ROI SPECIALIST' }}" placeholder="Role" class="px-2.5 py-1.5 bg-white border border-slate-300 rounded-lg">
                            <input type="text" name="team_member_3_image" value="{{ $siteSettings['team_member_3_image'] ?? 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=800&q=85' }}" placeholder="Photo URL" class="px-2.5 py-1.5 bg-white border border-slate-300 rounded-lg text-[11px]">
                        </div>
                        <!-- Member 4 -->
                        <div class="p-3 bg-slate-50 rounded-xl border border-slate-200 grid grid-cols-1 sm:grid-cols-3 gap-2 text-xs">
                            <input type="text" name="team_member_4_name" value="{{ $siteSettings['team_member_4_name'] ?? 'NEHA GUPTA' }}" placeholder="Name" class="px-2.5 py-1.5 bg-white border border-slate-300 rounded-lg font-bold">
                            <input type="text" name="team_member_4_role" value="{{ $siteSettings['team_member_4_role'] ?? 'CUSTOMER SUCCESS' }}" placeholder="Role" class="px-2.5 py-1.5 bg-white border border-slate-300 rounded-lg">
                            <input type="text" name="team_member_4_image" value="{{ $siteSettings['team_member_4_image'] ?? 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&w=800&q=85' }}" placeholder="Photo URL" class="px-2.5 py-1.5 bg-white border border-slate-300 rounded-lg text-[11px]">
                        </div>
                    </div>
                </div>

                <!-- TAB 6: TESTIMONIALS -->
                <div id="d-tab-testimonials" class="drawer-panel hidden space-y-4">
                    <div class="border-b border-slate-100 pb-3">
                        <h4 class="text-sm font-black text-slate-900 uppercase tracking-wider">Client Reviews ("Trusted by Thousands")</h4>
                        <p class="text-xs text-slate-500">Edit client ratings and quotes on homepage.</p>
                    </div>

                    <div class="space-y-4">
                        <!-- Review 1 -->
                        <div class="p-4 bg-slate-50 rounded-xl border border-slate-200 space-y-2 text-xs">
                            <div class="font-bold text-emerald-800">Review 1</div>
                            <div class="grid grid-cols-3 gap-2">
                                <input type="text" name="review_1_name" value="{{ $siteSettings['review_1_name'] ?? 'AMIT KHANNA' }}" placeholder="Client Name" class="px-2.5 py-1.5 bg-white border border-slate-300 rounded-lg font-bold">
                                <input type="text" name="review_1_role" value="{{ $siteSettings['review_1_role'] ?? 'BUYER, RAJ NAGAR EXT.' }}" placeholder="City/Role" class="px-2.5 py-1.5 bg-white border border-slate-300 rounded-lg">
                                <input type="text" name="review_1_tag" value="{{ $siteSettings['review_1_tag'] ?? 'Zero Brokerage Deal' }}" placeholder="Tag Badge" class="px-2.5 py-1.5 bg-white border border-slate-300 rounded-lg">
                            </div>
                            <textarea name="review_1_quote" rows="2" class="w-full text-xs px-2.5 py-1.5 bg-white border border-slate-300 rounded-lg">{{ $siteSettings['review_1_quote'] ?? 'Dealing with S.K. Infratech was remarkably seamless. They guided me through every step of the legal registry.' }}</textarea>
                        </div>

                        <!-- Review 2 -->
                        <div class="p-4 bg-slate-50 rounded-xl border border-slate-200 space-y-2 text-xs">
                            <div class="font-bold text-amber-800">Review 2 (Featured)</div>
                            <div class="grid grid-cols-3 gap-2">
                                <input type="text" name="review_2_name" value="{{ $siteSettings['review_2_name'] ?? 'VIKAS PANWAR' }}" placeholder="Client Name" class="px-2.5 py-1.5 bg-white border border-slate-300 rounded-lg font-bold">
                                <input type="text" name="review_2_role" value="{{ $siteSettings['review_2_role'] ?? 'SELLER, MEERUT' }}" placeholder="City/Role" class="px-2.5 py-1.5 bg-white border border-slate-300 rounded-lg">
                                <input type="text" name="review_2_tag" value="{{ $siteSettings['review_2_tag'] ?? 'Verified Quick Sale' }}" placeholder="Tag Badge" class="px-2.5 py-1.5 bg-white border border-slate-300 rounded-lg">
                            </div>
                            <textarea name="review_2_quote" rows="2" class="w-full text-xs px-2.5 py-1.5 bg-white border border-slate-300 rounded-lg">{{ $siteSettings['review_2_quote'] ?? 'I needed urgent liquidity for my business and wanted to sell my plot. Their site team visited within 2 hours.' }}</textarea>
                        </div>

                        <!-- Review 3 -->
                        <div class="p-4 bg-slate-50 rounded-xl border border-slate-200 space-y-2 text-xs">
                            <div class="font-bold text-slate-800">Review 3</div>
                            <div class="grid grid-cols-3 gap-2">
                                <input type="text" name="review_3_name" value="{{ $siteSettings['review_3_name'] ?? 'RITU JHA' }}" placeholder="Client Name" class="px-2.5 py-1.5 bg-white border border-slate-300 rounded-lg font-bold">
                                <input type="text" name="review_3_role" value="{{ $siteSettings['review_3_role'] ?? 'INVESTOR, DELHI' }}" placeholder="City/Role" class="px-2.5 py-1.5 bg-white border border-slate-300 rounded-lg">
                                <input type="text" name="review_3_tag" value="{{ $siteSettings['review_3_tag'] ?? 'Legal Peace of Mind' }}" placeholder="Tag Badge" class="px-2.5 py-1.5 bg-white border border-slate-300 rounded-lg">
                            </div>
                            <textarea name="review_3_quote" rows="2" class="w-full text-xs px-2.5 py-1.5 bg-white border border-slate-300 rounded-lg">{{ $siteSettings['review_3_quote'] ?? 'Title documentation was my biggest concern when investing in property. But their legal department thoroughly verified 30 years of chain title deeds.' }}</textarea>
                        </div>
                    </div>
                </div>

                <!-- TAB 7: FAQS -->
                <div id="d-tab-faqs" class="drawer-panel hidden space-y-4">
                    <div class="border-b border-slate-100 pb-3">
                        <h4 class="text-sm font-black text-slate-900 uppercase tracking-wider">Frequently Asked Questions (FAQs)</h4>
                        <p class="text-xs text-slate-500">Edit legal questions and answers displayed in accordion format.</p>
                    </div>

                    <div class="space-y-3">
                        <!-- FAQ 1 -->
                        <div class="p-3.5 bg-slate-50 rounded-xl border border-slate-200 space-y-1.5">
                            <label class="block text-[11px] font-bold text-emerald-800">Question 1</label>
                            <input type="text" name="faq_1_q" value="{{ $siteSettings['faq_1_q'] ?? 'ARE THE PROPERTY TITLES AND DOCUMENTS 100% GUARANTEED?' }}" class="w-full text-xs px-2.5 py-1.5 bg-white border border-slate-300 rounded-lg font-bold">
                            <label class="block text-[10px] text-slate-500">Answer 1</label>
                            <textarea name="faq_1_a" rows="2" class="w-full text-xs px-2.5 py-1.5 bg-white border border-slate-300 rounded-lg">{{ $siteSettings['faq_1_a'] ?? 'Every property in our verified inventory is directly acquired and legally vetted by our senior counsel. We conduct exhaustive 30-year chain title searches.' }}</textarea>
                        </div>
                        <!-- FAQ 2 -->
                        <div class="p-3.5 bg-slate-50 rounded-xl border border-slate-200 space-y-1.5">
                            <label class="block text-[11px] font-bold text-emerald-800">Question 2</label>
                            <input type="text" name="faq_2_q" value="{{ $siteSettings['faq_2_q'] ?? 'WHAT IF AN ISSUE ARISES DURING THE REGISTRY PROCESS?' }}" class="w-full text-xs px-2.5 py-1.5 bg-white border border-slate-300 rounded-lg font-bold">
                            <label class="block text-[10px] text-slate-500">Answer 2</label>
                            <textarea name="faq_2_a" rows="2" class="w-full text-xs px-2.5 py-1.5 bg-white border border-slate-300 rounded-lg">{{ $siteSettings['faq_2_a'] ?? 'Our in-house legal team assists you in person at the Sub-Registrar and Tehsil office from Day 1 through final physical possession.' }}</textarea>
                        </div>
                        <!-- FAQ 3 -->
                        <div class="p-3.5 bg-slate-50 rounded-xl border border-slate-200 space-y-1.5">
                            <label class="block text-[11px] font-bold text-emerald-800">Question 3</label>
                            <input type="text" name="faq_3_q" value="{{ $siteSettings['faq_3_q'] ?? 'CAN THE PROPERTY PRICE BE NEGOTIATED?' }}" class="w-full text-xs px-2.5 py-1.5 bg-white border border-slate-300 rounded-lg font-bold">
                            <label class="block text-[10px] text-slate-500">Answer 3</label>
                            <textarea name="faq_3_a" rows="2" class="w-full text-xs px-2.5 py-1.5 bg-white border border-slate-300 rounded-lg">{{ $siteSettings['faq_3_a'] ?? 'All our pricing is direct-from-owner with zero third-party middleman and zero brokerage commission.' }}</textarea>
                        </div>
                    </div>
                </div>

                <!-- TAB 8: SOCIAL LINKS -->
                <div id="d-tab-social" class="drawer-panel hidden space-y-4">
                    <div class="border-b border-slate-100 pb-3">
                        <h4 class="text-sm font-black text-slate-900 uppercase tracking-wider">Social Channels & Links</h4>
                        <p class="text-xs text-slate-500">Official social media profiles.</p>
                    </div>

                    <div class="space-y-3">
                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">Facebook Page</label>
                            <input type="url" name="social_facebook" value="{{ $siteSettings['social_facebook'] ?? 'https://facebook.com' }}" class="w-full text-xs px-3 py-2 bg-slate-50 border border-slate-300 rounded-xl">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">Instagram Profile</label>
                            <input type="url" name="social_instagram" value="{{ $siteSettings['social_instagram'] ?? 'https://instagram.com' }}" class="w-full text-xs px-3 py-2 bg-slate-50 border border-slate-300 rounded-xl">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">LinkedIn Page</label>
                            <input type="url" name="social_linkedin" value="{{ $siteSettings['social_linkedin'] ?? 'https://linkedin.com' }}" class="w-full text-xs px-3 py-2 bg-slate-50 border border-slate-300 rounded-xl">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">Twitter / X</label>
                            <input type="url" name="social_twitter" value="{{ $siteSettings['social_twitter'] ?? 'https://twitter.com' }}" class="w-full text-xs px-3 py-2 bg-slate-50 border border-slate-300 rounded-xl">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">YouTube Channel</label>
                            <input type="url" name="social_youtube" value="{{ $siteSettings['social_youtube'] ?? 'https://youtube.com' }}" class="w-full text-xs px-3 py-2 bg-slate-50 border border-slate-300 rounded-xl">
                        </div>
                    </div>
                </div>

            </form>

            <!-- Drawer Sticky Footer -->
            <div class="p-5 border-t border-slate-100 bg-white/95 backdrop-blur-md flex items-center justify-between gap-3 sticky bottom-0 z-20">
                <button type="button" 
                        onclick="closeSettingsDrawer()" 
                        class="px-4 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-600 rounded-xl text-xs font-bold transition">
                    Close
                </button>

                <div class="flex items-center space-x-2">
                    <button type="button" 
                            id="drawerSaveBtn"
                            onclick="document.getElementById('drawerSettingsForm').requestSubmit()" 
                            class="px-6 py-2.5 bg-brand-primary hover:bg-brand-dark text-white rounded-xl text-xs font-black transition shadow-sm shadow-emerald-600/30 flex items-center space-x-1.5">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        <span id="drawerSaveBtnText">Save All Settings</span>
                    </button>
                </div>
            </div>

        </div>
    </div>
</div>

<script>
    function openSettingsDrawer(tabId = null) {
        const overlay = document.getElementById('settingsDrawerOverlay');
        const panel = document.getElementById('settingsDrawerPanel');
        if (!overlay || !panel) return;

        overlay.classList.remove('opacity-0', 'pointer-events-none');
        overlay.classList.add('opacity-100');
        panel.classList.remove('translate-x-full');
        panel.classList.add('translate-x-0');
        document.body.classList.add('overflow-hidden');

        if (tabId) {
            switchDrawerTab(tabId);
        }
    }

    function closeSettingsDrawer() {
        const overlay = document.getElementById('settingsDrawerOverlay');
        const panel = document.getElementById('settingsDrawerPanel');
        if (!overlay || !panel) return;

        overlay.classList.remove('opacity-100');
        overlay.classList.add('opacity-0', 'pointer-events-none');
        panel.classList.remove('translate-x-0');
        panel.classList.add('translate-x-full');
        document.body.classList.remove('overflow-hidden');
    }

    function switchDrawerTab(tabId) {
        document.querySelectorAll('.drawer-panel').forEach(p => p.classList.add('hidden'));
        document.querySelectorAll('.drawer-tab-btn').forEach(btn => {
            btn.className = 'drawer-tab-btn px-3 py-1.5 rounded-xl text-xs font-bold transition flex items-center space-x-1.5 text-slate-600 hover:text-slate-900 hover:bg-white shrink-0';
        });

        const targetPanel = document.getElementById(tabId);
        if (targetPanel) targetPanel.classList.remove('hidden');

        const targetBtn = document.getElementById('btn-' + tabId);
        if (targetBtn) {
            targetBtn.className = 'drawer-tab-btn px-3 py-1.5 rounded-xl text-xs font-bold transition flex items-center space-x-1.5 bg-white text-emerald-900 border border-emerald-200 shadow-2xs shrink-0';
        }
    }

    async function handleDrawerSettingsSubmit(e) {
        e.preventDefault();
        const form = e.target;
        const btn = document.getElementById('drawerSaveBtn');
        const btnText = document.getElementById('drawerSaveBtnText');
        const alertBox = document.getElementById('drawerSuccessAlert');
        const alertMsg = document.getElementById('drawerSuccessMessage');

        btn.disabled = true;
        btnText.innerText = 'Saving...';

        try {
            const formData = new FormData(form);
            const response = await fetch(form.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json'
                }
            });

            if (response.ok) {
                const data = await response.json();
                alertMsg.innerText = data.message || 'Settings saved successfully!';
                alertBox.classList.remove('hidden');

                // Dynamically update root colors if changed
                const primary = formData.get('brand_primary_color');
                const dark = formData.get('brand_primary_dark');
                const topbar = formData.get('brand_topbar_color');
                if (primary) document.documentElement.style.setProperty('--brand-primary', primary);
                if (dark) document.documentElement.style.setProperty('--brand-primary-dark', dark);
                if (topbar) document.documentElement.style.setProperty('--brand-topbar', topbar);

                btnText.innerText = '✓ Saved!';
                setTimeout(() => {
                    btnText.innerText = 'Save All Settings';
                    btn.disabled = false;
                }, 2000);
            } else {
                form.submit(); // fallback to standard submit
            }
        } catch (err) {
            form.submit(); // fallback
        }
    }

    // Keyboard shortcut listeners
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeSettingsDrawer();
        }
        if ((e.ctrlKey || e.metaKey) && e.key === ',') {
            e.preventDefault();
            openSettingsDrawer();
        }
    });

    // Check URL parameter for auto-open
    if (window.location.search.includes('settings=1') || window.location.search.includes('open_settings=1')) {
        setTimeout(openSettingsDrawer, 200);
    }
</script>

