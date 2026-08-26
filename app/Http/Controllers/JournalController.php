<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\View\View;

class JournalController extends Controller
{
    public function index(): View
    {
        $posts = Post::published()
            ->latest()
            ->paginate(9);

        return view('journal.index', compact('posts'));
    }

    public function show(Post $post): View
    {
        abort_if(! $post->isPublished(), 404);

        $related = Post::published()
            ->where('id', '!=', $post->id)
            ->where('category', $post->category)
            ->latest()
            ->take(3)
            ->get();

        // Fall back to any recent posts if not enough in same category
        if ($related->count() < 3) {
            $existing = $related->pluck('id')->push($post->id);
            $more = Post::published()
                ->whereNotIn('id', $existing)
                ->latest()
                ->take(3 - $related->count())
                ->get();
            $related = $related->merge($more);
        }

        return view('journal.show', compact('post', 'related'));
    }
}
