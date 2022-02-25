<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="{{asset('dist/jquery-3.6.0.min.js')}}" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link href="{{asset('dist/css/bootstrap.min.css')}}" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="{{asset('dist/js/bootstrap.bundle.min.js')}}" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="{{asset('js/jquery.js')}}"></script>
    
    <title>Sports Club</title>
</head>
<body>
  @php
      if(Session::has('user'))
    {
        $userpage=true;
        $cart_items=App\Http\Controllers\AdminClientController::cart_items();
        $cart_items_names=App\Http\Controllers\AdminClientController::cart_items_names_1();
    }
    else
    {
        $userpage=false;
    }
  @endphp
    @if(Session::has('user'))
    {{View::make('userheader',['userpage'=>$userpage,'cart_items'=>$cart_items,'cart_items_names'=>$cart_items_names])}}
    @else
    {{View::make('header')}}
    @endif
    @yield('content')
    {{View::make('footer')}}
</body>
</html>