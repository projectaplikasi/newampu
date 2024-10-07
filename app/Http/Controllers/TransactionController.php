<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Validator;
use Carbon\Carbon;
use App\Models\Product;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class TransactionController extends Controller
{
    //
    public function pesan(Request $request, Product $product)
    {
        $validator = Validator::make($request->all(), [
            'name_customer' => 'required|max:70',
            'phone_customer' => 'required|max:16',
            'email_customer' => 'required|email',
            'address_customer' => 'required|max:550',
            'jumlah' => 'required',
            'type_customer' => 'required',
            'tanggal_sewa' => 'required',
            'tanggal_kembali' => 'required',
        ]);

        if ($validator->fails()) {
            Alert::error('Gagal', 'Data tidak lengkap');
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $tanggalsewa = Carbon::parse($request->input('tanggal_sewa'));
            $tanggalkembali = Carbon::parse($request->input('tanggal_kembali'));
            $harga = $product->harga;
            $jumlah = $request->input('jumlah');
            $typeCustomer = $request->input('type_customer');

            if ($tanggalsewa->gt($tanggalkembali)) {
                Alert::error('Gagal', 'Tanggal sewa harus sebelum tanggal kembali');
                return redirect()->back()->withInput();
            }
            $selisih = $tanggalkembali->diffInDays($tanggalsewa);
            if ($selisih == 0) {
                $selisih = 1;
            }
            $total = $harga * $jumlah * $selisih;


            $diskon = 0;
            if ($typeCustomer == 'mahasiswa_umum') {
                $diskon = 1.00;
            } elseif ($typeCustomer == 'mahasiswa_praktek') {
                $diskon = 1.00;
            } elseif ($typeCustomer == 'umum') {
                $diskon = 0;
            } elseif ($typeCustomer == 'divisi') {
                $diskon = 1.00;
            }

            if ($diskon == 1.00) {
                $totalHargaSetelahDiskon = 0; // Jika diskon 100%, total harga jadi 0
            } else {
                $totalHargaSetelahDiskon = $total - ($total * $diskon);
            }
            $totalBiaya = $totalHargaSetelahDiskon;

            if ($product->stok < $jumlah) {
                Alert::error('Gagal', 'Stok tidak tersedia');
                return redirect()->back()->withInput();
            }

            $product->stok -= $jumlah; // Kurangi stok
            $product->save(); // Simpan perubahan ke database

            $data = [
                'product_id' => $product->id,
                'name_customer' => $request->input('name_customer'),
                'phone_customer' => $request->input('phone_customer'),
                'email_customer' => $request->input('email_customer'),
                'address_customer' => $request->input('address_customer'),
                'jumlah' => $request->input('jumlah'),
                'type_customer' => $request->input('type_customer'),
                'tanggal_sewa' => $request->input('tanggal_sewa'),
                'tanggal_kembali' => $request->input('tanggal_kembali'),
                'total_biaya' => $totalBiaya,
            ];

            Transaction::create($data);
            Alert::success('Berhasil', 'Pesanan telah dibuat');
            return redirect('/hasiltransaksi')->with([
                'harga' => $product->harga,
                'data' => $data,
                'durasi' => $selisih
            
            ]);

        }
    }

    public function hasil()
    {
        $title = 'Hasil Transaksi';
        return view('pages.result-transaksi', compact('title'));
    }
}
