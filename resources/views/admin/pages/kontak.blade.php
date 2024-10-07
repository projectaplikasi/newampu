@extends('layout.master')
@section('content')
    @include('layout.side.sidebar')
    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 rounded-lg dark:border-gray-700">
            <!-- Canvas for the Chart -->
            <div class="w-full flex justify-between mb-5">
                <h1 class="font-bold text-lg text-black">Kontak</h1>
                @if ($kontak->count() < 1)
                    <a class="bg-blue-600 p-2 rounded-md w-auto text-white" href="/admin/addkontak">
                        <h1 class="hidden sm:flex">Tambah</h1>
                        <h1 class="flex sm:hidden">+</h1>
                    </a>
                @endif
            </div>

            <!-- Table for the Sales Data -->
            <div class="w-full">

                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr class="border border-gray-200">
                                <th scope="col" class="px-6 py-3">
                                    WhatsApp
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Email
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Instagram
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Iframe Maps
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kontak as $item)
                                <tr>
                                    <td scope="row"
                                        class="px-6 border py-4 font-normal text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $item->whatsapp }}
                                    </td>
                                    <td scope="row"
                                        class="px-6 border py-4 font-normal text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $item->email }}
                                    </td>
                                    <td scope="row"
                                        class="px-6 border py-4 font-normal text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $item->instagram }}
                                    </td>
                                    <td scope="row"
                                        class="px-6 border py-4 font-normal text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ Str::limit($item->iframe_maps, 50, '....') }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex gap-2">
                                            <a href="/admin/editkontak={{ $item->id }}"
                                                class="bg-green-500 p-1 px-2 rounded-md text-white">Edit</a>
                                            <form id="delete-form-{{ $item->id }}"
                                                action="/deletekontak/{{ $item->id }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" onclick="confirmDelete({{ $item->id }})"
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
    </div>
    @push('script')
        <script src="{{ asset('js/sweetalert.js') }}"></script>
        <script>
            function confirmDelete(id) {
                Swal.fire({
                    title: 'Hapus Kontak!',
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
        </script>
    @endpush
@endsection
