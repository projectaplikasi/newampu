@extends('layout.master')
@section('content')
    <style>
        /* Gaya khusus untuk pencetakan */
        @media print {
            body {
                background-color: white;
                font-size: 12pt;
                color: black;
            }

            nav,
            .btn-back,
            .btn-print {
                display: none;
            }

            .printable-area {
                margin: 0;
                padding: 0;
                width: 100%;
            }

            .printable-area h2,
            .printable-area ul {
                margin: 0;
                padding: 0;
            }

            .printable-area h2 {
                margin-bottom: 20px;
                font-size: 18pt;
            }

            .printable-area ul {
                list-style: none;
                padding: 0;
            }

            .printable-area ul li {
                margin-bottom: 10px;
                font-size: 14pt;
            }

            .printable-area .diskon-section {
                margin-top: 20px;
            }

            .printable-area .diskon-section h3 {
                font-size: 16pt;
            }

            .printable-area .diskon-section ul li {
                margin-bottom: 10px;
            }

            /* Disable margin and padding for print */
            .mx-auto,
            .mt-8,
            .mt-6,
            .mb-4 {
                margin: 0;
            }

            .p-6,
            .p-4,
            .p-5,
            .px-6,
            .py-3 {
                padding: 0;
            }

            .rounded-lg,
            .shadow-md {
                border-radius: 0;
                box-shadow: none;
            }
        }

        /* Gaya standar untuk tampilan layar */
        body {
            background-color: #f7f7f7;
            color: #333;
        }

        .btn-print {
            margin-top: 20px;
            display: inline-block;
            padding: 10px 20px;
            background-color: #007BFF;
            color: white;
            border-radius: 5px;
            text-decoration: none;
            text-align: center;
        }

        .btn-print:hover {
            background-color: #0056b3;
        }

        .printable-area {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>

    <!-- Header -->
    <nav class="bg-white text-black p-4 px-6 flex justify-between items-center shadow-lg">
        <h1 class="text-lg font-bold">Hasil Transaksi</h1>
        <a href="/" class="text-sm text-black btn-back">Kembali</a>
    </nav>

    <!-- Main Content -->
    <main class="mx-auto mt-8 printable-area">
        <div class="bg-white p-6 rounded-lg shadow-md w-full md:w-2/3 mx-auto">
            <h2 class="text-2xl font-semibold mb-4">Detail Transaksi</h2>
            <ul class="space-y-4 text-sm md:text-lg">
                @if (session('data'))
                    <li><strong>Nama Penyewa:</strong> {{ session('data')['name_customer'] }}</li>
                    <li><strong>No Telepon:</strong> {{ session('data')['phone_customer'] }}</li>
                    <li><strong>Alamat:</strong> {{ session('data')['address_customer'] }}</li>
                    <li><strong>Email:</strong> {{ session('data')['email_customer'] }}</li>
                    <li><strong>Type Penyewa:</strong> {{ session('data')['type_customer'] }}</li>
                    <li><strong>Tanggal Sewa:</strong> {{ session('data')['tanggal_sewa'] }}</li>
                    <li><strong>Tanggal Pengembalian:</strong> {{ session('data')['tanggal_kembali'] }}</li>
                    <li><strong>Jumlah:</strong> {{ session('data')['jumlah'] }} unit</li>
                    @if (session('harga'))
                    <li><strong>Harga per unit:</strong> Rp. {{ session('harga') }}</li>
                    @endif
                    <li><strong>Total Biaya:</strong> <span id="hargaTotal" class="text-red-500">Rp.
                            {{ session('data')['total_biaya'] }}</span></li>
                @endif
                @if (session('durasi'))
                    <li><strong>Durasi Sewa:</strong> {{ session('durasi') }} hari</li>
                @endif
            </ul>

            <!-- Diskon Section -->
        </div>

        <!-- Print Button -->
        <div class="flex justify-center">
            <a href="#" id="printBtn" class="btn-print" onclick="window.print()">Cetak</a>
        </div>
    </main>
@endsection
