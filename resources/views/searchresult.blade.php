@extends('mainpage')
@section('content')
@php
    if(Session::has('user'))
    {
        $userpage=true;
    }
    else
    {
        $userpage=false;
    }
@endphp
<div class="container">
@if ($search_items)
@foreach ($search_items as $item)
<div class="row">
<div class="row flex-sm-row-reverse align-items-center g-5 py-5 border shadow-lg">
<div class="card">
    <div class="card-body">
        <h3 class="card-title">{{$item['name']}}</h3>
        <div class="row">
            <div class="col-lg-5 col-md-5 col-sm-6">
                <div class="white-box text-center"><img style="height: 300px; width: 300px;" src="{{$item['gallery'][0]=='h'?$item['gallery']:asset($item['gallery'])}}" class="img-responsive"></div>
            </div>
            <div class="col-lg-7 col-md-7 col-sm-6  h-25 d-inline-block">
                <h4 class="box-title mt-5">Product description</h4>
                <p>{{$item['description']}}</p>
                <h2 class="mt-5">
                    {{$item['price']}}Rs
                </h2>
                <div class="row">
                    <div class="col-sm-4">
                    <form action="/add_to_cart/{{$item['id']}}" method="POST" style="display: inline;">    
                        @csrf
                        <input type="hidden" name="product_id" value="{{$item['id']}}">
                    <button type="submit" class="btn btn-dark btn-rounded mr-1"  data-toggle="tooltip" title="Click to add item to cart" data-original-title="Add to cart">
                    <i class="fa fa-shopping-cart">Add to Cart</i>
                    </button>
                </form>
                <form action="/check" method="POST" style="margin: 0px 0px;display: inline;">
                    @csrf
                <button type="submit" class="btn btn-primary btn-rounded" style="margin: 0px 0px;display: inline;">Buy Now</button>
                </form>
            </div>
            </div>
                <h3 class="box-title mt-5">Key Highlights</h3>
                <h5 class="box-title mt-6">{{$item['category']}}</h4>
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endforeach 
@else
<div class="row">
    <a class="link-primary" href="/">Return to Home</a>
    </div>
<h1>No Results Found</h1>
@endif
</div>
@endsection