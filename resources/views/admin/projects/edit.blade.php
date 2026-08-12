@extends('layouts.admin')

@section('title', 'Edit Proyek: ' . $project->title)

@section('content')
<div class="max-w-3xl bg-slate-900/80 border border-slate-800 rounded-2xl p-8 shadow-xl">
    <form action="{{ route('admin.projects.update', $project) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')
        
        <div>
            <label class="block text-xs font-bold uppercase text-slate-400 mb-2">Judul Proyek *</label>
            <input type="text" name="title" value="{{ old('title', $project->title) }}" required class="w-full px-4 py-3 rounded-xl bg-slate-950/80 border border-slate-800 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500">
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
            <div>
                <label class="block text-xs font-bold uppercase text-slate-400 mb-2">Kategori Proyek *</label>
                <input type="text" name="category" value="{{ old('category', $project->category) }}" required class="w-full px-4 py-3 rounded-xl bg-slate-950/80 border border-slate-800 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500">
            </div>
            <div>
                <label class="block text-xs font-bold uppercase text-slate-400 mb-2">Peran Anda (Role)</label>
                <input type="text" name="role" value="{{ old('role', $project->role) }}" class="w-full px-4 py-3 rounded-xl bg-slate-950/80 border border-slate-800 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500">
            </div>
            <div>
                <label class="block text-xs font-bold uppercase text-slate-400 mb-2">Periode Pengerjaan</label>
                <input type="text" name="period" value="{{ old('period', $project->period) }}" class="w-full px-4 py-3 rounded-xl bg-slate-950/80 border border-slate-800 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500">
            </div>
        </div>

        <div>
            <label class="block text-xs font-bold uppercase text-slate-400 mb-2">Deskripsi Ringkas (Summary) *</label>
            <textarea name="summary" rows="3" required class="w-full px-4 py-3 rounded-xl bg-slate-950/80 border border-slate-800 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500">{{ old('summary', $project->summary) }}</textarea>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label class="block text-xs font-bold uppercase text-slate-400 mb-2">Tantangan (Problem Statement)</label>
                <textarea name="problem_statement" rows="3" class="w-full px-4 py-3 rounded-xl bg-slate-950/80 border border-slate-800 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500">{{ old('problem_statement', $project->problem_statement) }}</textarea>
            </div>
            <div>
                <label class="block text-xs font-bold uppercase text-slate-400 mb-2">Solusi & Hasil yang Dicapai</label>
                <textarea name="solution" rows="3" class="w-full px-4 py-3 rounded-xl bg-slate-950/80 border border-slate-800 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500">{{ old('solution', $project->solution) }}</textarea>
            </div>
        </div>

        <div>
            <label class="block text-xs font-bold uppercase text-slate-400 mb-2">Tech Stack (Pisahkan dengan koma)</label>
            <input type="text" name="tech_stack" value="{{ old('tech_stack', is_array($project->tech_stack) ? implode(', ', $project->tech_stack) : '') }}" class="w-full px-4 py-3 rounded-xl bg-slate-950/80 border border-slate-800 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500">
        </div>

        <div class="flex items-center gap-4 pt-4 border-t border-slate-800">
            <button type="submit" class="px-6 py-3 rounded-xl bg-brand-600 hover:bg-brand-500 text-white font-semibold text-sm">
                Perbarui Proyek
            </button>
            <a href="{{ route('admin.projects.index') }}" class="px-6 py-3 rounded-xl bg-slate-800 hover:bg-slate-700 text-slate-300 font-semibold text-sm">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection
