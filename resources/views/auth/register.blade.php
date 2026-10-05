<x-guest-layout>
    <!-- Background layaknya aplikasi modern -->
    <div class="fixed inset-0 flex items-center justify-center bg-gradient-to-br from-blue-50 to-indigo-100 p-4 z-50">
        
        <!-- Card Utama -->
        <div class="flex w-full max-w-5xl bg-white rounded-3xl shadow-2xl overflow-hidden min-h-[600px]">
            
            <!-- Sisi Kiri: Gambar Pemanis (Berbeda posisi dengan login agar variatif) -->
            <div class="hidden md:block w-1/2 bg-indigo-900 relative">
                <!-- Gambar dummy ruang santai kos dari Unsplash -->
                <img src="https://images.unsplash.com/photo-1513694203232-719a280e022f?q=80&w=1000&auto=format&fit=crop" alt="Fasilitas Kos" class="absolute inset-0 w-full h-full object-cover opacity-60 mix-blend-overlay">
                
                <!-- Efek Gradasi -->
                <div class="absolute inset-0 bg-gradient-to-t from-indigo-900/90 via-indigo-900/40 to-transparent"></div>
                
                <!-- Teks di atas gambar -->
                <div class="absolute bottom-0 left-0 p-12 text-white">
                    <span class="px-3 py-1 bg-white/20 rounded-full text-sm font-semibold backdrop-blur-sm mb-4 inline-block">Daftar Akun Baru</span>
                    <h3 class="text-3xl font-bold mb-3 leading-tight">Mulai Kelola<br>Kos Lebih Mudah</h3>
                    <p class="text-indigo-100 text-sm">Bergabunglah untuk menikmati kemudahan mengecek dan membayar tagihan kos bulanan.</p>
                </div>
            </div>

            <!-- Sisi Kanan: Form Register -->
            <div class="w-full md:w-1/2 p-8 md:p-10 lg:p-12 flex flex-col justify-center overflow-y-auto">
                <div class="mb-6">
                    <h2 class="text-3xl font-bold text-gray-800">Buat Akun 🚀</h2>
                    <p class="text-gray-500 mt-2">Isi data diri kamu di bawah ini.</p>
                </div>

                <form method="POST" action="{{ route('register') }}" class="space-y-4">
                    @csrf

                    <!-- Input Nama -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                        <input id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="John Doe" 
                               class="mt-1 block w-full rounded-xl border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 px-4 py-2.5 bg-gray-50 transition duration-200" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-500 text-sm" />
                    </div>

                    <!-- Input Email -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input id="email" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="john@example.com" 
                               class="mt-1 block w-full rounded-xl border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 px-4 py-2.5 bg-gray-50 transition duration-200" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500 text-sm" />
                    </div>

                    <!-- Input Password -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                        <input id="password" type="password" name="password" required autocomplete="new-password" placeholder="Minimal 8 karakter" 
                               class="mt-1 block w-full rounded-xl border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 px-4 py-2.5 bg-gray-50 transition duration-200" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500 text-sm" />
                    </div>

                    <!-- Input Konfirmasi Password -->
                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Konfirmasi Password</label>
                        <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Ulangi password" 
                               class="mt-1 block w-full rounded-xl border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 px-4 py-2.5 bg-gray-50 transition duration-200" />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-500 text-sm" />
                    </div>

                    <!-- Tombol Register & Link Login -->
                    <div class="pt-2 flex flex-col space-y-4">
                        <button type="submit" class="w-full flex justify-center py-3.5 px-4 border border-transparent rounded-xl shadow-sm text-sm font-bold text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-200 transform hover:-translate-y-0.5">
                            Daftar Sekarang
                        </button>
                        
                        <p class="text-center text-sm text-gray-600">
                            Sudah punya akun? 
                            <a href="{{ route('login') }}" class="font-medium text-indigo-600 hover:text-indigo-500 transition">
                                Masuk di sini
                            </a>
                        </p>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</x-guest-layout>