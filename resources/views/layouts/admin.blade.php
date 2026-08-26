<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Admin') — Payal Dasgupta</title>
    <link rel="icon" type="image/png" href="/images/favicon.png">
    <link rel="shortcut icon" href="/images/favicon.png">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=Manrope:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#F4F3F0] font-sans antialiased text-primary-black">

    <div class="flex h-screen overflow-hidden">

        {{-- ── Sidebar ─────────────────────────────────────────────────── --}}
        <aside class="w-60 xl:w-64 shrink-0 bg-primary-black flex flex-col
                       border-r border-[#2a2a2a] overflow-y-auto">

            {{-- Brand --}}
            <div class="px-6 py-7 border-b border-[#2a2a2a]">
                <a href="{{ route('admin.dashboard') }}" class="block">
                    <span class="font-serif text-[1.2rem] text-warm-ivory leading-none block">
                        Payal Dasgupta
                    </span>
                    <span class="font-sans text-[9px] uppercase tracking-[0.2em]
                                 text-footer-secondary mt-1.5 block">
                        Admin Panel
                    </span>
                </a>
            </div>

            {{-- Navigation --}}
            <nav class="flex-1 px-3 py-5 space-y-0.5" aria-label="Admin navigation">

                @php
                    use Illuminate\Support\Str;
                    $navItems = [
                        ['route' => 'admin.dashboard',        'label' => 'Dashboard',  'icon' => 'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6'],
                        ['route' => 'admin.posts.index',      'label' => 'Journal',    'icon' => 'M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z'],
                        ['route' => 'admin.services.index',   'label' => 'Services',   'icon' => 'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2'],
                        ['route' => 'admin.industries.index', 'label' => 'Industries', 'icon' => 'M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-2 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4'],
                        ['route' => 'admin.enquiries.index',  'label' => 'Enquiries',  'icon' => 'M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z'],
                        ['route' => 'admin.settings.index',   'label' => 'Settings',   'icon' => 'M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z M15 12a3 3 0 11-6 0 3 3 0 016 0z'],
                    ];
                    $currentRoute  = request()->route()->getName();
                    $currentPrefix = Str::beforeLast($currentRoute, '.');
                @endphp

                @foreach ($navItems as $item)
                    @php
                        $active = $currentRoute === $item['route']
                               || $currentPrefix === Str::beforeLast($item['route'], '.');
                    @endphp
                    <a href="{{ $item['route'] !== '#' ? route($item['route']) : '#' }}"
                       class="flex items-center gap-3 px-3 py-2.5 rounded text-[13px] font-medium
                              transition-colors duration-150
                              {{ $active
                                  ? 'bg-burgundy text-soft-white'
                                  : 'text-footer-secondary hover:text-warm-ivory hover:bg-white/5' }}">
                        <svg class="w-[15px] h-[15px] shrink-0" fill="none"
                             stroke="currentColor" stroke-width="1.6" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="{{ $item['icon'] }}" />
                        </svg>
                        <span class="flex-1">{{ $item['label'] }}</span>
                        @if ($item['route'] === 'admin.enquiries.index')
                            @php $unread = \App\Models\Enquiry::new()->count(); @endphp
                            @if ($unread)
                                <span class="ml-auto inline-flex items-center justify-center
                                             min-w-[18px] h-[18px] px-1 rounded-full
                                             bg-warm-ivory text-primary-black
                                             font-sans text-[10px] font-bold leading-none">
                                    {{ $unread }}
                                </span>
                            @endif
                        @endif
                    </a>
                @endforeach
            </nav>

            {{-- User + Logout --}}
            <div class="px-4 py-5 border-t border-[#2a2a2a]">
                <div class="flex items-center gap-3 mb-3">
                    <div class="w-7 h-7 rounded-full bg-burgundy flex items-center
                                justify-center text-soft-white font-sans text-[11px] font-semibold shrink-0">
                        {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}
                    </div>
                    <div class="min-w-0">
                        <p class="font-sans text-[12px] font-medium text-warm-ivory truncate">
                            {{ auth()->user()->name ?? 'Admin' }}
                        </p>
                        <p class="font-sans text-[10px] text-footer-secondary/70 truncate">
                            {{ auth()->user()->email ?? '' }}
                        </p>
                    </div>
                </div>
                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <button type="submit"
                            class="w-full flex items-center gap-2 px-3 py-2 rounded
                                   font-sans text-[12px] text-footer-secondary/70
                                   hover:text-warm-ivory hover:bg-white/5
                                   transition-colors duration-150">
                        <svg class="w-3.5 h-3.5 shrink-0" fill="none" stroke="currentColor"
                             stroke-width="1.8" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                        </svg>
                        Sign out
                    </button>
                </form>
            </div>

        </aside>{{-- /sidebar --}}

        {{-- ── Main content area ───────────────────────────────────────── --}}
        <div class="flex-1 flex flex-col min-w-0 overflow-y-auto">

            {{-- Top bar --}}
            <header class="h-14 shrink-0 bg-white border-b border-border-grey
                            flex items-center px-6 lg:px-8 gap-4">
                <h1 class="font-sans text-[14px] font-semibold text-primary-black">
                    @yield('title', 'Dashboard')
                </h1>
                <span class="ml-auto font-sans text-[11px] text-muted-grey">
                    {{ now()->format('D, d M Y') }}
                </span>
            </header>

            {{-- Page content --}}
            <main class="flex-1 px-6 lg:px-8 py-8">
                @yield('content')
            </main>

        </div>{{-- /main --}}

    </div>{{-- /flex wrapper --}}

    @stack('scripts')
</body>
</html>
