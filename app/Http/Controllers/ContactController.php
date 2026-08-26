<?php

namespace App\Http\Controllers;

use App\Models\Enquiry;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ContactController extends Controller
{
    public const SERVICES = [
        'Strategic Communications',
        'Public Relations',
        'Brand Storytelling',
        'Founder Positioning',
        'Thought Leadership',
        'Media Relations',
        'Brand Reputation',
        'Launch Communications',
        'PR Strategy',
        'Not sure yet',
    ];

    public function show(): View
    {
        return view('contact', [
            'services' => self::SERVICES,
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name'             => ['required', 'string', 'max:150'],
            'email'            => ['required', 'email', 'max:255'],
            'phone'            => ['nullable', 'string', 'max:30'],
            'company'          => ['nullable', 'string', 'max:200'],
            'service_interest' => ['nullable', 'string', 'max:100'],
            'message'          => ['required', 'string', 'min:20', 'max:3000'],
        ]);

        Enquiry::create(array_merge($validated, [
            'ip_address' => $request->ip(),
        ]));

        return redirect()->route('contact')
            ->with('success', true);
    }
}
