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
            <a href="{{ route('customer.booking') }}" class="flex-1 md:flex-none bg-white hover:bg-gray-50 text-[#0A58CA] px-8 py-3 rounded-full text-sm font-bold text-center transition-all shadow-md shadow-black/5 hover:scale-[1.02] active:scale-[0.98]">
                <i class="fa-solid fa-plus mr-2 text-xs"></i> Pesan Laundry
            </a>
        </div>
    </div>

    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6 mb-8">
        <div class="bg-white p-5 md:p-6 rounded-3xl border border-gray-100 shadow-[0_4px_20px_-5px_rgba(0,0,0,0.02)] relative overflow-hidden group hover:border-blue-100 transition-all duration-300">
            <div class="flex justify-between items-start mb-4">
                <div class="w-12 h-12 rounded-2xl bg-blue-50 text-[#0A58CA] flex items-center justify-center text-lg font-bold group-hover:scale-110 transition-transform duration-300">
                    <i class="fa-solid fa-spinner animate-spin-slow"></i>
                </div>
            </div>
            <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">Cucian Aktif</p>
            <h3 class="text-2xl md:text-3xl font-extrabold text-gray-900 tracking-tight">{{ $pesananAktif }}</h3>
        </div>

        <div class="bg-white p-5 md:p-6 rounded-3xl border border-gray-100 shadow-[0_4px_20px_-5px_rgba(0,0,0,0.02)] relative overflow-hidden group hover:border-green-100 transition-all duration-300">
            <div class="flex justify-between items-start mb-4">
                <div class="w-12 h-12 rounded-2xl bg-green-50 text-green-600 flex items-center justify-center text-lg font-bold group-hover:scale-110 transition-transform duration-300">
                    <i class="fa-solid fa-circle-check"></i>
                </div>
            </div>
            <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">Cucian Selesai</p>
            <h3 class="text-2xl md:text-3xl font-extrabold text-gray-900 tracking-tight">{{ $pesananSelesai }}</h3>
        </div>

        <div class="bg-white p-5 md:p-6 rounded-3xl border border-gray-100 shadow-[0_4px_20px_-5px_rgba(0,0,0,0.02)] relative overflow-hidden group hover:border-purple-100 transition-all duration-300">
            <div class="flex justify-between items-start mb-4">
                <div class="w-12 h-12 rounded-2xl bg-purple-50 text-purple-600 flex items-center justify-center text-lg font-bold group-hover:scale-110 transition-transform duration-300">
                    <i class="fa-solid fa-folder-open"></i>
                </div>
            </div>
            <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">Total Pesanan</p>
            <h3 class="text-2xl md:text-3xl font-extrabold text-gray-900 tracking-tight">{{ $totalPesanan }}</h3>
        </div>

        <div class="bg-white p-5 md:p-6 rounded-3xl border border-gray-100 shadow-[0_4px_20px_-5px_rgba(0,0,0,0.02)] relative overflow-hidden group hover:border-amber-100 transition-all duration-300">
            <div class="flex justify-between items-start mb-4">
                <div class="w-12 h-12 rounded-2xl bg-amber-50 text-amber-600 flex items-center justify-center text-lg font-bold group-hover:scale-110 transition-transform duration-300">
                    <i class="fa-solid fa-wallet"></i>
                </div>
            </div>
            <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">Total Pengeluaran</p>
            <h3 class="text-xl md:text-2xl font-extrabold text-gray-900 tracking-tight">Rp {{ number_format($totalPengeluaran, 0, ',', '.') }}</h3>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 lg:gap-8">
        
        <div class="lg:col-span-7 bg-white rounded-[2rem] p-6 md:p-8 border border-gray-100 shadow-[0_4px_20px_-5px_rgba(0,0,0,0.02)] flex flex-col">
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h2 class="text-lg font-extrabold text-gray-900 tracking-tight">Pesanan Terakhir</h2>
                    <p class="text-xs text-gray-400 mt-0.5">5 Transaksi laundry terbaru Anda</p>
                </div>
                <a href="{{ route('customer.history') }}" class="text-xs font-bold text-[#0A58CA] hover:text-blue-800 transition-colors flex items-center gap-1 bg-blue-50/50 px-3 py-1.5 rounded-full">
                    Lihat Semua <i class="fa-solid fa-arrow-right text-[10px]"></i>
                </a>
            </div>

            <div class="flex flex-col gap-4">
                @forelse($recentOrders as $pesanan)
                    <div class="flex items-center justify-between p-3 bg-white border border-gray-100 rounded-2xl hover:shadow-sm transition-shadow">
                        <div class="flex items-center gap-4">
                            <div class="w-10 h-10 rounded-full bg-blue-50 flex items-center justify-center text-[#0A58CA]">
                                <i class="fa-solid fa-receipt text-sm"></i>
                            </div>
                            <div>
                                <h4 class="text-sm font-bold text-gray-900">#{{ $pesanan->order_number }}</h4>
                                <p class="text-xs text-gray-500 mt-0.5 uppercase">
                                    {{ $pesanan->payment_method }} • {{ $pesanan->delivery_option }}
                                </p>
                            </div>
                        </div>
                        
                        <div class="flex flex-col items-end gap-1">
                            <span class="text-sm font-extrabold text-[#0A58CA]">
                                Rp {{ number_format($pesanan->total_harga, 0, ',', '.') }}
                            </span>
                            
                            <span class="text-[10px] font-bold px-2.5 py-0.5 rounded-full uppercase
                                @if($pesanan->status == 'completed') bg-green-50 text-green-600
                                @elseif($pesanan->status == 'pending') bg-yellow-50 text-yellow-600
                                @else bg-blue-50 text-blue-600 @endif">
                                {{ $pesanan->status }}
                            </span>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-8 text-gray-400 text-sm">
                        <i class="fa-solid fa-folder-open text-3xl mb-2 text-gray-300 block"></i>
                        Belum ada riwayat pesanan laundry.
                    </div>
                @endforelse
            </div>
        </div>

        <div class="lg:col-span-5 flex flex-col gap-6 lg:gap-8">
            
            <div class="bg-white rounded-[2rem] p-6 border border-gray-100 shadow-[0_4px_20px_-5px_rgba(0,0,0,0.02)]">
                <h3 class="text-base font-extrabold text-gray-900 mb-4 tracking-tight">Akses Cepat</h3>
                <div class="grid grid-cols-2 gap-3">
                    <a href="{{ route('customer.booking') }}" class="p-4 rounded-2xl bg-blue-50/50 hover:bg-blue-50 border border-blue-50/20 text-center transition-all group">
                        <div class="w-10 h-10 rounded-xl bg-white text-[#0A58CA] flex items-center justify-center mx-auto mb-3 shadow-sm group-hover:scale-110 transition-transform">
                            <i class="fa-solid fa-circle-plus text-base"></i>
                        </div>
                        <span class="text-xs font-bold text-gray-800">Booking Baru</span>
                    </a>
                    <a href="{{ route('customer.history') }}" class="p-4 rounded-2xl bg-purple-50/50 hover:bg-purple-50 border border-purple-50/20 text-center transition-all group">
                        <div class="w-10 h-10 rounded-xl bg-white text-purple-600 flex items-center justify-center mx-auto mb-3 shadow-sm group-hover:scale-110 transition-transform">
                            <i class="fa-solid fa-clock-rotate-left text-base"></i>
                        </div>
                        <span class="text-xs font-bold text-gray-800">Riwayat Laundry</span>
                    </a>
                </div>
            </div>

            <div class="bg-white rounded-[2rem] p-6 border border-gray-100 shadow-[0_4px_20px_-5px_rgba(0,0,0,0.02)]">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-base font-extrabold text-gray-900 tracking-tight">Informasi Status</h3>
                </div>
                
                <div class="flex flex-col gap-4">
                    <div class="flex items-center justify-between group cursor-pointer p-2 -mx-2 rounded-xl hover:bg-gray-50 transition-colors">
                        <div class="flex items-center gap-4">
                            <div class="w-10 h-10 rounded-full bg-blue-50 flex items-center justify-center text-[#0A58CA] border border-gray-100 group-hover:border-blue-300 transition-colors">
                                <i class="fa-solid fa-receipt text-sm"></i>
                            </div>
                            <div>
                                <h4 class="text-sm font-bold text-gray-900 group-hover:text-blue-600 transition">Pending / Picked up</h4>
                                <p class="text-xs text-gray-500 mt-0.5">Pesanan masuk & kurir menjemput pakaian</p>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center justify-between group cursor-pointer p-2 -mx-2 rounded-xl hover:bg-gray-50 transition-colors">
                        <div class="flex items-center gap-4">
                            <div class="w-10 h-10 rounded-full bg-blue-50 flex items-center justify-center text-[#0A58CA] border border-gray-100 group-hover:border-blue-300 transition-colors">
                                <i class="fa-solid fa-soap text-sm"></i>
                            </div>
                            <div>
                                <h4 class="text-sm font-bold text-gray-900 group-hover:text-blue-600 transition">Washing / Ironing</h4>
                                <p class="text-xs text-gray-500 mt-0.5">Pakaian sedang dicuci atau disetrika rapi</p>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center justify-between group cursor-pointer p-2 -mx-2 rounded-xl hover:bg-gray-50 transition-colors">
                        <div class="flex items-center gap-4">
                            <div class="w-10 h-10 rounded-full bg-blue-50 flex items-center justify-center text-[#0A58CA] border border-gray-100 group-hover:border-blue-300 transition-colors">
                                <i class="fa-solid fa-box-open text-sm"></i>
                            </div>
                            <div>
                                <h4 class="text-sm font-bold text-gray-900 group-hover:text-blue-600 transition">Ready / Completed</h4>
                                <p class="text-xs text-gray-500 mt-0.5">Selesai dikemas & siap antar / diambil</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    
    <style>
        .animate-spin-slow {
            animation: spin 3s linear infinite;
        }
        @keyframes spin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }
    </style>
</x-app-layout>