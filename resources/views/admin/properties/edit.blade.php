@extends('admin.layouts.admin')

@section('title', 'Edit Property: ' . $property->title)
@section('header_title', 'Edit Property Listing')

@section('content')

    <div class="max-w-4xl mx-auto bg-white border border-slate-200/80 rounded-3xl p-6 sm:p-8 shadow-xs">
        
        <div class="flex items-center justify-between mb-6 pb-4 border-b border-slate-100">
            <div>
                <h3 class="text-lg font-black text-slate-900">Edit: {{ $property->title }}</h3>
                <p class="text-xs text-slate-500">Update property details, price, specifications, or change photo</p>
            </div>
            <a href="{{ route('admin.properties.index') }}" class="text-xs font-bold text-slate-600 hover:text-emerald-700 flex items-center space-x-1">
                <span>&larr; Back to list</span>
            </a>
        </div>

        <form method="POST" action="{{ route('admin.properties.update', $property->id) }}" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Basic Info -->
            <div class="space-y-4">
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Property Title *</label>
                    <input type="text" name="title" value="{{ old('title', $property->title) }}" required class="w-full text-xs sm:text-sm px-3.5 py-2.5 bg-slate-50 border border-slate-300 rounded-xl focus:bg-white focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Tagline</label>
                    <input type="text" name="tagline" value="{{ old('tagline', $property->tagline) }}" class="w-full text-xs sm:text-sm px-3.5 py-2.5 bg-slate-50 border border-slate-300 rounded-xl focus:bg-white focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Property Type *</label>
                        <select name="property_type" required class="w-full text-xs sm:text-sm px-3.5 py-2.5 bg-slate-50 border border-slate-300 rounded-xl focus:bg-white focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                            <option value="villa" {{ $property->property_type == 'villa' ? 'selected' : '' }}>Luxury Villa</option>
                            <option value="apartment" {{ $property->property_type == 'apartment' ? 'selected' : '' }}>Green Apartment</option>
                            <option value="penthouse" {{ $property->property_type == 'penthouse' ? 'selected' : '' }}>Biophilic Penthouse</option>
                            <option value="plot" {{ $property->property_type == 'plot' ? 'selected' : '' }}>Residential Plot</option>
                            <option value="commercial" {{ $property->property_type == 'commercial' ? 'selected' : '' }}>Commercial</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Status *</label>
                        <select name="status" required class="w-full text-xs sm:text-sm px-3.5 py-2.5 bg-slate-50 border border-slate-300 rounded-xl focus:bg-white focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                            <option value="for_sale" {{ $property->status == 'for_sale' ? 'selected' : '' }}>For Sale (Buy)</option>
                            <option value="for_rent" {{ $property->status == 'for_rent' ? 'selected' : '' }}>For Rent</option>
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Numeric Price (INR) *</label>
                        <input type="number" step="1000" name="price" value="{{ old('price', $property->price) }}" required class="w-full text-xs sm:text-sm px-3.5 py-2.5 bg-slate-50 border border-slate-300 rounded-xl focus:bg-white focus:outline-none">
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Price Display String *</label>
                        <input type="text" name="price_display" value="{{ old('price_display', $property->price_display) }}" required class="w-full text-xs sm:text-sm px-3.5 py-2.5 bg-slate-50 border border-slate-300 rounded-xl focus:bg-white focus:outline-none">
                    </div>
                </div>
            </div>

            <!-- Specs & Location -->
            <div class="space-y-4 pt-4 border-t border-slate-100">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Locality / Sector *</label>
                        <input type="text" name="location" value="{{ old('location', $property->location) }}" required class="w-full text-xs sm:text-sm px-3.5 py-2.5 bg-slate-50 border border-slate-300 rounded-xl focus:bg-white focus:outline-none">
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">City *</label>
                        <input type="text" name="city" value="{{ old('city', $property->city) }}" required class="w-full text-xs sm:text-sm px-3.5 py-2.5 bg-slate-50 border border-slate-300 rounded-xl focus:bg-white focus:outline-none">
                    </div>
                </div>

                <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Bedrooms</label>
                        <input type="number" name="bedrooms" value="{{ old('bedrooms', $property->bedrooms) }}" class="w-full text-xs sm:text-sm px-3.5 py-2.5 bg-slate-50 border border-slate-300 rounded-xl focus:bg-white focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Bathrooms</label>
                        <input type="number" name="bathrooms" value="{{ old('bathrooms', $property->bathrooms) }}" class="w-full text-xs sm:text-sm px-3.5 py-2.5 bg-slate-50 border border-slate-300 rounded-xl focus:bg-white focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Area Sq. Ft *</label>
                        <input type="number" name="area_sqft" value="{{ old('area_sqft', $property->area_sqft) }}" required class="w-full text-xs sm:text-sm px-3.5 py-2.5 bg-slate-50 border border-slate-300 rounded-xl focus:bg-white focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Parking Slots</label>
                        <input type="number" name="parking_spaces" value="{{ old('parking_spaces', $property->parking_spaces) }}" class="w-full text-xs sm:text-sm px-3.5 py-2.5 bg-slate-50 border border-slate-300 rounded-xl focus:bg-white focus:outline-none">
                    </div>
                </div>

                <div class="flex items-center space-x-6 pt-2">
                    <label class="inline-flex items-center space-x-2 cursor-pointer">
                        <input type="checkbox" name="is_eco_friendly" value="1" {{ $property->is_eco_friendly ? 'checked' : '' }} class="rounded text-emerald-600 focus:ring-emerald-500 border-slate-300">
                        <span class="text-xs text-slate-700 font-bold">🌱 Eco-Certified Property</span>
                    </label>

                    <label class="inline-flex items-center space-x-2 cursor-pointer">
                        <input type="checkbox" name="is_featured" value="1" {{ $property->is_featured ? 'checked' : '' }} class="rounded text-emerald-600 focus:ring-emerald-500 border-slate-300">
                        <span class="text-xs text-slate-700 font-bold">⭐ Featured on Homepage</span>
                    </label>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Description *</label>
                    <textarea name="description" rows="5" required class="w-full text-xs sm:text-sm px-3.5 py-2.5 bg-slate-50 border border-slate-300 rounded-xl focus:bg-white focus:ring-2 focus:ring-emerald-500 focus:outline-none">{{ old('description', $property->description) }}</textarea>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Amenities (Comma-separated)</label>
                    <input type="text" name="amenities_raw" value="{{ old('amenities_raw', is_array($property->amenities) ? implode(', ', $property->amenities) : '') }}" class="w-full text-xs sm:text-sm px-3.5 py-2.5 bg-slate-50 border border-slate-300 rounded-xl focus:bg-white focus:outline-none">
                </div>
            </div>

            <!-- Media -->
            <div class="space-y-4 pt-4 border-t border-slate-100">
                <div class="flex items-center space-x-4 mb-2 p-3 bg-slate-50 rounded-2xl border border-slate-200">
                    <img src="{{ $property->main_image_url }}" alt="Current Photo" class="w-20 h-20 rounded-xl object-cover border border-slate-200 shadow-2xs">
                    <div>
                        <div class="text-xs font-bold text-slate-900">Current Main Photo</div>
                        <div class="text-[11px] text-slate-500 mt-0.5">Upload a new file below or enter a direct image URL to replace it</div>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Upload New File</label>
                        <input type="file" name="main_image_file" accept="image/*" class="w-full text-xs text-slate-500 file:mr-3 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-bold file:bg-emerald-50 file:text-emerald-700 hover:file:bg-emerald-100">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Or Direct Photo URL</label>
                        <input type="text" name="main_image_url" value="{{ old('main_image_url') }}" placeholder="https://..." class="w-full text-xs sm:text-sm px-3.5 py-2.5 bg-slate-50 border border-slate-300 rounded-xl focus:bg-white focus:outline-none">
                    </div>
                </div>
            </div>

            <div class="pt-4 flex items-center space-x-3">
                <button type="submit" class="flex-grow py-3.5 bg-brand-primary hover:bg-brand-dark text-white font-extrabold rounded-xl text-xs sm:text-sm transition shadow-sm shadow-emerald-600/20">
                    Update Property Listing
                </button>
                <a href="{{ route('admin.properties.index') }}" class="px-5 py-3.5 bg-slate-100 hover:bg-slate-200 text-slate-700 border border-slate-300 rounded-xl text-xs font-bold transition">
                    Cancel
                </a>
            </div>
        </form>

    </div>

@endsection
