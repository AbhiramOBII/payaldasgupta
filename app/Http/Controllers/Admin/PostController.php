<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class PostController extends Controller
{
    public const CATEGORIES = [
        'PR & Communications',
        'Brand Strategy',
        'Thought Leadership',
        'Media & Storytelling',
        'Founder Perspective',
        'Industry Insights',
    ];

    public function index(): View
    {
        $posts = Post::orderByDesc('updated_at')->paginate(20);

        return view('admin.posts.index', compact('posts'));
    }

    public function create(): View
    {
        return view('admin.posts.create', [
            'categories' => self::CATEGORIES,
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $this->validatePost($request);

        $validated['slug']         = $this->uniqueSlug($request->slug ?: $request->title);
        $validated['tags']         = $this->parseTags($request->input('tags_raw', ''));
        $validated['published_at'] = $this->resolvePublishedAt($request);
        $validated['featured_image'] = $this->handleImageUpload($request);

        Post::create($validated);

        return redirect()->route('admin.posts.index')
            ->with('success', 'Post created.');
    }

    public function edit(Post $post): View
    {
        return view('admin.posts.edit', [
            'post'       => $post,
            'categories' => self::CATEGORIES,
        ]);
    }

    public function update(Request $request, Post $post): RedirectResponse
    {
        $validated = $this->validatePost($request, $post->id);

        $validated['slug']         = $this->uniqueSlug($request->slug ?: $request->title, $post->id);
        $validated['tags']         = $this->parseTags($request->input('tags_raw', ''));
        $validated['published_at'] = $this->resolvePublishedAt($request);

        // Only replace image if a new one was uploaded
        $newImage = $this->handleImageUpload($request);
        if ($newImage) {
            // Delete the old file
            if ($post->featured_image) {
                Storage::disk('public')->delete($post->featured_image);
            }
            $validated['featured_image'] = $newImage;
        }

        $post->update($validated);

        return redirect()->route('admin.posts.index')
            ->with('success', 'Post updated.');
    }

    public function destroy(Post $post): RedirectResponse
    {
        if ($post->featured_image) {
            Storage::disk('public')->delete($post->featured_image);
        }

        $post->delete();

        return redirect()->route('admin.posts.index')
            ->with('success', 'Post deleted.');
    }

    // ── Helpers ──────────────────────────────────────────────────────────────

    private function validatePost(Request $request, ?int $ignoreId = null): array
    {
        return $request->validate([
            'title'            => ['required', 'string', 'max:255'],
            'slug'             => ['nullable', 'string', 'max:255'],
            'excerpt'          => ['nullable', 'string'],
            'body'             => ['nullable', 'string'],
            'category'         => ['nullable', 'string', 'max:100'],
            'status'           => ['required', 'in:draft,published,archived'],
            'published_at'     => ['nullable', 'date'],
            'meta_title'       => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string', 'max:500'],
            'featured_image'   => ['nullable', 'image', 'max:4096', 'mimes:jpg,jpeg,png,webp'],
        ]);
    }

    private function uniqueSlug(string $base, ?int $ignoreId = null): string
    {
        $slug     = Str::slug($base);
        $original = $slug;
        $counter  = 1;

        while (
            Post::where('slug', $slug)
                ->when($ignoreId, fn ($q) => $q->where('id', '!=', $ignoreId))
                ->exists()
        ) {
            $slug = $original . '-' . $counter++;
        }

        return $slug;
    }

    private function parseTags(string $raw): array
    {
        return collect(explode(',', $raw))
            ->map(fn ($t) => trim($t))
            ->filter()
            ->unique()
            ->values()
            ->toArray();
    }

    private function resolvePublishedAt(Request $request): ?string
    {
        if ($request->status !== 'published') {
            return null;
        }

        return $request->published_at ?: now()->toDateTimeString();
    }

    private function handleImageUpload(Request $request): ?string
    {
        if (! $request->hasFile('featured_image')) {
            return null;
        }

        return $request->file('featured_image')
            ->store('posts', 'public');
    }
}
