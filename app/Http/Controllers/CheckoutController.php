<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Checkout;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{

    public function checkout_produk($id) {
        $detail = Produk::findOrFail($id);
        return view('checkout', compact('detail'));
    }

    public function checkout_proses(Request $request) {
        // $image = $request->file('foto_produk');
        // $image->storeAs('public/foto-produk-co', $image->hashName());

        
        Checkout::create([
            'username'     => $request->username_user,
            'email'   => $request->email_user,
           'foto_produk'     => $request->foto_produk,
           'nama_produk'     => $request->nama_produk,
           'harga_produk'   => $request->harga_produk,
           'status' => $request->status
        ]);

        return redirect()->route('profile')->with('order', 'Pesanan ' . $request->nama_produk . ' telah ditambahkan ke keranjang');
    }

    public function countCheckoutsByUser($username)
    {
        $count = Checkout::where('username', $username)->count();
        return $count;
    }
    public function showUserProfile()
    {
        $username = Auth::user()->username;
        $checkoutCount = $this->countCheckoutsByUser($username);
        $produkYangDiCheckout = Checkout::where('username', $username)->get();
        $no = 1;
        $totalHarga = $produkYangDiCheckout->sum('harga_produk');
        $totalHargaIDR = 'Rp ' . number_format($totalHarga, 0, ',', '.');
        return view('profile', compact('checkoutCount', 'produkYangDiCheckout', 'no', 'totalHarga', 'totalHargaIDR'));
    }
    
}
