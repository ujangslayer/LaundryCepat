<x-app-layout>
    <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
        
        <div class="bg-gray-100 rounded-[2rem] p-8 md:p-10 mb-8">
            <h1 class="text-3xl font-extrabold text-gray-900 mb-3">Ulasan & Umpan Balik</h1>
            <p class="text-gray-500 text-sm md:text-base max-w-xl">
                Bagikan pengalaman Anda menggunakan layanan laundry kami. Penilaian Anda sangat membantu kami untuk terus berkembang.
            </p>
        </div>

        @if(session('success'))
            <div class="mb-6 p-4 bg-green-50 border border-green-200 text-green-700 rounded-2xl font-semibold text-sm flex items-center gap-2">
                <i class="fa-solid fa-circle-check text-green-500 text-base"></i> {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="mb-6 p-4 bg-red-50 border border-red-200 text-red-700 rounded-2xl font-semibold text-sm flex items-center gap-2">
                <i class="fa-solid fa-circle-xmark text-red-500 text-base"></i> {{ session('error') }}
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <div class="lg:col-span-1">
                <div class="bg-white rounded-[2rem] p-6 md:p-8 border border-gray-100 shadow-[0_4px_20px_-5px_rgba(0,0,0,0.03)] sticky top-28">
                    <h3 class="text-lg font-bold text-gray-900 mb-5 flex items-center gap-2">
                        <i class="fa-solid fa-pen-to-square text-blue-600"></i> Tulis Ulasan Baru
                    </h3>

                    @if($unreviewedOrders->isEmpty())
                        <div class="text-center py-8 bg-gray-50 rounded-2xl p-4 border border-dashed border-gray-200">
                            <i class="fa-solid fa-face-smile text-4xl text-gray-300 mb-3"></i>
                            <p class="text-sm font-bold text-gray-700 mb-1">Semua Pesanan Selesai Telah Diulas</p>
                            <p class="text-xs text-gray-400">Terima kasih atas kontribusi ulasan yang telah Anda berikan!</p>
                        </div>
                    @else
                        <form action="{{ route('customer.reviews.store') }}" method="POST" class="flex flex-col gap-4">
                            @csrf
                            
                            <div>
                                <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Pilih Pesanan Anda</label>
                                <select name="pesanan_id" required class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 text-sm focus:border-blue-500 focus:ring-blue-500 font-semibold text-gray-700">
                                    <option value="" disabled selected>-- Pilih Invoice --</option>
                                    @foreach($unreviewedOrders as $item)
                                        @php 
                                            $namaService = $item->detail->first()->layanan->name ?? 'Laundry';
                                        @endphp
                                        <option value="{{ $item->id }}" {{ $selectedOrderId == $item->id ? 'selected' : '' }}>
                                            #{{ $item->order_number }} - {{ $namaService }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Berikan Penilaian (Bintang)</label>
                                <div class="flex items-center gap-2 text-2xl" id="star-rating-container">
                                    @for($i = 1; $i <= 5; $i++)
                                        <i class="fa-solid fa-star text-gray-200 cursor-pointer transition star-btn" data-value="{{ $i }}" onclick="setRating({{ $i }})"></i>
                                    @endfor
                                </div>
                                <input type="hidden" name="rating" id="rating-input" required value="">
                            </div>

                            <div>
                                <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Ulasan / Komentar Anda</label>
                                <textarea name="comment" rows="4" placeholder="Cuciannya wangi dan rapi banget, pelayanannya ramah..." class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 text-sm focus:border-blue-500 focus:ring-blue-500 text-gray-700"></textarea>
                            </div>

                            <button type="submit" class="w-full bg-[#0A58CA] hover:bg-blue-800 text-white font-semibold py-3 rounded-xl text-sm transition shadow-md mt-2">
                                Kirim Ulasan
                            </button>
                        </form>
                    @endif
                </div>
            </div>

            <div class="lg:col-span-2 flex flex-col gap-6">
                <h3 class="text-lg font-bold text-gray-900 flex items-center gap-2">
                    <i class="fa-solid fa-comments text-blue-600"></i> Riwayat Ulasan Anda
                </h3>

                @forelse($myReviews as $rev)
                    <div class="bg-white rounded-[2rem] p-6 md:p-8 border border-gray-100 shadow-[0_4px_20px_-5px_rgba(0,0,0,0.02)] flex flex-col gap-4">
                        
                        <div class="flex flex-wrap items-center justify-between gap-2">
                            <div>
                                <h4 class="font-extrabold text-gray-900 text-base">
                                    {{ $rev->pesanan->detail->first()->layanan->name ?? 'Layanan Laundry' }}
                                </h4>
                                <p class="text-xs text-gray-400 font-medium mt-0.5">Invoice: <span class="font-bold text-gray-600">#{{ $rev->pesanan->order_number }}</span> • Diulas pada {{ \Carbon\Carbon::parse($rev->created_at)->format('d M Y') }}</p>
                            </div>
                            
                            <div class="flex items-center gap-0.5 text-sm text-amber-400 bg-amber-50 px-3 py-1.5 rounded-full">
                                @for($i = 1; $i <= 5; $i++)
                                    <i class="fa-solid fa-star {{ $i <= $rev->rating ? 'text-amber-400' : 'text-gray-200' }}"></i>
                                @endfor
                                <span class="text-xs font-extrabold ml-1 text-amber-700">{{ $rev->rating }}.0</span>
                            </div>
                        </div>

                        <p class="text-sm text-gray-600 italic bg-gray-50 p-4 rounded-2xl border border-gray-100">
                            "{{ $rev->comment ?? 'Hanya memberikan rating bintang saja.' }}"
                        </p>

                        @if($rev->admin_reply)
                            <div class="bg-blue-50 border border-blue-100 rounded-2xl p-4 ml-4 md:ml-8 relative before:absolute before:top-4 before:-left-2 before:w-4 before:h-4 before:bg-blue-50 before:border-l before:border-b before:border-blue-100 before:rotate-45">
                                <div class="flex items-center gap-2 mb-2">
                                    <div class="w-6 h-6 rounded-full bg-blue-600 text-white flex items-center justify-center text-[10px]">
                                        <i class="fa-solid fa-user-shield"></i>
                                    </div>
                                    <span class="text-xs font-extrabold text-blue-900">Tanggapan Admin Laundry</span>
                                    <span class="text-[10px] text-blue-400 font-medium ml-auto">{{ \Carbon\Carbon::parse($rev->updated_at)->format('d M Y') }}</span>
                                </div>
                                <p class="text-xs text-blue-800 leading-relaxed font-medium">
                                    {{ $rev->admin_reply }}
                                </p>
                            </div>
                        @else
                            <div class="text-right">
                                <span class="text-[11px] font-semibold text-gray-400 bg-gray-100 px-3 py-1 rounded-full">
                                    <i class="fa-solid fa-hourglass-half animate-spin text-[9px] mr-1"></i> Menunggu tanggapan admin
                                </span>
                            </div>
                        @endif
                    </div>
                @empty
                    <div class="bg-white rounded-[2rem] p-12 text-center border border-gray-100">
                        <i class="fa-solid fa-comment-slash text-5xl text-gray-300 mb-4"></i>
                        <h4 class="text-base font-bold text-gray-800 mb-1">Belum Ada Riwayat Ulasan</h4>
                        <p class="text-sm text-gray-400 max-w-xs mx-auto">Anda belum pernah mengirimkan ulasan umpan balik untuk pesanan laundry Anda.</p>
                    </div>
                @endforelse
            </div>

        </div>
    </div>

    <script>
        function setRating(ratingValue) {
            const stars = document.querySelectorAll('.star-btn');
            const input = document.getElementById('rating-input');
            
            input.value = ratingValue;

            stars.forEach(star => {
                const value = parseInt(star.getAttribute('data-value'));
                if (value <= ratingValue) {
                    star.classList.remove('text-gray-200');
                    star.classList.add('text-amber-400');
                } else {
                    star.classList.remove('text-amber-400');
                    star.classList.add('text-gray-200');
                }
            });
        }
    </script>
</x-app-layout>