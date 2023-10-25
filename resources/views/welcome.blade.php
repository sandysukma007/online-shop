@extends('layout.app')
@section('title', 'Halaman Produk')

@section('content')
<div class="row">
    @foreach ($produk as $data_produk)
    <div class="col-md-3 mb-3">
        <div class="card" style="width: 15rem;">
          <img src="{{ asset('/storage/foto-produk/'. $data_produk["foto_produk"]) }}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">{{ $data_produk["nama_produk"] }}</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="{{ route('checkout_produk', $data_produk["id"]) }}" class="btn btn-primary">Checkout</a>
              <a href="{{ route('detail_produk', $data_produk["id"]) }}" class="btn btn-primary">Detail</a>
            </div>
          </div>
    </div>
    @endforeach
</div>
@endsection