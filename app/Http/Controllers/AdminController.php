<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Produk;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    

    public function halaman_admin() {
        $produk = Produk::all();
        $no = 1;
        return view('admin.list_produk', compact('produk', 'no'));
    }

    public function form_add_produk() {
        return view('admin.form-add-produk');
    }

    public function proses_add_produk(Request $request) {
        $this->validate($request, [
            'fotoproduk'     => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'namaproduk'     => 'required|min:5',
            'hargaproduk'   => 'required'
        ]);
         
         $image = $request->file('fotoproduk');
         $image->storeAs('public/foto-produk', $image->hashName());
         Produk::create([
            'foto_produk'     => $image->hashName(),
            'nama_produk'     => $request->namaproduk,
            'harga_produk'   => $request->hargaproduk,
            
         ]);

         return redirect()->route('index-admin')->with(['success' => 'Data Berhasil Disimpan!']);
    }
}
