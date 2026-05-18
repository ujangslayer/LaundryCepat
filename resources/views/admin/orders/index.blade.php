<x-admin-layout>
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
        <div>
            <h2 class="text-2xl font-extrabold text-gray-900 mb-1">Kelola Pesanan</h2>
            <p class="text-sm text-gray-500">Pantau dan kelola semua antrean pesanan masuk.</p>
        </div>
        <div class="flex items-center gap-3">
            <a href="{{ route('admin.orders.export') }}" class="bg-white border border-gray-200 text-gray-600 px-4 py-2.5 rounded-xl text-sm font-bold hover:bg-gray-50 transition inline-flex items-center">
                <i class="fa-solid fa-file-export mr-2"></i>Export CSV
            </a>
        </div>
    </div>

    <div class="bg-white p-4 rounded-2xl border border-gray-100 shadow-sm mb-6 flex flex-wrap gap-4 items-center justify-between">
        <div class="flex items-center gap-4">
            <select class="bg-gray-50 border-none text-sm font-semibold text-gray-700 rounded-lg px-4 py-2 outline-none">
                <option>Semua Status</option>
                <option>Menunggu</option>
                <option>Proses</option>
                <option>Selesai</option>
            </select>
        </div>
        <div class="flex items-center bg-gray-50 px-4 py-2 rounded-lg border border-transparent focus-within:border-gray-200 transition">
            <i class="fa-solid fa-magnifying-glass text-gray-400 mr-2 text-sm"></i>
            <input type="text" placeholder="Cari nomor order / nama..." class="bg-transparent border-none text-sm outline-none w-48 md:w-64 p-0 focus:ring-0 text-gray-700 font-medium">
        </div>
    </div>

    <div class="bg-white rounded-3xl border border-gray-100 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50/70 border-b border-gray-100">
                        <th class="px-8 py-4 text-xs font-bold text-gray-400 uppercase tracking-wider">No. Order</th>
                        <th class="px-8 py-4 text-xs font-bold text-gray-400 uppercase tracking-wider">Pelanggan</th>
                        <th class="px-8 py-4 text-xs font-bold text-gray-400 uppercase tracking-wider">Status Progres</th>
                        <th class="px-8 py-4 text-xs font-bold text-gray-400 uppercase tracking-wider">Pembayaran</th>
                        <th class="px-8 py-4 text-xs font-bold text-gray-400 uppercase tracking-wider">Total</th>
                        <th class="px-8 py-4 text-xs font-bold text-gray-400 uppercase tracking-wider text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($orders as $order)
                    <tr class="hover:bg-gray-50/50 transition">
                        <td class="px-8 py-5 text-sm font-bold text-gray-900">#{{ $order->order_number }}</td>
                        <td class="px-8 py-5">
                            <p class="text-sm font-bold text-gray-900">{{ $order->user->name ?? 'Pelanggan' }}</p>
                            <p class="text-xs text-gray-400">{{ $order->user->email ?? '-' }}</p>
                        </td>
                        <td class="px-8 py-5">
                            @if($order->status === 'pending')
                                <span class="bg-amber-50 text-amber-600 text-[10px] font-bold px-2.5 py-1 rounded-md uppercase tracking-wider">Menunggu Antrean</span>
                            @elseif(in_array($order->status, ['picked_up', 'washing', 'ironing', 'ready']))
                                <span class="bg-blue-50 text-blue-600 text-[10px] font-bold px-2.5 py-1 rounded-md uppercase tracking-wider">Sedang Diproses</span>
                            @elseif($order->status === 'completed')
                                <span class="bg-green-50 text-green-600 text-[10px] font-bold px-2.5 py-1 rounded-md uppercase tracking-wider">Selesai</span>
                            @else
                                <span class="bg-red-50 text-red-600 text-[10px] font-bold px-2.5 py-1 rounded-md uppercase tracking-wider">Dibatalkan</span>
                            @endif
                        </td>
                        <td class="px-8 py-5">
                            @if($order->payment_status === 'paid')
                                <span class="bg-green-50 text-green-600 text-[10px] font-bold px-2.5 py-1 rounded-md uppercase tracking-wider">Selesai</span>
                            @else
                                <span class="bg-red-50 text-red-600 text-[10px] font-bold px-2.5 py-1 rounded-md uppercase tracking-wider">Dibatalkan</span>
                            @endif
                        </td>
                        <td class="px-8 py-5 text-sm font-bold text-gray-900">
                            Rp {{ number_format($order->total_harga, 0, ',', '.') }}
                        </td>
                        <td class="px-8 py-5">
                            <div class="flex items-center justify-center gap-2">
                                <a href="{{ route('admin.orders.show', $order->id) }}" class="p-2 bg-blue-50 text-blue-600 rounded-lg hover:bg-blue-100 transition">
                                    <i class="fa-solid fa-eye text-xs"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-8 py-10 text-center text-sm text-gray-500">
                            Belum ada pesanan masuk masuk saat ini.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-admin-layout>