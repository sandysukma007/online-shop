<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{


    public function countCheckoutsByUser($username)
    {
        $count = Checkout::where('username', $username)->count();
        return $count;
    }

    public function payment() {
        $username = Auth::user()->username;
        $produkYangDiCheckout = Checkout::where('username', $username)->get();
        $totalHarga = $produkYangDiCheckout->sum('harga_produk');
        $totalHargaIDR = 'Rp ' . number_format($totalHarga, 0, ',', '.');
        return view('pembayaran', compact('produkYangDiCheckout', 'totalHarga', 'totalHargaIDR'));
    }

    public function proses_payment(Request $request) {
        $image = $request->file('bukti-pembayaran');
        $image->storeAs('public/bukti-pembayaran', $image->hashName());
        $payment = Payment::create([
            'foto_produk'     => $image->hashName(),
            'username'     => $request->username,
         ]);

         $checkout = Checkout::where('username', $request->username)->where('status', 'Belum Bayar')->first();

         if ($payment) {
            // Jika entitas Checkout ditemukan, update statusnya menjadi "berhasil"
            $checkout->update([
                'status' => 'berhasil'
            ]);
        }
        return redirect()->route('profile')->with('success-payment', 'Kamu sudah kirim pembayaran ! Terima Kasih !');
    }

    
}
