{{--
    Header — Payal Dasgupta
    ─────────────────────────────────────────────────────────────────────────
    · Sticky, warm-ivory background with a thin border-grey bottom border
    · Scroll-aware: gains a subtle shadow once the user scrolls 30px
    · Desktop: Logo left │ Nav (with dropdowns) │ Contact CTA far right
    · Mobile:  Logo left │ Hamburger → slide-down drawer with accordions
    · Alpine.js powers scroll state, mobile menu, and hover dropdowns
--}}

@php
    $currentRoute = request()->route()?->getName();

    $services = [
        ['label' => 'Strategic Communications', 'slug' => 'strategic-communications'],
        ['label' => 'Public Relations',          'slug' => 'public-relations'],
        ['label' => 'Brand Storytelling',        'slug' => 'brand-storytelling'],
        ['label' => 'Founder Positioning',       'slug' => 'founder-positioning'],
        ['label' => 'Thought Leadership',        'slug' => 'thought-leadership'],
        ['label' => 'Media Relations',           'slug' => 'media-relations'],
        ['label' => 'Brand Reputation',          'slug' => 'brand-reputation'],
        ['label' => 'Launch Communications',     'slug' => 'launch-communications'],
        ['label' => 'PR Strategy',               'slug' => 'pr-strategy'],
    ];

    $industries = [
        ['label' => 'Technology & AI',          'slug' => 'technology-ai'],
        ['label' => 'Startups',                 'slug' => 'startups'],
        ['label' => 'Fintech',                  'slug' => 'fintech'],
        ['label' => 'Edtech',                   'slug' => 'edtech'],
        ['label' => 'Healthtech',               'slug' => 'healthtech'],
        ['label' => 'Healthcare',               'slug' => 'healthcare'],
        ['label' => 'Aerospace & Aviation',     'slug' => 'aerospace-aviation'],
        ['label' => 'Real Estate',              'slug' => 'real-estate'],
        ['label' => 'Architecture & Interiors', 'slug' => 'architecture-interiors'],
        ['label' => 'FMCG',                     'slug' => 'fmcg'],
        ['label' => 'Consumer Brands',          'slug' => 'consumer-brands'],
    ];

    $activeServices    = str_starts_with($currentRoute ?? '', 'services');
    $activeIndustries  = str_starts_with($currentRoute ?? '', 'industries');
    $activeAbout       = $currentRoute === 'about';
    $activeJournal     = str_starts_with($currentRoute ?? '', 'journal');
    $activeContact     = $currentRoute === 'contact';
@endphp

<header
    x-data="{ mobileOpen: false, scrolled: false }"
    x-on:scroll.window="scrolled = window.scrollY > 30"
    x-on:keydown.escape.window="mobileOpen = false"
    :class="scrolled ? 'shadow-[0_2px_24px_rgba(23,23,23,0.07)]' : ''"
    class="sticky top-0 z-50 bg-warm-ivory border-b border-border-grey transition-shadow duration-300"
>
    <div class="max-w-screen-xl mx-auto px-6 lg:px-12 xl:px-16">
        <div class="flex items-center justify-between h-[72px] lg:h-[88px]">

            {{-- ── Brand / Logo ──────────────────────────────────────────── --}}
            <a href="/" class="group flex flex-col shrink-0 leading-none">
                <span class="font-serif text-[1.55rem] lg:text-[1.85rem] text-primary-black
                             tracking-tight transition-colors duration-200
                             group-hover:text-burgundy">
                    Payal Dasgupta
                </span>
                <span class="hidden sm:block font-sans text-[9.5px] uppercase
                             tracking-[0.2em] text-muted-grey mt-[5px]">
                    Communications Strategist
                </span>
            </a>

            {{-- ── Desktop Navigation ─────────────────────────────────────── --}}
            <nav class="hidden lg:flex items-center gap-8 xl:gap-9"
                 aria-label="Primary navigation">

                {{-- About --}}
                <a href="{{ route('about') }}"
                   class="relative font-sans text-[13px] font-medium py-1 group
                          transition-colors duration-200
                          {{ $activeAbout ? 'text-primary-black' : 'text-primary-black/60 hover:text-primary-black' }}">
                    About
                    <span class="absolute bottom-0 left-0 h-px bg-primary-black
                                 transition-[width] duration-300 ease-out
                                 {{ $activeAbout ? 'w-full' : 'w-0 group-hover:w-full' }}"></span>
                </a>

                {{-- Services dropdown ───────────────────────────────────── --}}
                <div class="relative"
                     x-data="{ open: false }"
                     @mouseenter="open = true"
                     @mouseleave="open = false">

                    <button @click="open = !open"
                            class="flex items-center gap-1.5 font-sans text-[13px] font-medium
                                   py-1 transition-colors duration-200 group
                                   {{ $activeServices ? 'text-primary-black' : 'text-primary-black/60 hover:text-primary-black' }}">
                        Services
                        <svg :class="open ? 'rotate-180' : ''"
                             class="w-3 h-3 transition-transform duration-200 shrink-0"
                             fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                        </svg>
                        <span class="absolute bottom-0 left-0 h-px bg-primary-black
                                     transition-[width] duration-300 ease-out
                                     {{ $activeServices ? 'w-full' : 'w-0 group-hover:w-full' }}"></span>
                    </button>

                    {{-- Services panel --}}
                    <div x-show="open"
                         x-transition:enter="transition ease-out duration-150"
                         x-transition:enter-start="opacity-0 translate-y-1"
                         x-transition:enter-end="opacity-100 translate-y-0"
                         x-transition:leave="transition ease-in duration-100"
                         x-transition:leave-start="opacity-100 translate-y-0"
                         x-transition:leave-end="opacity-0 translate-y-1"
                         class="absolute top-full right-0 mt-3 w-[520px]
                                bg-warm-ivory border border-border-grey rounded-lg
                                shadow-[0_8px_32px_rgba(23,23,23,0.10)]
                                overflow-hidden z-50">

                        <div class="p-5 grid grid-cols-3 gap-px bg-border-grey">
                            @foreach ($services as $svc)
                                <a href="{{ route('services.show', $svc['slug']) }}"
                                   class="bg-warm-ivory px-4 py-3.5 group/item
                                          hover:bg-soft-white transition-colors duration-150 block">
                                    <span class="font-sans text-[12.5px] font-medium
                                                 text-primary-black/75 group-hover/item:text-primary-black
                                                 transition-colors duration-150 leading-tight block">
                                        {{ $svc['label'] }}
                                    </span>
                                </a>
                            @endforeach
                        </div>

                        {{-- Footer link --}}
                        <div class="px-5 py-3 border-t border-border-grey bg-soft-white">
                            <a href="{{ route('services.index') }}"
                               class="font-sans text-[11.5px] font-medium text-muted-grey
                                      hover:text-burgundy transition-colors duration-150
                                      inline-flex items-center gap-1.5 group/all">
                                View all services
                                <span class="transition-transform duration-150 group-hover/all:translate-x-0.5">→</span>
                            </a>
                        </div>

                    </div>
                </div>

                {{-- Industries dropdown ──────────────────────────────────── --}}
                <div class="relative"
                     x-data="{ open: false }"
                     @mouseenter="open = true"
                     @mouseleave="open = false">

                    <button @click="open = !open"
                            class="flex items-center gap-1.5 font-sans text-[13px] font-medium
                                   py-1 transition-colors duration-200 group
                                   {{ $activeIndustries ? 'text-primary-black' : 'text-primary-black/60 hover:text-primary-black' }}">
                        Industries
                        <svg :class="open ? 'rotate-180' : ''"
                             class="w-3 h-3 transition-transform duration-200 shrink-0"
                             fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                        </svg>
                        <span class="absolute bottom-0 left-0 h-px bg-primary-black
                                     transition-[width] duration-300 ease-out
                                     {{ $activeIndustries ? 'w-full' : 'w-0 group-hover:w-full' }}"></span>
                    </button>

                    {{-- Industries panel --}}
                    <div x-show="open"
                         x-transition:enter="transition ease-out duration-150"
                         x-transition:enter-start="opacity-0 translate-y-1"
                         x-transition:enter-end="opacity-100 translate-y-0"
                         x-transition:leave="transition ease-in duration-100"
                         x-transition:leave-start="opacity-100 translate-y-0"
                         x-transition:leave-end="opacity-0 translate-y-1"
                         class="absolute top-full right-0 mt-3 w-[540px]
                                bg-warm-ivory border border-border-grey rounded-lg
                                shadow-[0_8px_32px_rgba(23,23,23,0.10)]
                                overflow-hidden z-50">

                        <div class="p-5 grid grid-cols-3 gap-px bg-border-grey">
                            @foreach ($industries as $ind)
                                <a href="{{ route('industries.show', $ind['slug']) }}"
                                   class="bg-warm-ivory px-4 py-3.5 group/item
                                          hover:bg-soft-white transition-colors duration-150 block">
                                    <span class="font-sans text-[12.5px] font-medium
                                                 text-primary-black/75 group-hover/item:text-primary-black
                                                 transition-colors duration-150 leading-tight block">
                                        {{ $ind['label'] }}
                                    </span>
                                </a>
                            @endforeach
                        </div>

                        {{-- Footer link --}}
                        <div class="px-5 py-3 border-t border-border-grey bg-soft-white">
                            <a href="{{ route('industries.index') }}"
                               class="font-sans text-[11.5px] font-medium text-muted-grey
                                      hover:text-burgundy transition-colors duration-150
                                      inline-flex items-center gap-1.5 group/all">
                                View all industries
                                <span class="transition-transform duration-150 group-hover/all:translate-x-0.5">→</span>
                            </a>
                        </div>

                    </div>
                </div>

                {{-- Journal --}}
                <a href="{{ route('journal.index') }}"
                   class="relative font-sans text-[13px] font-medium py-1 group
                          transition-colors duration-200
                          {{ $activeJournal ? 'text-primary-black' : 'text-primary-black/60 hover:text-primary-black' }}">
                    Journal
                    <span class="absolute bottom-0 left-0 h-px bg-primary-black
                                 transition-[width] duration-300 ease-out
                                 {{ $activeJournal ? 'w-full' : 'w-0 group-hover:w-full' }}"></span>
                </a>

                {{-- Contact — styled as a CTA button --}}
                <a href="{{ route('contact') }}"
                   class="font-sans text-[13px] font-medium
                          {{ $activeContact
                              ? 'bg-burgundy-dark text-soft-white'
                              : 'bg-burgundy text-soft-white hover:bg-burgundy-dark' }}
                          px-5 py-[10px] rounded
                          transition-colors duration-200 tracking-[0.01em]">
                    Contact
                </a>

            </nav>

            {{-- ── Mobile Hamburger ────────────────────────────────────── --}}
            <button
                @click="mobileOpen = !mobileOpen"
                :aria-expanded="mobileOpen.toString()"
                aria-controls="mobile-menu"
                aria-label="Toggle navigation"
                class="lg:hidden flex flex-col justify-center items-center
                       w-9 h-9 gap-[5px] rounded text-primary-black
                       hover:bg-border-grey/40 transition-colors duration-200 shrink-0">
                <span :class="mobileOpen ? 'translate-y-[7px] rotate-45' : ''"
                      class="block h-px w-[18px] bg-current
                             transition-transform duration-300 ease-out origin-center"></span>
                <span :class="mobileOpen ? 'opacity-0 scale-x-0' : ''"
                      class="block h-px w-[18px] bg-current
                             transition-all duration-300 ease-out"></span>
                <span :class="mobileOpen ? '-translate-y-[7px] -rotate-45' : ''"
                      class="block h-px w-[18px] bg-current
                             transition-transform duration-300 ease-out origin-center"></span>
            </button>

        </div>{{-- /flex row --}}
    </div>{{-- /container --}}

    {{-- ── Mobile Drawer ──────────────────────────────────────────────── --}}
    <div
        id="mobile-menu"
        x-show="mobileOpen"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 -translate-y-1"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-1"
        class="lg:hidden border-t border-border-grey bg-warm-ivory"
    >
        <nav class="max-w-screen-xl mx-auto px-6 pt-2 pb-7 flex flex-col"
             aria-label="Mobile navigation">

            {{-- About --}}
            <a href="{{ route('about') }}"
               @click="mobileOpen = false"
               class="font-sans text-[15px] font-medium py-4 border-b border-border-grey
                      transition-colors duration-200
                      {{ $activeAbout ? 'text-burgundy' : 'text-primary-black hover:text-burgundy' }}">
                About
            </a>

            {{-- Services accordion --}}
            <div x-data="{ open: false }" class="border-b border-border-grey">
                <button @click="open = !open"
                        class="w-full flex items-center justify-between py-4
                               font-sans text-[15px] font-medium text-left
                               transition-colors duration-200
                               {{ $activeServices ? 'text-burgundy' : 'text-primary-black' }}">
                    Services
                    <svg :class="open ? 'rotate-180' : ''"
                         class="w-4 h-4 transition-transform duration-200 shrink-0 text-muted-grey"
                         fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div x-show="open"
                     x-transition:enter="transition ease-out duration-150"
                     x-transition:enter-start="opacity-0 -translate-y-1"
                     x-transition:enter-end="opacity-100 translate-y-0"
                     class="pb-3 space-y-0">
                    @foreach ($services as $svc)
                        <a href="{{ route('services.show', $svc['slug']) }}"
                           @click="mobileOpen = false"
                           class="flex items-center gap-3 px-3 py-2.5 rounded
                                  font-sans text-[14px] text-primary-black/70
                                  hover:text-burgundy hover:bg-border-grey/30
                                  transition-colors duration-150">
                            <span class="w-1 h-1 rounded-full bg-border-grey shrink-0"></span>
                            {{ $svc['label'] }}
                        </a>
                    @endforeach
                    <a href="{{ route('services.index') }}"
                       @click="mobileOpen = false"
                       class="flex items-center gap-2 px-3 py-2 mt-1
                              font-sans text-[12.5px] font-medium text-burgundy">
                        View all services →
                    </a>
                </div>
            </div>

            {{-- Industries accordion --}}
            <div x-data="{ open: false }" class="border-b border-border-grey">
                <button @click="open = !open"
                        class="w-full flex items-center justify-between py-4
                               font-sans text-[15px] font-medium text-left
                               transition-colors duration-200
                               {{ $activeIndustries ? 'text-burgundy' : 'text-primary-black' }}">
                    Industries
                    <svg :class="open ? 'rotate-180' : ''"
                         class="w-4 h-4 transition-transform duration-200 shrink-0 text-muted-grey"
                         fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div x-show="open"
                     x-transition:enter="transition ease-out duration-150"
                     x-transition:enter-start="opacity-0 -translate-y-1"
                     x-transition:enter-end="opacity-100 translate-y-0"
                     class="pb-3 space-y-0">
                    @foreach ($industries as $ind)
                        <a href="{{ route('industries.show', $ind['slug']) }}"
                           @click="mobileOpen = false"
                           class="flex items-center gap-3 px-3 py-2.5 rounded
                                  font-sans text-[14px] text-primary-black/70
                                  hover:text-burgundy hover:bg-border-grey/30
                                  transition-colors duration-150">
                            <span class="w-1 h-1 rounded-full bg-border-grey shrink-0"></span>
                            {{ $ind['label'] }}
                        </a>
                    @endforeach
                    <a href="{{ route('industries.index') }}"
                       @click="mobileOpen = false"
                       class="flex items-center gap-2 px-3 py-2 mt-1
                              font-sans text-[12.5px] font-medium text-burgundy">
                        View all industries →
                    </a>
                </div>
            </div>

            {{-- Journal --}}
            <a href="{{ route('journal.index') }}"
               @click="mobileOpen = false"
               class="font-sans text-[15px] font-medium py-4 border-b border-border-grey
                      transition-colors duration-200
                      {{ $activeJournal ? 'text-burgundy' : 'text-primary-black hover:text-burgundy' }}">
                Journal
            </a>

            {{-- Contact --}}
            <a href="{{ route('contact') }}"
               @click="mobileOpen = false"
               class="mt-6 self-start inline-flex items-center font-sans text-[13px] font-medium
                      bg-burgundy text-soft-white px-5 py-[11px] rounded
                      hover:bg-burgundy-dark transition-colors duration-200">
                Contact
            </a>

        </nav>
    </div>{{-- /mobile drawer --}}

</header>
