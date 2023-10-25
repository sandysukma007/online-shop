<div>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Online Shop MRG</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ms-auto">
              <a class="nav-link active" aria-current="page" href="{{ route('index') }}">Produk</a>
              @auth
              
              <a class="nav-link " href="{{ route('profile', ['username' => Auth::user()->name]) }}">Selamat datang, {{ Auth::user()->name }}!</a>
              @else
              <a class="nav-link" href="{{ route('register') }}">Register</a>
              <a class="nav-link" href="{{ route('login') }}">Login</a>
              @endauth
              
            </div>
          </div>
        </div>
      </nav>
</div>