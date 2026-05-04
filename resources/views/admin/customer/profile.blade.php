<x-app-layout>
    <div class="max-w-7xl mx-auto py-8 px-4 xl:px-0">
        
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 lg:gap-8">
            
            <div class="lg:col-span-5 flex flex-col gap-6">
                
                <div class="bg-white rounded-3xl p-6 md:p-8 border border-gray-100 shadow-[0_4px_20px_-5px_rgba(0,0,0,0.02)] flex items-center gap-6">
                    <div class="relative shrink-0">
                        <img src="https://i.pravatar.cc/150?img=11" alt="Fauzan Adzim" class="w-20 h-20 md:w-24 md:h-24 rounded-full object-cover border-4 border-white shadow-md">
                    </div>
                    <div>
                        <h1 class="text-2xl font-bold text-gray-900 mb-1">Fauzan Adzim</h1>
                        <p class="text-sm text-gray-500 flex items-center gap-2">
                            <i class="fa-regular fa-calendar text-gray-400"></i> Pengguna sejak Oktober 2022
                        </p>
                    </div>
                </div>

                <div class="bg-white rounded-3xl p-6 md:p-8 border border-gray-100 shadow-[0_4px_20px_-5px_rgba(0,0,0,0.02)]">
                    <div class="flex justify-between items-center mb-8">
                        <div class="flex items-center gap-3">
                            <i class="fa-regular fa-user text-blue-600 text-xl"></i>
                            <h2 class="text-lg font-bold text-gray-900">Informasi Pribadi</h2>
                        </div>
                        <button class="border border-blue-100 text-[#0A58CA] hover:bg-blue-50 px-4 py-1.5 rounded-full text-xs font-semibold flex items-center gap-1.5 transition">
                            <i class="fa-solid fa-pen text-[10px]"></i> Edit
                        </button>
                    </div>

                    <div class="flex flex-col gap-6">
                        <div class="flex items-start gap-4">
                            <div class="w-6 flex justify-center mt-0.5"><i class="fa-regular fa-id-badge text-gray-400"></i></div>
                            <div>
                                <p class="text-[10px] font-extrabold text-gray-400 uppercase tracking-widest mb-0.5">Nama Lengkap</p>
                                <p class="text-sm font-bold text-gray-900">Budi Santoso</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4">
                            <div class="w-6 flex justify-center mt-0.5"><i class="fa-regular fa-envelope text-gray-400"></i></div>
                            <div>
                                <p class="text-[10px] font-extrabold text-gray-400 uppercase tracking-widest mb-0.5">Alamat Email</p>
                                <p class="text-sm font-bold text-gray-900">budi.santoso@example.com</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4">
                            <div class="w-6 flex justify-center mt-0.5"><i class="fa-solid fa-phone text-gray-400"></i></div>
                            <div>
                                <p class="text-[10px] font-extrabold text-gray-400 uppercase tracking-widest mb-0.5">Nomor Telepon</p>
                                <p class="text-sm font-bold text-gray-900">+62 812 3456 7890</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4">
                            <div class="w-6 flex justify-center mt-0.5"><i class="fa-regular fa-calendar-days text-gray-400"></i></div>
                            <div>
                                <p class="text-[10px] font-extrabold text-gray-400 uppercase tracking-widest mb-0.5">Tanggal Lahir</p>
                                <p class="text-sm font-bold text-gray-900">12 Mei 1995</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4">
                            <div class="w-6 flex justify-center mt-0.5"><i class="fa-solid fa-venus-mars text-gray-400"></i></div>
                            <div>
                                <p class="text-[10px] font-extrabold text-gray-400 uppercase tracking-widest mb-0.5">Jenis Kelamin</p>
                                <p class="text-sm font-bold text-gray-900">Laki-laki</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-3xl p-6 md:p-8 border border-gray-100 shadow-[0_4px_20px_-5px_rgba(0,0,0,0.02)]">
                    <div class="flex justify-between items-center mb-6">
                        <div class="flex items-center gap-3">
                            <i class="fa-regular fa-credit-card text-blue-600 text-xl"></i>
                            <h2 class="text-lg font-bold text-gray-900">Metode Pembayaran</h2>
                        </div>
                        <button class="text-[#0A58CA] hover:text-blue-800 text-sm font-semibold transition">
                            + Tambah Baru
                        </button>
                    </div>

                    <div class="flex flex-col gap-4 mb-6">
                        <div class="border border-gray-100 rounded-2xl p-4 flex justify-between items-center bg-white hover:border-gray-200 transition">
                            <div class="flex items-center gap-4">
                                <div class="w-14 h-10 bg-[#0B214A] rounded-lg flex items-center justify-center">
                                    <span class="text-white font-extrabold italic text-sm">VISA</span>
                                </div>
                                <div>
                                    <h4 class="font-bold text-gray-900 text-sm mb-0.5">Visa berakhir 4242</h4>
                                    <p class="text-xs text-gray-400">Kedaluwarsa 12/25</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-3">
                                <span class="bg-green-50 text-green-600 text-[10px] font-bold px-2.5 py-1 rounded-full uppercase">Utama</span>
                                <button class="text-gray-400 hover:text-gray-600"><i class="fa-solid fa-ellipsis-vertical px-2"></i></button>
                            </div>
                        </div>

                        <div class="border border-gray-100 rounded-2xl p-4 flex justify-between items-center bg-white hover:border-gray-200 transition">
                            <div class="flex items-center gap-4">
                                <div class="w-14 h-10 bg-[#00AED6] rounded-lg flex items-center justify-center">
                                    <i class="fa-solid fa-wallet text-white text-lg"></i>
                                </div>
                                <div>
                                    <h4 class="font-bold text-gray-900 text-sm mb-0.5">GoPay</h4>
                                    <p class="text-xs text-gray-400">Terhubung</p>
                                </div>
                            </div>
                            <button class="text-gray-400 hover:text-gray-600"><i class="fa-solid fa-ellipsis-vertical px-2"></i></button>
                        </div>
                    </div>

                    <div class="bg-[#F0F5FF] rounded-xl p-3 flex justify-center items-center gap-2 text-xs font-semibold text-[#0A58CA]">
                        <i class="fa-solid fa-lock"></i> Data pembayaran Anda aman dan terenkripsi
                    </div>
                </div>

            </div>

            <div class="lg:col-span-7 flex flex-col gap-6">
                
                <div class="bg-white rounded-3xl p-6 md:p-8 border border-gray-100 shadow-[0_4px_20px_-5px_rgba(0,0,0,0.02)]">
                    <div class="flex justify-between items-center mb-6">
                        <div class="flex items-center gap-3">
                            <i class="fa-solid fa-location-dot text-blue-600 text-xl"></i>
                            <h2 class="text-lg font-bold text-gray-900">Alamat Tersimpan</h2>
                        </div>
                        <button class="text-[#0A58CA] hover:text-blue-800 text-sm font-semibold transition">
                            Lihat Semua
                        </button>
                    </div>

                    <div class="flex flex-col gap-4">
                        <div class="border border-gray-100 rounded-2xl p-5 bg-[#FAFCFF] relative">
                            <div class="absolute top-5 right-5 flex gap-2 text-gray-400">
                                <button class="hover:text-[#0A58CA] transition"><i class="fa-solid fa-pen text-sm"></i></button>
                                <button class="hover:text-red-500 transition ml-2"><i class="fa-solid fa-ellipsis-vertical text-sm"></i></button>
                            </div>
                            
                            <div class="flex items-start gap-4 pr-12">
                                <div class="w-10 h-10 rounded-full bg-white border border-blue-100 text-blue-600 flex items-center justify-center shrink-0">
                                    <i class="fa-solid fa-house"></i>
                                </div>
                                <div>
                                    <div class="flex items-center gap-3 mb-2">
                                        <h4 class="font-bold text-gray-900 text-base">Rumah</h4>
                                        <span class="bg-blue-100 text-blue-700 text-[10px] font-bold px-2 py-0.5 rounded uppercase">Utama</span>
                                    </div>
                                    <p class="text-sm text-gray-500 leading-relaxed">
                                        Jl. Sudirman No. 45<br>
                                        Kebayoran Baru, Jakarta Selatan<br>
                                        12190
                                    </p>
                                </div>
                            </div>
                        </div>

                        <button class="border-2 border-dashed border-gray-200 rounded-2xl p-5 flex flex-col items-center justify-center gap-2 hover:border-blue-400 hover:bg-blue-50 transition group">
                            <div class="w-8 h-8 rounded-full bg-[#0A58CA] text-white flex items-center justify-center group-hover:scale-110 transition duration-300">
                                <i class="fa-solid fa-plus text-sm"></i>
                            </div>
                            <span class="text-sm font-semibold text-[#0A58CA]">Tambah Alamat Baru</span>
                        </button>
                    </div>
                </div>

                <div class="bg-white rounded-3xl p-6 md:p-8 border border-gray-100 shadow-[0_4px_20px_-5px_rgba(0,0,0,0.02)] flex-grow">
                    <div class="flex justify-between items-center mb-8">
                        <div class="flex items-center gap-3">
                            <i class="fa-solid fa-clock-rotate-left text-blue-600 text-xl"></i>
                            <h2 class="text-lg font-bold text-gray-900">Aktivitas Terbaru</h2>
                        </div>
                        <button class="text-[#0A58CA] hover:text-blue-800 text-sm font-semibold transition">
                            Lihat Semua
                        </button>
                    </div>

                    <div class="flex flex-col gap-6">
                        <div class="flex items-start justify-between pb-6 border-b border-gray-50">
                            <div class="flex items-start gap-4">
                                <div class="w-12 h-12 rounded-xl bg-[#F0F5FF] text-[#0A58CA] flex items-center justify-center shrink-0">
                                    <i class="fa-solid fa-washing-machine text-lg"></i>
                                </div>
                                <div>
                                    <h4 class="font-bold text-gray-900 text-sm mb-1">Cuci & Lipat Premium</h4>
                                    <p class="text-[11px] text-gray-400 mb-1">Pesanan #LC-2024-8902 • 4.5 kg</p>
                                    <p class="text-xs text-gray-500 font-medium">Perkiraan Pengiriman: Besok, 14:00</p>
                                </div>
                            </div>
                            <span class="bg-[#FFF0ED] text-[#FF5A36] text-[10px] font-extrabold px-3 py-1 rounded-md uppercase tracking-wider">Dicuci</span>
                        </div>

                        <div class="flex items-start justify-between">
                            <div class="flex items-start gap-4">
                                <div class="w-12 h-12 rounded-xl bg-gray-50 text-gray-400 flex items-center justify-center shrink-0">
                                    <i class="fa-solid fa-check text-lg"></i>
                                </div>
                                <div>
                                    <h4 class="font-bold text-gray-900 text-sm mb-1">Cuci Kering</h4>
                                    <p class="text-[11px] text-gray-400 mb-1">Pesanan #LC-2024-8850 • 2 Barang</p>
                                    <p class="text-xs text-gray-500 font-medium mb-3">Dikirim pada 24 Okt, 2024</p>
                                </div>
                            </div>
                            <div class="flex flex-col items-end gap-3">
                                <span class="bg-[#E6F9EE] text-[#00A153] text-[10px] font-extrabold px-3 py-1 rounded-md uppercase tracking-wider">Selesai</span>
                                <button class="text-[#0A58CA] text-xs font-bold hover:text-blue-800 transition">Pesan Ulang</button>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </div>
    </div>
</x-app-layout>