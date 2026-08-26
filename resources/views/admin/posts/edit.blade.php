@extends('layouts.admin')

@section('title', 'Edit: ' . $post->title)

@section('content')

    <div class="flex items-center gap-2 font-sans text-[12.5px] text-muted-grey mb-6">
        <a href="{{ route('admin.posts.index') }}"
           class="hover:text-primary-black transition-colors duration-150">Journal</a>
        <span class="text-border-grey">/</span>
        <span class="text-primary-black truncate max-w-[240px]">{{ $post->title }}</span>
    </div>

    <div class="flex items-start justify-between mb-7">
        <h2 class="font-serif text-[1.4rem] text-primary-black leading-tight">
            Edit Post
        </h2>
        <span class="inline-flex items-center gap-1.5 font-sans text-[11px]
                     font-medium border px-2.5 py-1 rounded-full
                     {{ $post->statusColour() }}">
            {{ $post->statusLabel() }}
        </span>
    </div>

    {{-- ── Update form ────────────────────────────────────────────────────── --}}
    <form id="post-update-form"
          method="POST"
          action="{{ route('admin.posts.update', $post) }}"
          enctype="multipart/form-data"
          novalidate>
        @csrf
        @method('PUT')

        @include('admin.posts._form')

        <div class="flex items-center justify-between mt-6">
            <div class="flex items-center gap-3">
                <button type="submit"
                        class="inline-flex items-center font-sans text-[13.5px] font-medium
                               bg-burgundy text-soft-white px-5 py-2.5 rounded
                               hover:bg-burgundy-dark transition-colors duration-200">
                    Save Changes
                </button>
                <a href="{{ route('admin.posts.index') }}"
                   class="font-sans text-[13px] text-muted-grey hover:text-primary-black
                          transition-colors duration-150">
                    Cancel
                </a>
            </div>

            {{-- Delete — NOT nested inside the update form --}}
            <button type="button"
                    onclick="if(confirm('Permanently delete this post?')) document.getElementById('post-delete-form').submit()"
                    class="font-sans text-[12.5px] text-red-400
                           hover:text-red-600 transition-colors duration-150">
                Delete post
            </button>
        </div>

    </form>

    {{-- ── Delete form — completely outside the update form ──────────────── --}}
    <form id="post-delete-form"
          method="POST"
          action="{{ route('admin.posts.destroy', $post) }}"
          style="display:none">
        @csrf
        @method('DELETE')
    </form>

@endsection
