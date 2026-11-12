@extends('layouts.app')

@section('title', 'Create Account | ' . ($siteSettings['brand_name'] ?? 'RealEstate'))

@section('content')

    <div class="min-h-[70vh] flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-3xl shadow-xl overflow-hidden max-w-lg w-full border border-slate-200 p-8 sm:p-10">
            
            <div class="text-center mb-6">
                <span class="text-xs font-bold uppercase tracking-wider text-emerald-700 bg-emerald-100 px-3 py-1 rounded-full">
                    Join RealEstate
                </span>
                <h2 class="text-2xl font-black text-slate-900 mt-2">Create Your Account</h2>
                <p class="text-xs text-slate-500 mt-1">Access verified eco-friendly homes, private tours, and post your property.</p>
            </div>

            <form method="POST" action="{{ route('register.post') }}" class="space-y-4">
                @csrf

                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1">Full Name *</label>
                    <input type="text" name="name" value="{{ old('name') }}" required autofocus placeholder="Ramesh Sharma" class="w-full text-xs sm:text-sm px-3.5 py-2.5 bg-slate-50 border border-slate-300 rounded-xl focus:bg-white focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                    @error('name')
                        <p class="text-xs text-rose-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1">Email Address *</label>
                    <input type="email" name="email" value="{{ old('email') }}" required placeholder="ramesh@example.com" class="w-full text-xs sm:text-sm px-3.5 py-2.5 bg-slate-50 border border-slate-300 rounded-xl focus:bg-white focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                    @error('email')
                        <p class="text-xs text-rose-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1">Phone Number</label>
                    <input type="tel" name="phone" value="{{ old('phone') }}" placeholder="+91 98765 43210" class="w-full text-xs sm:text-sm px-3.5 py-2.5 bg-slate-50 border border-slate-300 rounded-xl focus:bg-white focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1">Password *</label>
                        <input type="password" name="password" required placeholder="••••••••" class="w-full text-xs sm:text-sm px-3.5 py-2.5 bg-slate-50 border border-slate-300 rounded-xl focus:bg-white focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                        @error('password')
                            <p class="text-xs text-rose-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1">Confirm Password *</label>
                        <input type="password" name="password_confirmation" required placeholder="••••••••" class="w-full text-xs sm:text-sm px-3.5 py-2.5 bg-slate-50 border border-slate-300 rounded-xl focus:bg-white focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                    </div>
                </div>

                <button type="submit" class="w-full py-3 bg-brand-primary hover:bg-brand-dark text-white font-bold rounded-xl text-xs sm:text-sm transition shadow-md mt-2">
                    Create Account
                </button>
            </form>

            <div class="mt-6 text-center text-xs text-slate-500">
                Already have an account? 
                <a href="{{ route('login') }}" class="font-bold text-brand-primary hover:underline">
                    Sign in here
                </a>
            </div>

        </div>
    </div>

@endsection

