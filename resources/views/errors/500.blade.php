@extends('mainpage')
@section('content')
<div class="alert alert-primary" role="alert">
    The page you requested does not exist:<a href="{{back()}}" class="alert-link">Go back</a><br>
    <a href="/" class="alert-link">Go to Home Page</a>
  </div>
@endsection