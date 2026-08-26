<?php

namespace App\Http\Controllers;

use App\Models\Industry;
use Illuminate\View\View;

class IndustryController extends Controller
{
    public function index(): View
    {
        $industries = Industry::active()->ordered()->get();

        return view('industries.index', compact('industries'));
    }

    public function show(Industry $industry): View
    {
        abort_if($industry->status === 'inactive', 404);

        $relatedServices = $industry->relatedServices();

        $others = Industry::active()
            ->ordered()
            ->where('id', '!=', $industry->id)
            ->take(4)
            ->get();

        return view('industries.show', compact('industry', 'relatedServices', 'others'));
    }
}
