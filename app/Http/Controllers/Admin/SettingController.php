<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\View\View;

class SettingController extends Controller
{
    public function index(): View
    {
        $settings = Setting::allKeyed();

        return view('admin.settings.index', compact('settings'));
    }

    // ── Update site settings ─────────────────────────────────────────────────

    public function updateSite(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'site_name'               => ['required', 'string', 'max:255'],
            'site_tagline'            => ['nullable', 'string', 'max:255'],
            'contact_email'           => ['nullable', 'email', 'max:255'],
            'contact_phone'           => ['nullable', 'string', 'max:50'],
            'linkedin_url'            => ['nullable', 'url', 'max:500'],
            'twitter_url'             => ['nullable', 'url', 'max:500'],
            'instagram_url'           => ['nullable', 'url', 'max:500'],
            'footer_tagline'          => ['nullable', 'string', 'max:500'],
            'default_meta_description'=> ['nullable', 'string', 'max:500'],
        ]);

        Setting::setMany($validated);

        return back()->with('success_site', 'Site settings saved successfully.');
    }

    // ── Update legal pages ───────────────────────────────────────────────────

    public function updateLegal(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'privacy_policy' => ['nullable', 'string'],
            'terms_content'  => ['nullable', 'string'],
        ]);

        Setting::setMany($validated);

        return back()->with('success_legal', 'Legal pages saved successfully.');
    }

    // ── Change password ──────────────────────────────────────────────────────

    public function updatePassword(Request $request): RedirectResponse
    {
        $request->validate([
            'current_password' => ['required', 'string'],
            'password'         => ['required', 'confirmed', Password::min(8)->mixedCase()->numbers()],
        ]);

        $user = Auth::user();

        if (! Hash::check($request->current_password, $user->password)) {
            return back()
                ->withErrors(['current_password' => 'The current password is incorrect.'])
                ->withInput();
        }

        $user->update(['password' => Hash::make($request->password)]);

        return back()->with('success_password', 'Password updated successfully.');
    }
}
