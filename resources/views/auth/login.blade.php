@extends('layouts.app')

@section('title', 'Sign In | ' . ($siteSettings['brand_name'] ?? 'AG HOMES INDIA'))

@section('content')

    @php
        $authBg = isset($siteImages['auth_bg']) ? $siteImages['auth_bg']->url : 'https://images.unsplash.com/photo-1600607687920-4e2a09cf159d?auto=format&fit=crop&w=1200&q=80';
    @endphp

    <div class="min-h-[70vh] flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-3xl shadow-xl overflow-hidden max-w-4xl w-full border border-slate-200 grid grid-cols-1 md:grid-cols-2">
            
            <!-- Left: Visual Column -->
            <div class="hidden md:flex flex-col justify-between p-10 bg-slate-900 text-white bg-cover bg-center relative"
                 style="background-image: linear-gradient(to top, rgba(15, 23, 42, 0.90), rgba(15, 23, 42, 0.40)), url('{{ $authBg }}');">
                <div>
                    <span class="text-xs font-bold uppercase tracking-wider text-emerald-400 bg-emerald-950/80 px-3 py-1 rounded-full border border-emerald-500/40">
                        Client Portal
                    </span>
                    <h3 class="text-2xl font-black mt-3">Welcome to Sustainable Luxury</h3>
                    <p class="text-xs text-slate-300 mt-2 leading-relaxed">
                        Sign in to track your saved properties, check inspection schedules, and manage your property inquiries.
                    </p>
                </div>

                <div class="border-t border-white/20 pt-4 text-xs text-slate-400">
                    Looking for administrative login? <a href="{{ route('admin.login') }}" class="text-emerald-400 font-bold hover:underline">Click here for Admin Portal &rarr;</a>
                </div>
            </div>

            <!-- Right: Login Form -->
            <div class="p-8 sm:p-10 flex flex-col justify-center">
                <div class="mb-6">
                    <h2 class="text-2xl font-black text-slate-900">Sign In to Your Account</h2>
                    <p class="text-xs text-slate-500 mt-1">Enter your credentials to continue</p>
                </div>

                <form method="POST" action="{{ route('login.post') }}" class="space-y-4">
                    @csrf

                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1">Email Address</label>
                        <input type="email" name="email" value="{{ old('email') }}" required autofocus placeholder="name@example.com" class="w-full text-xs sm:text-sm px-3.5 py-2.5 bg-slate-50 border border-slate-300 rounded-xl focus:bg-white focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                        @error('email')
                            <p class="text-xs text-rose-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <div class="flex justify-between items-center mb-1">
                            <label class="block text-xs font-semibold text-slate-700">Password</label>
                        </div>
                        <input type="password" name="password" required placeholder="••••••••" class="w-full text-xs sm:text-sm px-3.5 py-2.5 bg-slate-50 border border-slate-300 rounded-xl focus:bg-white focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                    </div>

                    <div class="flex items-center justify-between text-xs">
                        <label class="flex items-center space-x-2 text-slate-600">
                            <input type="checkbox" name="remember" class="rounded text-emerald-600 focus:ring-emerald-500">
                            <span>Remember me</span>
                        </label>
                    </div>

                    <button type="submit" class="w-full py-3 bg-brand-primary hover:bg-brand-dark text-white font-bold rounded-xl text-xs sm:text-sm transition shadow-md">
                        Sign In
                    </button>
                </form>

                <div class="mt-6 text-center text-xs text-slate-500">
                    Don't have an account? 
                    <a href="{{ route('register') }}" class="font-bold text-brand-primary hover:underline">
                        Create an account
                    </a>
                </div>
            </div>

        </div>
    </div>

@endsection
