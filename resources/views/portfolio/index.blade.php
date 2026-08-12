@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section id="hero" class="relative pt-32 pb-20 md:pt-40 md:pb-28 overflow-hidden">
    <!-- Glow Background Shapes -->
    <div class="absolute top-1/4 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[500px] h-[500px] bg-gradient-to-tr from-brand-600/20 to-purple-600/20 blur-[120px] rounded-full pointer-events-none"></div>

    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="flex flex-col md:flex-row items-center justify-between gap-12">
            
            <!-- Left Info Column -->
            <div class="flex-1 text-center md:text-left">
                <h1 class="font-heading text-4xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight leading-tight mb-4">
                    Halo, Saya <br class="hidden sm:block"/>
                    <span class="text-gradient">{{ $profile->full_name ?? 'SURYANDARA PUTRA' }}</span>
                </h1>

                <p class="text-lg sm:text-xl font-medium text-slate-600 dark:text-slate-300 mb-6 max-w-2xl">
                    {{ $profile->title ?? 'Mahasiswa Teknologi Informasi — Semester 7' }}
                </p>

                <!-- Key Metrics Pills -->
                <div class="flex flex-wrap justify-center md:justify-start gap-3 mb-8 text-xs font-semibold text-slate-600 dark:text-slate-400">
                    <div class="glass px-3.5 py-2 rounded-xl flex items-center gap-1.5">
                        <i data-lucide="graduation-cap" class="w-4 h-4 text-brand-500"></i>
                        <span>BSI Margonda (IPK {{ $profile->gpa ?? '3.84/4.00' }})</span>
                    </div>
                    <div class="glass px-3.5 py-2 rounded-xl flex items-center gap-1.5">
                        <i data-lucide="map-pin" class="w-4 h-4 text-purple-500"></i>
                        <span>Depok, Jawa Barat</span>
                    </div>
                    <div class="glass px-3.5 py-2 rounded-xl flex items-center gap-1.5">
                        <i data-lucide="award" class="w-4 h-4 text-pink-500"></i>
                        <span>Ketua Proyek UI/UX & ML</span>
                    </div>
                </div>

                <!-- Call To Action Buttons -->
                <div class="flex flex-wrap items-center justify-center md:justify-start gap-4">
                    <a href="{{ route('portfolio.download-cv') }}" class="px-6 py-3.5 rounded-2xl bg-brand-600 hover:bg-brand-500 text-white font-semibold text-sm shadow-xl shadow-brand-500/25 flex items-center gap-2 transition-all hover:scale-[1.02]">
                        <i data-lucide="download" class="w-4 h-4"></i>
                        <span>Download CV (PDF)</span>
                    </a>
                    
                    <a href="#contact" class="px-6 py-3.5 rounded-2xl glass hover:bg-slate-200/50 dark:hover:bg-slate-800/80 font-semibold text-sm flex items-center gap-2 transition-all">
                        <i data-lucide="mail" class="w-4 h-4 text-brand-500"></i>
                        <span>Hubungi Saya</span>
                    </a>
                </div>
            </div>

            <!-- Right Profile Avatar / Card -->
            <div class="w-full max-w-sm">
                <div class="relative group">
                    <div class="absolute -inset-1 bg-gradient-to-r from-brand-600 via-purple-600 to-pink-600 rounded-3xl blur opacity-30 group-hover:opacity-60 transition duration-500"></div>
                    <div class="relative glass rounded-3xl p-6 text-center shadow-2xl">
                        <div class="w-32 h-32 mx-auto rounded-2xl bg-gradient-to-tr from-slate-800 to-slate-900 border-2 border-slate-700 flex items-center justify-center shadow-inner mb-4 overflow-hidden">
                            @if($profile->photo_path)
                                <img src="{{ \Illuminate\Support\Str::startsWith($profile->photo_path, ['http://', 'https://']) ? $profile->photo_path : asset('storage/' . $profile->photo_path) }}" alt="{{ $profile->full_name }}" class="w-full h-full object-cover">
                            @else
                                <span class="font-heading font-black text-4xl text-brand-400">SP</span>
                            @endif
                        </div>

                        <h3 class="font-heading font-bold text-lg mb-1">{{ $profile->full_name }}</h3>
                        <p class="text-xs text-slate-500 dark:text-slate-400 mb-2">S1 Teknologi Informasi — Semester 7</p>

                        <!-- Instagram Handle Badge -->
                        <a href="https://instagram.com/andr.rwa" target="_blank" class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-pink-500/10 hover:bg-pink-500/20 text-pink-600 dark:text-pink-400 text-xs font-semibold mb-4 transition-colors">
                            <svg class="w-3.5 h-3.5 fill-current text-pink-500" viewBox="0 0 24 24">
                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                            </svg>
                            <span>@andr.rwa</span>
                        </a>

                        <div class="grid grid-cols-2 gap-2 text-left text-xs bg-slate-100/50 dark:bg-slate-900/60 p-3 rounded-xl mb-4 border border-slate-200/50 dark:border-slate-800">
                            <div>
                                <span class="text-slate-400 block text-[10px] uppercase font-bold">Email</span>
                                <span class="truncate block font-medium">{{ $profile->email }}</span>
                            </div>
                            <div>
                                <span class="text-slate-400 block text-[10px] uppercase font-bold">Telepon</span>
                                <span class="truncate block font-medium">{{ $profile->phone }}</span>
                            </div>
                        </div>

                        <div class="flex justify-center gap-2.5">
                            <a href="mailto:{{ $profile->email }}" class="p-2.5 rounded-xl glass hover:bg-brand-500/10 text-brand-500 transition-colors" title="Email"><i data-lucide="mail" class="w-4 h-4"></i></a>
                            <a href="https://wa.me/6285710289368" target="_blank" class="p-2.5 rounded-xl glass hover:bg-emerald-500/10 text-emerald-500 transition-colors" title="WhatsApp"><i data-lucide="message-circle" class="w-4 h-4"></i></a>
                            <a href="https://instagram.com/andr.rwa" target="_blank" class="p-2.5 rounded-xl glass hover:bg-pink-500/10 text-pink-500 transition-colors" title="Instagram (@andr.rwa)">
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                            </a>
                            <a href="https://github.com" target="_blank" class="p-2.5 rounded-xl glass hover:bg-slate-500/10 text-slate-700 dark:text-slate-200 transition-colors" title="GitHub">
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M12 0C5.37 0 0 5.37 0 12c0 5.31 3.435 9.795 8.205 11.385.6.105.825-.255.825-.57 0-.285-.015-1.23-.015-2.235-3.015.555-3.795-.735-4.035-1.41-.135-.345-.72-1.41-1.23-1.695-.42-.225-1.02-.78-.015-.795.945-.015 1.62.87 1.845 1.23 1.08 1.815 2.805 1.305 3.495.99.105-.78.42-1.305.765-1.605-2.67-.3-5.46-1.335-5.46-5.925 0-1.305.465-2.385 1.23-3.225-.12-.3-.54-1.53.12-3.18 0 0 1.005-.315 3.3 1.23.96-.27 1.98-.405 3-.405s2.04.135 3 .405c2.295-1.56 3.3-1.23 3.3-1.23.66 1.65.24 2.88.12 3.18.765.84 1.23 1.905 1.23 3.225 0 4.605-2.805 5.625-5.475 5.925.435.375.81 1.095.81 2.22 0 1.605-.015 2.895-.015 3.3 0 .315.225.69.825.57A12.02 12.02 0 0024 12c0-6.63-5.37-12-12-12z"/></svg>
                            </a>
                            <a href="https://linkedin.com" target="_blank" class="p-2.5 rounded-xl glass hover:bg-blue-500/10 text-blue-600 transition-colors" title="LinkedIn">
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- About Section -->
<section id="about" class="py-20 border-t border-slate-200/60 dark:border-slate-800/60">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-12">
            <h2 class="font-heading font-bold text-3xl sm:text-4xl mb-4">Tentang Saya</h2>
            <div class="w-16 h-1 bg-gradient-to-r from-brand-500 to-purple-500 mx-auto rounded-full mb-6"></div>
        </div>

        <div class="glass rounded-3xl p-8 sm:p-10 shadow-xl border border-slate-200/50 dark:border-slate-800">
            <div class="prose prose-slate dark:prose-invert max-w-none text-slate-600 dark:text-slate-300 leading-relaxed text-base">
                <p class="text-justify sm:text-left">
                    {{ $profile->about_me }}
                </p>
            </div>

            <!-- Soft Skills Pills -->
            <div class="mt-8 pt-6 border-t border-slate-200/50 dark:border-slate-800/80">
                <h4 class="text-xs uppercase font-bold tracking-wider text-slate-400 mb-4">Karakter & Nilai Kerja Utama</h4>
                <div class="flex flex-wrap gap-2.5">
                    <span class="px-3.5 py-1.5 rounded-xl bg-brand-500/10 text-brand-600 dark:text-brand-400 text-xs font-semibold flex items-center gap-1.5">
                        <i data-lucide="users" class="w-3.5 h-3.5"></i> Kepemimpinan
                    </span>
                    <span class="px-3.5 py-1.5 rounded-xl bg-purple-500/10 text-purple-600 dark:text-purple-400 text-xs font-semibold flex items-center gap-1.5">
                        <i data-lucide="heart-handshake" class="w-3.5 h-3.5"></i> Kerja Sama Tim
                    </span>
                    <span class="px-3.5 py-1.5 rounded-xl bg-blue-500/10 text-blue-600 dark:text-blue-400 text-xs font-semibold flex items-center gap-1.5">
                        <i data-lucide="message-square" class="w-3.5 h-3.5"></i> Komunikasi Analitis
                    </span>
                    <span class="px-3.5 py-1.5 rounded-xl bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 text-xs font-semibold flex items-center gap-1.5">
                        <i data-lucide="lightbulb" class="w-3.5 h-3.5"></i> Problem Solving
                    </span>
                    <span class="px-3.5 py-1.5 rounded-xl bg-amber-500/10 text-amber-600 dark:text-amber-400 text-xs font-semibold flex items-center gap-1.5">
                        <i data-lucide="clock" class="w-3.5 h-3.5"></i> Manajemen Waktu Disiplin
                    </span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Education Section -->
<section id="education" class="py-20 bg-slate-100/50 dark:bg-slate-900/30">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-12">
            <h2 class="font-heading font-bold text-3xl sm:text-4xl mb-4">Riwayat Pendidikan</h2>
            <p class="text-slate-500 dark:text-slate-400 text-sm">Latar belakang akademis di bidang Teknologi Informasi & Multimedia</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @foreach($educations as $edu)
            <div class="glass rounded-3xl p-6 sm:p-8 flex flex-col justify-between hover:border-brand-500/50 transition-all duration-300 group shadow-md">
                <div>
                    <div class="flex items-center justify-between gap-2 mb-3">
                        <span class="px-3 py-1 rounded-lg bg-brand-500/10 text-brand-600 dark:text-brand-400 text-xs font-bold">{{ $edu->period }}</span>
                        <span class="px-3 py-1 rounded-lg bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 text-xs font-extrabold">{{ $edu->score }}</span>
                    </div>

                    <h3 class="font-heading font-bold text-xl mb-1 group-hover:text-brand-500 transition-colors">{{ $edu->institution }}</h3>
                    <p class="text-sm font-medium text-slate-600 dark:text-slate-300 mb-4">{{ $edu->degree_major }}</p>

                    @if($edu->details && count($edu->details) > 0)
                    <div class="mt-4 pt-4 border-t border-slate-200/50 dark:border-slate-800">
                        <span class="text-xs uppercase font-bold text-slate-400 block mb-2">Fokus & Mata Kuliah Relevan:</span>
                        <div class="flex flex-wrap gap-1.5">
                            @foreach($edu->details as $detail)
                                <span class="px-2.5 py-1 rounded-md bg-slate-200/60 dark:bg-slate-800/60 text-slate-700 dark:text-slate-300 text-xs font-medium">{{ $detail }}</span>
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Experiences Section (Timeline) -->
<section id="experiences" class="py-20">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <h2 class="font-heading font-bold text-3xl sm:text-4xl mb-4">Pengalaman & Organisasi</h2>
            <p class="text-slate-500 dark:text-slate-400 text-sm">Pengalaman magang, relawan event skala besar, dan aktivitas organisasi</p>
        </div>

        <div class="relative border-l-2 border-slate-200 dark:border-slate-800 ml-4 sm:ml-32 space-y-10">
            @foreach($experiences as $exp)
            <div class="relative pl-6 sm:pl-8 group">
                <!-- Timeline Dot -->
                <div class="absolute -left-[9px] top-1.5 w-4 h-4 rounded-full bg-brand-600 border-4 border-slate-50 dark:border-slate-950 group-hover:scale-125 transition-transform"></div>

                <!-- Date Label for Desktop -->
                <div class="sm:absolute sm:-left-36 sm:top-1.5 text-xs font-bold text-slate-400 sm:text-right sm:w-28 mb-2 sm:mb-0">
                    {{ $exp->period }}
                </div>

                <div class="glass rounded-2xl p-6 hover:border-brand-500/50 transition-all shadow-md">
                    <div class="flex flex-wrap items-center justify-between gap-2 mb-2">
                        <h3 class="font-heading font-bold text-lg text-slate-900 dark:text-slate-100">{{ $exp->title }}</h3>
                        <span class="px-2.5 py-0.5 rounded-full bg-purple-500/10 text-purple-600 dark:text-purple-400 text-[11px] font-semibold">{{ $exp->role_type }}</span>
                    </div>

                    <h4 class="text-sm font-semibold text-brand-500 mb-4">{{ $exp->organization }}</h4>

                    @if($exp->bullets && count($exp->bullets) > 0)
                    <ul class="space-y-2 text-sm text-slate-600 dark:text-slate-300">
                        @foreach($exp->bullets as $bullet)
                        <li class="flex items-start gap-2">
                            <i data-lucide="check-circle-2" class="w-4 h-4 text-emerald-500 shrink-0 mt-0.5"></i>
                            <span>{{ $bullet }}</span>
                        </li>
                        @endforeach
                    </ul>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Projects Section -->
<section id="projects" class="py-20 bg-slate-100/50 dark:bg-slate-900/30">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8" x-data="{ activeTab: 'all' }">
        <div class="text-center max-w-3xl mx-auto mb-12">
            <h2 class="font-heading font-bold text-3xl sm:text-4xl mb-4">Portofolio Proyek</h2>
            <p class="text-slate-500 dark:text-slate-400 text-sm">Proyek akademik & rancangan sistem dengan pendekatan metodis & terstruktur</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            @foreach($projects as $project)
            <div class="glass rounded-3xl p-6 sm:p-8 flex flex-col justify-between hover:scale-[1.01] transition-all duration-300 shadow-xl border border-slate-200/60 dark:border-slate-800 group">
                <div>
                    <!-- Badge & Category -->
                    <div class="flex items-center justify-between gap-2 mb-4">
                        <span class="px-3 py-1 rounded-full bg-brand-500/10 text-brand-600 dark:text-brand-400 text-xs font-bold">
                            {{ $project->category }}
                        </span>
                        <span class="text-xs font-semibold text-slate-400">{{ $project->period }}</span>
                    </div>

                    <h3 class="font-heading font-bold text-xl mb-2 group-hover:text-brand-500 transition-colors leading-snug">
                        {{ $project->title }}
                    </h3>

                    @if($project->role)
                    <div class="inline-flex items-center gap-1.5 text-xs font-semibold text-purple-600 dark:text-purple-400 mb-4 bg-purple-500/10 px-2.5 py-1 rounded-md">
                        <i data-lucide="user-check" class="w-3.5 h-3.5"></i> Peran: {{ $project->role }}
                    </div>
                    @endif

                    <p class="text-sm text-slate-600 dark:text-slate-300 leading-relaxed mb-6">
                        {{ $project->summary }}
                    </p>

                    <!-- Problem & Solution Breakdown Box for HRD -->
                    <div class="space-y-3 bg-slate-200/40 dark:bg-slate-900/60 p-4 rounded-2xl border border-slate-200/50 dark:border-slate-800 text-xs mb-6">
                        @if($project->problem_statement)
                        <div>
                            <span class="font-bold text-red-500 uppercase tracking-wider block mb-0.5">Tantangan / Problem:</span>
                            <p class="text-slate-600 dark:text-slate-300">{{ $project->problem_statement }}</p>
                        </div>
                        @endif

                        @if($project->solution)
                        <div>
                            <span class="font-bold text-emerald-500 uppercase tracking-wider block mb-0.5">Solusi & Hasil:</span>
                            <p class="text-slate-600 dark:text-slate-300">{{ $project->solution }}</p>
                        </div>
                        @endif
                    </div>

                    <!-- Tech Stack Tags -->
                    @if($project->tech_stack && count($project->tech_stack) > 0)
                    <div class="flex flex-wrap gap-1.5">
                        @foreach($project->tech_stack as $tech)
                        <span class="px-2.5 py-1 rounded-lg bg-slate-200/70 dark:bg-slate-800/80 text-slate-700 dark:text-slate-300 text-xs font-medium border border-slate-300/40 dark:border-slate-700/40">
                            {{ $tech }}
                        </span>
                        @endforeach
                    </div>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Skills Section -->
<section id="skills" class="py-20">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <h2 class="font-heading font-bold text-3xl sm:text-4xl mb-4">Keahlian & Tools</h2>
            <p class="text-slate-500 dark:text-slate-400 text-sm">Kemampuan teknis, perangkat lunak produktivitas, desain, dan soft skills</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            @foreach($skills as $category => $categorySkills)
            <div class="glass rounded-3xl p-6 sm:p-8 shadow-lg">
                <h3 class="font-heading font-bold text-lg mb-6 flex items-center gap-2 border-b border-slate-200/50 dark:border-slate-800 pb-3">
                    <span class="w-2.5 h-2.5 rounded-full bg-brand-500"></span>
                    <span>{{ $category }}</span>
                </h3>

                <div class="space-y-4">
                    @foreach($categorySkills as $skill)
                    <div>
                        <div class="flex justify-between items-center text-sm font-medium mb-1.5">
                            <span class="flex items-center gap-2">
                                <i data-lucide="{{ $skill->icon ?? 'check' }}" class="w-4 h-4 text-brand-500"></i>
                                <span>{{ $skill->name }}</span>
                            </span>
                            <span class="text-xs text-slate-400 font-bold">{{ $skill->proficiency }}%</span>
                        </div>
                        <div class="w-full h-2 rounded-full bg-slate-200 dark:bg-slate-800 overflow-hidden">
                            <div class="h-full bg-gradient-to-r from-brand-600 to-purple-600 rounded-full transition-all duration-1000" style="width: {{ $skill->proficiency }}%"></div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Contact Section -->
<section id="contact" class="py-20 bg-slate-100/50 dark:bg-slate-900/30">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-12">
            <h2 class="font-heading font-bold text-3xl sm:text-4xl mb-4">Hubungi Saya</h2>
            <p class="text-slate-500 dark:text-slate-400 text-sm">Terbuka untuk diskusi kesempatan kerja, kolaborasi proyek, atau konsultasi. Silakan hubungi saya secara langsung melalui WhatsApp atau Email.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
            <!-- Email Card -->
            <div class="glass rounded-2xl p-6 shadow-md text-center flex flex-col items-center justify-center">
                <div class="w-12 h-12 rounded-2xl bg-brand-500/10 text-brand-500 flex items-center justify-center mb-4 shadow-inner">
                    <i data-lucide="mail" class="w-6 h-6"></i>
                </div>
                <h4 class="font-heading font-bold text-base mb-1">Email</h4>
                <p class="text-xs text-slate-400 mb-3">Kirim email ke Gmail</p>
                <a href="mailto:{{ $profile->email ?? 'andraalputra21@gmail.com' }}" class="text-xs font-semibold px-3 py-1.5 rounded-lg bg-brand-500/10 text-brand-500 hover:bg-brand-500/20 transition-colors break-all">
                    {{ $profile->email ?? 'andraalputra21@gmail.com' }}
                </a>
            </div>

            <!-- WhatsApp Card -->
            <div class="glass rounded-2xl p-6 shadow-md text-center flex flex-col items-center justify-center">
                <div class="w-12 h-12 rounded-2xl bg-emerald-500/10 text-emerald-500 flex items-center justify-center mb-4 shadow-inner">
                    <i data-lucide="phone" class="w-6 h-6"></i>
                </div>
                <h4 class="font-heading font-bold text-base mb-1">WhatsApp</h4>
                <p class="text-xs text-slate-400 mb-3">Respon cepat via WhatsApp</p>
                <a href="https://wa.me/6285710289368" target="_blank" class="text-xs font-semibold px-3 py-1.5 rounded-lg bg-emerald-500/10 text-emerald-500 hover:bg-emerald-500/20 transition-colors">
                    {{ $profile->phone ?? '(+62) 857-1028-9368' }}
                </a>
            </div>

            <!-- Domisili Card -->
            <div class="glass rounded-2xl p-6 shadow-md text-center flex flex-col items-center justify-center">
                <div class="w-12 h-12 rounded-2xl bg-purple-500/10 text-purple-500 flex items-center justify-center mb-4 shadow-inner">
                    <i data-lucide="map-pin" class="w-6 h-6"></i>
                </div>
                <h4 class="font-heading font-bold text-base mb-1">Domisili</h4>
                <p class="text-xs text-slate-400 mb-3">Lokasi Tempat Tinggal</p>
                <span class="text-xs font-semibold px-3 py-1.5 rounded-lg bg-purple-500/10 text-purple-400">
                    {{ $profile->location ?? 'Depok, Jawa Barat' }}
                </span>
            </div>
        </div>

        <!-- Direct Action Buttons -->
        <div class="glass rounded-3xl p-8 shadow-xl text-center flex flex-col sm:flex-row items-center justify-center gap-4">
            <a href="https://wa.me/6285710289368" target="_blank" class="w-full sm:w-auto px-8 py-4 rounded-2xl bg-emerald-600 hover:bg-emerald-500 text-white font-semibold text-sm shadow-lg shadow-emerald-600/25 flex items-center justify-center gap-2.5 transition-all hover:scale-[1.02]">
                <i data-lucide="message-circle" class="w-5 h-5"></i>
                <span>Chat via WhatsApp</span>
            </a>
            <a href="mailto:{{ $profile->email ?? 'andraalputra21@gmail.com' }}" class="w-full sm:w-auto px-8 py-4 rounded-2xl bg-brand-600 hover:bg-brand-500 text-white font-semibold text-sm shadow-lg shadow-brand-500/25 flex items-center justify-center gap-2.5 transition-all hover:scale-[1.02]">
                <i data-lucide="mail" class="w-5 h-5"></i>
                <span>Kirim Email via Gmail</span>
            </a>
        </div>
    </div>
</section>
@endsection
