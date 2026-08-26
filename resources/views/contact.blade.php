@extends('layouts.app')

@section('title', 'Contact — Payal Dasgupta')
@section('meta_description', 'Get in touch with Payal Dasgupta — communications strategist and PR professional based in Bengaluru.')

@section('content')

    {{-- ── Hero ─────────────────────────────────────────────────────────────── --}}
    <section class="bg-warm-ivory border-b border-border-grey pt-20 pb-16 lg:pt-28 lg:pb-20">
        <div class="max-w-screen-xl mx-auto px-6 lg:px-12 xl:px-16">
            <p class="font-sans text-[11px] uppercase tracking-[0.24em] text-muted-grey mb-5">
                Contact
            </p>
            <h1 class="font-serif text-[clamp(2.4rem,5vw,4.2rem)]
                        text-primary-black leading-[1.0] tracking-tight max-w-2xl">
                Every engagement starts with a conversation.
            </h1>
            <p class="font-sans text-[15.5px] text-muted-grey leading-[1.8] mt-6 max-w-lg">
                Whether you have a brief, a vague idea or just a communications problem
                you can't quite articulate yet — reach out. That's what first conversations
                are for.
            </p>
        </div>
    </section>

    {{-- ── Main content ────────────────────────────────────────────────────── --}}
    <section class="bg-soft-white py-16 lg:py-24">
        <div class="max-w-screen-xl mx-auto px-6 lg:px-12 xl:px-16">

            <div class="grid grid-cols-1 lg:grid-cols-[360px_1fr] xl:grid-cols-[400px_1fr]
                         gap-14 xl:gap-24">

                {{-- ── Left: contact details ─────────────────────────────────── --}}
                <aside class="space-y-10 lg:pt-2">

                    {{-- Direct contact --}}
                    <div>
                        <p class="font-sans text-[10.5px] uppercase tracking-[0.22em]
                                   text-muted-grey mb-5">
                            Reach out directly
                        </p>

                        <div class="space-y-5">

                            {{-- Primary email --}}
                            <div>
                                <p class="font-sans text-[11px] text-muted-grey/60 mb-1">Email</p>
                                <a href="mailto:reachme@payaldasgupta.com"
                                   class="font-sans text-[15px] font-medium text-primary-black
                                          hover:text-burgundy transition-colors duration-200
                                          inline-flex items-center gap-2 group">
                                    reachme@payaldasgupta.com
                                    <svg class="w-3.5 h-3.5 opacity-0 group-hover:opacity-60
                                                transition-opacity duration-200"
                                         fill="none" stroke="currentColor" stroke-width="1.8"
                                         viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                                    </svg>
                                </a>
                            </div>

                            {{-- Gmail --}}
                            <div>
                                <p class="font-sans text-[11px] text-muted-grey/60 mb-1">Also at</p>
                                <a href="mailto:payyaldaasgupta@gmail.com"
                                   class="font-sans text-[15px] font-medium text-primary-black
                                          hover:text-burgundy transition-colors duration-200
                                          inline-flex items-center gap-2 group">
                                    payyaldaasgupta@gmail.com
                                    <svg class="w-3.5 h-3.5 opacity-0 group-hover:opacity-60
                                                transition-opacity duration-200"
                                         fill="none" stroke="currentColor" stroke-width="1.8"
                                         viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                                    </svg>
                                </a>
                            </div>

                            {{-- Phone --}}
                            <div>
                                <p class="font-sans text-[11px] text-muted-grey/60 mb-1">Phone / WhatsApp</p>
                                <a href="tel:+917679239780"
                                   class="font-sans text-[15px] font-medium text-primary-black
                                          hover:text-burgundy transition-colors duration-200">
                                    +91 76792 39780
                                </a>
                            </div>

                            {{-- LinkedIn --}}
                            <div>
                                <p class="font-sans text-[11px] text-muted-grey/60 mb-1">LinkedIn</p>
                                <a href="https://www.linkedin.com/in/payyal-daasgupta-782aa510b/"
                                   target="_blank" rel="noopener noreferrer"
                                   class="font-sans text-[15px] font-medium text-primary-black
                                          hover:text-burgundy transition-colors duration-200
                                          inline-flex items-center gap-2 group">
                                    linkedin.com/in/payyal-daasgupta
                                    <svg class="w-3.5 h-3.5 opacity-0 group-hover:opacity-60
                                                transition-opacity duration-200"
                                         fill="none" stroke="currentColor" stroke-width="1.8"
                                         viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                                    </svg>
                                </a>
                            </div>

                        </div>
                    </div>

                    {{-- Divider --}}
                    <div class="border-t border-border-grey"></div>

                    {{-- Response note --}}
                    <div>
                        <p class="font-sans text-[10.5px] uppercase tracking-[0.22em]
                                   text-muted-grey mb-4">
                            What happens next
                        </p>
                        <div class="space-y-4">
                            <div class="flex items-start gap-3">
                                <span class="mt-1.5 shrink-0 w-1 h-1 rounded-full bg-burgundy"></span>
                                <p class="font-sans text-[13.5px] text-muted-grey leading-[1.7]">
                                    You'll hear back within <strong class="text-primary-black font-medium">24–48 hours</strong>.
                                </p>
                            </div>
                            <div class="flex items-start gap-3">
                                <span class="mt-1.5 shrink-0 w-1 h-1 rounded-full bg-burgundy"></span>
                                <p class="font-sans text-[13.5px] text-muted-grey leading-[1.7]">
                                    A first conversation is always a listening call — no pitch, no proposal until we both feel it makes sense.
                                </p>
                            </div>
                            <div class="flex items-start gap-3">
                                <span class="mt-1.5 shrink-0 w-1 h-1 rounded-full bg-burgundy"></span>
                                <p class="font-sans text-[13.5px] text-muted-grey leading-[1.7]">
                                    Not sure what you need yet? That's fine. Most useful conversations start there.
                                </p>
                            </div>
                        </div>
                    </div>

                    {{-- Editorial pull quote --}}
                    <div class="border-l-2 border-burgundy pl-5">
                        <p class="font-serif italic text-[1.05rem] text-primary-black/70
                                   leading-[1.6]">
                            "Good communications work starts with good questions, not good answers."
                        </p>
                    </div>

                </aside>

                {{-- ── Right: enquiry form ───────────────────────────────────── --}}
                <div>

                    {{-- Success state --}}
                    @if (session('success'))
                        <div class="border border-green-200 bg-green-50 rounded-lg px-7 py-8 mb-8"
                             x-data x-init="window.scrollTo({ top: 0, behavior: 'smooth' })">
                            <div class="flex items-start gap-4">
                                <div class="shrink-0 w-9 h-9 rounded-full bg-green-100
                                            flex items-center justify-center mt-0.5">
                                    <svg class="w-4.5 h-4.5 text-green-600" fill="none"
                                         stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                                    </svg>
                                </div>
                                <div>
                                    <p class="font-sans text-[15px] font-semibold text-green-800">
                                        Message received.
                                    </p>
                                    <p class="font-sans text-[13.5px] text-green-700 mt-1 leading-[1.7]">
                                        Thank you for reaching out. You'll hear back within 24–48 hours.
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endif

                    {{-- Form --}}
                    <form method="POST" action="{{ route('contact.store') }}"
                          class="space-y-6" novalidate>
                        @csrf

                        {{-- Row: Name + Email --}}
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            <div>
                                <label for="name" class="form-label">
                                    Full Name <span class="text-red-400">*</span>
                                </label>
                                <input type="text" id="name" name="name"
                                       value="{{ old('name') }}"
                                       autocomplete="name"
                                       class="form-input @error('name') border-red-400 @enderror"
                                       placeholder="Your name">
                                @error('name')
                                    <p class="form-error">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="email" class="form-label">
                                    Email Address <span class="text-red-400">*</span>
                                </label>
                                <input type="email" id="email" name="email"
                                       value="{{ old('email') }}"
                                       autocomplete="email"
                                       class="form-input @error('email') border-red-400 @enderror"
                                       placeholder="you@company.com">
                                @error('email')
                                    <p class="form-error">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        {{-- Row: Phone + Company --}}
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            <div>
                                <label for="phone" class="form-label">
                                    Phone
                                    <span class="font-normal text-muted-grey/60 normal-case tracking-normal">(optional)</span>
                                </label>
                                <input type="tel" id="phone" name="phone"
                                       value="{{ old('phone') }}"
                                       autocomplete="tel"
                                       class="form-input @error('phone') border-red-400 @enderror"
                                       placeholder="+91 98765 43210">
                                @error('phone')
                                    <p class="form-error">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="company" class="form-label">
                                    Company / Organisation
                                    <span class="font-normal text-muted-grey/60 normal-case tracking-normal">(optional)</span>
                                </label>
                                <input type="text" id="company" name="company"
                                       value="{{ old('company') }}"
                                       class="form-input @error('company') border-red-400 @enderror"
                                       placeholder="Your company name">
                                @error('company')
                                    <p class="form-error">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        {{-- Service interest --}}
                        <div>
                            <label for="service_interest" class="form-label">
                                I am interested in
                                <span class="font-normal text-muted-grey/60 normal-case tracking-normal">(optional)</span>
                            </label>
                            <select id="service_interest" name="service_interest"
                                    class="form-input @error('service_interest') border-red-400 @enderror">
                                <option value="">— Select a service —</option>
                                @foreach ($services as $svc)
                                    <option value="{{ $svc }}"
                                            {{ old('service_interest') === $svc ? 'selected' : '' }}>
                                        {{ $svc }}
                                    </option>
                                @endforeach
                            </select>
                            @error('service_interest')
                                <p class="form-error">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Message --}}
                        <div>
                            <label for="message" class="form-label">
                                Message <span class="text-red-400">*</span>
                            </label>
                            <p class="font-sans text-[11px] text-muted-grey/60 mb-2">
                                Tell me about your business, what you're working on and what kind of help you're looking for. The more context, the better.
                            </p>
                            <textarea id="message" name="message" rows="6"
                                      class="form-input @error('message') border-red-400 @enderror"
                                      placeholder="What's the communications challenge you're trying to solve?">{{ old('message') }}</textarea>
                            @error('message')
                                <p class="form-error">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Submit --}}
                        <div class="flex items-center justify-between pt-2">
                            <button type="submit"
                                    class="inline-flex items-center gap-2
                                           font-sans text-[14px] font-medium
                                           bg-burgundy text-soft-white
                                           px-7 py-3.5 rounded
                                           hover:bg-burgundy-dark
                                           transition-colors duration-200 group">
                                Send Message
                                <svg class="w-4 h-4 transition-transform duration-200 group-hover:translate-x-0.5"
                                     fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                                </svg>
                            </button>
                            <p class="font-sans text-[11.5px] text-muted-grey/60 text-right max-w-[180px]">
                                Your details are never shared with anyone.
                            </p>
                        </div>

                    </form>

                </div>{{-- /form col --}}

            </div>{{-- /grid --}}

        </div>
    </section>

@endsection
