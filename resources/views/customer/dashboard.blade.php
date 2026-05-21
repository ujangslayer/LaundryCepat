<x-app-layout>
    <div class="bg-gradient-to-br from-[#0A58CA] to-[#063b87] rounded-3xl p-8 mb-8 flex flex-col md:flex-row justify-between items-start md:items-center shadow-lg shadow-blue-500/30 gap-6 relative overflow-hidden">
        <div class="absolute top-0 right-0 -mt-16 -mr-16 w-64 h-64 bg-white opacity-5 rounded-full blur-2xl"></div>
        <div class="absolute bottom-0 left-1/2 w-40 h-40 bg-blue-400 opacity-20 rounded-full blur-xl"></div>

        <div class="relative z-10">

            <h1 class="text-3xl font-extrabold text-white mb-2 tracking-tight">Selamat Datang, {{ explode(' ', Auth::user()->name)[0] }}!</h1>
            <p class="text-blue-100 text-sm max-w-md leading-relaxed font-medium">
                Pakaian Anda adalah prioritas kami, nikmati layanan antar jemput gratis hari ini.
            </p>
        </div>
        <div class="flex gap-4 w-full md:w-auto relative z-10">
            <a href="{{ route('customer.booking') }}" class="flex-1 md:flex-none bg-white hover:bg-gray-50 text-[#0A58CA] px-8 py-3 rounded-full text-sm font-bold flex items-center justify-center gap-2 transition-all duration-300 shadow-md hover:shadow-xl hover:-translate-y-0.5">
                <i class="fa-regular fa-square-plus"></i> PESAN SEKARANG
            </a>
            <a href="{{ route('customer.history') }}" class="flex-1 md:flex-none bg-white/10 hover:bg-white/20 text-white border border-white/20 px-8 py-3 rounded-full text-sm font-bold text-center transition-all duration-300 backdrop-blur-sm">
                RIWAYAT
            </a>
        </div>
    </div>

    <div class="bg-white rounded-3xl p-8 mb-8 shadow-sm border border-gray-100 hover:shadow-md transition-shadow duration-300">
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-xl font-bold text-gray-900">Pesanan Sedang Diproses</h2>
            <a href="#" class="text-[#0A58CA] text-sm font-bold hover:text-blue-800 hover:underline transition">Lihat Detail</a>
        </div>

        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-16 gap-4 p-5 bg-gray-50/50 rounded-2xl border border-gray-50">
            <div class="flex items-center gap-5">
                <div class="w-16 h-16 bg-white rounded-2xl flex items-center justify-center shadow-sm border border-gray-100 text-[#0A58CA]">
                    <i class="fa-solid fa-shirt text-2xl"></i>
                </div>
                <div>
                    <p class="text-[11px] font-extrabold text-gray-400 mb-1 tracking-widest uppercase">Order #FP-8829</p>
                    <h3 class="text-lg font-bold text-gray-900 mb-0.5">Cuci Lipat - 5.0 kg</h3>
                    <p class="text-sm text-gray-500 font-medium">Estimasi selesai: <span class="text-blue-600 font-bold">Besok, 14:00 WIB</span></p>
                </div>
            </div>
            <span class="bg-blue-50 border border-blue-100 text-[#0A58CA] text-sm font-bold px-6 py-2.5 rounded-xl flex items-center gap-2">
                <span class="w-2 h-2 rounded-full bg-blue-500 animate-pulse"></span>
                Di Keringkan
            </span>
        </div>

      <div class="relative px-0 md:px-4 mb-4 mt-8">
            <div class="absolute left-8 right-8 top-5 h-1 bg-gray-200 z-0"></div>
            
            <div class="absolute left-8 top-5 h-1 bg-[#0A58CA] z-0 transition-all duration-500" style="width: 50%;"></div>

            <div class="flex justify-between relative z-10">
                
                <div class="flex flex-col items-center gap-3 w-16">
                    <div class="w-10 h-10 rounded-full bg-[#0A58CA] text-white flex items-center justify-center shadow-md relative z-10">
                        <i class="fa-solid fa-check text-sm"></i>
                    </div>
                    <span class="text-xs font-bold text-gray-800 text-center">Di Ambil</span>
                </div>

                <div class="flex flex-col items-center gap-3 w-16">
                    <div class="w-10 h-10 rounded-full bg-[#0A58CA] text-white flex items-center justify-center shadow-md relative z-10">
                        <i class="fa-solid fa-check text-sm"></i>
                    </div>
                    <span class="text-xs font-bold text-gray-800 text-center">Dicuci</span>
                </div>

                <div class="flex flex-col items-center gap-3 w-20">
                    <div class="w-10 h-10 rounded-full bg-[#0A58CA] text-white flex items-center justify-center shadow-md ring-4 ring-blue-50 relative z-10">
                        <i class="fa-solid fa-fan text-sm"></i>
                    </div>
                    <span class="text-xs font-extrabold text-[#0A58CA] text-center">Di keringkan</span>
                </div>

                <div class="flex flex-col items-center gap-3 w-16">
                    <div class="w-10 h-10 rounded-full bg-white text-gray-300 flex items-center justify-center border-2 border-gray-200 relative z-10">
                        <i class="fa-solid fa-temperature-arrow-up text-sm"></i>
                    </div>
                    <span class="text-xs font-semibold text-gray-400 text-center">Di Setrika</span>
                </div>

                <div class="flex flex-col items-center gap-3 w-16">
                    <div class="w-10 h-10 rounded-full bg-white text-gray-300 flex items-center justify-center border-2 border-gray-200 relative z-10">
                        <i class="fa-solid fa-truck-fast text-sm"></i>
                    </div>
                    <span class="text-xs font-semibold text-gray-400 text-center">Di Antar</span>
                </div>

            </div>
        </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        
        <div class="bg-white rounded-3xl p-8 shadow-sm border border-gray-100 flex flex-col">
            <h2 class="text-xl font-bold text-gray-900 mb-6">Aksi Cepat</h2>
            <div class="grid grid-cols-2 gap-4 flex-grow">
                <button class="group bg-[#FCFDFE] hover:bg-blue-50/50 rounded-2xl p-6 flex flex-col items-center justify-center gap-4 transition-all duration-300 border border-gray-100 hover:border-blue-200 hover:shadow-md hover:-translate-y-1">
                    <div class="w-12 h-12 rounded-full bg-white flex items-center justify-center text-[#0A58CA] shadow-sm border border-gray-50 group-hover:scale-110 transition-transform duration-300">
                        <i class="fa-solid fa-plus text-xl"></i>
                    </div>
                    <span class="text-sm font-bold text-gray-700 group-hover:text-[#0A58CA] transition-colors">Pesan Baru</span>
                </button>
                
                <button class="group bg-[#FCFDFE] hover:bg-blue-50/50 rounded-2xl p-6 flex flex-col items-center justify-center gap-4 transition-all duration-300 border border-gray-100 hover:border-blue-200 hover:shadow-md hover:-translate-y-1">
                    <div class="w-12 h-12 rounded-full bg-white flex items-center justify-center text-[#0A58CA] shadow-sm border border-gray-50 group-hover:scale-110 transition-transform duration-300">
                        <i class="fa-solid fa-location-dot text-xl"></i>
                    </div>
                    <span class="text-sm font-bold text-gray-700 group-hover:text-[#0A58CA] transition-colors">Ganti Alamat</span>
                </button>

                <button class="group bg-[#FCFDFE] hover:bg-blue-50/50 rounded-2xl p-6 flex flex-col items-center justify-center gap-4 transition-all duration-300 border border-gray-100 hover:border-blue-200 hover:shadow-md hover:-translate-y-1">
                    <div class="w-12 h-12 rounded-full bg-white flex items-center justify-center text-[#0A58CA] shadow-sm border border-gray-50 group-hover:scale-110 transition-transform duration-300">
                        <i class="fa-solid fa-ticket text-xl"></i>
                    </div>
                    <span class="text-sm font-bold text-gray-700 group-hover:text-[#0A58CA] transition-colors">Voucher Saya</span>
                </button>

                <button class="group bg-[#FCFDFE] hover:bg-blue-50/50 rounded-2xl p-6 flex flex-col items-center justify-center gap-4 transition-all duration-300 border border-gray-100 hover:border-blue-200 hover:shadow-md hover:-translate-y-1">
                    <div class="w-12 h-12 rounded-full bg-white flex items-center justify-center text-[#0A58CA] shadow-sm border border-gray-50 group-hover:scale-110 transition-transform duration-300">
                        <i class="fa-solid fa-headset text-xl"></i>
                    </div>
                    <span class="text-sm font-bold text-gray-700 group-hover:text-[#0A58CA] transition-colors">Bantuan</span>
                </button>
            </div>
        </div>

        <div class="bg-white rounded-3xl p-8 shadow-sm border border-gray-100">
            <h2 class="text-xl font-bold text-gray-900 mb-8">Aktivitas Terakhir</h2>
            
            <div class="flex flex-col gap-6">
                <div class="flex items-center justify-between group cursor-pointer p-2 -mx-2 rounded-xl hover:bg-gray-50 transition-colors">
                    <div class="flex items-center gap-4">
                        <div class="w-10 h-10 rounded-full bg-[#ECFDF3] group-hover:bg-green-100 flex items-center justify-center text-[#027A48] transition-colors">
                            <i class="fa-solid fa-check text-sm"></i>
                        </div>
                        <div>
                            <h4 class="text-sm font-bold text-gray-900 group-hover:text-blue-600 transition">Pesanan #FP-8810 Telah Selesai</h4>
                            <p class="text-xs text-gray-500 mt-0.5">2 jam yang lalu • Laundry Kiloan</p>
                        </div>
                    </div>
                    <span class="text-sm font-extrabold text-gray-900">Rp 45.000</span>
                </div>

                <div class="flex items-center justify-between group cursor-pointer p-2 -mx-2 rounded-xl hover:bg-gray-50 transition-colors">
                    <div class="flex items-center gap-4">
                        <div class="w-10 h-10 rounded-full bg-[#EBF4FF] group-hover:bg-blue-100 flex items-center justify-center text-[#0A58CA] transition-colors">
                            <i class="fa-solid fa-wallet text-sm"></i>
                        </div>
                        <div>
                            <h4 class="text-sm font-bold text-gray-900 group-hover:text-blue-600 transition">Top-up Saldo Berhasil</h4>
                            <p class="text-xs text-gray-500 mt-0.5">Kemarin, 18:24 • OVO Payment</p>
                        </div>
                    </div>
                    <span class="text-sm font-extrabold text-green-600">+Rp 50.000</span>
                </div>

                <div class="flex items-center justify-between group cursor-pointer p-2 -mx-2 rounded-xl hover:bg-gray-50 transition-colors">
                    <div class="flex items-center gap-4">
                        <div class="w-10 h-10 rounded-full bg-gray-50 flex items-center justify-center text-gray-500 border border-gray-100 group-hover:border-gray-300 transition-colors">
                            <i class="fa-solid fa-truck-fast text-sm"></i>
                        </div>
                        <div>
                            <h4 class="text-sm font-bold text-gray-900 group-hover:text-blue-600 transition">Kurir Sedang Menuju Lokasi</h4>
                            <p class="text-xs text-gray-500 mt-0.5">Kemarin, 10:15 • Antar Jemput</p>
                        </div>
                    </div>
                    <i class="fa-solid fa-chevron-right text-gray-300 text-xs group-hover:text-blue-500 transition group-hover:translate-x-1"></i>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>