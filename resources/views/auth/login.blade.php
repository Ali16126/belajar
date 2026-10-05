<x-guest-layout>
    <!-- Background layaknya aplikasi modern -->
    <div class="fixed inset-0 flex items-center justify-center bg-gradient-to-br from-blue-50 to-indigo-100 p-4 z-50">
        
        <!-- Card Utama -->
        <div class="flex w-full max-w-5xl bg-white rounded-3xl shadow-2xl overflow-hidden min-h-[550px]">
            
            <!-- Sisi Kiri: Form Login -->
            <div class="w-full md:w-1/2 p-8 md:p-12 lg:p-16 flex flex-col justify-center">
                <div class="mb-8">
                    <h2 class="text-3xl font-bold text-gray-800">Selamat Datang! 👋</h2>
                    <p class="text-gray-500 mt-2">Silakan login untuk mengecek tagihan kos kamu.</p>
                </div>

                <!-- Notifikasi Error/Sukses -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}" class="space-y-5">
                    @csrf

                    <!-- Input Email -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="Masukkan email kamu" 
                               class="mt-1 block w-full rounded-xl border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 px-4 py-3 bg-gray-50 transition duration-200" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500 text-sm" />
                    </div>

                    <!-- Input Password -->
                    <div>
                        <div class="flex justify-between items-center mb-1">
                            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                            @if (Route::has('password.request'))
                                <a class="text-sm text-indigo-600 hover:text-indigo-500 font-medium transition" href="{{ route('password.request') }}">
                                    Lupa password?
                                </a>
                            @endif
                        </div>
                        <input id="password" type="password" name="password" required autocomplete="current-password" placeholder="••••••••" 
                               class="block w-full rounded-xl border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 px-4 py-3 bg-gray-50 transition duration-200" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500 text-sm" />
                    </div>

                    <!-- Ingat Saya -->
                    <div class="flex items-center">
                        <input id="remember_me" type="checkbox" name="remember" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500 h-4 w-4">
                        <label for="remember_me" class="ml-2 block text-sm text-gray-600">
                            Ingat saya
                        </label>
                    </div>

                    <!-- Tombol Login -->
                    <button type="submit" class="w-full flex justify-center py-3.5 px-4 border border-transparent rounded-xl shadow-sm text-sm font-bold text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-200 transform hover:-translate-y-0.5">
                        Masuk ke Dashboard
                    </button>
                </form>
            </div>

            <!-- Sisi Kanan: Gambar Pemanis (Sembunyi di HP, Muncul di Laptop) -->
            <div class="hidden md:block w-1/2 bg-indigo-900 relative">
                <!-- Gambar dummy kamar kos dari Unsplash -->
                <img src="https://images.unsplash.com/photo-1522708323590-d24dbb6b0267?q=80&w=1000&auto=format&fit=crop" alt="Kamar Kos" class="absolute inset-0 w-full h-full object-cover opacity-60 mix-blend-overlay">
                
                <!-- Efek Gradasi -->
                <div class="absolute inset-0 bg-gradient-to-t from-indigo-900/90 via-indigo-900/40 to-transparent"></div>
                
                <!-- Teks di atas gambar -->
                <div class="absolute bottom-0 left-0 p-12 text-white">
                    <span class="px-3 py-1 bg-white/20 rounded-full text-sm font-semibold backdrop-blur-sm mb-4 inline-block">App Pengelola Kos</span>
                    <h3 class="text-3xl font-bold mb-3 leading-tight">Pantau Tagihan &<br>Tenggat Kosmu</h3>
                    <p class="text-indigo-100 text-sm">Sistem transparan untuk melihat riwayat pembayaran bulanan dengan lebih mudah.</p>
                </div>
            </div>
            
        </div>
    </div>
</x-guest-layout>