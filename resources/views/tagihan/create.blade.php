<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-800 leading-tight">Buat Tagihan Baru</h2>
    </x-slot>

    <div class="py-8 max-w-2xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-2xl border border-gray-100 p-6">
            <form action="{{ route('tagihan.store') }}" method="POST" class="space-y-6">
                @csrf
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Pilih Penghuni</label>
                    <select name="user_id" required class="w-full rounded-xl border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 px-4 py-2 bg-gray-50">
                        <option value="" disabled selected>-- Pilih Anak Kos --</option>
                        @foreach($penghuni as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nominal Tagihan (Rp)</label>
                    <input type="number" name="jumlah_tagihan" required placeholder="Contoh: 1500000" class="w-full rounded-xl border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 px-4 py-2 bg-gray-50">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Tenggat Pembayaran</label>
                    <input type="date" name="tenggat_pembayaran" required class="w-full rounded-xl border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 px-4 py-2 bg-gray-50">
                </div>

                <div class="pt-4 flex justify-end gap-3 border-t border-gray-100">
                    <a href="{{ route('dashboard') }}" class="px-4 py-2 bg-white border border-gray-300 rounded-xl text-gray-700 hover:bg-gray-50 font-medium">Batal</a>
                    <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-xl hover:bg-indigo-700 font-medium">Buat Tagihan</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>