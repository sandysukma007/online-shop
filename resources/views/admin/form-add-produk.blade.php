@extends('layout.app')
@section('title', 'Login Admin')
@section('content')
<form action=" {{ route('admin-proses-produk') }} " method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label class="font-weight-bold">Foto Produk</label>
        <input type="file" class="form-control @error('fotoproduk') is-invalid @enderror" name="fotoproduk">
    
        <!-- error message untuk title -->
        @error('fotoproduk')
            <div class="alert alert-danger mt-2">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="form-group">
        <label class="font-weight-bold">Nama Produk</label>
        <input type="text" class="form-control @error('namaproduk') is-invalid @enderror" name="namaproduk">
    
        <!-- error message untuk title -->
        @error('namaproduk')
            <div class="alert alert-danger mt-2">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="form-group">
        <label class="font-weight-bold">Harga Produk</label>
        <input type="text" class="form-control @error('hargaproduk') is-invalid @enderror" name="hargaproduk">
    
        <!-- error message untuk title -->
        @error('hargaproduk')
            <div class="alert alert-danger mt-2">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="mb-3">
        <button class="btn btn-primary" type="submit">Add Produk</button>
    </div>
</form>


@endsection