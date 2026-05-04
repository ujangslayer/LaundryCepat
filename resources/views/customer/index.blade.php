<x-admin-layout>
    <div class="mb-8 flex flex-col md:flex-row md:items-end justify-between gap-4">
        <div>
            <h2 class="text-3xl font-extrabold text-gray-900 mb-2">Kelola Pelanggan</h2>
            <p class="text-gray-500">Basis data pengguna, riwayat pemesanan, dan kontak pelanggan.</p>
        </div>
        <div class="flex gap-3">
            <button class="bg-white border border-gray-200 text-gray-700 px-6 py-2.5 rounded-xl text-sm font-bold shadow-sm hover:bg-gray-50 transition flex items-center gap-2">
                <i class="fa-solid fa-file-export"></i> Export CSV
            </button>
            <button class="bg-[#0A58CA] text-white px-6 py-2.5 rounded-xl text-sm font-bold shadow-[0_4px_14px_0_rgba(10,88,202,0.39)] hover:bg-blue-800 transition whitespace-nowrap">
                <i class="fa-solid fa-plus mr-2"></i>Tambah Manual
            </button>
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
        <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm flex items-center gap-5">
            <div class="w-14 h-14 rounded-full bg-blue-50 text-[#0A58CA] flex items-center justify-center text-2xl">
                <i class="fa-solid fa-users"></i>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500 mb-1">Total Pelanggan</p>
                <p class="text-2xl font-extrabold text-gray-900">1,248</p>
            </div>
        </div>
        <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm flex items-center gap-5">
            <div class="w-14 h-14 rounded-full bg-green-50 text-green-500 flex items-center justify-center text-2xl">
                <i class="fa-solid fa-user-check"></i>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500 mb-1">Pelanggan Aktif</p>
                <p class="text-2xl font-extrabold text-gray-900">342</p>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-[2rem] border border-gray-100 shadow-[0_10px_40px_-15px_rgba(0,0,0,0.05)] overflow-hidden">
        <div class="p-6 border-b border-gray-50 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <h3 class="font-bold text-gray-900">Daftar Pelanggan</h3>
            <div class="flex items-center gap-2">
                <select class="bg-gray-50 border border-gray-200 text-sm rounded-xl px-4 py-2 focus:outline-none focus:border-blue-400">
                    <option>Urutkan: Paling Baru</option>
                    <option>Urutkan: Pesanan Terbanyak</option>
                    <option>Urutkan: Nama A-Z</option>
                </select>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50/50 border-b border-gray-100">
                        <th class="px-8 py-5 text-[11px] font-extrabold text-gray-400 uppercase tracking-wider">Profil Pelanggan</th>
                        <th class="px-8 py-5 text-[11px] font-extrabold text-gray-400 uppercase tracking-wider">Kontak & Alamat</th>
                        <th class="px-8 py-5 text-[11px] font-extrabold text-gray-400 uppercase tracking-wider">Bergabung</th>
                        <th class="px-8 py-5 text-[11px] font-extrabold text-gray-400 uppercase tracking-wider">Total Pesanan</th>
                        <th class="px-8 py-5 text-[11px] font-extrabold text-gray-400 uppercase tracking-wider text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    <tr class="hover:bg-blue-50/30 transition group">
                        <td class="px-8 py-5">
                            <div class="flex items-center gap-4">
                                <img src="https://ui-avatars.com/api/?name=Budi+Santoso&background=EBF3FF&color=0A58CA" class="w-10 h-10 rounded-full border border-gray-200">
                                <div>
                                    <p class="text-sm font-bold text-gray-900 whitespace-nowrap">Budi Santoso</p>
                                    <p class="text-[11px] text-gray-500">budi.santoso@email.com</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-8 py-5">
                            <p class="text-sm font-semibold text-gray-700 whitespace-nowrap"><i class="fa-solid fa-phone text-[10px] text-gray-400 mr-1"></i> +62 812-3456-7890</p>
                            <p class="text-[11px] text-gray-500 truncate w-48">Jl. Sudirman No. 45, Jakarta Selatan</p>
                        </td>
                        <td class="px-8 py-5 text-sm text-gray-600">15 Sep 2023</td>
                        <td class="px-8 py-5">
                            <span class="bg-purple-50 text-purple-600 text-xs font-bold px-3 py-1 rounded-full">24 Pesanan</span>
                        </td>
                        <td class="px-8 py-5">
                            <div class="flex items-center justify-center gap-2">
                                <button class="w-8 h-8 rounded-lg bg-gray-50 text-gray-400 flex items-center justify-center hover:bg-blue-50 hover:text-[#0A58CA] transition" title="Lihat Detail">
                                    <i class="fa-solid fa-eye text-sm"></i>
                                </button>
                                <button class="w-8 h-8 rounded-lg bg-gray-50 text-gray-400 flex items-center justify-center hover:bg-red-50 hover:text-red-500 transition" title="Blokir/Hapus">
                                    <i class="fa-solid fa-ban text-sm"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="px-8 py-6 border-t border-gray-50 flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-gray-50/30">
            <p class="text-xs font-medium text-gray-500">Menampilkan 10 dari 1,248 pelanggan</p>
            <div class="flex items-center gap-2">
                <button class="w-8 h-8 flex items-center justify-center rounded-lg border border-gray-200 text-gray-400 hover:bg-white transition"><i class="fa-solid fa-chevron-left text-[10px]"></i></button>
                <button class="w-8 h-8 flex items-center justify-center rounded-lg bg-[#0A58CA] text-white text-xs font-bold shadow-md">1</button>
                <button class="w-8 h-8 flex items-center justify-center rounded-lg border border-gray-200 text-gray-600 text-xs font-bold hover:bg-white transition">2</button>
                <button class="w-8 h-8 flex items-center justify-center rounded-lg border border-gray-200 text-gray-400 hover:bg-white transition"><i class="fa-solid fa-chevron-right text-[10px]"></i></button>
            </div>
        </div>
    </div>
</x-admin-layout>