@extends('layouts.admin')

@section('title', 'Tambah Proyek Baru')

@section('content')
<div class="max-w-3xl bg-slate-900/80 border border-slate-800 rounded-2xl p-8 shadow-xl">
    <form action="{{ route('admin.projects.store') }}" method="POST" class="space-y-6">
        @csrf
        
        <div>
            <label class="block text-xs font-bold uppercase text-slate-400 mb-2">Judul Proyek *</label>
            <input type="text" name="title" required placeholder="Contoh: Perancangan Aplikasi HealthFlow" class="w-full px-4 py-3 rounded-xl bg-slate-950/80 border border-slate-800 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500">
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
            <div>
                <label class="block text-xs font-bold uppercase text-slate-400 mb-2">Kategori Proyek *</label>
                <input type="text" name="category" required placeholder="UI/UX, Machine Learning, Web App" class="w-full px-4 py-3 rounded-xl bg-slate-950/80 border border-slate-800 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500">
            </div>
            <div>
                <label class="block text-xs font-bold uppercase text-slate-400 mb-2">Peran Anda (Role)</label>
                <input type="text" name="role" placeholder="Ketua Kelompok, Frontend" class="w-full px-4 py-3 rounded-xl bg-slate-950/80 border border-slate-800 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500">
            </div>
            <div>
                <label class="block text-xs font-bold uppercase text-slate-400 mb-2">Periode Pengerjaan</label>
                <input type="text" name="period" placeholder="Juli 2026" class="w-full px-4 py-3 rounded-xl bg-slate-950/80 border border-slate-800 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500">
            </div>
        </div>

        <div>
            <label class="block text-xs font-bold uppercase text-slate-400 mb-2">Deskripsi Ringkas (Summary) *</label>
            <textarea name="summary" rows="3" required placeholder="Penjelasan umum gambaran proyek..." class="w-full px-4 py-3 rounded-xl bg-slate-950/80 border border-slate-800 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500"></textarea>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label class="block text-xs font-bold uppercase text-slate-400 mb-2">Tantangan (Problem Statement)</label>
                <textarea name="problem_statement" rows="3" placeholder="Masalah yang melatarbelakangi proyek..." class="w-full px-4 py-3 rounded-xl bg-slate-950/80 border border-slate-800 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500"></textarea>
            </div>
            <div>
                <label class="block text-xs font-bold uppercase text-slate-400 mb-2">Solusi & Hasil yang Dicapai</label>
                <textarea name="solution" rows="3" placeholder="Solusi & hasil pencapaian..." class="w-full px-4 py-3 rounded-xl bg-slate-950/80 border border-slate-800 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500"></textarea>
            </div>
        </div>

        <div>
            <label class="block text-xs font-bold uppercase text-slate-400 mb-2">Tech Stack / Tools Digunakan (Pisahkan dengan koma)</label>
            <input type="text" name="tech_stack" placeholder="Laravel, Python, Figma, Decision Tree C4.5" class="w-full px-4 py-3 rounded-xl bg-slate-950/80 border border-slate-800 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500">
        </div>

        <div class="flex items-center gap-4 pt-4 border-t border-slate-800">
            <button type="submit" class="px-6 py-3 rounded-xl bg-brand-600 hover:bg-brand-500 text-white font-semibold text-sm">
                Simpan Proyek
            </button>
            <a href="{{ route('admin.projects.index') }}" class="px-6 py-3 rounded-xl bg-slate-800 hover:bg-slate-700 text-slate-300 font-semibold text-sm">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection
