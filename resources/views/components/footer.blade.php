{{--
    Footer — Payal Dasgupta
    ─────────────────────────────────────────────────────────────────────────
    · Dark background (#171717) · Primary text: warm-ivory
    · Secondary text: #B8B1A8 · Dividers: #343434
    · Burgundy used only for the CTA button
    · 4-column grid on desktop (brand col wider), stacked on mobile
    · SEO content block below main columns (subtle, readable, not keyword-stuffed)
    · Bottom bar: copyright · legal links · editorial sign-off · powered-by
--}}

@php
    $expertise = [
        ['label' => 'Strategic Communications', 'href' => route('services.show', 'strategic-communications')],
        ['label' => 'Public Relations',          'href' => route('services.show', 'public-relations')],
        ['label' => 'Brand Storytelling',        'href' => route('services.show', 'brand-storytelling')],
        ['label' => 'Founder Positioning',       'href' => route('services.show', 'founder-positioning')],
        ['label' => 'Thought Leadership',        'href' => route('services.show', 'thought-leadership')],
        ['label' => 'Media Relations',           'href' => route('services.show', 'media-relations')],
        ['label' => 'Brand Reputation',          'href' => route('services.show', 'brand-reputation')],
        ['label' => 'Launch Communications',     'href' => route('services.show', 'launch-communications')],
        ['label' => 'PR Strategy',               'href' => route('services.show', 'pr-strategy')],
    ];

    $industries = [
        ['label' => 'Technology & AI',          'href' => route('industries.show', 'technology-ai')],
        ['label' => 'Startups',                 'href' => route('industries.show', 'startups')],
        ['label' => 'Fintech',                  'href' => route('industries.show', 'fintech')],
        ['label' => 'Edtech',                   'href' => route('industries.show', 'edtech')],
        ['label' => 'Healthtech',               'href' => route('industries.show', 'healthtech')],
        ['label' => 'Healthcare',               'href' => route('industries.show', 'healthcare')],
        ['label' => 'Aerospace & Aviation',     'href' => route('industries.show', 'aerospace-aviation')],
        ['label' => 'Real Estate',              'href' => route('industries.show', 'real-estate')],
        ['label' => 'Architecture & Interiors', 'href' => route('industries.show', 'architecture-interiors')],
        ['label' => 'FMCG',                     'href' => route('industries.show', 'fmcg')],
        ['label' => 'Consumer Brands',          'href' => route('industries.show', 'consumer-brands')],
    ];

    $explore = [
        ['label' => 'About Payal',  'href' => route('about'),            'external' => false],
        ['label' => 'Services',     'href' => route('services.index'),   'external' => false],
        ['label' => 'Industries',   'href' => route('industries.index'), 'external' => false],
        ['label' => 'Journal',      'href' => route('journal.index'),    'external' => false],
        ['label' => 'Contact',      'href' => route('contact'),          'external' => false],
        ['label' => 'LinkedIn',     'href' => 'https://www.linkedin.com/in/payyal-daasgupta-782aa510b/', 'external' => true],
    ];
@endphp

<footer class="bg-primary-black text-warm-ivory" aria-label="Site footer">

    {{-- ── Main Footer ─────────────────────────────────────────────────── --}}
    <div class="max-w-screen-xl mx-auto px-6 lg:px-12 xl:px-16 pt-20 lg:pt-28 pb-16">

        {{-- 4-column grid: brand col is wider --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-[2fr_1.1fr_1.1fr_1fr]
                    gap-14 lg:gap-10 xl:gap-14">

            {{-- ── Column 1: Brand ───────────────────────────────────────── --}}
            <div class="sm:col-span-2 lg:col-span-1">

                {{-- Name --}}
                <a href="/" class="group inline-block">
                    <span class="font-serif text-[1.6rem] lg:text-[1.75rem] text-warm-ivory
                                 leading-none tracking-tight
                                 transition-colors duration-200 group-hover:text-footer-secondary">
                        Payal Dasgupta
                    </span>
                </a>

                {{-- Sub-tagline --}}
                <p class="mt-3 font-sans text-[10px] uppercase tracking-[0.2em] text-footer-secondary">
                    Communications Strategist · PR Professional · Brand Storyteller
                </p>

                {{-- SEO intro --}}
                <p class="mt-6 font-sans text-[14px] leading-[1.75] text-footer-secondary max-w-sm lg:max-w-none">
                    Helping founders, startups, businesses and organisations build stronger
                    narratives through strategic communications, public relations, brand
                    storytelling, thought leadership and founder positioning.
                </p>

                {{-- Location --}}
                <p class="mt-4 font-sans text-[12px] text-muted-grey tracking-wide">
                    Based in Bengaluru, India.
                </p>

                {{-- CTA --}}
                <a href="{{ route('contact') }}"
                   class="mt-7 inline-flex items-center font-sans text-[13px] font-medium
                          bg-burgundy text-soft-white
                          px-5 py-[11px] rounded
                          hover:bg-burgundy-dark
                          transition-colors duration-200">
                    Start a Conversation
                </a>

            </div>

            {{-- ── Column 2: Expertise ────────────────────────────────── --}}
            <div>
                <h3 class="font-sans text-[10px] uppercase tracking-[0.2em] text-muted-grey mb-6">
                    Expertise
                </h3>
                <ul class="flex flex-col gap-3">
                    @foreach ($expertise as $item)
                        <li>
                            <a href="{{ $item['href'] }}"
                               class="font-sans text-[13.5px] text-footer-secondary
                                      hover:text-warm-ivory transition-colors duration-200
                                      leading-snug">
                                {{ $item['label'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            {{-- ── Column 3: Industries ───────────────────────────────── --}}
            <div>
                <h3 class="font-sans text-[10px] uppercase tracking-[0.2em] text-muted-grey mb-6">
                    Industries
                </h3>
                <ul class="flex flex-col gap-3">
                    @foreach ($industries as $item)
                        <li>
                            <a href="{{ $item['href'] }}"
                               class="font-sans text-[13.5px] text-footer-secondary
                                      hover:text-warm-ivory transition-colors duration-200
                                      leading-snug">
                                {{ $item['label'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            {{-- ── Column 4: Explore ──────────────────────────────────── --}}
            <div>
                <h3 class="font-sans text-[10px] uppercase tracking-[0.2em] text-muted-grey mb-6">
                    Explore
                </h3>
                <ul class="flex flex-col gap-3">
                    @foreach ($explore as $item)
                        <li>
                            <a href="{{ $item['href'] }}"
                               @if ($item['external']) target="_blank" rel="noopener noreferrer" @endif
                               class="font-sans text-[13.5px] text-footer-secondary
                                      hover:text-warm-ivory transition-colors duration-200
                                      leading-snug inline-flex items-center gap-1.5 group">
                                {{ $item['label'] }}
                                @if ($item['external'])
                                    <svg class="w-2.5 h-2.5 opacity-50 group-hover:opacity-80
                                                transition-opacity duration-200 shrink-0"
                                         viewBox="0 0 10 10" fill="none" aria-hidden="true">
                                        <path d="M1 9L9 1M9 1H3.5M9 1V6.5"
                                              stroke="currentColor" stroke-width="1.2"
                                              stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                @endif
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

        </div>{{-- /grid --}}

        {{-- ── SEO Content Block ─────────────────────────────────────────── --}}
        <div class="mt-16 lg:mt-20 pt-12 border-t border-footer-divider">
            <h2 class="font-serif text-[1rem] lg:text-[1.1rem] text-warm-ivory/80
                       leading-snug mb-4">
                Communications Strategist &amp; PR Professional in Bengaluru
            </h2>
            <p class="font-sans text-[13px] leading-[1.8] text-muted-grey max-w-4xl">
                Payal Dasgupta is a communications strategist and PR professional based in
                Bengaluru with nearly 12 years of experience across technology, startups,
                fintech, edtech, healthtech, healthcare, aerospace, aviation, real estate,
                architecture, FMCG and consumer brands. Her work spans strategic communications,
                public relations, media relations, brand storytelling, founder positioning,
                thought leadership, reputation building and campaign communications.
            </p>
        </div>

        {{-- ── Bottom Bar ───────────────────────────────────────────────── --}}
        <div class="mt-10 pt-7 border-t border-footer-divider">

            {{-- Row 1: Copyright + legal links --}}
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between
                        gap-4 sm:gap-6">

                <p class="font-sans text-[12px] text-muted-grey">
                    &copy; {{ date('Y') }} Payal Dasgupta. All rights reserved.
                </p>

                <div class="flex items-center gap-5">
                    <a href="{{ route('privacy') }}"
                       class="font-sans text-[12px] text-muted-grey hover:text-footer-secondary
                              transition-colors duration-200">
                        Privacy Policy
                    </a>
                    <a href="{{ route('terms') }}"
                       class="font-sans text-[12px] text-muted-grey hover:text-footer-secondary
                              transition-colors duration-200">
                        Terms
                    </a>
                    <a href="https://www.linkedin.com/in/payyal-daasgupta-782aa510b/"
                       target="_blank" rel="noopener noreferrer"
                       class="font-sans text-[12px] text-muted-grey hover:text-footer-secondary
                              transition-colors duration-200">
                        LinkedIn
                    </a>
                </div>

            </div>

            {{-- Row 2: Editorial sign-off + Powered by --}}
            <div class="mt-6 flex flex-col sm:flex-row sm:items-end sm:justify-between
                        gap-3 sm:gap-6">

                <p class="font-serif italic text-[13px] text-muted-grey/70 leading-snug">
                    Good stories travel. Great stories give people a reason to carry them forward.
                </p>

                <a href="https://www.obiikriationz.com"
                   target="_blank" rel="noopener noreferrer"
                   class="font-sans text-[10.5px] text-muted-grey/50
                          hover:text-muted-grey transition-colors duration-200
                          tracking-wide shrink-0">
                    Powered by Obii Kriationz Web LLP
                </a>

            </div>

        </div>{{-- /bottom bar --}}

    </div>{{-- /container --}}

</footer>
