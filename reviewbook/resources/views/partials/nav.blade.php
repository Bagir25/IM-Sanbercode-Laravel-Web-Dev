<header id="header" class="header d-flex align-items-center sticky-top">
  <div class="container position-relative d-flex align-items-center justify-content-between">
    
    <div class="d-flex align-items-center me-auto">
       <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
      <a href="/" class="logo d-flex align-items-center">
        
        <h1 class="sitename mb-0">Movie.</h1>
      
      </a>
    </div>

    <nav id="navmenu" class="navmenu position-absolute start-50 translate-middle-x">
      <ul class="d-flex list-unstyled mb-0">
        <li><a href="/">Home</a></li>
        <li><a href="/genre">Genre</a></li>
        <li><a href="/books">Movie</a></li>
        @auth
          
        <li><a href="/profile">Profile</a></li>
        @endauth
      </ul>
      <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
    </nav>

    <div class="d-flex align-items-center ms-auto">
      @guest
        <a href="/login" class="btn btn-primary me-2">Login</a>
        <a href="/register" class="btn btn-info">Register</a>
      @endguest
      @auth
        <form action="/logout" method="POST" class="mb-0">
          @csrf
          <input type="submit" value="Logout" class="btn btn-danger">
        </form>
      @endauth
    </div>

  </div>
</header>
