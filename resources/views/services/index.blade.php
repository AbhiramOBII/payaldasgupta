@extends('layouts.app')

@section('title', 'Services — Payal Dasgupta')
@section('meta_description', 'Strategic communications services by Payal Dasgupta — PR, brand storytelling, founder positioning, thought leadership and more.')

@section('content')

    {{-- ── Hero ─────────────────────────────────────────────────────────────── --}}
    <section class="bg-warm-ivory border-b border-border-grey pt-20 pb-16 lg:pt-28 lg:pb-20">
        <div class="max-w-screen-xl mx-auto px-6 lg:px-12 xl:px-16">

            <p class="font-sans text-[11px] uppercase tracking-[0.24em] text-muted-grey mb-5">
                Services
            </p>
            <h1 class="font-serif text-[clamp(2.2rem,5vw,4rem)]
                        text-primary-black leading-[1.0] tracking-tight max-w-3xl">
                Communication that earns attention, builds trust and creates change.
            </h1>
            <p class="font-sans text-[15.5px] text-muted-grey leading-[1.8] mt-7 max-w-xl">
                Across 12 years and many industries, the work has always returned to
                the same core question: what does this audience need to understand, and
                what is the most credible way to help them understand it?
            </p>

        </div>
    </section>

    {{-- ── Service grid ────────────────────────────────────────────────────── --}}
    <section class="bg-soft-white py-20 lg:py-28">
        <div class="max-w-screen-xl mx-auto px-6 lg:px-12 xl:px-16">

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-0">
                @foreach ($services as $i => $service)
                    <a href="{{ route('services.show', $service->slug) }}"
                       class="group border-t-2 border-border-grey hover:border-burgundy
                              transition-colors duration-300 ease-out
                              pt-8 pb-10 pr-8 xl:pr-14 block">

                        {{-- Number --}}
                        <span class="font-sans text-[11px] font-medium uppercase tracking-[0.2em]
                                     text-muted-grey/50 group-hover:text-burgundy
                                     transition-colors duration-300 block">
                            {{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}
                        </span>

                        {{-- Title --}}
                        <h2 class="font-serif text-[1.45rem] lg:text-[1.6rem]
                                    text-primary-black leading-tight tracking-tight
                                    mt-4 mb-4">
                            {{ $service->title }}
                        </h2>

                        {{-- Short description --}}
                        <p class="font-sans text-[13.5px] text-muted-grey leading-[1.75]">
                            {{ $service->short_description }}
                        </p>

                        {{-- Arrow --}}
                        <span class="mt-6 inline-flex items-center gap-1.5
                                     font-sans text-[12px] font-medium text-muted-grey/50
                                     group-hover:text-burgundy
                                     transition-colors duration-300">
                            Explore
                            <svg class="w-3.5 h-3.5 transition-transform duration-300 group-hover:translate-x-1"
                                 fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                            </svg>
                        </span>

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
                    Not sure which service fits?
                </p>
                <p class="font-sans text-[14px] text-footer-secondary mt-2">
                    Most good communications work begins with a conversation.
                </p>
            </div>
            <a href="{{ route('contact') }}"
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
