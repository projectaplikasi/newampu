@extends('layout.master')
@section('content')
    <style>
        .h-80 iframe {
            width: 100%;
            height: 100%;
            border: 0;
        }
    </style>

    {{-- header --}}
    <nav
        class="bg-white w-full sticky start-0 top-0 text-black p-4 px-6 md:px-10 flex justify-between items-center shadow-lg">
        <h1 class="text-lg md:text-xl font-bold">AmpuStudio</h1>
        <a href="/carasewa" class="bg-blue-600 text-white py-2 px-4 rounded-md">Cara Sewa</a>
    </nav>
    {{-- main konten --}}
    <main class="mx-auto w-full">
        <!-- Banner -->
        <div class="flex flex-col md:flex-row w-full h-auto md:h-[75vh] gap-4 p-6 md:p-10 bg-white">
            <div class="w-full md:w-1/2 flex justify-center items-center">
                <img class="w-full h-full object-contain rounded-full" src="{{ asset('img/logo.jpg') }}" alt="Banner Image">
            </div>
            <div class="w-full md:w-1/2 flex justify-center items-center md:p-28">
                <div class="bg-blue-300  p-8 md:p-12 rounded-full text-center">
                    <h1 class="text-xl md:text-2xl text-black font-bold">Selamat Datang di AmpuStudio</h1>
                    <p class="text-black mt-4">Kami AmpuStudio menyediakan alat-alat berguna bagi Anda semua dengan
                        harga yang ramah di saku.</p>
                </div>
            </div>
        </div>

        <!-- Search Section -->
        <form action="/" method="GET" class="sm:w-3/4 w-full sm:px-10 px-4 flex mt-4">
            @csrf
            <input type="search" name="search"
                class="w-full p-2 px-4 bg-white shadow-md text-sm border outline-none border-blue-300 rounded-s-md focus:border-blue-600"
                placeholder="Cari Barang" />
            <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded-e-md shadow-md">Cari</button>
        </form>

        <!-- Products Section -->
        <section class="mt-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 p-5">
            <!-- Product 1 -->
            @foreach ($produk as $item)
                <a href="/detail/show={{ $item->kode_produk }}" class="bg-white rounded shadow-md ">
                    <div class="w-full bg-gray-300 h-48 flex justify-center items-center">
                        <img src="{{ asset('img/' . $item->image) }}" alt="{{ $item->name }}"
                            class="w-full h-full object-cover">
                    </div>
                    <div class="p-4 w-full">
                        <h3 class="text-lg font-bold">{{ $item->name }}</h3>
                        <p class="text-red-500">Rp.{{ number_format($item->harga, 0, ',', '.') }}/hari</p>
                    </div>
                </a>
            @endforeach

        </section>

        <!-- Load More Button -->
        <div class="flex justify-center mt-6">
            {{ $produk->links() }}
        </div>

        <!-- Contact Section -->
        <section class="bg-white p-6 md:p-10 mt-10 rounded-lg shadow-md">
            <h2 class="text-lg font-bold text-center mb-6">Kontak Kami</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10 p-10">
                <!-- GPS Map -->
                <div class="bg-gray-300 h-80">
                    @if (!empty($contact->iframe_maps))
                        {!! $contact->iframe_maps !!}
                    @endif
                </div>
                <!-- Contact Information -->
                <div class="flex flex-col gap-2 font-bold text-lg bg-white shadow-md border-gray-200 border p-5 md:px-10">
                    <p>WhatsApp : @if (!empty($contact->whatsapp))<a
                                href="https://wa.me/{{ $contact->whatsapp }}">
                                <span class="font-normal">{{ $contact->whatsapp }}</span>
                            </a> @endif
                    </p>
                    <p>Email : @if (!empty($contact->email))<a
                                href="mailto:{{ $contact->email }}"> 
                        <span class="font-normal">
                            {{ $contact->email }}</span></a> @endif
                    </p>
                    <p>Instagram : @if (!empty($contact->instagram))<a
                                href="https://www.instagram.com/{{ $contact->instagram }}"><span
                                    class="font-normal">{{ $contact->instagram }}</span></a> @endif
                    </p>
                </div>
            </div>
        </section>
    </main>
@endsection
