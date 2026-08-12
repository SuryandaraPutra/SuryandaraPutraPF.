@extends('layouts.admin')

@section('title', 'Edit Pengalaman: ' . $experience->title)

@section('content')
<div class="max-w-2xl bg-slate-900/80 border border-slate-800 rounded-2xl p-8 shadow-xl">
    <form action="{{ route('admin.experiences.update', $experience) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-xs font-bold uppercase text-slate-400 mb-2">Posisi / Judul Pengalaman *</label>
            <input type="text" name="title" value="{{ old('title', $experience->title) }}" required class="w-full px-4 py-3 rounded-xl bg-slate-950/80 border border-slate-800 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500">
        </div>

        <div>
            <label class="block text-xs font-bold uppercase text-slate-400 mb-2">Perusahaan / Organisasi *</label>
            <input type="text" name="organization" value="{{ old('organization', $experience->organization) }}" required class="w-full px-4 py-3 rounded-xl bg-slate-950/80 border border-slate-800 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500">
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label class="block text-xs font-bold uppercase text-slate-400 mb-2">Tipe Peran *</label>
                <select name="role_type" required class="w-full px-4 py-3 rounded-xl bg-slate-950/80 border border-slate-800 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500">
                    <option value="Volunteer" {{ $experience->role_type == 'Volunteer' ? 'selected' : '' }}>Volunteer</option>
                    <option value="Magang" {{ $experience->role_type == 'Magang' ? 'selected' : '' }}>Magang (Internship)</option>
                    <option value="Kerja" {{ $experience->role_type == 'Kerja' ? 'selected' : '' }}>Pekerjaan Kontrak/Full-time</option>
                    <option value="Organisasi" {{ $experience->role_type == 'Organisasi' ? 'selected' : '' }}>Organisasi Kampus</option>
                </select>
            </div>
            <div>
                <label class="block text-xs font-bold uppercase text-slate-400 mb-2">Periode *</label>
                <input type="text" name="period" value="{{ old('period', $experience->period) }}" required class="w-full px-4 py-3 rounded-xl bg-slate-950/80 border border-slate-800 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500">
            </div>
        </div>

        <div>
            <label class="block text-xs font-bold uppercase text-slate-400 mb-2">Poin Poin Aktivitas * (Setiap baris baru 1 poin)</label>
            <textarea name="bullets" rows="5" required class="w-full px-4 py-3 rounded-xl bg-slate-950/80 border border-slate-800 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500">{{ old('bullets', is_array($experience->bullets) ? implode("\n", $experience->bullets) : '') }}</textarea>
        </div>

        <div class="flex items-center gap-4 pt-4 border-t border-slate-800">
            <button type="submit" class="px-6 py-3 rounded-xl bg-brand-600 hover:bg-brand-500 text-white font-semibold text-sm">
                Perbarui Pengalaman
            </button>
            <a href="{{ route('admin.experiences.index') }}" class="px-6 py-3 rounded-xl bg-slate-800 hover:bg-slate-700 text-slate-300 font-semibold text-sm">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection
