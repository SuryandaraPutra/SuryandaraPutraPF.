@extends('layouts.admin')

@section('title', 'Kelola Keahlian & Tools (Skills CRUD)')

@section('content')
<div class="flex justify-between items-center mb-6">
    <p class="text-sm text-slate-400">Daftar keahlian teknis, software kantor, desain, dan soft skills.</p>
    <a href="{{ route('admin.skills.create') }}" class="px-4 py-2.5 rounded-xl bg-brand-600 hover:bg-brand-500 text-white font-semibold text-xs flex items-center gap-2 shadow-md">
        <i data-lucide="plus" class="w-4 h-4"></i> Tambah Keahlian
    </a>
</div>

<div class="bg-slate-900/80 border border-slate-800 rounded-2xl overflow-hidden shadow-xl">
    <table class="w-full text-left text-sm text-slate-300">
        <thead class="bg-slate-950/80 text-xs font-bold uppercase tracking-wider text-slate-400 border-b border-slate-800">
            <tr>
                <th class="p-4">Nama Keahlian</th>
                <th class="p-4">Kategori</th>
                <th class="p-4">Tingkat Kemampuan</th>
                <th class="p-4 text-right">Aksi CRUD</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-slate-800/60">
            @forelse($skills as $skill)
            <tr class="hover:bg-slate-800/40">
                <td class="p-4 font-semibold text-slate-100 flex items-center gap-2">
                    <i data-lucide="{{ $skill->icon ?? 'check' }}" class="w-4 h-4 text-brand-400"></i>
                    <span>{{ $skill->name }}</span>
                </td>
                <td class="p-4">
                    <span class="px-2.5 py-1 rounded-md bg-slate-800 text-slate-300 text-xs font-semibold">{{ $skill->category }}</span>
                </td>
                <td class="p-4">
                    <div class="w-32 bg-slate-800 h-2 rounded-full overflow-hidden">
                        <div class="bg-brand-500 h-full" style="width: {{ $skill->proficiency }}%"></div>
                    </div>
                    <span class="text-[10px] text-slate-400 font-bold block mt-1">{{ $skill->proficiency }}%</span>
                </td>
                <td class="p-4 text-right flex justify-end gap-2">
                    <a href="{{ route('admin.skills.edit', $skill) }}" class="p-2 rounded-lg bg-slate-800 hover:bg-slate-700 text-xs text-slate-200" title="Edit">
                        <i data-lucide="pencil" class="w-4 h-4"></i>
                    </a>
                    <form action="{{ route('admin.skills.destroy', $skill) }}" method="POST" onsubmit="return confirm('Hapus keahlian ini?')">
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
                <td colspan="4" class="p-8 text-center text-slate-500">Belum ada keahlian ditambahkan.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
