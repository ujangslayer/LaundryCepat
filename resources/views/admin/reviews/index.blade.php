<x-admin-layout>
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
        <div>
            <h2 class="text-2xl font-extrabold text-gray-900 mb-1">Ulasan Customer</h2>
            <p class="text-sm text-gray-500">Lihat feedback dan tingkat kepuasan pelanggan terhadap layanan Anda.</p>
        </div>
        <div class="flex items-center gap-3">
            <div class="flex -space-x-2">
                <img class="w-8 h-8 rounded-full border-2 border-white" src="https://ui-avatars.com/api/?name=A&background=random" alt="">
                <img class="w-8 h-8 rounded-full border-2 border-white" src="https://ui-avatars.com/api/?name=B&background=random" alt="">
                <img class="w-8 h-8 rounded-full border-2 border-white" src="https://ui-avatars.com/api/?name=C&background=random" alt="">
            </div>
            <p class="text-xs font-bold text-gray-400 uppercase tracking-widest">4.8 Average Rating</p>
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
        <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm">
            <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-2">Total Ulasan</p>
            <h3 class="text-2xl font-black text-gray-900">1,250</h3>
        </div>
        <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm">
            <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-2">Bintang 5</p>
            <div class="flex items-center gap-2">
                <h3 class="text-2xl font-black text-gray-900">980</h3>
                <span class="text-green-500 text-xs font-bold"><i class="fa-solid fa-arrow-up"></i> 85%</span>
            </div>
        </div>
        <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm">
            <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-2">Bintang 1-2</p>
            <h3 class="text-2xl font-black text-gray-900">12</h3>
            <p class="text-[10px] text-red-400 mt-1">*Perlu perhatian segera</p>
        </div>
        <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm">
            <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-2">Respon Admin</p>
            <h3 class="text-2xl font-black text-gray-900">100%</h3>
        </div>
    </div>

    <div class="bg-white rounded-[2rem] border border-gray-100 shadow-sm overflow-hidden">
        <div class="p-6 border-b border-gray-50 flex flex-wrap items-center justify-between gap-4">
            <div class="flex items-center gap-2">
                <button class="px-4 py-2 rounded-xl bg-blue-50 text-[#0A58CA] text-xs font-bold">Semua</button>
                <button class="px-4 py-2 rounded-xl text-gray-400 hover:bg-gray-50 text-xs font-bold transition">Terbaru</button>
                <button class="px-4 py-2 rounded-xl text-gray-400 hover:bg-gray-50 text-xs font-bold transition">Rating Terendah</button>
            </div>
            <div class="relative w-full md:w-64">
                <i class="fa-solid fa-magnifying-glass absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                <input type="text" placeholder="Cari ulasan..." class="w-full bg-gray-50 border-none pl-10 pr-4 py-2 rounded-xl text-sm outline-none focus:ring-2 focus:ring-blue-100">
            </div>
        </div>

        <div class="divide-y divide-gray-50">
            <div class="p-8 hover:bg-gray-50/50 transition group">
                <div class="flex flex-col md:flex-row gap-6">
                    <div class="md:w-48 shrink-0">
                        <div class="flex items-center gap-3 mb-3">
                            <img src="https://ui-avatars.com/api/?name=Siti+Aminah&background=random" class="w-10 h-10 rounded-full border border-gray-200">
                            <div>
                                <h4 class="text-sm font-bold text-gray-900">Siti Aminah</h4>
                                <p class="text-[10px] text-gray-400 uppercase font-bold tracking-tighter">Verified Customer</p>
                            </div>
                        </div>
                        <div class="flex text-yellow-400 text-xs gap-0.5">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                        <p class="text-[11px] text-gray-400 mt-2">2 Jam yang lalu</p>
                    </div>

                    <div class="flex-1">
                        <div class="mb-2">
                            <span class="text-[10px] font-bold bg-blue-50 text-blue-600 px-2 py-1 rounded uppercase mr-2">Layanan: Cuci Ekspres</span>
                        </div>
                        <p class="text-sm text-gray-600 leading-relaxed italic">
                            "Hasil cucian sangat bersih dan wanginya tahan lama. Padahal pilih yang ekspres tapi tetap rapi setrikanya. Terima kasih LaundryCepat!"
                        </p>
                        
                        <div class="mt-4 p-4 bg-gray-50 rounded-2xl border-l-4 border-blue-400">
                            <p class="text-[11px] font-bold text-blue-600 uppercase mb-1">Balasan Anda:</p>
                            <p class="text-xs text-gray-500 italic">"Terima kasih Kak Siti! Senang bisa membantu. Ditunggu orderan berikutnya ya!"</p>
                        </div>
                    </div>

                    <div class="md:w-24 flex md:flex-col justify-end gap-2">
                        <button class="p-2 text-xs font-bold text-blue-600 hover:bg-blue-50 rounded-lg transition">Balas</button>
                        <button class="p-2 text-xs font-bold text-gray-400 hover:text-red-500 rounded-lg transition">Hapus</button>
                    </div>
                </div>
            </div>

            <div class="p-8 hover:bg-gray-50/50 transition">
                <div class="flex flex-col md:flex-row gap-6">
                    <div class="md:w-48 shrink-0">
                        <div class="flex items-center gap-3 mb-3">
                            <img src="https://ui-avatars.com/api/?name=Andi+Pratama&background=random" class="w-10 h-10 rounded-full border border-gray-200">
                            <div>
                                <h4 class="text-sm font-bold text-gray-900">Andi Pratama</h4>
                                <p class="text-[10px] text-gray-400 uppercase font-bold tracking-tighter">Verified Customer</p>
                            </div>
                        </div>
                        <div class="flex text-yellow-400 text-xs gap-0.5">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-regular fa-star text-gray-300"></i>
                        </div>
                        <p class="text-[11px] text-gray-400 mt-2">1 Hari yang lalu</p>
                    </div>
                    <div class="flex-1">
                        <div class="mb-2">
                            <span class="text-[10px] font-bold bg-blue-50 text-blue-600 px-2 py-1 rounded uppercase mr-2">Layanan: Cuci Karpet</span>
                        </div>
                        <p class="text-sm text-gray-600 leading-relaxed italic">
                            "Pengerjaan bagus, cuma pengirimannya agak telat sedikit dari jadwal yang dijanjikan. Overall oke."
                        </p>
                    </div>
                    <div class="md:w-24 flex md:flex-col justify-end gap-2">
                        <button class="p-2 text-xs font-bold text-blue-600 hover:bg-blue-50 rounded-lg transition">Balas</button>
                        <button class="p-2 text-xs font-bold text-gray-400 hover:text-red-500 rounded-lg transition">Hapus</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="p-6 bg-gray-50/50 flex justify-center">
            <button class="text-sm font-bold text-[#0A58CA] hover:underline">Tampilkan Lebih Banyak</button>
        </div>
    </div>
</x-admin-layout>