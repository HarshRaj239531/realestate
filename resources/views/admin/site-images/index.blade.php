@extends('admin.layouts.admin')

@section('title', 'Manage Site Images & Banners')
@section('header_title', 'Site Images & Visual Assets Manager')

@section('content')

    <div class="mb-8 max-w-3xl">
        <h3 class="text-xl font-black text-white">Universal Site Image Management</h3>
        <p class="text-xs text-slate-400 mt-1">
            Change any visual element across the website directly from here. You can either upload an image from your computer or provide a hosted URL (e.g. Unsplash, Cloudinary, AWS S3).
        </p>
    </div>

    <!-- Images Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        @foreach($images as $img)
            <div class="bg-slate-900 border border-slate-800 rounded-3xl p-6 shadow-sm flex flex-col justify-between">
                
                <div>
                    <!-- Header -->
                    <div class="flex items-start justify-between gap-2 mb-3">
                        <div>
                            <span class="text-[10px] font-mono font-bold uppercase tracking-wider text-emerald-400 bg-emerald-950 px-2 py-0.5 rounded border border-emerald-800">
                                {{ $img->section_key }}
                            </span>
                            <h4 class="text-base font-extrabold text-white mt-1.5">{{ $img->title }}</h4>
                        </div>
                    </div>

                    <p class="text-xs text-slate-400 mb-4 leading-relaxed">
                        {{ $img->description }}
                    </p>

                    <!-- Current Image Preview -->
                    <div class="rounded-2xl overflow-hidden h-48 bg-slate-950 border border-slate-800 relative mb-4 flex items-center justify-center">
                        <img src="{{ $img->url }}" alt="{{ $img->title }}" class="w-full h-full object-cover">
                        <div class="absolute bottom-2 left-2 bg-slate-950/80 backdrop-blur-sm text-[10px] font-semibold text-slate-300 px-2.5 py-1 rounded">
                            Active Visual
                        </div>
                    </div>
                </div>

                <!-- Update Form -->
                <form method="POST" action="{{ route('admin.site-images.update', $img->id) }}" enctype="multipart/form-data" class="space-y-3 pt-3 border-t border-slate-800/80">
                    @csrf

                    <div>
                        <label class="block text-[11px] font-semibold text-slate-300 mb-1">Upload New Image File (From Computer)</label>
                        <input type="file" name="image_file" accept="image/*" class="w-full text-xs text-slate-400 file:mr-3 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-bold file:bg-emerald-950 file:text-emerald-300 hover:file:bg-emerald-900">
                    </div>

                    <div>
                        <label class="block text-[11px] font-semibold text-slate-300 mb-1">Or Enter Direct Image URL</label>
                        <input type="text" name="image_url" placeholder="https://images.unsplash.com/..." class="w-full text-xs px-3 py-2 bg-slate-950 border border-slate-800 rounded-xl text-white focus:ring-1 focus:ring-emerald-500 focus:outline-none">
                    </div>

                    <div class="flex items-center space-x-2 pt-2">
                        <button type="submit" class="flex-grow py-2.5 bg-brand-primary hover:bg-brand-dark text-white font-bold rounded-xl text-xs transition shadow">
                            Save & Update Visual
                        </button>

                        <button type="submit" name="reset_to_default" value="1" onclick="return confirm('Reset this image to its default visual?')" class="px-3 py-2.5 bg-slate-800 hover:bg-slate-700 text-slate-300 font-semibold rounded-xl text-xs transition" title="Reset to original default">
                            Reset
                        </button>
                    </div>
                </form>

            </div>
        @endforeach
    </div>

@endsection

