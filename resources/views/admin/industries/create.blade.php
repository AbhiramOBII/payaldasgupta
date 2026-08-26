@extends('layouts.admin')

@section('title', 'New Industry')

@section('content')

    <div class="flex items-center gap-2 font-sans text-[12.5px] text-muted-grey mb-6">
        <a href="{{ route('admin.industries.index') }}"
           class="hover:text-primary-black transition-colors duration-150">Industries</a>
        <span class="text-border-grey">/</span>
        <span class="text-primary-black">New Industry</span>
    </div>

    <h2 class="font-serif text-[1.4rem] text-primary-black leading-tight mb-7">
        New Industry
    </h2>

    <form method="POST" action="{{ route('admin.industries.store') }}" novalidate>
        @csrf

        @include('admin.industries._form')

        <div class="flex items-center gap-3 mt-6">
            <button type="submit"
                    class="inline-flex items-center font-sans text-[13.5px] font-medium
                           bg-burgundy text-soft-white px-5 py-2.5 rounded
                           hover:bg-burgundy-dark transition-colors duration-200">
                Create Industry
            </button>
            <a href="{{ route('admin.industries.index') }}"
               class="font-sans text-[13px] text-muted-grey hover:text-primary-black
                      transition-colors duration-150">
                Cancel
            </a>
        </div>

    </form>

@endsection
