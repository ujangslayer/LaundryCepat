<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laundry Cepat') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-[#F4F7FB]"> <div class="min-h-screen">
            
          <nav class="bg-white border-b border-gray-100 sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">
            
            <div class="flex items-center gap-12">
                <div class="shrink-0 flex items-center font-extrabold text-[#1a56db] text-xl tracking-tight">
                    Laundry Cepat
                </div>
                
                <div class="hidden md:flex items-center gap-8 text-sm font-semibold text-gray-500">
                    <a href="{{ route('customer.dashboard') }}" class="{{ request()->routeIs('customer.dashboard') ? 'text-[#1a56db] font-bold' : 'hover:text-gray-900 transition' }}">Beranda</a>
                    <a href="{{ route('customer.booking') }}" class="{{ request()->routeIs('customer.booking') ? 'text-[#1a56db] font-bold' : 'hover:text-gray-900 transition' }}">Layanan</a>
                    <a href="{{ route('customer.history') }}" class="{{ request()->routeIs('customer.history') ? 'text-[#1a56db] font-bold' : 'hover:text-gray-900 transition' }}">Riwayat Pesanan</a>
                    <a href="{{ route('customer.reviews') }}" class="{{ request()->routeIs('customer.reviews') ? 'text-[#1a56db] font-bold' : 'hover:text-gray-900 transition' }}">Ulasan</a>
                </div>
            </div>

            <div class="flex items-center gap-4">
                <div class="relative inline-block text-left" id="notification-dropdown-wrapper">
                    <button id="bell-btn" class="w-10 h-10 rounded-full hover:bg-gray-100 text-gray-500 flex items-center justify-center transition relative focus:outline-none">
                        <i class="fa-solid fa-bell text-lg" id="bell-icon"></i>
                        <span id="bell-badge" class="hidden absolute top-0 right-0 w-4 h-4 bg-red-500 text-white text-[9px] font-bold rounded-full flex items-center justify-center border border-white">0</span>
                    </button>

                    <div id="notification-menu" class="hidden absolute right-0 mt-2 w-80 bg-white rounded-2xl shadow-xl border border-gray-100 py-2 z-[999]">
                        <div class="px-4 py-2 border-b border-gray-100 flex justify-between items-center">
                            <span class="font-extrabold text-xs text-gray-900 uppercase tracking-wider">Pemberitahuan</span>
                        </div>
                        <div id="notification-list" class="max-h-64 overflow-y-auto divide-y divide-gray-50 flex flex-col">
                            <div class="p-4 text-center text-xs text-gray-400">Memuat pemberitahuan...</div>
                        </div>
                    </div>
                </div>
                
                <a href="{{ route('customer.profil') }}" class="flex items-center gap-2 hover:opacity-80 transition">
                    <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=1E293B&color=fff" alt="profil" class="w-9 h-9 rounded-full">
                </a>
                
                <form method="POST" action="{{ route('logout') }}" class="m-0">
                    @csrf
                    <button type="submit" title="Keluar" class="flex items-center justify-center w-9 h-9 rounded-full bg-red-50 text-red-500 hover:bg-red-100 hover:text-red-600 transition">
                        <i class="fa-solid fa-right-from-bracket text-sm"></i>
                    </button>
                </form>
            </div>

        </div>
    </div>
</nav>

            <main class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
                {{ $slot }}
            </main>
        </div>
        <script>
    document.addEventListener('DOMContentLoaded', function () {
        const bellBtn = document.getElementById('bell-btn');
        const bellIcon = document.getElementById('bell-icon');
        const bellBadge = document.getElementById('bell-badge');
        const notificationMenu = document.getElementById('notification-menu');
        const notificationList = document.getElementById('notification-list');

        if(bellBtn) {
            bellBtn.addEventListener('click', function (e) {
                e.stopPropagation();
                notificationMenu.classList.toggle('hidden');
            });

            document.addEventListener('click', function () {
                notificationMenu.classList.add('hidden');
            });

            notificationMenu.addEventListener('click', function (e) {
                e.stopPropagation();
            });

            function checkNotifications() {
                fetch("{{ route('customer.notifications.get') }}")
                    .then(response => response.json())
                    .then(data => {
                        if (data.unread_count > 0) {
                            bellBadge.textContent = data.unread_count;
                            bellBadge.classList.remove('hidden');
                            bellIcon.classList.add('animate-bounce'); 
                        } else {
                            bellBadge.classList.add('hidden');
                            bellIcon.classList.remove('animate-bounce');
                        }

                        notificationList.innerHTML = '';
                        if (data.notifications.length === 0) {
                            notificationList.innerHTML = `<div class="p-4 text-center text-xs text-gray-400">Tidak ada pemberitahuan terbaru.</div>`;
                        } else {
                            data.notifications.forEach(notif => {
                                const isUnreadBg = !notif.is_read ? 'bg-blue-50/70 hover:bg-blue-50' : 'hover:bg-gray-50';
                                const dotIndicator = !notif.is_read ? '<span class="w-2 h-2 rounded-full bg-blue-600 shrink-0 mt-1"></span>' : '';
                                
                                const item = document.createElement('div');
                                item.className = `p-3 text-left transition-colors flex items-start gap-3 cursor-pointer ${isUnreadBg}`;
                                item.innerHTML = `
                                    <div class="flex-1">
                                        <h5 class="text-xs font-bold text-gray-900">${notif.judul}</h5>
                                        <p class="text-[11px] text-gray-500 mt-0.5 leading-snug">${notif.pesan}</p>
                                    </div>
                                    ${dotIndicator}
                                `;
                                
                                item.addEventListener('click', function() {
                                    fetch(`/customer/notifications/${notif.id}/read`, {
                                        method: 'POST',
                                        headers: {
                                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                            'Content-Type': 'application/json'
                                        }
                                    }).then(() => {
                                        window.location.href = `/customer/tracking/${notif.pesanan_id}`;
                                    });
                                });

                                notificationList.appendChild(item);
                            });
                        }
                    })
                    .catch(err => console.error('Gagal mengambil data notifikasi:', err));
            }

            checkNotifications();
            setInterval(checkNotifications, 10000);
        }
    });
</script>
    </body>
</html>