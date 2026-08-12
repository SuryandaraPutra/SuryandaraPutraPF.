<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    public function index()
    {
        $educations = Education::orderBy('order', 'asc')->get();
        return view('admin.education.index', compact('educations'));
    }

    public function create()
    {
        return view('admin.education.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'institution' => 'required|string|max:255',
            'degree_major' => 'required|string|max:255',
            'period' => 'required|string|max:255',
            'score' => 'nullable|string|max:255',
            'details' => 'nullable|string', // comma separated
            'order' => 'nullable|integer',
        ]);

        $validated['details'] = $request->details ? array_map('trim', explode(',', $request->details)) : [];

        Education::create($validated);

        return redirect()->route('admin.education.index')->with('success', 'Data pendidikan berhasil ditambahkan!');
    }

    public function edit(Education $education)
    {
        return view('admin.education.edit', compact('education'));
    }

    public function update(Request $request, Education $education)
    {
        $validated = $request->validate([
            'institution' => 'required|string|max:255',
            'degree_major' => 'required|string|max:255',
            'period' => 'required|string|max:255',
            'score' => 'nullable|string|max:255',
            'details' => 'nullable|string',
            'order' => 'nullable|integer',
        ]);

        $validated['details'] = $request->details ? array_map('trim', explode(',', $request->details)) : [];

        $education->update($validated);

        return redirect()->route('admin.education.index')->with('success', 'Data pendidikan berhasil diperbarui!');
    }

    public function destroy(Education $education)
    {
        $education->delete();
        return redirect()->route('admin.education.index')->with('success', 'Data pendidikan berhasil dihapus!');
    }
}
