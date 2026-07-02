<?php

namespace App\Http\Controllers;

use App\Models\Award;
use App\Models\Client;
use App\Models\Setting;
use App\Models\Statistic;
use App\Models\TeamMember;
use App\Models\Testimonial;

class AboutController extends Controller
{
    public function index()
    {
        $team = TeamMember::orderBy('sort_order')->get();

        $statistics = Statistic::orderBy('sort_order')->get()
            ->map(fn ($s) => [
                'value'  => $s->value,
                'suffix' => $s->suffix ?? '+',
                'label'  => $s->label,
            ])
            ->toArray();

        $allClients = Client::orderBy('sort_order')->pluck('name')->toArray();
        $half       = (int) ceil(count($allClients) / 2);
        $clients    = [
            'row1' => array_slice($allClients, 0, $half) ?: null,
            'row2' => array_slice($allClients, $half)    ?: null,
        ];

        $testimonials = Testimonial::where('published', true)
            ->orderBy('sort_order')
            ->get();

        $awards = Award::where('published', true)
            ->orderBy('sort_order')
            ->get();

        $settings = array_merge(
            Setting::getGroup('about.'),
            Setting::getGroup('site.'),
        );

        return view('about.index', compact(
            'team',
            'statistics',
            'clients',
            'testimonials',
            'awards',
            'settings',
        ));
    }
}
