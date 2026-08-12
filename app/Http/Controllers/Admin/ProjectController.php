<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::orderBy('order', 'asc')->get();
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'role' => 'nullable|string|max:255',
            'period' => 'nullable|string|max:255',
            'summary' => 'required|string',
            'problem_statement' => 'nullable|string',
            'solution' => 'nullable|string',
            'tech_stack' => 'nullable|string', // comma-separated
            'is_featured' => 'boolean',
            'order' => 'nullable|integer',
        ]);

        $validated['slug'] = Str::slug($validated['title']) . '-' . time();
        $validated['tech_stack'] = $request->tech_stack ? array_map('trim', explode(',', $request->tech_stack)) : [];
        $validated['is_featured'] = $request->has('is_featured');

        Project::create($validated);

        return redirect()->route('admin.projects.index')->with('success', 'Proyek berhasil ditambahkan!');
    }

    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'role' => 'nullable|string|max:255',
            'period' => 'nullable|string|max:255',
            'summary' => 'required|string',
            'problem_statement' => 'nullable|string',
            'solution' => 'nullable|string',
            'tech_stack' => 'nullable|string',
            'order' => 'nullable|integer',
        ]);

        $validated['tech_stack'] = $request->tech_stack ? array_map('trim', explode(',', $request->tech_stack)) : [];
        $validated['is_featured'] = $request->has('is_featured');

        $project->update($validated);

        return redirect()->route('admin.projects.index')->with('success', 'Proyek berhasil diperbarui!');
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.projects.index')->with('success', 'Proyek berhasil dihapus!');
    }
}
