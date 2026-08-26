@extends('layouts.admin')

@section('title', 'Journal')

@section('content')

    {{-- Header row --}}
    <div class="flex items-center justify-between mb-7">
        <div>
            <h2 class="font-serif text-[1.4rem] text-primary-black leading-tight">Journal</h2>
            <p class="font-sans text-[12.5px] text-muted-grey mt-0.5">
                {{ $posts->total() }} {{ Str::plural('post', $posts->total()) }}
            </p>
        </div>
        <a href="{{ route('admin.posts.create') }}"
           class="inline-flex items-center gap-2 font-sans text-[13px] font-medium
                  bg-burgundy text-soft-white px-4 py-2.5 rounded
                  hover:bg-burgundy-dark transition-colors duration-200">
            + New Post
        </a>
    </div>

    {{-- Flash --}}
    @if (session('success'))
        <div class="mb-5 font-sans text-[13px] text-green-700
                    bg-green-50 border border-green-200 rounded px-4 py-3">
            {{ session('success') }}
        </div>
    @endif

    {{-- Table --}}
    <div class="bg-white border border-border-grey rounded-lg overflow-hidden">
        @if ($posts->isEmpty())
            <div class="px-6 py-14 text-center">
                <p class="font-sans text-[13.5px] text-muted-grey">No posts yet.</p>
                <a href="{{ route('admin.posts.create') }}"
                   class="mt-4 inline-flex font-sans text-[13px] font-medium
                          text-burgundy hover:underline">
                    Write your first post →
                </a>
            </div>
        @else
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b border-border-grey bg-[#F9F8F6]">
                        <th class="font-sans text-[10.5px] uppercase tracking-[0.14em]
                                   text-muted-grey font-medium px-5 py-3">Title</th>
                        <th class="font-sans text-[10.5px] uppercase tracking-[0.14em]
                                   text-muted-grey font-medium px-5 py-3 hidden md:table-cell">Category</th>
                        <th class="font-sans text-[10.5px] uppercase tracking-[0.14em]
                                   text-muted-grey font-medium px-5 py-3 hidden lg:table-cell">Read</th>
                        <th class="font-sans text-[10.5px] uppercase tracking-[0.14em]
                                   text-muted-grey font-medium px-5 py-3">Status</th>
                        <th class="font-sans text-[10.5px] uppercase tracking-[0.14em]
                                   text-muted-grey font-medium px-5 py-3 hidden xl:table-cell">Date</th>
                        <th class="font-sans text-[10.5px] uppercase tracking-[0.14em]
                                   text-muted-grey font-medium px-5 py-3 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-border-grey">
                    @foreach ($posts as $post)
                        <tr class="hover:bg-[#FAFAF8] transition-colors duration-100">

                            {{-- Title --}}
                            <td class="px-5 py-3.5 max-w-[300px]">
                                <p class="font-sans text-[13.5px] font-medium text-primary-black truncate">
                                    {{ $post->title }}
                                </p>
                                @if ($post->excerpt)
                                    <p class="font-sans text-[11.5px] text-muted-grey mt-0.5 truncate">
                                        {{ $post->excerpt }}
                                    </p>
                                @endif
                            </td>

                            {{-- Category --}}
                            <td class="px-5 py-3.5 hidden md:table-cell">
                                @if ($post->category)
                                    <span class="font-sans text-[11.5px] text-muted-grey/80
                                                 bg-border-grey/30 px-2 py-0.5 rounded whitespace-nowrap">
                                        {{ $post->category }}
                                    </span>
                                @else
                                    <span class="text-muted-grey/30 text-[12px]">—</span>
                                @endif
                            </td>

                            {{-- Reading time --}}
                            <td class="px-5 py-3.5 hidden lg:table-cell">
                                @if ($post->reading_time)
                                    <span class="font-sans text-[12.5px] text-muted-grey">
                                        {{ $post->reading_time }} min
                                    </span>
                                @else
                                    <span class="text-muted-grey/30 text-[12px]">—</span>
                                @endif
                            </td>

                            {{-- Status --}}
                            <td class="px-5 py-3.5">
                                <span class="inline-flex items-center gap-1.5 font-sans text-[11px]
                                             font-medium border px-2.5 py-0.5 rounded-full
                                             {{ $post->statusColour() }}">
                                    {{ $post->statusLabel() }}
                                </span>
                            </td>

                            {{-- Date --}}
                            <td class="px-5 py-3.5 hidden xl:table-cell">
                                <span class="font-sans text-[12px] text-muted-grey whitespace-nowrap">
                                    @if ($post->published_at)
                                        {{ $post->published_at->format('d M Y') }}
                                    @else
                                        {{ $post->created_at->format('d M Y') }}
                                    @endif
                                </span>
                            </td>

                            {{-- Actions --}}
                            <td class="px-5 py-3.5 text-right">
                                <div class="flex items-center justify-end gap-3">
                                    <a href="{{ route('admin.posts.edit', $post) }}"
                                       class="font-sans text-[12.5px] font-medium text-primary-black/60
                                              hover:text-primary-black transition-colors duration-150">
                                        Edit
                                    </a>
                                    <form method="POST"
                                          action="{{ route('admin.posts.destroy', $post) }}"
                                          x-data
                                          @submit.prevent="if(confirm('Delete this post?')) $el.submit()">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="font-sans text-[12.5px] font-medium text-red-400
                                                       hover:text-red-600 transition-colors duration-150">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{-- Pagination --}}
            @if ($posts->hasPages())
                <div class="px-5 py-4 border-t border-border-grey">
                    {{ $posts->links() }}
                </div>
            @endif
        @endif
    </div>

@endsection
