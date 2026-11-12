@extends('admin.layouts.admin')

@section('title', 'Add New Property')
@section('header_title', 'Create New Property')

@section('content')

    <div class="max-w-4xl mx-auto bg-slate-900 border border-slate-800 rounded-3xl p-6 sm:p-8">
        
        <div class="flex items-center justify-between mb-6 pb-4 border-b border-slate-800">
            <div>
                <h3 class="text-lg font-bold text-white">Property Details</h3>
                <p class="text-xs text-slate-400">Fill in the fields to publish a new real estate listing</p>
            </div>
            <a href="{{ route('admin.properties.index') }}" class="text-xs text-slate-400 hover:text-white">
                &larr; Back to list
            </a>
        </div>

        <form method="POST" action="{{ route('admin.properties.store') }}" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <!-- Basic Info -->
            <div class="space-y-4">
                <div>
                    <label class="block text-xs font-semibold text-slate-300 mb-1">Title *</label>
                    <input type="text" name="title" value="{{ old('title') }}" required placeholder="e.g. Eco Haven Luxury Villa" class="w-full text-xs px-3.5 py-2.5 bg-slate-950 border border-slate-800 rounded-xl text-white focus:outline-none focus:ring-1 focus:ring-emerald-500">
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-300 mb-1">Tagline</label>
                    <input type="text" name="tagline" value="{{ old('tagline') }}" placeholder="e.g. 100% Solar-Powered Luxury" class="w-full text-xs px-3.5 py-2.5 bg-slate-950 border border-slate-800 rounded-xl text-white focus:outline-none focus:ring-1 focus:ring-emerald-500">
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-semibold text-slate-300 mb-1">Property Type *</label>
                        <select name="property_type" required class="w-full text-xs px-3.5 py-2.5 bg-slate-950 border border-slate-800 rounded-xl text-white focus:outline-none">
                            <option value="villa">Luxury Villa</option>
                            <option value="apartment">Green Apartment</option>
                            <option value="penthouse">Biophilic Penthouse</option>
                            <option value="plot">Residential Plot</option>
                            <option value="commercial">Commercial</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-slate-300 mb-1">Status *</label>
                        <select name="status" required class="w-full text-xs px-3.5 py-2.5 bg-slate-950 border border-slate-800 rounded-xl text-white focus:outline-none">
                            <option value="for_sale">For Sale (Buy)</option>
                            <option value="for_rent">For Rent</option>
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-semibold text-slate-300 mb-1">Numeric Price (INR) *</label>
                        <input type="number" step="1000" name="price" value="{{ old('price', 35000000) }}" required class="w-full text-xs px-3.5 py-2.5 bg-slate-950 border border-slate-800 rounded-xl text-white focus:outline-none focus:ring-1 focus:ring-emerald-500">
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-slate-300 mb-1">Price Display String *</label>
                        <input type="text" name="price_display" value="{{ old('price_display', '₹ 3.50 Cr') }}" required class="w-full text-xs px-3.5 py-2.5 bg-slate-950 border border-slate-800 rounded-xl text-white focus:outline-none focus:ring-1 focus:ring-emerald-500">
                    </div>
                </div>
            </div>

            <!-- Specs & Location -->
            <div class="space-y-4 pt-4 border-t border-slate-800">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-semibold text-slate-300 mb-1">Locality / Sector *</label>
                        <input type="text" name="location" value="{{ old('location', 'Golf Course Extn, Sector 65') }}" required class="w-full text-xs px-3.5 py-2.5 bg-slate-950 border border-slate-800 rounded-xl text-white focus:outline-none focus:ring-1 focus:ring-emerald-500">
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-slate-300 mb-1">City *</label>
                        <input type="text" name="city" value="{{ old('city', 'Gurugram') }}" required class="w-full text-xs px-3.5 py-2.5 bg-slate-950 border border-slate-800 rounded-xl text-white focus:outline-none focus:ring-1 focus:ring-emerald-500">
                    </div>
                </div>

                <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
                    <div>
                        <label class="block text-xs font-semibold text-slate-300 mb-1">Bedrooms</label>
                        <input type="number" name="bedrooms" value="{{ old('bedrooms', 4) }}" class="w-full text-xs px-3.5 py-2.5 bg-slate-950 border border-slate-800 rounded-xl text-white focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-300 mb-1">Bathrooms</label>
                        <input type="number" name="bathrooms" value="{{ old('bathrooms', 4) }}" class="w-full text-xs px-3.5 py-2.5 bg-slate-950 border border-slate-800 rounded-xl text-white focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-300 mb-1">Area Sq. Ft *</label>
                        <input type="number" name="area_sqft" value="{{ old('area_sqft', 4200) }}" required class="w-full text-xs px-3.5 py-2.5 bg-slate-950 border border-slate-800 rounded-xl text-white focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-300 mb-1">Parking Slots</label>
                        <input type="number" name="parking_spaces" value="{{ old('parking_spaces', 2) }}" class="w-full text-xs px-3.5 py-2.5 bg-slate-950 border border-slate-800 rounded-xl text-white focus:outline-none">
                    </div>
                </div>

                <div class="flex items-center space-x-6 pt-2">
                    <label class="inline-flex items-center space-x-2 cursor-pointer">
                        <input type="checkbox" name="is_eco_friendly" value="1" checked class="rounded text-emerald-600 focus:ring-emerald-500 bg-slate-950 border-slate-800">
                        <span class="text-xs text-slate-300 font-bold">🌱 Eco-Certified Property</span>
                    </label>

                    <label class="inline-flex items-center space-x-2 cursor-pointer">
                        <input type="checkbox" name="is_featured" value="1" checked class="rounded text-emerald-600 focus:ring-emerald-500 bg-slate-950 border-slate-800">
                        <span class="text-xs text-slate-300 font-bold">⭐ Featured on Homepage</span>
                    </label>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-300 mb-1">Description *</label>
                    <textarea name="description" rows="4" required class="w-full text-xs px-3.5 py-2.5 bg-slate-950 border border-slate-800 rounded-xl text-white focus:outline-none focus:ring-1 focus:ring-emerald-500">{{ old('description', 'A state-of-the-art sustainable luxury villa engineered with solar panels, biophilic ventilation, and zero-carbon building standards.') }}</textarea>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-300 mb-1">Amenities (Comma-separated)</label>
                    <input type="text" name="amenities_raw" value="{{ old('amenities_raw', 'Solar Panels, Rainwater Harvesting, EV Charger, Private Garden, Smart Automation') }}" class="w-full text-xs px-3.5 py-2.5 bg-slate-950 border border-slate-800 rounded-xl text-white focus:outline-none">
                </div>
            </div>

            <!-- Media -->
            <div class="space-y-4 pt-4 border-t border-slate-800">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-semibold text-slate-300 mb-1">Upload Photo</label>
                        <input type="file" name="main_image_file" accept="image/*" class="w-full text-xs text-slate-400 file:mr-3 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-bold file:bg-emerald-950 file:text-emerald-300">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-300 mb-1">Or Photo URL</label>
                        <input type="text" name="main_image_url" value="{{ old('main_image_url') }}" placeholder="https://images.unsplash.com/..." class="w-full text-xs px-3.5 py-2.5 bg-slate-950 border border-slate-800 rounded-xl text-white focus:outline-none">
                    </div>
                </div>
            </div>

            <div class="pt-4">
                <button type="submit" class="w-full py-3 bg-brand-primary hover:bg-brand-dark text-white font-bold rounded-xl text-xs sm:text-sm transition shadow-lg">
                    Publish Property
                </button>
            </div>
        </form>

    </div>

@endsection

