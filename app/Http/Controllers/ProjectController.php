<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $query = Project::latest();

        if ($request->filled('discipline')) {
            $query->where('discipline', 'like', '%'.$request->discipline.'%');
        }

        $projects = $query->paginate(12);

        return view('projects.index', compact('projects'));
    }

    public function show(string $slug)
    {
        $project = Project::where('slug', $slug)->firstOrFail();

        // Related projects in the same discipline, excluding this one
        $related = Project::where('discipline', $project->discipline)
            ->where('id', '!=', $project->id)
            ->latest()
            ->take(3)
            ->get();

        return view('projects.show', compact('project', 'related'));
    }
}
