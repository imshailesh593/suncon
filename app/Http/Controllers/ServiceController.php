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
}
