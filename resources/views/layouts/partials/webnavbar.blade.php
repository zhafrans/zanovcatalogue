<style>
  /* Custom CSS to ensure navbar does not exceed page width */
  #mainNav {
    max-width: 100%;
    margin: 0 auto;
  }
  </style>
<nav
      class="navbar navbar-expand-lg navbar-light fixed-top py-3"
      id="mainNav"
    >
      <div class="container px-4 px-lg-5">
        
        <a class="navbar-brand" href="#page-top"><img src="{{ asset('assets/img/zanovZlogo.png') }}" class="px-3" style="height: 30px;">ZANOV</a>
        <button
          class="navbar-toggler navbar-toggler-right"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarResponsive"
          aria-controls="navbarResponsive"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ms-auto my-2 my-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="#about">Tentang Kami</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#services">Katalog</a>
            </li>
            
            @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/admin/dashboard') }}">{{ 'Selamat datang, ' . Auth::user()->username }}</a>
                    </li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="nav-link btn btn-link">Logout</button>
                        </form>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                @endauth
          </ul>
        </div>
      </div>
    </nav>