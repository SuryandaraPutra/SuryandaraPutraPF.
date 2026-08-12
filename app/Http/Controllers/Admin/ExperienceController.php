<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    public function index()
    {
        $experiences = Experience::orderBy('order', 'asc')->get();
        return view('admin.experiences.index', compact('experiences'));
    }

    public function create()
    {
        return view('admin.experiences.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'organization' => 'required|string|max:255',
            'role_type' => 'required|string|max:255',
            'period' => 'required|string|max:255',
            'bullets' => 'required|string', // newline separated
            'order' => 'nullable|integer',
        ]);

        $bullets = array_filter(array_map('trim', explode("\n", $request->bullets)));
        $validated['bullets'] = array_values($bullets);

        Experience::create($validated);

        return redirect()->route('admin.experiences.index')->with('success', 'Pengalaman berhasil ditambahkan!');
    }

    public function edit(Experience $experience)
    {
        return view('admin.experiences.edit', compact('experience'));
    }

    public function update(Request $request, Experience $experience)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'organization' => 'required|string|max:255',
            'role_type' => 'required|string|max:255',
            'period' => 'required|string|max:255',
            'bullets' => 'required|string',
            'order' => 'nullable|integer',
        ]);

        $bullets = array_filter(array_map('trim', explode("\n", $request->bullets)));
        $validated['bullets'] = array_values($bullets);

        $experience->update($validated);

        return redirect()->route('admin.experiences.index')->with('success', 'Pengalaman berhasil diperbarui!');
    }

    public function destroy(Experience $experience)
    {
        $experience->delete();
        return redirect()->route('admin.experiences.index')->with('success', 'Pengalaman berhasil dihapus!');
    }
}
