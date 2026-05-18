<x-admin-layout>
    @if(session('success'))
    <div class="mb-6 p-4 bg-green-50 border border-green-200 text-green-700 rounded-xl text-sm font-semibold flex items-center gap-2">
        <i class="fa-solid fa-circle-check"></i>
        {{ session('success') }}
    </div>
    @endif

    @php
        $totalReviews = $reviews->count();
        $avgRating = $totalReviews > 0 ? number_format($reviews->avg('rating'), 1) : '0.0';
        $fiveStars = $reviews->where('rating', 5)->count();
        $lowStars = $reviews->whereIn('rating', [1, 2])->count();
        $fiveStarPercentage = $totalReviews > 0 ? round(($fiveStars / $totalReviews) * 100) : 0;
    @endphp

    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
        <div>
            <h2 class="text-2xl font-extrabold text-gray-900 mb-1">Ulasan Customer</h2>
            <p class="text-sm text-gray-500">Lihat feedback dan tingkat kepuasan pelanggan terhadap layanan Anda.</p>
        </div>
        <div class="flex items-center gap-3">
            <p class="text-xs font-bold text-gray-400 uppercase tracking-widest">{{ $avgRating }} Average Rating</p>
            <div class="flex text-yellow-400 text-sm">
                <i class="fa-solid fa-star"></i>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
        <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm">
            <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-1">Total Ulasan</p>
            <h3 class="text-3xl font-black text-gray-900">{{ $totalReviews }}</h3>
        </div>
        <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm">
            <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-1">Rata-rata Rating</p>
            <h3 class="text-3xl font-black text-gray-900">{{ $avgRating }} <span class="text-sm font-bold text-gray-400">/ 5.0</span></h3>
        </div>
        <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm">
            <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-1">Ulasan Sempurna (5★)</p>
            <h3 class="text-3xl font-black text-gray-900">{{ $fiveStars }} <span class="text-xs font-bold text-emerald-500 bg-emerald-50 px-2 py-0.5 rounded ml-2">{{ $fiveStarPercentage }}%</span></h3>
        </div>
        <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm">
            <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-1">Ulasan Buruk (1-2★)</p>
            <h3 class="text-3xl font-black text-[#FF5A36]">{{ $lowStars }}</h3>
        </div>
    </div>

    <div class="bg-white rounded-3xl border border-gray-100 shadow-sm overflow-hidden">
        <div class="divide-y divide-gray-100">
            @forelse($reviews as $review)
            <div class="p-6 md:p-8">
                <div class="flex flex-col md:flex-row gap-6">
                    <div class="md:w-64 flex-shrink-0">
                        <div class="flex items-center gap-3 mb-2">
                            <div class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center text-gray-500 font-bold">
                                {{ substr($review->user->name ?? 'A', 0, 1) }}
                            </div>
                            <div>
                                <h4 class="text-sm font-bold text-gray-900">{{ $review->user->name ?? 'Pelanggan' }}</h4>
                                <div class="flex text-yellow-400 text-[10px]">
                                    @for($i = 1; $i <= 5; $i++)
                                        <i class="fa-{{ $i <= $review->rating ? 'solid' : 'regular' }} fa-star"></i>
                                    @endfor
                                </div>
                            </div>
                        </div>
                        <p class="text-[11px] text-gray-400 mt-2">{{ $review->created_at->diffForHumans() }}</p>
                    </div>

                    <div class="flex-1">
                        <div class="mb-2">
                            <span class="text-[10px] font-bold bg-blue-50 text-blue-600 px-2 py-1 rounded uppercase mr-2">
                                Order: #{{ $review->pesanan->order_number ?? 'Tidak diketahui' }}
                            </span>
                        </div>
                        <p class="text-sm text-gray-600 leading-relaxed italic">
                            "{{ $review->comment ?? 'Pelanggan tidak meninggalkan komentar teks.' }}"
                        </p>

                        @if($review->admin_reply)
                        <div class="mt-4 bg-[#F8FAFC] p-4 rounded-xl border border-gray-100">
                            <p class="text-xs font-bold text-gray-800 mb-1 flex items-center gap-2">
                                <i class="fa-solid fa-reply text-[#0A58CA]"></i> Balasan Anda:
                            </p>
                            <p class="text-sm text-gray-600">{{ $review->admin_reply }}</p>
                        </div>
                        @endif
                    </div>

                    <div class="md:w-28 flex md:flex-col justify-end gap-2">
                        <button onclick="document.getElementById('modalBalas{{ $review->id }}').classList.remove('hidden')" class="p-2 text-xs font-bold text-gray-500 hover:text-[#0A58CA] bg-gray-50 hover:bg-blue-50 rounded-lg transition flex items-center gap-2 justify-center">
                            <i class="fa-solid fa-reply"></i> {{ $review->admin_reply ? 'Edit Balasan' : 'Balas' }}
                        </button>

                        <form action="{{ route('admin.reviews.destroy', $review->id) }}" method="POST" class="inline-block w-full">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus ulasan ini secara permanen?')" class="w-full p-2 text-xs font-bold text-gray-400 hover:text-red-500 bg-gray-50 hover:bg-red-50 rounded-lg transition flex items-center gap-2 justify-center">
                                <i class="fa-solid fa-trash"></i> Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <div id="modalBalas{{ $review->id }}" class="hidden fixed inset-0 z-[99] flex items-center justify-center bg-black/40 backdrop-blur-sm">
                <div class="bg-white rounded-3xl w-full max-w-lg p-6 md:p-8 shadow-2xl mx-4">
                    <h3 class="text-xl font-extrabold text-gray-900 mb-1">Balas Ulasan</h3>
                    <p class="text-sm text-gray-500 mb-6">Pelanggan: {{ $review->user->name ?? 'Pelanggan' }}</p>
                    
                    <form action="{{ route('admin.reviews.reply', $review->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-6">
                            <label class="block text-[10px] font-extrabold text-gray-400 uppercase tracking-widest mb-2">Pesan Balasan Anda</label>
                            <textarea name="admin_reply" rows="4" class="w-full bg-gray-50 border border-gray-200 rounded-xl py-3 px-4 focus:ring-2 focus:ring-blue-500 outline-none transition text-sm resize-none" placeholder="Terima kasih atas kepercayaannya..." required>{{ $review->admin_reply }}</textarea>
                        </div>
                        <div class="flex gap-3">
                            <button type="button" onclick="document.getElementById('modalBalas{{ $review->id }}').classList.add('hidden')" class="flex-1 py-3 text-sm font-bold text-gray-600 hover:text-gray-800 transition">Batal</button>
                            <button type="submit" class="flex-1 bg-[#0A58CA] text-white py-3 rounded-xl text-sm font-bold hover:bg-blue-700 shadow-lg shadow-blue-500/30 transition">Kirim Balasan</button>
                        </div>
                    </form>
                </div>
            </div>
            @empty
            <div class="p-12 text-center">
                <i class="fa-regular fa-star-half-stroke text-4xl text-gray-300 mb-3"></i>
                <p class="text-sm font-bold text-gray-500">Belum ada ulasan yang masuk dari pelanggan.</p>
            </div>
            @endforelse
        </div>
    </div>
</x-admin-layout>