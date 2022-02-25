@extends('mainpage')
@section('content')
@php
 $userpage=false;
@endphp
<div class="container">

  <div class="row g-2">
        <form class="row g-4" action="/userreg" method="POST" id="form">
          @csrf
            <div class="col-md-6">
                <label for="fn_id" class="form-label 1">First Name</label>
                <input type="text" class="form-control" id="fn_id" name="fn" placeholder="First Name" value="{{old('fn')}}">
                <span id="fn_span" style="color: red">{{ $errors->first('fn') }}</span> 
              </div>
              <div class="col-md-6">
                <label for="ln_id" class="form-label">Last Name</label>
                <input type="text" class="form-control 1" id="ln_id" name="ln" value="{{old('ln')}}" placeholder="Last Name">
                <span id="ln_span" style="color: red">{{ $errors->first('ln') }}</span>
              </div>
              <div class="col-md-6">
                <label for="mn_id" class="form-label">Phone No</label>
                <input type="tel" class="form-control" id="mn_id" name="mn" value="{{old('mn')}}" placeholder="Mobile Phone Number">
                <span id="mn_span" style="color: red">{{ $errors->first('mn') }}</span>
              </div>
              <div class="col-md-6">
                <label for="age_id" class="form-label">Age</label>
                <input type="number" class="form-control" id="age_id" name="age" value="{{old('age')}}" placeholder="Your Age">
                <span id="age_span" style="color: red">{{ $errors->first('age') }}</span>
              </div>
              <div class="col-md-6">
              <label for="email_id" class="form-label">Email</label>
              <input type="email" class="form-control" id="email_id" name="email" value="{{old('email')}}" placeholder="Email Address">
              <span id="email_span" style="color: red">{{ $errors->first('email') }}</span>
            </div>
            <div class="col-md-6">
              <label for="password_id" class="form-label">Password</label>
              <input type="password" class="form-control" id="password_id" name="password" placeholder="Password Atleast 8 Characters">
              <span id="password_span" style="color: red">{{ $errors->first('password') }}</span>
            </div>
            <div class="col-12">
              <label for="address1_id" class="form-label">Address</label>
              <input type="text" class="form-control" id="address1_id" name="address1" value="{{old('address1')}}" placeholder="House no, street no, town name etc">
              <span id="address1_span" style="color: red">{{ $errors->first('address1') }}</span>
            </div>
            <div class="col-12">
              <label for="address2_id" class="form-label">Address 2(Optional)</label>
              <input type="text" class="form-control" id="address2_id" name="address2" value="{{old('address2')}}" placeholder="Apartment, studio, or floor">
              <span id="address1_span" style="color: red">{{ $errors->first('address2') }}</span>
            </div>
            <div class="col-md-6">
              <label for="city_id" class="form-label">City</label>
              <input type="text" class="form-control" id="city_id" name="city" value="{{old('city')}}" placeholder="City Name">
              <span id="city_span" style="color: red">{{ $errors->first('city') }}</span>
            </div>
            <div class="col-md-6">
                <label for="country_id" class="form-label">Country</label>
                <input type="text" class="form-control" id="country_id" name="country" value="{{old('country')}}" placeholder="Country Name">
                <span id="country_span" style="color: red">{{ $errors->first('country') }}</span>
              </div>
            <div class="col-md-4">
              <label for="state_id" class="form-label">State</label>
              <select id="state_id" class="form-select" name="state">
                <option selected>Choose...</option>
                <option value="punjab">Punjab</option>
              </select>
              <span id="state_span" style="color: red">{{ $errors->first('state') }}</span>
            </div>
            <div class="col-md-2">
              <label for="zip_id" class="form-label">Zip</label>
              <input type="text" class="form-control" id="zip_id" name="zip" value="{{old('zip')}}">
              <span id="zip_span" style="color: red">{{ $errors->first('zip') }}</span>
            </div>
            <div class="col-12">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="check_id">
                <label class="form-check-label" for="check_id">
                  By clicking i agree to the terms and conditions of Sports club.
                </label>
              </div>
            </div>
            <div class="col-12">
              <button type="submit" class="btn btn-primary" id="signup_btn">Sign Up</button>
            </div>
          </form>
    </div>
</div>
@endsection