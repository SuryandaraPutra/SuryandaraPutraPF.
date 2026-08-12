@extends('layouts.admin')

@section('title', 'Dashboard Overview')

@section('content')
<!-- Stats Cards Grid -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    
    <div class="bg-slate-900/80 border border-slate-800 rounded-2xl p-6 flex items-center justify-between shadow-lg">
        <div>
            <span class="text-xs font-bold uppercase tracking-wider text-slate-400">Total Proyek</span>
            <h3 class="font-heading font-extrabold text-3xl mt-1 text-brand-400">{{ $stats['projects_count'] }}</h3>
        </div>
        <div class="w-12 h-12 rounded-xl bg-brand-500/10 text-brand-400 flex items-center justify-center">
            <i data-lucide="folder-kanban" class="w-6 h-6"></i>
        </div>
    </div>

    <div class="bg-slate-900/80 border border-slate-800 rounded-2xl p-6 flex items-center justify-between shadow-lg">
        <div>
            <span class="text-xs font-bold uppercase tracking-wider text-slate-400">Pengalaman</span>
            <h3 class="font-heading font-extrabold text-3xl mt-1 text-purple-400">{{ $stats['experiences_count'] }}</h3>
        </div>
        <div class="w-12 h-12 rounded-xl bg-purple-500/10 text-purple-400 flex items-center justify-center">
            <i data-lucide="briefcase" class="w-6 h-6"></i>
        </div>
    </div>

    <div class="bg-slate-900/80 border border-slate-800 rounded-2xl p-6 flex items-center justify-between shadow-lg">
        <div>
            <span class="text-xs font-bold uppercase tracking-wider text-slate-400">Total Keahlian</span>
            <h3 class="font-heading font-extrabold text-3xl mt-1 text-emerald-400">{{ $stats['skills_count'] }}</h3>
        </div>
        <div class="w-12 h-12 rounded-xl bg-emerald-500/10 text-emerald-400 flex items-center justify-center">
            <i data-lucide="code-2" class="w-6 h-6"></i>
        </div>
    </div>

    <div class="bg-slate-900/80 border border-slate-800 rounded-2xl p-6 flex items-center justify-between shadow-lg">
        <div>
            <span class="text-xs font-bold uppercase tracking-wider text-slate-400">Pesan Inbox</span>
            <h3 class="font-heading font-extrabold text-3xl mt-1 text-pink-400">{{ $stats['unread_messages_count'] }}</h3>
        </div>
        <div class="w-12 h-12 rounded-xl bg-pink-500/10 text-pink-400 flex items-center justify-center">
            <i data-lucide="inbox" class="w-6 h-6"></i>
        </div>
    </div>

</div>

<!-- Action Shortcuts & Overview -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

    <!-- Recent Projects Table -->
    <div class="bg-slate-900/80 border border-slate-800 rounded-2xl p-6">
        <div class="flex items-center justify-between mb-4">
            <h3 class="font-heading font-bold text-base">Daftar Proyek Terbaru</h3>
            <a href="{{ route('admin.projects.create') }}" class="text-xs font-semibold text-brand-400 hover:underline flex items-center gap-1">
                <i data-lucide="plus" class="w-3.5 h-3.5"></i> Tambah Proyek
            </a>
        </div>

        <div class="space-y-3">
            @forelse($recent_projects as $proj)
            <div class="p-3.5 rounded-xl bg-slate-950/60 border border-slate-800/80 flex items-center justify-between">
                <div>
                    <h4 class="font-semibold text-sm">{{ $proj->title }}</h4>
                    <span class="text-xs text-slate-400">{{ $proj->category }} (Peran: {{ $proj->role ?? '-' }})</span>
                </div>
                <a href="{{ route('admin.projects.edit', $proj) }}" class="p-2 rounded-lg bg-slate-800 hover:bg-slate-700 text-xs font-medium">Edit</a>
            </div>
            @empty
            <p class="text-xs text-slate-500">Belum ada proyek.</p>
            @endforelse
        </div>
    </div>

    <!-- Recent Messages Table -->
    <div class="bg-slate-900/80 border border-slate-800 rounded-2xl p-6">
        <div class="flex items-center justify-between mb-4">
            <h3 class="font-heading font-bold text-base">Pesan Masuk Terbaru</h3>
            <a href="{{ route('admin.messages.index') }}" class="text-xs font-semibold text-brand-400 hover:underline">Lihat Semua</a>
        </div>

        <div class="space-y-3">
            @forelse($recent_messages as $msg)
            <div class="p-3.5 rounded-xl bg-slate-950/60 border border-slate-800/80 flex items-center justify-between">
                <div>
                    <h4 class="font-semibold text-sm">{{ $msg->name }} <span class="text-xs font-normal text-slate-400">({{ $msg->email }})</span></h4>
                    <p class="text-xs text-slate-300 truncate max-w-xs">{{ $msg->message }}</p>
                </div>
                <span class="text-[10px] text-slate-400">{{ $msg->created_at->diffForHumans() }}</span>
            </div>
            @empty
            <p class="text-xs text-slate-500">Belum ada pesan masuk.</p>
            @endforelse
        </div>
    </div>

</div>
@endsection
