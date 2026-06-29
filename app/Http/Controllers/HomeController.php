<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Project;
use App\Models\Service;
use App\Models\Statistic;

class HomeController extends Controller
{
    public function home()
    {
        // Latest 5 projects for the horizontal scroll strip
        $projects = Project::latest()->take(5)->get();

        // First featured project
        $featuredProject = Project::where('featured', true)->first()
            ?? Project::latest()->first();

        // Latest 3 published articles
        $articles = Article::where('published', true)
            ->orderByDesc('published_at')
            ->take(3)
            ->get();

        // Statistics (from DB or fall through to blade defaults)
        $statistics = Statistic::orderBy('sort_order')->get()
            ->map(fn ($s) => [
                'value'  => $s->value,
                'suffix' => $s->suffix ?? '+',
                'label'  => $s->label,
            ])
            ->toArray();

        // Three service teasers
        $services = Service::orderBy('sort_order')->take(3)->get()
            ->map(fn ($s) => [
                'title'   => $s->title,
                'tagline' => $s->tagline,
                'image'   => $s->image,
                'slug'    => $s->slug,
            ])
            ->toArray();

        return view('home.index', compact(
            'projects',
            'featuredProject',
            'articles',
            'statistics',
            'services',
        ));
    }
}
