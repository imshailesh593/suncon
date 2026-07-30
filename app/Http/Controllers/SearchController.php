<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Article;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function __invoke(Request $request)
    {
        $q = trim($request->get('q', ''));

        if (strlen($q) < 2) {
            return response()->json(['results' => []]);
        }

        $like = "%{$q}%";

        $projects = Project::where('status', 'published')
            ->where(fn($query) => $query
                ->where('title', 'like', $like)
                ->orWhere('discipline', 'like', $like)
                ->orWhere('location', 'like', $like)
            )
            ->select('title', 'slug', 'discipline', 'cover_image')
            ->limit(5)
            ->get()
            ->map(fn($p) => [
                'type'     => 'Project',
                'title'    => $p->title,
                'subtitle' => ucfirst($p->discipline) . ($p->location ? ' · ' . $p->location : ''),
                'url'      => route('projects.show', $p->slug),
                'image'    => $p->cover_image,
            ]);

        $articles = Article::where('published', true)
            ->where(fn($query) => $query
                ->where('title', 'like', $like)
                ->orWhere('excerpt', 'like', $like)
                ->orWhere('category', 'like', $like)
            )
            ->select('title', 'slug', 'category', 'cover_image')
            ->limit(3)
            ->get()
            ->map(fn($a) => [
                'type'     => 'Journal',
                'title'    => $a->title,
                'subtitle' => $a->category,
                'url'      => route('journal.show', $a->slug),
                'image'    => $a->cover_image,
            ]);

        $results = $projects->concat($articles)->values();

        return response()->json(['results' => $results, 'query' => $q]);
    }
}
