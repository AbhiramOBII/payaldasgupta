{{--
    Reusable post card.
    Props: $post (Post model)
    Optional: $featured (bool) — larger treatment for the first card
--}}
@php $featured ??= false; @endphp

<a href="{{ route('journal.show', $post->slug) }}"
   class="group flex flex-col border-t-2 border-border-grey hover:border-burgundy
          transition-colors duration-300 ease-out pt-7 pb-10 pr-6 xl:pr-10 block">

    {{-- Featured image --}}
    @if ($post->featured_image)
        <div class="mb-5 overflow-hidden rounded">
            <img src="{{ $post->featuredImageUrl() }}" alt="{{ $post->title }}"
                 class="w-full {{ $featured ? 'h-52' : 'h-36' }} object-cover
                         transition-transform duration-500 group-hover:scale-[1.03]">
        </div>
    @endif

    {{-- Category --}}
    @if ($post->category)
        <span class="font-sans text-[10.5px] font-medium uppercase tracking-[0.18em]
                     text-muted-grey/60 group-hover:text-burgundy
                     transition-colors duration-300 mb-3 block">
            {{ $post->category }}
        </span>
    @endif

    {{-- Title --}}
    <h2 class="{{ $featured ? 'text-[1.55rem] lg:text-[1.7rem]' : 'text-[1.25rem] lg:text-[1.4rem]' }}
               font-serif text-primary-black leading-[1.15] tracking-tight
               group-hover:text-burgundy transition-colors duration-300 mb-3 flex-1">
        {{ $post->title }}
    </h2>

    {{-- Excerpt --}}
    @if ($post->excerpt)
        <p class="font-sans text-[13.5px] text-muted-grey leading-[1.75]
                   line-clamp-3 mb-5">
            {{ $post->excerpt }}
        </p>
    @endif

    {{-- Meta: date + reading time --}}
    <div class="flex items-center gap-3 mt-auto">
        @if ($post->published_at)
            <span class="font-sans text-[11.5px] text-muted-grey/60">
                {{ $post->published_at->format('d M Y') }}
            </span>
        @endif
        @if ($post->reading_time)
            <span class="text-muted-grey/30 text-[10px]">·</span>
            <span class="font-sans text-[11.5px] text-muted-grey/60">
                {{ $post->reading_time }} min read
            </span>
        @endif
    </div>

</a>
