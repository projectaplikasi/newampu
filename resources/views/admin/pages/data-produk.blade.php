@extends('layout.master')
@section('content')
    @include('layout.side.sidebar')

    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 rounded-lg dark:border-gray-700">
            <!-- Canvas for the Chart -->
            <div class="w-full flex justify-between ">
                <h1 class="font-bold text-lg text-black">Data Produk</h1>
                <a class="bg-blue-600 text-white p-2 rounded-md w-auto" href="/admin/addproduk">
                    <h1 class="hidden sm:flex">Tambah</h1>
                    <h1 class="flex sm:hidden">+</h1>
                </a>
            </div>

            <!-- Table for the Sales Data -->
            <div class="w-full">

                <table id="search-table">
                    <thead>
                        <tr>
                            <th>
                                <span class="flex items-center">
                                    Nama Produk
                                </span>
                            </th>
                            <th>
                                <span class="flex items-center">
                                    Kode Produk
                                </span>
                            </th>
                            <th>
                                <span class="flex items-center">
                                    Stok
                                </span>
                            </th>
                            <th>
                                <span class="flex items-center">
                                    Harga
                                </span>
                            </th>
                            <th>
                                <span class="flex items-center">
                                    Spesifikasi
                                </span>
                            </th>
                            <th>
                                <span class="flex items-center">
                                    Merk
                                </span>
                            </th>
                            <th>
                                <span class="flex items-center">
                                    Deskripsi
                                </span>
                            </th>
                            <th>
                                <span class="flex items-center">
                                    Aksi
                                </span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($produk as $p)
                            <tr>
                                <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $p->name }}
                                </td>
                                <td>{{ $p->kode_produk }}</td>
                                <td>{{ $p->stok }}</td>
                                <td>{{ number_format($p->harga, 0, ',', '.') }}</td>
                                <td>{{ $p->spesifikasi }}</td>
                                <td>{{ $p->merk }}</td>
                                <td>{{ $p->deskripsi }}</td>
                                <td>
                                    <div class="flex gap-2">

                                        <a href="/admin/editproduk={{ $p->id }}"
                                            class="bg-green-500 p-1 px-2 rounded-md text-white">Edit</a>

                                        <form id="delete-form-{{ $p->id }}"
                                            action="/deleteproduk/{{ $p->id }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" onclick="confirmDelete({{ $p->id }})"
                                                class="bg-red-500 p-1 px-2 rounded-md text-white">Hapus</button>
                                        </form>
                                        {{-- <a href="/deleteproduk/{{ $p->id }}" 
                                            class="bg-red-500 p-1 px-2 rounded-md text-white">Hapus</a> --}}
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>

                </table>
            </div>
        </div>
    </div>
    @push('script')
        <script>
            function confirmDelete(id) {
                Swal.fire({
                    title: 'Hapus Product!',
                    text: 'Apakah Anda Yakin?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Hapus ini!',
                    cancelButtonText: 'No, Batalkan'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Menyubmit formulir setelah konfirmasi
                        document.getElementById('delete-form-' + id).submit();
                    }
                });
            }

            if (document.getElementById("search-table") && typeof simpleDatatables.DataTable !== 'undefined') {
                const dataTable = new simpleDatatables.DataTable("#search-table", {
                    searchable: true,
                    sortable: false
                });
            }
        </script>
    @endpush
@endsection
