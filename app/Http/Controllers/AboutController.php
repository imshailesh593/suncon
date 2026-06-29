<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Statistic;
use App\Models\TeamMember;

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

        // Two rows of client names for the marquee
        $allClients = Client::orderBy('sort_order')->pluck('name')->toArray();
        $half       = (int) ceil(count($allClients) / 2);
        $clients    = [
            'row1' => array_slice($allClients, 0, $half) ?: null,
            'row2' => array_slice($allClients, $half)    ?: null,
        ];

        return view('about.index', compact('team', 'statistics', 'clients'));
    }
}
