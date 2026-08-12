<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $profile->full_name ?? 'Suryandara Putra' }} — Portofolio Online & CV</title>
    <meta name="description" content="Portofolio Online {{ $profile->full_name ?? 'Suryandara Putra' }}, {{ $profile->title ?? 'Mahasiswa Teknologi Informasi' }}. Spesialisasi UI/UX, Machine Learning, & Development Tools.">
    
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
                            50: '#eef2ff',
                            100: '#e0e7ff',
                            400: '#818cf8',
                            500: '#6366f1',
                            600: '#4f46e5',
                            700: '#4338ca',
                            900: '#312e81',
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
        .glass {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }
        .dark .glass {
            background: rgba(15, 23, 42, 0.75);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.08);
        }
        .text-gradient {
            background: linear-gradient(135deg, #6366f1 0%, #a855f7 50%, #ec4899 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
    </style>
</head>
<body x-data="{ darkMode: localStorage.getItem('theme') === 'dark' }" 
      x-init="$watch('darkMode', val => localStorage.setItem('theme', val ? 'dark' : 'light'))" 
      :class="{ 'dark bg-slate-950 text-slate-100': darkMode, 'bg-slate-50 text-slate-800': !darkMode }" 
      class="font-sans antialiased selection:bg-brand-500 selection:text-white transition-colors duration-300">

    <!-- Navigation Bar -->
    <header class="fixed top-0 left-0 right-0 z-50 transition-all duration-300">
        <nav class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
            <div class="glass rounded-2xl px-5 py-3 flex items-center justify-between shadow-lg shadow-black/5">
                <a href="#hero" class="font-heading font-bold text-xl tracking-tight flex items-center gap-2">
                    <span class="w-8 h-8 rounded-lg bg-gradient-to-tr from-brand-600 to-purple-600 flex items-center justify-center text-white font-black text-sm shadow-md">SP</span>
                    <span>Suryandara<span class="text-brand-500">.</span></span>
                </a>

                <div class="hidden md:flex items-center gap-8 text-sm font-medium">
                    <a href="#about" class="hover:text-brand-500 transition-colors">Tentang</a>
                    <a href="#education" class="hover:text-brand-500 transition-colors">Pendidikan</a>
                    <a href="#experiences" class="hover:text-brand-500 transition-colors">Pengalaman</a>
                    <a href="#projects" class="hover:text-brand-500 transition-colors">Proyek</a>
                    <a href="#skills" class="hover:text-brand-500 transition-colors">Keahlian</a>
                    <a href="#contact" class="hover:text-brand-500 transition-colors">Kontak</a>
                </div>

                <div class="flex items-center gap-3">
                    <button @click="darkMode = !darkMode" class="p-2 rounded-xl border border-slate-200 dark:border-slate-800 hover:bg-slate-100 dark:hover:bg-slate-800/60 transition-colors text-slate-600 dark:text-slate-300" title="Toggle Theme">
                        <i x-show="!darkMode" data-lucide="moon" class="w-4 h-4"></i>
                        <i x-show="darkMode" data-lucide="sun" class="w-4 h-4"></i>
                    </button>

                    <a href="{{ route('portfolio.download-cv') }}" class="hidden sm:inline-flex items-center gap-2 px-4 py-2 text-xs font-semibold rounded-xl bg-brand-600 hover:bg-brand-500 text-white shadow-md shadow-brand-500/20 transition-all hover:scale-[1.02]">
                        <i data-lucide="download" class="w-3.5 h-3.5"></i>
                        Download CV
                    </a>
                </div>
            </div>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="border-t border-slate-200 dark:border-slate-800/80 py-12 mt-20 transition-colors">
        <div class="max-w-6xl mx-auto px-4 text-center">
            <div class="flex items-center justify-center gap-2 font-heading font-bold text-lg mb-4">
                <span class="w-7 h-7 rounded-lg bg-brand-600 flex items-center justify-center text-white text-xs">SP</span>
                <span>Suryandara Putra</span>
            </div>
            <p class="text-sm text-slate-500 dark:text-slate-400 mb-6">
                Mahasiswa Teknologi Informasi Semester 7 — BSI Kampus Margonda (Depok, Jawa Barat)
            </p>
            <div class="flex justify-center items-center gap-6 text-slate-400 mb-8">
                <a href="mailto:andraalputra21@gmail.com" class="hover:text-brand-500 transition-colors" title="Email"><i data-lucide="mail" class="w-5 h-5"></i></a>
                <a href="https://wa.me/6285710289368" target="_blank" class="hover:text-emerald-500 transition-colors" title="WhatsApp"><i data-lucide="phone" class="w-5 h-5"></i></a>
                <a href="https://instagram.com/andr.rwa" target="_blank" class="hover:text-pink-500 transition-colors" title="Instagram (@andr.rwa)">
                    <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                </a>
                <a href="https://github.com" target="_blank" class="hover:text-slate-900 dark:hover:text-slate-100 transition-colors" title="GitHub">
                    <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M12 0C5.37 0 0 5.37 0 12c0 5.31 3.435 9.795 8.205 11.385.6.105.825-.255.825-.57 0-.285-.015-1.23-.015-2.235-3.015.555-3.795-.735-4.035-1.41-.135-.345-.72-1.41-1.23-1.695-.42-.225-1.02-.78-.015-.795.945-.015 1.62.87 1.845 1.23 1.08 1.815 2.805 1.305 3.495.99.105-.78.42-1.305.765-1.605-2.67-.3-5.46-1.335-5.46-5.925 0-1.305.465-2.385 1.23-3.225-.12-.3-.54-1.53.12-3.18 0 0 1.005-.315 3.3 1.23.96-.27 1.98-.405 3-.405s2.04.135 3 .405c2.295-1.56 3.3-1.23 3.3-1.23.66 1.65.24 2.88.12 3.18.765.84 1.23 1.905 1.23 3.225 0 4.605-2.805 5.625-5.475 5.925.435.375.81 1.095.81 2.22 0 1.605-.015 2.895-.015 3.3 0 .315.225.69.825.57A12.02 12.02 0 0024 12c0-6.63-5.37-12-12-12z"/></svg>
                </a>
                <a href="https://linkedin.com" target="_blank" class="hover:text-blue-500 transition-colors" title="LinkedIn">
                    <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                </a>
            </div>
            <p class="text-xs text-slate-400">
                &copy; {{ date('Y') }} Suryandara Putra. Built with Laravel 11 & Tailwind CSS. All rights reserved.
            </p>
        </div>
    </footer>

    <script>
        lucide.createIcons();
    </script>
</body>
</html>
