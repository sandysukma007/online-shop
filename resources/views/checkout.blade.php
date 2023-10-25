@extends('layout.app')
@section('title', 'Checkout Produk' . $detail["nama_produk"])
@section('content')
    <div class="container">
        @auth
        <h2>Checkout {{ Auth::user()->name }}</h2>
        <form action="{{ route('checkout_proses') }}" method="POST">
            @csrf
            <input type="hidden"  value="{{Auth::user()->name}}" name="name_user">
            <input type="hidden" value="{{Auth::user()->username}}" name="username_user">
            <input type="hidden" value="{{Auth::user()->email}}" name="email_user">
        <div class="card mb-3" style="max-width: 740px;">
            <div class="row g-0">
              <div class="col-md-4">
                <img src="{{ asset('/storage/foto-produk/'. $detail["foto_produk"]) }}" class="img-fluid rounded-start" alt="...">
                <input type="hidden" value="{{ asset('/storage/foto-produk/'. $detail["foto_produk"]) }}" name="foto_produk" id="foto_produk">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                    
                  <h5 class="card-title">
                    <input type="text" style="border: none; width: 100%;" value="{{ $detail["nama_produk"] }}" name="nama_produk" readonly>
                    </h5>
                  <p class="card-text">
                    <input type="text" style="border: none" value="{{ $detail["harga_produk"] }}" name="harga_produk" readonly>
                  </p>
                  <input type="hidden" value="Belum Bayar" name="status">
                 <button class="btn btn-success" type="submit">Order</button>
                </div>
              </div> 
            </div>
        </form>
        @endauth
          </div>
    </div>
</div>
@endsection