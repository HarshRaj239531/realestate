@extends('admin.layouts.admin')

@section('title', 'Edit Property: ' . $property->title)
@section('header_title', 'Edit Property Listing')

@section('content')

    <div class="max-w-4xl mx-auto bg-slate-900 border border-slate-800 rounded-3xl p-6 sm:p-8">
        
        <div class="flex items-center justify-between mb-6 pb-4 border-b border-slate-800">
            <div>
                <h3 class="text-lg font-bold text-white">Edit: {{ $property->title }}</h3>
                <p class="text-xs text-slate-400">Update property details, price, or change photo</p>
            </div>
            <a href="{{ route('admin.properties.index') }}" class="text-xs text-slate-400 hover:text-white">
                &larr; Back to list
            </a>
        </div>

        <form method="POST" action="{{ route('admin.properties.update', $property->id) }}" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Basic Info -->
            <div class="space-y-4">
                <div>
                    <label class="block text-xs font-semibold text-slate-300 mb-1">Title *</label>
                    <input type="text" name="title" value="{{ old('title', $property->title) }}" required class="w-full text-xs px-3.5 py-2.5 bg-slate-950 border border-slate-800 rounded-xl text-white focus:outline-none focus:ring-1 focus:ring-emerald-500">
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-300 mb-1">Tagline</label>
                    <input type="text" name="tagline" value="{{ old('tagline', $property->tagline) }}" class="w-full text-xs px-3.5 py-2.5 bg-slate-950 border border-slate-800 rounded-xl text-white focus:outline-none focus:ring-1 focus:ring-emerald-500">
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-semibold text-slate-300 mb-1">Property Type *</label>
                        <select name="property_type" required class="w-full text-xs px-3.5 py-2.5 bg-slate-950 border border-slate-800 rounded-xl text-white focus:outline-none">
                            <option value="villa" {{ $property->property_type == 'villa' ? 'selected' : '' }}>Luxury Villa</option>
                            <option value="apartment" {{ $property->property_type == 'apartment' ? 'selected' : '' }}>Green Apartment</option>
                            <option value="penthouse" {{ $property->property_type == 'penthouse' ? 'selected' : '' }}>Biophilic Penthouse</option>
                            <option value="plot" {{ $property->property_type == 'plot' ? 'selected' : '' }}>Residential Plot</option>
                            <option value="commercial" {{ $property->property_type == 'commercial' ? 'selected' : '' }}>Commercial</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-slate-300 mb-1">Status *</label>
                        <select name="status" required class="w-full text-xs px-3.5 py-2.5 bg-slate-950 border border-slate-800 rounded-xl text-white focus:outline-none">
                            <option value="for_sale" {{ $property->status == 'for_sale' ? 'selected' : '' }}>For Sale (Buy)</option>
                            <option value="for_rent" {{ $property->status == 'for_rent' ? 'selected' : '' }}>For Rent</option>
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-semibold text-slate-300 mb-1">Numeric Price (INR) *</label>
                        <input type="number" step="1000" name="price" value="{{ old('price', $property->price) }}" required class="w-full text-xs px-3.5 py-2.5 bg-slate-950 border border-slate-800 rounded-xl text-white focus:outline-none">
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-slate-300 mb-1">Price Display String *</label>
                        <input type="text" name="price_display" value="{{ old('price_display', $property->price_display) }}" required class="w-full text-xs px-3.5 py-2.5 bg-slate-950 border border-slate-800 rounded-xl text-white focus:outline-none">
                    </div>
                </div>
            </div>

            <!-- Specs & Location -->
            <div class="space-y-4 pt-4 border-t border-slate-800">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-semibold text-slate-300 mb-1">Locality / Sector *</label>
                        <input type="text" name="location" value="{{ old('location', $property->location) }}" required class="w-full text-xs px-3.5 py-2.5 bg-slate-950 border border-slate-800 rounded-xl text-white focus:outline-none">
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-slate-300 mb-1">City *</label>
                        <input type="text" name="city" value="{{ old('city', $property->city) }}" required class="w-full text-xs px-3.5 py-2.5 bg-slate-950 border border-slate-800 rounded-xl text-white focus:outline-none">
                    </div>
                </div>

                <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
                    <div>
                        <label class="block text-xs font-semibold text-slate-300 mb-1">Bedrooms</label>
                        <input type="number" name="bedrooms" value="{{ old('bedrooms', $property->bedrooms) }}" class="w-full text-xs px-3.5 py-2.5 bg-slate-950 border border-slate-800 rounded-xl text-white focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-300 mb-1">Bathrooms</label>
                        <input type="number" name="bathrooms" value="{{ old('bathrooms', $property->bathrooms) }}" class="w-full text-xs px-3.5 py-2.5 bg-slate-950 border border-slate-800 rounded-xl text-white focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-300 mb-1">Area Sq. Ft *</label>
                        <input type="number" name="area_sqft" value="{{ old('area_sqft', $property->area_sqft) }}" required class="w-full text-xs px-3.5 py-2.5 bg-slate-950 border border-slate-800 rounded-xl text-white focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-300 mb-1">Parking Slots</label>
                        <input type="number" name="parking_spaces" value="{{ old('parking_spaces', $property->parking_spaces) }}" class="w-full text-xs px-3.5 py-2.5 bg-slate-950 border border-slate-800 rounded-xl text-white focus:outline-none">
                    </div>
                </div>

                <div class="flex items-center space-x-6 pt-2">
                    <label class="inline-flex items-center space-x-2 cursor-pointer">
                        <input type="checkbox" name="is_eco_friendly" value="1" {{ $property->is_eco_friendly ? 'checked' : '' }} class="rounded text-emerald-600 focus:ring-emerald-500 bg-slate-950 border-slate-800">
                        <span class="text-xs text-slate-300 font-bold">🌱 Eco-Certified Property</span>
                    </label>

                    <label class="inline-flex items-center space-x-2 cursor-pointer">
                        <input type="checkbox" name="is_featured" value="1" {{ $property->is_featured ? 'checked' : '' }} class="rounded text-emerald-600 focus:ring-emerald-500 bg-slate-950 border-slate-800">
                        <span class="text-xs text-slate-300 font-bold">⭐ Featured on Homepage</span>
                    </label>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-300 mb-1">Description *</label>
                    <textarea name="description" rows="5" required class="w-full text-xs px-3.5 py-2.5 bg-slate-950 border border-slate-800 rounded-xl text-white focus:outline-none">{{ old('description', $property->description) }}</textarea>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-300 mb-1">Amenities (Comma-separated)</label>
                    <input type="text" name="amenities_raw" value="{{ old('amenities_raw', is_array($property->amenities) ? implode(', ', $property->amenities) : '') }}" class="w-full text-xs px-3.5 py-2.5 bg-slate-950 border border-slate-800 rounded-xl text-white focus:outline-none">
                </div>
            </div>

            <!-- Media -->
            <div class="space-y-4 pt-4 border-t border-slate-800">
                <div class="flex items-center space-x-4 mb-2">
                    <img src="{{ $property->main_image_url }}" alt="Current Photo" class="w-20 h-20 rounded-xl object-cover border border-slate-700">
                    <div>
                        <div class="text-xs font-bold text-white">Current Main Photo</div>
                        <div class="text-[10px] text-slate-400">Upload a new file below or enter a URL to replace it</div>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-semibold text-slate-300 mb-1">Upload New File</label>
                        <input type="file" name="main_image_file" accept="image/*" class="w-full text-xs text-slate-400 file:mr-3 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-bold file:bg-emerald-950 file:text-emerald-300">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-300 mb-1">Or Direct Photo URL</label>
                        <input type="text" name="main_image_url" value="{{ old('main_image_url') }}" placeholder="https://..." class="w-full text-xs px-3.5 py-2.5 bg-slate-950 border border-slate-800 rounded-xl text-white focus:outline-none">
                    </div>
                </div>
            </div>

            <div class="pt-4 flex items-center space-x-3">
                <button type="submit" class="flex-grow py-3 bg-brand-primary hover:bg-brand-dark text-white font-bold rounded-xl text-xs sm:text-sm transition shadow-lg">
                    Update Property Listing
                </button>
                <a href="{{ route('admin.properties.index') }}" class="px-5 py-3 bg-slate-800 hover:bg-slate-700 text-slate-300 rounded-xl text-xs font-semibold">
                    Cancel
                </a>
            </div>
        </form>

    </div>

@endsection
