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
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="/useritems">Visit Store</a>
            </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              {{substr(App\Models\User::find(Session::get('user')['id'])->firstname,0,15)}}
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="/showprofile">Show Profile</a></li>
              <li><a class="dropdown-item" href="/editprofile">Edit Profile</a></li>
              @if(\App\Http\Controllers\AdminClientController::cart_items()>0)
              <li><a class="dropdown-item" href="/checkout">Check Out</a></li>
              @endif
              @if(\App\Http\Controllers\AdminClientController::cart_items()>0)
              <li><a class="dropdown-item" href="/cartpage">Cart Items: {{\App\Http\Controllers\AdminClientController::cart_items()}}</a></li>
              @endif
              
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="/signout">Sign Out</a></li>
            </ul>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="#">About</a>
          </li>
         
        </ul>
        <form class="d-flex" action="/search" method="GET">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_string">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
        <ul class="navbar-nav me-right mb-2 mb-lg-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Cart-{{$cart_items}}
                </a>
               
                  @if ($cart_items>0)
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-dark" aria-labelledby="navbarDropdown">
                    @foreach($cart_items_names as $row)
                    <li><a class="dropdown-item" href="/buyitem/{{$row['id']}}">{{$row['name']}}</a></li>
                    @endforeach
                    <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="/cartpage">Go to Cart</a></li>                      
                  <li><a class="dropdown-item" href="/checkout">Check Out</a></li>
                </ul>
                  @endif
                  
                
              </li> 
        </ul>
        


       
          
            
                






      </div>
     
    </div>
  </nav>