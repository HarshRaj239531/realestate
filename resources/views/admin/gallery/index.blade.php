@extends('admin.layouts.admin')

@section('title', 'Manage Gallery')
@section('header_title', 'Photo & Project Gallery Manager')

@section('content')

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-start">
        
        <!-- Add New Photo Form (Col 1) -->
        <div class="bg-slate-900 border border-slate-800 rounded-3xl p-6 shadow-sm">
            <h3 class="text-base font-bold text-white mb-1">Add New Gallery Photo</h3>
            <p class="text-xs text-slate-400 mb-5">Upload high-resolution photography of completed or upcoming projects.</p>

            <form method="POST" action="{{ route('admin.gallery.store') }}" enctype="multipart/form-data" class="space-y-4">
                @csrf

                <div>
                    <label class="block text-xs font-semibold text-slate-300 mb-1">Photo Title *</label>
                    <input type="text" name="title" required placeholder="e.g. Master Chef Organic Kitchen" class="w-full text-xs px-3.5 py-2.5 bg-slate-950 border border-slate-800 rounded-xl text-white focus:outline-none focus:ring-1 focus:ring-emerald-500">
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-300 mb-1">Category *</label>
                    <select name="category" required class="w-full text-xs px-3.5 py-2.5 bg-slate-950 border border-slate-800 rounded-xl text-white focus:outline-none">
                        <option value="villas">Luxury Villas</option>
                        <option value="eco_homes">Eco-Friendly Living</option>
                        <option value="exterior">Exterior & Architecture</option>
                        <option value="interior">Interiors & Kitchens</option>
                        <option value="plots">Gated Land & Plots</option>
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-300 mb-1">Location / Project</label>
                    <input type="text" name="location" placeholder="e.g. Pine Ridge, Sector 65" class="w-full text-xs px-3.5 py-2.5 bg-slate-950 border border-slate-800 rounded-xl text-white focus:outline-none">
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-300 mb-1">Upload Photo File</label>
                    <input type="file" name="image_file" accept="image/*" class="w-full text-xs text-slate-400 file:mr-3 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-bold file:bg-emerald-950 file:text-emerald-300">
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-300 mb-1">Or Photo URL</label>
                    <input type="text" name="image_url" placeholder="https://images.unsplash.com/..." class="w-full text-xs px-3.5 py-2.5 bg-slate-950 border border-slate-800 rounded-xl text-white focus:outline-none">
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-300 mb-1">Description</label>
                    <textarea name="description" rows="2" placeholder="Brief note on materials or architecture..." class="w-full text-xs px-3.5 py-2 bg-slate-950 border border-slate-800 rounded-xl text-white focus:outline-none"></textarea>
                </div>

                <button type="submit" class="w-full py-2.5 bg-brand-primary hover:bg-brand-dark text-white font-bold rounded-xl text-xs transition shadow">
                    Upload & Add to Gallery
                </button>
            </form>
        </div>

        <!-- Gallery Items List (Cols 2 & 3) -->
        <div class="lg:col-span-2 space-y-4">
            <div class="flex items-center justify-between">
                <h3 class="text-base font-bold text-white">Active Gallery Assets ({{ $items->total() }})</h3>
                <a href="{{ route('gallery.index') }}" target="_blank" class="text-xs text-emerald-400 hover:underline">
                    View Public Gallery &rarr;
                </a>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                @foreach($items as $item)
                    <div class="bg-slate-900 border border-slate-800 rounded-2xl overflow-hidden shadow-sm flex flex-col justify-between group">
                        <div class="relative h-44 bg-slate-950 overflow-hidden">
                            <img src="{{ $item->image_url }}" alt="{{ $item->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                            <span class="absolute top-2 left-2 bg-slate-950/80 backdrop-blur-sm text-emerald-400 text-[10px] font-bold px-2 py-0.5 rounded uppercase">
                                {{ ucfirst(str_replace('_', ' ', $item->category)) }}
                            </span>
                        </div>

                        <div class="p-4 flex-grow flex flex-col justify-between">
                            <div>
                                <h4 class="font-bold text-white text-xs line-clamp-1">{{ $item->title }}</h4>
                                @if($item->location)
                                    <div class="text-[10px] text-slate-400 mt-0.5">📍 {{ $item->location }}</div>
                                @endif
                                @if($item->description)
                                    <p class="text-[11px] text-slate-500 mt-1 line-clamp-2">{{ $item->description }}</p>
                                @endif
                            </div>

                            <div class="pt-3 mt-3 border-t border-slate-800 flex justify-end">
                                <form method="POST" action="{{ route('admin.gallery.destroy', $item->id) }}" onsubmit="return confirm('Delete this gallery item?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-rose-400 hover:text-rose-300 text-xs font-semibold">
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
