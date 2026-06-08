<x-app-layout>
    @php
        // Logika pemetaan status database ke 5 tahapan desain Anda
        $statusIndex = 0;
        $statusAsli = strtolower($order->status);

        if (in_array($statusAsli, ['pending', 'picked_up'])) {
            $statusIndex = 0;
        } elseif ($statusAsli == 'washing') {
            $statusIndex = 1;
        } elseif ($statusAsli == 'ironing') {
            $statusIndex = 2; 
        } elseif ($statusAsli == 'ready') {
            $statusIndex = 3;
        } elseif ($statusAsli == 'completed') {
            $statusIndex = 4;
        }
        
        $progressWidth = $statusIndex * 25;
        
        // Hitung total kuantitas (berat/jumlah) dari semua item di pesanan ini
        $totalQty = $order->detail->sum('quantity');
        $mainService = $order->detail->first()->layanan->name ?? 'Layanan Laundry';
        $unitType = $order->detail->first()->layanan->unit_type ?? 'Kg';
    @endphp

    <div class="max-w-6xl mx-auto mb-8 pt-4 px-4 xl:px-0">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-4">
            <div>
                <h1 class="text-3xl font-extrabold text-[#0B214A] mb-2">Detail & Lacak Pesanan</h1>
                <p class="text-gray-500 text-sm font-medium">Pantau status pesanan laundry Anda secara real-time di sini.</p>
            </div>
            <div>
                <a href="{{ route('customer.history') }}" class="inline-flex items-center gap-2 bg-gray-100 hover:bg-gray-200 text-gray-700 px-5 py-2.5 rounded-xl text-sm font-semibold transition">
                    <i class="fa-solid fa-arrow-left"></i> Kembali ke Riwayat
                </a>
            </div>
        </div>
        
        <div class="flex items-center gap-3">
            <span class="text-gray-500 text-sm font-medium">ID Pesanan <span class="font-bold text-gray-700">#{{ $order->order_number }}</span></span>
            @if($statusAsli === 'completed')
                <span class="bg-green-50 text-green-600 text-[11px] font-bold px-3 py-1 rounded-full flex items-center gap-1.5 uppercase tracking-wider">
                    <i class="fa-solid fa-circle text-[8px]"></i> Selesai
                </span>
            @elseif($statusAsli === 'cancelled')
                <span class="bg-red-50 text-red-500 text-[11px] font-bold px-3 py-1 rounded-full flex items-center gap-1.5 uppercase tracking-wider">
                    <i class="fa-solid fa-circle text-[8px]"></i> Dibatalkan
                </span>
            @else
                <span class="bg-[#F0F5FF] text-blue-600 text-[11px] font-bold px-3 py-1 rounded-full flex items-center gap-1.5 uppercase tracking-wider">
                    <div class="w-1.5 h-1.5 rounded-full bg-blue-600 animate-pulse"></div> Aktif Diproses
                </span>
            @endif
        </div>
    </div>

    <div class="max-w-6xl mx-auto grid grid-cols-1 lg:grid-cols-3 gap-6 md:gap-8 px-4 xl:px-0 mb-12">
        
        <div class="lg:col-span-2 flex flex-col gap-6 md:gap-8">
            
            <div class="bg-white rounded-[2rem] p-6 md:p-10 border border-gray-100 shadow-[0_4px_20px_-5px_rgba(6,81,237,0.05)]">
                <h3 class="text-lg font-bold text-gray-900 mb-8 flex items-center gap-2.5">
                    <i class="fa-solid fa-route text-blue-600"></i> Status Pengerjaan
                </h3>
                
                @if($statusAsli === 'cancelled')
                    <div class="bg-red-50 border border-red-100 rounded-2xl p-5 text-center">
                        <i class="fa-solid fa-circle-xmark text-4xl text-red-500 mb-3"></i>
                        <h4 class="font-bold text-red-900 mb-1">Pesanan Dibatalkan</h4>
                        <p class="text-sm text-red-600">Maaf, pesanan ini telah dibatalkan dan tidak diproses lebih lanjut.</p>
                    </div>
                @else
                    <div class="hidden md:block relative mb-12 px-4">
                        <div class="absolute top-1/2 left-0 w-full h-1 bg-gray-100 -translate-y-1/2 rounded-full"></div>
                        <div class="absolute top-1/2 left-0 h-1 bg-[#0A58CA] -translate-y-1/2 rounded-full transition-all duration-500" style="width: {{ $progressWidth }}%;"></div>
                        
                        <div class="relative flex justify-between">
                            @foreach(['Pesanan Diterima', 'Sedang Dicuci', 'Sedang Disetrika', 'Siap Diambil', 'Selesai'] as $index => $label)
                                <div class="flex flex-col items-center">
                                    <div class="w-8 h-8 rounded-full flex items-center justify-center font-bold text-xs border-4 transition-all duration-300 {{ $statusIndex >= $index ? 'bg-[#0A58CA] border-blue-100 text-white shadow-md' : 'bg-white border-gray-100 text-gray-400' }}">
                                        @if($statusIndex > $index)
                                            <i class="fa-solid fa-check text-[10px]"></i>
                                        @else
                                            {{ $index + 1 }}
                                        @endif
                                    </div>
                                    <span class="text-[11px] font-bold mt-3 {{ $statusIndex >= $index ? 'text-gray-900' : 'text-gray-400' }}">{{ $label }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="md:hidden flex flex-col gap-6 relative before:absolute before:top-2 before:left-[15px] before:w-0.5 before:h-[calc(100%-16px)] before:bg-gray-100">
                        <div class="absolute top-2 left-[15px] w-0.5 bg-[#0A58CA] transition-all duration-500" style="height: calc({{ $statusIndex }} * 25%);"></div>
                        
                        @foreach(['Pesanan Diterima', 'Sedang Dicuci', 'Mengeringkan/Setrika', 'Siap Diambil', 'Selesai'] as $index => $label)
                            <div class="flex items-center gap-4 relative">
                                <div class="w-8 h-8 rounded-full flex items-center justify-center font-bold text-xs border-4 z-10 shrink-0 transition-all duration-300 {{ $statusIndex >= $index ? 'bg-[#0A58CA] border-blue-100 text-white shadow-md' : 'bg-white border-gray-100 text-gray-400' }}">
                                    @if($statusIndex > $index)
                                        <i class="fa-solid fa-check text-[10px]"></i>
                                    @else
                                        {{ $index + 1 }}
                                    @endif
                                </div>
                                <span class="text-xs font-bold {{ $statusIndex >= $index ? 'text-gray-900' : 'text-gray-400' }}">{{ $label }}</span>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>

            <div class="bg-white rounded-[2rem] p-6 md:p-10 border border-gray-100 shadow-[0_4px_20px_-5px_rgba(6,81,237,0.05)]">
                <h3 class="text-lg font-bold text-gray-900 mb-6 flex items-center gap-2.5">
                    <i class="fa-solid fa-circle-info text-blue-600"></i> Rincian Pakaian
                </h3>
                
                <div class="flex flex-col gap-4">
                    @foreach($order->detail as $detail)
                        <div class="flex items-center justify-between p-4 bg-gray-50 rounded-2xl border border-gray-100">
                            <div class="flex items-center gap-4">
                                <div class="w-10 h-10 rounded-xl bg-blue-100 text-blue-600 flex items-center justify-center text-sm">
                                    <i class="fa-solid fa-shirt"></i>
                                </div>
                                <div>
                                    <h4 class="font-bold text-gray-900 text-sm">{{ $detail->layanan?->name ?? 'Layanan Laundry' }}</h4>
                                    <p class="text-[11px] text-gray-400 mt-0.5 font-medium">{{ $detail->quantity }} {{ $detail->layanan?->unit_type ?? 'Kg' }} x Rp {{ number_format($detail->harga_per_unit, 0, ',', '.') }}</p>
                                </div>
                            </div>
                            <span class="font-bold text-gray-900 text-sm">Rp {{ number_format($detail->subtotal, 0, ',', '.') }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="flex flex-col gap-6 md:gap-8">
            <div class="bg-white rounded-[2rem] p-6 md:p-8 border border-gray-100 shadow-[0_4px_20px_-5px_rgba(6,81,237,0.05)] flex flex-col h-full">
                <h3 class="text-lg font-bold text-gray-900 mb-6 flex items-center gap-2.5">
                    <i class="fa-solid fa-credit-card text-blue-600"></i> Ringkasan Pembayaran
                </h3>

                <div class="flex flex-col gap-4 mb-6">
                    <div class="flex justify-between items-center text-sm">
                        <span class="text-gray-400 font-medium">Metode Pembayaran</span>
                        <span class="font-bold text-gray-700 uppercase">{{ $order->payment_method }}</span>
                    </div>
                    <div class="flex justify-between items-center text-sm">
                        <span class="text-gray-400 font-medium">Status Pembayaran</span>
                        @if($order->payment_status === 'paid')
                            <span class="text-green-600 font-bold bg-green-50 px-2 py-1 rounded text-xs">Lunas</span>
                        @elseif($order->payment_status === 'pending_verification')
                            <span class="text-orange-500 font-bold bg-orange-50 px-2 py-1 rounded text-xs">Menunggu Verifikasi</span>
                        @else
                            <span class="text-red-500 font-bold bg-red-50 px-2 py-1 rounded text-xs">Belum Bayar</span>
                        @endif
                    </div>
                    <div class="flex justify-between items-center text-sm">
                        <span class="text-gray-400 font-medium">Opsi Penyerahan</span>
                        <span class="font-bold text-gray-700 uppercase">{{ $order->delivery_option }}</span>
                    </div>
                </div>

                <div class="border-t border-dashed border-gray-200 pt-6 mb-8 flex justify-between items-center">
                    <span class="font-bold text-gray-900">Total Pembayaran</span>
                    <span class="text-xl font-extrabold text-[#0A58CA]">Rp {{ number_format($order->total_harga, 0, ',', '.') }}</span>
                </div>

                <div class="flex flex-col gap-3 mt-auto">
                  @if($statusAsli === 'completed')
                        <a href="{{ route('customer.reviews', ['pesanan_id' => $order->id]) }}" class=\"w-full text-center bg-amber-500 hover:bg-amber-600 text-white py-3.5 rounded-xl font-bold text-sm transition shadow-[0_4px_14px_0_rgba(245,158,11,0.4)]\">
                            <i class="fa-solid fa-star mr-1"></i> Beri Ulasan Sekarang
                        </a>
                    @elseif($order->payment_status === 'unpaid' && $order->payment_method === 'transfer')
                    
                        <button id="pay-button" class="w-full bg-[#0A58CA] hover:bg-blue-800 text-white py-3.5 rounded-xl font-semibold text-sm transition shadow-[0_4px_14px_0_rgba(10,88,202,0.39)] flex items-center justify-center gap-2">
                            <i class="fa-solid fa-wallet"></i> Bayar Sekarang
                        </button>

                        <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
                        
                        <script type="text/javascript">
                            document.getElementById('pay-button').onclick = function () {
                                // Panggil widget Snap menggunakan token yang dikirim dari controller
                                snap.pay('{{ $order->snap_token }}', {
                                    onSuccess: function(result){
                                        // Muat ulang halaman agar status pembayaran berubah (jika webhook sudah aktif)
                                        window.location.reload();
                                    },
                                    onPending: function(result){
                                        window.location.reload();
                                    },
                                    onError: function(result){
                                        alert("Terjadi kesalahan pada sistem pembayaran.");
                                        console.log(result);
                                    },
                                    onClose: function(){
                                        console.log('Pelanggan menutup pop-up sebelum menyelesaikan transaksi');
                                    }
                                });
                            };
                        </script>
                    @else
                        <button disabled class="w-full bg-gray-100 text-gray-400 py-3.5 rounded-xl font-semibold text-sm cursor-not-allowed">
                            Pembayaran Berhasil / COD
                        </button>
                    @endif
                </div>
            </div>
        </div>

    </div>
</x-app-layout>