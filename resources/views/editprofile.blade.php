@extends('mainpage')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-body">
                    <div class="card-title mb-4">
                        <div class="d-flex justify-content-start">
                            <div class="image-container">
                                
                                <div class="middle">
                                    <a href="/" class="alert-link">Return to Home Page</a>
                                </div>
                            </div>
                            <div class="ml-auto">
                                <input type="button" class="btn btn-primary d-none" id="btnDiscard" value="Discard Changes" />
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <h3>Edit My Profile</h3>
                                </li>
                            </ul>
                            <div class="tab-content ml-1" id="myTabContent">
                                <div class="tab-pane fade show active" id="basicInfo" role="tabpanel" aria-labelledby="basicInfo-tab">
                                    
                                    <form action="/savechanges" method="POST">
                                        @csrf
                                    <div class="row">
                                        <div class="col-sm-3 col-md-2 col-5">
                                            <label style="font-weight:bold;">First Name</label>
                                        </div>
                                        <div class="col-md-8 col-6">
                                            <input type="text" class="form-control" id="fn_id" name="fn" placeholder="First Name" value="{{$row['firstname']}}">
                                            <span id="fn_span" style="color: red">{{ $errors->first('fn') }}</span> 
                                        </div>
                                    </div>
                                    <hr />

                                    <div class="row">
                                        <div class="col-sm-3 col-md-2 col-5">
                                            <label style="font-weight:bold;">Last Name</label>
                                        </div>
                                        <div class="col-md-8 col-6">
                                            <input type="text" class="form-control 1" id="ln_id" name="ln" value="{{$row['lastname']}}" placeholder="Last Name">
                                            
                                        </div>
                                    </div>
                                    <hr />
                                    
                                    
                                    <div class="row">
                                        <div class="col-sm-3 col-md-2 col-5">
                                            <label style="font-weight:bold;">Phone Number</label>
                                        </div>
                                        <div class="col-md-8 col-6">
                                            <input type="tel" class="form-control" id="mn_id" name="mn" value="{{$row['phonenumber']}}" placeholder="Mobile Phone Number">
                                            
                                        </div>
                                    </div>
                                    <hr />

                                    <div class="row">
                                        <div class="col-sm-3 col-md-2 col-5">
                                            <label style="font-weight:bold;">Age</label>
                                        </div>
                                        <div class="col-md-8 col-6">
                                            <input type="number" class="form-control" id="age_id" name="age" value="{{$row['age']}}" placeholder="Your Age">
                                        
                                        </div>
                                    </div>
                                    <hr />
                                    <div class="row">
                                        <div class="col-sm-3 col-md-2 col-5">
                                            <label style="font-weight:bold;">Email</label>
                                        </div>
                                        <div class="col-md-8 col-6">
                                            {{$row['email']}}
                                            
                                        </div>
                                    </div>
                                    <hr />
                                    <div class="row">
                                        <div class="col-sm-3 col-md-2 col-5">
                                            <label style="font-weight:bold;">First Address</label>
                                        </div>
                                        <div class="col-md-8 col-6">
                                            <input type="text" class="form-control" id="address1_id" name="address1" value="{{$row['address1']}}" placeholder="House no, street no, town name etc">
                                            
                                        </div>
                                    </div>
                                    <hr />
                                    <div class="row">
                                        <div class="col-sm-3 col-md-2 col-5">
                                            <label style="font-weight:bold;">Second Address</label>
                                        </div>
                                        <div class="col-md-8 col-6">
                                            <input type="text" class="form-control" id="address2_id" name="address2" value="{{$row['address2']}}" placeholder="Apartment, studio, or floor">
                                            
                                        </div>
                                    </div>
                                    <hr />
                                    <div class="row">
                                        <div class="col-sm-3 col-md-2 col-5">
                                            <label style="font-weight:bold;">City</label>
                                        </div>
                                        <div class="col-md-8 col-6">
                                            <input type="text" class="form-control" id="city_id" name="city" value="{{$row['city']}}" placeholder="City Name">
                                            
                                        </div>
                                    </div>
                                    <hr />
                                    <div class="row">
                                        <div class="col-sm-3 col-md-2 col-5">
                                            <label style="font-weight:bold;">Country</label>
                                        </div>
                                        <div class="col-md-8 col-6">
                                            <input type="text" class="form-control" id="country_id" name="country" value="{{$row['country']}}" placeholder="Country Name">
                                            
                                        </div>
                                    </div>
                                    <hr />
                                    <div class="row">
                                        <div class="col-sm-3 col-md-2 col-5">
                                            <label style="font-weight:bold;">State</label>
                                        </div>
                                        <div class="col-md-8 col-6">
                                            <input type="text" class="form-control" id="state_id" name="state" value="{{$row['state']}}" placeholder="State Name">
                                        </div>
                                    </div>
                                    <hr />
                                    <div class="row">
                                        <div class="col-sm-3 col-md-2 col-5">
                                            <label style="font-weight:bold;">Zip</label>
                                        </div>
                                        <div class="col-md-8 col-6">
                                            <input type="text" class="form-control" id="zip_id" name="zip" value="{{$row['zip']}}">
                                            
                                        </div>
                                    </div>
                                    <hr />
                                    <div class="middle">
                                        
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                        <a type="submit" class="btn btn-primary" href="/changepassword">Change Password</a>
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>

            </div>
        </div>
    </div>
</div>
@endsection