<!DOCTYPE html>
<html lang="id" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard — Portofolio Suryandara</title>
    
    <!-- Fonts: Inter & Outfit -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Outfit:wght@500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        heading: ['Outfit', 'sans-serif'],
                    },
                    colors: {
                        brand: {
                            500: '#6366f1',
                            600: '#4f46e5',
                            700: '#4338ca',
                        }
                    }
                }
            }
        }
    </script>
    
    <!-- Alpine.js & Lucide Icons -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://unpkg.com/lucide@latest"></script>

    <style>
        .glass-panel {
            background: rgba(15, 23, 42, 0.85);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.08);
        }
    </style>
</head>
<body class="bg-slate-950 text-slate-100 font-sans antialiased min-h-screen flex">

    <!-- Sidebar -->
    <aside class="w-64 bg-slate-900/80 border-r border-slate-800 flex flex-col justify-between hidden md:flex shrink-0">
        <div>
            <!-- Sidebar Header -->
            <div class="p-6 border-b border-slate-800 flex items-center gap-3">
                <span class="w-9 h-9 rounded-xl bg-brand-600 flex items-center justify-center font-heading font-black text-white text-base shadow-lg">SP</span>
                <div>
                    <h2 class="font-heading font-bold text-sm leading-tight">Admin Panel</h2>
                    <span class="text-[11px] text-slate-400">Suryandara Putra</span>
                </div>
            </div>

            <!-- Nav Links -->
            <nav class="p-4 space-y-1 text-sm font-medium">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-colors {{ request()->routeIs('admin.dashboard') ? 'bg-brand-600 text-white font-semibold shadow-md' : 'text-slate-400 hover:bg-slate-800/60 hover:text-white' }}">
                    <i data-lucide="layout-dashboard" class="w-4 h-4"></i>
                    <span>Dashboard</span>
                </a>

                <a href="{{ route('admin.projects.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-colors {{ request()->routeIs('admin.projects.*') ? 'bg-brand-600 text-white font-semibold shadow-md' : 'text-slate-400 hover:bg-slate-800/60 hover:text-white' }}">
                    <i data-lucide="folder-kanban" class="w-4 h-4"></i>
                    <span>Proyek (CRUD)</span>
                </a>

                <a href="{{ route('admin.experiences.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-colors {{ request()->routeIs('admin.experiences.*') ? 'bg-brand-600 text-white font-semibold shadow-md' : 'text-slate-400 hover:bg-slate-800/60 hover:text-white' }}">
                    <i data-lucide="briefcase" class="w-4 h-4"></i>
                    <span>Pengalaman (CRUD)</span>
                </a>

                <a href="{{ route('admin.skills.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-colors {{ request()->routeIs('admin.skills.*') ? 'bg-brand-600 text-white font-semibold shadow-md' : 'text-slate-400 hover:bg-slate-800/60 hover:text-white' }}">
                    <i data-lucide="code-2" class="w-4 h-4"></i>
                    <span>Keahlian (CRUD)</span>
                </a>

                <a href="{{ route('admin.education.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-colors {{ request()->routeIs('admin.education.*') ? 'bg-brand-600 text-white font-semibold shadow-md' : 'text-slate-400 hover:bg-slate-800/60 hover:text-white' }}">
                    <i data-lucide="graduation-cap" class="w-4 h-4"></i>
                    <span>Pendidikan (CRUD)</span>
                </a>

                <a href="{{ route('admin.profile.edit') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-colors {{ request()->routeIs('admin.profile.*') ? 'bg-brand-600 text-white font-semibold shadow-md' : 'text-slate-400 hover:bg-slate-800/60 hover:text-white' }}">
                    <i data-lucide="user-cog" class="w-4 h-4"></i>
                    <span>Profil & Unggah CV</span>
                </a>

                <a href="{{ route('admin.messages.index') }}" class="flex items-center justify-between px-4 py-3 rounded-xl transition-colors {{ request()->routeIs('admin.messages.*') ? 'bg-brand-600 text-white font-semibold shadow-md' : 'text-slate-400 hover:bg-slate-800/60 hover:text-white' }}">
                    <span class="flex items-center gap-3">
                        <i data-lucide="inbox" class="w-4 h-4"></i>
                        <span>Pesan Inbox</span>
                    </span>
                </a>
            </nav>
        </div>

        <!-- Sidebar Footer -->
        <div class="p-4 border-t border-slate-800 space-y-2">
            <a href="{{ route('portfolio.index') }}" target="_blank" class="flex items-center gap-2 text-xs font-semibold text-slate-400 hover:text-brand-400 px-3 py-2 rounded-lg hover:bg-slate-800/50">
                <i data-lucide="external-link" class="w-3.5 h-3.5"></i>
                <span>Lihat Portofolio</span>
            </a>

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="w-full flex items-center gap-2 text-xs font-semibold text-red-400 hover:text-red-300 px-3 py-2 rounded-lg hover:bg-red-500/10">
                    <i data-lucide="log-out" class="w-3.5 h-3.5"></i>
                    <span>Keluar (Logout)</span>
                </button>
            </form>
        </div>
    </aside>

    <!-- Main Content Area -->
    <div class="flex-1 flex flex-col min-w-0">
        <!-- Top Nav Header -->
        <header class="h-16 bg-slate-900/60 border-b border-slate-800 px-6 flex items-center justify-between">
            <div class="flex items-center gap-4">
                <h1 class="font-heading font-bold text-lg">@yield('title', 'Dashboard Admin')</h1>
            </div>

            <div class="flex items-center gap-3">
                <span class="text-xs text-slate-400">Pengelola: <strong class="text-slate-200">Suryandara Putra</strong></span>
            </div>
        </header>

        <!-- Flash Messages -->
        <main class="flex-1 p-6 overflow-y-auto">
            @if(session('success'))
            <div class="mb-6 p-4 rounded-xl bg-emerald-500/10 border border-emerald-500/30 text-emerald-400 text-sm font-medium flex items-center gap-2">
                <i data-lucide="check-circle" class="w-5 h-5"></i>
                <span>{{ session('success') }}</span>
            </div>
            @endif

            @yield('content')
        </main>
    </div>

    <script>
        lucide.createIcons();
    </script>
</body>
</html>
