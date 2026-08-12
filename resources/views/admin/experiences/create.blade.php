@extends('layouts.admin')

@section('title', 'Tambah Pengalaman Baru')

@section('content')
<div class="max-w-2xl bg-slate-900/80 border border-slate-800 rounded-2xl p-8 shadow-xl">
    <form action="{{ route('admin.experiences.store') }}" method="POST" class="space-y-6">
        @csrf

        <div>
            <label class="block text-xs font-bold uppercase text-slate-400 mb-2">Posisi / Judul Pengalaman *</label>
            <input type="text" name="title" required placeholder="Contoh: Volunteer Crew Event" class="w-full px-4 py-3 rounded-xl bg-slate-950/80 border border-slate-800 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500">
        </div>

        <div>
            <label class="block text-xs font-bold uppercase text-slate-400 mb-2">Perusahaan / Organisasi *</label>
            <input type="text" name="organization" required placeholder="Contoh: BCA Expoversary" class="w-full px-4 py-3 rounded-xl bg-slate-950/80 border border-slate-800 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500">
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label class="block text-xs font-bold uppercase text-slate-400 mb-2">Tipe Peran *</label>
                <select name="role_type" required class="w-full px-4 py-3 rounded-xl bg-slate-950/80 border border-slate-800 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500">
                    <option value="Volunteer">Volunteer</option>
                    <option value="Magang">Magang (Internship)</option>
                    <option value="Kerja">Pekerjaan Kontrak/Full-time</option>
                    <option value="Organisasi">Organisasi Kampus</option>
                </select>
            </div>
            <div>
                <label class="block text-xs font-bold uppercase text-slate-400 mb-2">Periode *</label>
                <input type="text" name="period" required placeholder="Februari 2026" class="w-full px-4 py-3 rounded-xl bg-slate-950/80 border border-slate-800 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500">
            </div>
        </div>

        <div>
            <label class="block text-xs font-bold uppercase text-slate-400 mb-2">Poin Poin Aktivitas & Pencapaian * (Setiap baris baru 1 poin)</label>
            <textarea name="bullets" rows="5" required placeholder="Memastikan daftar tamu dan registrasi peserta terverifikasi dengan benar&#10;Membantu peserta mengatasi kendala registrasi" class="w-full px-4 py-3 rounded-xl bg-slate-950/80 border border-slate-800 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500"></textarea>
        </div>

        <div class="flex items-center gap-4 pt-4 border-t border-slate-800">
            <button type="submit" class="px-6 py-3 rounded-xl bg-brand-600 hover:bg-brand-500 text-white font-semibold text-sm">
                Simpan Pengalaman
            </button>
            <a href="{{ route('admin.experiences.index') }}" class="px-6 py-3 rounded-xl bg-slate-800 hover:bg-slate-700 text-slate-300 font-semibold text-sm">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection
