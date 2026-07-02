<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Service;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::orderBy('sort_order')->get();

        $faqs = Faq::where('published', true)
            ->orderBy('sort_order')
            ->get();

        return view('services.index', compact('services', 'faqs'));
    }

    public function show(string $slug)
    {
        $service = Service::where('slug', $slug)->firstOrFail();
        $others  = Service::where('slug', '!=', $slug)->orderBy('sort_order')->get();

        return view('services.show', compact('service', 'others'));
    }
}
