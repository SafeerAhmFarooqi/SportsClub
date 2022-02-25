@extends('mainpage')
@section('content')

    <div class="container">
      <div class="py-5 text-center">
    
        <h2>Checkout</h2>
      </div>

      <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Your cart</span>
            <span class="badge badge-secondary badge-pill">3</span>
          </h4>
          <ul class="list-group mb-3">
            @foreach($items as $item)
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">{{$item->name}}</h6>
                <small class="text-muted">{{$item->description}}</small>
              </div>
              <span class="text-muted">{{$item->price}} Rs</span>
            </li>
            @endforeach
           
            <li class="list-group-item d-flex justify-content-between">
              <span>Total (Rs)</span>
              <strong>{{$total_price}} Rs</strong>
            </li>
          </ul>

        </div>
        <div class="col-md-8 order-md-1">
          <h4 class="mb-3">Billing and Shipping address</h4>
          <form class="needs-validation" novalidate="" action="/orderplace" method="POST">
            @csrf
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="firstName">First name</label>
                <input type="text" name="first_name" class="form-control" id="firstName" placeholder="Alexandar" value="{{old('first_name')}}" required="">
                <div style="color:red">
                  {{ $errors->first('first_name') }}
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="lastName">Last name</label>
                <input type="text" name="last_name" class="form-control" id="lastName" placeholder="Smith" value="{{old('last_name')}}" required="">
                <div style="color:red">
                  {{ $errors->first('last_name') }}
                
                </div>
              </div>
            </div>

            <div class="row">
            <div class="col-md-6 mb-3">
              <label for="email">Phone Number</label>
              <input type="email" name="mn" class="form-control" id="email" value="{{old('mn')}}" placeholder="00923332753974">
              <div style="color:red">
                {{ $errors->first('mn') }}
              
              </div>
            </div>

            <div class="col-md-6 mb-3">
              <label for="email">Email <span class="text-muted">(Optional)</span></label>
              <input type="email" name="email" class="form-control" id="email" value="{{old('email')}}" placeholder="you@example.com">
              <div style="color:red">
                {{ $errors->first('email') }}
              </div>
            </div>
          </div>
            <div class="mb-3">
              <label for="address">Address</label>
              <input type="text" name="address1" class="form-control" id="address" value="{{old('address1')}}" placeholder="1234 Main St" required="">
              <div style="color:red">
                {{ $errors->first('address1') }}
              </div>
            </div>

            <div class="mb-3">
              <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
              <input type="text" name="address2" class="form-control" id="address2" value="{{old('address2')}}" placeholder="Apartment or suite">
            </div>

            <div class="row">
              <div class="col-md-5 mb-3">
                <label for="country_id">Country </label>
                <input type="text" name="country" class="form-control" id="country_id" value="{{old('country')}}" placeholder="Name of your country">
                <div style="color:red">
                  {{ $errors->first('country') }}
                </div>
              </div>
              <div class="col-md-4 mb-3">
                <label for="state_id">State </label>
                <input type="text" name="state" class="form-control" id="state_id" value="{{old('state')}}" placeholder="Country's State">
                <div style="color:red">
                  {{ $errors->first('state') }}
                </div>
              </div>
              <div class="col-md-3 mb-3">
                <label for="zip">Zip</label>
                <input type="text" name="zip" class="form-control" id="id_zip" value="{{old('zip')}}" placeholder="" required="">
                <div style="color:red">
                  {{ $errors->first('zip') }}
                </div>
              </div>
            </div>
            
           
            <hr class="mb-4">

            <h4 class="mb-3">Payment</h4>

            <div class="d-block my-3" id="pre_card_info">
              <div class="custom-control custom-radio">
                <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" value="credit_card" checked="" required="">
                <label class="custom-control-label" for="credit">Credit card</label>
              </div>
              <div class="custom-control custom-radio">
                <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" value="debit_card" required="">
                <label class="custom-control-label" for="debit">Debit card</label>
              </div>
              <div class="custom-control custom-radio">
                <input id="cod" name="paymentMethod" type="radio" class="custom-control-input" value="cod" required="">
                <label class="custom-control-label" for="paypal">Cash on Delivery</label>
              </div>
            </div>
            <div class="row" id="card_info">
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="cc-name">Name on card</label>
                <input type="text" class="form-control" id="cc-name" name="ccname" value="{{old('ccname')}}" placeholder="" required="">
                <small class="text-muted">Full name as displayed on card</small>
                <div style="color:red">
                  {{ $errors->first('ccname') }}
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="cc-number">Credit card number</label>
                <input type="text" class="form-control" id="cc-number" name="ccnumber" value="{{old('ccnumber')}}" placeholder="" required="">
                <div style="color:red">
                  {{ $errors->first('ccnumber') }}
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3 mb-3">
                <label for="cc-expiration">Expiration Date</label>
                <input type="month" class="form-control" id="cc-expiration" name="ccexp" value="{{old('ccexp')}}" placeholder="" required="">
                <div style="color:red">
                  {{ $errors->first('ccexp') }}
                </div>
              </div>
              <div class="col-md-3 mb-3">
                <label for="cc-expiration">CVV</label>
                <input type="text" class="form-control" id="cc-cvv" name="cccvv" placeholder="" required="">
                <div style="color:red">
                  {{ $errors->first('cccvv') }}
                </div>
              </div>
            </div>
        </div>
            <button class="btn btn-primary btn-lg btn-block" type="submit">Order Now</button>
          </form>
        </div>
      </div>
    </div>

    
    <script>
        $(document).ready(function()
        {
            $("#cod").change(function()
            {
                $("#card_info").remove();
            }
            );
            $("#credit").change(function()
            {
                $("#card_info").remove();
                $("#pre_card_info").after('<div class="row" id="card_info"><div class="row"><div class="col-md-6 mb-3"><label for="cc-name">Name on card</label><input type="text" class="form-control" id="cc-name" placeholder="" required=""><small class="text-muted">Full name as displayed on card</small><div class="invalid-feedback">Name on card is required</div></div><div class="col-md-6 mb-3"><label for="cc-number">Credit card number</label><input type="text" class="form-control" id="cc-number" placeholder="" required=""><div class="invalid-feedback">Credit card number is required</div></div></div><div class="row"><div class="col-md-3 mb-3"><label for="cc-expiration">Expiration</label><input type="text" class="form-control" id="cc-expiration" placeholder="" required=""><div class="invalid-feedback">Expiration date required</div></div><div class="col-md-3 mb-3"><label for="cc-expiration">CVV</label><input type="text" class="form-control" id="cc-cvv" placeholder="" required=""><div class="invalid-feedback">Security code required</div></div></div></div>');
            }
            );
            $("#debit").change(function()
            {
                $("#card_info").remove();
                $("#pre_card_info").after('<div class="row" id="card_info"><div class="row"><div class="col-md-6 mb-3"><label for="cc-name">Name on card</label><input type="text" class="form-control" id="cc-name" placeholder="" required=""><small class="text-muted">Full name as displayed on card</small><div class="invalid-feedback">Name on card is required</div></div><div class="col-md-6 mb-3"><label for="cc-number">Credit card number</label><input type="text" class="form-control" id="cc-number" placeholder="" required=""><div class="invalid-feedback">Credit card number is required</div></div></div><div class="row"><div class="col-md-3 mb-3"><label for="cc-expiration">Expiration</label><input type="text" class="form-control" id="cc-expiration" placeholder="" required=""><div class="invalid-feedback">Expiration date required</div></div><div class="col-md-3 mb-3"><label for="cc-expiration">CVV</label><input type="text" class="form-control" id="cc-cvv" placeholder="" required=""><div class="invalid-feedback">Security code required</div></div></div></div>');
            }
            );
        }
        );
    </script>
@endsection