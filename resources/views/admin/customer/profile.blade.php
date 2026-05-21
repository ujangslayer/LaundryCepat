<x-app-layout>
    <div class="max-w-7xl mx-auto py-8 px-4 xl:px-0">
        
        @if(session('success'))
            <div class="mb-6 p-4 bg-green-50 border border-green-200 text-green-700 rounded-2xl font-semibold text-sm flex items-center gap-2">
                <i class="fa-solid fa-circle-check text-green-500 text-base"></i> {{ session('success') }}
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 lg:gap-8">
            
            <div class="lg:col-span-5 flex flex-col gap-6">
                
                <div class="bg-white rounded-3xl p-6 md:p-8 border border-gray-100 shadow-[0_4px_20px_-5px_rgba(0,0,0,0.02)] flex items-center gap-6">
                    <div class="relative shrink-0">
                        <div class="w-20 h-20 md:w-24 md:h-24 rounded-full bg-blue-50 text-[#0A58CA] border-4 border-white shadow-md flex items-center justify-center text-2xl font-black uppercase">
                            {{ substr($user->name, 0, 2) }}
                        </div>
                    </div>
                    <div>
                        <h1 class="text-2xl font-bold text-gray-900 mb-1">{{ $user->name }}</h1>
                        <p class="text-sm text-gray-500 flex items-center gap-2">
                            <i class="fa-regular fa-envelope text-gray-400"></i> {{ $user->email }}
                        </p>
                        <p class="text-xs text-gray-400 mt-1 uppercase font-bold tracking-wider bg-gray-100 px-2 py-0.5 rounded inline-block">
                            Role: {{ $user->role }}
                        </p>
                    </div>
                </div>

                <div class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-3xl p-6 md:p-8 border border-blue-100/50">
                    <h3 class="font-bold text-gray-900 mb-2 flex items-center gap-2 text-base">
                        <i class="fa-solid fa-truck-fast text-[#0A58CA]"></i> Pentingnya Alamat Rumah
                    </h3>
                    <p class="text-xs text-gray-600 leading-relaxed font-medium">
                        Pastikan Anda mengisi alamat rumah dengan lengkap dan benar. Alamat ini akan otomatis digunakan oleh kurir kami sebagai titik lokasi penjemputan dan pengantaran pakaian saat Anda memilih opsi layanan <span class="font-bold text-blue-700">Pickup & Delivery</span> pada form booking laundry.
                    </p>
                </div>
            </div>

            <div class="lg:col-span-7">
                <div class="bg-white rounded-3xl p-6 md:p-8 border border-gray-100 shadow-[0_4px_20px_-5px_rgba(0,0,0,0.02)]">
                    <h2 class="text-xl font-bold text-gray-900 mb-1">Informasi Akun</h2>
                    <p class="text-xs text-gray-400 mb-6 font-medium">Perbarui detail personal, nomor kontak WhatsApp, dan alamat tempat tinggal Anda.</p>

                    <form action="{{ route('customer.profil.update') }}" method="POST" class="space-y-5">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            <div>
                                <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Nama Lengkap</label>
                                <input type="text" name="name" value="{{ old('name', $user->name) }}" required 
                                       class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 text-sm focus:border-blue-500 focus:ring-blue-500 font-semibold text-gray-700">
                                @error('name') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Alamat Email</label>
                                <input type="email" name="email" value="{{ old('email', $user->email) }}" required 
                                       class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 text-sm focus:border-blue-500 focus:ring-blue-500 font-semibold text-gray-700">
                                @error('email') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Nomor WhatsApp / Telepon</label>
                            <input type="text" name="nomer_telepon" value="{{ old('nomer_telepon', $user->nomer_telepon) }}" placeholder="Contoh: 081234567890"
                                   class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 text-sm focus:border-blue-500 focus:ring-blue-500 font-semibold text-gray-700">
                            @error('nomer_telepon') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Alamat Lengkap Rumah</label>
                            <textarea name="alamat" rows="4" placeholder="Tulis alamat pendaratan kurir: nama jalan, nomor rumah, RT/RW, kelurahan, kecamatan, serta patokan khusus rumah Anda..."
                                      class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 text-sm focus:border-blue-500 focus:ring-blue-500 text-gray-700 font-medium">{{ old('alamat', $user->alamat) }}</textarea>
                            @error('alamat') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                        </div>

                        <div class="border-t border-gray-100 pt-5 mt-2">
                            <h3 class="text-xs font-bold text-gray-800 mb-4 flex items-center gap-2 uppercase tracking-wider">
                                <i class="fa-solid fa-lock text-gray-400"></i> Ubah Password (Kosongkan jika tidak diganti)
                            </h3>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                                <div>
                                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Password Baru</label>
                                    <input type="password" name="password" placeholder="Minimal 8 karakter"
                                           class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 text-sm focus:border-blue-500 focus:ring-blue-500 text-gray-700">
                                    @error('password') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                                </div>

                                <div>
                                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Konfirmasi Password Baru</label>
                                    <input type="password" name="password_confirmation" placeholder="Ulangi password baru"
                                           class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 text-sm focus:border-blue-500 focus:ring-blue-500 text-gray-700">
                                </div>
                            </div>
                        </div>

                        <div class="flex justify-end pt-2">
                            <button type="submit" class="bg-[#0A58CA] hover:bg-blue-800 text-white font-semibold px-6 py-3 rounded-xl text-sm transition shadow-md flex items-center gap-2">
                                <i class="fa-solid fa-floppy-disk"></i> Simpan Perubahan Profil
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>