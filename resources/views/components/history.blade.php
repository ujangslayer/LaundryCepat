<x-app-layout>
    <div class="max-w-5xl mx-auto py-8 px-4 xl:px-0">
        
        <div class="bg-gray-100 rounded-[2rem] p-8 md:p-10 mb-8">
            <h1 class="text-3xl font-extrabold text-gray-900 mb-3">Riwayat Pesanan</h1>
            <p class="text-gray-500 text-sm md:text-base max-w-xl">
                Melakukan pantauan semua layanan laundry Anda di sini. Dari pesanan terbaru hingga yang sudah selesai.
            </p>
        </div>

        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
            <div class="flex flex-wrap items-center gap-2 md:gap-3">
                <button class="bg-[#0A58CA] text-white px-5 py-2.5 rounded-full text-sm font-semibold shadow-md flex items-center gap-2 transition hover:bg-blue-800">
                    <i class="fa-solid fa-check-circle"></i> Semua
                </button>
                <button class="bg-[#EBF3FF] text-blue-700 px-5 py-2.5 rounded-full text-sm font-semibold flex items-center gap-2 transition hover:bg-blue-100">
                    <i class="fa-solid fa-clock-rotate-left"></i> Diproses
                </button>
                <button class="bg-gray-100 text-gray-600 px-5 py-2.5 rounded-full text-sm font-semibold flex items-center gap-2 transition hover:bg-gray-200">
                    <i class="fa-solid fa-check-double"></i> Selesai
                </button>
            </div>

            <div class="flex items-center justify-between bg-gray-100 rounded-full px-4 py-2 min-w-[200px]">
                <button class="w-8 h-8 rounded-full flex items-center justify-center text-gray-500 hover:bg-gray-200 transition">
                    <i class="fa-solid fa-chevron-left text-xs"></i>
                </button>
                <span class="text-sm font-bold text-gray-700">Oktober 2023</span>
                <button class="w-8 h-8 rounded-full flex items-center justify-center text-gray-500 hover:bg-gray-200 transition">
                    <i class="fa-solid fa-chevron-right text-xs"></i>
                </button>
            </div>
        </div>

        <div class="flex flex-col gap-6">
            
            <div class="bg-white rounded-[2rem] p-6 md:p-8 border border-gray-100 shadow-[0_4px_20px_-5px_rgba(6,81,237,0.05)] relative overflow-hidden">
                <div class="absolute top-0 right-0 w-64 h-64 bg-[#F8FAFC] rounded-bl-[100px] -z-10"></div>

                <div class="flex justify-between items-start mb-4">
                    <span class="bg-[#EBF3FF] text-[#0A58CA] text-[10px] font-extrabold px-3 py-1.5 rounded-md uppercase tracking-wider">Sedang Diproses</span>
                    <span class="text-sm font-medium text-gray-500">ID: #LC-9824</span>
                </div>

                <div class="mb-6">
                    <h2 class="text-xl font-bold text-gray-900 mb-1">Cuci & Lipat Premium</h2>
                    <p class="text-sm text-gray-500">Diterima: 15 Okt 2023, 08:30 WIB</p>
                </div>

                <div class="flex flex-col md:flex-row gap-4 mb-6">
                    <div class="flex-1 bg-gray-50 rounded-2xl p-4">
                        <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-1">Berat</p>
                        <p class="text-base font-bold text-gray-900">4.5 kg</p>
                    </div>
                    <div class="flex-1 bg-gray-50 rounded-2xl p-4">
                        <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-1">Total</p>
                        <p class="text-base font-bold text-[#0A58CA]">Rp 67.500</p>
                    </div>
                </div>

                <div class="flex items-center gap-3">
                    <button class="bg-[#0A58CA] hover:bg-blue-800 text-white px-6 py-2.5 rounded-xl text-sm font-semibold transition shadow-md">
                        Lacak Pesanan
                    </button>
                    <button class="w-10 h-10 rounded-xl bg-[#EBF3FF] text-[#0A58CA] flex items-center justify-center hover:bg-blue-100 transition">
                        <i class="fa-solid fa-receipt"></i>
                    </button>
                </div>
            </div>

            <div class="bg-white rounded-[2rem] p-6 md:p-8 border border-gray-100 shadow-[0_4px_20px_-5px_rgba(0,0,0,0.02)]">
                <div class="flex justify-between items-start mb-4">
                    <span class="bg-gray-100 text-gray-600 text-[10px] font-extrabold px-3 py-1.5 rounded-md uppercase tracking-wider">Selesai</span>
                    <span class="text-sm font-medium text-gray-500">ID: #LC-9751</span>
                </div>

                <div class="mb-6">
                    <h2 class="text-xl font-bold text-gray-900 mb-1">Dry Cleaning Khusus</h2>
                    <p class="text-sm text-gray-500">Selesai: 10 Okt 2023, 14:00 WIB</p>
                </div>

                <div class="flex flex-wrap gap-8 mb-6">
                    <div>
                        <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-1">Berat</p>
                        <p class="text-sm font-bold text-gray-900">2 kg <span class="text-gray-500 font-normal">(Jas & Gaun)</span></p>
                    </div>
                    <div>
                        <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-1">Total</p>
                        <p class="text-sm font-bold text-gray-900">Rp 120.000</p>
                    </div>
                </div>

                <div class="flex items-center gap-3">
                    <button class="bg-white border-2 border-gray-200 text-gray-700 hover:bg-gray-50 px-6 py-2.5 rounded-xl text-sm font-semibold transition">
                        Lihat Detail
                    </button>
                    <button class="bg-gray-100 text-gray-700 hover:bg-gray-200 px-6 py-2.5 rounded-xl text-sm font-semibold flex items-center gap-2 transition">
                        <i class="fa-solid fa-rotate-right"></i> Pesan Lagi
                    </button>
                </div>
            </div>

            <div class="bg-white rounded-[2rem] p-6 md:p-8 border border-gray-100 shadow-[0_4px_20px_-5px_rgba(0,0,0,0.02)]">
                <div class="flex justify-between items-start mb-4">
                    <span class="bg-red-50 text-red-500 text-[10px] font-extrabold px-3 py-1.5 rounded-md uppercase tracking-wider">Dibatalkan</span>
                    <span class="text-sm font-medium text-gray-500">ID: #LC-9620</span>
                </div>

                <div class="mb-6">
                    <h2 class="text-xl font-bold text-gray-500 mb-1">Cuci Setrika</h2>
                    <p class="text-sm text-gray-400">Dibatalkan: 05 Okt 2023</p>
                </div>

                <div class="flex items-center gap-3">
                    <button class="bg-white border-2 border-gray-200 text-gray-600 hover:bg-gray-50 px-6 py-2.5 rounded-xl text-sm font-semibold transition">
                        Detail Pembatalan
                    </button>
                </div>
            </div>

        </div>

        <div class="mt-10 flex justify-center">
            <button class="text-[#0A58CA] font-semibold text-sm flex items-center gap-2 hover:text-blue-800 transition">
                Muat Lebih Banyak <i class="fa-solid fa-chevron-down text-xs"></i>
            </button>
        </div>

    </div>
</x-app-layout>