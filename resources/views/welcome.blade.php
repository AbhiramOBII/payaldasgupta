@extends('layouts.app')

@section('content')

    {{-- ── Hero ──────────────────────────────────────────────────────────── --}}
    <section class="min-h-[calc(100svh-72px)] lg:min-h-[calc(100svh-88px)]
                    flex items-center border-b border-border-grey">

        <div class="max-w-screen-xl mx-auto px-6 lg:px-12 xl:px-16 w-full
                    py-16 lg:py-0">

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 xl:gap-24 items-center">

                {{-- ── Left: Copy ─────────────────────────────────────────── --}}
                <div>

                    {{-- H1 --}}
                    <h1 class="font-serif text-[clamp(2.6rem,5.5vw,4.5rem)]
                                text-primary-black leading-[1.02] tracking-tight">
                        Every business<br>has a story.
                    </h1>

                    {{-- H2 — italic serif, subdued --}}
                    <h2 class="font-serif italic
                                text-[clamp(1.2rem,2.2vw,1.65rem)]
                                text-muted-grey leading-[1.25] mt-5">
                        The challenge is finding the one<br class="hidden sm:block">
                        people will care about.
                    </h2>

                    {{-- Thin rule --}}
                    <div class="w-12 h-px bg-border-grey mt-8 mb-8"></div>

                    {{-- Body --}}
                    <p class="font-sans text-[15px] lg:text-[16px]
                               text-primary-black/65 leading-[1.8] max-w-[520px]">
                        I'm <strong class="text-primary-black font-semibold">Payal Dasgupta</strong>,
                        a communications strategist, PR professional and brand storyteller
                        with nearly 12&nbsp;years of experience helping businesses, founders
                        and organisations find their voice and earn their place in the
                        conversation.
                    </p>

                    {{-- Expertise tags --}}
                    <p class="font-sans text-[10.5px] uppercase tracking-[0.18em]
                               text-muted-grey mt-7">
                        PR &nbsp;·&nbsp; Brand Narrative &nbsp;·&nbsp;
                        Founder Positioning &nbsp;·&nbsp; Strategic Communications
                    </p>

                    {{-- CTAs --}}
                    <div class="mt-9 flex flex-col sm:flex-row items-start sm:items-center gap-4">

                        {{-- Primary --}}
                        <a href="{{ route('contact') }}"
                           class="inline-flex items-center font-sans text-[13.5px] font-medium
                                  bg-burgundy text-soft-white
                                  px-6 py-3.5 rounded
                                  hover:bg-burgundy-dark
                                  transition-colors duration-200">
                            Let's Find Your Story
                        </a>

                        {{-- Secondary --}}
                        <a href="#work"
                           class="inline-flex items-center gap-2 font-sans text-[13.5px]
                                  font-medium text-primary-black/60
                                  hover:text-primary-black
                                  transition-colors duration-200 group">
                            Explore My Work
                            <span class="transition-transform duration-200
                                         group-hover:translate-x-1">→</span>
                        </a>

                    </div>

                </div>

                {{-- ── Right: Photo ───────────────────────────────────────── --}}
                <div class="flex justify-center lg:justify-end">
                    <div class="relative w-full max-w-[440px] lg:max-w-none">

                        {{-- 1:1 square image --}}
                        <div class="aspect-square overflow-hidden bg-border-grey/30 rounded-2xl">
                            <img src="{{ asset('images/payal-dasgupta.jpg') }}"
                                 alt="Payal Dasgupta — Communications Strategist & PR Professional"
                                 class="w-full h-full object-cover object-top
                                        transition-transform duration-700 ease-out
                                        hover:scale-[1.02]">
                        </div>

                        {{-- Subtle offset frame for editorial depth --}}
                        <div class="absolute -bottom-3 -right-3 -z-10
                                    w-full h-full border border-border-grey rounded-2xl"></div>

                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- ── Client Carousel ───────────────────────────────────────────────── --}}
    <section class="bg-soft-white border-b border-border-grey py-14 lg:py-16">

        {{-- Label --}}
        <p class="font-sans text-[14px] uppercase tracking-[0.24em] text-muted-grey
                   text-center mb-10">
            Brands &amp; Organisations I've Worked With
        </p>

        {{-- Marquee track --}}
        <div class="marquee-track relative overflow-hidden">

            {{-- Left fade --}}
            <div class="pointer-events-none absolute left-0 top-0 h-full w-28 z-10
                         bg-gradient-to-r from-soft-white to-transparent"></div>
            {{-- Right fade --}}
            <div class="pointer-events-none absolute right-0 top-0 h-full w-28 z-10
                         bg-gradient-to-l from-soft-white to-transparent"></div>

            {{--
                Both sets of logos live inside a single flex row.
                Each logo uses px-10/px-12 (not gap) so the visual spacing
                at the seam between set-1 and set-2 is identical to the
                spacing within each set — giving a truly seamless loop.
                The animation moves -50% = exactly one set's width.
            --}}
            <div class="animate-marquee flex items-center w-max">

                @php
                    $clients = range(1, 10);
                @endphp

                {{-- Set 1 --}}
                @foreach ($clients as $n)
                    <div class="px-10 lg:px-12 shrink-0">
                        <img src="{{ asset('images/client-' . str_pad($n, 2, '0', STR_PAD_LEFT) . '.png') }}"
                             alt="Client {{ $n }}"
                             class="h-9 lg:h-11 w-auto object-contain
                                    grayscale opacity-55
                                    hover:grayscale-0 hover:opacity-100
                                    transition-all duration-300 ease-out">
                    </div>
                @endforeach

                {{-- Set 2 — identical duplicate for seamless loop --}}
                @foreach ($clients as $n)
                    <div class="px-10 lg:px-12 shrink-0" aria-hidden="true">
                        <img src="{{ asset('images/client-' . str_pad($n, 2, '0', STR_PAD_LEFT) . '.png') }}"
                             alt=""
                             class="h-9 lg:h-11 w-auto object-contain
                                    grayscale opacity-55
                                    hover:grayscale-0 hover:opacity-100
                                    transition-all duration-300 ease-out">
                    </div>
                @endforeach

            </div>
        </div>
    </section>

    {{-- ── Find the Story — 4-step process ──────────────────────────────── --}}
    <section class="bg-soft-white border-b border-border-grey
                    py-24 lg:py-32">
        <div class="max-w-screen-xl mx-auto px-6 lg:px-12 xl:px-16">

            {{-- Section label --}}
            <h2 class="font-serif text-[clamp(1.75rem,3.5vw,2.75rem)]
                        text-primary-black leading-[1.1] tracking-tight mb-14 lg:mb-16">
                Find the Story
            </h2>

            {{-- 4 editorial cards --}}
            @php
                $steps = [
                    [
                        'num'  => '01',
                        'title'=> 'Understand',
                        'body' => 'Before communication comes context. Understand the business, market, audience, ambition and the problem being solved.',
                    ],
                    [
                        'num'  => '02',
                        'title'=> 'Discover',
                        'body' => 'Find the idea, insight or perspective buried underneath the corporate language.',
                    ],
                    [
                        'num'  => '03',
                        'title'=> 'Shape',
                        'body' => 'Turn that insight into a narrative people can understand, remember and talk about.',
                    ],
                    [
                        'num'  => '04',
                        'title'=> 'Amplify',
                        'body' => 'Take the right story to the right people through PR, thought leadership, digital conversations and strategic communication.',
                    ],
                ];
            @endphp

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-0">
                @foreach ($steps as $step)
                    <div class="group border-t-2 border-border-grey
                                hover:border-burgundy
                                transition-colors duration-300 ease-out
                                pt-8 pb-10 lg:pr-10 xl:pr-14">

                        {{-- Step number --}}
                        <span class="font-sans text-[11px] font-medium uppercase
                                     tracking-[0.2em] text-muted-grey/60
                                     group-hover:text-burgundy
                                     transition-colors duration-300">
                            {{ $step['num'] }}
                        </span>

                        {{-- Title --}}
                        <h3 class="font-serif text-[1.55rem] lg:text-[1.7rem]
                                    text-primary-black leading-tight tracking-tight
                                    mt-5 mb-5">
                            {{ $step['title'] }}
                        </h3>

                        {{-- Description --}}
                        <p class="font-sans text-[14px] lg:text-[15px]
                                   text-muted-grey leading-[1.8]">
                            {{ $step['body'] }}
                        </p>

                    </div>
                @endforeach
            </div>

            {{-- Closing statement + CTA --}}
            <div class="mt-20 lg:mt-24 border-t border-border-grey pt-12
                         flex flex-col lg:flex-row lg:items-end
                         justify-between gap-8">

                <p class="font-serif italic
                           text-[clamp(1.5rem,3.2vw,2.6rem)]
                           text-primary-black leading-[1.15] tracking-tight
                           max-w-3xl">
                    Because visibility without narrative is just noise.
                </p>

                <a href="{{ route('contact') }}"
                   class="shrink-0 inline-flex items-center gap-2
                          font-sans text-[13.5px] font-medium
                          bg-burgundy text-soft-white
                          px-6 py-3.5 rounded
                          hover:bg-burgundy-dark
                          transition-colors duration-200 group">
                    Let's Find Your Story
                    <span class="transition-transform duration-200
                                 group-hover:translate-x-1">→</span>
                </a>

            </div>

        </div>
    </section>

    {{-- ── Services tiles ──────────────────────────────────────────────────── --}}
    <section class="bg-soft-white border-b border-border-grey py-24 lg:py-32">
        <div class="max-w-screen-xl mx-auto px-6 lg:px-12 xl:px-16">

            {{-- Section header --}}
            <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between
                         gap-6 mb-14 lg:mb-16">
                <h2 class="font-serif text-[clamp(1.75rem,3.5vw,2.75rem)]
                            text-primary-black leading-[1.1] tracking-tight">
                    Services
                </h2>
                <a href="{{ route('services.index') }}"
                   class="shrink-0 font-sans text-[13px] font-medium text-muted-grey
                          hover:text-primary-black transition-colors duration-200
                          inline-flex items-center gap-1.5 group">
                    View all services
                    <span class="transition-transform duration-200 group-hover:translate-x-1">→</span>
                </a>
            </div>

            {{-- Tile grid --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-0">
                @foreach ($services as $i => $service)
                    <a href="{{ route('services.show', $service->slug) }}"
                       class="group border-t-2 border-border-grey hover:border-burgundy
                              transition-colors duration-300 ease-out
                              pt-7 pb-9 pr-8 xl:pr-12 block">

                        {{-- Number --}}
                        <span class="font-sans text-[11px] font-medium uppercase tracking-[0.2em]
                                     text-muted-grey/40 group-hover:text-burgundy
                                     transition-colors duration-300 block">
                            {{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}
                        </span>

                        {{-- Title --}}
                        <h3 class="font-serif text-[1.4rem] lg:text-[1.55rem]
                                    text-primary-black leading-tight tracking-tight
                                    mt-4 mb-3">
                            {{ $service->title }}
                        </h3>

                        {{-- Short description --}}
                        <p class="font-sans text-[13px] text-muted-grey leading-[1.75]
                                   line-clamp-3">
                            {{ $service->short_description }}
                        </p>

                        {{-- Link indicator --}}
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

    {{-- ── "Why Should Anyone Care?" ─────────────────────────────────────── --}}
    {{--
        Background: 5 rows of industry words scroll at different speeds and
        alternating directions, creating a living texture behind the content.
        Left/right gradient masks soften the edges.
        Foreground: headline + big question + body copy sit on z-10.
    --}}
    <section class="relative bg-warm-ivory border-b border-border-grey overflow-hidden">

        {{-- ── Background ticker ──────────────────────────────────────────── --}}
        @php
            $industries = [
                'Technology', 'Healthcare', 'Aerospace', 'Fintech',
                'Real Estate', 'Consumer Brands', 'Architecture', 'AI',
                'Startups', 'Edtech', 'Healthtech', 'Media', 'FMCG',
            ];
            // Repeat enough times that even ultra-wide screens are fully covered
            $row = array_merge($industries, $industries, $industries, $industries);
        @endphp

        <div class="absolute inset-0 z-0 flex flex-col justify-evenly py-10
                     pointer-events-none select-none overflow-hidden"
             aria-hidden="true">

            {{-- Edge fade masks --}}
            <div class="absolute inset-y-0 left-0 w-32 lg:w-48 z-10
                         bg-gradient-to-r from-warm-ivory to-transparent"></div>
            <div class="absolute inset-y-0 right-0 w-32 lg:w-48 z-10
                         bg-gradient-to-l from-warm-ivory to-transparent"></div>

            {{-- Row 1 → left --}}
            <div class="overflow-hidden w-full">
                <div class="flex w-max ticker-left">
                    @foreach($row as $word)
                        <span class="font-sans text-[11px] font-medium uppercase
                                     tracking-[0.22em] text-muted-grey/[0.18] px-8 whitespace-nowrap">
                            {{ $word }}
                        </span>
                    @endforeach
                </div>
            </div>

            {{-- Row 2 ← right --}}
            <div class="overflow-hidden w-full">
                <div class="flex w-max ticker-right">
                    @foreach($row as $word)
                        <span class="font-sans text-[11px] font-medium uppercase
                                     tracking-[0.22em] text-muted-grey/[0.14] px-8 whitespace-nowrap">
                            {{ $word }}
                        </span>
                    @endforeach
                </div>
            </div>

            {{-- Row 3 → left (medium) --}}
            <div class="overflow-hidden w-full">
                <div class="flex w-max ticker-left-med">
                    @foreach($row as $word)
                        <span class="font-sans text-[11px] font-medium uppercase
                                     tracking-[0.22em] text-muted-grey/[0.18] px-8 whitespace-nowrap">
                            {{ $word }}
                        </span>
                    @endforeach
                </div>
            </div>

            {{-- Row 4 ← right (slow) --}}
            <div class="overflow-hidden w-full">
                <div class="flex w-max ticker-right-slow">
                    @foreach($row as $word)
                        <span class="font-sans text-[11px] font-medium uppercase
                                     tracking-[0.22em] text-muted-grey/[0.14] px-8 whitespace-nowrap">
                            {{ $word }}
                        </span>
                    @endforeach
                </div>
            </div>

            {{-- Row 5 → left (slow) --}}
            <div class="overflow-hidden w-full">
                <div class="flex w-max ticker-left-slow">
                    @foreach($row as $word)
                        <span class="font-sans text-[11px] font-medium uppercase
                                     tracking-[0.22em] text-muted-grey/[0.18] px-8 whitespace-nowrap">
                            {{ $word }}
                        </span>
                    @endforeach
                </div>
            </div>

        </div>{{-- /background --}}

        {{-- ── Foreground content ─────────────────────────────────────────── --}}
        <div class="relative z-10 py-28 lg:py-40 px-6 lg:px-12 xl:px-16 text-center">

            {{-- Eyebrow headline --}}
            <p class="font-sans text-[11px] uppercase tracking-[0.2em] text-muted-grey mb-8">
                Almost 12 years &nbsp;·&nbsp; Many industries &nbsp;·&nbsp; One recurring question
            </p>

            {{-- The question --}}
            <h2 class="font-serif text-[clamp(3rem,7.5vw,6.5rem)]
                        text-primary-black leading-[0.95] tracking-tight">
                Why should<br>anyone care?
            </h2>

            {{-- Thin rule --}}
            <div class="w-10 h-px bg-border-grey mx-auto mt-12 mb-12"></div>

            {{-- Body copy --}}
            <div class="max-w-lg mx-auto">
                <p class="font-sans text-[15.5px] lg:text-[17px] text-primary-black/60 leading-[1.85]">
                    Different industries create different communication problems.
                </p>
                <p class="font-sans text-[15.5px] lg:text-[17px] text-primary-black/60 leading-[1.85] mt-5">
                    But great communication begins by understanding the business,
                    identifying what matters and finding the people who should
                    care about it.
                </p>
            </div>

        </div>{{-- /foreground --}}

    </section>

    {{-- ── From the Journal ────────────────────────────────────────────────── --}}
    @if ($latestPosts->isNotEmpty())
    <section class="bg-warm-ivory border-t border-border-grey py-24 lg:py-32">
        <div class="max-w-screen-xl mx-auto px-6 lg:px-12 xl:px-16">

            {{-- Section header --}}
            <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between
                         gap-6 mb-14 lg:mb-16">
                <div>
                    <p class="font-sans text-[11px] uppercase tracking-[0.24em]
                               text-muted-grey mb-3">
                        Latest thinking
                    </p>
                    <h2 class="font-serif text-[clamp(1.75rem,3.5vw,2.75rem)]
                                text-primary-black leading-[1.1] tracking-tight">
                        From the Journal
                    </h2>
                </div>
                <a href="{{ route('journal.index') }}"
                   class="shrink-0 font-sans text-[13px] font-medium text-muted-grey
                          hover:text-primary-black transition-colors duration-200
                          inline-flex items-center gap-1.5 group">
                    Read all posts
                    <span class="transition-transform duration-200 group-hover:translate-x-1">→</span>
                </a>
            </div>

            {{-- Post tiles --}}
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-0">
                @foreach ($latestPosts as $i => $post)
                    @include('journal._card', ['post' => $post, 'featured' => $i === 0])
                @endforeach
            </div>

        </div>
    </section>
    @endif

@endsection
