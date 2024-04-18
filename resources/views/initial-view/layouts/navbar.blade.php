<div class="container-fluid bg-light position-relative shadow">
    <nav
      class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0 px-lg-5"
    >
      <a
        href=""
        class="navbar-brand font-weight-bold text-secondary"
        style="font-size: 50px"
      >
        {{-- <i class="flaticon-043-teddy-bear"></i> --}}
        <img class="img-fluid" src="{{asset('assets/img/logoo.png')}}" style="height: 100px; width: 100px" alt="" />
        <span class="text-primary">Scoop and Skoops</span>
      </a>
      <button
        type="button"
        class="navbar-toggler"
        data-toggle="collapse"
        data-target="#navbarCollapse"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div
        class="collapse navbar-collapse justify-content-between"
        id="navbarCollapse"
      >
        <div class="navbar-nav font-weight-bold mx-auto py-0">
          <a href="/" class="nav-item nav-link {{Request::is('/') ? 'active' : ''}} ">Photo</a>
          <a href="gallery" class="nav-item nav-link {{Request::is('gallery') ? 'active' : ''}}">Album</a>
          <a href="login" class="nav-item nav-link {{Request::is('login') ? 'active' : ''}}">Login</a>
        </div>

    </nav>
  </div>

  