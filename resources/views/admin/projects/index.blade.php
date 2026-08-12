@extends('layouts.admin')

@section('title', 'Kelola Proyek (Projects CRUD)')

@section('content')
<div class="flex justify-between items-center mb-6">
    <p class="text-sm text-slate-400">Daftar portofolio proyek yang tampil di website publik.</p>
    <a href="{{ route('admin.projects.create') }}" class="px-4 py-2.5 rounded-xl bg-brand-600 hover:bg-brand-500 text-white font-semibold text-xs flex items-center gap-2 shadow-md">
        <i data-lucide="plus" class="w-4 h-4"></i> Tambah Proyek Baru
    </a>
</div>

<div class="bg-slate-900/80 border border-slate-800 rounded-2xl overflow-hidden shadow-xl">
    <table class="w-full text-left text-sm text-slate-300">
        <thead class="bg-slate-950/80 text-xs font-bold uppercase tracking-wider text-slate-400 border-b border-slate-800">
            <tr>
                <th class="p-4">Urutan</th>
                <th class="p-4">Judul Proyek</th>
                <th class="p-4">Kategori & Peran</th>
                <th class="p-4">Periode</th>
                <th class="p-4 text-right">Aksi CRUD</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-slate-800/60">
            @forelse($projects as $proj)
            <tr class="hover:bg-slate-800/40">
                <td class="p-4 font-bold text-brand-400">#{{ $proj->order }}</td>
                <td class="p-4 font-semibold text-slate-100">{{ $proj->title }}</td>
                <td class="p-4">
                    <span class="px-2.5 py-1 rounded-md bg-brand-500/10 text-brand-400 text-xs font-semibold">{{ $proj->category }}</span>
                    @if($proj->role) <span class="text-xs text-slate-400 block mt-1">Role: {{ $proj->role }}</span> @endif
                </td>
                <td class="p-4 text-xs text-slate-400">{{ $proj->period }}</td>
                <td class="p-4 text-right flex justify-end gap-2">
                    <a href="{{ route('admin.projects.edit', $proj) }}" class="p-2 rounded-lg bg-slate-800 hover:bg-slate-700 text-xs text-slate-200" title="Edit">
                        <i data-lucide="pencil" class="w-4 h-4"></i>
                    </a>
                    <form action="{{ route('admin.projects.destroy', $proj) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus proyek ini?')">
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
                <td colspan="5" class="p-8 text-center text-slate-500">Belum ada proyek ditambahkan.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
