@extends('layouts.admin')

@section('title', 'Detail Pesan Masuk')

@section('content')
<div class="max-w-2xl bg-slate-900/80 border border-slate-800 rounded-2xl p-8 shadow-xl">
    <div class="flex items-center justify-between border-b border-slate-800 pb-6 mb-6">
        <div>
            <h3 class="font-heading font-bold text-xl text-slate-100">{{ $message->subject ?? 'Tanpa Subjek' }}</h3>
            <span class="text-xs text-slate-400">Diterima: {{ $message->created_at->format('d F Y, H:i') }}</span>
        </div>
        <a href="{{ route('admin.messages.index') }}" class="px-4 py-2 rounded-xl bg-slate-800 hover:bg-slate-700 text-xs font-semibold">
            &larr; Kembali ke Inbox
        </a>
    </div>

    <div class="grid grid-cols-2 gap-4 bg-slate-950/60 p-4 rounded-xl border border-slate-800 mb-6 text-xs">
        <div>
            <span class="text-slate-400 font-bold uppercase block mb-1">Pengirim</span>
            <span class="font-semibold text-slate-200 text-sm block">{{ $message->name }}</span>
            <a href="mailto:{{ $message->email }}" class="text-brand-400 hover:underline">{{ $message->email }}</a>
        </div>
        <div>
            <span class="text-slate-400 font-bold uppercase block mb-1">Perusahaan / Instansi</span>
            <span class="font-semibold text-slate-200 text-sm">{{ $message->company ?? '-' }}</span>
        </div>
    </div>

    <div class="mb-8">
        <span class="text-xs font-bold uppercase tracking-wider text-slate-400 block mb-2">Isi Pesan:</span>
        <div class="p-5 rounded-2xl bg-slate-950/80 border border-slate-800 text-sm text-slate-200 leading-relaxed whitespace-pre-wrap">
            {{ $message->message }}
        </div>
    </div>

    <div class="flex gap-3">
        <a href="mailto:{{ $message->email }}?subject=Re: {{ urlencode($message->subject ?? 'Tanggapan Portofolio') }}" class="px-6 py-3 rounded-xl bg-brand-600 hover:bg-brand-500 text-white font-semibold text-xs flex items-center gap-2">
            <i data-lucide="reply" class="w-4 h-4"></i> Balas via Email
        </a>
        <form action="{{ route('admin.messages.destroy', $message) }}" method="POST" onsubmit="return confirm('Hapus pesan ini?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="px-6 py-3 rounded-xl bg-red-500/10 hover:bg-red-500/20 text-red-400 font-semibold text-xs flex items-center gap-2">
                <i data-lucide="trash-2" class="w-4 h-4"></i> Hapus Pesan
            </button>
        </form>
    </div>
</div>
@endsection
