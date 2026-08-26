@extends('layouts.app')

@section('title', 'Industries — Payal Dasgupta')
@section('meta_description', 'Communications strategy and PR across technology, startups, fintech, healthcare, aerospace, real estate and more.')

@section('content')

    {{-- ── Hero ─────────────────────────────────────────────────────────────── --}}
    <section class="bg-warm-ivory border-b border-border-grey pt-20 pb-16 lg:pt-28 lg:pb-20">
        <div class="max-w-screen-xl mx-auto px-6 lg:px-12 xl:px-16">

            <p class="font-sans text-[11px] uppercase tracking-[0.24em] text-muted-grey mb-5">
                Industries
            </p>
            <h1 class="font-serif text-[clamp(2.2rem,5vw,4rem)]
                        text-primary-black leading-[1.0] tracking-tight max-w-3xl">
                Every industry has its own media landscape, its own gatekeepers, its own rules of credibility.
            </h1>
            <p class="font-sans text-[15.5px] text-muted-grey leading-[1.8] mt-7 max-w-xl">
                Twelve years across eleven sectors — from deep tech to consumer goods,
                from aerospace to architecture. The communications problems change with
                the industry. The discipline does not.
            </p>

        </div>
    </section>

    {{-- ── Industry grid ───────────────────────────────────────────────────── --}}
    <section class="bg-soft-white py-20 lg:py-28">
        <div class="max-w-screen-xl mx-auto px-6 lg:px-12 xl:px-16">

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-0">
                @foreach ($industries as $i => $industry)
                    <a href="{{ route('industries.show', $industry->slug) }}"
                       class="group border-t-2 border-border-grey hover:border-burgundy
                              transition-colors duration-300 ease-out
                              pt-8 pb-10 pr-8 xl:pr-14 block">

                        {{-- Number --}}
                        <span class="font-sans text-[11px] font-medium uppercase tracking-[0.2em]
                                     text-muted-grey/40 group-hover:text-burgundy
                                     transition-colors duration-300 block">
                            {{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}
                        </span>

                        {{-- Title --}}
                        <h2 class="font-serif text-[1.45rem] lg:text-[1.6rem]
                                    text-primary-black leading-tight tracking-tight
                                    mt-4 mb-3">
                            {{ $industry->title }}
                        </h2>

                        {{-- Short description --}}
                        <p class="font-sans text-[13.5px] text-muted-grey leading-[1.75]
                                   line-clamp-3">
                            {{ $industry->short_description }}
                        </p>

                        {{-- Services count pill --}}
                        @php $svcCount = count($industry->related_service_ids ?? []); @endphp
                        @if ($svcCount)
                            <span class="mt-5 inline-flex items-center gap-1.5
                                         font-sans text-[11px] text-muted-grey/50
                                         group-hover:text-burgundy
                                         transition-colors duration-300">
                                {{ $svcCount }} {{ Str::plural('service', $svcCount) }}
                                <svg class="w-3 h-3 transition-transform duration-300 group-hover:translate-x-1"
                                     fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                                </svg>
                            </span>
                        @endif

                    </a>
                @endforeach
            </div>

        </div>
    </section>

    {{-- ── CTA strip ────────────────────────────────────────────────────────── --}}
    <section class="bg-primary-black py-16 lg:py-20">
        <div class="max-w-screen-xl mx-auto px-6 lg:px-12 xl:px-16
                     flex flex-col lg:flex-row lg:items-center lg:justify-between gap-8">
            <div>
                <p class="font-serif italic text-[clamp(1.3rem,2.5vw,2rem)]
                           text-warm-ivory leading-tight">
                    Don't see your industry?
                </p>
                <p class="font-sans text-[14px] text-footer-secondary mt-2">
                    Cross-industry pattern recognition is often where the most useful thinking comes from.
                </p>
            </div>
            <a href="/contact"
               class="shrink-0 inline-flex items-center gap-2
                      font-sans text-[13.5px] font-medium
                      bg-burgundy text-soft-white px-6 py-3.5 rounded
                      hover:bg-burgundy-dark transition-colors duration-200 group">
                Start a Conversation
                <span class="transition-transform duration-200 group-hover:translate-x-1">→</span>
            </a>
        </div>
    </section>

@endsection
