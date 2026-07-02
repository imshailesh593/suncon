<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Project;
use App\Models\Service;
use App\Models\Setting;
use App\Models\Statistic;

class HomeController extends Controller
{
    public function home()
    {
        $projects = Project::latest()->take(6)->get();

        $featuredProject = Project::where('featured', true)->first()
            ?? Project::latest()->first();

        $articles = Article::where('published', true)
            ->orderByDesc('published_at')
            ->take(3)
            ->get();

        $statistics = Statistic::orderBy('sort_order')->get()
            ->map(fn ($s) => [
                'value'  => $s->value,
                'suffix' => $s->suffix ?? '+',
                'label'  => $s->label,
            ])
            ->toArray();

        $services = Service::orderBy('sort_order')->take(3)->get();

        $settings = array_merge(
            Setting::getGroup('homepage.'),
            Setting::getGroup('site.'),
        );

        return view('home.index', compact(
            'projects',
            'featuredProject',
            'articles',
            'statistics',
            'services',
            'settings',
        ));
    }
}
