<!DOCTYPE html>
<html lang="id" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin — Portofolio Suryandara</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Outfit:wght@500;600;700;800&display=swap" rel="stylesheet">
    
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
                        }
                    }
                }
            }
        }
    </script>
    <script src="https://unpkg.com/lucide@latest"></script>
</head>
<body class="bg-slate-950 text-slate-100 font-sans min-h-screen flex items-center justify-center p-4 relative overflow-hidden">

    <!-- Background Ambient Light -->
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[400px] h-[400px] bg-indigo-600/20 blur-[100px] rounded-full pointer-events-none"></div>

    <div class="w-full max-w-md relative z-10">
        <div class="bg-slate-900/80 backdrop-blur-xl border border-slate-800 rounded-3xl p-8 shadow-2xl">
            <div class="text-center mb-8">
                <span class="w-12 h-12 rounded-2xl bg-brand-600 inline-flex items-center justify-center font-heading font-black text-white text-xl shadow-lg mb-3">SP</span>
                <h1 class="font-heading font-bold text-2xl">Login Management Panel</h1>
                <p class="text-xs text-slate-400 mt-1">Akses kelola data portofolio & CV Suryandara Putra</p>
            </div>

            @if($errors->any())
            <div class="mb-6 p-4 rounded-xl bg-red-500/10 border border-red-500/30 text-red-400 text-xs font-medium">
                {{ $errors->first() }}
            </div>
            @endif

            <form action="{{ route('admin.login.submit') }}" method="POST" class="space-y-5">
                @csrf
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-400 mb-2">Email Admin</label>
                    <input type="email" name="email" value="admin@suryandara.com" required class="w-full px-4 py-3 rounded-xl bg-slate-950/80 border border-slate-800 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500">
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-400 mb-2">Password</label>
                    <input type="password" name="password" value="password123" required class="w-full px-4 py-3 rounded-xl bg-slate-950/80 border border-slate-800 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500">
                </div>

                <div class="flex items-center justify-between text-xs text-slate-400">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" name="remember" class="rounded bg-slate-950 border-slate-800 text-brand-500 focus:ring-0">
                        <span>Ingat Saya</span>
                    </label>
                    <span class="text-slate-500">Default: password123</span>
                </div>

                <button type="submit" class="w-full py-3.5 rounded-xl bg-brand-600 hover:bg-brand-500 font-semibold text-sm shadow-lg shadow-brand-500/25 transition-all">
                    Masuk ke Admin Dashboard
                </button>
            </form>

            <div class="mt-6 text-center">
                <a href="{{ route('portfolio.index') }}" class="text-xs text-slate-400 hover:text-brand-400 transition-colors">
                    &larr; Kembali ke Portofolio Utama
                </a>
            </div>
        </div>
    </div>

    <script>lucide.createIcons();</script>
</body>
</html>
