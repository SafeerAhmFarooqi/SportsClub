@extends('mainpage')
@section('content')
<div class="container">
    <div class="row">
    <a class="link-primary" href="/useritems">Go back</a>
    </div>
    <div class="card">
        <div class="card-body">
            <h3 class="card-title">{{$row['name']}}</h3>
            <div class="row">
                <div class="col-lg-5 col-md-5 col-sm-6">
                    <div class="white-box text-center"><img  src="{{$row['gallery'][0]=='h'?$row['gallery']:asset($row['gallery'])}}" class="img-fluid"></div>
                </div>
                <div class="col-lg-7 col-md-7 col-sm-6">
                    <h4 class="box-title mt-5">Product description</h4>
                    <p>{{$row['description']}}</p>
                    <h2 class="mt-5">
                        {{$row['price']}} Rs
                    </h2>
                    <div class="row">
                        <div class="col-sm-4">
                        <form action="/add_to_cart/{{$row['id']}}" method="POST" style="display: inline;">    
                            @csrf
                            <input type="hidden" name="product_id" value="{{$row['id']}}">
                        <button type="submit" class="btn btn-dark btn-rounded mr-1"  data-toggle="tooltip" title="Click to add item to cart" data-original-title="Add to cart">
                        <i class="fa fa-shopping-cart">Add to Cart</i>
                        </button>
                    </form>
                    <form action="/buynow/{{$row['id']}}" method="POST" style="margin: 0px 0px;display: inline;">
                        @csrf
                    <button type="submit" class="btn btn-primary btn-rounded" style="margin: 0px 0px;display: inline;">Buy Now</button>
                    </form>
                </div>
                </div>
                    <h3 class="box-title mt-5">Key Highlights</h3>
                    <h5 class="box-title mt-6">{{$row['category']}}</h4>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection