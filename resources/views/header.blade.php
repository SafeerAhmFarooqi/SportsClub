
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="/">
        <img src="{{asset("images/sports.png")}}" alt="" width="30" height="24" class="d-inline-block align-text-top">  
        Sports Club</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/">Home</a>
          <li class="nav-item dropdown">
           
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="/useritems">Visit Store</a>
            </li>
            @if(!Session::has('user'))
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="/">Log in</a>
            </li>
            @endif
          <li class="nav-item">
            <a class="nav-link" href="#">About</a>
          </li>
        </ul>
        <form class="d-flex"  action="/search" method="GET">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_string">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>