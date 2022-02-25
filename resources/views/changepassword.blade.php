@extends('mainpage')
@section('content')
<div class="container py-5">
    
    <div class="row">
        <div class="col-md-12">
           
            
            <div class="row">
                <div class="middle">
                    <a href="/editprofile" class="alert-link">Go Back</a>
                </div>
                
                <div class="col-md-6 offset-md-3">
                    <span class="anchor" id="formChangePassword"></span>
                    

                    <!-- form card change password -->
                    <div class="card card-outline-secondary">
                        <div class="card-header">
                            <h3 class="mb-0">Change Password</h3>
                        </div>
                        <div class="card-body">
                            <form action="/change_password_post" method="POST" class="form" role="form" autocomplete="off">
                                @csrf
                                <div class="form-group">
                                    <label for="inputPasswordOld">Current Password</label>
                                    <input type="password" class="form-control" id="input_current_pass" name="current_password">
                                    <span style="color: red">
                                    @php
                                        if($pass_error==true)
                                        {
                                            echo "Invalid Password";
                                        }
                                    @endphp
                                    </span>
                                    <div class="middle offset-md-11">
                                        <a  style="cursor: pointer;" class="alert-link" id="show_curr_pass_btn">Show</a>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPasswordNew">New Password</label>
                                    <input type="password" class="form-control" id="input_new_pass" name="new_password">
                                    <span style="color: red">{{$errors->first('new_password') }}</span>
                                    <span style="color: red">
                                        @php
                                            if($pass_error2==true)
                                            {
                                                echo "New and Confirm Password did not match.";
                                            }
                                        @endphp
                                        </span>
                                        <div class="middle offset-md-11">
                                        <a style="cursor: pointer;" class="alert-link" id="show_new_pass_btn">Show</a>
                                        </div>
                                    
                                        
                                      
                                    <span class="form-text small text-muted">
                                            The password must be 8-20 characters, and must <em>not</em> contain spaces.
                                        </span>
                                </div>
                                <div class="form-group">
                                    <label for="inputPasswordNewVerify">Confirm Password</label>
                                    <input type="password" class="form-control" id="input_confirm_pass" name="confirm_password">
                                    <div class="middle offset-md-11">
                                        <a style="cursor: pointer;" class="alert-link" id="show_confirm_pass_btn">Show</a>
                                    </div>
                                    <span class="form-text small text-muted">
                                            To confirm, type the new password again.
                                        </span>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success btn-lg float-right">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /form card change password -->

                </div>
                
                
                <!--/col-->
                
                <!--/col-->
                
                <!--/col-->

                

            </div>
            <!--/row-->

        <br><br><br><br>

        </div>
        <!--/col-->
    </div>
    <!--/row-->
    
    
</div>
@endsection
<!--/container-->