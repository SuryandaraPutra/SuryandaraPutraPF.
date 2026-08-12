@extends('layouts.admin')

@section('title', 'Kelola Pendidikan (Education CRUD)')

@section('content')
<div class="flex justify-between items-center mb-6">
    <p class="text-sm text-slate-400">Daftar riwayat studi universitas dan sekolah formal.</p>
    <a href="{{ route('admin.education.create') }}" class="px-4 py-2.5 rounded-xl bg-brand-600 hover:bg-brand-500 text-white font-semibold text-xs flex items-center gap-2 shadow-md">
        <i data-lucide="plus" class="w-4 h-4"></i> Tambah Pendidikan
    </a>
</div>

<div class="bg-slate-900/80 border border-slate-800 rounded-2xl overflow-hidden shadow-xl">
    <table class="w-full text-left text-sm text-slate-300">
        <thead class="bg-slate-950/80 text-xs font-bold uppercase tracking-wider text-slate-400 border-b border-slate-800">
            <tr>
                <th class="p-4">Institusi</th>
                <th class="p-4">Gelar & Jurusan</th>
                <th class="p-4">Periode</th>
                <th class="p-4">IPK / Nilai</th>
                <th class="p-4 text-right">Aksi CRUD</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-slate-800/60">
            @forelse($educations as $edu)
            <tr class="hover:bg-slate-800/40">
                <td class="p-4 font-semibold text-slate-100">{{ $edu->institution }}</td>
                <td class="p-4 text-slate-300">{{ $edu->degree_major }}</td>
                <td class="p-4 text-xs text-slate-400">{{ $edu->period }}</td>
                <td class="p-4 font-bold text-emerald-400">{{ $edu->score }}</td>
                <td class="p-4 text-right flex justify-end gap-2">
                    <a href="{{ route('admin.education.edit', $edu) }}" class="p-2 rounded-lg bg-slate-800 hover:bg-slate-700 text-xs text-slate-200" title="Edit">
                        <i data-lucide="pencil" class="w-4 h-4"></i>
                    </a>
                    <form action="{{ route('admin.education.destroy', $edu) }}" method="POST" onsubmit="return confirm('Hapus data pendidikan ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="p-2 rounded-lg bg-red-500/10 hover:bg-red-500/20 text-xs text-red-400" title="Hapus">
                            <i data-lucide="trash-2" class="w-4 h-4"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="p-8 text-center text-slate-500">Belum ada pendidikan ditambahkan.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
