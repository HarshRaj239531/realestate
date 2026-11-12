@extends('layouts.app')

@section('title', 'Post Your Property | ' . ($siteSettings['brand_name'] ?? 'RealEstate'))
@section('meta_description', 'List your residential, commercial, or plot property on RealEstate to connect with verified buyers and tenants.')

@section('content')

    <div class="bg-slate-900 py-12 px-4 text-center text-white">
        <span class="text-xs font-bold uppercase tracking-widest text-emerald-400 bg-emerald-950/80 px-3 py-1 rounded-full border border-emerald-500/30">
            Owners & Verified Brokers
        </span>
        <h1 class="text-3xl sm:text-4xl font-extrabold mt-3">Post Your Property For Free</h1>
        <p class="text-xs sm:text-sm text-slate-300 mt-2 max-w-lg mx-auto">
            Connect with tens of thousands of premium homebuyers seeking eco-friendly and luxury residences.
        </p>
    </div>

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="bg-white rounded-3xl shadow-xl border border-slate-200 p-6 sm:p-10">
            
            <form method="POST" action="{{ route('post-property.store') }}" enctype="multipart/form-data" class="space-y-8">
                @csrf

                <!-- Section 1: Basic Details -->
                <div class="space-y-4">
                    <h3 class="text-lg font-bold text-slate-900 border-b border-slate-100 pb-2 flex items-center space-x-2">
                        <span>1. Property Overview</span>
                    </h3>

                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1">Property Title *</label>
                        <input type="text" name="title" required placeholder="e.g. 4 BHK Eco Haven Luxury Villa in Sector 65" class="w-full text-xs sm:text-sm px-3.5 py-2.5 bg-slate-50 border border-slate-300 rounded-xl focus:bg-white focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1">Short Tagline / Highlight</label>
                        <input type="text" name="tagline" placeholder="e.g. 100% Solar-Powered Luxury Amidst Pine Woods" class="w-full text-xs sm:text-sm px-3.5 py-2.5 bg-slate-50 border border-slate-300 rounded-xl focus:bg-white focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Property Type *</label>
                            <select name="property_type" required class="w-full text-xs sm:text-sm px-3.5 py-2.5 bg-slate-50 border border-slate-300 rounded-xl focus:bg-white focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                                <option value="villa">Luxury Villa</option>
                                <option value="apartment">Green Apartment</option>
                                <option value="penthouse">Biophilic Penthouse</option>
                                <option value="plot">Residential Plot</option>
                                <option value="commercial">Commercial Office / Retail</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Listing Status *</label>
                            <select name="status" required class="w-full text-xs sm:text-sm px-3.5 py-2.5 bg-slate-50 border border-slate-300 rounded-xl focus:bg-white focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                                <option value="for_sale">For Sale (Buy)</option>
                                <option value="for_rent">For Rent</option>
                            </select>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Numeric Price (in INR) *</label>
                            <input type="number" step="1000" name="price" required placeholder="38500000" class="w-full text-xs sm:text-sm px-3.5 py-2.5 bg-slate-50 border border-slate-300 rounded-xl focus:bg-white focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Display Price (Formatted) *</label>
                            <input type="text" name="price_display" required placeholder="e.g. ₹ 3.85 Cr or ₹ 65,000 / mo" class="w-full text-xs sm:text-sm px-3.5 py-2.5 bg-slate-50 border border-slate-300 rounded-xl focus:bg-white focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                        </div>
                    </div>
                </div>

                <!-- Section 2: Specifications & Location -->
                <div class="space-y-4">
                    <h3 class="text-lg font-bold text-slate-900 border-b border-slate-100 pb-2">
                        2. Specifications & Location
                    </h3>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Locality / Sector *</label>
                            <input type="text" name="location" required placeholder="e.g. Golf Course Extension, Sector 65" class="w-full text-xs sm:text-sm px-3.5 py-2.5 bg-slate-50 border border-slate-300 rounded-xl focus:bg-white focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">City *</label>
                            <input type="text" name="city" value="Gurugram" required class="w-full text-xs sm:text-sm px-3.5 py-2.5 bg-slate-50 border border-slate-300 rounded-xl focus:bg-white focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                        </div>
                    </div>

                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Bedrooms</label>
                            <input type="number" name="bedrooms" placeholder="4" class="w-full text-xs sm:text-sm px-3.5 py-2.5 bg-slate-50 border border-slate-300 rounded-xl focus:bg-white focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Bathrooms</label>
                            <input type="number" name="bathrooms" placeholder="4" class="w-full text-xs sm:text-sm px-3.5 py-2.5 bg-slate-50 border border-slate-300 rounded-xl focus:bg-white focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Area (Sq. Ft) *</label>
                            <input type="number" name="area_sqft" required placeholder="4250" class="w-full text-xs sm:text-sm px-3.5 py-2.5 bg-slate-50 border border-slate-300 rounded-xl focus:bg-white focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Parking Slots</label>
                            <input type="number" name="parking_spaces" value="2" class="w-full text-xs sm:text-sm px-3.5 py-2.5 bg-slate-50 border border-slate-300 rounded-xl focus:bg-white focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                        </div>
                    </div>

                    <div class="pt-2">
                        <label class="inline-flex items-center space-x-2 cursor-pointer">
                            <input type="checkbox" name="is_eco_friendly" value="1" checked class="w-4 h-4 text-emerald-600 rounded focus:ring-emerald-500">
                            <span class="text-xs font-bold text-slate-800">🌱 This property features Eco-Friendly / Green Energy systems (Solar, Rainwater, etc.)</span>
                        </label>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1">Comprehensive Description *</label>
                        <textarea name="description" rows="4" required placeholder="Describe the layout, interior materials, sunlight exposure, neighborhood, etc." class="w-full text-xs sm:text-sm px-3.5 py-2.5 bg-slate-50 border border-slate-300 rounded-xl focus:bg-white focus:ring-2 focus:ring-emerald-500 focus:outline-none"></textarea>
                    </div>
                </div>

                <!-- Section 3: Media & Amenities -->
                <div class="space-y-4">
                    <h3 class="text-lg font-bold text-slate-900 border-b border-slate-100 pb-2">
                        3. Visuals & Amenities
                    </h3>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Upload Main Photo</label>
                            <input type="file" name="main_image" accept="image/*" class="w-full text-xs text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-emerald-50 file:text-emerald-700 hover:file:bg-emerald-100">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Or Photo URL (Unsplash / Hosted)</label>
                            <input type="url" name="image_url" placeholder="https://images.unsplash.com/..." class="w-full text-xs sm:text-sm px-3.5 py-2.5 bg-slate-50 border border-slate-300 rounded-xl focus:bg-white focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-2">Amenities Included</label>
                        <div class="grid grid-cols-2 sm:grid-cols-3 gap-2 text-xs text-slate-700">
                            @foreach(['Solar Rooftop', 'Rainwater Harvesting', 'EV Charging Station', 'Private Garden', 'Smart Automation', 'Air Purification', 'Clubhouse Access', '24/7 Security', 'Swimming Pool'] as $item)
                                <label class="inline-flex items-center space-x-2 p-2 bg-slate-50 rounded-lg border border-slate-200/80 cursor-pointer hover:bg-slate-100">
                                    <input type="checkbox" name="amenities[]" value="{{ $item }}" class="rounded text-emerald-600 focus:ring-emerald-500">
                                    <span>{{ $item }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Section 4: Contact Info -->
                <div class="space-y-4">
                    <h3 class="text-lg font-bold text-slate-900 border-b border-slate-100 pb-2">
                        4. Contact Information
                    </h3>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Contact Phone *</label>
                            <input type="tel" name="contact_phone" required placeholder="+91 98765 43210" class="w-full text-xs sm:text-sm px-3.5 py-2.5 bg-slate-50 border border-slate-300 rounded-xl focus:bg-white focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Contact Email *</label>
                            <input type="email" name="contact_email" required placeholder="contact@example.com" class="w-full text-xs sm:text-sm px-3.5 py-2.5 bg-slate-50 border border-slate-300 rounded-xl focus:bg-white focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                        </div>
                    </div>
                </div>

                <div class="pt-4">
                    <button type="submit" class="w-full py-4 bg-brand-primary hover:bg-brand-dark text-white font-extrabold rounded-2xl text-base transition shadow-xl">
                        Publish Property Listing
                    </button>
                </div>
            </form>

        </div>
    </div>

@endsection

