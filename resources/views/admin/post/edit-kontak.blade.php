@extends('layout.master')
@section('content')
<div class="flex justify-center items-center">
    <div class="bg-white w-full">
        <div class="flex justify-between p-3 px-6 bg-blue-500 w-full items-center mb-4">
            <h1 class="text-xl font-semibold text-white">Edit Kontak</h1>
            <a href="/admin/kontak" class="text-white hover:underline">Kembali</a>
        </div>
        <form action="/editkontak={{ $contact->id }}" method="POST" class="p-8 w-4/5">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-600 mb-2">No WhatsApp</label>
                <input type="text" name="whatsapp" value="{{ $contact->whatsapp }}"
                    class="w-full text-sm p-2 rounded bg-gray-200 border border-gray-300 focus:outline-none focus:border-blue-500">
            </div>
            <div class="mb-4">
                <label class="block text-gray-600 mb-2">Email</label>
                <input type="email" name="email" value="{{ $contact->email }}"
                    class="w-full text-sm p-2 rounded bg-gray-200 border border-gray-300 focus:outline-none focus:border-blue-500">
            </div>
            <div class="mb-4">
                <label class="block text-gray-600 mb-2">Instagram</label>
                <input type="text" name="instagram" value="{{ $contact->instagram }}"
                    class="w-full text-sm p-2 rounded bg-gray-200 border border-gray-300 focus:outline-none focus:border-blue-500">
            </div>
            <div class="mb-4">
                <label class="block text-gray-600 mb-2">Iframe Maps</label>
                <input type="text" name="iframe_maps"  value="{{ $contact->iframe_maps }}"
                    class="w-full text-sm p-2 rounded bg-gray-200 border border-gray-300 focus:outline-none focus:border-blue-500">
            </div>
            <div class="flex justify-end">
                <button type="submit"
                    class="bg-purple-500 text-white py-2 px-6 rounded hover:bg-purple-600 focus:outline-none">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection