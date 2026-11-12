@extends('admin.layouts.admin')

@section('title', 'Manage Inquiries & Leads')
@section('header_title', 'Client Inquiries & Visit Requests')

@section('content')

    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 mb-6">
        <div>
            <h3 class="text-xl font-black text-white">Leads & Inquiries</h3>
            <p class="text-xs text-slate-400">Total of {{ $inquiries->total() }} customer inquiries received</p>
        </div>

        <div class="flex items-center space-x-2">
            <a href="{{ route('admin.inquiries.index') }}" class="px-3 py-1.5 rounded-lg text-xs font-semibold {{ !request('status') || request('status') == 'all' ? 'bg-brand-primary text-white' : 'bg-slate-800 text-slate-400 hover:text-white' }}">
                All
            </a>
            <a href="{{ route('admin.inquiries.index', ['status' => 'new']) }}" class="px-3 py-1.5 rounded-lg text-xs font-semibold {{ request('status') == 'new' ? 'bg-rose-600 text-white' : 'bg-slate-800 text-slate-400 hover:text-white' }}">
                New Leads
            </a>
            <a href="{{ route('admin.inquiries.index', ['status' => 'contacted']) }}" class="px-3 py-1.5 rounded-lg text-xs font-semibold {{ request('status') == 'contacted' ? 'bg-blue-600 text-white' : 'bg-slate-800 text-slate-400 hover:text-white' }}">
                Contacted
            </a>
            <a href="{{ route('admin.inquiries.index', ['status' => 'closed']) }}" class="px-3 py-1.5 rounded-lg text-xs font-semibold {{ request('status') == 'closed' ? 'bg-slate-700 text-white' : 'bg-slate-800 text-slate-400 hover:text-white' }}">
                Closed
            </a>
        </div>
    </div>

    <!-- Inquiries Cards / Table -->
    <div class="space-y-4">
        @forelse($inquiries as $inq)
            <div class="bg-slate-900 border border-slate-800 rounded-2xl p-6 shadow-sm space-y-4">
                
                <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-2 border-b border-slate-800 pb-3">
                    <div class="flex items-center space-x-3">
                        <span class="w-9 h-9 rounded-full bg-slate-800 text-emerald-400 flex items-center justify-center font-bold text-sm">
                            {{ substr($inq->name, 0, 1) }}
                        </span>
                        <div>
                            <div class="font-bold text-white text-sm">{{ $inq->name }}</div>
                            <div class="text-xs text-slate-400 flex flex-wrap items-center gap-2 mt-0.5">
                                <a href="tel:{{ $inq->phone }}" class="text-emerald-400 hover:underline">📞 {{ $inq->phone }}</a>
                                <span>&bull;</span>
                                <a href="mailto:{{ $inq->email }}" class="hover:text-white">✉️ {{ $inq->email }}</a>
                                <span>&bull;</span>
                                <span>{{ $inq->created_at->format('d M Y, h:i A') }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center space-x-2">
                        <span class="text-[10px] font-bold uppercase tracking-wider px-2.5 py-1 rounded-full border {{ $inq->status === 'new' ? 'bg-rose-950 text-rose-300 border-rose-800' : ($inq->status === 'contacted' ? 'bg-blue-950 text-blue-300 border-blue-800' : 'bg-slate-800 text-slate-400 border-slate-700') }}">
                            {{ $inq->status }}
                        </span>

                        <span class="text-[10px] bg-slate-800 text-slate-300 px-2 py-1 rounded">
                            {{ ucfirst(str_replace('_', ' ', $inq->inquiry_type)) }}
                        </span>
                    </div>
                </div>

                <!-- Subject & Message -->
                <div class="bg-slate-950/70 p-4 rounded-xl border border-slate-800/80 text-xs text-slate-300 space-y-1">
                    @if($inq->subject)
                        <div class="font-bold text-white mb-1">Subject: {{ $inq->subject }}</div>
                    @endif
                    <p class="leading-relaxed">{{ $inq->message }}</p>
                    @if($inq->property)
                        <div class="pt-2 mt-2 border-t border-slate-800 text-[11px] text-emerald-400">
                            Referenced Property: <a href="{{ route('properties.show', $inq->property->slug) }}" target="_blank" class="font-bold underline">{{ $inq->property->title }}</a> ({{ $inq->property->price_display }})
                        </div>
                    @endif
                </div>

                <!-- Admin Action Row -->
                <div class="flex flex-col sm:flex-row items-stretch sm:items-center justify-between gap-3 pt-2">
                    <form method="POST" action="{{ route('admin.inquiries.status', $inq->id) }}" class="flex flex-wrap items-center gap-2">
                        @csrf
                        @method('PATCH')
                        <label class="text-[11px] text-slate-400 font-semibold">Update Status:</label>
                        <select name="status" class="text-xs px-2.5 py-1.5 bg-slate-950 border border-slate-800 rounded-lg text-white">
                            <option value="new" {{ $inq->status === 'new' ? 'selected' : '' }}>New</option>
                            <option value="contacted" {{ $inq->status === 'contacted' ? 'selected' : '' }}>Contacted</option>
                            <option value="closed" {{ $inq->status === 'closed' ? 'selected' : '' }}>Closed</option>
                        </select>
                        <input type="text" name="admin_notes" value="{{ $inq->admin_notes }}" placeholder="Add quick note..." class="text-xs px-3 py-1.5 bg-slate-950 border border-slate-800 rounded-lg text-white w-48">
                        <button type="submit" class="px-3 py-1.5 bg-slate-800 hover:bg-slate-700 text-white rounded-lg text-xs font-semibold">
                            Save Status
                        </button>
                    </form>

                    <div class="flex items-center space-x-2">
                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $inq->phone) }}?text=Hello%20{{ urlencode($inq->name) }},%20thank%20you%20for%20contacting%20AG%20Homes." target="_blank" class="px-3 py-1.5 bg-[#25D366]/20 text-[#25D366] hover:bg-[#25D366] hover:text-white rounded-lg text-xs font-bold transition flex items-center space-x-1">
                            <span>WhatsApp Client</span>
                        </a>

                        <form method="POST" action="{{ route('admin.inquiries.destroy', $inq->id) }}" onsubmit="return confirm('Delete this inquiry?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-3 py-1.5 bg-rose-950/40 text-rose-400 hover:bg-rose-900 hover:text-white rounded-lg text-xs font-semibold transition">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        @empty
            <div class="bg-slate-900 border border-slate-800 rounded-2xl p-12 text-center text-slate-500 text-xs">
                No inquiries match your current filter.
            </div>
        @endforelse

        <div class="pt-4">
            {{ $inquiries->links() }}
        </div>
    </div>

@endsection

