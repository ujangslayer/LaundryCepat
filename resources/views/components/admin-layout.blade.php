<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Laundry Cepat</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-50 font-sans text-gray-800 flex h-screen overflow-hidden">

    <aside class="w-64 bg-[#0B214A] text-white flex flex-col hidden md:flex shrink-0">
        <div class="h-20 flex items-center px-8 border-b border-white/10">
            <h1 class="text-2xl font-extrabold tracking-wide">
                <i class="fa-solid fa-washing-machine text-blue-400 mr-2"></i>LaundryCepat
            </h1>
        </div>
        
<nav class="flex-1 py-6 px-4 flex flex-col gap-2 overflow-y-auto">
    <p class="text-[10px] font-extrabold text-blue-300 uppercase tracking-widest px-4 mb-2">Menu Admin</p>
    
    <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl {{ request()->routeIs('admin.dashboard') ? 'bg-blue-600 text-white' : 'text-blue-100 hover:bg-white/10' }} transition font-semibold">
        <i class="fa-solid fa-chart-pie w-5"></i> Dashboard
    </a>

    <a href="{{ route('admin.orders.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl {{ request()->routeIs('admin.orders.*') ? 'bg-blue-600 text-white' : 'text-blue-100 hover:bg-white/10' }} transition font-semibold">
        <i class="fa-solid fa-cart-shopping w-5"></i> Kelola Pesanan
    </a>

    <a href="{{ route('admin.customer.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl {{ request()->routeIs('admin.customer.*') ? 'bg-blue-600 text-white' : 'text-blue-100 hover:bg-white/10' }} transition font-semibold">
        <i class="fa-solid fa-users w-5"></i> Kelola Pelanggan
    </a>

    <a href="{{ route('admin.services.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-blue-100 hover:bg-white/10 transition font-semibold">
        <i class="fa-solid fa-hand-holding-heart w-5"></i> Kelola Layanan
    </a>

    <a href="{{ route('admin.reviews.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl {{ request()->routeIs('admin.reviews.*') ? 'bg-blue-600 text-white' : 'text-blue-100 hover:bg-white/10' }} transition font-semibold">
        <i class="fa-solid fa-star w-5"></i> Ulasan Customer
    </a>

</nav>
        <div class="p-4 border-t border-white/10">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="flex items-center gap-3 px-4 py-3 w-full text-blue-200 hover:text-white hover:bg-white/5 rounded-xl font-medium transition text-left">
                    <i class="fa-solid fa-right-from-bracket w-5"></i> Keluar
                </button>
            </form>
        </div>
    </aside>

    <div class="flex-1 flex flex-col h-full overflow-hidden">
        
        <header class="h-20 bg-white border-b border-gray-200 flex items-center justify-between px-6 md:px-10 shrink-0">
            <div class="flex items-center gap-4">

            </div>

            <div class="flex items-center gap-5">
                <div class="flex items-center gap-3 border-l border-gray-200 pl-5">
                    <div class="text-right hidden sm:block">
                        <p class="text-sm font-bold text-gray-900 leading-none">{{ Auth::user()->name }}</p>
                        <p class="text-xs text-gray-500 mt-1">Administrator</p>
                    </div>
                    <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=0B214A&color=fff" class="w-10 h-10 rounded-full">
                </div>
            </div>
        </header>

        <main class="flex-1 overflow-y-auto p-6 md:p-10">
            {{ $slot }}
        </main>
        
    </div>
</body>
</html>