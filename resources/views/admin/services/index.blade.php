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

    <div id="modalLayanan" class="hidden fixed inset-0 z-[99] flex items-center justify-center p-4 bg-black/50 backdrop-blur-sm">
        <div class="bg-white w-full max-w-lg rounded-[2.5rem] overflow-hidden shadow-2xl">
            <div class="px-8 py-6 border-b border-gray-100 flex justify-between items-center">
                <h3 class="text-xl font-bold text-gray-900">Buat Layanan Baru</h3>
                <button id="btnTutupX" class="text-gray-400 hover:text-gray-600"><i class="fa-solid fa-xmark text-xl"></i></button>
            </div>
            
            <div class="p-8 space-y-4">
                </div>

            <div class="px-8 py-6 bg-gray-50 flex gap-3">
                <button id="btnBatal" class="flex-1 py-3 text-sm font-bold text-gray-600 hover:text-gray-800 transition">Batal</button>
                <button class="flex-1 bg-[#0A58CA] text-white py-3 rounded-xl text-sm font-bold shadow-lg transition">Simpan</button>
            </div>
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

        // Tutup jika klik di luar kotak modal (area abu-abu)
        window.addEventListener('click', (e) => {
            if (e.target == modal) {
                tutupModal();
            }
        });
    </script>
</x-admin-layout>