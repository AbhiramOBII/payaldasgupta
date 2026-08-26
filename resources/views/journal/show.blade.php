@extends('layouts.app')

@section('title', ($post->meta_title ?: $post->title) . ' — Payal Dasgupta')
@section('meta_description', $post->meta_description ?: $post->excerpt)

@section('content')

    {{-- ── Hero ─────────────────────────────────────────────────────────────── --}}
    <section class="bg-warm-ivory border-b border-border-grey pt-20 pb-14 lg:pt-28 lg:pb-18">
        <div class="max-w-screen-xl mx-auto px-6 lg:px-12 xl:px-16">

            {{-- Breadcrumb --}}
            <div class="flex items-center gap-2 font-sans text-[12px] text-muted-grey mb-8">
                <a href="{{ route('journal.index') }}"
                   class="hover:text-primary-black transition-colors duration-150">Journal</a>
                <span>·</span>
                @if ($post->category)
                    <span>{{ $post->category }}</span>
                @endif
            </div>

            {{-- Meta --}}
            <div class="flex items-center gap-4 mb-6">
                @if ($post->category)
                    <span class="font-sans text-[10.5px] font-medium uppercase tracking-[0.18em]
                                 text-muted-grey/60">{{ $post->category }}</span>
                    <span class="text-border-grey text-[10px]">·</span>
                @endif
                @if ($post->reading_time)
                    <span class="font-sans text-[11.5px] text-muted-grey/60">
                        {{ $post->reading_time }} min read
                    </span>
                @endif
                @if ($post->published_at)
                    <span class="text-border-grey text-[10px]">·</span>
                    <span class="font-sans text-[11.5px] text-muted-grey/60">
                        {{ $post->published_at->format('d M Y') }}
                    </span>
                @endif
            </div>

            <h1 class="font-serif text-[clamp(2rem,5vw,3.8rem)]
                        text-primary-black leading-[1.05] tracking-tight max-w-3xl">
                {{ $post->title }}
            </h1>

            @if ($post->excerpt)
                <p class="font-sans text-[16px] text-muted-grey leading-[1.8] mt-6 max-w-2xl">
                    {{ $post->excerpt }}
                </p>
            @endif

        </div>
    </section>

    {{-- ── Featured image ──────────────────────────────────────────────────── --}}
    @if ($post->featured_image)
        <div class="bg-soft-white">
            <div class="max-w-screen-xl mx-auto px-6 lg:px-12 xl:px-16 py-10">
                <img src="{{ $post->featuredImageUrl() }}" alt="{{ $post->title }}"
                     class="w-full max-h-[480px] object-cover rounded-lg">
            </div>
        </div>
    @endif

    {{-- ── Body ────────────────────────────────────────────────────────────── --}}
    <section class="bg-soft-white py-14 lg:py-20 border-b border-border-grey">
        <div class="max-w-screen-xl mx-auto px-6 lg:px-12 xl:px-16">
            <div class="max-w-2xl">
                <div class="prose-editorial">
                    {!! $post->body !!}
                </div>

                {{-- Tags --}}
                @if ($post->tags && count($post->tags))
                    <div class="flex flex-wrap gap-2 mt-12 pt-8 border-t border-border-grey">
                        @foreach ($post->tags as $tag)
                            <span class="font-sans text-[11.5px] text-muted-grey
                                         bg-border-grey/30 px-3 py-1 rounded-full">
                                {{ $tag }}
                            </span>
                        @endforeach
                    </div>
                @endif

                {{-- Author byline --}}
                <div class="flex items-center gap-3 mt-10 pt-8 border-t border-border-grey">
                    <div class="w-9 h-9 rounded-full bg-burgundy flex items-center justify-center
                                text-soft-white font-sans text-[13px] font-semibold shrink-0">
                        PD
                    </div>
                    <div>
                        <p class="font-sans text-[13px] font-medium text-primary-black">Payal Dasgupta</p>
                        <p class="font-sans text-[11.5px] text-muted-grey">Communications Strategist</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ── Related posts ────────────────────────────────────────────────────── --}}
    @if ($related->isNotEmpty())
        <section class="bg-warm-ivory py-16 lg:py-20">
            <div class="max-w-screen-xl mx-auto px-6 lg:px-12 xl:px-16">

                <h2 class="font-sans text-[11px] uppercase tracking-[0.22em]
                            text-muted-grey mb-10">
                    More from the journal
                </h2>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-0">
                    @foreach ($related as $relPost)
                        @include('journal._card', ['post' => $relPost])
                    @endforeach
                </div>

                <div class="mt-10">
                    <a href="{{ route('journal.index') }}"
                       class="font-sans text-[13px] font-medium text-muted-grey
                              hover:text-primary-black transition-colors duration-200
                              inline-flex items-center gap-2 group">
                        View all posts
                        <span class="transition-transform duration-200 group-hover:translate-x-1">→</span>
                    </a>
                </div>

            </div>
        </section>
    @endif

@endsection
