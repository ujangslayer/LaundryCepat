<x-admin-layout>
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
        <div>
            <h2 class="text-2xl font-extrabold text-gray-900 mb-1">Kelola Pesanan</h2>
            <p class="text-sm text-gray-500">Pantau dan kelola semua antrean pesanan masuk.</p>
        </div>
        <div class="flex items-center gap-3">
            <button class="bg-white border border-gray-200 text-gray-600 px-4 py-2.5 rounded-xl text-sm font-bold hover:bg-gray-50 transition">
                <i class="fa-solid fa-file-export mr-2"></i>Export
            </button>
            <button class="bg-[#0A58CA] text-white px-5 py-2.5 rounded-xl text-sm font-bold hover:bg-blue-700 shadow-lg shadow-blue-100 transition">
                <i class="fa-solid fa-plus mr-2"></i>Pesanan Baru
            </button>
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
        <div class="relative w-full md:w-72">
            <i class="fa-solid fa-magnifying-glass absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
            <input type="text" placeholder="Cari ID Pesanan atau Nama..." class="w-full bg-gray-50 border-none pl-10 pr-4 py-2 rounded-xl text-sm outline-none focus:ring-2 focus:ring-blue-100">
        </div>
    </div>

    <div class="bg-white rounded-3xl border border-gray-100 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead>
                    <tr class="bg-gray-50/50 border-b border-gray-100">
                        <th class="px-8 py-4 text-[11px] font-extrabold text-gray-400 uppercase tracking-wider">ID Pesanan</th>
                        <th class="px-8 py-4 text-[11px] font-extrabold text-gray-400 uppercase tracking-wider">Pelanggan</th>
                        <th class="px-8 py-4 text-[11px] font-extrabold text-gray-400 uppercase tracking-wider">Layanan</th>
                        <th class="px-8 py-4 text-[11px] font-extrabold text-gray-400 uppercase tracking-wider">Status</th>
                        <th class="px-8 py-4 text-[11px] font-extrabold text-gray-400 uppercase tracking-wider">Total</th>
                        <th class="px-8 py-4 text-[11px] font-extrabold text-gray-400 uppercase tracking-wider text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    <tr class="hover:bg-gray-50/50 transition">
                        <td class="px-8 py-5 text-sm font-bold text-gray-900">#LC-84729</td>
                        <td class="px-8 py-5">
                            <p class="text-sm font-bold text-gray-900">Budi Santoso</p>
                            <p class="text-xs text-gray-500">0812-3456-7890</p>
                        </td>
                        <td class="px-8 py-5 text-sm text-gray-600 font-medium">Cuci Kering + Setrika</td>
                        <td class="px-8 py-5">
                            <span class="bg-orange-50 text-orange-600 text-[10px] font-bold px-2.5 py-1 rounded-md uppercase tracking-wider">Proses</span>
                        </td>
                        <td class="px-8 py-5 text-sm font-bold text-gray-900">Rp 45.000</td>
                        <td class="px-8 py-5">
                            <div class="flex items-center justify-center gap-2">
                                <a href="{{ route('admin.orders.show', 1) }}" class="p-2 bg-blue-50 text-blue-600 rounded-lg hover:bg-blue-100 transition">
                                    <i class="fa-solid fa-eye text-xs"></i>
                                </a>
                                <button class="p-2 bg-red-50 text-red-600 rounded-lg hover:bg-red-100 transition">
                                    <i class="fa-solid fa-trash text-xs"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</x-admin-layout>