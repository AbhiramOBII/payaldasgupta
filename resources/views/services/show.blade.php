@extends('layouts.app')

@section('title', ($service->meta_title ?: $service->title) . ' — Payal Dasgupta')
@section('meta_description', $service->meta_description ?: $service->short_description)

@section('content')

    {{-- ── Hero ─────────────────────────────────────────────────────────────── --}}
    <section class="bg-warm-ivory border-b border-border-grey pt-20 pb-16 lg:pt-28 lg:pb-20">
        <div class="max-w-screen-xl mx-auto px-6 lg:px-12 xl:px-16">

            {{-- Breadcrumb --}}
            <div class="flex items-center gap-2 font-sans text-[12px] text-muted-grey mb-8">
                <a href="{{ route('services.index') }}"
                   class="hover:text-primary-black transition-colors duration-150">Services</a>
                <span>·</span>
                <span class="text-primary-black">{{ $service->title }}</span>
            </div>

            <h1 class="font-serif text-[clamp(2.2rem,5vw,4.2rem)]
                        text-primary-black leading-[1.0] tracking-tight max-w-3xl">
                {{ $service->title }}
            </h1>
            <p class="font-sans text-[16px] text-muted-grey leading-[1.8] mt-6 max-w-2xl">
                {{ $service->short_description }}
            </p>

        </div>
    </section>

    {{-- ── Full description ────────────────────────────────────────────────── --}}
    @if ($service->full_description)
        <section class="bg-soft-white py-16 lg:py-24 border-b border-border-grey">
            <div class="max-w-screen-xl mx-auto px-6 lg:px-12 xl:px-16">
                <div class="max-w-3xl">
                    {{-- Rendered CKEditor HTML --}}
                    <div class="prose-editorial">
                        {!! $service->full_description !!}
                    </div>
                </div>
            </div>
        </section>
    @endif

    {{-- ── FAQs ─────────────────────────────────────────────────────────────── --}}
    @if ($service->faqs && count($service->faqs))
        <section class="bg-warm-ivory py-16 lg:py-24 border-b border-border-grey">
            <div class="max-w-screen-xl mx-auto px-6 lg:px-12 xl:px-16">
                <div class="max-w-3xl">

                    <h2 class="font-serif text-[1.8rem] lg:text-[2.2rem]
                                text-primary-black leading-tight tracking-tight mb-10">
                        Frequently asked questions
                    </h2>

                    <div class="space-y-0" x-data="{ open: null }">
                        @foreach ($service->faqs as $i => $faq)
                            <div class="border-t border-border-grey last:border-b">
                                <button
                                    type="button"
                                    @click="open = open === {{ $i }} ? null : {{ $i }}"
                                    class="w-full flex items-start justify-between
                                           gap-6 py-5 text-left group">
                                    <span class="font-sans text-[15px] font-medium
                                                 text-primary-black leading-snug
                                                 group-hover:text-burgundy
                                                 transition-colors duration-200">
                                        {{ $faq['question'] }}
                                    </span>
                                    <span class="shrink-0 mt-0.5 transition-transform duration-300 text-muted-grey"
                                          :class="open === {{ $i }} ? 'rotate-45' : ''">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                             stroke-width="1.8" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M12 4v16m8-8H4"/>
                                        </svg>
                                    </span>
                                </button>

                                <div x-show="open === {{ $i }}"
                                     x-transition:enter="transition ease-out duration-200"
                                     x-transition:enter-start="opacity-0 -translate-y-2"
                                     x-transition:enter-end="opacity-100 translate-y-0"
                                     x-transition:leave="transition ease-in duration-150"
                                     x-transition:leave-start="opacity-100 translate-y-0"
                                     x-transition:leave-end="opacity-0 -translate-y-2">
                                    <p class="font-sans text-[14.5px] text-muted-grey
                                               leading-[1.8] pb-5 pr-10 max-w-2xl">
                                        {{ $faq['answer'] }}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </section>
    @endif

    {{-- ── CTA block ────────────────────────────────────────────────────────── --}}
    @if ($service->cta_title)
        <section class="bg-primary-black py-20 lg:py-28">
            <div class="max-w-screen-xl mx-auto px-6 lg:px-12 xl:px-16
                         max-w-3xl">
                <p class="font-sans text-[11px] uppercase tracking-[0.24em]
                           text-footer-secondary/60 mb-5">
                    Next step
                </p>
                <h2 class="font-serif text-[clamp(1.8rem,3.5vw,2.8rem)]
                            text-warm-ivory leading-tight tracking-tight">
                    {{ $service->cta_title }}
                </h2>
                @if ($service->cta_description)
                    <p class="font-sans text-[15px] text-footer-secondary mt-4 leading-[1.8] max-w-xl">
                        {{ $service->cta_description }}
                    </p>
                @endif
                @if ($service->cta_link)
                    <a href="{{ $service->cta_link }}"
                       class="mt-8 inline-flex items-center gap-2
                              font-sans text-[13.5px] font-medium
                              bg-burgundy text-soft-white px-6 py-3.5 rounded
                              hover:bg-burgundy-dark transition-colors duration-200 group">
                        Start a Conversation
                        <span class="transition-transform duration-200 group-hover:translate-x-1">→</span>
                    </a>
                @endif
            </div>
        </section>
    @endif

    {{-- ── Other services ──────────────────────────────────────────────────── --}}
    @php
        $others = \App\Models\Service::where('status', 'active')
            ->where('id', '!=', $service->id)
            ->orderBy('sort_order')
            ->take(3)
            ->get();
    @endphp

    @if ($others->isNotEmpty())
        <section class="bg-warm-ivory py-16 lg:py-20 border-t border-border-grey">
            <div class="max-w-screen-xl mx-auto px-6 lg:px-12 xl:px-16">

                <h3 class="font-sans text-[11px] uppercase tracking-[0.22em]
                            text-muted-grey mb-10">
                    More services
                </h3>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-0">
                    @foreach ($others as $i => $other)
                        <a href="{{ route('services.show', $other->slug) }}"
                           class="group border-t-2 border-border-grey hover:border-burgundy
                                  transition-colors duration-300 pt-6 pb-8 pr-8">
                            <h4 class="font-serif text-[1.35rem] text-primary-black
                                        leading-tight tracking-tight
                                        group-hover:text-burgundy transition-colors duration-300">
                                {{ $other->title }}
                            </h4>
                            <p class="font-sans text-[12.5px] text-muted-grey
                                       leading-[1.7] mt-3 line-clamp-2">
                                {{ $other->short_description }}
                            </p>
                        </a>
                    @endforeach
                </div>

                <div class="mt-10">
                    <a href="{{ route('services.index') }}"
                       class="font-sans text-[13px] font-medium text-muted-grey
                              hover:text-primary-black transition-colors duration-200
                              inline-flex items-center gap-2 group">
                        View all services
                        <span class="transition-transform duration-200 group-hover:translate-x-1">→</span>
                    </a>
                </div>

            </div>
        </section>
    @endif

@endsection
