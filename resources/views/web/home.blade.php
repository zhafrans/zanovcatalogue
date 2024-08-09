<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>ZANOV</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap Icons-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css"
      rel="stylesheet"
    />
    <!-- Google fonts-->
    <link
      href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link
      href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic"
      rel="stylesheet"
      type="text/css"
    />
    <!-- SimpleLightbox plugin CSS-->
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css"
      rel="stylesheet"
    />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    
    
  </head>
  
  
  <body id="page-top">
    <!-- Navigation-->
    @include('layouts.partials.webnavbar')
    <!-- Masthead-->
    <header class="masthead">
      <div class="container px-4 px-lg-5 h-100">
        <div
          class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center"
        >
          <div class="col-lg-8 align-self-end">
            <h1 class="text-white font-weight-bold">
              Selamat Datang di Website ZANOV katalog!
            </h1>
            <hr class="divider" />
          </div>
          <div class="col-lg-8 align-self-baseline">
            <p class="text-white-75 mb-5">Daftar Katalog ada di bawah</p>
            <a class="btn btn-primary btn-xl" href="#about">LIHAT DISINI</a>
          </div>
        </div>
      </div>
    </header>
    <!-- About-->
    <section class="page-section bg-primary" id="about">
      <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
          <div class="col-lg-8 text-center">
            <h2 class="text-white mt-0">ZANOV</h2>
            <hr class="divider divider-light" />
            <p class="text-white-75 mb-4">Sepatu dan Sandal Berkualitas</p>
            <p class="text-white-75 mb-4">VARIAN WARNA DAN UKURAN DAPAT DISESUAIKAN DENGAN PERMINTAAN BILA TERSEDIA</p>
            <div class="row mt-5">
              <div class="col-md-6">
                <i class="fa fa-whatsapp" style="font-size: 36px; color: white;">   089527321478</i>
              </div>
              <div class="col-md-6">
                <i class="fa fa-whatsapp" style="font-size: 36px; color: white;">   081329235551</i>
              </div>
            </div>
            
            <!-- <a class="btn btn-light btn-xl" href="#services">Get Started!</a> -->
          </div>
        </div>
      </div>
    </section>
    <!-- Services-->
    <section class="page-section" id="services">
      <div class="container ">
        <h2 class="text-center mt-0">Katalog</h2>
        <hr class="divider" />


        
      </div>
    </section>
    
    <div id="katalog" class="container-fluid bg-transparent" style="position: relative;">
      <!-- Search and Filter Section -->
      
<div class="row mb-3">
  <div class="col-auto">
    <form action="{{ route('search') }}" method="GET" class="input-group">
      <input type="text" class="form-control" name="keyword" placeholder="Search..." aria-label="Search..." value="{{ request('keyword') }}">
      <button class="btn btn-outline-primary" type="submit">Search</button>
  </form>
  </div>

  <div class="col-auto">
      <form action="{{ route('search') }}" method="GET" class="btn-group">
          <button type="button" class="btn btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Kategori
          </button>
          <div class="dropdown-menu">
              <a class="dropdown-item" href="{{ route('search', ['kategori' => 'Sandal']) }}">Sandal</a>
              <a class="dropdown-item" href="{{ route('search', ['kategori' => 'Sepatu']) }}">Sepatu</a>
          </div>
      </form>
  </div>

  <div class="col-auto">
      <form action="{{ route('search') }}" method="GET" class="btn-group">
          <button type="button" class="btn btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Bahan
          </button>
          <div class="dropdown-menu">
              <a class="dropdown-item" href="{{ route('search', ['bahan' => 'Kulit']) }}">Kulit</a>
              <a class="dropdown-item" href="{{ route('search', ['bahan' => 'Non-Kulit']) }}">Non-Kulit</a>
          </div>
      </form>
  </div>

  <div class="col-auto">
    <form action="{{ route('search') }}" method="GET" class="btn-group">
      <button type="button" class="btn btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Gender
      </button>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="{{ route('search', ['gender' => 'Pria']) }}">Pria</a>
        <a class="dropdown-item" href="{{ route('search', ['gender' => 'Wanita']) }}">Wanita</a>
      </div>
    </form>
  </div>
  
</div>

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 justify-content-start">
        @foreach($produk as $item)
        
        <div class="col">
          <div class="card h-100 shadow-sm">
            <img src="{{ asset('storage/gambar/' . $item->gambar) }}" class="card-img-top" alt="{{ $item->nama }}">
            
            <h5 class="card-title text-center mt-5" style="font-size: 40px"><strong>{{ $item->nama }}</strong></h5>
            <div class="text-center my-3 mb-5">
                
              </div>
            @if(Auth::check() && (Auth::user()->role == 'admin' || Auth::user()->role == 'sales'))
            <div class="text-center my-1">
                <p>Harga Cash</p>
              <div class="btn btn-warning">Rp {{ $item->hargacash }}</div>
            </div>
            <div class="text-center my-3 mb-5">
                <p>Harga Kredit</p>
                <div class="btn btn-warning">Rp {{ $item->hargakredit }}</div>
              </div>
              @endif
          </div>
        </div>
        
        @endforeach
        
        
            
          </div>
        
        <!-- Pagination Buttons -->
    
        <div class="col-auto">
          {{ $produk->appends(request()->except('page'))->fragment('katalog')->links() }}
          
      </div>
      
    

    
    <!-- Repeat the above structure for additional cards -->
    
    
    <!-- Call to action-->
    
    <!-- Contact-->
   
    <!-- Footer-->
    <footer class="bg-light py-5">
      <div class="container px-4 px-lg-5">
        <div class="small text-center text-muted">
          Copyright &copy; 2023 - ZANOV
        </div>
      </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js') }}"></script>
    <!-- SimpleLightbox plugin JS-->
  <script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js') }}"></script>

    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <script src="{{ asset('https://cdn.startbootstrap.com/sb-forms-latest.js') }}"></script>
    
  </body>
</html>
