@extends('admin.layouts.admin')

@section('title', 'Manage Inquiries & Leads')
@section('header_title', 'Client Inquiries & Visit Requests')

@section('content')

    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 mb-6">
        <div>
            <h3 class="text-xl font-black text-slate-900">Leads & Inquiries</h3>
            <p class="text-xs text-slate-500">Total of {{ $inquiries->total() }} customer inquiries received</p>
        </div>

        <div class="flex items-center space-x-2">
            <a href="{{ route('admin.inquiries.index') }}" class="px-3.5 py-1.5 rounded-xl text-xs font-bold transition {{ !request('status') || request('status') == 'all' ? 'bg-slate-900 text-white shadow-xs' : 'bg-white text-slate-600 hover:text-slate-900 border border-slate-200' }}">
                All ({{ \App\Models\Inquiry::count() }})
            </a>
            <a href="{{ route('admin.inquiries.index', ['status' => 'new']) }}" class="px-3.5 py-1.5 rounded-xl text-xs font-bold transition {{ request('status') == 'new' ? 'bg-rose-600 text-white shadow-xs' : 'bg-white text-rose-700 hover:bg-rose-50 border border-rose-200' }}">
                New Leads ({{ \App\Models\Inquiry::where('status', 'new')->count() }})
            </a>
            <a href="{{ route('admin.inquiries.index', ['status' => 'contacted']) }}" class="px-3.5 py-1.5 rounded-xl text-xs font-bold transition {{ request('status') == 'contacted' ? 'bg-blue-600 text-white shadow-xs' : 'bg-white text-blue-700 hover:bg-blue-50 border border-blue-200' }}">
                Contacted
            </a>
            <a href="{{ route('admin.inquiries.index', ['status' => 'closed']) }}" class="px-3.5 py-1.5 rounded-xl text-xs font-bold transition {{ request('status') == 'closed' ? 'bg-slate-700 text-white shadow-xs' : 'bg-white text-slate-600 hover:bg-slate-100 border border-slate-200' }}">
                Closed
            </a>
        </div>
    </div>

    <!-- Inquiries Cards -->
    <div class="space-y-4">
        @forelse($inquiries as $inq)
            <div class="bg-white border border-slate-200/80 rounded-3xl p-6 shadow-xs space-y-4 hover:border-slate-300 transition duration-150">
                
                <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3 border-b border-slate-100 pb-4">
                    <div class="flex items-center space-x-3.5">
                        <span class="w-10 h-10 rounded-2xl bg-emerald-100 text-emerald-800 flex items-center justify-center font-black text-sm shadow-inner">
                            {{ strtoupper(substr($inq->name, 0, 1)) }}
                        </span>
                        <div>
                            <div class="font-black text-slate-900 text-base">{{ $inq->name }}</div>
                            <div class="text-xs text-slate-500 flex flex-wrap items-center gap-2 mt-0.5">
                                <a href="tel:{{ $inq->phone }}" class="font-bold text-emerald-700 hover:underline">📞 {{ $inq->phone }}</a>
                                <span>&bull;</span>
                                <a href="mailto:{{ $inq->email }}" class="text-slate-600 hover:text-slate-900">✉️ {{ $inq->email }}</a>
                                <span>&bull;</span>
                                <span class="text-slate-400">{{ $inq->created_at->format('d M Y, h:i A') }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center space-x-2">
                        <span class="text-[10px] font-extrabold uppercase tracking-wider px-3 py-1 rounded-full border {{ $inq->status === 'new' ? 'bg-rose-50 text-rose-700 border-rose-200' : ($inq->status === 'contacted' ? 'bg-blue-50 text-blue-700 border-blue-200' : 'bg-slate-100 text-slate-600 border-slate-200') }}">
                            {{ $inq->status }}
                        </span>

                        <span class="text-[11px] bg-slate-100 text-slate-700 font-semibold px-2.5 py-1 rounded-md border border-slate-200">
                            {{ ucfirst(str_replace('_', ' ', $inq->inquiry_type)) }}
                        </span>
                    </div>
                </div>

                <!-- Subject & Message -->
                <div class="bg-slate-50/70 p-4 rounded-2xl border border-slate-200/70 text-xs text-slate-700 space-y-1">
                    @if($inq->subject)
                        <div class="font-bold text-slate-900 mb-1">Subject: {{ $inq->subject }}</div>
                    @endif
                    <p class="leading-relaxed whitespace-pre-line">{{ $inq->message }}</p>
                    @if($inq->property)
                        <div class="pt-2.5 mt-2.5 border-t border-slate-200 text-[11px] text-emerald-800">
                            Referenced Property: <a href="{{ route('properties.show', $inq->property->slug) }}" target="_blank" class="font-bold underline text-emerald-700">{{ $inq->property->title }}</a> ({{ $inq->property->price_display }})
                        </div>
                    @endif
                </div>

                <!-- Admin Action Row -->
                <div class="flex flex-col sm:flex-row items-stretch sm:items-center justify-between gap-3 pt-2">
                    <form method="POST" action="{{ route('admin.inquiries.status', $inq->id) }}" class="flex flex-wrap items-center gap-2">
                        @csrf
                        @method('PATCH')
                        <label class="text-[11px] text-slate-500 font-bold">Status:</label>
                        <select name="status" class="text-xs px-2.5 py-1.5 bg-white border border-slate-300 rounded-lg text-slate-800 focus:outline-none">
                            <option value="new" {{ $inq->status === 'new' ? 'selected' : '' }}>New</option>
                            <option value="contacted" {{ $inq->status === 'contacted' ? 'selected' : '' }}>Contacted</option>
                            <option value="closed" {{ $inq->status === 'closed' ? 'selected' : '' }}>Closed</option>
                        </select>
                        <input type="text" name="admin_notes" value="{{ $inq->admin_notes }}" placeholder="Add private note..." class="text-xs px-3 py-1.5 bg-white border border-slate-300 rounded-lg text-slate-800 w-48 focus:outline-none">
                        <button type="submit" class="px-3.5 py-1.5 bg-slate-900 hover:bg-slate-800 text-white rounded-lg text-xs font-bold transition shadow-xs">
                            Update
                        </button>
                    </form>

                    <div class="flex items-center space-x-2">
                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $inq->phone) }}?text=Hello%20{{ urlencode($inq->name) }},%20thank%20you%20for%20contacting%20us%20regarding%20your%20property%20requirement." target="_blank" class="px-3.5 py-1.5 bg-[#25D366] hover:bg-[#20ba59] text-white rounded-lg text-xs font-bold transition flex items-center space-x-1.5 shadow-xs">
                            <span>💬 WhatsApp Client</span>
                        </a>

                        <form method="POST" action="{{ route('admin.inquiries.destroy', $inq->id) }}" onsubmit="return confirm('Are you sure you want to delete this inquiry?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-3 py-1.5 bg-rose-50 text-rose-600 hover:bg-rose-100 rounded-lg text-xs font-bold transition border border-rose-200">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        @empty
            <div class="bg-white border border-slate-200/80 rounded-3xl p-12 text-center text-slate-400 text-xs shadow-xs">
                <div class="text-3xl mb-2">📬</div>
                <p class="font-bold text-slate-700">No inquiries found in this category.</p>
            </div>
        @endforelse

        <div class="pt-4">
            {{ $inquiries->links() }}
        </div>
    </div>

@endsection
