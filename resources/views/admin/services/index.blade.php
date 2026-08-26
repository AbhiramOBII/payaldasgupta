@extends('layouts.admin')

@section('title', 'Services')

@section('content')

    {{-- Header row --}}
    <div class="flex items-center justify-between mb-7">
        <div>
            <h2 class="font-serif text-[1.4rem] text-primary-black leading-tight">Services</h2>
            <p class="font-sans text-[12.5px] text-muted-grey mt-0.5">
                {{ $services->count() }} {{ Str::plural('service', $services->count()) }}
            </p>
        </div>
        <a href="{{ route('admin.services.create') }}"
           class="inline-flex items-center gap-2 font-sans text-[13px] font-medium
                  bg-burgundy text-soft-white px-4 py-2.5 rounded
                  hover:bg-burgundy-dark transition-colors duration-200">
            + New Service
        </a>
    </div>

    {{-- Flash message --}}
    @if (session('success'))
        <div class="mb-5 font-sans text-[13px] text-green-700
                    bg-green-50 border border-green-200 rounded px-4 py-3">
            {{ session('success') }}
        </div>
    @endif

    {{-- Table --}}
    <div class="bg-white border border-border-grey rounded-lg overflow-hidden">
        @if ($services->isEmpty())
            <div class="px-6 py-14 text-center">
                <p class="font-sans text-[13.5px] text-muted-grey">No services yet.</p>
                <a href="{{ route('admin.services.create') }}"
                   class="mt-4 inline-flex font-sans text-[13px] font-medium
                          text-burgundy hover:underline">
                    Create your first service →
                </a>
            </div>
        @else
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b border-border-grey bg-[#F9F8F6]">
                        <th class="font-sans text-[10.5px] uppercase tracking-[0.14em]
                                   text-muted-grey font-medium px-5 py-3">Title</th>
                        <th class="font-sans text-[10.5px] uppercase tracking-[0.14em]
                                   text-muted-grey font-medium px-5 py-3 hidden md:table-cell">Slug</th>
                        <th class="font-sans text-[10.5px] uppercase tracking-[0.14em]
                                   text-muted-grey font-medium px-5 py-3 hidden lg:table-cell">Order</th>
                        <th class="font-sans text-[10.5px] uppercase tracking-[0.14em]
                                   text-muted-grey font-medium px-5 py-3">Status</th>
                        <th class="font-sans text-[10.5px] uppercase tracking-[0.14em]
                                   text-muted-grey font-medium px-5 py-3 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-border-grey">
                    @foreach ($services as $service)
                        <tr class="hover:bg-[#FAFAF8] transition-colors duration-100">

                            {{-- Title --}}
                            <td class="px-5 py-3.5">
                                <p class="font-sans text-[13.5px] font-medium text-primary-black">
                                    {{ $service->title }}
                                </p>
                                @if ($service->short_description)
                                    <p class="font-sans text-[11.5px] text-muted-grey mt-0.5 truncate max-w-[260px]">
                                        {{ $service->short_description }}
                                    </p>
                                @endif
                            </td>

                            {{-- Slug --}}
                            <td class="px-5 py-3.5 hidden md:table-cell">
                                <span class="font-sans text-[12px] text-muted-grey/80
                                             bg-border-grey/30 px-2 py-0.5 rounded">
                                    {{ $service->slug }}
                                </span>
                            </td>

                            {{-- Sort order --}}
                            <td class="px-5 py-3.5 hidden lg:table-cell">
                                <span class="font-sans text-[12.5px] text-muted-grey">
                                    {{ $service->sort_order }}
                                </span>
                            </td>

                            {{-- Status --}}
                            <td class="px-5 py-3.5">
                                @if ($service->isActive())
                                    <span class="inline-flex items-center gap-1.5 font-sans text-[11px]
                                                 font-medium text-green-700 bg-green-50 border
                                                 border-green-200 px-2.5 py-0.5 rounded-full">
                                        <span class="w-1.5 h-1.5 rounded-full bg-green-500 inline-block"></span>
                                        Active
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1.5 font-sans text-[11px]
                                                 font-medium text-muted-grey bg-border-grey/30 border
                                                 border-border-grey px-2.5 py-0.5 rounded-full">
                                        <span class="w-1.5 h-1.5 rounded-full bg-muted-grey inline-block"></span>
                                        Inactive
                                    </span>
                                @endif
                            </td>

                            {{-- Actions --}}
                            <td class="px-5 py-3.5 text-right">
                                <div class="flex items-center justify-end gap-3">
                                    <a href="{{ route('admin.services.edit', $service) }}"
                                       class="font-sans text-[12.5px] font-medium text-primary-black/60
                                              hover:text-primary-black transition-colors duration-150">
                                        Edit
                                    </a>

                                    <form method="POST"
                                          action="{{ route('admin.services.destroy', $service) }}"
                                          x-data
                                          @submit.prevent="if(confirm('Delete this service?')) $el.submit()">
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
        @endif
    </div>

@endsection
