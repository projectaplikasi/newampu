@extends('layout.master')
@section('content')
    @include('layout.nav.nav')
    <!-- Main Content -->
    <main class="mx-auto">
        <!-- Product Detail Section -->
        <div class="flex flex-col h-auto md:flex-row w-full gap-4 p-6 rounded-lg">
            <!-- Product Image -->
            <div class="w-full md:w-1/2 flex justify-center items-center bg-gray-300 h-[70vh] shadow-md">
                <img src="{{ asset('img/' . $data->image) }}" class="w-full h-full object-contain" alt="{{ $data->name }}">
            </div>
            <!-- Product Info -->
            <div
                class="w-full md:w-1/2 bg-gray-50 p-4 rounded-md shadow-md border border-gray-200 flex flex-col justify-between">
                <ul class="space-y-2 text-sm md:text-lg">
                    <li><strong>Nama :</strong> {{ $data->name }}</li>
                    <li><strong>Spesifikasi :</strong> {{ $data->spesifikasi }}</li>
                    <li><strong>Merk :</strong> {{ $data->merk }}</li>
                    <li><strong>Kode Produk :</strong> {{ $data->kode_produk }}</li>
                    <li><strong>Tersedia :</strong> {{ $data->stok }} Barang</li>
                    <li><strong>Harga :</strong> <span class="text-red-500">Rp.
                            {{ number_format($data->harga, 0, ',', '.') }}/days</span></li>
                    <li><strong>Deskripsi :</strong> {{ $data->deskripsi }}</li>
                </ul>
                <div class="flex justify-end mt-4">
                    <a href="/transaksi={{ $data->kode_produk }}" class="bg-red-500 text-white py-2 px-6 rounded-md">Sewa</a>
                </div>
            </div>
        </div>

        <!-- Related Products Section -->
        <section class="mt-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 p-5">
            <!-- Product 1 -->
            @foreach ($produk as $item)
                <a href="/detail/show={{ $item->kode_produk }}" class="bg-white rounded shadow-md ">
                    <div class="w-full bg-gray-300 h-48 flex justify-center items-center">
                        <img src="{{ asset('img/' . $item->image) }}" alt="Product Image"
                            class="w-full h-full object-cover">
                    </div>
                    <div class="p-4 w-full">
                        <h3 class="text-lg font-bold">{{ $item->name }}</h3>
                        <p class="text-red-500">Rp. {{ $item->harga }}/hari</p>
                    </div>
                </a>
            @endforeach
        </section>
    </main>
@endsection
<!-- Header -->

</body>

</html>
