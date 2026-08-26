@extends('layouts.admin')

@section('title', 'Enquiry from ' . $enquiry->name)

@section('content')

    {{-- Breadcrumb --}}
    <div class="flex items-center gap-2 font-sans text-[12.5px] text-muted-grey mb-6">
        <a href="{{ route('admin.enquiries.index') }}"
           class="hover:text-primary-black transition-colors duration-150">Enquiries</a>
        <span class="text-border-grey">/</span>
        <span class="text-primary-black">{{ $enquiry->name }}</span>
    </div>

    @if (session('success'))
        <div class="mb-5 font-sans text-[13px] text-green-700
                    bg-green-50 border border-green-200 rounded px-4 py-3">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 xl:grid-cols-[1fr_280px] gap-5">

        {{-- ── Main: message ──────────────────────────────────────────────── --}}
        <div class="space-y-5">

            {{-- Header --}}
            <div class="bg-white border border-border-grey rounded-lg px-7 py-6">
                <div class="flex items-start justify-between gap-4">
                    <div>
                        <h2 class="font-serif text-[1.35rem] text-primary-black leading-tight">
                            {{ $enquiry->name }}
                        </h2>
                        <p class="font-sans text-[12.5px] text-muted-grey mt-1">
                            Received {{ $enquiry->created_at->format('l, d M Y') }}
                            at {{ $enquiry->created_at->format('g:ia') }}
                            · {{ $enquiry->created_at->diffForHumans() }}
                        </p>
                    </div>
                    <span class="inline-flex items-center font-sans text-[11px]
                                 font-medium border px-2.5 py-1 rounded-full shrink-0
                                 {{ $enquiry->statusColour() }}">
                        {{ $enquiry->statusLabel() }}
                    </span>
                </div>
            </div>

            {{-- Contact details --}}
            <div class="bg-white border border-border-grey rounded-lg px-7 py-6">
                <p class="font-sans text-[10.5px] uppercase tracking-[0.18em]
                           text-muted-grey mb-5">
                    Contact details
                </p>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">

                    <div>
                        <p class="font-sans text-[11px] text-muted-grey/60 mb-1">Name</p>
                        <p class="font-sans text-[14px] text-primary-black font-medium">{{ $enquiry->name }}</p>
                    </div>

                    <div>
                        <p class="font-sans text-[11px] text-muted-grey/60 mb-1">Email</p>
                        <a href="mailto:{{ $enquiry->email }}"
                           class="font-sans text-[14px] text-burgundy hover:underline underline-offset-2">
                            {{ $enquiry->email }}
                        </a>
                    </div>

                    @if ($enquiry->phone)
                        <div>
                            <p class="font-sans text-[11px] text-muted-grey/60 mb-1">Phone</p>
                            <a href="tel:{{ $enquiry->phone }}"
                               class="font-sans text-[14px] text-primary-black hover:text-burgundy
                                      transition-colors duration-150">
                                {{ $enquiry->phone }}
                            </a>
                        </div>
                    @endif

                    @if ($enquiry->company)
                        <div>
                            <p class="font-sans text-[11px] text-muted-grey/60 mb-1">Company / Organisation</p>
                            <p class="font-sans text-[14px] text-primary-black">{{ $enquiry->company }}</p>
                        </div>
                    @endif

                    @if ($enquiry->service_interest)
                        <div>
                            <p class="font-sans text-[11px] text-muted-grey/60 mb-1">Service interest</p>
                            <span class="font-sans text-[13px] text-muted-grey
                                         bg-border-grey/30 px-3 py-1 rounded">
                                {{ $enquiry->service_interest }}
                            </span>
                        </div>
                    @endif

                </div>
            </div>

            {{-- Message --}}
            <div class="bg-white border border-border-grey rounded-lg px-7 py-6">
                <p class="font-sans text-[10.5px] uppercase tracking-[0.18em]
                           text-muted-grey mb-5">
                    Message
                </p>
                <div class="font-sans text-[14.5px] text-primary-black leading-[1.85]
                             whitespace-pre-wrap">{{ $enquiry->message }}</div>
            </div>

            {{-- Quick reply CTA --}}
            <div class="bg-white border border-border-grey rounded-lg px-7 py-5
                         flex items-center justify-between gap-4">
                <p class="font-sans text-[13px] text-muted-grey">
                    Reply to this enquiry directly:
                </p>
                <a href="mailto:{{ $enquiry->email }}?subject=Re: Your enquiry via payaldasgupta.com"
                   class="inline-flex items-center gap-2 font-sans text-[13px] font-medium
                          bg-burgundy text-soft-white px-4 py-2.5 rounded
                          hover:bg-burgundy-dark transition-colors duration-200">
                    Reply by email →
                </a>
            </div>

        </div>

        {{-- ── Sidebar: actions ───────────────────────────────────────────── --}}
        <div class="space-y-4">

            {{-- Status update --}}
            <div class="bg-white border border-border-grey rounded-lg divide-y divide-border-grey">
                <div class="px-5 py-4">
                    <p class="font-sans text-[13px] font-semibold text-primary-black">Update status</p>
                </div>
                <div class="px-5 py-4">
                    <form method="POST"
                          action="{{ route('admin.enquiries.update', $enquiry) }}">
                        @csrf
                        @method('PATCH')
                        <select name="status" class="form-input mb-3"
                                onchange="this.form.submit()">
                            <option value="new"       {{ $enquiry->status === 'new'       ? 'selected' : '' }}>New</option>
                            <option value="read"      {{ $enquiry->status === 'read'      ? 'selected' : '' }}>Read</option>
                            <option value="responded" {{ $enquiry->status === 'responded' ? 'selected' : '' }}>Responded</option>
                        </select>
                    </form>
                </div>
            </div>

            {{-- Meta --}}
            <div class="bg-white border border-border-grey rounded-lg divide-y divide-border-grey">
                <div class="px-5 py-4">
                    <p class="font-sans text-[13px] font-semibold text-primary-black">Details</p>
                </div>
                <div class="px-5 py-4 space-y-3">
                    <div>
                        <p class="font-sans text-[10.5px] text-muted-grey/60 mb-0.5">Enquiry ID</p>
                        <p class="font-sans text-[12.5px] text-primary-black font-mono">#{{ str_pad($enquiry->id, 5, '0', STR_PAD_LEFT) }}</p>
                    </div>
                    <div>
                        <p class="font-sans text-[10.5px] text-muted-grey/60 mb-0.5">Submitted</p>
                        <p class="font-sans text-[12.5px] text-primary-black">{{ $enquiry->created_at->format('d M Y, g:ia') }}</p>
                    </div>
                    @if ($enquiry->ip_address)
                        <div>
                            <p class="font-sans text-[10.5px] text-muted-grey/60 mb-0.5">IP Address</p>
                            <p class="font-sans text-[12px] text-muted-grey font-mono">{{ $enquiry->ip_address }}</p>
                        </div>
                    @endif
                </div>
            </div>

            {{-- Delete --}}
            <div class="bg-white border border-border-grey rounded-lg px-5 py-4">
                <form method="POST"
                      action="{{ route('admin.enquiries.destroy', $enquiry) }}"
                      x-data
                      @submit.prevent="if(confirm('Permanently delete this enquiry?')) $el.submit()">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            class="font-sans text-[12.5px] text-red-400
                                   hover:text-red-600 transition-colors duration-150">
                        Delete this enquiry
                    </button>
                </form>
            </div>

            {{-- Back --}}
            <a href="{{ route('admin.enquiries.index') }}"
               class="flex items-center gap-2 font-sans text-[12.5px] text-muted-grey
                      hover:text-primary-black transition-colors duration-150">
                ← Back to all enquiries
            </a>

        </div>

    </div>

@endsection
