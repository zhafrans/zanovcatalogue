<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Admin ZANOV</title>
    <link
      href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css"
      rel="stylesheet"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="/css/stylessb.css" rel="stylesheet" />
    <script
      src="https://use.fontawesome.com/releases/v6.3.0/js/all.js"
      crossorigin="anonymous"
    ></script>
  </head>
  <body class="sb-nav-fixed">
    @include('layouts.partials.navbar')
    <div id="layoutSidenav">
      <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
          <div class="sb-sidenav-menu">
            <div class="nav">
              <div class="sb-sidenav-menu-heading">Dashboard</div>
              <a class="nav-link" href="{{ route('admin.dashboard') }}">
                <div class="sb-nav-link-icon">
                  
                </div>
                Dashboard
              </a>
              
              <div class="sb-sidenav-menu-heading">Menu</div>
              <a class="nav-link" href="{{ route('admin.produk') }}">
                <div class="sb-nav-link-icon">
                  
                </div>
                Produk
              </a>

              @if(Auth::user()->role == 'admin')
              <a class="nav-link" href="{{ route('admin.user') }}">
                <div class="sb-nav-link-icon">
                  
                </div>
                User
              </a>
              @endif
             
              
          <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            {{ Auth::user()->username }}
          </div>
        </nav>
      </div>
      {{-- yieldcontent --}}
      @yield('content')
    </div>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
      crossorigin="anonymous"
    ></script>
    <script src="/js/scriptssb.js"></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"
      crossorigin="anonymous"
    ></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script
      src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
      crossorigin="anonymous"
    ></script>
    <script src="/js/datatables-simple-demo.js"></script>
  </body>
</html>
