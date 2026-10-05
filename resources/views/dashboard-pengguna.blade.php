<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-800 leading-tight tracking-tight">
            Dasbor Saya
        </h2>
    </x-slot>

    <div class="py-8 max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        
        <!-- Banner Sapaan Khusus Pengguna -->
        <div class="bg-indigo-600 rounded-2xl shadow-lg p-6 md:p-8 text-white relative overflow-hidden">
            <div class="relative z-10">
                <h3 class="text-2xl font-bold mb-2">Halo, {{ explode(' ', auth()->user()->name)[0] }}! 👋</h3>
                <p class="text-indigo-100 max-w-xl text-sm md:text-base">
                    Selalu cek tenggat waktu pembayaran kos kamu di bawah ini ya. Pembayaran yang tepat waktu sangat membantu kelancaran fasilitas kos kita bersama.
                </p>
            </div>
            <!-- Dekorasi Estetik -->
            <div class="absolute -right-10 -bottom-10 w-48 h-48 bg-white opacity-10 rounded-full blur-2xl"></div>
            <div class="absolute right-20 -top-10 w-32 h-32 bg-white opacity-10 rounded-full blur-xl"></div>
        </div>

        <!-- Tabel Tagihan Pribadi -->
        <div class="bg-white overflow-hidden shadow-sm border border-gray-100 sm:rounded-2xl">
            <div class="px-6 py-5 border-b border-gray-100 bg-gray-50 flex items-center gap-2">
                <svg class="w-5 h-5 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                <h3 class="text-lg font-semibold text-gray-800">Riwayat Tagihan Kamu</h3>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-white">
                        <tr>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Nominal Tagihan</th>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Tenggat Waktu</th>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Status</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-100">
                        @forelse($payments as $payment)
                            <tr class="hover:bg-gray-50 transition-colors">
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
                                            Lunas
                                        </span>
                                    @else
                                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-amber-100 text-amber-700 border border-amber-200">
                                            Belum Lunas
                                        </span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="px-6 py-12 text-center">
                                    <h3 class="mt-2 text-sm font-medium text-gray-900">Hore! Belum ada tagihan</h3>
                                    <p class="mt-1 text-sm text-gray-500">Saat ini kamu tidak memiliki tanggungan biaya kos.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</x-app-layout>