<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ServiceController extends Controller
{
    public function index(): View
    {
        $services = Service::orderBy('sort_order')->orderBy('created_at', 'desc')->get();

        return view('admin.services.index', compact('services'));
    }

    public function create(): View
    {
        return view('admin.services.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $this->validateService($request);

        $validated['slug']   = $this->uniqueSlug($request->slug ?: $request->title);
        $validated['faqs']   = $this->cleanFaqs($request->input('faqs', []));

        Service::create($validated);

        return redirect()->route('admin.services.index')
            ->with('success', 'Service created successfully.');
    }

    public function edit(Service $service): View
    {
        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, Service $service): RedirectResponse
    {
        $validated = $this->validateService($request, $service->id);

        $validated['slug'] = $this->uniqueSlug(
            $request->slug ?: $request->title,
            $service->id
        );
        $validated['faqs'] = $this->cleanFaqs($request->input('faqs', []));

        $service->update($validated);

        return redirect()->route('admin.services.index')
            ->with('success', 'Service updated successfully.');
    }

    public function destroy(Service $service): RedirectResponse
    {
        $service->delete();

        return redirect()->route('admin.services.index')
            ->with('success', 'Service deleted.');
    }

    // ── Helpers ──────────────────────────────────────────────────────────

    private function validateService(Request $request, ?int $ignoreId = null): array
    {
        return $request->validate([
            'title'             => ['required', 'string', 'max:255'],
            'slug'              => ['nullable', 'string', 'max:255'],
            'short_description' => ['required', 'string'],
            'full_description'  => ['nullable', 'string'],
            'cta_title'         => ['nullable', 'string', 'max:255'],
            'cta_description'   => ['nullable', 'string'],
            'cta_link'          => ['nullable', 'string', 'max:255'],
            'status'            => ['required', 'in:active,inactive'],
            'sort_order'        => ['nullable', 'integer', 'min:0'],
            'meta_title'        => ['nullable', 'string', 'max:70'],
            'meta_description'  => ['nullable', 'string', 'max:160'],
        ]);
    }

    /** Generate a URL-safe slug, appending a counter if already taken. */
    private function uniqueSlug(string $base, ?int $ignoreId = null): string
    {
        $slug      = Str::slug($base);
        $original  = $slug;
        $counter   = 1;

        while (
            Service::where('slug', $slug)
                ->when($ignoreId, fn ($q) => $q->where('id', '!=', $ignoreId))
                ->exists()
        ) {
            $slug = $original . '-' . $counter++;
        }

        return $slug;
    }

    /** Remove blank FAQ rows submitted by the form. */
    private function cleanFaqs(array $faqs): array
    {
        return collect($faqs)
            ->filter(fn ($faq) => !empty($faq['question']) || !empty($faq['answer']))
            ->values()
            ->toArray();
    }
}
