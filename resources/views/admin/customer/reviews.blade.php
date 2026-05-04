<x-app-layout>
    <div class="max-w-7xl mx-auto py-10 px-4 xl:px-0">
        
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-16">
            
            <div class="lg:col-span-7 flex flex-col gap-10">
                
                <div>
                    <h1 class="text-4xl md:text-5xl font-extrabold text-[#0B214A] mb-4 leading-tight">
                        Bagaimana pelayanan kami?
                    </h1>
                    <p class="text-gray-500 text-base leading-relaxed max-w-xl">
                        Masukan Anda membantu kami mempertahankan standar premium yang Anda harapkan dari Laundry Cepat. Beri peringkat pada pesanan terbaru atau ajukan keluhan spesifik.
                    </p>
                </div>

                <div>
                    <h2 class="text-xl font-bold text-gray-900 mb-6">Pesanan Terbaru Menunggu Ulasan</h2>
                    
                    <div class="flex flex-col gap-6">
                        
                        <div class="bg-white rounded-3xl p-6 border border-gray-100 shadow-[0_4px_20px_-5px_rgba(0,0,0,0.02)]">
                            <div class="flex justify-between items-start mb-2">
                                <span class="text-[10px] font-extrabold text-[#0A58CA] uppercase tracking-wider">PESANAN #LC-8924</span>
                                <span class="bg-[#EBF3FF] text-[#0A58CA] text-[10px] font-bold px-3 py-1 rounded-full uppercase tracking-wider">Selesai</span>
                            </div>
                            
                            <h3 class="text-lg font-bold text-gray-900 mb-1">Cuci Kering Premium</h3>
                            <p class="text-sm text-gray-500 mb-6">Terkirim Kemarin, 14:30</p>

                            <div class="bg-gray-50 rounded-2xl p-5 mb-4">
                                <p class="text-sm font-medium text-gray-700 mb-3">Nilai pengalaman Anda</p>
                                <div class="flex gap-3">
                                    @for ($i = 0; $i < 5; $i++)
                                        <button class="w-10 h-10 rounded-full bg-gray-200 text-gray-400 flex items-center justify-center hover:bg-gray-300 transition">
                                            <i class="fa-solid fa-star"></i>
                                        </button>
                                    @endfor
                                </div>
                            </div>

                            <button class="text-sm font-semibold text-[#0A58CA] flex items-center gap-2 hover:text-blue-800 transition">
                                <i class="fa-solid fa-triangle-exclamation text-xs"></i> Ajukan keluhan untuk pesanan ini
                            </button>
                        </div>

                        <div class="bg-white rounded-3xl p-6 border border-gray-100 shadow-[0_4px_20px_-5px_rgba(0,0,0,0.02)]">
                            <div class="flex justify-between items-start mb-2">
                                <span class="text-[10px] font-extrabold text-[#0A58CA] uppercase tracking-wider">PESANAN #LC-8891</span>
                                <span class="bg-[#EBF3FF] text-[#0A58CA] text-[10px] font-bold px-3 py-1 rounded-full uppercase tracking-wider">Selesai</span>
                            </div>
                            
                            <h3 class="text-lg font-bold text-gray-900 mb-1">Cuci & Lipat Standar</h3>
                            <p class="text-sm text-gray-500 mb-6">Terkirim 12 Okt, 10:00</p>

                            <div class="bg-gray-50 rounded-2xl p-5 mb-4">
                                <p class="text-sm font-medium text-gray-700 mb-3">Nilai pengalaman Anda</p>
                                <div class="flex gap-3">
                                    @for ($i = 0; $i < 4; $i++)
                                        <button class="w-10 h-10 rounded-full bg-[#FFE8D6] text-[#E87B35] flex items-center justify-center hover:bg-[#ffdfc4] transition">
                                            <i class="fa-solid fa-star"></i>
                                        </button>
                                    @endfor
                                    <button class="w-10 h-10 rounded-full bg-gray-200 text-gray-400 flex items-center justify-center hover:bg-gray-300 transition">
                                        <i class="fa-solid fa-star"></i>
                                    </button>
                                </div>
                            </div>

                            <button class="text-sm font-semibold text-[#0A58CA] flex items-center gap-2 hover:text-blue-800 transition">
                                <i class="fa-solid fa-triangle-exclamation text-xs"></i> Ajukan keluhan untuk pesanan ini
                            </button>
                        </div>

                    </div>
                </div>
            </div>

            <div class="lg:col-span-5">
                <div class="bg-white rounded-[2rem] p-8 border border-gray-100 shadow-[0_10px_40px_-15px_rgba(6,81,237,0.1)] lg:sticky lg:top-8">
                    
                    <h2 class="text-2xl font-bold text-gray-900 mb-2">Kirim Masukan</h2>
                    <p class="text-sm text-gray-500 mb-8">
                        Tidak puas dengan layanan kami? Beritahu kami detailnya agar kami dapat memperbaikinya.
                    </p>

                    <form action="#" method="POST" class="flex flex-col gap-6">
                        <div>
                            <label class="block text-sm font-bold text-gray-900 mb-3">Apa yang menjadi masalah?</label>
                            <div class="flex flex-wrap gap-2">
                                <button type="button" class="bg-[#0A58CA] text-white px-4 py-2 rounded-full text-sm font-medium transition shadow-md">
                                    Noda Tersisa
                                </button>
                                <button type="button" class="bg-[#EBF3FF] text-[#0B214A] hover:bg-blue-100 px-4 py-2 rounded-full text-sm font-medium transition">
                                    Pengiriman Terlambat
                                </button>
                                <button type="button" class="bg-[#EBF3FF] text-[#0B214A] hover:bg-blue-100 px-4 py-2 rounded-full text-sm font-medium transition">
                                    Barang Rusak
                                </button>
                                <button type="button" class="bg-[#EBF3FF] text-[#0B214A] hover:bg-blue-100 px-4 py-2 rounded-full text-sm font-medium transition">
                                    Barang Hilang
                                </button>
                                <button type="button" class="bg-[#EBF3FF] text-[#0B214A] hover:bg-blue-100 px-4 py-2 rounded-full text-sm font-medium transition">
                                    Lainnya
                                </button>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-gray-900 mb-2">Pesanan Terkait (Opsional)</label>
                            <div class="relative">
                                <select class="w-full bg-gray-50 border border-gray-200 text-gray-700 py-3.5 px-4 rounded-xl appearance-none focus:outline-none focus:ring-2 focus:ring-[#0A58CA] focus:border-transparent text-sm">
                                    <option value="">Pilih pesanan...</option>
                                    <option value="8924">#LC-8924 - Cuci Kering Premium</option>
                                    <option value="8891">#LC-8891 - Cuci & Lipat Standar</option>
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-gray-500">
                                    <i class="fa-solid fa-chevron-down text-xs"></i>
                                </div>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-gray-900 mb-2">Detail</label>
                            <textarea rows="4" class="w-full bg-gray-50 border border-gray-200 text-gray-700 py-3.5 px-4 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#0A58CA] focus:border-transparent text-sm resize-none placeholder-gray-400" placeholder="Jelaskan masalahnya secara detail..."></textarea>
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-gray-900 mb-2">Lampirkan Foto (Opsional)</label>
                            <div class="border-2 border-dashed border-gray-200 rounded-xl bg-white hover:bg-gray-50 transition p-6 flex flex-col items-center justify-center text-center cursor-pointer">
                                <i class="fa-regular fa-image text-2xl text-gray-400 mb-3"></i>
                                <p class="text-sm text-gray-600 mb-1"><span class="text-[#0A58CA] font-semibold">Unggah file</span> atau seret dan lepas</p>
                                <p class="text-xs text-gray-400">PNG, JPG hingga 10MB</p>
                            </div>
                        </div>

                        <button type="submit" class="w-full bg-[#0A58CA] hover:bg-blue-800 text-white py-3.5 rounded-xl font-semibold text-sm transition mt-2 shadow-[0_4px_14px_0_rgba(10,88,202,0.39)]">
                            Kirim Masukan
                        </button>
                    </form>

                </div>
            </div>

        </div>
    </div>
</x-app-layout>