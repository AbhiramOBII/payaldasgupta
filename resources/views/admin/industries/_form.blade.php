@php
    $industry ??= null;
    $services ??= collect();

    $savedServiceIds  = old('related_service_ids', $industry?->related_service_ids ?? []);
    $savedOutcomes    = old('outcomes',            $industry?->expected_outcomes   ?? []);
    $fullDescValue    = old('full_description',    $industry?->full_description    ?? '');
@endphp

<div class="flex flex-col xl:flex-row gap-5">

    {{-- ── Left: main content ──────────────────────────────────────────────── --}}
    <div class="flex-1 min-w-0 space-y-5">

        {{-- Title + Slug --}}
        <div class="bg-white border border-border-grey rounded-lg divide-y divide-border-grey">

            <div class="px-6 py-5">
                <label class="form-label">Title <span class="text-red-400">*</span></label>
                <input type="text" name="title"
                       value="{{ old('title', $industry?->title) }}"
                       class="form-input text-[16px] @error('title') border-red-400 @enderror"
                       placeholder="e.g. Technology & AI" required>
                @error('title') <p class="form-error">{{ $message }}</p> @enderror
            </div>

            <div class="px-6 py-4">
                <label class="form-label">
                    Slug
                    <span class="font-normal text-muted-grey/60 normal-case tracking-normal">(auto-generated)</span>
                </label>
                <div class="flex items-center gap-2 mt-1.5">
                    <span class="font-sans text-[12px] text-muted-grey/60 shrink-0">/industries/</span>
                    <input type="text" name="slug"
                           value="{{ old('slug', $industry?->slug) }}"
                           class="form-input @error('slug') border-red-400 @enderror"
                           placeholder="technology-ai">
                </div>
                @error('slug') <p class="form-error">{{ $message }}</p> @enderror
            </div>

        </div>

        {{-- Short description --}}
        <div class="bg-white border border-border-grey rounded-lg px-6 py-5">
            <label class="form-label">Short Description</label>
            <p class="font-sans text-[11px] text-muted-grey/60 mb-2">
                Shown in listings and cards. ~180 characters ideal.
            </p>
            <textarea name="short_description" rows="3"
                      class="form-input @error('short_description') border-red-400 @enderror"
                      placeholder="A one-paragraph summary of how Payal works with this industry.">{{ old('short_description', $industry?->short_description) }}</textarea>
            @error('short_description') <p class="form-error">{{ $message }}</p> @enderror
        </div>

        {{-- Full description (CKEditor) --}}
        <div class="bg-white border border-border-grey rounded-lg px-6 py-5">
            <label class="form-label">Full Description</label>
            <textarea name="full_description" id="industry_body"
                      class="form-input @error('full_description') border-red-400 @enderror">{{ $fullDescValue }}</textarea>
            @error('full_description') <p class="form-error">{{ $message }}</p> @enderror
        </div>

        {{-- Expected outcomes repeater --}}
        <div class="bg-white border border-border-grey rounded-lg divide-y divide-border-grey"
             x-data="{
                 outcomes: {{ json_encode(count($savedOutcomes) ? $savedOutcomes : ['']) }},
                 addOutcome() { this.outcomes.push('') },
                 removeOutcome(i) { if (this.outcomes.length > 1) this.outcomes.splice(i, 1) }
             }">

            <div class="px-6 py-4 flex items-center justify-between">
                <div>
                    <p class="font-sans text-[13px] font-semibold text-primary-black">Expected Outcomes</p>
                    <p class="font-sans text-[11px] text-muted-grey/60 mt-0.5">
                        What a client in this industry can expect to achieve.
                    </p>
                </div>
                <button type="button" @click="addOutcome()"
                        class="font-sans text-[12px] font-medium text-burgundy
                               hover:text-burgundy-dark transition-colors duration-150
                               inline-flex items-center gap-1">
                    + Add outcome
                </button>
            </div>

            <div class="px-6 py-5 space-y-3">
                <template x-for="(outcome, i) in outcomes" :key="i">
                    <div class="flex items-start gap-2">
                        {{-- Bullet indicator --}}
                        <span class="mt-2.5 w-1.5 h-1.5 rounded-full bg-burgundy shrink-0"></span>

                        <input type="text"
                               :name="`outcomes[${i}]`"
                               x-model="outcomes[i]"
                               class="form-input flex-1"
                               placeholder="e.g. Credible presence in key technology publications">

                        <button type="button"
                                @click="removeOutcome(i)"
                                :disabled="outcomes.length === 1"
                                class="mt-2 font-sans text-[18px] leading-none
                                       text-muted-grey/40 hover:text-red-400
                                       disabled:opacity-20 disabled:cursor-not-allowed
                                       transition-colors duration-150 shrink-0">
                            ×
                        </button>
                    </div>
                </template>
            </div>

        </div>

    </div>{{-- /left --}}

    {{-- ── Right: sidebar ──────────────────────────────────────────────────── --}}
    <div class="xl:w-72 shrink-0 space-y-5">

        {{-- Publishing --}}
        <div class="bg-white border border-border-grey rounded-lg divide-y divide-border-grey">

            <div class="px-5 py-4">
                <p class="font-sans text-[13px] font-semibold text-primary-black">Settings</p>
            </div>

            <div class="px-5 py-4">
                <label class="form-label">Status</label>
                <select name="status" class="form-input">
                    <option value="active"   {{ old('status', $industry?->status ?? 'active') === 'active'   ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ old('status', $industry?->status) === 'inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>

            <div class="px-5 py-4">
                <label class="form-label">Sort Order</label>
                <input type="number" name="sort_order" min="0"
                       value="{{ old('sort_order', $industry?->sort_order ?? 0) }}"
                       class="form-input">
                <p class="mt-1.5 font-sans text-[11px] text-muted-grey/60">
                    Lower numbers appear first.
                </p>
            </div>

        </div>

        {{-- Related Services multi-select --}}
        <div class="bg-white border border-border-grey rounded-lg divide-y divide-border-grey">

            <div class="px-5 py-4">
                <p class="font-sans text-[13px] font-semibold text-primary-black">Related Services</p>
                <p class="font-sans text-[11px] text-muted-grey/60 mt-0.5">
                    Select which services apply to this industry.
                </p>
            </div>

            <div class="px-5 py-4 space-y-2.5 max-h-72 overflow-y-auto">
                @forelse ($services as $service)
                    <label class="flex items-start gap-2.5 cursor-pointer group">
                        <input type="checkbox"
                               name="related_service_ids[]"
                               value="{{ $service->id }}"
                               {{ in_array($service->id, array_map('intval', $savedServiceIds)) ? 'checked' : '' }}
                               class="mt-0.5 w-3.5 h-3.5 rounded border-border-grey
                                      text-burgundy accent-burgundy shrink-0">
                        <span class="font-sans text-[13px] text-primary-black/80
                                     group-hover:text-primary-black transition-colors duration-150
                                     leading-snug">
                            {{ $service->title }}
                        </span>
                    </label>
                @empty
                    <p class="font-sans text-[12.5px] text-muted-grey/60">
                        No active services found.
                        <a href="{{ route('admin.services.create') }}"
                           class="text-burgundy hover:underline">Add services first.</a>
                    </p>
                @endforelse
            </div>

        </div>

        {{-- SEO --}}
        <div class="bg-white border border-border-grey rounded-lg divide-y divide-border-grey">

            <div class="px-5 py-4 flex items-center justify-between">
                <p class="font-sans text-[13px] font-semibold text-primary-black">SEO</p>
                <span class="font-sans text-[11px] text-muted-grey/60">Optional</span>
            </div>

            <div class="px-5 py-4">
                <label class="form-label">Meta Title</label>
                <input type="text" name="meta_title"
                       value="{{ old('meta_title', $industry?->meta_title) }}"
                       class="form-input"
                       maxlength="70"
                       placeholder="Defaults to industry title">
                <p class="mt-1 font-sans text-[11px] text-muted-grey/60">Max 70 chars</p>
            </div>

            <div class="px-5 py-4">
                <label class="form-label">Meta Description</label>
                <textarea name="meta_description" rows="3"
                          class="form-input"
                          maxlength="160"
                          placeholder="Defaults to short description">{{ old('meta_description', $industry?->meta_description) }}</textarea>
                <p class="mt-1 font-sans text-[11px] text-muted-grey/60">Max 160 chars</p>
            </div>

        </div>

    </div>{{-- /sidebar --}}

</div>{{-- /two-col --}}

@push('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.getElementById('industry_body'), {
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
        .catch(err => console.error(err))
</script>
@endpush
