@extends('layout.app')
@auth
@section('title', 'Pembayaran')
@section('content')
<h1>Pembayaran {{  Auth::user()->username }}</h1>

    <div id="countdown">
        <h5>Waktu tersisa: <span id="timer"></span></h5>
        <p>Total Bayar :  <span class="float-end">{{ $totalHargaIDR }}</span></p>
        <div class="d-grid gap-2">
            <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Upload Bukti Pembayaran
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Upload Bukti Pembayaran Mu1</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{ route('proses_payment') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="file" name="bukti-pembayaran" id="">
            <input type="hidden" value="{{ Auth::user()->username }}" name="username">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <div class="my-3">
            <button class="btn btn-success" type="submit">Submit</button>
          </div>
        </div>
      </div>
    </form>
    </div>
  </div>
          </div>
    </div>

    <script>
        // Atur tanggal akhir countdown (gantilah dengan tanggal yang sesuai)
        var countDownDate = new Date("Nov 28, 2023 00:00:00").getTime();
    
        // Perbarui countdown setiap 1 detik
        var x = setInterval(function() {
            var now = new Date().getTime();
            var distance = countDownDate - now;
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
            // Tampilkan countdown di elemen dengan id "timer"
            document.getElementById("timer").innerHTML = days + "d " + hours + "h " + minutes + "m " + seconds + "s ";
    
            // Jika waktu countdown habis, tampilkan pesan
            if (distance < 0) {
                clearInterval(x);
                document.getElementById("timer").innerHTML = "Waktu habis!";
            }
        }, 1000);
    </script>
    

@endsection
@endauth