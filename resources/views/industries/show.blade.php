@extends('layouts.app')

@section('title', ($industry->meta_title ?: $industry->title) . ' — Payal Dasgupta')
@section('meta_description', $industry->meta_description ?: $industry->short_description)

@section('content')

    {{-- ── Hero ─────────────────────────────────────────────────────────────── --}}
    <section class="bg-warm-ivory border-b border-border-grey pt-20 pb-16 lg:pt-28 lg:pb-20">
        <div class="max-w-screen-xl mx-auto px-6 lg:px-12 xl:px-16">

            {{-- Breadcrumb --}}
            <div class="flex items-center gap-2 font-sans text-[12px] text-muted-grey mb-8">
                <a href="{{ route('industries.index') }}"
                   class="hover:text-primary-black transition-colors duration-150">Industries</a>
                <span>·</span>
                <span class="text-primary-black">{{ $industry->title }}</span>
            </div>

            <p class="font-sans text-[11px] uppercase tracking-[0.24em] text-muted-grey mb-5">
                Industry
            </p>
            <h1 class="font-serif text-[clamp(2.4rem,5vw,4.2rem)]
                        text-primary-black leading-[1.0] tracking-tight max-w-3xl">
                {{ $industry->title }}
            </h1>
            <p class="font-sans text-[16px] text-muted-grey leading-[1.8] mt-6 max-w-2xl">
                {{ $industry->short_description }}
            </p>

            {{-- Quick stats --}}
            @php $svcCount = $relatedServices->count(); @endphp
            @if ($svcCount)
                <div class="flex items-center gap-2 mt-8">
                    <span class="font-sans text-[12px] text-muted-grey/60">
                        {{ $svcCount }} {{ Str::plural('service', $svcCount) }} available
                    </span>
                    <span class="w-px h-3 bg-border-grey inline-block"></span>
                    <a href="#services"
                       class="font-sans text-[12px] font-medium text-burgundy
                              hover:underline underline-offset-2 transition-colors duration-150">
                        View services →
                    </a>
                </div>
            @endif

        </div>
    </section>

    {{-- ── Full description ────────────────────────────────────────────────── --}}
    @if ($industry->full_description)
        <section class="bg-soft-white py-16 lg:py-24 border-b border-border-grey">
            <div class="max-w-screen-xl mx-auto px-6 lg:px-12 xl:px-16">
                <div class="grid grid-cols-1 lg:grid-cols-[1fr_380px] gap-16 xl:gap-24">

                    {{-- Body --}}
                    <div class="prose-editorial">
                        {!! $industry->full_description !!}
                    </div>

                    {{-- Sticky aside: Expected outcomes --}}
                    @if ($industry->expected_outcomes && count($industry->expected_outcomes))
                        <aside class="lg:sticky lg:top-28 lg:self-start">
                            <div class="border-l-2 border-burgundy pl-6">
                                <p class="font-sans text-[10.5px] uppercase tracking-[0.22em]
                                           text-muted-grey mb-5">
                                    What to expect
                                </p>
                                <ul class="space-y-4">
                                    @foreach ($industry->expected_outcomes as $outcome)
                                        <li class="flex items-start gap-3">
                                            {{-- Checkmark --}}
                                            <span class="mt-0.5 shrink-0 w-4 h-4 rounded-full
                                                         bg-burgundy/10 border border-burgundy/30
                                                         flex items-center justify-center">
                                                <svg class="w-2 h-2 text-burgundy" fill="none"
                                                     stroke="currentColor" stroke-width="2.5"
                                                     viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                          d="M5 13l4 4L19 7"/>
                                                </svg>
                                            </span>
                                            <span class="font-sans text-[13.5px] text-primary-black/80
                                                         leading-[1.65]">
                                                {{ $outcome }}
                                            </span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </aside>
                    @endif

                </div>
            </div>
        </section>
    @endif

    {{-- ── Expected outcomes (standalone — shown if no full_description) ─────── --}}
    @if (! $industry->full_description && $industry->expected_outcomes && count($industry->expected_outcomes))
        <section class="bg-soft-white py-16 lg:py-24 border-b border-border-grey">
            <div class="max-w-screen-xl mx-auto px-6 lg:px-12 xl:px-16">

                <p class="font-sans text-[11px] uppercase tracking-[0.22em] text-muted-grey mb-8">
                    What to expect
                </p>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-x-12 gap-y-6">
                    @foreach ($industry->expected_outcomes as $outcome)
                        <div class="flex items-start gap-3">
                            <span class="mt-0.5 shrink-0 w-4 h-4 rounded-full
                                         bg-burgundy/10 border border-burgundy/30
                                         flex items-center justify-center">
                                <svg class="w-2 h-2 text-burgundy" fill="none"
                                     stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                                </svg>
                            </span>
                            <span class="font-sans text-[14px] text-primary-black/80 leading-[1.65]">
                                {{ $outcome }}
                            </span>
                        </div>
                    @endforeach
                </div>

            </div>
        </section>
    @endif

    {{-- ── Related services ────────────────────────────────────────────────── --}}
    @if ($relatedServices->isNotEmpty())
        <section id="services"
                 class="bg-warm-ivory py-16 lg:py-24 border-b border-border-grey">
            <div class="max-w-screen-xl mx-auto px-6 lg:px-12 xl:px-16">

                <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between
                             gap-4 mb-12">
                    <div>
                        <p class="font-sans text-[11px] uppercase tracking-[0.22em]
                                   text-muted-grey mb-2">
                            Services in this industry
                        </p>
                        <h2 class="font-serif text-[clamp(1.5rem,2.8vw,2.2rem)]
                                    text-primary-black leading-tight tracking-tight">
                            What the work looks like in {{ $industry->title }}
                        </h2>
                    </div>
                    <a href="{{ route('services.index') }}"
                       class="shrink-0 font-sans text-[12.5px] font-medium text-muted-grey
                              hover:text-primary-black transition-colors duration-200
                              inline-flex items-center gap-1.5 group">
                        All services
                        <span class="transition-transform duration-200 group-hover:translate-x-1">→</span>
                    </a>
                </div>

                {{-- Service tiles --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-0">
                    @foreach ($relatedServices as $i => $service)
                        <a href="{{ route('services.show', $service->slug) }}"
                           class="group border-t-2 border-border-grey hover:border-burgundy
                                  transition-colors duration-300 pt-7 pb-9 pr-8 xl:pr-12 block">

                            <span class="font-sans text-[10.5px] font-medium uppercase tracking-[0.18em]
                                         text-muted-grey/40 group-hover:text-burgundy
                                         transition-colors duration-300 block mb-3">
                                {{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}
                            </span>

                            <h3 class="font-serif text-[1.3rem] lg:text-[1.45rem]
                                        text-primary-black leading-tight tracking-tight mb-3
                                        group-hover:text-burgundy transition-colors duration-300">
                                {{ $service->title }}
                            </h3>

                            <p class="font-sans text-[13px] text-muted-grey leading-[1.75] line-clamp-2">
                                {{ $service->short_description }}
                            </p>

                            <span class="mt-5 inline-flex items-center gap-1.5
                                         font-sans text-[11.5px] font-medium text-muted-grey/40
                                         group-hover:text-burgundy transition-colors duration-300">
                                Explore
                                <svg class="w-3 h-3 transition-transform duration-300 group-hover:translate-x-1"
                                     fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                                </svg>
                            </span>
                        </a>
                    @endforeach
                </div>

            </div>
        </section>
    @endif

    {{-- ── CTA block ────────────────────────────────────────────────────────── --}}
    <section class="bg-primary-black py-20 lg:py-28">
        <div class="max-w-screen-xl mx-auto px-6 lg:px-12 xl:px-16">
            <p class="font-sans text-[11px] uppercase tracking-[0.24em]
                       text-footer-secondary/60 mb-5">
                Next step
            </p>
            <h2 class="font-serif text-[clamp(1.8rem,3.5vw,2.8rem)]
                        text-warm-ivory leading-tight tracking-tight max-w-2xl">
                Ready to work on your communications in {{ $industry->title }}?
            </h2>
            <p class="font-sans text-[15px] text-footer-secondary mt-4 leading-[1.8] max-w-xl">
                Every engagement starts with understanding the business, the audience and the gap between
                what you are and what the market currently believes you to be.
            </p>
            <a href="/contact"
               class="mt-8 inline-flex items-center gap-2
                      font-sans text-[13.5px] font-medium
                      bg-burgundy text-soft-white px-6 py-3.5 rounded
                      hover:bg-burgundy-dark transition-colors duration-200 group">
                Start a Conversation
                <span class="transition-transform duration-200 group-hover:translate-x-1">→</span>
            </a>
        </div>
    </section>

    {{-- ── Other industries ────────────────────────────────────────────────── --}}
    @if ($others->isNotEmpty())
        <section class="bg-warm-ivory py-14 lg:py-18 border-t border-border-grey">
            <div class="max-w-screen-xl mx-auto px-6 lg:px-12 xl:px-16">

                <p class="font-sans text-[11px] uppercase tracking-[0.22em]
                            text-muted-grey mb-8">
                    Other industries
                </p>

                <div class="grid grid-cols-2 sm:grid-cols-4 gap-0">
                    @foreach ($others as $other)
                        <a href="{{ route('industries.show', $other->slug) }}"
                           class="group border-t-2 border-border-grey hover:border-burgundy
                                  transition-colors duration-300 pt-5 pb-7 pr-6 block">
                            <h4 class="font-serif text-[1.15rem] lg:text-[1.25rem]
                                        text-primary-black leading-tight tracking-tight
                                        group-hover:text-burgundy transition-colors duration-300">
                                {{ $other->title }}
                            </h4>
                        </a>
                    @endforeach
                </div>

                <div class="mt-8">
                    <a href="{{ route('industries.index') }}"
                       class="font-sans text-[13px] font-medium text-muted-grey
                              hover:text-primary-black transition-colors duration-200
                              inline-flex items-center gap-2 group">
                        View all industries
                        <span class="transition-transform duration-200 group-hover:translate-x-1">→</span>
                    </a>
                </div>

            </div>
        </section>
    @endif

@endsection
