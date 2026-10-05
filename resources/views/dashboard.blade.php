<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="font-bold text-2xl text-gray-800 leading-tight tracking-tight">
                    @if(auth()->user()->role === 'admin')
                        👋 Halo, bos muda!
                    @else
                        👋 Halo, {{ explode(' ', auth()->user()->name)[0] }}!
                    @endif
                </h2>
                <p class="text-sm text-gray-500 mt-1">Ini adalah ringkasan tagihan kos saat ini.</p>
            </div>
            
            <!-- Badge Role -->
            <span class="inline-flex items-center gap-1.5 py-1.5 px-3 rounded-full text-xs font-medium bg-indigo-100 text-indigo-800 border border-indigo-200">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                {{ ucfirst(auth()->user()->role) }}
            </span>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            <!-- SECTION 1: KARTU METRIK (RINGKASAN) -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Kartu Total Tagihan (Belum Lunas) -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 flex items-center space-x-4 transition hover:shadow-md">
                    <div class="p-3 bg-red-50 text-red-600 rounded-xl">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-500">Total Belum Dibayar</p>
                        @php
                            $totalBelumLunas = $payments->where('status_pembayaran', 'belum_lunas')->sum('jumlah_tagihan');
                        @endphp
                        <p class="text-2xl font-bold text-gray-900">Rp {{ number_format($totalBelumLunas, 0, ',', '.') }}</p>
                    </div>
                </div>

                <!-- Kartu Total Pemasukan / Pembayaran Lunas -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 flex items-center space-x-4 transition hover:shadow-md">
                    <div class="p-3 bg-green-50 text-green-600 rounded-xl">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-500">Sudah Lunas</p>
                        @php
                            $totalLunas = $payments->where('status_pembayaran', 'lunas')->sum('jumlah_tagihan');
                        @endphp
                        <p class="text-2xl font-bold text-gray-900">Rp {{ number_format($totalLunas, 0, ',', '.') }}</p>
                    </div>
                </div>

                <!-- Kartu Jumlah Tagihan (Item) -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 flex items-center space-x-4 transition hover:shadow-md">
                    <div class="p-3 bg-blue-50 text-blue-600 rounded-xl">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-500">Total Transaksi</p>
                        <p class="text-2xl font-bold text-gray-900">{{ $payments->count() }} <span class="text-base font-normal text-gray-500">Tagihan</span></p>
                    </div>
                </div>
            </div>

            <!-- SECTION 2: TABEL DATA -->
            <div class="bg-white overflow-hidden shadow-sm border border-gray-100 sm:rounded-2xl mt-8">
                
                <!-- Header Tabel -->
                <div class="px-6 py-5 border-b border-gray-100 bg-gray-50 flex justify-between items-center">
                    <h3 class="text-lg font-semibold text-gray-800">
                        @if(auth()->user()->role === 'admin')
                            Daftar Tagihan Seluruh Penghuni
                        @else
                            Riwayat Tagihan Kamu
                        @endif
                    </h3>
                    
                    <!-- Tombol Tambah (Khusus Admin) -->
                    @if(auth()->user()->role === 'admin')
                    <a href="{{ route('tagihan.create') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-lg transition-colors shadow-sm">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                        Buat Tagihan
                    </a>
                    @endif
                </div>
                        
                <!-- Isi Tabel -->
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-white">
                            <tr>
                                @if(auth()->user()->role === 'admin')
                                    <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Penghuni</th>
                                @endif
                                <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Nominal</th>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Tenggat Waktu</th>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Status</th>
                                @if(auth()->user()->role === 'admin')
                                    <th scope="col" class="px-6 py-4 text-right text-xs font-semibold text-gray-500 uppercase tracking-wider">Aksi</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-100">
                            @forelse($payments as $payment)
                                <tr class="hover:bg-gray-50 transition-colors">
                                    
                                    @if(auth()->user()->role === 'admin')
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 h-10 w-10">
                                                    <!-- Avatar Inisial -->
                                                    <div class="h-10 w-10 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-700 font-bold">
                                                        {{ substr($payment->user->name, 0, 1) }}
                                                    </div>
                                                </div>
                                                <div class="ml-4">
                                                    <div class="text-sm font-medium text-gray-900">{{ $payment->user->name }}</div>
                                                    <div class="text-sm text-gray-500">{{ $payment->user->email }}</div>
                                                </div>
                                            </div>
                                        </td>
                                    @endif
                                    
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-bold text-gray-900">Rp {{ number_format($payment->jumlah_tagihan, 0, ',', '.') }}</div>
                                    </td>
                                    
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @php
                                            $tenggat = \Carbon\Carbon::parse($payment->tenggat_pembayaran);
                                            $isLewat = $tenggat->isPast() && $payment->status_pembayaran == 'belum_lunas';
                                        @endphp
                                        <div class="text-sm {{ $isLewat ? 'text-red-600 font-bold flex items-center' : 'text-gray-900' }}">
                                            @if($isLewat)
                                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                            @endif
                                            {{ $tenggat->translatedFormat('d M Y') }}
                                        </div>
                                        <div class="text-xs text-gray-500">{{ $tenggat->diffForHumans() }}</div>
                                    </td>
                                    
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if($payment->status_pembayaran === 'lunas')
                                            <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-700 border border-green-200">
                                                <svg class="w-4 h-4 mr-1 -ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                                Lunas
                                            </span>
                                        @else
                                            <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-amber-100 text-amber-700 border border-amber-200">
                                                <svg class="w-4 h-4 mr-1 -ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                                Belum Lunas
                                            </span>
                                        @endif
                                    </td>
                                    
                                    @if(auth()->user()->role === 'admin')
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            @if($payment->status_pembayaran === 'belum_lunas')
                                                <button class="text-indigo-600 hover:text-indigo-900 bg-indigo-50 hover:bg-indigo-100 px-3 py-1.5 rounded-md transition-colors">
                                                    Tandai Lunas
                                                </button>
                                            @else
                                                <span class="text-gray-400 italic">Selesai</span>
                                            @endif
                                        </td>
                                    @endif
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="{{ auth()->user()->role === 'admin' ? '5' : '4' }}" class="px-6 py-12 text-center">
                                        <svg class="mx-auto h-12 w-12 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                        <h3 class="mt-2 text-sm font-medium text-gray-900">Belum ada tagihan</h3>
                                        <p class="mt-1 text-sm text-gray-500">Saat ini tidak ada data tagihan kos yang tercatat.</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            
        </div>
    </div>
</x-app-layout>