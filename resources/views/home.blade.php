@extends('mainpage')
@section('content')
<div class="container col-xl-10 col-xxl-8 px-4 py-5">
    <div class="row align-items-center g-lg-5 py-5">
      <div class="col-lg-7 text-center text-lg-start">
        <h1 class="display-4 fw-bold lh-1 mb-3">Welcome to the Sportsclub Fitness & Wellness community!</h1>
        <p class="col-lg-10 fs-4">No matter your age or fitness level, we have a membership type designed especially for you and everyone in your family.</p>
      </div>
      <div class="col-md-10 mx-auto col-lg-5">
        <form class="p-4 p-md-5 border rounded-3 bg-light" action="/lsubmit" method="POST">
            @csrf
          <div class="form-floating mb-3">
            <input type="email" class="form-control" id="floatingInput" name="lemail" placeholder="name@example.com">
            <label for="floatingInput">Email address</label>
          </div>
          <div class="form-floating mb-3">
            <input type="password" class="form-control" id="floatingPassword" name="lpassword" placeholder="Password">
            <label for="floatingPassword">Password</label>
          </div>
          @if($warning==true)
          <div>
            <span class="warning" style="color: red;">Invalid username or password</span>
            </div>
          @endif
          
          <div class="checkbox mb-3">
            <label>
              <input type="checkbox" value="remember-me"> Remember me
            </label>
          </div>
          <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
          <a class="nav-link" href="/forgotpassword" style="color:rgb(0, 0, 0)">Forgot Password?Click here</a>
          <hr class="my-4">
          <a class="nav-link" href="/signup" style="color:rgb(0, 0, 0)">not a member?Click here to get membership</a>
        </form>
        
      </div>
    </div>
  </div>
@endsection