@extends('layouts.admin')

@section('title', 'Tambah Keahlian Baru')

@section('content')
<div class="max-w-xl bg-slate-900/80 border border-slate-800 rounded-2xl p-8 shadow-xl">
    <form action="{{ route('admin.skills.store') }}" method="POST" class="space-y-6">
        @csrf

        <div>
            <label class="block text-xs font-bold uppercase text-slate-400 mb-2">Nama Keahlian / Tools *</label>
            <input type="text" name="name" required placeholder="Contoh: Laravel, Canva, Microsoft Excel" class="w-full px-4 py-3 rounded-xl bg-slate-950/80 border border-slate-800 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500">
        </div>

        <div>
            <label class="block text-xs font-bold uppercase text-slate-400 mb-2">Kategori Keahlian *</label>
            <select name="category" required class="w-full px-4 py-3 rounded-xl bg-slate-950/80 border border-slate-800 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500">
                <option value="Development Tools">Development Tools</option>
                <option value="Office Productivity">Office Productivity</option>
                <option value="Design & Editing">Design & Editing</option>
                <option value="Soft Skills">Soft Skills</option>
            </select>
        </div>

        <div>
            <label class="block text-xs font-bold uppercase text-slate-400 mb-2">Tingkat Kemampuan (0 - 100%) *</label>
            <input type="number" name="proficiency" min="1" max="100" value="90" required class="w-full px-4 py-3 rounded-xl bg-slate-950/80 border border-slate-800 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500">
        </div>

        <div>
            <label class="block text-xs font-bold uppercase text-slate-400 mb-2">Nama Icon Lucide (Opsional)</label>
            <input type="text" name="icon" placeholder="code, database, palette, users" class="w-full px-4 py-3 rounded-xl bg-slate-950/80 border border-slate-800 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500">
        </div>

        <div class="flex items-center gap-4 pt-4 border-t border-slate-800">
            <button type="submit" class="px-6 py-3 rounded-xl bg-brand-600 hover:bg-brand-500 text-white font-semibold text-sm">
                Simpan Keahlian
            </button>
            <a href="{{ route('admin.skills.index') }}" class="px-6 py-3 rounded-xl bg-slate-800 hover:bg-slate-700 text-slate-300 font-semibold text-sm">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection
