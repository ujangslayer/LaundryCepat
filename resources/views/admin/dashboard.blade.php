<x-admin-layout>
    
    <div class="mb-8">
        <h2 class="text-2xl font-extrabold text-gray-900 mb-1">Ringkasan Hari Ini</h2>
        <p class="text-sm text-gray-500">Pantau aktivitas dan pendapatan laundry Anda secara real-time.</p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
        <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-[0_4px_20px_-5px_rgba(0,0,0,0.02)]">
            <div class="flex justify-between items-start mb-4">
                <div class="w-12 h-12 rounded-xl bg-green-50 text-green-600 flex items-center justify-center">
                    <i class="fa-solid fa-money-bill-wave text-xl"></i>
                </div>
                </div>
            <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-1">Pendapatan Hari Ini</p>
            <h3 class="text-2xl font-extrabold text-gray-900">Rp {{ number_format($todayRevenue, 0, ',', '.') }}</h3>
        </div>

        <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-[0_4px_20px_-5px_rgba(0,0,0,0.02)]">
            <div class="flex justify-between items-start mb-4">
                <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center">
                    <i class="fa-solid fa-wallet text-xl"></i>
                </div>
            </div>
            <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-1">Pendapatan Bulan Ini</p>
            <h3 class="text-2xl font-extrabold text-gray-900">Rp {{ number_format($monthRevenue, 0, ',', '.') }}</h3>
        </div>

        <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-[0_4px_20px_-5px_rgba(0,0,0,0.02)]">
            <div class="flex justify-between items-start mb-4">
                <div class="w-12 h-12 rounded-xl bg-orange-50 text-orange-600 flex items-center justify-center">
                    <i class="fa-solid fa-basket-shopping text-xl"></i>
                </div>
                @if($pendingOrders > 0)
                <span class="bg-orange-100 text-orange-700 text-[10px] font-bold px-2 py-1 rounded-md">
                    {{ $pendingOrders }} Perlu Diproses
                </span>
                @endif
            </div>
            <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-1">Pesanan Aktif</p>
            <h3 class="text-2xl font-extrabold text-gray-900">{{ $activeOrders }}</h3>
        </div>

        <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-[0_4px_20px_-5px_rgba(0,0,0,0.02)]">
            <div class="flex justify-between items-start mb-4">
                <div class="w-12 h-12 rounded-xl bg-purple-50 text-purple-600 flex items-center justify-center">
                    <i class="fa-solid fa-users text-xl"></i>
                </div>
                @if($newCustomersToday > 0)
                <span class="bg-purple-100 text-purple-700 text-[10px] font-bold px-2 py-1 rounded-md flex items-center gap-1">
                    <i class="fa-solid fa-plus"></i> {{ $newCustomersToday }} Baru
                </span>
                @endif
            </div>
            <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-1">Total Pelanggan</p>
            <h3 class="text-2xl font-extrabold text-gray-900">{{ $totalCustomers }}</h3>
        </div>
    </div>

    <div class="bg-white rounded-3xl border border-gray-100 shadow-[0_4px_20px_-5px_rgba(0,0,0,0.02)] overflow-hidden">
        <div class="p-6 md:p-8 border-b border-gray-100 flex justify-between items-center">
            <h3 class="text-lg font-bold text-gray-900">Pesanan Terbaru</h3>
            <a href="{{ route('admin.orders.index') }}" class="text-sm font-semibold text-[#0A58CA] hover:text-blue-800 transition">Lihat Semua</a>
        </div>
        
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50/50">
                        <th class="px-6 md:px-8 py-4 text-[11px] font-extrabold text-gray-400 uppercase tracking-wider">ID Pesanan</th>
                        <th class="px-6 md:px-8 py-4 text-[11px] font-extrabold text-gray-400 uppercase tracking-wider">Pelanggan</th>
                        <th class="px-6 md:px-8 py-4 text-[11px] font-extrabold text-gray-400 uppercase tracking-wider">Layanan</th>
                        <th class="px-6 md:px-8 py-4 text-[11px] font-extrabold text-gray-400 uppercase tracking-wider">Status</th>
                        <th class="px-6 md:px-8 py-4 text-[11px] font-extrabold text-gray-400 uppercase tracking-wider">Total</th>
                        <th class="px-6 md:px-8 py-4 text-[11px] font-extrabold text-gray-400 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($recentOrders as $order)
                    <tr class="hover:bg-gray-50/50 transition">
                        <td class="px-6 md:px-8 py-4 text-sm font-bold text-gray-900">#{{ $order->order_number }}</td>
                        <td class="px-6 md:px-8 py-4">
                            <p class="text-sm font-semibold text-gray-900">{{ $order->user->name ?? 'Pelanggan' }}</p>
                            <p class="text-xs text-gray-500">{{ $order->user->email ?? '-' }}</p>
                        </td>
                        <td class="px-6 md:px-8 py-4 text-sm text-gray-600 font-medium">
                            {{ $order->detail->first()->layanan->name ?? 'Layanan' }}
                        </td>
                        <td class="px-6 md:px-8 py-4">
                            @if($order->status === 'pending')
                                <span class="bg-[#FFF0ED] text-[#FF5A36] text-[10px] font-bold px-2.5 py-1 rounded-md uppercase tracking-wider">Menunggu</span>
                            @elseif(in_array($order->status, ['picked_up', 'washing', 'ironing']))
                                <span class="bg-blue-50 text-blue-600 text-[10px] font-bold px-2.5 py-1 rounded-md uppercase tracking-wider">Proses</span>
                            @elseif($order->status === 'ready')
                                <span class="bg-indigo-50 text-indigo-600 text-[10px] font-bold px-2.5 py-1 rounded-md uppercase tracking-wider">Siap</span>
                            @elseif($order->status === 'completed')
                                <span class="bg-green-50 text-green-600 text-[10px] font-bold px-2.5 py-1 rounded-md uppercase tracking-wider">Selesai</span>
                            @else
                                <span class="bg-red-50 text-red-600 text-[10px] font-bold px-2.5 py-1 rounded-md uppercase tracking-wider">Batal</span>
                            @endif
                        </td>
                        <td class="px-6 md:px-8 py-4 text-sm font-bold text-gray-900">Rp {{ number_format($order->total_harga, 0, ',', '.') }}</td>
                        <td class="px-6 md:px-8 py-4">
                            <a href="{{ route('admin.orders.show', $order->id) }}" class="inline-block bg-[#EBF3FF] text-[#0A58CA] hover:bg-blue-100 px-3 py-1.5 rounded-lg text-xs font-semibold transition">
                                Proses
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 md:px-8 py-8 text-center text-gray-500 text-sm font-medium">
                            Belum ada pesanan terbaru hari ini.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</x-admin-layout>