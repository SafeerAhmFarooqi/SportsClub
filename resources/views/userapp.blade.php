@extends('mainpage')
@section('content')
<div class="container col-xxl-8 px-4 py-5">
    <div class="row flex-lg-row-reverse align-items-center g-5 py-5 border shadow-lg">
      <div class="col-10 col-sm-8 col-lg-6">
        <img src="https://cdn.shopify.com/s/files/1/1956/9819/files/store-3_1024x1024.jpg" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700" height="500" loading="lazy">
      </div>
      <div class="col-lg-6">
        <h1 class="display-5 fw-bold lh-1 mb-3">We bring you best sports products in market Visit our Store!</h1>
        <p class="lead">We have sports product from many ranges from football to cricket. Affordable prices and excellent quality products. With many products added daily</p>
        <div class="d-grid gap-2 d-md-flex justify-content-md-start">
          <button type="submit" class="btn btn-primary btn-lg px-4 me-md-2" onclick="window.location.href='/useritems'">Visit Store</button>
        </div>
      </div>
    </div>
  </div>
  
  <div class="b-example-divider"></div>
@endsection