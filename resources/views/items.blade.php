@extends('mainpage')
@section('content')
<div class="container">
  <div class="row justify-content-md-center">
    <div class="col col-lg-10">
      <div class="row">
        <h2>Sports Club Store</h2>  
        <div id="carouselExampleCaptions" class="carousel carousel-dark slide" data-bs-ride="carousel" style="height:500px;width:1000px">
          <div class="carousel-indicators">
            @php
                $no_of_slides=0;
            @endphp
            @foreach ($items as $item)
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{$no_of_slides}}" class="{{$no_of_slides==0?'active':''}}" aria-current="true" aria-label="Slide 1"></button>
            @php
            $no_of_slides++;
        @endphp
            @endforeach
          </div>
          <div class="carousel-inner">
            @php
                $no_of_slides=0;
            @endphp
            @foreach ($items as $item)
            <div class="{{$no_of_slides==0?'carousel-item active':'carousel-item'}}" data-bs-interval="2000">
              <img src="{{$item['gallery']}}" class="d-block w-100" alt="..." style="height:400px;width:400px">
              <div class="carousel-caption d-none d-md-block">
                <h5>{{$item['name']}}</h5>
                <p>{{$item['description']}}</p>
              </div>
            </div>
            @php
            $no_of_slides++;
        @endphp    
            @endforeach
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
      
    
    
    
    
    
      <div class="row">
          <h3>Trending Products</h3>
        @foreach ($items as $item)
        
        <div class="col-md-2" style="display: inline;float: left; margin: 30px;">
          <a href="buyitem/{{$item['id']}}">
        <img style="height: 100px;display: inline;" src="{{$item['gallery']}}" alt="Los Angeles" class="d-block" style="width:100%">
        <div class="" >
          <h5 style="display: inline;">{{$item['name']}}</h5>
        </div>
      </a>
      </div>
    
      @endforeach
    </div>
    </div>
    
  </div>

</div>

    
@endsection