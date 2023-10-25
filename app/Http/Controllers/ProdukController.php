<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
   
    public function list_produk() {
        $produk = Produk::all();
        
        return view('welcome', compact('produk'));
    }

    public function detail_produk($id) {
        $detail = Produk::findOrFail($id);
        return view('detail-produk', compact('detail'));
    }
}
