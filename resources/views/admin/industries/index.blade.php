@extends('layouts.admin')

@section('title', 'Industries')

@section('content')

    <div class="flex items-center justify-between mb-7">
        <div>
            <h2 class="font-serif text-[1.4rem] text-primary-black leading-tight">Industries</h2>
            <p class="font-sans text-[12.5px] text-muted-grey mt-0.5">
                {{ $industries->total() }} {{ Str::plural('industry', $industries->total()) }}
            </p>
        </div>
        <a href="{{ route('admin.industries.create') }}"
           class="inline-flex items-center gap-2 font-sans text-[13px] font-medium
                  bg-burgundy text-soft-white px-4 py-2.5 rounded
                  hover:bg-burgundy-dark transition-colors duration-200">
            + New Industry
        </a>
    </div>

    @if (session('success'))
        <div class="mb-5 font-sans text-[13px] text-green-700
                    bg-green-50 border border-green-200 rounded px-4 py-3">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white border border-border-grey rounded-lg overflow-hidden">
        @if ($industries->isEmpty())
            <div class="px-6 py-14 text-center">
                <p class="font-sans text-[13.5px] text-muted-grey">No industries yet.</p>
                <a href="{{ route('admin.industries.create') }}"
                   class="mt-4 inline-flex font-sans text-[13px] font-medium
                          text-burgundy hover:underline">
                    Add your first industry →
                </a>
            </div>
        @else
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b border-border-grey bg-[#F9F8F6]">
                        <th class="font-sans text-[10.5px] uppercase tracking-[0.14em]
                                   text-muted-grey font-medium px-5 py-3">Industry</th>
                        <th class="font-sans text-[10.5px] uppercase tracking-[0.14em]
                                   text-muted-grey font-medium px-5 py-3 hidden md:table-cell">Services</th>
                        <th class="font-sans text-[10.5px] uppercase tracking-[0.14em]
                                   text-muted-grey font-medium px-5 py-3 hidden lg:table-cell">Outcomes</th>
                        <th class="font-sans text-[10.5px] uppercase tracking-[0.14em]
                                   text-muted-grey font-medium px-5 py-3">Status</th>
                        <th class="font-sans text-[10.5px] uppercase tracking-[0.14em]
                                   text-muted-grey font-medium px-5 py-3 hidden sm:table-cell">Order</th>
                        <th class="font-sans text-[10.5px] uppercase tracking-[0.14em]
                                   text-muted-grey font-medium px-5 py-3 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-border-grey">
                    @foreach ($industries as $industry)
                        <tr class="hover:bg-[#FAFAF8] transition-colors duration-100">

                            {{-- Title + slug --}}
                            <td class="px-5 py-3.5 max-w-[260px]">
                                <p class="font-sans text-[13.5px] font-medium text-primary-black truncate">
                                    {{ $industry->title }}
                                </p>
                                <p class="font-sans text-[11px] text-muted-grey/60 mt-0.5 truncate">
                                    /industries/{{ $industry->slug }}
                                </p>
                            </td>

                            {{-- Related services count --}}
                            <td class="px-5 py-3.5 hidden md:table-cell">
                                @php $count = count($industry->related_service_ids ?? []); @endphp
                                @if ($count)
                                    <span class="font-sans text-[12.5px] text-muted-grey">
                                        {{ $count }} {{ Str::plural('service', $count) }}
                                    </span>
                                @else
                                    <span class="text-muted-grey/30 text-[12px]">—</span>
                                @endif
                            </td>

                            {{-- Outcomes count --}}
                            <td class="px-5 py-3.5 hidden lg:table-cell">
                                @php $outcomes = count($industry->expected_outcomes ?? []); @endphp
                                @if ($outcomes)
                                    <span class="font-sans text-[12.5px] text-muted-grey">
                                        {{ $outcomes }} {{ Str::plural('outcome', $outcomes) }}
                                    </span>
                                @else
                                    <span class="text-muted-grey/30 text-[12px]">—</span>
                                @endif
                            </td>

                            {{-- Status --}}
                            <td class="px-5 py-3.5">
                                <span class="inline-flex items-center font-sans text-[11px]
                                             font-medium border px-2.5 py-0.5 rounded-full
                                             {{ $industry->status === 'active'
                                                ? 'text-green-700 bg-green-50 border-green-200'
                                                : 'text-muted-grey bg-border-grey/30 border-border-grey' }}">
                                    {{ ucfirst($industry->status) }}
                                </span>
                            </td>

                            {{-- Sort order --}}
                            <td class="px-5 py-3.5 hidden sm:table-cell">
                                <span class="font-sans text-[12px] text-muted-grey">
                                    {{ $industry->sort_order }}
                                </span>
                            </td>

                            {{-- Actions --}}
                            <td class="px-5 py-3.5 text-right">
                                <div class="flex items-center justify-end gap-3">
                                    <a href="{{ route('admin.industries.edit', $industry) }}"
                                       class="font-sans text-[12.5px] font-medium text-primary-black/60
                                              hover:text-primary-black transition-colors duration-150">
                                        Edit
                                    </a>
                                    <form method="POST"
                                          action="{{ route('admin.industries.destroy', $industry) }}"
                                          x-data
                                          @submit.prevent="if(confirm('Delete this industry?')) $el.submit()">
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

            @if ($industries->hasPages())
                <div class="px-5 py-4 border-t border-border-grey">
                    {{ $industries->links() }}
                </div>
            @endif
        @endif
    </div>

@endsection
