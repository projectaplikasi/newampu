<?php

namespace App\Http\Controllers;


use App\Models\Contact;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    //
    public function addkontak(Request $request){
        $validator = Validator::make($request->all(), [
            'whatsapp' => 'required|max:16',
            'email' => 'required|email',
            'instagram' => 'required|max:50',
            'iframe_maps' => 'required|max:550',
        ]);
        if ($validator->fails()) {
            Alert::error('Gagal', 'Data tidak lengkap');
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $data = [
                'whatsapp' => $request->input('whatsapp'),
                'email' => $request->input('email'),
                'instagram' => $request->input('instagram'),
                'iframe_maps' => $request->input('iframe_maps'),
            ];

            Contact::create($data);
            Alert::success('Berhasil', 'Data berhasil ditambahkan');
            return redirect('/admin/kontak');

        }
    }

    public function editkontak(Request $request, Contact $contact){
        $validator = Validator::make($request->all(), [
            'whatsapp' => 'required|max:16',
            'email' => 'required|email',
            'instagram' => 'required|max:50',
            'iframe_maps' => 'required|max:550',
        ]);
        if ($validator->fails()) {
            Alert::error('Gagal', 'Data tidak lengkap');
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $contact->update([
                'whatsapp' => $request->input('whatsapp'),
                'email' => $request->input('email'),
                'instagram' => $request->input('instagram'),
                'iframe_maps' => $request->input('iframe_maps')
            ]);
            Alert::success('Berhasil','Kontak telah diperbarui');
            return redirect('/admin/kontak');
        }
    }

    public function deletekontak(Contact $contact){
        $contact->delete();
        Alert::success('Berhasil','Kontak telah dihapus');
        return redirect()->back();
    }
}
