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
                                    <h3>My Profile</h3>
                                </li>
                            </ul>
                            <div class="tab-content ml-1" id="myTabContent">
                                <div class="tab-pane fade show active" id="basicInfo" role="tabpanel" aria-labelledby="basicInfo-tab">
                                    

                                    <div class="row">
                                        <div class="col-sm-3 col-md-2 col-5">
                                            <label style="font-weight:bold;">First Name</label>
                                        </div>
                                        <div class="col-md-8 col-6">
                                            {{$row['firstname']}}
                                        </div>
                                    </div>
                                    <hr />

                                    <div class="row">
                                        <div class="col-sm-3 col-md-2 col-5">
                                            <label style="font-weight:bold;">Last Name</label>
                                        </div>
                                        <div class="col-md-8 col-6">
                                            
                                            {{$row['lastname']}}
                                        </div>
                                    </div>
                                    <hr />
                                    
                                    
                                    <div class="row">
                                        <div class="col-sm-3 col-md-2 col-5">
                                            <label style="font-weight:bold;">Phone Number</label>
                                        </div>
                                        <div class="col-md-8 col-6">
                                            {{$row['phonenumber']}}
                                        </div>
                                    </div>
                                    <hr />

                                    <div class="row">
                                        <div class="col-sm-3 col-md-2 col-5">
                                            <label style="font-weight:bold;">Age</label>
                                        </div>
                                        <div class="col-md-8 col-6">
                                            {{$row['age']}}
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
                                            {{$row['address1']}}
                                        </div>
                                    </div>
                                    <hr />
                                    <div class="row">
                                        <div class="col-sm-3 col-md-2 col-5">
                                            <label style="font-weight:bold;">Second Address</label>
                                        </div>
                                        <div class="col-md-8 col-6">
                                            {{$row['address2']}}
                                        </div>
                                    </div>
                                    <hr />
                                    <div class="row">
                                        <div class="col-sm-3 col-md-2 col-5">
                                            <label style="font-weight:bold;">City</label>
                                        </div>
                                        <div class="col-md-8 col-6">
                                            {{$row['city']}}
                                        </div>
                                    </div>
                                    <hr />
                                    <div class="row">
                                        <div class="col-sm-3 col-md-2 col-5">
                                            <label style="font-weight:bold;">Country</label>
                                        </div>
                                        <div class="col-md-8 col-6">
                                            {{$row['country']}}
                                        </div>
                                    </div>
                                    <hr />
                                    <div class="row">
                                        <div class="col-sm-3 col-md-2 col-5">
                                            <label style="font-weight:bold;">State</label>
                                        </div>
                                        <div class="col-md-8 col-6">
                                            {{$row['state']}}
                                        </div>
                                    </div>
                                    <hr />
                                    <div class="row">
                                        <div class="col-sm-3 col-md-2 col-5">
                                            <label style="font-weight:bold;">Zip</label>
                                        </div>
                                        <div class="col-md-8 col-6">
                                            {{$row['zip']}}
                                        </div>
                                    </div>
                                    <hr />
                                    <div class="middle">
                                        <form action="/editprofile" method="GET">
                                        <button type="submit" class="btn btn-primary">Edit Profile</button>
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
</div>
@endsection