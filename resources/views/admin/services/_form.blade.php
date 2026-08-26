@php
    $service ??= null;
    $faqsJson = json_encode(
        old('faqs', $service?->faqs ?? [['question' => '', 'answer' => '']])
    );
@endphp

{{-- ── Core details ────────────────────────────────────────────────────── --}}
<div class="bg-white border border-border-grey rounded-lg divide-y divide-border-grey mb-5">

    {{-- Title + Slug --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-5 px-6 py-5">

        <div>
            <label class="form-label">Title <span class="text-red-400">*</span></label>
            <input type="text" name="title" id="title"
                   value="{{ old('title', $service?->title) }}"
                   class="form-input @error('title') border-red-400 @enderror"
                   placeholder="e.g. Strategic Communications"
                   required>
            @error('title')
                <p class="form-error">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="form-label">
                Slug
                <span class="font-normal text-muted-grey/60 normal-case tracking-normal">(auto-generated if blank)</span>
            </label>
            <input type="text" name="slug" id="slug"
                   value="{{ old('slug', $service?->slug) }}"
                   class="form-input @error('slug') border-red-400 @enderror"
                   placeholder="strategic-communications">
            @error('slug')
                <p class="form-error">{{ $message }}</p>
            @enderror
        </div>

    </div>

    {{-- Short description --}}
    <div class="px-6 py-5">
        <label class="form-label">Short Description <span class="text-red-400">*</span></label>
        <textarea name="short_description" rows="2"
                  class="form-input @error('short_description') border-red-400 @enderror"
                  placeholder="One or two sentences — used in listings and cards."
                  required>{{ old('short_description', $service?->short_description) }}</textarea>
        @error('short_description')
            <p class="form-error">{{ $message }}</p>
        @enderror
    </div>

    {{-- Full description — CKEditor --}}
    <div class="px-6 py-5">
        <label class="form-label">Full Description</label>
        <textarea name="full_description" id="full_description"
                  class="form-input @error('full_description') border-red-400 @enderror">{{ old('full_description', $service?->full_description) }}</textarea>
        @error('full_description')
            <p class="form-error">{{ $message }}</p>
        @enderror
    </div>

</div>

{{-- ── FAQs ─────────────────────────────────────────────────────────────── --}}
<div class="bg-white border border-border-grey rounded-lg mb-5"
     x-data="{ faqs: {{ $faqsJson }} }">

    <div class="px-6 py-4 border-b border-border-grey flex items-center justify-between">
        <div>
            <p class="font-sans text-[13px] font-semibold text-primary-black">FAQs</p>
            <p class="font-sans text-[11.5px] text-muted-grey mt-0.5">
                Frequently asked questions for this service.
            </p>
        </div>
        <button type="button"
                @click="faqs.push({ question: '', answer: '' })"
                class="inline-flex items-center gap-1.5 font-sans text-[12px] font-medium
                       text-burgundy hover:text-burgundy-dark transition-colors duration-150">
            + Add FAQ
        </button>
    </div>

    <div class="px-6 py-5 space-y-4">

        <template x-if="faqs.length === 0">
            <p class="font-sans text-[12.5px] text-muted-grey/60 text-center py-4">
                No FAQs yet. Click "Add FAQ" to get started.
            </p>
        </template>

        <template x-for="(faq, index) in faqs" :key="index">
            <div class="border border-border-grey rounded-lg p-4 space-y-3">

                {{-- Question --}}
                <div>
                    <label class="form-label">Question</label>
                    <input type="text"
                           :name="`faqs[${index}][question]`"
                           x-model="faq.question"
                           class="form-input"
                           placeholder="e.g. How long does the process take?">
                </div>

                {{-- Answer --}}
                <div>
                    <label class="form-label">Answer</label>
                    <textarea :name="`faqs[${index}][answer]`"
                              x-model="faq.answer"
                              rows="3"
                              class="form-input"
                              placeholder="Detailed answer..."></textarea>
                </div>

                {{-- Remove --}}
                <div class="flex justify-end">
                    <button type="button"
                            @click="faqs.splice(index, 1)"
                            class="font-sans text-[11.5px] text-red-400
                                   hover:text-red-600 transition-colors duration-150">
                        Remove
                    </button>
                </div>

            </div>
        </template>

    </div>
</div>

{{-- ── CTA ──────────────────────────────────────────────────────────────── --}}
<div class="bg-white border border-border-grey rounded-lg divide-y divide-border-grey mb-5">

    <div class="px-6 py-4 border-b border-border-grey">
        <p class="font-sans text-[13px] font-semibold text-primary-black">Call to Action</p>
        <p class="font-sans text-[11.5px] text-muted-grey mt-0.5">
            Shown at the bottom of the service page.
        </p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-5 px-6 py-5">

        <div>
            <label class="form-label">CTA Title</label>
            <input type="text" name="cta_title"
                   value="{{ old('cta_title', $service?->cta_title) }}"
                   class="form-input"
                   placeholder="e.g. Let's build your narrative">
        </div>

        <div>
            <label class="form-label">CTA Link</label>
            <input type="text" name="cta_link"
                   value="{{ old('cta_link', $service?->cta_link) }}"
                   class="form-input"
                   placeholder="/contact or https://...">
        </div>

    </div>

    <div class="px-6 py-5">
        <label class="form-label">CTA Description</label>
        <textarea name="cta_description" rows="2"
                  class="form-input"
                  placeholder="Supporting sentence beneath the CTA title.">{{ old('cta_description', $service?->cta_description) }}</textarea>
    </div>

</div>

{{-- ── SEO ──────────────────────────────────────────────────────────────── --}}
<div class="bg-white border border-border-grey rounded-lg divide-y divide-border-grey mb-5">

    <div class="px-6 py-4 flex items-center justify-between">
        <div>
            <p class="font-sans text-[13px] font-semibold text-primary-black">SEO</p>
            <p class="font-sans text-[11.5px] text-muted-grey mt-0.5">
                Defaults to title and short description if left blank.
            </p>
        </div>
        <span class="font-sans text-[11px] text-muted-grey/60">Optional</span>
    </div>

    <div class="px-6 py-5">
        <label class="form-label">Meta Title</label>
        <input type="text" name="meta_title"
               value="{{ old('meta_title', $service?->meta_title) }}"
               class="form-input"
               maxlength="70"
               placeholder="Leave blank to use service title (max 70 chars)">
        <p class="font-sans text-[11px] text-muted-grey/60 mt-1">Recommended: 50–60 characters</p>
    </div>

    <div class="px-6 py-5">
        <label class="form-label">Meta Description</label>
        <textarea name="meta_description" rows="2"
                  class="form-input"
                  maxlength="160"
                  placeholder="Leave blank to use short description (max 160 chars)">{{ old('meta_description', $service?->meta_description) }}</textarea>
        <p class="font-sans text-[11px] text-muted-grey/60 mt-1">Recommended: 120–155 characters</p>
    </div>

</div>

{{-- ── Publishing ───────────────────────────────────────────────────────── --}}
<div class="bg-white border border-border-grey rounded-lg mb-5">

    <div class="px-6 py-4 border-b border-border-grey">
        <p class="font-sans text-[13px] font-semibold text-primary-black">Publishing</p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 px-6 py-5">

        <div>
            <label class="form-label">Status</label>
            <select name="status" class="form-input">
                <option value="active"   {{ old('status', $service?->status ?? 'active') === 'active'   ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ old('status', $service?->status) === 'inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

        <div>
            <label class="form-label">
                Sort Order
                <span class="font-normal text-muted-grey/60 normal-case tracking-normal">(lower = first)</span>
            </label>
            <input type="number" name="sort_order" min="0"
                   value="{{ old('sort_order', $service?->sort_order ?? 0) }}"
                   class="form-input">
        </div>

    </div>

</div>

@push('scripts')
{{--
    CKEditor 5 Classic via CDN.
    Attaches to #full_description and syncs content back to
    the hidden textarea automatically on form submit.
--}}
<script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.getElementById('full_description'), {
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
                    { model: 'paragraph',  title: 'Paragraph',  class: 'ck-heading_paragraph'  },
                    { model: 'heading2',   view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                    { model: 'heading3',   view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
                ]
            },
            // Prevent CKEditor from wrapping bare text in <p> blocks
            // while still preserving existing HTML on edit
        })
        .catch(err => console.error(err))
</script>
@endpush
