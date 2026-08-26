@extends('layouts.app')

@section('title', 'About — Payal Dasgupta')
@section('meta_description', 'Payal Dasgupta is a communications strategist, PR professional and brand storyteller with nearly 12 years of experience across technology, startups, healthcare, aerospace, real estate and more.')

@section('content')

    {{-- ═══════════════════════════════════════════════════════════════════════
         SECTION 1 — Hero: image + intro
    ═══════════════════════════════════════════════════════════════════════════ --}}
    <section class="bg-warm-ivory border-b border-border-grey overflow-hidden">
        <div class="max-w-screen-xl mx-auto px-6 lg:px-12 xl:px-16">

            <div class="grid grid-cols-1 lg:grid-cols-[1fr_420px] xl:grid-cols-[1fr_480px]
                         gap-0 items-center">

                {{-- ── Left: copy ──────────────────────────────────────────── --}}
                <div class="py-20 lg:py-28 xl:py-36 pr-0 lg:pr-16 xl:pr-24
                             flex flex-col justify-center">

                    <p class="font-sans text-[11px] uppercase tracking-[0.24em]
                               text-muted-grey mb-6">
                        About
                    </p>

                    <h1 class="font-serif text-[clamp(2rem,4vw,3.4rem)]
                                text-primary-black leading-[1.08] tracking-tight max-w-xl">
                        Communication begins with understanding what really matters.
                    </h1>

                    <div class="w-10 h-px bg-border-grey my-8"></div>

                    <div class="space-y-5 max-w-[560px]">
                        <p class="font-sans text-[15.5px] text-primary-black/70 leading-[1.85]">
                            I'm <strong class="text-primary-black font-semibold">Payal Dasgupta</strong>,
                            a communications strategist, PR professional and brand storyteller with
                            nearly 12 years of experience helping businesses, founders and organisations
                            find their voice, sharpen their narrative and become part of conversations
                            that matter.
                        </p>
                        <p class="font-sans text-[15.5px] text-primary-black/70 leading-[1.85]">
                            My work has taken me across technology, startups, healthcare, aerospace,
                            aviation, real estate, architecture, consumer brands and emerging industries.
                        </p>
                        <p class="font-sans text-[15.5px] text-primary-black/70 leading-[1.85]">
                            The sectors may change.
                        </p>
                        <p class="font-sans text-[15.5px] text-primary-black font-medium leading-[1.85]">
                            The fundamental question rarely does:<br>
                            <em class="font-serif font-normal text-[1.15em] not-italic">
                                What is the real story here — and why should anyone care?
                            </em>
                        </p>
                    </div>

                    <a href="{{ route('services.index') }}"
                       class="mt-10 self-start inline-flex items-center gap-2
                              font-sans text-[13.5px] font-medium text-primary-black/60
                              hover:text-primary-black transition-colors duration-200 group">
                        Explore My Work
                        <span class="transition-transform duration-200 group-hover:translate-x-1">→</span>
                    </a>

                </div>

                {{-- ── Right: portrait ─────────────────────────────────────── --}}
                <div class="hidden lg:flex items-center justify-center py-20">
                    <div class="relative w-full max-w-[400px] xl:max-w-[440px]">
                        <img src="{{ asset('images/payal-2.webp') }}"
                             alt="Payal Dasgupta — Communications Strategist"
                             class="w-full aspect-[4/5] object-cover object-center
                                    rounded-2xl grayscale">
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- Mobile portrait --}}
    <div class="lg:hidden border-b border-border-grey bg-warm-ivory px-6 pb-14">
        <img src="{{ asset('images/payal-2.webp') }}"
             alt="Payal Dasgupta"
             class="w-full max-h-[440px] object-cover object-center rounded-2xl grayscale">
    </div>


    {{-- ═══════════════════════════════════════════════════════════════════════
         SECTION 2 — Philosophy statement (dark)
    ═══════════════════════════════════════════════════════════════════════════ --}}
    <section class="bg-primary-black py-24 lg:py-36 border-b border-[#2a2a2a]">
        <div class="max-w-screen-xl mx-auto px-6 lg:px-12 xl:px-16">

            {{-- Three large lines --}}
            <div class="space-y-2 lg:space-y-3 max-w-4xl">
                <h2 class="font-serif text-[clamp(2rem,4.5vw,4rem)]
                            text-warm-ivory leading-[1.05] tracking-tight">
                    Find what matters.
                </h2>
                <h2 class="font-serif text-[clamp(2rem,4.5vw,4rem)]
                            text-warm-ivory/70 leading-[1.05] tracking-tight">
                    Find who should care.
                </h2>
                <h2 class="font-serif text-[clamp(2rem,4.5vw,4rem)]
                            text-warm-ivory/40 leading-[1.05] tracking-tight">
                    Find the most compelling way to tell them why.
                </h2>
            </div>

            {{-- Supporting line --}}
            <div class="mt-12 lg:mt-16 border-t border-[#2a2a2a] pt-10 max-w-2xl">
                <p class="font-sans text-[16px] text-footer-secondary leading-[1.9]">
                    That philosophy has shaped almost everything I have done professionally.
                </p>
            </div>

        </div>
    </section>


    {{-- ═══════════════════════════════════════════════════════════════════════
         SECTION 3 — The person behind the professional
    ═══════════════════════════════════════════════════════════════════════════ --}}
    <section class="bg-soft-white py-20 lg:py-32 border-b border-border-grey">
        <div class="max-w-screen-xl mx-auto px-6 lg:px-12 xl:px-16">

            <div class="grid grid-cols-1 lg:grid-cols-[260px_1fr] xl:grid-cols-[320px_1fr] gap-12 lg:gap-20">

                {{-- Sticky label column --}}
                <div class="lg:pt-1">
                    <p class="font-sans text-[10.5px] uppercase tracking-[0.22em]
                               text-muted-grey mb-4">
                        Beyond the work
                    </p>
                    <h2 class="font-serif text-[1.6rem] lg:text-[1.85rem]
                                text-primary-black leading-tight tracking-tight lg:sticky lg:top-28">
                        The person behind the professional.
                    </h2>
                </div>

                {{-- Prose column --}}
                <div class="space-y-6 font-sans text-[15.5px] text-primary-black/70 leading-[1.9] max-w-[640px]">

                    <p>
                        There is life beyond press releases, media lists, presentations
                        and campaign trackers.
                    </p>

                    <p>
                        I am an avid reader — which frequently means buying books faster
                        than I can finish them.
                    </p>

                    <p>
                        I am a cynophilist, and remain convinced that dogs understand
                        the art of living in the moment considerably better than most
                        communications professionals.
                    </p>

                    <p>
                        I love travelling. New places, people and cultures have a way
                        of changing how you see things — and sometimes the best ideas
                        come from simply looking at the world from somewhere else.
                    </p>

                    <p>
                        And somewhere along the way, I decided to make Bengaluru home.
                    </p>

                    <p>
                        The city is ambitious, diverse, entrepreneurial and constantly
                        reinventing itself. The traffic appears to have developed its own
                        communications strategy.
                    </p>

                    <p>
                        But somehow, Bengaluru manages to be simultaneously exhausting
                        and irresistible.
                    </p>

                    <p class="text-primary-black font-medium">
                        So I am here — trying to make the city home for all the right reasons.
                    </p>

                </div>

            </div>

        </div>
    </section>


    {{-- ═══════════════════════════════════════════════════════════════════════
         SECTION 4 — PR Philosophy
    ═══════════════════════════════════════════════════════════════════════════ --}}
    <section class="bg-warm-ivory py-20 lg:py-32 border-b border-border-grey">
        <div class="max-w-screen-xl mx-auto px-6 lg:px-12 xl:px-16">

            <div class="grid grid-cols-1 lg:grid-cols-[1fr_1fr] gap-14 lg:gap-24 xl:gap-32">

                {{-- Left: headline block --}}
                <div class="lg:pt-1">
                    <p class="font-sans text-[10.5px] uppercase tracking-[0.22em]
                               text-muted-grey mb-5">
                        PR Philosophy
                    </p>
                    <h2 class="font-serif text-[clamp(1.7rem,3vw,2.6rem)]
                                text-primary-black leading-[1.1] tracking-tight">
                        PR is part art. Part science. And very human.
                    </h2>
                    <div class="w-8 h-px bg-border-grey mt-8 mb-8"></div>
                    <p class="font-sans text-[14.5px] text-muted-grey leading-[1.85] max-w-sm">
                        I have never believed that good public relations is simply about knowing
                        journalists or writing clever pitches.
                    </p>
                    <p class="font-sans text-[14.5px] text-muted-grey leading-[1.85] mt-5 max-w-sm">
                        After nearly 12 years, I have learned that the strongest communications
                        campaigns happen when all of these elements come together.
                    </p>
                </div>

                {{-- Right: element list --}}
                <div class="lg:pt-1">
                    @php
                        $elements = [
                            ['word' => 'Research',      'rest' => 'behind identifying the right audience.'],
                            ['word' => 'Psychology',    'rest' => 'behind understanding what people care about.'],
                            ['word' => 'Strategy',      'rest' => 'behind selecting the narrative.'],
                            ['word' => 'Data',          'rest' => 'behind evaluating what works.'],
                            ['word' => 'Timing',        'rest' => 'behind creating relevance.'],
                            ['word' => 'Creativity',    'rest' => 'behind finding the hook.'],
                            ['word' => 'Relationships', 'rest' => 'behind almost everything.'],
                        ];
                    @endphp

                    <ul class="divide-y divide-border-grey">
                        @foreach ($elements as $el)
                            <li class="py-5 flex items-baseline gap-4 group">
                                <span class="shrink-0 w-1.5 h-1.5 rounded-full bg-burgundy
                                             mt-[0.55em] self-start"></span>
                                <p class="font-sans text-[15px] text-primary-black/75 leading-[1.75]">
                                    There is
                                    <strong class="font-semibold text-primary-black">{{ $el['word'] }}</strong>
                                    behind {{ $el['rest'] }}
                                </p>
                            </li>
                        @endforeach
                    </ul>
                </div>

            </div>

        </div>
    </section>


    {{-- ═══════════════════════════════════════════════════════════════════════
         CTA strip
    ═══════════════════════════════════════════════════════════════════════════ --}}
    <section class="bg-primary-black py-16 lg:py-20">
        <div class="max-w-screen-xl mx-auto px-6 lg:px-12 xl:px-16
                     flex flex-col lg:flex-row lg:items-center lg:justify-between gap-8">
            <div>
                <p class="font-serif italic text-[clamp(1.3rem,2.5vw,2rem)]
                           text-warm-ivory leading-tight">
                    Ready to work together?
                </p>
                <p class="font-sans text-[14px] text-footer-secondary mt-2">
                    Every engagement starts with a conversation.
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
