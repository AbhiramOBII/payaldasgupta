@extends('layouts.admin')

@section('title', 'Enquiries')

@section('content')

    <div class="flex items-center justify-between mb-7">
        <div>
            <h2 class="font-serif text-[1.4rem] text-primary-black leading-tight flex items-center gap-3">
                Enquiries
                @if ($newCount)
                    <span class="inline-flex items-center justify-center
                                 w-6 h-6 rounded-full bg-burgundy text-soft-white
                                 font-sans text-[11px] font-semibold">
                        {{ $newCount }}
                    </span>
                @endif
            </h2>
            <p class="font-sans text-[12.5px] text-muted-grey mt-0.5">
                {{ $enquiries->total() }} total
                @if ($newCount)
                    · <span class="text-burgundy font-medium">{{ $newCount }} unread</span>
                @endif
            </p>
        </div>
    </div>

    @if (session('success'))
        <div class="mb-5 font-sans text-[13px] text-green-700
                    bg-green-50 border border-green-200 rounded px-4 py-3">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white border border-border-grey rounded-lg overflow-hidden">
        @if ($enquiries->isEmpty())
            <div class="px-6 py-16 text-center">
                <p class="font-sans text-[13.5px] text-muted-grey">No enquiries yet.</p>
                <p class="font-sans text-[12.5px] text-muted-grey/60 mt-1">
                    Submissions from the contact form will appear here.
                </p>
            </div>
        @else
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b border-border-grey bg-[#F9F8F6]">
                        <th class="font-sans text-[10.5px] uppercase tracking-[0.14em]
                                   text-muted-grey font-medium px-5 py-3">From</th>
                        <th class="font-sans text-[10.5px] uppercase tracking-[0.14em]
                                   text-muted-grey font-medium px-5 py-3 hidden md:table-cell">Service interest</th>
                        <th class="font-sans text-[10.5px] uppercase tracking-[0.14em]
                                   text-muted-grey font-medium px-5 py-3">Status</th>
                        <th class="font-sans text-[10.5px] uppercase tracking-[0.14em]
                                   text-muted-grey font-medium px-5 py-3 hidden lg:table-cell">Received</th>
                        <th class="font-sans text-[10.5px] uppercase tracking-[0.14em]
                                   text-muted-grey font-medium px-5 py-3 text-right">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-border-grey">
                    @foreach ($enquiries as $enquiry)
                        <tr class="hover:bg-[#FAFAF8] transition-colors duration-100
                                   {{ $enquiry->isNew() ? 'bg-blue-50/30' : '' }}">

                            {{-- From --}}
                            <td class="px-5 py-3.5">
                                <div class="flex items-center gap-2.5">
                                    @if ($enquiry->isNew())
                                        <span class="w-1.5 h-1.5 rounded-full bg-burgundy shrink-0"></span>
                                    @else
                                        <span class="w-1.5 h-1.5 shrink-0"></span>
                                    @endif
                                    <div>
                                        <p class="font-sans text-[13.5px] font-medium text-primary-black">
                                            {{ $enquiry->name }}
                                        </p>
                                        <p class="font-sans text-[11.5px] text-muted-grey mt-0.5">
                                            {{ $enquiry->email }}
                                        </p>
                                        @if ($enquiry->company)
                                            <p class="font-sans text-[11px] text-muted-grey/60">
                                                {{ $enquiry->company }}
                                            </p>
                                        @endif
                                    </div>
                                </div>
                            </td>

                            {{-- Service interest --}}
                            <td class="px-5 py-3.5 hidden md:table-cell">
                                @if ($enquiry->service_interest)
                                    <span class="font-sans text-[12px] text-muted-grey/80
                                                 bg-border-grey/30 px-2.5 py-0.5 rounded
                                                 whitespace-nowrap">
                                        {{ $enquiry->service_interest }}
                                    </span>
                                @else
                                    <span class="text-muted-grey/30 text-[12px]">—</span>
                                @endif
                            </td>

                            {{-- Status --}}
                            <td class="px-5 py-3.5">
                                <span class="inline-flex items-center font-sans text-[11px]
                                             font-medium border px-2.5 py-0.5 rounded-full
                                             {{ $enquiry->statusColour() }}">
                                    {{ $enquiry->statusLabel() }}
                                </span>
                            </td>

                            {{-- Received --}}
                            <td class="px-5 py-3.5 hidden lg:table-cell">
                                <span class="font-sans text-[12px] text-muted-grey whitespace-nowrap">
                                    {{ $enquiry->created_at->format('d M Y, g:ia') }}
                                </span>
                            </td>

                            {{-- Action --}}
                            <td class="px-5 py-3.5 text-right">
                                <a href="{{ route('admin.enquiries.show', $enquiry) }}"
                                   class="font-sans text-[12.5px] font-medium text-primary-black/60
                                          hover:text-primary-black transition-colors duration-150">
                                    View →
                                </a>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>

            @if ($enquiries->hasPages())
                <div class="px-5 py-4 border-t border-border-grey">
                    {{ $enquiries->links() }}
                </div>
            @endif
        @endif
    </div>

@endsection
