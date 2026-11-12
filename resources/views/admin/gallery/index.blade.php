@extends('admin.layouts.admin')

@section('title', 'Manage Gallery')
@section('header_title', 'Photo & Project Gallery Manager')

@section('content')

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-start">
        
        <!-- Add New Photo Form (Col 1) -->
        <div class="bg-white border border-slate-200/80 rounded-3xl p-6 sm:p-7 shadow-xs">
            <h3 class="text-base font-black text-slate-900 mb-1">Add New Gallery Photo</h3>
            <p class="text-xs text-slate-500 mb-5">Upload high-resolution photography of completed or upcoming architecture projects.</p>

            <form method="POST" action="{{ route('admin.gallery.store') }}" enctype="multipart/form-data" class="space-y-4">
                @csrf

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Photo Title *</label>
                    <input type="text" name="title" required placeholder="e.g. Master Chef Organic Kitchen" class="w-full text-xs sm:text-sm px-3.5 py-2.5 bg-slate-50 border border-slate-300 rounded-xl focus:bg-white focus:outline-none focus:ring-2 focus:ring-emerald-500">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Category *</label>
                    <select name="category" required class="w-full text-xs sm:text-sm px-3.5 py-2.5 bg-slate-50 border border-slate-300 rounded-xl focus:bg-white focus:outline-none">
                        <option value="villas">Luxury Villas</option>
                        <option value="eco_homes">Eco-Friendly Living</option>
                        <option value="exterior">Exterior & Architecture</option>
                        <option value="interior">Interiors & Kitchens</option>
                        <option value="plots">Gated Land & Plots</option>
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Location / Project</label>
                    <input type="text" name="location" placeholder="e.g. Pine Ridge, Sector 65" class="w-full text-xs sm:text-sm px-3.5 py-2.5 bg-slate-50 border border-slate-300 rounded-xl focus:bg-white focus:outline-none">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Upload Photo File</label>
                    <input type="file" name="image_file" accept="image/*" class="w-full text-xs text-slate-500 file:mr-3 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-bold file:bg-emerald-50 file:text-emerald-700 hover:file:bg-emerald-100">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Or Photo URL</label>
                    <input type="text" name="image_url" placeholder="https://images.unsplash.com/..." class="w-full text-xs sm:text-sm px-3.5 py-2.5 bg-slate-50 border border-slate-300 rounded-xl focus:bg-white focus:outline-none">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Description</label>
                    <textarea name="description" rows="2" placeholder="Brief note on materials or architecture..." class="w-full text-xs px-3.5 py-2.5 bg-slate-50 border border-slate-300 rounded-xl focus:bg-white focus:outline-none"></textarea>
                </div>

                <button type="submit" class="w-full py-3 bg-brand-primary hover:bg-brand-dark text-white font-extrabold rounded-xl text-xs transition shadow-sm shadow-emerald-600/20">
                    Upload & Add to Gallery
                </button>
            </form>
        </div>

        <!-- Gallery Items List (Cols 2 & 3) -->
        <div class="lg:col-span-2 space-y-4">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-base font-black text-slate-900">Active Gallery Assets ({{ $items->total() }})</h3>
                    <p class="text-xs text-slate-500">Images shown on the public Architecture Showcase page</p>
                </div>
                <a href="{{ route('gallery.index') }}" target="_blank" class="text-xs font-bold text-emerald-700 hover:text-emerald-800 flex items-center space-x-1">
                    <span>View Public Gallery &rarr;</span>
                </a>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                @foreach($items as $item)
                    <div class="bg-white border border-slate-200/80 rounded-2xl overflow-hidden shadow-xs flex flex-col justify-between group hover:border-slate-300 transition duration-150">
                        <div class="relative h-48 bg-slate-100 overflow-hidden">
                            <img src="{{ $item->image_url }}" alt="{{ $item->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                            <span class="absolute top-2.5 left-2.5 bg-white/90 backdrop-blur-sm text-emerald-800 text-[10px] font-extrabold px-2.5 py-1 rounded-md uppercase border border-white/60 shadow-2xs">
                                {{ ucfirst(str_replace('_', ' ', $item->category)) }}
                            </span>
                        </div>

                        <div class="p-4 flex-grow flex flex-col justify-between">
                            <div>
                                <h4 class="font-extrabold text-slate-900 text-sm line-clamp-1">{{ $item->title }}</h4>
                                @if($item->location)
                                    <div class="text-[11px] text-slate-500 mt-0.5 flex items-center space-x-1">
                                        <span>📍</span>
                                        <span>{{ $item->location }}</span>
                                    </div>
                                @endif
                                @if($item->description)
                                    <p class="text-xs text-slate-500 mt-1.5 line-clamp-2 leading-relaxed">{{ $item->description }}</p>
                                @endif
                            </div>

                            <div class="pt-3 mt-3 border-t border-slate-100 flex justify-end">
                                <form method="POST" action="{{ route('admin.gallery.destroy', $item->id) }}" onsubmit="return confirm('Are you sure you want to delete this gallery item?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-rose-600 hover:text-rose-700 text-xs font-bold">
                                        Delete Photo
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="pt-4">
                {{ $items->links() }}
            </div>
        </div>

    </div>

@endsection
