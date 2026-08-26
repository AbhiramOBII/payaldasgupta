@extends('layouts.admin')

@section('title', 'Settings')

@section('content')

    <div class="mb-7">
        <h2 class="font-serif text-[1.4rem] text-primary-black leading-tight">Settings</h2>
        <p class="font-sans text-[12.5px] text-muted-grey mt-0.5">
            Manage site details and your account password.
        </p>
    </div>

    <div class="space-y-8">

        {{-- ══════════════════════════════════════════════════════════════════
             SECTION 1 — Site Settings
        ═══════════════════════════════════════════════════════════════════════ --}}

        @if (session('success_site'))
            <div class="font-sans text-[13px] text-green-700
                        bg-green-50 border border-green-200 rounded px-4 py-3">
                {{ session('success_site') }}
            </div>
        @endif

        <form method="POST" action="{{ route('admin.settings.site') }}" novalidate>
            @csrf
            @method('PUT')

            {{-- ── Identity ─────────────────────────────────────────────── --}}
            <div class="bg-white border border-border-grey rounded-lg divide-y divide-border-grey mb-5">

                <div class="px-6 py-4">
                    <p class="font-sans text-[13px] font-semibold text-primary-black">Site Identity</p>
                    <p class="font-sans text-[11.5px] text-muted-grey mt-0.5">
                        Your name and professional descriptor shown in the header and footer.
                    </p>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-5 px-6 py-5">
                    <div>
                        <label class="form-label">Site Name <span class="text-red-400">*</span></label>
                        <input type="text" name="site_name"
                               value="{{ old('site_name', $settings['site_name'] ?? '') }}"
                               class="form-input @error('site_name') border-red-400 @enderror"
                               placeholder="Payal Dasgupta"
                               required>
                        @error('site_name') <p class="form-error">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="form-label">Tagline / Descriptor</label>
                        <input type="text" name="site_tagline"
                               value="{{ old('site_tagline', $settings['site_tagline'] ?? '') }}"
                               class="form-input"
                               placeholder="Communications Strategist">
                    </div>
                </div>

                <div class="px-6 py-5">
                    <label class="form-label">Default Meta Description</label>
                    <textarea name="default_meta_description" rows="2"
                              class="form-input" maxlength="500"
                              placeholder="Shown in search results when no page-specific meta description is set.">{{ old('default_meta_description', $settings['default_meta_description'] ?? '') }}</textarea>
                    <p class="mt-1 font-sans text-[11px] text-muted-grey/60">Max 160 characters recommended.</p>
                </div>

                <div class="px-6 py-5">
                    <label class="form-label">Footer Tagline</label>
                    <textarea name="footer_tagline" rows="2"
                              class="form-input" maxlength="500"
                              placeholder="Short line shown in the footer beneath your name.">{{ old('footer_tagline', $settings['footer_tagline'] ?? '') }}</textarea>
                </div>

            </div>

            {{-- ── Contact details ──────────────────────────────────────── --}}
            <div class="bg-white border border-border-grey rounded-lg divide-y divide-border-grey mb-5">

                <div class="px-6 py-4">
                    <p class="font-sans text-[13px] font-semibold text-primary-black">Contact Details</p>
                    <p class="font-sans text-[11.5px] text-muted-grey mt-0.5">
                        Displayed on the Contact page and in the footer.
                    </p>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-5 px-6 py-5">
                    <div>
                        <label class="form-label">Email Address</label>
                        <input type="email" name="contact_email"
                               value="{{ old('contact_email', $settings['contact_email'] ?? '') }}"
                               class="form-input @error('contact_email') border-red-400 @enderror"
                               placeholder="payal@payaldasgupta.com">
                        @error('contact_email') <p class="form-error">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="form-label">Phone Number</label>
                        <input type="text" name="contact_phone"
                               value="{{ old('contact_phone', $settings['contact_phone'] ?? '') }}"
                               class="form-input"
                               placeholder="+91 98765 43210">
                    </div>
                </div>

            </div>

            {{-- ── Social links ──────────────────────────────────────────── --}}
            <div class="bg-white border border-border-grey rounded-lg divide-y divide-border-grey mb-5">

                <div class="px-6 py-4">
                    <p class="font-sans text-[13px] font-semibold text-primary-black">Social Links</p>
                    <p class="font-sans text-[11.5px] text-muted-grey mt-0.5">
                        Full URLs including https://
                    </p>
                </div>

                <div class="px-6 py-5 space-y-4">

                    <div>
                        <label class="form-label">LinkedIn</label>
                        <div class="flex items-center">
                            <span class="inline-flex items-center px-3 h-10 border border-r-0 border-border-grey
                                         rounded-l bg-[#F9F8F6] font-sans text-[12px] text-muted-grey shrink-0">
                                linkedin.com/in/
                            </span>
                            <input type="url" name="linkedin_url"
                                   value="{{ old('linkedin_url', $settings['linkedin_url'] ?? '') }}"
                                   class="form-input rounded-l-none @error('linkedin_url') border-red-400 @enderror"
                                   placeholder="https://www.linkedin.com/in/yourprofile/">
                        </div>
                        @error('linkedin_url') <p class="form-error">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="form-label">Twitter / X <span class="font-normal text-muted-grey/60 normal-case tracking-normal">(optional)</span></label>
                        <input type="url" name="twitter_url"
                               value="{{ old('twitter_url', $settings['twitter_url'] ?? '') }}"
                               class="form-input @error('twitter_url') border-red-400 @enderror"
                               placeholder="https://x.com/yourhandle">
                        @error('twitter_url') <p class="form-error">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="form-label">Instagram <span class="font-normal text-muted-grey/60 normal-case tracking-normal">(optional)</span></label>
                        <input type="url" name="instagram_url"
                               value="{{ old('instagram_url', $settings['instagram_url'] ?? '') }}"
                               class="form-input @error('instagram_url') border-red-400 @enderror"
                               placeholder="https://www.instagram.com/yourhandle">
                        @error('instagram_url') <p class="form-error">{{ $message }}</p> @enderror
                    </div>

                </div>

            </div>

            {{-- Save button --}}
            <div class="flex items-center gap-3 pt-1">
                <button type="submit"
                        class="inline-flex items-center font-sans text-[13.5px] font-medium
                               bg-burgundy text-soft-white px-5 py-2.5 rounded
                               hover:bg-burgundy-dark transition-colors duration-200">
                    Save Site Settings
                </button>
            </div>

        </form>

        {{-- ══════════════════════════════════════════════════════════════════
             SECTION 2 — Change Password
        ═══════════════════════════════════════════════════════════════════════ --}}

        <div class="border-t border-border-grey pt-8">

            @if (session('success_password'))
                <div class="mb-5 font-sans text-[13px] text-green-700
                            bg-green-50 border border-green-200 rounded px-4 py-3">
                    {{ session('success_password') }}
                </div>
            @endif

            <form id="password-form"
                  method="POST"
                  action="{{ route('admin.settings.password') }}"
                  novalidate>
                @csrf
                @method('PUT')

                <div class="bg-white border border-border-grey rounded-lg divide-y divide-border-grey">

                    <div class="px-6 py-4">
                        <p class="font-sans text-[13px] font-semibold text-primary-black">Change Password</p>
                        <p class="font-sans text-[11.5px] text-muted-grey mt-0.5">
                            Must be at least 8 characters and include uppercase, lowercase and a number.
                        </p>
                    </div>

                    <div class="px-6 py-5">
                        <label class="form-label">Current Password <span class="text-red-400">*</span></label>
                        <input type="password" name="current_password"
                               autocomplete="current-password"
                               class="form-input @error('current_password') border-red-400 @enderror"
                               placeholder="Enter your current password">
                        @error('current_password') <p class="form-error">{{ $message }}</p> @enderror
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-5 px-6 py-5">

                        <div>
                            <label class="form-label">New Password <span class="text-red-400">*</span></label>
                            <input type="password" name="password"
                                   autocomplete="new-password"
                                   class="form-input @error('password') border-red-400 @enderror"
                                   placeholder="New password">
                            @error('password') <p class="form-error">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="form-label">Confirm New Password <span class="text-red-400">*</span></label>
                            <input type="password" name="password_confirmation"
                                   autocomplete="new-password"
                                   class="form-input"
                                   placeholder="Repeat new password">
                        </div>

                    </div>

                </div>

                <div class="flex items-center gap-3 pt-4">
                    <button type="submit"
                            class="inline-flex items-center font-sans text-[13.5px] font-medium
                                   bg-primary-black text-soft-white px-5 py-2.5 rounded
                                   hover:bg-primary-black/80 transition-colors duration-200">
                        Update Password
                    </button>
                </div>

            </form>

        </div>

        {{-- ══════════════════════════════════════════════════════════════════
             SECTION 3 — Legal Pages
        ═══════════════════════════════════════════════════════════════════════ --}}

        <div class="border-t border-border-grey pt-8">

            @if (session('success_legal'))
                <div class="mb-5 font-sans text-[13px] text-green-700
                            bg-green-50 border border-green-200 rounded px-4 py-3">
                    {{ session('success_legal') }}
                </div>
            @endif

            <form method="POST" action="{{ route('admin.settings.legal') }}" novalidate>
                @csrf
                @method('PUT')

                {{-- Privacy Policy --}}
                <div class="bg-white border border-border-grey rounded-lg divide-y divide-border-grey mb-5">

                    <div class="px-6 py-4">
                        <p class="font-sans text-[13px] font-semibold text-primary-black">Privacy Policy</p>
                        <p class="font-sans text-[11.5px] text-muted-grey mt-0.5">
                            Shown at <span class="font-medium">/privacy-policy</span>. Edit the full HTML content below.
                        </p>
                    </div>

                    <div class="px-6 py-5">
                        <textarea name="privacy_policy"
                                  id="privacy_policy_editor"
                                  class="form-input"
                                  rows="16">{{ old('privacy_policy', $settings['privacy_policy'] ?? '') }}</textarea>
                    </div>

                </div>

                {{-- Terms of Use --}}
                <div class="bg-white border border-border-grey rounded-lg divide-y divide-border-grey mb-5">

                    <div class="px-6 py-4">
                        <p class="font-sans text-[13px] font-semibold text-primary-black">Terms of Use</p>
                        <p class="font-sans text-[11.5px] text-muted-grey mt-0.5">
                            Shown at <span class="font-medium">/terms</span>. Edit the full HTML content below.
                        </p>
                    </div>

                    <div class="px-6 py-5">
                        <textarea name="terms_content"
                                  id="terms_content_editor"
                                  class="form-input"
                                  rows="16">{{ old('terms_content', $settings['terms_content'] ?? '') }}</textarea>
                    </div>

                </div>

                <div class="flex items-center gap-3 pt-1">
                    <button type="submit"
                            class="inline-flex items-center font-sans text-[13.5px] font-medium
                                   bg-burgundy text-soft-white px-5 py-2.5 rounded
                                   hover:bg-burgundy-dark transition-colors duration-200">
                        Save Legal Pages
                    </button>
                    <a href="{{ route('privacy') }}" target="_blank"
                       class="font-sans text-[12.5px] text-muted-grey hover:text-primary-black transition-colors">
                        Preview Privacy →
                    </a>
                    <a href="{{ route('terms') }}" target="_blank"
                       class="font-sans text-[12.5px] text-muted-grey hover:text-primary-black transition-colors">
                        Preview Terms →
                    </a>
                </div>

            </form>

        </div>

    </div>

@push('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
<script>
    [
        { id: 'privacy_policy_editor',  name: 'privacy_policy' },
        { id: 'terms_content_editor',   name: 'terms_content'  },
    ].forEach(function(cfg) {
        ClassicEditor
            .create(document.getElementById(cfg.id), {
                toolbar: {
                    items: [
                        'heading', '|',
                        'bold', 'italic', '|',
                        'link', '|',
                        'bulletedList', 'numberedList', '|',
                        'blockQuote', '|',
                        'undo', 'redo',
                    ]
                },
                heading: {
                    options: [
                        { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                        { model: 'heading2',  view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                        { model: 'heading3',  view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
                    ]
                },
            })
            .catch(function(err) { console.error(err); });
    });
</script>
@endpush

@endsection
