<x-admin-layout>
    <div class="mb-6">
        <a href="{{ route('admin.orders.index') }}" class="inline-flex items-center text-sm font-bold text-gray-500 hover:text-[#0A58CA] transition">
            <i class="fa-solid fa-arrow-left mr-2"></i> Kembali ke Daftar Pesanan
        </a>
    </div>

    <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-8">
        <div>
            <div class="flex items-center gap-3 mb-1">
                <h2 class="text-3xl font-extrabold text-gray-900">Pesanan #LC-84729</h2>
                <span class="bg-blue-50 text-blue-600 text-xs font-bold px-3 py-1 rounded-full uppercase">Lunas</span>
            </div>
            <p class="text-sm text-gray-500">Dibuat pada 24 Oktober 2023 • 14:20 WIB</p>
        </div>
        
        <div class="flex items-center gap-3">
            <button class="bg-white border border-gray-200 text-gray-600 px-5 py-2.5 rounded-xl text-sm font-bold hover:bg-gray-50 transition">
                <i class="fa-solid fa-print mr-2"></i>Cetak Struk
            </button>
            <button @click="showModal = true" class="bg-[#0A58CA] text-white px-6 py-2.5 rounded-xl text-sm font-bold hover:bg-blue-700 shadow-lg shadow-blue-100 transition">
                Update Status
            </button>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="lg:col-span-2 space-y-6">
            <div class="bg-white rounded-3xl border border-gray-100 shadow-sm p-8">
                <h3 class="text-lg font-bold text-gray-900 mb-6">Rincian Layanan</h3>
                <div class="space-y-4">
                    <div class="flex justify-between items-center p-4 bg-gray-50 rounded-2xl">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-white rounded-xl flex items-center justify-center text-blue-600 shadow-sm">
                                <i class="fa-solid fa-shirt text-xl"></i>
                            </div>
                            <div>
                                <p class="font-bold text-gray-900">Cuci Kering + Setrika</p>
                                <p class="text-xs text-gray-500">Kategori: Satuan</p>
                            </div>
                        </div>
                        <p class="font-bold text-gray-900">Rp 45.000</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="space-y-6">
            <div class="bg-white rounded-3xl border border-gray-100 shadow-sm p-6">
                <h3 class="text-lg font-bold text-gray-900 mb-4">Informasi Pelanggan</h3>
                <div class="flex items-center gap-4 mb-6">
                    <img src="https://ui-avatars.com/api/?name=Budi+Santoso&background=EBF3FF&color=0A58CA" class="w-12 h-12 rounded-full">
                    <div>
                        <p class="font-bold text-gray-900">Budi Santoso</p>
                        <p class="text-xs text-gray-500">Member Premium</p>
                    </div>
                </div>
                <div class="space-y-3">
                    <div class="flex gap-3 text-sm">
                        <i class="fa-solid fa-phone text-gray-400 mt-1"></i>
                        <p class="text-gray-600">0812-3456-7890</p>
                    </div>
                    <div class="flex gap-3 text-sm">
                        <i class="fa-solid fa-location-dot text-gray-400 mt-1"></i>
                        <p class="text-gray-600">Jl. Mawar No. 123, Kel. Merdeka, Kec. Kemandirian, Jakarta Selatan</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>