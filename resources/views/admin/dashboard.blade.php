@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

    {{-- Welcome banner --}}
    <div class="bg-white border border-border-grey rounded-lg px-7 py-6 mb-8">
        <p class="font-sans text-[11px] uppercase tracking-[0.18em] text-muted-grey mb-1">
            Welcome back
        </p>
        <h2 class="font-serif text-[1.6rem] text-primary-black leading-tight">
            {{ auth()->user()->name }}
        </h2>
        <p class="font-sans text-[13.5px] text-muted-grey mt-1">
            Manage your content, stories and brand narrative from here.
        </p>
    </div>

    {{-- Quick-access cards --}}
    @php
        $cards = [
            ['label' => 'Work & Stories',  'desc' => 'Add or edit case studies and featured work.',   'soon' => true ],
            ['label' => 'Insights',        'desc' => 'Publish articles, essays and thought pieces.',  'soon' => true ],
            ['label' => 'Services',        'desc' => 'Update your service offerings and descriptions.','soon' => true ],
            ['label' => 'Media & Assets',  'desc' => 'Upload logos, headshots and press materials.',  'soon' => true ],
        ];
    @endphp

    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4">
        @foreach ($cards as $card)
            <div class="bg-white border border-border-grey rounded-lg px-5 py-5
                         hover:border-primary-black/30 transition-colors duration-200">
                <div class="flex items-start justify-between mb-4">
                    <h3 class="font-sans text-[13px] font-semibold text-primary-black">
                        {{ $card['label'] }}
                    </h3>
                    @if ($card['soon'])
                        <span class="font-sans text-[9.5px] uppercase tracking-[0.12em]
                                     text-muted-grey/60 bg-border-grey/40 px-2 py-0.5 rounded">
                            Soon
                        </span>
                    @endif
                </div>
                <p class="font-sans text-[12.5px] text-muted-grey leading-relaxed">
                    {{ $card['desc'] }}
                </p>
            </div>
        @endforeach
    </div>

    {{-- View live site --}}
    <div class="mt-8 flex items-center gap-3">
        <a href="/" target="_blank"
           class="inline-flex items-center gap-2 font-sans text-[12.5px] font-medium
                  text-muted-grey hover:text-primary-black transition-colors duration-200">
            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
            </svg>
            View live website
        </a>
    </div>

@endsection
