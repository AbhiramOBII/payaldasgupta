@extends('layouts.app')

@section('title', 'Privacy Policy — Payal Dasgupta')
@section('meta_description', 'Privacy Policy for payaldasgupta.com — how we collect, use and protect your information.')

@section('content')

<div class="max-w-screen-xl mx-auto px-6 lg:px-12 xl:px-16 py-20 lg:py-28">

    {{-- Page header --}}
    <div class="max-w-2xl mb-14">
        <p class="font-sans text-[11px] uppercase tracking-[0.2em] text-muted-grey mb-4">Legal</p>
        <h1 class="font-serif text-[2.4rem] lg:text-[3rem] text-primary-black leading-[1.15] tracking-tight">
            Privacy Policy
        </h1>
    </div>

    {{-- Content --}}
    <div class="max-w-3xl">
        <div class="prose-legal font-sans text-[15px] leading-[1.8] text-primary-black/80 space-y-5">
            {!! $content !!}
        </div>

        {{-- Back link --}}
        <div class="mt-16 pt-8 border-t border-border-grey">
            <a href="/"
               class="font-sans text-[13px] font-medium text-muted-grey
                      hover:text-primary-black transition-colors duration-200
                      inline-flex items-center gap-2">
                ← Back to home
            </a>
        </div>
    </div>

</div>

@endsection
