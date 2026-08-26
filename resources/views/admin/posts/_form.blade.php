@php
    $post       ??= null;
    $categories ??= [];
    $tagsRaw      = old('tags_raw', implode(', ', $post?->tags ?? []));
    $bodyValue    = old('body', $post?->body ?? '');
@endphp

{{-- Two-column layout: main (left) + sidebar (right) --}}
<div class="flex flex-col xl:flex-row gap-5">

    {{-- ── Left: main content ──────────────────────────────────────────────── --}}
    <div class="flex-1 min-w-0 space-y-5">

        {{-- Title + Slug --}}
        <div class="bg-white border border-border-grey rounded-lg divide-y divide-border-grey">

            <div class="px-6 py-5">
                <label class="form-label">Title <span class="text-red-400">*</span></label>
                <input type="text" name="title" id="post_title"
                       value="{{ old('title', $post?->title) }}"
                       class="form-input text-[16px] @error('title') border-red-400 @enderror"
                       placeholder="Post title…" required>
                @error('title') <p class="form-error">{{ $message }}</p> @enderror
            </div>

            <div class="px-6 py-4">
                <label class="form-label">
                    Slug
                    <span class="font-normal text-muted-grey/60 normal-case tracking-normal">(auto-generated)</span>
                </label>
                <div class="flex items-center gap-2 mt-1.5">
                    <span class="font-sans text-[12px] text-muted-grey/60 shrink-0">/journal/</span>
                    <input type="text" name="slug"
                           value="{{ old('slug', $post?->slug) }}"
                           class="form-input @error('slug') border-red-400 @enderror"
                           placeholder="post-slug">
                </div>
                @error('slug') <p class="form-error">{{ $message }}</p> @enderror
            </div>

        </div>

        {{-- Excerpt --}}
        <div class="bg-white border border-border-grey rounded-lg px-6 py-5">
            <label class="form-label">Excerpt</label>
            <p class="font-sans text-[11px] text-muted-grey/60 mb-2">
                Shown in listings and search results. ~160 characters ideal.
            </p>
            <textarea name="excerpt" rows="2"
                      class="form-input @error('excerpt') border-red-400 @enderror"
                      placeholder="A brief, compelling summary of the post.">{{ old('excerpt', $post?->excerpt) }}</textarea>
            @error('excerpt') <p class="form-error">{{ $message }}</p> @enderror
        </div>

        {{-- Body (CKEditor) --}}
        <div class="bg-white border border-border-grey rounded-lg px-6 py-5">
            <label class="form-label">Content <span class="text-red-400">*</span></label>
            <textarea name="body" id="post_body"
                      class="form-input @error('body') border-red-400 @enderror">{{ $bodyValue }}</textarea>
            @if ($post?->reading_time)
                <p class="mt-2 font-sans text-[11.5px] text-muted-grey/60">
                    Estimated read: {{ $post->reading_time }} min
                </p>
            @endif
            @error('body') <p class="form-error">{{ $message }}</p> @enderror
        </div>

        {{-- SEO --}}
        <div class="bg-white border border-border-grey rounded-lg divide-y divide-border-grey">

            <div class="px-6 py-4 flex items-center justify-between">
                <p class="font-sans text-[13px] font-semibold text-primary-black">SEO</p>
                <span class="font-sans text-[11px] text-muted-grey/60">Optional</span>
            </div>

            <div class="px-6 py-5">
                <label class="form-label">Meta Title</label>
                <input type="text" name="meta_title"
                       value="{{ old('meta_title', $post?->meta_title) }}"
                       class="form-input"
                       maxlength="70"
                       placeholder="Leave blank to use post title">
            </div>

            <div class="px-6 py-5">
                <label class="form-label">Meta Description</label>
                <textarea name="meta_description" rows="2"
                          class="form-input"
                          maxlength="500"
                          placeholder="Leave blank to use excerpt.">{{ old('meta_description', $post?->meta_description) }}</textarea>
            </div>

        </div>

    </div>{{-- /left --}}

    {{-- ── Right: sidebar ──────────────────────────────────────────────────── --}}
    <div class="xl:w-72 shrink-0 space-y-5">

        {{-- Publishing --}}
        <div class="bg-white border border-border-grey rounded-lg divide-y divide-border-grey">

            <div class="px-5 py-4">
                <p class="font-sans text-[13px] font-semibold text-primary-black">Publishing</p>
            </div>

            <div class="px-5 py-4">
                <label class="form-label">Status</label>
                <select name="status" class="form-input">
                    <option value="draft"     {{ old('status', $post?->status ?? 'draft') === 'draft'     ? 'selected' : '' }}>Draft</option>
                    <option value="published" {{ old('status', $post?->status) === 'published' ? 'selected' : '' }}>Published</option>
                    <option value="archived"  {{ old('status', $post?->status) === 'archived'  ? 'selected' : '' }}>Archived</option>
                </select>
            </div>

            <div class="px-5 py-4">
                <label class="form-label">
                    Publish Date
                    <span class="font-normal text-muted-grey/60 normal-case tracking-normal">(optional)</span>
                </label>
                <input type="datetime-local" name="published_at"
                       value="{{ old('published_at', $post?->published_at?->format('Y-m-d\TH:i')) }}"
                       class="form-input">
                <p class="mt-1.5 font-sans text-[11px] text-muted-grey/60">
                    Set a future date to schedule.
                </p>
            </div>

        </div>

        {{-- Category + Tags --}}
        <div class="bg-white border border-border-grey rounded-lg divide-y divide-border-grey">

            <div class="px-5 py-4">
                <p class="font-sans text-[13px] font-semibold text-primary-black">Taxonomy</p>
            </div>

            <div class="px-5 py-4">
                <label class="form-label">Category</label>
                <select name="category" class="form-input">
                    <option value="">— None —</option>
                    @foreach ($categories as $cat)
                        <option value="{{ $cat }}"
                            {{ old('category', $post?->category) === $cat ? 'selected' : '' }}>
                            {{ $cat }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Tag input (Alpine.js) --}}
            <div class="px-5 py-4"
                 x-data="{
                    raw: '{{ $tagsRaw }}',
                    get tags() {
                        return this.raw.split(',').map(t => t.trim()).filter(t => t !== '')
                    },
                    removeTag(tag) {
                        this.raw = this.tags.filter(t => t !== tag).join(', ')
                    },
                    addOnComma(e) {
                        if (e.key === ',' || e.key === 'Enter') {
                            e.preventDefault()
                        }
                    }
                 }">
                <label class="form-label">Tags</label>
                <p class="font-sans text-[11px] text-muted-grey/60 mb-2">
                    Comma-separated — e.g. PR, strategy, brand
                </p>

                {{-- Tag chips --}}
                <div class="flex flex-wrap gap-1.5 mb-2" x-show="tags.length > 0">
                    <template x-for="tag in tags" :key="tag">
                        <span class="inline-flex items-center gap-1 font-sans text-[11.5px]
                                     bg-border-grey/40 text-primary-black px-2 py-0.5 rounded">
                            <span x-text="tag"></span>
                            <button type="button" @click="removeTag(tag)"
                                    class="text-muted-grey hover:text-red-500 transition-colors ml-0.5">
                                ×
                            </button>
                        </span>
                    </template>
                </div>

                {{-- Raw input (synced with x-model) --}}
                <input type="text" name="tags_raw" x-model="raw"
                       class="form-input"
                       placeholder="PR, strategy, brand">
            </div>

        </div>

        {{-- Featured image --}}
        <div class="bg-white border border-border-grey rounded-lg divide-y divide-border-grey">

            <div class="px-5 py-4">
                <p class="font-sans text-[13px] font-semibold text-primary-black">Featured Image</p>
            </div>

            <div class="px-5 py-5" x-data="{ preview: '{{ $post?->featuredImageUrl() }}' }">

                {{-- Current image --}}
                <div x-show="preview" class="mb-4">
                    <img :src="preview" alt="Featured image preview"
                         class="w-full h-36 object-cover rounded border border-border-grey">
                </div>

                <label class="form-label">
                    {{ $post?->featured_image ? 'Replace image' : 'Upload image' }}
                </label>
                <input type="file" name="featured_image"
                       accept="image/jpeg,image/png,image/webp"
                       class="block w-full font-sans text-[12.5px] text-muted-grey
                              file:mr-3 file:py-1.5 file:px-3 file:rounded
                              file:border-0 file:font-sans file:text-[12px]
                              file:font-medium file:bg-border-grey/40 file:text-primary-black
                              hover:file:bg-border-grey/70 file:cursor-pointer"
                       @change="preview = URL.createObjectURL($event.target.files[0])">
                <p class="mt-1.5 font-sans text-[11px] text-muted-grey/60">
                    JPG, PNG or WebP · max 4 MB
                </p>
                @error('featured_image') <p class="form-error">{{ $message }}</p> @enderror

            </div>

        </div>

    </div>{{-- /sidebar --}}

</div>{{-- /two-col --}}

@push('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.getElementById('post_body'), {
            toolbar: {
                items: [
                    'heading', '|',
                    'bold', 'italic', 'underline', '|',
                    'link', '|',
                    'bulletedList', 'numberedList', '|',
                    'blockQuote', 'horizontalLine', '|',
                    'undo', 'redo',
                ]
            },
            heading: {
                options: [
                    { model: 'paragraph',  title: 'Paragraph',  class: 'ck-heading_paragraph'  },
                    { model: 'heading2',   view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                    { model: 'heading3',   view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
                    { model: 'heading4',   view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4' },
                ]
            },
        })
        .catch(err => console.error(err))
</script>
@endpush
