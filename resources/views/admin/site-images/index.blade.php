@extends('admin.layouts.admin')

@section('title', 'Manage Site Images & Banners')
@section('header_title', 'Site Images & Visual Assets Manager')

@section('content')

    <div class="mb-8 max-w-3xl">
        <h3 class="text-xl font-black text-slate-900">Universal Site Image Management</h3>
        <p class="text-xs text-slate-500 mt-1 leading-relaxed">
            Change any visual banner across the website directly from here. You can either upload a local image file from your computer or provide a direct image URL (e.g. Unsplash, Cloudinary, AWS S3).
        </p>
    </div>

    <!-- Images Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        @foreach($images as $img)
            <div class="bg-white border border-slate-200/80 rounded-3xl p-6 shadow-xs flex flex-col justify-between hover:border-slate-300 transition duration-150">
                
                <div>
                    <!-- Header -->
                    <div class="flex items-start justify-between gap-2 mb-3">
                        <div>
                            <span class="text-[10px] font-mono font-extrabold uppercase tracking-wider text-emerald-800 bg-emerald-50 px-2.5 py-1 rounded-md border border-emerald-200">
                                {{ $img->section_key }}
                            </span>
                            <h4 class="text-base font-black text-slate-900 mt-2">{{ $img->title }}</h4>
                        </div>
                    </div>

                    <p class="text-xs text-slate-500 mb-4 leading-relaxed">
                        {{ $img->description }}
                    </p>

                    <!-- Current Image Preview -->
                    <div class="rounded-2xl overflow-hidden h-52 bg-slate-100 border border-slate-200 relative mb-4 flex items-center justify-center">
                        <img src="{{ $img->url }}" alt="{{ $img->title }}" class="w-full h-full object-cover">
                        <div class="absolute bottom-2.5 left-2.5 bg-slate-900/80 backdrop-blur-sm text-[10px] font-bold text-white px-2.5 py-1 rounded-md shadow-xs">
                            Active Live Banner
                        </div>
                    </div>
                </div>

                <!-- Update Form -->
                <form method="POST" action="{{ route('admin.site-images.update', $img->id) }}" enctype="multipart/form-data" class="space-y-3 pt-3 border-t border-slate-100">
                    @csrf

                    <div>
                        <label class="block text-[11px] font-bold text-slate-700 mb-1">Upload New Image File (From Computer)</label>
                        <input type="file" name="image_file" accept="image/*" class="w-full text-xs text-slate-500 file:mr-3 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-bold file:bg-emerald-50 file:text-emerald-700 hover:file:bg-emerald-100">
                    </div>

                    <div>
                        <label class="block text-[11px] font-bold text-slate-700 mb-1">Or Enter Direct Image URL</label>
                        <input type="text" name="image_url" placeholder="https://images.unsplash.com/..." class="w-full text-xs px-3.5 py-2.5 bg-slate-50 border border-slate-300 rounded-xl text-slate-800 focus:bg-white focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                    </div>

                    <div class="flex items-center space-x-2 pt-2">
                        <button type="submit" class="flex-grow py-2.5 bg-brand-primary hover:bg-brand-dark text-white font-extrabold rounded-xl text-xs transition shadow-sm shadow-emerald-600/20">
                            Save & Update Banner
                        </button>

                        <button type="submit" name="reset_to_default" value="1" onclick="return confirm('Reset this image to its original default visual?')" class="px-3.5 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-600 font-bold rounded-xl text-xs transition border border-slate-200" title="Reset to original default">
                            Reset
                        </button>
                    </div>
                </form>

            </div>
        @endforeach
    </div>

@endsection
