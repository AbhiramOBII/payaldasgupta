@extends('layouts.admin')

@section('title', 'Edit: ' . $service->title)

@section('content')

    {{-- Breadcrumb --}}
    <div class="flex items-center gap-2 font-sans text-[12.5px] text-muted-grey mb-6">
        <a href="{{ route('admin.services.index') }}"
           class="hover:text-primary-black transition-colors duration-150">Services</a>
        <span class="text-border-grey">/</span>
        <span class="text-primary-black truncate max-w-[200px]">{{ $service->title }}</span>
    </div>

    <div class="flex items-start justify-between mb-7">
        <h2 class="font-serif text-[1.4rem] text-primary-black leading-tight">
            Edit Service
        </h2>

        {{-- Status badge --}}
        @if ($service->isActive())
            <span class="inline-flex items-center gap-1.5 font-sans text-[11px] font-medium
                         text-green-700 bg-green-50 border border-green-200 px-2.5 py-1 rounded-full">
                <span class="w-1.5 h-1.5 rounded-full bg-green-500 inline-block"></span> Active
            </span>
        @else
            <span class="inline-flex items-center gap-1.5 font-sans text-[11px] font-medium
                         text-muted-grey bg-border-grey/30 border border-border-grey px-2.5 py-1 rounded-full">
                <span class="w-1.5 h-1.5 rounded-full bg-muted-grey inline-block"></span> Inactive
            </span>
        @endif
    </div>

    {{-- ── Update form ────────────────────────────────────────────────────── --}}
    <form id="service-update-form"
          method="POST"
          action="{{ route('admin.services.update', $service) }}"
          novalidate>
        @csrf
        @method('PUT')

        @include('admin.services._form')

        {{-- Action bar --}}
        <div class="flex items-center justify-between pt-2">
            <div class="flex items-center gap-3">
                <button type="submit"
                        class="inline-flex items-center font-sans text-[13.5px] font-medium
                               bg-burgundy text-soft-white px-5 py-2.5 rounded
                               hover:bg-burgundy-dark transition-colors duration-200">
                    Save Changes
                </button>
                <a href="{{ route('admin.services.index') }}"
                   class="font-sans text-[13px] text-muted-grey hover:text-primary-black
                          transition-colors duration-150">
                    Cancel
                </a>
            </div>

            {{-- Delete — separate form, NOT nested inside the update form --}}
            <button type="button"
                    onclick="if(confirm('Permanently delete this service?')) document.getElementById('service-delete-form').submit()"
                    class="font-sans text-[12.5px] text-red-400
                           hover:text-red-600 transition-colors duration-150">
                Delete service
            </button>
        </div>

    </form>

    {{-- ── Delete form — completely outside the update form ──────────────── --}}
    <form id="service-delete-form"
          method="POST"
          action="{{ route('admin.services.destroy', $service) }}"
          style="display:none">
        @csrf
        @method('DELETE')
    </form>

@endsection
