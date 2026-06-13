<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center p-4 sm:p-8">
        <div class="max-w-5xl w-full bg-white rounded-[2rem] shadow-[0_20px_50px_-12px_rgba(0,0,0,0.1)] overflow-hidden flex flex-col md:flex-row">
            
            <div class="md:w-1/2 relative min-h-[400px] md:min-h-[600px]">
                <img src="https://images.unsplash.com/photo-1545173168-9f1947eebb7f?q=80&w=2071&auto=format&fit=crop" 
                     class="absolute inset-0 w-full h-full object-cover" alt="Laundry">
                <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                
                <div class="absolute bottom-10 left-10 right-10 bg-white/90 backdrop-blur-sm p-6 rounded-2xl shadow-lg">
                    <h3 class="text-lg font-bold text-[#0A58CA] mb-2">Perawatan Pakaian Premium</h3>
                    <p class="text-sm text-gray-600 leading-relaxed">
                        Kami tidak sekadar mencuci, kami merawat setiap serat pakaian Anda dengan presisi profesional.
                    </p>
                </div>
            </div>

            <div class="md:w-1/2 p-10 md:p-14 flex flex-col justify-center bg-white">
                <h2 class="text-3xl font-extrabold text-[#0A58CA] mb-3 tracking-tight">Selamat Datang di<br>Laundry Cepat</h2>
                <p class="text-gray-500 text-sm mb-8 leading-relaxed">Masuk untuk melanjutkan pengalaman laundry premium Anda dengan Laundry Cepat.</p>

                <form method="POST" action="{{ route('login') }}" class="space-y-5">
                    @csrf
                    <div>
                        <label class="block text-[11px] font-extrabold text-gray-500 uppercase tracking-widest mb-2">Email</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-gray-400">
                                <i class="fa-regular fa-envelope"></i>
                            </span>
                            <input type="email" name="email" placeholder="nama@email.com" required
                                   class="w-full bg-gray-100 border-transparent rounded-xl py-3.5 pl-11 pr-4 focus:bg-white focus:ring-2 focus:ring-[#0A58CA] focus:border-transparent outline-none transition text-sm font-medium">
                        </div>
                    </div>

                    <div>
                        <div class="flex justify-between items-end mb-2">
                            <label class="text-[11px] font-extrabold text-gray-500 uppercase tracking-widest">Kata Sandi</label>
                       
                        </div>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-gray-400">
                                <i class="fa-solid fa-lock"></i>
                            </span>
                            <input type="password" name="password" placeholder="••••••••" required
                                   class="w-full bg-gray-100 border-transparent rounded-xl py-3.5 pl-11 pr-4 focus:bg-white focus:ring-2 focus:ring-[#0A58CA] focus:border-transparent outline-none transition text-sm font-medium">
                        </div>
                    </div>

                    <button type="submit" class="w-full bg-[#0A58CA] text-white py-4 rounded-xl font-bold shadow-lg shadow-blue-500/30 hover:bg-blue-800 transition transform hover:-translate-y-0.5 mt-2">
                        MASUK
                    </button>
                </form>
                    <p class="mt-8 text-sm text-gray-500">
                        Belum punya akun? <a href="{{ route('register') }}" class="text-[#0A58CA] font-bold hover:underline">Daftar sekarang</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>