@extends('layout.app-admin')
@section('title-admin', 'Halaman Produk')

@section('content-admin')
<div class="row">
  <h1>Ini barang admin</h1>
    <table class="table table-hover table-striped table-bordered">
      <thead>
        <tr>
          <th>No.</th>
          <th>Foto Produk</th>
          <th>Nama Produk</th>
          <th>Harga Produk</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($produk as $data_produk)
        <tr>
          <td>
            {{$no++}}
          </td>
          <td>
            <img src="{{ asset('/storage/foto-produk/'. $data_produk["foto_produk"]) }}" class="card-img-top" alt="..." width="50px" height="100px">
          </td>
          <td>
            {{ $data_produk["nama_produk"] }}
          </td>
          <td>
            {{ $data_produk["harga_produk"] }}
          </td>
        </tr>
        @endforeach
      </tbody>
  </table>
</div>
@endsection