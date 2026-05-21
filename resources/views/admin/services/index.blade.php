<x-admin-layout>
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
        <div>
            <h2 class="text-2xl font-extrabold text-gray-900 mb-1">Layanan & Harga</h2>
            <p class="text-sm text-gray-500">Atur daftar layanan laundry.</p>
        </div>
        <button id="btnTambah" class="bg-[#0A58CA] text-white px-5 py-2.5 rounded-xl text-sm font-bold hover:bg-blue-700 transition flex items-center gap-2">
            <i class="fa-solid fa-plus"></i> Tambah Layanan
        </button>
    </div>

    @if (session('success'))
        <div class="mb-6 bg-emerald-50 border border-emerald-200 text-emerald-600 text-sm rounded-xl p-4">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="mb-6 bg-red-50 border border-red-200 text-red-600 text-sm rounded-xl p-4">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="bg-white rounded-[2.5rem] shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50 border-b border-gray-100">
                        <th class="px-8 py-4 text-xs font-extrabold text-gray-400 uppercase tracking-widest">Nama Layanan</th>
                        <th class="px-8 py-4 text-xs font-extrabold text-gray-400 uppercase tracking-widest">Tipe Satuan</th>
                        <th class="px-8 py-4 text-xs font-extrabold text-gray-400 uppercase tracking-widest">Harga</th>
                        <th class="px-8 py-4 text-xs font-extrabold text-gray-400 uppercase tracking-widest">Deskripsi</th>
                        <th class="px-8 py-4 text-xs font-extrabold text-gray-400 uppercase tracking-widest text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($services as $service)
                        <tr class="hover:bg-gray-50/50 transition">
                            <td class="px-8 py-5 text-sm font-bold text-gray-900">{{ $service->name }}</td>
                            <td class="px-8 py-5 text-sm font-semibold text-gray-500">
                                <span class="px-2.5 py-1 bg-gray-100 text-gray-600 rounded-lg text-xs font-bold uppercase">
                                    / {{ $service->unit_type }}
                                </span>
                            </td>
                            <td class="px-8 py-5 text-sm font-bold text-blue-600">Rp {{ number_format($service->harga, 0, ',', '.') }}</td>
                            <td class="px-8 py-5 text-sm text-gray-500 max-w-xs truncate">{{ $service->deskripsi ?? '-' }}</td>
                         <td class="px-8 py-5 text-right space-x-2">
    <button onclick="document.getElementById('modalEdit{{ $service->id }}').classList.remove('hidden')" class="text-gray-400 hover:text-blue-600 transition inline-block">
        <i class="fa-solid fa-pen-to-square"></i>
    </button>

    <form action="{{ route('admin.services.destroy', $service->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus layanan {{ $service->name }}?');">
        @csrf
        @method('DELETE')
        <button type="submit" class="text-gray-400 hover:text-red-600 transition">
            <i class="fa-solid fa-trash"></i>
        </button>
    </form>
</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-8 py-12 text-center text-gray-400 text-sm font-medium">
                                Belum ada data layanan. Klik "Tambah Layanan" untuk mengisi.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div id="modalLayanan" class="hidden fixed inset-0 z-[99] flex items-center justify-center p-4 bg-black/50 backdrop-blur-sm">
        <div class="bg-white w-full max-w-lg rounded-[2.5rem] overflow-hidden shadow-2xl">
            <div class="px-8 py-6 border-b border-gray-100 flex justify-between items-center">
                <h3 class="text-xl font-bold text-gray-900">Buat Layanan Baru</h3>
                <button id="btnTutupX" class="text-gray-400 hover:text-gray-600"><i class="fa-solid fa-xmark text-xl"></i></button>
            </div>
            
            <form method="POST" action="{{ route('admin.services.store') }}">
                @csrf
                <div class="p-8 space-y-4">
                    <div>
                        <label class="block text-[10px] font-extrabold text-gray-400 uppercase tracking-widest mb-1.5">Nama Layanan</label>
                        <input type="text" name="name" placeholder="Misal: Cuci Kering Kilat" required
                               class="w-full bg-gray-50 border border-gray-200 rounded-xl py-3 px-4 focus:ring-2 focus:ring-blue-500 outline-none transition text-sm">
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-[10px] font-extrabold text-gray-400 uppercase tracking-widest mb-1.5">Tipe Satuan</label>
                            <select name="unit_type" required class="w-full bg-gray-50 border border-gray-200 rounded-xl py-3 px-4 focus:ring-2 focus:ring-blue-500 outline-none transition text-sm text-gray-600">
                                <option value="kg">Per Kilogram (kg)</option>
                                <option value="pcs">Per Potong (pcs)</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-[10px] font-extrabold text-gray-400 uppercase tracking-widest mb-1.5">Harga (Rupiah)</label>
                            <input type="number" name="harga" placeholder="Misal: 10000" min="0" required
                                   class="w-full bg-gray-50 border border-gray-200 rounded-xl py-3 px-4 focus:ring-2 focus:ring-blue-500 outline-none transition text-sm">
                        </div>
                    </div>

                    <div>
                        <label class="block text-[10px] font-extrabold text-gray-400 uppercase tracking-widest mb-1.5">Deskripsi Layanan</label>
                        <textarea name="deskripsi" rows="3" placeholder="Jelaskan detail pengerjaan layanan ini..."
                                  class="w-full bg-gray-50 border border-gray-200 rounded-xl py-3 px-4 focus:ring-2 focus:ring-blue-500 outline-none transition text-sm resize-none"></textarea>
                    </div>
                </div>

                <div class="px-8 py-6 bg-gray-50 flex gap-3">
                    <button type="button" id="btnBatal" class="flex-1 py-3 text-sm font-bold text-gray-600 hover:text-gray-800 transition">Batal</button>
                    <button type="submit" class="flex-1 bg-[#0A58CA] text-white py-3 rounded-xl text-sm font-bold shadow-lg hover:bg-blue-800 transition">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        const modal = document.getElementById('modalLayanan');
        const btnTambah = document.getElementById('btnTambah');
        const btnBatal = document.getElementById('btnBatal');
        const btnTutupX = document.getElementById('btnTutupX');

        // Fungsi buka modal
        btnTambah.addEventListener('click', () => {
            modal.classList.remove('hidden');
        });

        // Fungsi tutup modal
        const tutupModal = () => {
            modal.classList.add('hidden');
        };

        btnBatal.addEventListener('click', tutupModal);
        btnTutupX.addEventListener('click', tutupModal);

        // Tutup modal jika klik area luar modal
        window.addEventListener('click', (e) => {
            if (e.target === modal) {
                tutupModal();
            }
        });
    </script>
    @foreach($services as $service)
    <div id="modalEdit{{ $service->id }}" class="hidden fixed inset-0 z-[100] flex items-center justify-center p-4 bg-black/50 backdrop-blur-sm">
        <div class="bg-white w-full max-w-lg rounded-[2.5rem] overflow-hidden shadow-2xl">
            <div class="px-8 py-6 border-b border-gray-100 flex justify-between items-center">
                <h3 class="text-xl font-bold text-gray-900">Edit Layanan</h3>
                <button type="button" onclick="document.getElementById('modalEdit{{ $service->id }}').classList.add('hidden')" class="text-gray-400 hover:text-gray-600"><i class="fa-solid fa-xmark text-xl"></i></button>
            </div>
            
            <form method="POST" action="{{ route('admin.services.update', $service->id) }}">
                @csrf
                @method('PUT')
                <div class="p-8 space-y-4 text-left">
                    <div>
                        <label class="block text-[10px] font-extrabold text-gray-400 uppercase tracking-widest mb-1.5">Nama Layanan</label>
                        <input type="text" name="name" value="{{ $service->name }}" required class="w-full bg-gray-50 border border-gray-200 rounded-xl py-3 px-4 focus:ring-2 focus:ring-blue-500 outline-none transition text-sm">
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-[10px] font-extrabold text-gray-400 uppercase tracking-widest mb-1.5">Tipe Satuan</label>
                            <select name="unit_type" required class="w-full bg-gray-50 border border-gray-200 rounded-xl py-3 px-4 focus:ring-2 focus:ring-blue-500 outline-none transition text-sm text-gray-600">
                                <option value="kg" {{ $service->unit_type == 'kg' ? 'selected' : '' }}>Per Kilogram (kg)</option>
                                <option value="pcs" {{ $service->unit_type == 'pcs' ? 'selected' : '' }}>Per Potong (pcs)</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-[10px] font-extrabold text-gray-400 uppercase tracking-widest mb-1.5">Harga (Rupiah)</label>
                            <input type="number" name="harga" value="{{ $service->harga }}" min="0" required class="w-full bg-gray-50 border border-gray-200 rounded-xl py-3 px-4 focus:ring-2 focus:ring-blue-500 outline-none transition text-sm">
                        </div>
                    </div>

                    <div>
                        <label class="block text-[10px] font-extrabold text-gray-400 uppercase tracking-widest mb-1.5">Deskripsi Layanan</label>
                        <textarea name="deskripsi" rows="3" class="w-full bg-gray-50 border border-gray-200 rounded-xl py-3 px-4 focus:ring-2 focus:ring-blue-500 outline-none transition text-sm resize-none">{{ $service->deskripsi }}</textarea>
                    </div>
                </div>

                <div class="px-8 py-6 bg-gray-50 flex gap-3">
                    <button type="button" onclick="document.getElementById('modalEdit{{ $service->id }}').classList.add('hidden')" class="flex-1 py-3 text-sm font-bold text-gray-600 hover:text-gray-800 transition">Batal</button>
                    <button type="submit" class="flex-1 bg-[#0A58CA] text-white py-3 rounded-xl text-sm font-bold shadow-lg hover:bg-blue-800 transition">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
    @endforeach
</x-admin-layout>