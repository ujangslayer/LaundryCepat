<x-admin-layout>
    @if(session('success'))
    <div class="mb-6 p-4 bg-green-50 border border-green-200 text-green-700 rounded-xl text-sm font-semibold flex items-center gap-2">
        <i class="fa-solid fa-circle-check"></i>
        {{ session('success') }}
    </div>
    @endif

    <div class="mb-6">
        <a href="{{ route('admin.orders.index') }}" class="inline-flex items-center text-sm font-bold text-gray-500 hover:text-[#0A58CA] transition">
            <i class="fa-solid fa-arrow-left mr-2"></i> Kembali ke Daftar Pesanan
        </a>
    </div>

<div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-8">
        <div class="flex flex-wrap items-center gap-3">
            <h2 class="text-3xl font-extrabold text-gray-900">Pesanan #{{ $order->order_number }}</h2>
            
            @if($order->status === 'pending')
                <span class="bg-amber-50 text-amber-600 text-[10px] font-bold px-2.5 py-1 rounded-md uppercase tracking-wider">Menunggu Antrean</span>
            @elseif(in_array($order->status, ['picked_up', 'washing', 'ironing', 'ready']))
                <span class="bg-blue-50 text-blue-600 text-[10px] font-bold px-2.5 py-1 rounded-md uppercase tracking-wider">Sedang Diproses</span>
            @elseif($order->status === 'completed')
                <span class="bg-green-50 text-green-600 text-[10px] font-bold px-2.5 py-1 rounded-md uppercase tracking-wider">Selesai</span>
            @else
                <span class="bg-red-50 text-red-600 text-[10px] font-bold px-2.5 py-1 rounded-md uppercase tracking-wider">Dibatalkan</span>
            @endif

            @if($order->payment_status === 'paid')
                <span class="bg-green-50 text-green-600 text-[10px] font-bold px-2.5 py-1 rounded-md uppercase tracking-wider">Telah Dibayar</span>
            @else
                <span class="bg-red-50 text-red-600 text-[10px] font-bold px-2.5 py-1 rounded-md uppercase tracking-wider">Belum Dibayar</span>
            @endif
        </div>
    
        
        <div class="flex items-center gap-2">
            <a href="{{ route('admin.orders.print', $order->id) }}" target="_blank" class="bg-indigo-600 text-white px-5 py-2.5 rounded-xl text-sm font-bold shadow-sm hover:bg-indigo-700 transition flex items-center gap-2">
                <i class="fa-solid fa-print"></i> Cetak Struk
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="lg:col-span-2 space-y-6">
            <div class="bg-white rounded-3xl border border-gray-100 shadow-sm overflow-hidden">
                <div class="px-6 py-5 bg-gray-50/50 border-b border-gray-100 flex justify-between items-center">
                    <h3 class="text-sm font-black text-gray-900 uppercase tracking-wider">Item Layanan</h3>
                    <span class="text-xs font-bold text-gray-400">{{ $order->detail->count() }} Item</span>
                </div>
                <div class="divide-y divide-gray-100">
                    @foreach($order->detail as $item)
                    <div class="p-6 flex justify-between items-center gap-4">
                        <div>
                            <h4 class="text-sm font-bold text-gray-900 mb-0.5">{{ $item->layanan->name ?? 'Layanan' }}</h4>
                            <p class="text-xs text-gray-400">Harga unit: Rp {{ number_format($item->layanan->harga ?? 0, 0, ',', '.') }}</p>
                        </div>
                        <div class="text-right">
                            <p class="text-sm font-black text-gray-900">Rp {{ number_format($item->subtotal, 0, ',', '.') }}</p>
                            <p class="text-xs text-gray-500 font-medium">Qty: {{ $item->jumlah }} {{ $item->layanan->unit_type ?? 'kg' }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="p-6 bg-gray-50/50 border-t border-gray-100 flex justify-between items-center">
                    <span class="text-sm font-bold text-gray-500">Total Pembayaran</span>
                    <span class="text-xl font-black text-gray-900">Rp {{ number_format($order->total_harga, 0, ',', '.') }}</span>
                </div>
            </div>

            <div class="bg-white p-6 md:p-8 rounded-3xl border border-gray-100 shadow-sm">
                <h3 class="text-sm font-black text-gray-900 uppercase tracking-wider mb-6">Pembaruan Status</h3>
                
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <form action="{{ route('admin.orders.update_status', $order->id) }}" method="POST" class="space-y-2">
                        @csrf
                        @method('PUT')
                        <label class="block text-[10px] font-extrabold text-gray-400 uppercase tracking-widest">Status Progres Laundry</label>
                        <div class="flex gap-2">
                            <select name="status" class="flex-1 bg-gray-50 border border-gray-200 text-sm font-bold text-gray-700 rounded-xl px-4 py-3 outline-none focus:ring-2 focus:ring-blue-500 transition">
                                <option value="pending" {{ $order->status === 'pending' ? 'selected' : '' }}>MENUNGGU ANTREAN</option>
                                <option value="picked_up" {{ $order->status === 'picked_up' ? 'selected' : '' }}>DIJEMPUT / DITERIMA</option>
                                <option value="washing" {{ $order->status === 'washing' ? 'selected' : '' }}>SEDANG DICUCI</option>
                                <option value="ironing" {{ $order->status === 'ironing' ? 'selected' : '' }}>SEDANG DISETRIKA</option>
                                <option value="ready" {{ $order->status === 'ready' ? 'selected' : '' }}>SIAP DIAMBIL</option>
                                <option value="completed" {{ $order->status === 'completed' ? 'selected' : '' }}>SELESAI / DIAMBIL</option>
                                <option value="cancelled" {{ $order->status === 'cancelled' ? 'selected' : '' }}>DIBATALKAN</option>
                            </select>
                            <button type="submit" class="bg-[#0A58CA] text-white px-4 rounded-xl text-xs font-bold hover:bg-blue-700 transition">Update</button>
                        </div>
                    </form>

                    <form action="{{ route('admin.orders.update_payment', $order->id) }}" method="POST" class="space-y-2">
                        @csrf
                        @method('PUT')
                        <label class="block text-[10px] font-extrabold text-gray-400 uppercase tracking-widest">Verifikasi Status Pembayaran</label>
                        <div class="flex gap-2">
                            <select name="payment_status" class="flex-1 bg-gray-50 border border-gray-200 text-sm font-bold text-gray-700 rounded-xl px-4 py-3 outline-none focus:ring-2 focus:ring-blue-500 transition">
                                <option value="unpaid" {{ $order->payment_status === 'unpaid' ? 'selected' : '' }}>Belum dibayar</option>
                                <option value="paid" {{ $order->payment_status === 'paid' ? 'selected' : '' }}>Telah di bayar</option>
                            </select>
                            <button type="submit" class="bg-emerald-600 text-white px-4 rounded-xl text-xs font-bold hover:bg-emerald-700 transition">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="space-y-6">
            <div class="bg-white p-6 md:p-8 rounded-3xl border border-gray-100 shadow-sm">
                <h3 class="text-sm font-black text-gray-900 uppercase tracking-wider mb-6">Data Pelanggan</h3>
                <div class="flex items-center gap-4 mb-6">
                    <div class="w-12 h-12 rounded-2xl bg-blue-50 text-[#0A58CA] flex items-center justify-center font-black text-lg">
                        {{ substr($order->user->name ?? 'P', 0, 1) }}
                    </div>
                    <div>
                        <h4 class="text-base font-extrabold text-gray-900">{{ $order->user->name ?? 'Pelanggan Anonim' }}</h4>
                        <p class="text-xs text-gray-400 uppercase font-bold tracking-wide">{{ ucfirst($order->delivery_option) }}</p>
                    </div>
                </div>
                <div class="space-y-3 border-t border-gray-100 pt-4">
                    <div class="flex gap-3 text-sm">
                        <i class="fa-solid fa-phone text-gray-400 mt-1 w-5"></i>
                        <p class="text-gray-600">{{ $order->user->nomer_telepon ?? '-' }}</p>
                    </div>
                    <div class="flex gap-3 text-sm">
                        <i class="fa-solid fa-envelope text-gray-400 mt-1 w-5"></i>
                        <p class="text-gray-600">{{ $order->user->email ?? '-' }}</p>
                    </div>
                    <div class="flex gap-3 text-sm">
                        <i class="fa-solid fa-money-bill-wave text-gray-400 mt-1 w-5"></i>
                        <p class="text-gray-600">Metode: <span class="badge bg-gray-100 px-2 py-0.5 rounded text-xs uppercase font-bold">{{ $order->payment_method }}</span></p>
                    </div>
                    @if($order->waktu_pengambilan)
                    <div class="flex gap-3 text-sm">
                        <i class="fa-solid fa-calendar-days text-gray-400 mt-1 w-5"></i>
                        <p class="text-gray-600">Jadwal Pengambilan: <br><span class="font-bold text-gray-800">{{ $order->waktu_pengambilan }}</span></p>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>