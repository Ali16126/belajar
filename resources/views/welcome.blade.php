<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kos Apps - Solusi Manajemen Kos</title>
    <!-- Memanggil Tailwind CSS bawaan Laravel -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased font-sans bg-slate-50 text-slate-900">
    
    <!-- Bagian Navigasi (Navbar) -->
    <nav class="absolute w-full z-50 px-6 py-5 flex justify-between items-center max-w-7xl mx-auto left-0 right-0">
        <div class="flex items-center gap-2">
            <!-- Ikon Logo -->
            <svg class="w-8 h-8 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
            <span class="text-xl font-bold tracking-wider text-slate-800">KOS APPS</span>
        </div>
        <div class="space-x-2 md:space-x-4 flex items-center">
            @if (Route::has('login'))
                @auth
                    <!-- Jika sudah login, tombol berubah jadi Dashboard -->
                    <a href="{{ url('/dashboard') }}" class="font-medium px-5 py-2.5 bg-indigo-600 text-white rounded-full hover:bg-indigo-700 transition shadow-lg shadow-indigo-600/30">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="font-medium text-slate-600 hover:text-indigo-600 transition px-3 py-2">Masuk</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="font-medium px-5 py-2.5 bg-indigo-600 text-white rounded-full hover:bg-indigo-700 transition shadow-lg shadow-indigo-600/30">Daftar Akun</a>
                    @endif
                @endauth
            @endif
        </div>
    </nav>

    <!-- Bagian Hero (Sambutan Utama) -->
    <section class="relative pt-32 pb-20 lg:pt-48 lg:pb-32 overflow-hidden flex items-center min-h-screen">
        <!-- Dekorasi Background -->
        <div class="absolute inset-0 bg-gradient-to-br from-indigo-50/50 to-white -z-10"></div>
        <div class="absolute right-0 top-0 w-1/3 h-full bg-indigo-600/5 blur-3xl rounded-full transform translate-x-1/2 -translate-y-1/4 -z-10"></div>
        
        <div class="max-w-7xl mx-auto px-6 grid lg:grid-cols-2 gap-16 items-center">
            
            <!-- Teks Sebelah Kiri -->
            <div class="space-y-8 text-center lg:text-left">
                <!-- Badge Animasi -->
                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-indigo-100 text-indigo-700 font-medium text-sm">
                    <span class="relative flex h-3 w-3">
                      <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-indigo-400 opacity-75"></span>
                      <span class="relative inline-flex rounded-full h-3 w-3 bg-indigo-500"></span>
                    </span>
                    Aplikasi Manajemen Kos Modern
                </div>
                
                <h1 class="text-5xl lg:text-6xl font-extrabold leading-tight tracking-tight text-slate-900">
                    Kelola Kos Kini <span class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-purple-600">Lebih Mudah</span> & Praktis
                </h1>
                
                <p class="text-lg text-slate-600 leading-relaxed max-w-2xl mx-auto lg:mx-0">
                    Pantau tagihan, ingatkan penyewa, dan catat data penghuni kos kamu dalam satu aplikasi. Tinggalkan buku catatan manual, beralih ke digital sekarang.
                </p>
                
                <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                    <a href="{{ route('register') }}" class="px-8 py-4 bg-indigo-600 text-white font-bold rounded-xl hover:bg-indigo-700 hover:-translate-y-1 transition-all shadow-xl shadow-indigo-600/30 text-center flex items-center justify-center gap-2">
                        Mulai Kelola Kos
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </a>
                    <a href="#fitur" class="px-8 py-4 bg-white text-slate-700 border border-slate-200 font-bold rounded-xl hover:bg-slate-50 transition text-center">
                        Pelajari Fitur
                    </a>
                </div>
            </div>
            
            <!-- Gambar Sebelah Kanan (Sembunyi di Mobile) -->
            <div class="relative hidden lg:block">
                <div class="relative z-10 rounded-3xl overflow-hidden shadow-2xl border-4 border-white rotate-2 hover:rotate-0 transition-transform duration-500">
                    <!-- Gambar Dummy Kamar Kos Estetik -->
                    <img src="https://images.unsplash.com/photo-1522708323590-d24dbb6b0267?q=80&w=1000&auto=format&fit=crop" alt="Kamar Kos" class="w-full h-auto object-cover">
                </div>
                
                <!-- Efek Blur di belakang gambar -->
                <div class="absolute -bottom-6 -left-6 w-48 h-48 bg-purple-300 rounded-full mix-blend-multiply filter blur-2xl opacity-70"></div>
                <div class="absolute -top-6 -right-6 w-48 h-48 bg-indigo-300 rounded-full mix-blend-multiply filter blur-2xl opacity-70"></div>
            </div>
            
        </div>
    </section>

    <!-- Bagian Fitur -->
    <section id="fitur" class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-3xl font-bold text-slate-900 mb-4">Fitur Lengkap untuk Juragan Kos</h2>
                <p class="text-slate-600 text-lg">Segala yang kamu butuhkan untuk mengatur kos-kosan tanpa pusing, tersedia di genggaman.</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <!-- Fitur 1 -->
                <div class="p-8 rounded-3xl bg-slate-50 border border-slate-100 hover:shadow-xl hover:shadow-indigo-100 hover:-translate-y-1 transition-all duration-300 group">
                    <div class="w-14 h-14 bg-red-100 text-red-600 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-red-600 group-hover:text-white transition-colors">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-3">Pantau Tenggat Bayar</h3>
                    <p class="text-slate-600">Tidak ada lagi yang terlewat. Sistem otomatis menandai tagihan yang sudah lewat jatuh tempo dengan warna peringatan.</p>
                </div>

                <!-- Fitur 2 -->
                <div class="p-8 rounded-3xl bg-slate-50 border border-slate-100 hover:shadow-xl hover:shadow-indigo-100 hover:-translate-y-1 transition-all duration-300 group">
                    <div class="w-14 h-14 bg-green-100 text-green-600 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-green-600 group-hover:text-white transition-colors">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-3">Status Lunas Real-time</h3>
                    <p class="text-slate-600">Catat histori pembayaran dengan rapi. Penghuni kos juga bisa melihat status tagihan mereka langsung dari HP masing-masing.</p>
                </div>

                <!-- Fitur 3 -->
                <div class="p-8 rounded-3xl bg-slate-50 border border-slate-100 hover:shadow-xl hover:shadow-indigo-100 hover:-translate-y-1 transition-all duration-300 group">
                    <div class="w-14 h-14 bg-indigo-100 text-indigo-600 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-indigo-600 group-hover:text-white transition-colors">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-3">Manajemen Penghuni</h3>
                    <p class="text-slate-600">Data nama, kontak, dan riwayat penghuni kos tersimpan aman. Tambah, edit, atau hapus data dengan sangat cepat.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-slate-900 text-slate-400 py-12 text-center border-t border-slate-800">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex justify-center items-center gap-2 mb-6 text-white">
                <svg class="w-6 h-6 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                <span class="text-lg font-bold tracking-wider">KOS APPS</span>
            </div>
            <p>&copy; {{ date('Y') }} Kos Apps. Dibuat dengan Tailwind CSS & Laravel.</p>
        </div>
    </footer>
    
</body>
</html>