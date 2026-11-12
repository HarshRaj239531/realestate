@extends('layouts.app')

@section('title', 'Architecture & Project Gallery | ' . ($siteSettings['brand_name'] ?? 'RealEstate'))
@section('meta_description', 'High-definition photo gallery of our sustainable luxury villas, biophilic architecture, green landscapes, and interior craftsmanship.')

@section('content')

    <!-- Banner Header -->
    @php
        $galleryHero = isset($siteImages['gallery_hero']) ? $siteImages['gallery_hero']->url : 'https://images.unsplash.com/photo-1600565193348-f74bd3c7ccdf?auto=format&fit=crop&w=1600&q=80';
    @endphp
    <div class="relative py-16 sm:py-24 bg-slate-900 bg-cover bg-center overflow-hidden" 
         style="background-image: linear-gradient(to right, rgba(15, 23, 42, 0.90), rgba(15, 23, 42, 0.70)), url('{{ $galleryHero }}');">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white relative z-10" data-motion="fade-up">
            <span class="text-xs font-bold uppercase tracking-widest text-emerald-400 bg-emerald-950/70 border border-emerald-500/30 px-3.5 py-1.5 rounded-full">
                Visual Portfolio
            </span>
            <h1 class="text-3xl sm:text-5xl font-black text-white mt-3 tracking-tight">
                Project & Architectural Gallery
            </h1>
            <p class="text-slate-300 text-sm sm:text-base max-w-xl mx-auto mt-2">
                A showcase of craftsmanship, biophilic architecture, and zero-carbon sustainable living spaces across our projects.
            </p>
        </div>
    </div>

    <!-- Category Filter Tabs -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <div class="flex flex-wrap items-center justify-center gap-2 mb-12" data-motion="fade-up">
            @foreach($categories as $key => $label)
                <a href="{{ route('gallery.index', ['category' => $key]) }}" 
                   class="px-5 py-2.5 rounded-full text-xs font-bold transition shadow-sm {{ $category === $key ? 'bg-brand-primary text-white shadow-emerald-600/20' : 'bg-white text-slate-700 hover:bg-slate-100 border border-slate-200' }}">
                    {{ $label }}
                </a>
            @endforeach
        </div>

        <!-- Gallery Grid -->
        @if($items->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6" data-motion-stagger>
                @foreach($items as $item)
                    <div class="group relative rounded-2xl overflow-hidden shadow-md h-80 bg-slate-900 cursor-pointer border border-slate-200"
                         onclick="openLightbox('{{ $item->image_url }}', '{{ addslashes($item->title) }}', '{{ addslashes($item->description ?? '') }}', '{{ addslashes($item->location ?? '') }}')">
                        
                        <img src="{{ $item->image_url }}" alt="{{ $item->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500 opacity-90 group-hover:opacity-100">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950/85 via-slate-950/20 to-transparent"></div>
                        
                        <!-- Top Category Badge -->
                        <div class="absolute top-4 left-4">
                            <span class="bg-emerald-600/90 text-white text-[11px] font-bold px-2.5 py-1 rounded-full uppercase tracking-wider backdrop-blur-sm">
                                {{ ucfirst(str_replace('_', ' ', $item->category)) }}
                            </span>
                        </div>

                        <!-- Zoom Icon on Hover -->
                        <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <span class="w-12 h-12 rounded-full bg-white/20 backdrop-blur-md text-white flex items-center justify-center text-xl shadow-lg">
                                🔍
                            </span>
                        </div>

                        <!-- Bottom Caption -->
                        <div class="absolute bottom-4 left-4 right-4 text-white">
                            <h3 class="font-extrabold text-base group-hover:text-emerald-300 transition line-clamp-1">
                                {{ $item->title }}
                            </h3>
                            @if($item->location)
                                <p class="text-xs text-slate-300 flex items-center space-x-1 mt-0.5">
                                    <span>📍</span>
                                    <span>{{ $item->location }}</span>
                                </p>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-12 flex justify-center">
                {{ $items->links() }}
            </div>
        @else
            <div class="bg-white rounded-2xl p-12 text-center border border-slate-200 shadow-sm max-w-lg mx-auto">
                <div class="text-4xl mb-3">🖼️</div>
                <h3 class="text-lg font-bold text-slate-800">No photos in this category yet</h3>
                <p class="text-xs text-slate-500 mt-1 mb-5">Please check other categories or return to all projects.</p>
                <a href="{{ route('gallery.index') }}" class="px-6 py-2.5 bg-brand-primary text-white text-xs font-bold rounded-xl shadow-md hover:bg-brand-dark transition">
                    View All Gallery Photos
                </a>
            </div>
        @endif
    </div>

    <!-- Lightbox Modal -->
    <div id="galleryLightbox" class="fixed inset-0 z-50 bg-black/90 backdrop-blur-md hidden items-center justify-center p-4">
        <button onclick="closeLightbox()" class="absolute top-6 right-6 text-white/70 hover:text-white text-3xl font-bold">&times;</button>
        <div class="max-w-4xl w-full text-center space-y-4">
            <div class="rounded-2xl overflow-hidden max-h-[75vh] flex items-center justify-center bg-black">
                <img id="lightboxImg" src="" alt="Gallery Preview" class="max-h-[75vh] w-auto max-w-full object-contain rounded-xl">
            </div>
            <div class="text-white text-left px-2">
                <h3 id="lightboxTitle" class="text-xl font-bold text-white"></h3>
                <p id="lightboxLocation" class="text-xs text-emerald-400 font-semibold"></p>
                <p id="lightboxDesc" class="text-xs text-slate-300 mt-1"></p>
            </div>
        </div>
    </div>

    <script>
        function openLightbox(url, title, desc, loc) {
            document.getElementById('lightboxImg').src = url;
            document.getElementById('lightboxTitle').innerText = title;
            document.getElementById('lightboxDesc').innerText = desc;
            document.getElementById('lightboxLocation').innerText = loc ? '📍 ' + loc : '';
            const modal = document.getElementById('galleryLightbox');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        function closeLightbox() {
            const modal = document.getElementById('galleryLightbox');
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }
    </script>

@endsection

