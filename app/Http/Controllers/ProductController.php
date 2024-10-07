<?php

namespace App\Http\Controllers;

use Validator;
use App\Models\Product;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{
    //
    public function addproduk(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_produk' => 'required|max:50',
            'spesifikasi' => 'required|max:255',
            'stok' => 'required|integer|max:9999999999',
            'harga' => 'required|integer|max:9999999999',
            'merk' => 'required|max:50',
            'deskripsi' => 'required|max:255',
            'image' => 'required|mimes:png,jpg,jpeg|image|max:8000',
        ]);

        if ($validator->fails()) {
            Alert::error('Gagal', 'Data tidak lengkap');
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $image = $request->file('image');
            $extensi = $image->getClientOriginalExtension();
            $files = 'imgproduk-' . now()->timestamp . '.' . $extensi;
            $image->move('img', $files);

            $data = [
                'name' => $request->input('nama_produk'),
                'spesifikasi' => $request->input('spesifikasi'),
                'stok' => $request->input('stok'),
                'harga' => $request->input('harga'),
                'merk' => $request->input('merk'),
                'deskripsi' => $request->input('deskripsi'),
                'image' => $files,
            ];

            Product::create($data);
            Alert::success('Berhasil', 'Data telah ditambahkan');
            return redirect('/admin/dataproduk');
        }
    }

    public function deleteproduk($id)
    {
        $product = Product::find($id);
        $namaFile = $product->image;
        $lokasi = public_path('img/' . $namaFile);
        if (file_exists($lokasi)) {
            unlink($lokasi);
        }
        $product->delete();
        Alert::success('Berhasil', 'Data telah dihapus');
        return redirect()->back();
    }

    public function editproduk(Product $product, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_produk' => 'required|max:50',
            'spesifikasi' => 'required|max:255',
            'stok' =>  'required|integer|max:9999999999',
            'harga' => 'required|integer|max:999999999999',
            'merk' => 'required|max:50',
            'deskripsi' => 'required|max:255',
            'image' => 'nullable|mimes:png,jpg,jpeg|image|max:8000', // 'nullable' berarti gambar opsional
        ]);
    
        if ($validator->fails()) {
            Alert::error('Gagal', 'Data tidak lengkap');
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $extensi = $image->getClientOriginalExtension();
                $files = 'imgproduk-' . now()->timestamp . '.' . $extensi;
                $image->move('img', $files);
                
                if ($product->image && file_exists(public_path('img/' . $product->image))) 
                {
                    unlink(public_path('img/' . $product->image));
                }
            } else {
                // Jika tidak ada gambar baru, gunakan gambar lama
                $files = $product->image;
            }
    
            // Update data produk
            $product->update([
                'name' => $request->input('nama_produk'),
                'spesifikasi' => $request->input('spesifikasi'),
                'stok' => $request->input('stok'),
                'harga' => $request->input('harga'),
                'merk' => $request->input('merk'),
                'deskripsi' => $request->input('deskripsi'),
                'image' => $files,
            ]);
            Alert::success('Berhasil', 'Data telah diperbarui');
            return redirect('/admin/dataproduk');
        }
    }

    
    
}
