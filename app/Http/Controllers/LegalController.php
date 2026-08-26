<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\View\View;

class LegalController extends Controller
{
    public function privacy(): View
    {
        $content = Setting::get('privacy_policy', '<p>Privacy Policy coming soon.</p>');

        return view('legal.privacy', compact('content'));
    }

    public function terms(): View
    {
        $content = Setting::get('terms_content', '<p>Terms of Use coming soon.</p>');

        return view('legal.terms', compact('content'));
    }
}
