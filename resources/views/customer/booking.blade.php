<x-app-layout>
    <div class="max-w-4xl mx-auto mb-10 pt-4">
        <h1 class="text-4xl font-extrabold text-gray-900 mb-3">Jadwalkan Layanan</h1>
        <p class="text-gray-500 text-lg max-w-2xl leading-relaxed">
            Sesuaikan pengalaman laundry Anda. Pilih layanan, tentukan pengantaran, dan biarkan kami mengurus sisanya.
        </p>
    </div>

    @if (session('error'))
        <div class="max-w-4xl mx-auto mb-6 bg-red-50 border border-red-200 text-red-600 text-sm rounded-xl p-4">
            <i class="fa-solid fa-circle-exclamation mr-2"></i>{{ session('error') }}
        </div>
    @endif

    <form action="{{ route('customer.booking.store') }}" method="POST" class="max-w-4xl mx-auto bg-white rounded-[2rem] p-8 md:p-12 shadow-sm border border-gray-100">
        @csrf
        
        <div class="mb-12">
            <div class="flex items-center gap-4 mb-6">
                <div class="w-8 h-8 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center font-bold text-sm shrink-0">1</div>
                <h2 class="text-xl font-bold text-gray-900">Pilih Layanan</h2>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 pl-0 md:pl-12">
                @foreach($services as $index => $service)
                <div class="border border-gray-200 rounded-2xl p-5 hover:border-blue-400 transition bg-gray-50/50">
                    <input type="hidden" name="layanan[{{ $index }}][id]" value="{{ $service->id }}">
                    <div class="flex justify-between items-start mb-4">
                        <div>
                            <h4 class="font-bold text-gray-900">{{ $service->name }}</h4>
                            <p class="text-xs text-gray-500 font-medium">Rp {{ number_format($service->harga, 0, ',', '.') }} / {{ $service->unit_type }}</p>
                        </div>
                        <i class="fa-solid fa-shirt text-gray-300 text-xl"></i>
                    </div>
                    <div>
                        <label class="text-[10px] uppercase font-bold text-gray-400 tracking-wider mb-1 block">Jumlah ({{ $service->unit_type }})</label>
                        <input type="number" name="layanan[{{ $index }}][qty]" min="0" step="0.1" placeholder="0" class="w-full border-gray-200 rounded-xl focus:ring-blue-500 focus:border-blue-500 text-sm">
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <div class="mb-12">
            <div class="flex items-center gap-4 mb-6">
                <div class="w-8 h-8 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center font-bold text-sm shrink-0">2</div>
                <h2 class="text-xl font-bold text-gray-900">Opsi Pengantaran</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 pl-0 md:pl-12 mb-6">
                <label class="cursor-pointer">
                    <input type="radio" name="delivery_option" value="dropoff" class="peer sr-only" checked onchange="togglePickupTime(false)">
                    <div class="border border-gray-200 rounded-2xl p-5 peer-checked:border-blue-600 peer-checked:bg-blue-50 transition">
                        <h4 class="font-bold text-gray-900 mb-1">Antar Sendiri (Dropoff)</h4>
                        <p class="text-xs text-gray-500">Anda mengantar pakaian langsung ke outlet kami.</p>
                    </div>
                </label>
                <label class="cursor-pointer">
                    <input type="radio" name="delivery_option" value="pickup" class="peer sr-only" onchange="togglePickupTime(true)">
                    <div class="border border-gray-200 rounded-2xl p-5 peer-checked:border-blue-600 peer-checked:bg-blue-50 transition">
                        <h4 class="font-bold text-gray-900 mb-1">Jemput Kurir (Pickup)</h4>
                        <p class="text-xs text-gray-500">Kurir kami akan menjemput pakaian ke alamat Anda.</p>
                    </div>
                </label>
            </div>

            <div id="pickupTimeContainer" class="hidden pl-0 md:pl-12">
                <label class="text-xs font-bold text-gray-700 mb-2 block">Pilih Waktu Penjemputan</label>
                <input type="datetime-local" name="waktu_pengambilan" class="w-full md:w-1/2 border-gray-200 rounded-xl focus:ring-blue-500 text-sm">
            </div>
        </div>

        <div class="mb-12">
            <div class="flex items-center gap-4 mb-6">
                <div class="w-8 h-8 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center font-bold text-sm shrink-0">3</div>
                <h2 class="text-xl font-bold text-gray-900">Metode Pembayaran</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 pl-0 md:pl-12">
                <label class="cursor-pointer">
                    <input type="radio" name="payment_method" value="cod" class="peer sr-only" checked>
                    <div class="border border-gray-200 rounded-2xl p-5 peer-checked:border-blue-600 peer-checked:bg-blue-50 transition">
                        <h4 class="font-bold text-gray-900 mb-1">Bayar Tunai (COD)</h4>
                        <p class="text-xs text-gray-500">Bayar saat pakaian dijemput atau diambil.</p>
                    </div>
                </label>
                <label class="cursor-pointer">
                    <input type="radio" name="payment_method" value="transfer" class="peer sr-only">
                    <div class="border border-gray-200 rounded-2xl p-5 peer-checked:border-blue-600 peer-checked:bg-blue-50 transition">
                        <h4 class="font-bold text-gray-900 mb-1">Transfer Bank</h4>
                        <p class="text-xs text-gray-500">Bayar via transfer (Bank/E-wallet).</p>
                    </div>
                </label>
            </div>
        </div>

        <div class="flex justify-end gap-4 border-t border-gray-100 pt-8 pl-0 md:pl-12">
            <a href="{{ route('customer.dashboard') }}" class="text-gray-500 font-semibold text-sm hover:text-gray-800 transition py-3">Batal</a>
            <button type="submit" class="bg-[#0A58CA] text-white px-8 py-3 rounded-xl font-bold shadow-lg shadow-blue-500/30 hover:bg-blue-700 transition">
                Buat Pesanan Sekarang
            </button>
        </div>
    </form>

    <script>
        function togglePickupTime(show) {
            const container = document.getElementById('pickupTimeContainer');
            if(show) {
                container.classList.remove('hidden');
            } else {
                container.classList.add('hidden');
            }
        }
    </script>
</x-app-layout>