@extends('layouts.app')

@section('title', 'Journal — Payal Dasgupta')
@section('meta_description', 'Thinking on communications, PR, brand storytelling, thought leadership and the craft of making ideas travel.')

@section('content')

    {{-- ── Hero ─────────────────────────────────────────────────────────────── --}}
    <section class="bg-warm-ivory border-b border-border-grey pt-20 pb-16 lg:pt-28 lg:pb-20">
        <div class="max-w-screen-xl mx-auto px-6 lg:px-12 xl:px-16">
            <p class="font-sans text-[11px] uppercase tracking-[0.24em] text-muted-grey mb-5">
                Journal
            </p>
            <h1 class="font-serif text-[clamp(2.2rem,5vw,4rem)]
                        text-primary-black leading-[1.0] tracking-tight max-w-3xl">
                Thinking on communication, narrative and the craft of being understood.
            </h1>
        </div>
    </section>

    {{-- ── Post grid ───────────────────────────────────────────────────────── --}}
    <section class="bg-soft-white py-20 lg:py-28">
        <div class="max-w-screen-xl mx-auto px-6 lg:px-12 xl:px-16">

            @if ($posts->isEmpty())
                <p class="font-sans text-[15px] text-muted-grey">No posts yet.</p>
            @else
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-0">
                    @foreach ($posts as $post)
                        @include('journal._card', ['post' => $post])
                    @endforeach
                </div>

                {{-- Pagination --}}
                @if ($posts->hasPages())
                    <div class="mt-14 pt-8 border-t border-border-grey">
                        {{ $posts->links() }}
                    </div>
                @endif
            @endif

        </div>
    </section>

@endsection
