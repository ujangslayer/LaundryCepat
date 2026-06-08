<x-admin-layout>
    <div class="mb-8 flex flex-col md:flex-row md:items-end justify-between gap-4">
        <div>
            <h2 class="text-3xl font-extrabold text-gray-900 mb-2">Kelola Pelanggan</h2>
            <p class="text-gray-500">Basis data pengguna, riwayat pemesanan, dan kontak pelanggan.</p>
        </div>
        <div class="flex gap-3">
<a href="{{ route('admin.customer.export', request()->query()) }}" class="bg-white border border-gray-200 text-gray-700 px-6 py-2.5 rounded-xl text-sm font-bold shadow-sm hover:bg-gray-50 transition flex items-center gap-2">
    <i class="fa-solid fa-file-export"></i> Export CSV
</a>
        </div>
    </div>

   <form method="GET" class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm mb-6 flex flex-col sm:flex-row gap-4 items-center justify-between">
        <div class="relative w-full sm:w-96">
            <i class="fa-solid fa-search absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"></i>
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama, email, atau telepon..." class="w-full pl-11 pr-4 py-3 bg-gray-50 border border-transparent focus:border-blue-200 focus:bg-white rounded-xl outline-none transition text-sm font-medium">
        </div>
        <div class="flex items-center gap-3 w-full sm:w-auto">
            <select name="sort" onchange="this.form.submit()" class="bg-gray-50 border-none text-sm font-bold text-gray-700 rounded-xl py-3 px-4 focus:ring-2 focus:ring-blue-500 outline-none w-full sm:w-auto">
                <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>Urutkan: Terbaru</option>
                <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>Urutkan: Terlama</option>
                <option value="most_orders" {{ request('sort') == 'most_orders' ? 'selected' : '' }}>Pesanan Terbanyak</option>
            </select>
        </div>
        
        <button type="submit" class="hidden"></button>
    </form>
    <div class="bg-white rounded-[2.5rem] shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50/50 border-b border-gray-50">
                        <th class="px-8 py-5 text-[10px] font-extrabold text-gray-400 uppercase tracking-widest">Profil Pelanggan</th>
                        <th class="px-8 py-5 text-[10px] font-extrabold text-gray-400 uppercase tracking-widest">Kontak</th>
                        <th class="px-8 py-5 text-[10px] font-extrabold text-gray-400 uppercase tracking-widest">Alamat Lengkap</th>
                        <th class="px-8 py-5 text-[10px] font-extrabold text-gray-400 uppercase tracking-widest text-center">Total Pesanan</th>
                        <th class="px-8 py-5 text-[10px] font-extrabold text-gray-400 uppercase tracking-widest">Bergabung Pada</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    
                    @forelse($customers as $customer)
                    <tr class="hover:bg-gray-50/50 transition">
                        <td class="px-8 py-5">
                            <div class="flex items-center gap-4">
                                <img src="https://ui-avatars.com/api/?name={{ urlencode($customer->name) }}&background=EBF3FF&color=0A58CA" class="w-12 h-12 rounded-xl object-cover">
                                <div>
                                    <p class="text-sm font-extrabold text-gray-900">{{ $customer->name }}</p>
                                    <p class="text-xs font-semibold text-gray-500">{{ $customer->email }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-8 py-5">
                            <p class="text-sm font-bold text-gray-700">{{ $customer->nomer_telepon ?? '-' }}</p>
                        </td>
                        <td class="px-8 py-5">
                            <p class="text-sm font-medium text-gray-600 max-w-[200px] truncate" title="{{ $customer->alamat ?? 'Belum mengatur alamat' }}">
                                {{ $customer->alamat ?? 'Belum mengatur alamat' }}
                            </p>
                        </td>
                        <td class="px-8 py-5 text-center">
                            <div class="inline-flex flex-col items-center justify-center">
<span class="text-lg font-black text-[#0A58CA]">{{ $customer->pesanan_count }}</span>
                                <span class="text-[10px] font-bold text-gray-400 uppercase tracking-wider">Pesanan</span>
                            </div>
                        </td>
                        <td class="px-8 py-5">
                            <p class="text-sm font-bold text-gray-700">{{ $customer->created_at->format('d M Y') }}</p>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-8 py-12 text-center">
                            <div class="flex flex-col items-center justify-center">
                                <i class="fa-solid fa-users text-4xl text-gray-300 mb-3"></i>
                                <p class="text-sm font-bold text-gray-500">Belum ada pelanggan terdaftar.</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                    </tbody>
            </table>
        </div>
    </div>
</x-admin-layout>