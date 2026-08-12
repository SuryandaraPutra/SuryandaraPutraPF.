@extends('layouts.admin')

@section('title', 'Edit Profil & Unggah File CV')

@section('content')
<div class="max-w-3xl bg-slate-900/80 border border-slate-800 rounded-2xl p-8 shadow-xl">
    <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        <div class="p-4 rounded-xl bg-brand-500/10 border border-brand-500/20 text-xs text-brand-300">
            <i data-lucide="info" class="w-4 h-4 inline mr-1"></i>
            Perubahan di halaman ini akan langsung memperbarui header, hero pitch, kontak, dan file CV yang dapat diunduh oleh HRD di halaman utama.
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label class="block text-xs font-bold uppercase text-slate-400 mb-2">Nama Lengkap *</label>
                <input type="text" name="full_name" value="{{ old('full_name', $profile->full_name) }}" required class="w-full px-4 py-3 rounded-xl bg-slate-950/80 border border-slate-800 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500">
            </div>
            <div>
                <label class="block text-xs font-bold uppercase text-slate-400 mb-2">Judul Utama / Peran *</label>
                <input type="text" name="title" value="{{ old('title', $profile->title) }}" required class="w-full px-4 py-3 rounded-xl bg-slate-950/80 border border-slate-800 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500">
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label class="block text-xs font-bold uppercase text-slate-400 mb-2">Sub-judul / Status Magang</label>
                <input type="text" name="subtitle" value="{{ old('subtitle', $profile->subtitle) }}" class="w-full px-4 py-3 rounded-xl bg-slate-950/80 border border-slate-800 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500">
            </div>
            <div>
                <label class="block text-xs font-bold uppercase text-slate-400 mb-2">IPK Terbaru</label>
                <input type="text" name="gpa" value="{{ old('gpa', $profile->gpa) }}" class="w-full px-4 py-3 rounded-xl bg-slate-950/80 border border-slate-800 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500">
            </div>
        </div>

        <div>
            <label class="block text-xs font-bold uppercase text-slate-400 mb-2">Deskripsi "Tentang Saya" *</label>
            <textarea name="about_me" rows="5" required class="w-full px-4 py-3 rounded-xl bg-slate-950/80 border border-slate-800 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500 leading-relaxed">{{ old('about_me', $profile->about_me) }}</textarea>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
            <div>
                <label class="block text-xs font-bold uppercase text-slate-400 mb-2">Email *</label>
                <input type="email" name="email" value="{{ old('email', $profile->email) }}" required class="w-full px-4 py-3 rounded-xl bg-slate-950/80 border border-slate-800 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500">
            </div>
            <div>
                <label class="block text-xs font-bold uppercase text-slate-400 mb-2">Nomor Telepon / WA *</label>
                <input type="text" name="phone" value="{{ old('phone', $profile->phone) }}" required class="w-full px-4 py-3 rounded-xl bg-slate-950/80 border border-slate-800 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500">
            </div>
            <div>
                <label class="block text-xs font-bold uppercase text-slate-400 mb-2">Lokasi / Domisili *</label>
                <input type="text" name="location" value="{{ old('location', $profile->location) }}" required class="w-full px-4 py-3 rounded-xl bg-slate-950/80 border border-slate-800 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500">
            </div>
        </div>

        <!-- Upload Foto Profil Hero & File CV -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="p-5 rounded-2xl bg-slate-950/60 border border-slate-800 space-y-3">
                <label class="block text-xs font-bold uppercase text-slate-300">Unggah File Foto Profil (JPG/PNG/WEBP)</label>
                <input type="file" name="photo" accept="image/*" class="block w-full text-xs text-slate-400 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-brand-600 file:text-white hover:file:bg-brand-500">
                
                <div class="pt-2">
                    <label class="block text-[10px] font-bold uppercase text-slate-400 mb-1">Atau Tempel Link/URL Foto Langsung (https://...)</label>
                    <input type="url" name="photo_url" value="{{ old('photo_url', \Illuminate\Support\Str::startsWith($profile->photo_path, ['http://', 'https://']) ? $profile->photo_path : '') }}" placeholder="https://..." class="w-full px-3 py-2 rounded-xl bg-slate-950 border border-slate-800 text-xs focus:outline-none focus:ring-1 focus:ring-brand-500">
                </div>

                @if($profile->photo_path)
                <div class="flex items-center gap-3 pt-2">
                    <img src="{{ \Illuminate\Support\Str::startsWith($profile->photo_path, ['http://', 'https://']) ? $profile->photo_path : asset('storage/' . $profile->photo_path) }}" alt="Foto Profile" class="w-12 h-12 rounded-xl object-cover border border-slate-700">
                    <span class="text-xs text-emerald-400 flex items-center gap-1 font-mono">
                        <i data-lucide="check-circle" class="w-3.5 h-3.5"></i> Foto Aktif Tersimpan
                    </span>
                </div>
                @endif
            </div>

            <div class="p-5 rounded-2xl bg-slate-950/60 border border-slate-800 space-y-3">
                <label class="block text-xs font-bold uppercase text-slate-300">Unggah File PDF CV Terbaru (Max 5MB)</label>
                <input type="file" name="cv_pdf" accept="application/pdf" class="block w-full text-xs text-slate-400 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-brand-600 file:text-white hover:file:bg-brand-500">
                @if($profile->cv_pdf_path)
                <p class="text-xs text-emerald-400 flex items-center gap-1 pt-2">
                    <i data-lucide="file-check" class="w-4 h-4"></i> File CV tersimpan: <span class="font-mono">{{ $profile->cv_pdf_path }}</span>
                </p>
                @endif
            </div>
        </div>

        <div class="pt-4 border-t border-slate-800">
            <button type="submit" class="px-6 py-3 rounded-xl bg-brand-600 hover:bg-brand-500 text-white font-semibold text-sm shadow-lg shadow-brand-500/25">
                Simpan Perubahan Profil & CV
            </button>
        </div>
    </form>
</div>
@endsection
