<?php

namespace App\Http\Controllers;

use App\Models\Article;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::where('published', true)
            ->orderByDesc('published_at')
            ->paginate(9);

        return view('journal.index', compact('articles'));
    }

    public function show(string $slug)
    {
        $article = Article::where('slug', $slug)
            ->where('published', true)
            ->firstOrFail();

        // Related articles in the same category
        $related = Article::where('published', true)
            ->where('id', '!=', $article->id)
            ->where('category', $article->category)
            ->orderByDesc('published_at')
            ->take(3)
            ->get();

        return view('journal.show', compact('article', 'related'));
    }
}
