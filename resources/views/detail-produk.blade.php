@extends('layout.app')
@section('title', 'Halaman Produk' . $detail["nama_produk"])

@section('content')
<style>
    /* body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
    }
    .container {
        max-width: 800px;
        margin: 0 auto;
        background: #fff;
        padding: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 5px;
    } */
    h1 {
        text-align: center;
        color: #333;
    }
    .product-info {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin: 20px 0;
    }
    .product-info img {
        max-width: 300px;
        max-height: 300px;
    }
    .product-description {
        flex: 1;
        padding: 0 20px;
    }
</style>
<div class="container">
    <h1>{{ $detail["nama_produk"] }}</h1>
    <div class="product-info">
        <img src="{{ asset('/storage/foto-produk/'. $detail["foto_produk"]) }}" alt="{{ $detail["nama_produk"] }}">
        <div class="product-description">
            <p><strong>Harga:</strong> Rp {{ number_format($detail["harga_produk"], 0, ',', '.') }}</p>
           
        </div>
    </div>
</div>
@endsection