<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laundry Cepat - Perawatan Pakaian Premium</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap');
        body { font-family: 'Inter', sans-serif; background-color: #ffffff; }
    </style>
</head>
<body class="text-gray-800 antialiased overflow-x-hidden">

    <nav class="bg-white/80 backdrop-blur-md px-8 py-4 flex items-center justify-between fixed w-full top-0 z-50">
        <div class="flex items-center gap-2">
            <i class="fa-solid fa-washing-machine text-blue-600 text-xl"></i>
            <a href="#" class="text-xl font-bold text-blue-800">Laundry<span class="text-blue-600">Cepat</span></a>
        </div>
        

        <div class="flex items-center gap-6">
            <a href="/login" class="text-sm font-medium text-gray-600 hover:text-blue-600">Masuk</a>
            <a href="/register" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-full text-sm font-semibold transition shadow-md shadow-blue-200">Daftar</a>
        </div>
    </nav>

    <section class="max-w-7xl mx-auto px-8 pt-32 pb-20 grid grid-cols-1 lg:grid-cols-2 gap-12 items-center min-h-screen">
        <div class="pr-8">
            <span class="bg-blue-50 text-blue-600 text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider mb-6 inline-block">Perawatan Pakaian Premium</span>
            <h1 class="text-5xl lg:text-7xl font-extrabold text-gray-900 leading-tight mb-6">
                Pakaian Bersih.<br>
                <span class="text-blue-600">Tanpa Repot.</span>
            </h1>
            <p class="text-gray-500 text-lg mb-10 leading-relaxed max-w-md">
                Rasakan standar perawatan pakaian premium. Kami mengembalikan kesegaran lemari pakaian Anda dengan presisi dan perhatian profesional.
            </p>
            <div class="flex gap-4">
                <a href="#" class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3.5 rounded-full font-semibold transition flex items-center gap-2 shadow-lg shadow-blue-200">
                    Pesan Sekarang <i class="fa-solid fa-arrow-right text-sm"></i>
                </a>
                <a href="#" class="bg-blue-50 hover:bg-blue-100 text-blue-700 px-8 py-3.5 rounded-full font-semibold transition">
                    Lihat Harga
                </a>
            </div>
        </div>
        
        <div class="relative">
            <div class="w-full h-[500px] bg-gradient-to-br from-teal-800 to-slate-800 rounded-[2.5rem] shadow-2xl overflow-hidden relative">
                <div class="absolute inset-0 flex items-center justify-center opacity-30">
                    <div class="w-96 h-96 border-[20px] border-white/10 rounded-full"></div>
                    <div class="absolute w-64 h-64 border-[15px] border-white/20 rounded-full"></div>
                    <div class="absolute w-32 h-32 bg-white/10 rounded-full"></div>
                </div>
            </div>
            
            <div class="absolute -bottom-8 left-8 bg-white/90 backdrop-blur-md p-5 rounded-2xl shadow-xl flex items-center gap-4 w-72 border border-white/40">
                <div class="bg-blue-100 text-blue-600 w-10 h-10 flex items-center justify-center rounded-full">
                    <i class="fa-solid fa-stopwatch"></i>
                </div>
                <div>
                    <h4 class="font-bold text-sm text-gray-900">Proses Cepat</h4>
                    <p class="text-xs text-gray-500">Selesai di bawah 24 jam</p>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-white py-20 px-8">
        <div class="max-w-7xl mx-auto">
            <div class="mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-3">Layanan Kami</h2>
                <p class="text-gray-500">Perawatan khusus untuk setiap jenis kain, dikerjakan dengan presisi.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="md:col-span-1 md:row-span-2 bg-gray-50 rounded-[2rem] p-8 flex flex-col justify-between relative overflow-hidden group">
                    <div>
                        <div class="bg-white text-blue-500 w-10 h-10 flex items-center justify-center rounded-full shadow-sm mb-6">
                            <i class="fa-solid fa-droplet"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Cuci & Lipat</h3>
                        <p class="text-sm text-gray-500 mb-8">Pakaian sehari-hari, disortir dengan teliti, dicuci dengan deterjen premium, dan dilipat rapi.</p>
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-blue-600 mb-4">Mulai dari Rp 8.000/kg</p>
                        <div class="absolute -bottom-10 -right-10 w-40 h-40 bg-white rounded-full opacity-50 flex items-center justify-center group-hover:scale-110 transition duration-500">
                             <i class="fa-solid fa-arrow-right text-gray-300 text-xl absolute top-12 left-12"></i>
                        </div>
                    </div>
                </div>

                <div class="md:col-span-1 bg-gray-50 rounded-[2rem] p-8 flex flex-col justify-between">
                    <div>
                         <div class="bg-blue-100 text-blue-500 w-10 h-10 flex items-center justify-center rounded-full mb-4">
                            <i class="fa-solid fa-shirt"></i>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 mb-2">Cuci Kering</h3>
                        <p class="text-sm text-gray-500 mb-6">Perawatan lembut berbasis pelarut untuk pakaian paling halus Anda.</p>
                    </div>
                    <button class="bg-gray-200 hover:bg-gray-300 text-gray-700 w-full py-2.5 rounded-full text-sm font-semibold transition">Lihat Detail</button>
                </div>

                <div class="md:col-span-1 bg-gray-50 rounded-[2rem] p-8 flex flex-col justify-between">
                    <div>
                         <div class="bg-orange-100 text-orange-500 w-10 h-10 flex items-center justify-center rounded-full mb-4">
                            <i class="fa-solid fa-temperature-arrow-up"></i>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 mb-2">Setrika</h3>
                        <p class="text-sm text-gray-500 mb-6">Pengepresan rapi dan bebas kusut untuk kemeja, celana panjang, dan linen.</p>
                    </div>
                    <button class="bg-gray-200 hover:bg-gray-300 text-gray-700 w-full py-2.5 rounded-full text-sm font-semibold transition">Lihat Detail</button>
                </div>

                <div class="md:col-span-2 bg-blue-600 rounded-[2rem] p-8 text-white relative overflow-hidden flex flex-col justify-center">
                    <div class="relative z-10">
                        <div class="bg-white/20 w-10 h-10 flex items-center justify-center rounded-full mb-4 backdrop-blur-sm">
                            <i class="fa-solid fa-bolt text-white"></i>
                        </div>
                        <h3 class="text-2xl font-bold mb-2">Layanan Kilat</h3>
                        <p class="text-blue-100 text-sm max-w-sm mb-6">Butuh sekarang? Pakaian Anda dicuci, dikeringkan, dan dilipat dalam waktu kurang dari 12 jam.</p>
                        <button class="bg-white text-blue-600 px-6 py-2.5 rounded-full text-sm font-bold hover:bg-gray-50 transition shadow-lg">Minta Layanan Kilat</button>
                    </div>
                    <div class="absolute -right-20 -bottom-20 w-64 h-64 bg-blue-500 rounded-full blur-2xl opacity-50"></div>
                </div>
            </div>
        </div>
    </section>

    <section class="max-w-7xl mx-auto px-8 py-24 border-t border-gray-100">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <div class="grid grid-cols-2 gap-6">
                <div class="bg-gray-50 p-6 rounded-2xl">
                    <div class="text-blue-500 mb-4"><i class="fa-solid fa-stopwatch text-xl"></i></div>
                    <h4 class="font-bold text-sm mb-2">Penyelesaian Cepat</h4>
                    <p class="text-xs text-gray-500 leading-relaxed">Kami menghargai waktu Anda. Garansi pengiriman sesuai jadwal yang dijanjikan.</p>
                </div>
                <div class="bg-gray-50 p-6 rounded-2xl">
                    <div class="text-blue-500 mb-4"><i class="fa-solid fa-medal text-xl"></i></div>
                    <h4 class="font-bold text-sm mb-2">Perawatan Profesional</h4>
                    <p class="text-xs text-gray-500 leading-relaxed">Penanganan ahli untuk semua jenis kain, memastikan keawetan dan kerapian.</p>
                </div>
                <div class="bg-gray-50 p-6 rounded-2xl">
                    <div class="text-orange-500 mb-4"><i class="fa-solid fa-tags text-xl"></i></div>
                    <h4 class="font-bold text-sm mb-2">Harga Terjangkau</h4>
                    <p class="text-xs text-gray-500 leading-relaxed">Layanan premium tidak harus mahal. Harga transparan tanpa biaya tersembunyi.</p>
                </div>
                <div class="bg-gray-50 p-6 rounded-2xl">
                    <div class="text-blue-500 mb-4"><i class="fa-solid fa-leaf text-xl"></i></div>
                    <h4 class="font-bold text-sm mb-2">Ramah Lingkungan</h4>
                    <p class="text-xs text-gray-500 leading-relaxed">Menggunakan deterjen berkelanjutan dan mesin cuci hemat energi.</p>
                </div>
            </div>

            <div>
                <span class="text-blue-600 text-xs font-bold uppercase tracking-widest mb-4 inline-block">Perbedaan Laundry Cepat</span>
                <h2 class="text-4xl font-extrabold text-gray-900 mb-6">Mengapa memercayakan pakaian Anda kepada kami?</h2>
                <p class="text-gray-500 mb-8 leading-relaxed">
                    Kami lebih dari sekadar mencuci pakaian. Kami memberikan pengalaman perawatan kain yang cermat, dirancang untuk menjaga kualitas pakaian Anda sembari mengembalikan aset Anda yang paling berharga: waktu.
                </p>
                <a href="#" class="text-blue-600 font-bold hover:text-blue-800 transition flex items-center gap-2">
                    Pelajari proses kami <i class="fa-solid fa-arrow-right text-sm"></i>
                </a>
            </div>
        </div>
    </section>

    <footer class="bg-white border-t border-gray-100 py-12 px-8">
        <div class="max-w-7xl mx-auto flex flex-col md:flex-row justify-between items-start md:items-center gap-8">
            <div>
                <div class="flex items-center gap-2 mb-2">
                    <i class="fa-solid fa-washing-machine text-blue-600 text-xl"></i>
                    <a href="#" class="text-xl font-bold text-blue-800">Laundry<span class="text-blue-600">Cepat</span></a>
                </div>
                <p class="text-xs text-gray-400">Meningkatkan perawatan kain dengan presisi profesional.</p>
            </div>
            
            <div class="flex flex-col md:flex-row gap-6 md:gap-12 text-xs font-medium text-gray-500">
                <div class="flex flex-col gap-3">
                    <a href="#" class="hover:text-blue-600">Kebijakan Privasi</a>
                    <a href="#" class="hover:text-blue-600">Syarat Layanan</a>
                </div>
                <div class="flex flex-col gap-3">
                    <a href="#" class="hover:text-blue-600">Hubungi Kami</a>
                    <a href="#" class="hover:text-blue-600">FAQ</a>
                </div>
            </div>
            
            <div class="text-xs text-gray-400 text-right">
                &copy; 2024 Laundry Cepat. Perawatan Kain Premium.
            </div>
        </div>
    </footer>

</body>
</html>