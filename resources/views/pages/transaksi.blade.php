@extends('layout.master')
@section('content')
    @include('layout.nav.nav')
    <main class="mx-auto">
        <!-- Product Detail Section -->
        <div class="flex flex-col h-auto md:flex-row w-full gap-4 p-6 rounded-lg">
            <!-- Product Image -->
            <div class="w-full md:w-1/2 flex justify-center items-center bg-gray-300 h-[70vh] shadow-md">
                <img src="{{ asset('img/' . $product->image) }}" class="w-full h-full object-contain" alt="">
            </div>
            <!-- Product Info -->
            <div
                class="w-full md:w-1/2 bg-gray-50 p-4 rounded-md shadow-md border border-gray-200 flex flex-col justify-between">
                <ul class="space-y-2 text-sm md:text-lg">
                    <li><strong>Nama :</strong> {{ $product->name }}</li>
                    <li><strong>Spesifikasi :</strong> {{ $product->spesifikasi }}</li>
                    <li><strong>Merk :</strong> {{ $product->merk }}</li>
                    <li><strong>Kode Produk :</strong> {{ $product->kode_produk }}</li>
                    <li><strong>Tersedia :</strong> {{ $product->stok }} Barang</li>
                    <li><strong>Harga :</strong> <span class="text-red-500">Rp.
                            {{ number_format($product->harga, 0, ',', '.') }}/days</span></li>
                    <li><strong>Deskripsi :</strong> {{ $product->deskripsi }}</li>
                </ul>
            </div>
        </div>

        <!-- Related Products Section -->
        <section class="mt-8 p-5">
            <form action="/pesanproduct={{ $product->id }}" method="post">
                @csrf
                <h1 class="font-semibold text-lg mb-5">Informasi Penyewa</h1>
                <div class="grid gap-6 mb-6 md:grid-cols-2">
                    <div>
                        <label for="nama-lengkap" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                            Lengkap</label>
                        <input type="text" id="nama-lengkap" name="name_customer" value="{{ old('name_customer') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="John" />
                        @error('name_customer')
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="phone_customer" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No
                            Telepon</label>
                        <input type="text" id="phone_customer" name="phone_customer" value="{{ old('phone_customer') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="+62 894 6673 2822" />
                        @error('phone_customer')
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="alamat"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                        <input type="text" id="alamat" name="address_customer" value="{{ old('address_customer') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="kirim alamat anda" />
                        @error('address_customer')
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="email"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                        <input type="email" id="email" name="email_customer" value="{{ old('email_customer') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="@johndoen" />
                    </div>
                    <div>
                        <label for="type-customer" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Type
                            Penyewa</label>
                        <select id="type-customer" name="type_customer" value="{{ old('type_customer') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="" selected>Pilih type</option>
                            <option value="mahasiswa_umum">Mahasiswa Umum</option>
                            <option value="mahasiswa_praktek">Mahasiswa Praktek</option>
                            <option value="umum">Umum</option>
                            <option value="divisi">Divisi</option>
                        </select>
                        @error('type_customer')
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <h1 class="font-semibold text-lg mb-5">Informasi Sewa</h1>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div>
                        <label for="tanggal-sewa"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Sewa</label>
                        <input type="date" id="tanggal-sewa" name="tanggal_sewa" value="{{ old('tanggal_sewa') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="" required />
                        @error('tanggal_sewa')
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="harga-sewa" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga
                            sewa</label>
                        <input type="number" id="harga-sewa" name="harga"
                            value="{{ number_format($product->harga, 0, ',', '.') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            disabled />
                    </div>
                    <div>
                        <label for="tanggal-pengembalian"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                            Pengembalian</label>
                        <input type="date" id="tanggal-pengembalian" name="tanggal_kembali"
                            value="{{ old('tanggal_kembali') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required />
                        @error('tanggal_kembali')
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="jumlah"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jumlah</label>
                        <input type="number" id="jumlah" name="jumlah" value="{{ old('jumlah') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                    </div>
                    @error('jumlah')
                        <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex mt-5 justify-end items-center">
                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Pesan</button>
                </div>
            </form>


        </section>
    </main>
@endsection
