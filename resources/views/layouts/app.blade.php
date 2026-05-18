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

                        <div class="flex items-center gap-9">
                            <button class="text-gray-400 hover:text-gray-600 transition">
                                <i class="fa-regular fa-bell text-xl"></i>
                            </button>

                           <div class="flex items-center gap-4 pl-6 border-l border-gray-200">
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
    </body>
</html>