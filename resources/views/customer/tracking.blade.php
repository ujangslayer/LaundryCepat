<x-app-layout>
    <div class="max-w-6xl mx-auto mb-8 pt-4 px-4 xl:px-0">
        <h1 class="text-3xl font-extrabold text-[#0B214A] mb-3">Lacak Pesanan</h1>
        <div class="flex items-center gap-3">
            <span class="text-gray-500 text-sm font-medium">ID Pesanan <span class="font-bold text-gray-700">#LC-84729</span></span>
            <span class="bg-[#F0F5FF] text-blue-600 text-[11px] font-bold px-3 py-1 rounded-full flex items-center gap-1.5 uppercase tracking-wider">
                <div class="w-1.5 h-1.5 rounded-full bg-blue-600 animate-pulse"></div> Aktif
            </span>
        </div>
    </div>

    <div class="max-w-6xl mx-auto grid grid-cols-1 lg:grid-cols-3 gap-6 md:gap-8 px-4 xl:px-0 mb-12">
        
        <div class="lg:col-span-2 flex flex-col gap-6 md:gap-8">
            
            <div class="bg-white rounded-[2rem] p-6 md:p-10 border border-gray-100 shadow-[0_4px_20px_-5px_rgba(6,81,237,0.05)]">
                <div class="flex justify-between items-center mb-12">
                    <h2 class="text-xl font-bold text-gray-900">Pencucian Sedang Berlangsung</h2>
                    <span class="bg-[#F0F5FF] text-blue-600 text-[11px] font-bold px-3 py-1.5 rounded-full flex items-center gap-1.5 uppercase tracking-wider hidden md:flex">
                        <div class="w-1.5 h-1.5 rounded-full bg-blue-600"></div> Aktif
                    </span>
                </div>

                <div class="relative px-2 md:px-8">
                    <div class="absolute left-10 right-10 top-6 -translate-y-1/2 h-1.5 bg-gray-100 rounded-full"></div>
                    <div class="absolute left-10 top-6 -translate-y-1/2 h-1.5 bg-[#0A58CA] rounded-full transition-all duration-500 shadow-[0_0_10px_rgba(10,88,202,0.4)]" style="width: 25%;"></div>

                    <div class="flex justify-between relative z-10">
                        <div class="flex flex-col items-center gap-4">
                            <div class="w-12 h-12 rounded-full bg-[#0A58CA] text-white flex items-center justify-center shadow-md">
                                <i class="fa-solid fa-check text-lg"></i>
                            </div>
                            <span class="text-xs font-bold text-[#0A58CA]">Diterima</span>
                        </div>

                        <div class="flex flex-col items-center gap-4">
                            <div class="w-12 h-12 rounded-full bg-[#0A58CA] text-white flex items-center justify-center shadow-md ring-4 ring-blue-50">
                               <i class="fa-solid fa-check text-lg"></i>
                            </div>
                            <span class="text-xs font-bold text-[#0A58CA]">Mencuci</span>
                        </div>

                        <div class="flex flex-col items-center gap-4">
                            <div class="w-12 h-12 rounded-full bg-white text-gray-300 flex items-center justify-center border-2 border-gray-100">
                                <i class="fa-solid fa-wind text-lg"></i>
                            </div>
                            <span class="text-xs font-medium text-gray-400">Mengeringkan</span>
                        </div>

                        <div class="flex flex-col items-center gap-4">
                            <div class="w-12 h-12 rounded-full bg-white text-gray-300 flex items-center justify-center border-2 border-gray-100">
                                <i class="fa-regular fa-circle-check text-lg"></i>
                            </div>
                            <span class="text-xs font-medium text-gray-400">Siap</span>
                        </div>

                        <div class="flex flex-col items-center gap-4">
                            <div class="w-12 h-12 rounded-full bg-white text-gray-300 flex items-center justify-center border-2 border-gray-100">
                                <i class="fa-solid fa-truck text-lg"></i>
                            </div>
                            <span class="text-xs font-medium text-gray-400">Terkirim</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-gray-200 rounded-[2rem] h-[320px] relative overflow-hidden flex items-end p-4 md:p-6 bg-cover bg-center border border-gray-100 shadow-sm" style="background-image: url('https://www.transparenttextures.com/patterns/cream-paper.png'); background-color: #cbd5e1;">
                
                <div class="bg-white/90 backdrop-blur-md w-full rounded-2xl p-5 flex items-center gap-4 shadow-xl border border-white">
                    <div class="w-12 h-12 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0">
                        <i class="fa-solid fa-store text-lg"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-900 text-sm mb-0.5">Fasilitas Pemrosesan</h4>
                        <p class="text-xs text-gray-500">Jalan Sudirman No. 45, Jakarta</p>
                    </div>
                </div>
            </div>

        </div>

        <div class="flex flex-col gap-6 md:gap-8">
            
            <div class="bg-white rounded-[2rem] p-8 border border-gray-100 shadow-[0_4px_20px_-5px_rgba(6,81,237,0.05)]">
                <h3 class="text-[11px] font-extrabold text-gray-400 tracking-widest uppercase mb-6">Detail Layanan</h3>
                
                <div class="flex items-center justify-between mb-8">
                    <div class="flex items-center gap-4">
                        <img src="https://i.pravatar.cc/150?img=11" alt="Staff Avatar" class="w-12 h-12 rounded-xl object-cover border border-gray-100 shadow-sm">
                        <div>
                            <h4 class="font-extrabold text-gray-900 uppercase tracking-wide">ALI</h4>
                            <p class="text-[11px] text-gray-500 mt-0.5">Spesialis Pencucian Premium</p>
                        </div>
                    </div>
                    <button class="w-10 h-10 rounded-full bg-[#F4F7FB] text-blue-600 flex items-center justify-center hover:bg-blue-100 transition shadow-sm">
                        <i class="fa-regular fa-comment-dots"></i>
                    </button>
                </div>

                <div class="space-y-4">
                    <div class="flex justify-between items-center text-sm bg-gray-50 p-3 rounded-lg">
                        <span class="text-gray-500 font-medium">Tipe Layanan</span>
                        <span class="font-bold text-gray-900">Cuci & Lipat Premium</span>
                    </div>
                    <div class="flex justify-between items-center text-sm bg-gray-50 p-3 rounded-lg">
                        <span class="text-gray-500 font-medium">Berat Estimasi</span>
                        <span class="font-bold text-gray-900">5.2 Kg</span>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-[2rem] p-8 border border-gray-100 shadow-[0_4px_20px_-5px_rgba(6,81,237,0.05)] flex-grow flex flex-col">
                <h3 class="text-[11px] font-extrabold text-gray-400 tracking-widest uppercase mb-6">Ringkasan Barang</h3>
                
                <div class="space-y-6 mb-8 flex-grow">
                    <div class="flex items-center justify-between">
                        <div class="flex gap-4 items-center">
                            <div class="w-10 h-10 rounded-xl bg-[#F8FAFC] text-gray-500 flex items-center justify-center shrink-0 border border-gray-50">
                                <i class="fa-solid fa-shirt"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-900 text-sm">Pakaian Sehari-hari</h4>
                                <p class="text-[11px] text-gray-400 mt-0.5 font-medium">4.0 Kg</p>
                            </div>
                        </div>
                        <span class="font-bold text-gray-900 text-sm">Rp 60.000</span>
                    </div>
                    
                    <div class="flex items-center justify-between">
                        <div class="flex gap-4 items-center">
                            <div class="w-10 h-10 rounded-xl bg-[#F8FAFC] text-gray-500 flex items-center justify-center shrink-0 border border-gray-50">
                                <i class="fa-solid fa-bed"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-900 text-sm">Sprei & Sarung</h4>
                                <p class="text-[11px] text-gray-400 mt-0.5 font-medium">1.2 Kg</p>
                            </div>
                        </div>
                        <span class="font-bold text-gray-900 text-sm">Rp 25.000</span>
                    </div>
                </div>

                <div class="border-t border-dashed border-gray-200 pt-6 mb-8 flex justify-between items-center">
                    <span class="font-bold text-gray-900">Total Pembayaran</span>
                    <span class="text-xl font-extrabold text-[#0A58CA]">Rp 85.000</span>
                </div>

                <div class="flex flex-col gap-3 mt-auto">
                    <button class="w-full bg-[#0A58CA] hover:bg-blue-800 text-white py-3.5 rounded-xl font-semibold text-sm transition shadow-[0_4px_14px_0_rgba(10,88,202,0.39)]">
                        Lihat Detail Pesanan
                    </button>
                    <button class="w-full bg-white hover:bg-gray-50 text-gray-700 border-2 border-gray-100 py-3 rounded-xl font-semibold text-sm transition">
                        Butuh Bantuan?
                    </button>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>