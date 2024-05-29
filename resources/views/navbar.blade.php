<nav class="navbar navbar-expand-lg navbar-light bg-body-tertiary">
  <div class="container">
    <a class="navbar-brand" href="/">
      <img src="{{asset('assets/img/movie-logo.png')}}" alt="movie-logo" width="80">
    </a>
    <button
      data-mdb-collapse-init
      class="navbar-toggler"
      type="button"
      data-mdb-target="#navbarNav"
      aria-controls="navbarNav"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <i class="fas fa-bars"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav m-auto">
        <li class="nav-item">
          <a class="nav-link text-uppercase fw-bold {{Request::path() == 'movies' ? 'active' : ''}}" aria-current="page" href="{{url('movies')}}">Movies</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-uppercase fw-bold {{Request::path() == 'tv' ? 'active' : ''}} ms-2" href="{{url('tv')}}">TV shows</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-uppercase fw-bold {{Request::path() == 'person' ? 'active' : ''}} ms-2" href="{{url('/person')}}">Actor </a>
        </li>
    
      </ul>

      <div class="">
        <livewire:search-dropdown />
      </div>
    
    </div>

  </div>
</nav>

