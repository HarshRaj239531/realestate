<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-slate-50">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Authentication | {{ $siteSettings['brand_name'] ?? 'RealEstate' }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:wght@400..700&display=swap" rel="stylesheet">

    <style>
        :root {
            --brand-primary: {{ $siteSettings['brand_primary_color'] ?? '#2f9049' }};
            --brand-primary-dark: {{ $siteSettings['brand_primary_dark'] ?? '#236c37' }};
        }
    </style>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-full bg-slate-50 text-slate-800 font-sans flex items-center justify-center p-4">

    <div class="max-w-md w-full space-y-6">
        
        <!-- Brand Header -->
        <div class="text-center space-y-2">
            <div class="inline-flex p-3 bg-white rounded-2xl shadow-sm border border-slate-200">
                @php
                    $logoUrl = isset($siteImages['site_logo']) ? $siteImages['site_logo']->url : asset('images/site/logo.svg');
                @endphp
                <img src="{{ $logoUrl }}" alt="Logo" class="h-10 w-auto">
            </div>
            <h1 class="text-2xl font-black text-slate-900 tracking-tight">Admin Control Center</h1>
            <p class="text-xs text-slate-500">Secure Administrative Authentication Portal</p>
        </div>

        <!-- Flash Alert -->
        @if (session('error'))
            <div class="bg-rose-50 border border-rose-200 text-rose-800 text-xs p-3.5 rounded-xl shadow-xs">
                {{ session('error') }}
            </div>
        @endif
        @if (session('warning'))
            <div class="bg-amber-50 border border-amber-200 text-amber-800 text-xs p-3.5 rounded-xl shadow-xs">
                {{ session('warning') }}
            </div>
        @endif
        @if (session('info'))
            <div class="bg-blue-50 border border-blue-200 text-blue-800 text-xs p-3.5 rounded-xl shadow-xs">
                {{ session('info') }}
            </div>
        @endif

        <!-- Card Container -->
        <div class="bg-white border border-slate-200/80 rounded-3xl p-8 shadow-xl space-y-5">
            
            <!-- Quick Demo Credential Badge -->
            <div class="bg-emerald-50 border border-emerald-200 rounded-2xl p-3.5 text-xs text-emerald-900">
                <div class="font-extrabold text-emerald-800 flex items-center space-x-1">
                    <span>🔑 Default Credentials:</span>
                </div>
                <div class="mt-1 font-mono text-[11px] text-slate-600">
                    Email: <span class="text-emerald-900 font-bold select-all">admin@realestate.com</span><br>
                    Password: <span class="text-emerald-900 font-bold select-all">admin123</span>
                </div>
            </div>

            <form method="POST" action="{{ route('admin.login.post') }}" class="space-y-4">
                @csrf

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Administrative Email</label>
                    <input type="email" name="email" value="{{ old('email', 'admin@realestate.com') }}" required autofocus class="w-full text-xs sm:text-sm px-3.5 py-2.5 bg-slate-50 border border-slate-300 rounded-xl text-slate-800 focus:bg-white focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                    @error('email')
                        <p class="text-xs text-rose-600 mt-1 font-semibold">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Security Password</label>
                    <input type="password" name="password" value="admin123" required class="w-full text-xs sm:text-sm px-3.5 py-2.5 bg-slate-50 border border-slate-300 rounded-xl text-slate-800 focus:bg-white focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                    @error('password')
                        <p class="text-xs text-rose-600 mt-1 font-semibold">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-between text-xs text-slate-500">
                    <label class="flex items-center space-x-2 cursor-pointer">
                        <input type="checkbox" name="remember" checked class="rounded text-emerald-600 focus:ring-emerald-500 border-slate-300">
                        <span>Keep me logged in</span>
                    </label>
                </div>

                <button type="submit" class="w-full py-3.5 bg-brand-primary hover:bg-brand-dark text-white font-extrabold rounded-xl text-xs sm:text-sm transition shadow-sm shadow-emerald-600/20">
                    Authorize & Access Dashboard
                </button>
            </form>
        </div>

        <div class="text-center text-xs text-slate-500">
            <a href="{{ route('home') }}" class="hover:text-emerald-700 font-bold transition">&larr; Return to Public Website</a>
        </div>

    </div>

</body>
</html>
