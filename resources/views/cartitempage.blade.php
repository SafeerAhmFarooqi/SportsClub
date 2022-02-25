@extends('mainpage')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-10 col-md-offset-1">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th class="text-center">Price</th>
                        <th class="text-center">Total</th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($items as $item)
                    
                    <tr>
                        <td class="col-sm-8 col-md-6">
                        <div class="media">
                            <a class="thumbnail pull-left" href="#"> <img class="media-object" src="{{$item->gallery}}" style="width: 72px; height: 72px;"> </a>
                            <div class="media-body">
                                <h4 class="media-heading"><a href="/buyitem/{{$item->id}}">{{$item->name}}</a></h4>
                                <h5 class="media-heading">Description: {{$item->description}}</h5>
                            </div>
                        </div></td>
                        
                        <td class="col-sm-1 col-md-1 text-center"><strong>{{$item->price}} Rs</strong></td>
                        <td class="col-sm-1 col-md-1 text-center"><strong>{{$item->price}} Rs</strong></td>
                        <td class="col-sm-1 col-md-1">
                        <form action="/delete_cart_item/{{$item->cart_id}}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-danger">
                            <span class="glyphicon glyphicon-remove"></span> Remove
                        </button>
                        </form>
                    </td>
                    </tr>
                    
                    @endforeach
                    @php
                     $total_price=0;    
                     foreach($items as $item)
                     {
                         $total_price+=$item->price;
                     }   
                    @endphp




                    
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td><h5>Subtotal</h5></td>
                        <td class="text-right"><h5><strong>{{$total_price}} Rs</strong></h5></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td><h5>Estimated shipping</h5></td>
                        <td class="text-right"><h5><strong>Free</strong></h5></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td><h3>Total</h3></td>
                        <td class="text-right"><h3><strong>{{$total_price}} Rs</strong></h3></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>
                        <form action="/useritems" method="get">
                            @csrf
                            <button type="submit" class="btn btn-warning">
                            <span class="glyphicon glyphicon-shopping-cart"></span> Continue Shopping
                        </button>
                    </form>
                    </td>
                        <td>
                        <button type="submit" onclick="window.location.href='/checkout'" class="btn btn-success">
                            Checkout <span class="glyphicon glyphicon-play"></span>
                        </button>
                    </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection