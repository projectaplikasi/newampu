@extends('layout.master')
@section('content')
    <div class="flex justify-center items-center">
        <div class="bg-white w-full">
            <div class="flex justify-between p-3 px-6 bg-blue-500 w-full items-center mb-4">
                <h1 class="text-xl font-semibold text-white">Edit Produk</h1>
                <a href="/admin/dataproduk" class="text-white hover:underline">Kembali</a>
            </div>

            <form action="/editproduk={{ $product->id }}" method="POST" enctype="multipart/form-data" class="p-8 w-4/5">
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-600 mb-2">Nama Produk</label>
                    <input type="text" name="nama_produk" value="{{ $product->name }}"
                        class="w-full p-1 text-sm rounded bg-gray-200 border border-gray-300 focus:outline-none focus:border-blue-500">
                    @error('nama_produk')
                        <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="block text-gray-600 mb-2">Spesifikasi</label>
                    <input type="text" name="spesifikasi" value="{{ $product->spesifikasi }}"
                        class="w-full p-1 text-sm rounded bg-gray-200 border border-gray-300 focus:outline-none focus:border-blue-500">
                    @error('spesifikasi')
                        <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="block text-gray-600 mb-2">Stok</label>
                    <input type="number" name="stok" value="{{ $product->stok }}"
                        class="w-full p-1 text-sm rounded bg-gray-200 border border-gray-300 focus:outline-none focus:border-blue-500">
                    @error('stok')
                        <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="block text-gray-600 mb-2">Harga</label>
                    <input type="text" name="harga" value="{{ $product->harga }}"
                        class="w-full p-1 text-sm rounded bg-gray-200 border border-gray-300 focus:outline-none focus:border-blue-500">
                    @error('harga')
                        <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="block text-gray-600 mb-2">Merk</label>
                    <input type="text" name="merk" value="{{ $product->merk }}"
                        class="w-full p-1 text-sm rounded bg-gray-200 border border-gray-300 focus:outline-none focus:border-blue-500">
                    @error('merk')
                        <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="block text-gray-600 mb-2">Deskripsi</label>
                    <textarea name="deskripsi" rows="3"
                        class="w-full p-1 rounded bg-gray-200 border border-gray-300 focus:outline-none focus:border-blue-500">{{ $product->deskripsi }} </textarea>
                    @error('deskripsi')
                        <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload
                        file</label>
                    <input name="image" value="{{ $product->image }}"
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                        aria-describedby="file_input_help" id="file_input" type="file">
                    @error('image')
                        <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror
                    <img class="mt-5 h-48" src="{{ asset('img/' . $product->image) }}" alt="{{ $product->name }}">
                    <p>gambar sebelumnya</p>
                </div>
                <div class="flex justify-end">
                    <button type="submit"
                        class="bg-purple-500 text-white py-2 px-6 rounded hover:bg-purple-600 focus:outline-none">Perbarui</button>
                </div>
            </form>
        </div>
    </div>
@endsection
