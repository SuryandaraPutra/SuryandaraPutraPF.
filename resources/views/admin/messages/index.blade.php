@extends('layouts.admin')

@section('title', 'Inbox Pesan Kontak')

@section('content')
<div class="mb-6">
    <p class="text-sm text-slate-400">Daftar pesan & penawaran yang dikirimkan oleh HRD / recruiter melalui form kontak.</p>
</div>

<div class="bg-slate-900/80 border border-slate-800 rounded-2xl overflow-hidden shadow-xl">
    <table class="w-full text-left text-sm text-slate-300">
        <thead class="bg-slate-950/80 text-xs font-bold uppercase tracking-wider text-slate-400 border-b border-slate-800">
            <tr>
                <th class="p-4">Status</th>
                <th class="p-4">Pengirim</th>
                <th class="p-4">Perusahaan & Subjek</th>
                <th class="p-4">Tanggal Masuk</th>
                <th class="p-4 text-right">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-slate-800/60">
            @forelse($messages as $msg)
            <tr class="hover:bg-slate-800/40 {{ !$msg->is_read ? 'bg-brand-500/5 font-semibold' : '' }}">
                <td class="p-4">
                    @if(!$msg->is_read)
                    <span class="px-2.5 py-0.5 rounded-full bg-pink-500/20 text-pink-400 text-[10px] font-bold">BARU</span>
                    @else
                    <span class="px-2.5 py-0.5 rounded-full bg-slate-800 text-slate-400 text-[10px]">DIBACA</span>
                    @endif
                </td>
                <td class="p-4">
                    <span class="text-slate-100 block">{{ $msg->name }}</span>
                    <span class="text-xs text-slate-400 font-normal">{{ $msg->email }}</span>
                </td>
                <td class="p-4">
                    <span class="text-slate-200 block">{{ $msg->subject ?? 'Tanpa Subjek' }}</span>
                    <span class="text-xs text-slate-400 font-normal">{{ $msg->company ?? '-' }}</span>
                </td>
                <td class="p-4 text-xs text-slate-400">{{ $msg->created_at->format('d M Y H:i') }}</td>
                <td class="p-4 text-right flex justify-end gap-2">
                    <a href="{{ route('admin.messages.show', $msg) }}" class="p-2 rounded-lg bg-slate-800 hover:bg-slate-700 text-xs text-slate-200" title="Baca Pesan">
                        <i data-lucide="eye" class="w-4 h-4"></i>
                    </a>
                    <form action="{{ route('admin.messages.destroy', $msg) }}" method="POST" onsubmit="return confirm('Hapus pesan ini?')">
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
                <td colspan="5" class="p-8 text-center text-slate-500">Belum ada pesan masuk di inbox.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
