@extends('layout.master')
@section('content')
    @include('layout.modal.modal')
    @include('layout.side.sidebar')
    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <!-- Canvas for the Chart -->
            <canvas id="myChart" width="400" height="200"></canvas>

            <form action="/admin/dashboard" method="GET" class="sm:w-3/4 w-full sm:px-10 px-4 flex mt-4">
                @csrf
                <input type="search" name="search"
                    class="w-full p-2 px-4 bg-white shadow-md text-sm border outline-none border-blue-300 rounded-s-md focus:border-blue-600"
                    placeholder="Cari data transaksi" />
                <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded-e-md shadow-md">Cari</button>
            </form>
            <!-- Table for the Sales Data -->
            
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="min-w-full mt-4 border-collapse">
                <thead>
                    <tr>
                        <th class="border text-black border-gray-300 p-2">Nama Penyewa</th>
                        <th class="border text-black border-gray-300 p-2">Nama Produk</th>
                        <th class="border text-black border-gray-300 p-2">Tanggal Transaksi</th>
                        <th class="border text-black border-gray-300 p-2">Total Biaya</th>
                        <th class="border text-black border-gray-300 p-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transaksi as $item)
                        <tr>
                            <td class="border text-black border-gray-300 p-2">{{ $item->name_customer }}</td>
                            <td class="border text-black border-gray-300 p-2">{{ $item->product->name }}</td>
                            <td class="border text-black border-gray-300 p-2">{{ $item->created_at }}</td>
                            <td class="border text-black border-gray-300 p-2">{{ $item->total_biaya }}</td>
                            <td class="border text-black border-gray-300 p-2">
                                <button id="detail" data-id="{{ $item->id }}"
                                    class="btn-detail bg-blue-500 p-1 px-2 rounded-md text-white">Detail</button>
                                </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
    </div>

    @push('script')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            $('.btn-detail').click(function() {
                var id = $(this).data('id')
                    $.ajax({
                        type: 'GET',
                        url: '/admin/transaksi/detail/' + id,
                        dataType: 'json',
                        success: function(res) {
                            $('#nama').text(res.data.name_customer)
                            $('#alamat').text(res.data.address_customer)
                            $('#nama-produk').text(res.data.product.name)
                            $('#merk').text(res.data.product.merk)
                            $('#harga').text(res.data.product.harga)
                            $('#jumlah').text(res.data.jumlah)
                            $('#tanggal-sewa').text(res.data.tanggal_sewa)
                            $('#total-biaya').text(res.data.total_biaya)
                        }
                    })


                $('#modal').removeClass('hidden');
                $('#modal').addClass('flex justify-center')
            })

            $('#close-modal').click(function() {
                $('#modal').removeClass('flex justify-center')
                $('#modal').addClass('hidden')
            })

            var ctx = document.getElementById('myChart').getContext('2d');

            // Data dari backend
            var labels = @json($labels);
            var data = @json($data);
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Sales Data',
                        data: data,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(75, 192, 192, 1)',
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>
    @endpush
@endsection
