<x-app-layout>
    <div class="max-w-5xl mx-auto py-8 px-4 xl:px-0">
        
        <div class="bg-gray-100 rounded-[2rem] p-8 md:p-10 mb-8">
            <h1 class="text-3xl font-extrabold text-gray-900 mb-3">Riwayat Pesanan</h1>
            <p class="text-gray-500 text-sm md:text-base max-w-xl">
                Pantau semua layanan laundry Anda di sini. Dari pesanan terbaru hingga yang sudah selesai.
            </p>
        </div>

        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
            <div class="flex flex-wrap items-center gap-2 md:gap-3" id="filter-buttons">
                <button onclick="filterOrders('semua')" id="btn-semua" class="filter-btn bg-[#0A58CA] text-white px-5 py-2.5 rounded-full text-sm font-semibold shadow-md flex items-center gap-2 transition hover:bg-blue-800">
                    <i class="fa-solid fa-layer-group"></i> Semua
                </button>
                <button onclick="filterOrders('diproses')" id="btn-diproses" class="filter-btn bg-[#EBF3FF] text-blue-700 px-5 py-2.5 rounded-full text-sm font-semibold flex items-center gap-2 transition hover:bg-blue-100">
                    <i class="fa-solid fa-clock-rotate-left"></i> Diproses
                </button>
                <button onclick="filterOrders('selesai')" id="btn-selesai" class="filter-btn bg-gray-100 text-gray-600 px-5 py-2.5 rounded-full text-sm font-semibold flex items-center gap-2 transition hover:bg-gray-200">
                    <i class="fa-solid fa-check-double"></i> Selesai
                </button>
            </div>
        </div>

        <div class="flex flex-col gap-6" id="orders-container">
            @forelse($orders as $order)
                @php
                    // Ambil status asli dari database
                    $statusAsli = strtolower($order->status);
                    
                    if ($statusAsli === 'completed') {
                        $kategori = 'selesai';
                        $statusText = 'Selesai';
                    } elseif ($statusAsli === 'cancelled') {
                        $kategori = 'dibatalkan';
                        $statusText = 'Dibatalkan';
                    } else {
                        // Jika status berupa: pending, picked_up, washing, ironing, atau ready
                        $kategori = 'diproses';
                        $statusText = 'Sedang Diproses';
                    }

                    // Ambil nama layanan utama
                    $mainService = $order->detail->first()->layanan?->name ?? 'Layanan Laundry';
                    $totalQty = $order->detail->sum('quantity');
                    $unitType = $order->detail->first()->layanan?->unit_type ?? 'Kg';
                @endphp

                <div class="order-card bg-white rounded-[2rem] p-6 md:p-8 border border-gray-100 transition-all duration-300 {{ $kategori == 'diproses' ? 'shadow-[0_4px_20px_-5px_rgba(6,81,237,0.05)]' : 'shadow-[0_4px_20px_-5px_rgba(0,0,0,0.02)]' }} relative overflow-hidden" data-category="{{ $kategori }}">
                    
                    @if($kategori == 'diproses')
                        <div class="absolute top-0 right-0 w-64 h-64 bg-[#F8FAFC] rounded-bl-[100px] -z-10"></div>
                    @endif

                    <div class="flex justify-between items-start mb-4">
                        @if($kategori == 'diproses')
                            <span class="bg-[#EBF3FF] text-[#0A58CA] text-[10px] font-extrabold px-3 py-1.5 rounded-md uppercase tracking-wider">{{ $statusText }}</span>
                        @elseif($kategori == 'selesai')
                            <span class="bg-green-50 text-green-600 text-[10px] font-extrabold px-3 py-1.5 rounded-md uppercase tracking-wider">{{ $statusText }}</span>
                        @else
                            <span class="bg-red-50 text-red-500 text-[10px] font-extrabold px-3 py-1.5 rounded-md uppercase tracking-wider">{{ $statusText }}</span>
                        @endif
                        
                        <span class="text-sm font-medium text-gray-500">ID: #{{ $order->order_number }}</span>
                    </div>

                    <div class="mb-6">
                        <h2 class="text-xl font-bold {{ $kategori == 'dibatalkan' ? 'text-gray-500' : 'text-gray-900' }} mb-1">{{ $mainService }}</h2>
                        <p class="text-sm text-gray-400">
                            {{ $kategori == 'selesai' ? 'Selesai: ' : ($kategori == 'dibatalkan' ? 'Dibatalkan: ' : 'Diterima: ') }}
                            {{ \Carbon\Carbon::parse($order->created_at)->format('d M Y, H:i') }} WIB
                        </p>
                    </div>

                    <div class="flex flex-col md:flex-row gap-4 mb-6">
                        <div class="flex-1 bg-gray-50 rounded-2xl p-4">
                            <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-1">Kuantitas</p>
                            <p class="text-base font-bold text-gray-900">{{ $totalQty }} {{ $unitType }}</p>
                        </div>
                        <div class="flex-1 bg-gray-50 rounded-2xl p-4">
                            <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-1">Total Biaya</p>
                            <p class="text-base font-bold {{ $kategori == 'diproses' ? 'text-[#0A58CA]' : 'text-gray-900' }}">Rp {{ number_format($order->total_harga, 0, ',', '.') }}</p>
                        </div>
                    </div>

                    <div class="flex flex-wrap items-center gap-3">
                        
                        <a href="{{ route('customer.tracking', $order->id) }}" class="bg-[#0A58CA] hover:bg-blue-800 text-white shadow-md px-6 py-2.5 rounded-xl text-sm font-semibold transition inline-block">
                            Lihat Detail
                        </a>


                        @if($kategori == 'selesai' || $kategori == 'dibatalkan')
                            <a href="{{ route('customer.booking') }}" class="bg-gray-100 text-gray-700 hover:bg-gray-200 px-6 py-2.5 rounded-xl text-sm font-semibold flex items-center gap-2 transition">
                                <i class="fa-solid fa-rotate-right"></i> Pesan Lagi
                            </a>
                        @endif
                        
                    </div>
                </div>
            @empty
                <div class="bg-white rounded-[2rem] p-12 border border-gray-100 text-center">
                    <i class="fa-solid fa-receipt text-5xl text-gray-300 mb-4"></i>
                    <h2 class="text-xl font-bold text-gray-900 mb-2">Belum ada riwayat pesanan</h2>
                    <p class="text-gray-500 mb-6">Anda belum pernah melakukan pemesanan layanan laundry.</p>
                    <a href="{{ route('customer.booking') }}" class="bg-[#0A58CA] text-white px-6 py-3 rounded-xl text-sm font-semibold transition hover:bg-blue-800 inline-block shadow-md">
                        Buat Pesanan Pertama
                    </a>
                </div>
            @endforelse
        </div>
    </div>

    <script>
        function filterOrders(status) {
            const cards = document.querySelectorAll('.order-card');
            const buttons = document.querySelectorAll('.filter-btn');

            buttons.forEach(btn => {
                btn.className = "filter-btn bg-gray-100 text-gray-600 px-5 py-2.5 rounded-full text-sm font-semibold flex items-center gap-2 transition hover:bg-gray-200";
            });

            const activeBtn = document.getElementById('btn-' + status);
            if(activeBtn) {
                activeBtn.className = "filter-btn bg-[#0A58CA] text-white px-5 py-2.5 rounded-full text-sm font-semibold shadow-md flex items-center gap-2 transition hover:bg-blue-800";
            }

            cards.forEach(card => {
                const kategori = card.getAttribute('data-category');
                if (status === 'semua' || status === kategori) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        }
    </script>
</x-app-layout>