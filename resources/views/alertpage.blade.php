@extends('mainpage')
@section('content')
<div class="alert alert-primary" role="alert">
    You are not logged in:<a href="/buyitem/{{$id}}" class="alert-link">Go back</a><br>
    <a href="/" class="alert-link">Go to login Page</a>
  </div>
@endsection