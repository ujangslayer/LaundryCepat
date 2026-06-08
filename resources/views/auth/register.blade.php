<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gray-100 p-6">
        <div class="max-w-5xl w-full bg-white rounded-[2.5rem] shadow-xl overflow-hidden flex flex-col md:flex-row">
            
            <div class="md:w-1/2 bg-[#0A58CA] relative p-12 flex flex-col justify-between overflow-hidden text-white">
                <div class="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full -mr-32 -mt-32"></div>
                <div class="absolute bottom-0 left-0 w-96 h-96 bg-blue-400/20 rounded-full -ml-48 -mb-48 blur-3xl"></div>

                <div class="relative z-10">
                    <div class="w-16 h-16 bg-white rounded-2xl flex items-center justify-center mb-10 shadow-lg">
                        <i class="fa-solid fa-droplet text-[#0A58CA] text-3xl"></i>
                    </div>
                    <h1 class="text-5xl font-extrabold leading-tight mb-6">Kebersihan Premium, Waktu Anda.</h1>
                    <p class="text-blue-100 text-lg leading-relaxed max-w-sm">
                        Bergabunglah dengan Laundry Cepat untuk pengalaman pencucian yang mewah dan bebas repot.
                    </p>
                </div>

                <div class="relative z-10 text-sm text-blue-200">
                    © 2024 Laundry Cepat. All rights reserved.
                </div>
            </div>

            <div class="md:w-1/2 p-10 md:p-16 flex flex-col justify-center">
                <h2 class="text-3xl font-extrabold text-gray-900 mb-2">Buat Akun</h2>
                <p class="text-gray-500 mb-8">Mulai perjalanan kebersihan Anda hari ini.</p>
@if ($errors->any())
    <div class="mb-4 bg-red-50 border border-red-200 text-red-600 text-xs rounded-xl p-4">
        <ul class="list-disc pl-5">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('register') }}" class="space-y-4">
    @csrf
    <div>
        <label class="block text-[10px] font-extrabold text-gray-400 uppercase tracking-widest mb-1.5">Nama Lengkap</label>
        <input type="text" name="name" value="{{ old('name') }}" placeholder="Masukkan nama lengkap Anda" required
               class="w-full bg-gray-50 border border-gray-200 rounded-xl py-3 px-4 focus:ring-2 focus:ring-blue-500 outline-none transition text-sm">
    </div>

    <div>
        <label class="block text-[10px] font-extrabold text-gray-400 uppercase tracking-widest mb-1.5">Email</label>
        <input type="email" name="email" value="{{ old('email') }}" placeholder="nama@email.com" required
               class="w-full bg-gray-50 border border-gray-200 rounded-xl py-3 px-4 focus:ring-2 focus:ring-blue-500 outline-none transition text-sm">
    </div>

    <div>
        <label class="block text-[10px] font-extrabold text-gray-400 uppercase tracking-widest mb-1.5">Nomor Telepon</label>
        <input type="text" name="phone" value="{{ old('phone') }}" placeholder="08xx xxxx xxxx" required
               class="w-full bg-gray-50 border border-gray-200 rounded-xl py-3 px-4 focus:ring-2 focus:ring-blue-500 outline-none transition text-sm">
    </div>

    <div>
        <label class="block text-[10px] font-extrabold text-gray-400 uppercase tracking-widest mb-1.5">Kata Sandi</label>
        <input type="password" name="password" placeholder="Minimal 8 karakter" required
               class="w-full bg-gray-50 border border-gray-200 rounded-xl py-3 px-4 focus:ring-2 focus:ring-blue-500 outline-none transition text-sm">
    </div>

    <div>
        <label class="block text-[10px] font-extrabold text-gray-400 uppercase tracking-widest mb-1.5">Konfirmasi Kata Sandi</label>
        <input type="password" name="password_confirmation" placeholder="Ulangi kata sandi" required
               class="w-full bg-gray-50 border border-gray-200 rounded-xl py-3 px-4 focus:ring-2 focus:ring-blue-500 outline-none transition text-sm">
    </div>

    <button type="submit" class="w-full bg-[#0A58CA] text-white py-4 rounded-2xl font-bold shadow-lg hover:bg-blue-800 transition shadow-blue-200 mt-4">
        Daftar Sekarang
    </button>
</form>

                <div class="mt-2 text-center">
                    <p class="mt-8 text-sm text-gray-500">
                        Sudah punya akun? <a href="{{ route('login') }}" class="text-blue-600 font-bold">Masuk di sini</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout> 