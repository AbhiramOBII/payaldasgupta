<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Industry;
use App\Models\Service;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class IndustryController extends Controller
{
    public function index(): View
    {
        $industries = Industry::ordered()->paginate(25);

        return view('admin.industries.index', compact('industries'));
    }

    public function create(): View
    {
        $services = Service::where('status', 'active')->orderBy('sort_order')->get();

        return view('admin.industries.create', compact('services'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $this->validateIndustry($request);

        $validated['slug']               = $this->uniqueSlug($request->slug ?: $request->title);
        $validated['expected_outcomes']  = $this->parseOutcomes($request->input('outcomes', []));
        $validated['related_service_ids'] = array_map('intval', $request->input('related_service_ids', []));

        Industry::create($validated);

        return redirect()->route('admin.industries.index')
            ->with('success', 'Industry created.');
    }

    public function edit(Industry $industry): View
    {
        $services = Service::where('status', 'active')->orderBy('sort_order')->get();

        return view('admin.industries.edit', compact('industry', 'services'));
    }

    public function update(Request $request, Industry $industry): RedirectResponse
    {
        $validated = $this->validateIndustry($request, $industry->id);

        $validated['slug']                = $this->uniqueSlug($request->slug ?: $request->title, $industry->id);
        $validated['expected_outcomes']   = $this->parseOutcomes($request->input('outcomes', []));
        $validated['related_service_ids'] = array_map('intval', $request->input('related_service_ids', []));

        $industry->update($validated);

        return redirect()->route('admin.industries.index')
            ->with('success', 'Industry updated.');
    }

    public function destroy(Industry $industry): RedirectResponse
    {
        $industry->delete();

        return redirect()->route('admin.industries.index')
            ->with('success', 'Industry deleted.');
    }

    // ── Helpers ──────────────────────────────────────────────────────────────

    private function validateIndustry(Request $request, ?int $ignoreId = null): array
    {
        return $request->validate([
            'title'             => ['required', 'string', 'max:255'],
            'slug'              => ['nullable', 'string', 'max:255'],
            'short_description' => ['nullable', 'string'],
            'full_description'  => ['nullable', 'string'],
            'status'            => ['required', 'in:active,inactive'],
            'sort_order'        => ['nullable', 'integer', 'min:0'],
            'meta_title'        => ['nullable', 'string', 'max:70'],
            'meta_description'  => ['nullable', 'string', 'max:160'],
        ]);
    }

    private function uniqueSlug(string $base, ?int $ignoreId = null): string
    {
        $slug     = Str::slug($base);
        $original = $slug;
        $counter  = 1;

        while (
            Industry::where('slug', $slug)
                ->when($ignoreId, fn ($q) => $q->where('id', '!=', $ignoreId))
                ->exists()
        ) {
            $slug = $original . '-' . $counter++;
        }

        return $slug;
    }

    /**
     * Parse the repeater outcome rows into a clean array of non-empty strings.
     */
    private function parseOutcomes(array $raw): array
    {
        return collect($raw)
            ->map(fn ($v) => trim($v))
            ->filter()
            ->values()
            ->toArray();
    }
}
