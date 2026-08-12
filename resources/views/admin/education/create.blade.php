@extends('layouts.admin')

@section('title', 'Tambah Pendidikan Baru')

@section('content')
<div class="max-w-xl bg-slate-900/80 border border-slate-800 rounded-2xl p-8 shadow-xl">
    <form action="{{ route('admin.education.store') }}" method="POST" class="space-y-6">
        @csrf

        <div>
            <label class="block text-xs font-bold uppercase text-slate-400 mb-2">Nama Institusi / Universitas *</label>
            <input type="text" name="institution" required placeholder="Universitas Bina Sarana Informatika — Kampus Margonda" class="w-full px-4 py-3 rounded-xl bg-slate-950/80 border border-slate-800 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500">
        </div>

        <div>
            <label class="block text-xs font-bold uppercase text-slate-400 mb-2">Gelar & Jurusan *</label>
            <input type="text" name="degree_major" required placeholder="S1 Teknologi Informasi, Fakultas Teknik dan Informatika" class="w-full px-4 py-3 rounded-xl bg-slate-950/80 border border-slate-800 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500">
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label class="block text-xs font-bold uppercase text-slate-400 mb-2">Periode *</label>
                <input type="text" name="period" required placeholder="2023 – Sekarang" class="w-full px-4 py-3 rounded-xl bg-slate-950/80 border border-slate-800 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500">
            </div>
            <div>
                <label class="block text-xs font-bold uppercase text-slate-400 mb-2">IPK / Nilai Rata-rata</label>
                <input type="text" name="score" placeholder="IPK 3.84 / 4.00" class="w-full px-4 py-3 rounded-xl bg-slate-950/80 border border-slate-800 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500">
            </div>
        </div>

        <div>
            <label class="block text-xs font-bold uppercase text-slate-400 mb-2">Mata Kuliah / Detail Relevan (Pisahkan dengan koma)</label>
            <input type="text" name="details" placeholder="Sistem Multimedia, Manajemen Proyek TI, Arsitektur Enterprise" class="w-full px-4 py-3 rounded-xl bg-slate-950/80 border border-slate-800 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500">
        </div>

        <div class="flex items-center gap-4 pt-4 border-t border-slate-800">
            <button type="submit" class="px-6 py-3 rounded-xl bg-brand-600 hover:bg-brand-500 text-white font-semibold text-sm">
                Simpan Pendidikan
            </button>
            <a href="{{ route('admin.education.index') }}" class="px-6 py-3 rounded-xl bg-slate-800 hover:bg-slate-700 text-slate-300 font-semibold text-sm">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection
