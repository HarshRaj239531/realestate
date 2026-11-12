@extends('layouts.app')

@section('title', 'Contact Us & Office Locations | ' . ($siteSettings['brand_name'] ?? 'RealEstate'))
@section('meta_description', 'Get in touch with RealEstate. Visit our sales experience centre or contact our senior real estate consultants.')

@section('content')

    <!-- Banner Header -->
    @php
        $contactHero = isset($siteImages['contact_hero']) ? $siteImages['contact_hero']->url : 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=1600&q=80';
    @endphp
    <div class="relative py-16 sm:py-24 bg-slate-900 bg-cover bg-center overflow-hidden" 
         style="background-image: linear-gradient(to right, rgba(15, 23, 42, 0.90), rgba(15, 23, 42, 0.75)), url('{{ $contactHero }}');">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white relative z-10">
            <span class="text-xs font-bold uppercase tracking-widest text-emerald-400 bg-emerald-950/70 border border-emerald-500/30 px-3.5 py-1.5 rounded-full">
                Get In Touch
            </span>
            <h1 class="text-3xl sm:text-5xl font-black text-white mt-3 tracking-tight">
                Connect with Our Property Advisors
            </h1>
            <p class="text-slate-300 text-sm sm:text-base max-w-xl mx-auto mt-2">
                Have questions regarding property availability, custom villa construction, or green certifications? We are here to assist.
            </p>
        </div>
    </div>

    <!-- Contact Grid -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
            
            <!-- Left 1 Col: Contact Info Cards -->
            <div class="space-y-6">
                
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-200">
                    <div class="w-10 h-10 rounded-xl bg-emerald-100 text-emerald-700 flex items-center justify-center text-xl mb-3">
                        📍
                    </div>
                    <h3 class="font-bold text-slate-900 text-base mb-1">Corporate Headquarters</h3>
                    <p class="text-xs text-slate-600 leading-relaxed">
                        {{ $siteSettings['contact_address'] ?? 'Skyline Tower, 4th Floor, Golf Course Extension Road, Gurugram, Haryana 122002' }}
                    </p>
                </div>

                <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-200">
                    <div class="w-10 h-10 rounded-xl bg-emerald-100 text-emerald-700 flex items-center justify-center text-xl mb-3">
                        📞
                    </div>
                    <h3 class="font-bold text-slate-900 text-base mb-1">Phone & Support</h3>
                    <p class="text-xs text-slate-600">
                        Direct Sales: <a href="tel:{{ $siteSettings['contact_phone'] ?? '+919876543210' }}" class="font-bold text-brand-primary">{{ $siteSettings['contact_phone'] ?? '+91 98765 43210' }}</a>
                    </p>
                    <p class="text-xs text-slate-600 mt-1">
                        Email: <a href="mailto:{{ $siteSettings['contact_email'] ?? 'info@aghomesindia.com' }}" class="text-slate-800">{{ $siteSettings['contact_email'] ?? 'info@aghomesindia.com' }}</a>
                    </p>
                </div>

                <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-200">
                    <div class="w-10 h-10 rounded-xl bg-emerald-100 text-emerald-700 flex items-center justify-center text-xl mb-3">
                        💬
                    </div>
                    <h3 class="font-bold text-slate-900 text-base mb-1">Instant WhatsApp Support</h3>
                    <p class="text-xs text-slate-600 mb-4">
                        Chat directly with our property specialists for instant brochures, price lists, and availability.
                    </p>
                    <a href="https://wa.me/{{ $siteSettings['contact_whatsapp'] ?? '919876543210' }}?text=Hello%20AG%20Homes,%20I%20would%20like%20more%20details." target="_blank" class="inline-flex items-center space-x-2 px-4 py-2 bg-[#25D366] hover:bg-[#20ba59] text-white text-xs font-bold rounded-xl transition shadow">
                        <span>Chat on WhatsApp</span>
                    </a>
                </div>

                <div class="bg-emerald-950 text-white p-6 rounded-2xl shadow-sm border border-emerald-900">
                    <h4 class="font-bold text-sm text-emerald-400 mb-2">Visiting Hours</h4>
                    <p class="text-xs text-slate-300">Monday – Saturday: 9:30 AM – 7:00 PM</p>
                    <p class="text-xs text-slate-300 mt-1">Sunday: 10:00 AM – 6:00 PM (Prior Appointment)</p>
                </div>

            </div>

            <!-- Right 2 Cols: Interactive Message Form -->
            <div class="lg:col-span-2">
                <div class="bg-white p-8 sm:p-10 rounded-3xl shadow-lg border border-slate-200">
                    <div class="mb-6">
                        <span class="text-xs font-bold uppercase tracking-wider text-emerald-700 bg-emerald-100 px-3 py-1 rounded-full">
                            Send Us a Message
                        </span>
                        <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 mt-2">
                            How Can We Assist Your Real Estate Journey?
                        </h2>
                        <p class="text-xs text-slate-500 mt-1">
                            Our team will reply with comprehensive information within 24 hours.
                        </p>
                    </div>

                    <form method="POST" action="{{ route('inquiries.store') }}" class="space-y-4">
                        @csrf
                        <input type="hidden" name="inquiry_type" value="general">

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-semibold text-slate-700 mb-1">Your Full Name *</label>
                                <input type="text" name="name" required placeholder="e.g. Ramesh Kumar" class="w-full text-xs sm:text-sm px-3.5 py-2.5 bg-slate-50 border border-slate-300 rounded-xl focus:bg-white focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-slate-700 mb-1">Email Address *</label>
                                <input type="email" name="email" required placeholder="ramesh@example.com" class="w-full text-xs sm:text-sm px-3.5 py-2.5 bg-slate-50 border border-slate-300 rounded-xl focus:bg-white focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-semibold text-slate-700 mb-1">Phone Number *</label>
                                <input type="tel" name="phone" required placeholder="+91 98765 43210" class="w-full text-xs sm:text-sm px-3.5 py-2.5 bg-slate-50 border border-slate-300 rounded-xl focus:bg-white focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-slate-700 mb-1">Subject</label>
                                <input type="text" name="subject" placeholder="General Inquiry / Site Visit" class="w-full text-xs sm:text-sm px-3.5 py-2.5 bg-slate-50 border border-slate-300 rounded-xl focus:bg-white focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Your Message / Requirement *</label>
                            <textarea name="message" rows="5" required placeholder="Please describe what you are looking for (budget, preferred location, timeline)..." class="w-full text-xs sm:text-sm px-3.5 py-2.5 bg-slate-50 border border-slate-300 rounded-xl focus:bg-white focus:ring-2 focus:ring-emerald-500 focus:outline-none"></textarea>
                        </div>

                        <button type="submit" class="w-full sm:w-auto px-8 py-3.5 bg-brand-primary hover:bg-brand-dark text-white font-bold rounded-xl text-sm transition shadow-lg">
                            Send Your Message
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>

@endsection

