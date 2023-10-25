@extends('layout.app')
@auth
@section('title', 'Profile' . Auth::user()->username)
@section('content')

<div class="card p-4">
  @if (session('order'))
  <div class="alert alert-success">
      {{ session('order') }}
  </div>
  @endif
      {{-- {{ dd($produkYangDiCheckout) }} --}}
      <table class="table table-hover table-striped table-bordered">
        <thead>
          <tr>
            <th>No.</th>
            <th>Nama Produk</th>
            <th>Harga Produk</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($produkYangDiCheckout as $produk_user)
          <tr>
            <td>
              {{$no++}}
            </td>
            <td>
              {{ $produk_user["nama_produk"] }}
            </td>
            <td>
              {{ $produk_user["harga_produk"] }}
            </td>
          </tr>
          @endforeach
        </tbody>
    </table>
      
      @if ($checkoutCount === 0)
      <p>Jumlah Checkout: {{ $checkoutCount }}</p>
      @else
      <p>Jumlah Checkout: {{ $checkoutCount }}</p>
      <p>Total Bayar :  <span class="float-end">{{ $totalHargaIDR }}</span></p>
      <div class="d-grid gap-2">
        <a class="btn btn-primary" href="{{ route('payment') }}" type="button">Bayar Sekarang</a>
      </div>
      @endif
  
      <form id="logout-form" action="{{ route('logout') }}" method="POST">
          @csrf
          <button class="btn btn-danger mt-4" type="submit">Logout</button>
      </form>
</div>


@endsection
@endauth
