<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Login — Payal Dasgupta</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=Manrope:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">

    <div class="min-h-screen flex">

        {{-- ── Left panel: Brand ───────────────────────────────────────── --}}
        <div class="hidden lg:flex lg:w-[45%] xl:w-[40%] shrink-0
                     bg-primary-black flex-col justify-between
                     px-12 xl:px-16 py-14">

            {{-- Logo --}}
            <div>
                <a href="/" class="inline-block">
                    <span class="font-serif text-[1.35rem] text-warm-ivory leading-none block">
                        Payal Dasgupta
                    </span>
                    <span class="font-sans text-[9px] uppercase tracking-[0.22em]
                                 text-footer-secondary mt-1.5 block">
                        Communications Strategist
                    </span>
                </a>
            </div>

            {{-- Statement --}}
            <div>
                <p class="font-serif italic text-[clamp(1.5rem,2.5vw,2.2rem)]
                           text-warm-ivory leading-[1.2] max-w-xs">
                    Every brand has a story worth telling.
                </p>
                <p class="font-sans text-[12px] text-footer-secondary/70 mt-5 leading-relaxed max-w-xs">
                    Manage your content, narratives and brand presence from one place.
                </p>
            </div>

            {{-- Bottom caption --}}
            <p class="font-sans text-[10px] text-footer-secondary/40 tracking-wide">
                Admin Area &nbsp;·&nbsp; Restricted Access
            </p>

        </div>

        {{-- ── Right panel: Login form ─────────────────────────────────── --}}
        <div class="flex-1 bg-warm-ivory flex items-center justify-center
                     px-6 sm:px-10 py-14">

            <div class="w-full max-w-[400px]">

                {{-- Mobile logo (hidden on desktop) --}}
                <div class="lg:hidden mb-10">
                    <span class="font-serif text-[1.35rem] text-primary-black leading-none block">
                        Payal Dasgupta
                    </span>
                    <span class="font-sans text-[9px] uppercase tracking-[0.22em]
                                 text-muted-grey mt-1.5 block">
                        Admin Area
                    </span>
                </div>

                {{-- Heading --}}
                <h1 class="font-serif text-[1.9rem] text-primary-black leading-tight tracking-tight">
                    Welcome back
                </h1>
                <p class="font-sans text-[13.5px] text-muted-grey mt-2 mb-9">
                    Sign in to manage your content.
                </p>

                {{-- Session error (general) --}}
                @if (session('status'))
                    <div class="mb-6 font-sans text-[13px] text-green-700
                                bg-green-50 border border-green-200 rounded px-4 py-3">
                        {{ session('status') }}
                    </div>
                @endif

                {{-- Login form --}}
                <form method="POST" action="{{ route('admin.login.post') }}" class="space-y-5">
                    @csrf

                    {{-- Email --}}
                    <div>
                        <label for="email"
                               class="block font-sans text-[11.5px] font-medium uppercase
                                      tracking-[0.12em] text-muted-grey mb-2">
                            Email address
                        </label>
                        <input
                            id="email"
                            name="email"
                            type="email"
                            autocomplete="email"
                            value="{{ old('email') }}"
                            required
                            autofocus
                            class="w-full font-sans text-[14px] text-primary-black
                                   bg-soft-white border border-border-grey rounded
                                   px-4 py-3 outline-none
                                   focus:border-primary-black
                                   transition-colors duration-200
                                   placeholder:text-muted-grey/50
                                   @error('email') border-red-400 @enderror"
                            placeholder="you@example.com">
                        @error('email')
                            <p class="mt-2 font-sans text-[12px] text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Password --}}
                    <div>
                        <label for="password"
                               class="block font-sans text-[11.5px] font-medium uppercase
                                      tracking-[0.12em] text-muted-grey mb-2">
                            Password
                        </label>
                        <input
                            id="password"
                            name="password"
                            type="password"
                            autocomplete="current-password"
                            required
                            class="w-full font-sans text-[14px] text-primary-black
                                   bg-soft-white border border-border-grey rounded
                                   px-4 py-3 outline-none
                                   focus:border-primary-black
                                   transition-colors duration-200
                                   @error('password') border-red-400 @enderror"
                            placeholder="••••••••">
                        @error('password')
                            <p class="mt-2 font-sans text-[12px] text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Remember me --}}
                    <div class="flex items-center gap-2.5">
                        <input id="remember" name="remember" type="checkbox"
                               class="w-3.5 h-3.5 rounded border-border-grey accent-burgundy">
                        <label for="remember"
                               class="font-sans text-[12.5px] text-muted-grey cursor-pointer">
                            Keep me signed in
                        </label>
                    </div>

                    {{-- Submit --}}
                    <button type="submit"
                            class="w-full font-sans text-[13.5px] font-medium
                                   bg-burgundy text-soft-white
                                   px-5 py-3.5 rounded mt-2
                                   hover:bg-burgundy-dark
                                   transition-colors duration-200">
                        Sign In
                    </button>

                </form>

                {{-- Back to site --}}
                <p class="mt-8 font-sans text-[12px] text-muted-grey/60 text-center">
                    <a href="/" class="hover:text-primary-black transition-colors duration-200">
                        ← Back to website
                    </a>
                </p>

            </div>
        </div>{{-- /right panel --}}

    </div>

</body>
</html>
