<x-app-layout>
    <div class="max-w-4xl mx-auto mb-10 pt-4">
        <h1 class="text-4xl font-extrabold text-gray-900 mb-3">Jadwalkan Layanan</h1>
        <p class="text-gray-500 text-lg max-w-2xl leading-relaxed">
            Sesuaikan pengalaman laundry Anda. Pilih layanan Anda, pilih waktu yang cocok untuk Anda, dan serahkan sisanya kepada kami.
        </p>
    </div>

    <form action="#" method="POST" class="max-w-4xl mx-auto bg-white rounded-[2rem] p-8 md:p-12 shadow-[0_4px_20px_-5px_rgba(6,81,237,0.05)] border border-gray-100">
        
        <div class="mb-12">
            <div class="flex items-center gap-4 mb-8">
                <div class="w-8 h-8 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center font-bold text-sm shrink-0">1</div>
                <h2 class="text-xl font-bold text-gray-900">Pilih Layanan</h2>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pl-0 md:pl-12">
                <label class="block relative cursor-pointer group h-full">
                    <input type="radio" name="service_type" value="cuci_lipat" class="peer sr-only" checked>
                    <div class="border-2 border-gray-100 rounded-3xl p-8 hover:border-blue-200 transition-all duration-200 peer-checked:border-blue-600 peer-checked:bg-[#FAFCFF] h-full flex flex-col relative overflow-hidden">
                        
                        <div class="w-12 h-12 rounded-full bg-blue-50 text-blue-500 flex items-center justify-center mb-6 shadow-sm">
                            <i class="fa-solid fa-washing-machine text-lg"></i>
                        </div>
                        
                        <h3 class="text-lg font-bold text-gray-900 mb-2">Cuci & Lipat</h3>
                        <p class="text-sm text-gray-500 mb-8 leading-relaxed flex-grow">Pencucian standar dan pelipatan rapi untuk pakaian sehari-hari.</p>
                        
                        <div class="flex justify-between items-center mt-auto">
                            <span class="font-bold text-blue-600 text-sm">Mulai Rp 15.000/kg</span>
                            <div class="w-6 h-6 rounded-full border-2 border-gray-300 flex items-center justify-center bg-white peer-checked:border-blue-600 transition-colors">
                                <div class="w-2.5 h-2.5 rounded-full bg-blue-600 opacity-0 transition-opacity"></div>
                            </div>
                        </div>
                        <style>
                            input[value="cuci_lipat"]:checked ~ div > div > div { opacity: 1; }
                        </style>
                    </div>
                </label>

                <label class="block relative cursor-pointer group h-full">
                    <input type="radio" name="service_type" value="cuci_kering" class="peer sr-only">
                    <div class="border-2 border-gray-100 rounded-3xl p-8 hover:border-blue-200 transition-all duration-200 peer-checked:border-blue-600 peer-checked:bg-[#FAFCFF] h-full flex flex-col relative overflow-hidden">
                        
                        <div class="w-12 h-12 rounded-full bg-blue-50 text-blue-500 flex items-center justify-center mb-6 shadow-sm">
                            <i class="fa-solid fa-shirt text-lg"></i>
                        </div>
                        
                        <h3 class="text-lg font-bold text-gray-900 mb-2">Cuci Kering</h3>
                        <p class="text-sm text-gray-500 mb-8 leading-relaxed flex-grow">Perawatan premium untuk kain halus dan setelan jas.</p>
                        
                        <div class="flex justify-between items-center mt-auto">
                            <span class="font-bold text-blue-600 text-sm">Mulai Rp 30.000/kg</span>
                            <div class="w-6 h-6 rounded-full border-2 border-gray-300 flex items-center justify-center bg-white peer-checked:border-blue-600 transition-colors">
                                <div class="w-2.5 h-2.5 rounded-full bg-blue-600 opacity-0 transition-opacity"></div>
                            </div>
                        </div>
                        <style>
                            input[value="cuci_kering"]:checked ~ div > div > div { opacity: 1; }
                        </style>
                    </div>
                </label>
            </div>
        </div>

        <div class="mb-12">
            <div class="flex items-center gap-4 mb-8">
                <div class="w-8 h-8 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center font-bold text-sm shrink-0">2</div>
                <h2 class="text-xl font-bold text-gray-900">Jadwalkan Penjemputan</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 pl-0 md:pl-12">
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-5 pointer-events-none">
                        <i class="fa-regular fa-calendar text-gray-500"></i>
                    </div>
                    <input type="text" class="bg-[#F4F7FB] border border-transparent text-gray-700 text-sm rounded-xl focus:ring-blue-500 focus:border-blue-500 block w-full pl-12 p-4 font-medium" value="10/05/2026" readonly>
                </div>

                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-5 pointer-events-none">
                        <i class="fa-regular fa-clock text-gray-500"></i>
                    </div>
                    <select class="bg-[#F4F7FB] border border-transparent text-gray-700 text-sm rounded-xl focus:ring-blue-500 focus:border-blue-500 block w-full pl-12 p-4 font-medium appearance-none cursor-pointer">
                        <option>08:00 Pagi - 10:00 Pagi</option>
                        <option>10:00 Pagi - 12:00 Siang</option>
                        <option>13:00 Siang - 15:00 Sore</option>
                    </select>
                    <div class="absolute inset-y-0 right-0 flex items-center pr-5 pointer-events-none">
                        <i class="fa-solid fa-chevron-down text-gray-400 text-sm"></i>
                    </div>
                </div>

                <div class="relative md:col-span-2">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-5 pointer-events-none">
                        <i class="fa-solid fa-location-dot text-gray-500"></i>
                    </div>
                    <input type="text" class="bg-[#F4F7FB] border border-transparent text-gray-700 text-sm rounded-xl focus:ring-blue-500 focus:border-blue-500 block w-full pl-12 p-4 font-medium" value="Jalan Sudirman No. 123, Apt 4B">
                </div>
            </div>
        </div>

        <div class="mb-4">
            <div class="flex items-center gap-4 mb-8">
                <div class="w-8 h-8 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center font-bold text-sm shrink-0">3</div>
                <h2 class="text-xl font-bold text-gray-900">Metode Pembayaran</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 pl-0 md:pl-12">
                <label class="block relative cursor-pointer group">
                    <input type="radio" name="payment_method" value="cod" class="peer sr-only" checked>
                    <div class="border-2 border-gray-100 rounded-2xl p-5 hover:border-blue-200 transition-all duration-200 peer-checked:border-blue-600 peer-checked:bg-[#FAFCFF] flex items-center justify-between">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 rounded-full bg-[#F4F7FB] text-gray-600 flex items-center justify-center">
                                <i class="fa-solid fa-money-bill-wave text-lg"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-900 text-sm mb-0.5">Bayar di Tempat</h4>
                                <p class="text-xs text-gray-500">Bayar saat pakaian tiba</p>
                            </div>
                        </div>
                        <div class="w-6 h-6 rounded-full border-2 border-gray-300 flex items-center justify-center bg-white peer-checked:border-blue-600 transition-colors">
                            <div class="w-2.5 h-2.5 rounded-full bg-blue-600 opacity-0 transition-opacity"></div>
                        </div>
                        <style>
                            input[value="cod"]:checked ~ div > div:last-child > div { opacity: 1; }
                        </style>
                    </div>
                </label>

                <label class="block relative cursor-pointer group">
                    <input type="radio" name="payment_method" value="online" class="peer sr-only">
                    <div class="border-2 border-gray-100 rounded-2xl p-5 hover:border-blue-200 transition-all duration-200 peer-checked:border-blue-600 peer-checked:bg-[#FAFCFF] flex items-center justify-between">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 rounded-full bg-[#F4F7FB] text-gray-600 flex items-center justify-center">
                                <i class="fa-regular fa-credit-card text-lg"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-900 text-sm mb-0.5">Pembayaran Online</h4>
                                <p class="text-xs text-gray-500">Kartu atau e-Wallet</p>
                            </div>
                        </div>
                        <div class="w-6 h-6 rounded-full border-2 border-gray-300 flex items-center justify-center bg-white peer-checked:border-blue-600 transition-colors">
                            <div class="w-2.5 h-2.5 rounded-full bg-blue-600 opacity-0 transition-opacity"></div>
                        </div>
                        <style>
                            input[value="online"]:checked ~ div > div:last-child > div { opacity: 1; }
                        </style>
                    </div>
                </label>
            </div>
        </div>

        <div class="flex flex-col-reverse md:flex-row justify-end items-center gap-4 md:gap-8 mt-12 border-t border-gray-100 pt-8 pl-0 md:pl-12">
            <a href="/dashboard" class="text-blue-600 font-semibold text-sm hover:text-blue-800 transition w-full md:w-auto text-center">Batal</a>
            <button type="submit" class="bg-[#0A58CA] hover:bg-blue-800 text-white px-8 py-3.5 rounded-full font-semibold transition flex items-center justify-center gap-2 shadow-[0_4px_14px_0_rgba(10,88,202,0.39)] w-full md:w-auto text-sm">
                Konfirmasi Pemesanan <i class="fa-solid fa-arrow-right text-xs"></i>
            </button>
        </div>

    </form>
</x-app-layout>