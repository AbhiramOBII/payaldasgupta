@extends('layouts.admin')

@section('title', 'Edit: ' . $industry->title)

@section('content')

    <div class="flex items-center gap-2 font-sans text-[12.5px] text-muted-grey mb-6">
        <a href="{{ route('admin.industries.index') }}"
           class="hover:text-primary-black transition-colors duration-150">Industries</a>
        <span class="text-border-grey">/</span>
        <span class="text-primary-black truncate max-w-[240px]">{{ $industry->title }}</span>
    </div>

    <div class="flex items-start justify-between mb-7">
        <h2 class="font-serif text-[1.4rem] text-primary-black leading-tight">
            Edit Industry
        </h2>
        <span class="inline-flex items-center font-sans text-[11px]
                     font-medium border px-2.5 py-1 rounded-full
                     {{ $industry->status === 'active'
                        ? 'text-green-700 bg-green-50 border-green-200'
                        : 'text-muted-grey bg-border-grey/30 border-border-grey' }}">
            {{ ucfirst($industry->status) }}
        </span>
    </div>

    {{-- ── Update form ────────────────────────────────────────────────────── --}}
    <form id="industry-update-form"
          method="POST"
          action="{{ route('admin.industries.update', $industry) }}"
          novalidate>
        @csrf
        @method('PUT')

        @include('admin.industries._form')

        <div class="flex items-center justify-between mt-6">
            <div class="flex items-center gap-3">
                <button type="submit"
                        class="inline-flex items-center font-sans text-[13.5px] font-medium
                               bg-burgundy text-soft-white px-5 py-2.5 rounded
                               hover:bg-burgundy-dark transition-colors duration-200">
                    Save Changes
                </button>
                <a href="{{ route('admin.industries.index') }}"
                   class="font-sans text-[13px] text-muted-grey hover:text-primary-black
                          transition-colors duration-150">
                    Cancel
                </a>
            </div>

            {{-- Delete — NOT nested inside the update form --}}
            <button type="button"
                    onclick="if(confirm('Permanently delete this industry?')) document.getElementById('industry-delete-form').submit()"
                    class="font-sans text-[12.5px] text-red-400
                           hover:text-red-600 transition-colors duration-150">
                Delete industry
            </button>
        </div>

    </form>

    {{-- ── Delete form — completely outside the update form ──────────────── --}}
    <form id="industry-delete-form"
          method="POST"
          action="{{ route('admin.industries.destroy', $industry) }}"
          style="display:none">
        @csrf
        @method('DELETE')
    </form>

@endsection
