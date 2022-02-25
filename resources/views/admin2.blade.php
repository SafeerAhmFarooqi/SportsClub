@if ($pass==true)
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Sports Club Admin</title>
    <script src="{{asset('feathericons3.js')}}"></script>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/dashboard/">

    

    <!-- Bootstrap core CSS -->
<link href="{{asset('dist/css/bootstrap.min.css')}}" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="{{asset('dashboard.css')}}" rel="stylesheet">
  </head>
  <body>
    
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3">Sports Club Admin</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
      <a class="nav-link px-3" href="/admin_signout">Sign out</a>
    </div>
  </div>
</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link {{$orders==false&&$products==false&&$customer==false&&$insert_products==false?'active':''}}" aria-current="page" href="#">
              <span data-feather="home"></span>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <form action="/admin_orders" method="POST">
                @csrf
                <button type="submit" class="nav-link {{$orders==true&&$products==false&&$customer==false&&$insert_products==false?'active':''}}" style="border: 0px;background-color: rgba(255, 0, 0, 0);" id="btn_orders">
              <span data-feather="file"></span>
              Orders
        </button>
    </form>
          </li>
          <li class="nav-item">
            <form action="/admin_products" method="POST">
                @csrf
                <button type="submit" class="nav-link {{$orders==false&&$products==true&&$customer==false&&$insert_products==false?'active':''}}" style="border: 0px;background-color: rgba(255, 0, 0, 0);" id="btn_orders">
              <span data-feather="shopping-cart"></span>
              Products
        </button>
    </form>
          </li>
          <li class="nav-item">
            <form action="/admin_users" method="POST">
                @csrf
                <button type="submit" class="nav-link {{$orders==false&&$products==false&&$customer==true&&$insert_products==false?'active':''}}" style="border: 0px;background-color: rgba(255, 0, 0, 0);" id="btn_orders">
              <span data-feather="users"></span>
              Registered Users
        </button>
    </form>
          </li>
          <li class="nav-item">
            <form action="/admin_insert_products" method="POST">
              @csrf
              <button type="submit" class="nav-link {{$orders==false&&$products==false&&$customer==false&&$insert_products==true?'active':''}}" style="border: 0px;background-color: rgba(255, 0, 0, 0);" id="btn_orders">
            <span data-feather="bar-chart-2"></span>
            Insert Products
      </button>
  </form>
          </li>
          
        </ul>

        
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Welcome To Sports Club Dashboard</h1>
    </div>
        @if ($orders==true)
           
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-10 col-md-offset-1">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">Order Id</th>
                                    <th>Product</th>
                                    <th class="text-center">Address</th>
                                    <th class="text-center">Price</th>
                                    <th class="text-center">Payment Method</th>
                                    
                                    
                                    
                                    <th> </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($order_rows as $item)
                                
                                <tr>
                                    <td class="col-sm-1 col-md-1 text-center"><strong>{{$item->id}}.</strong></td>
                                    <td class="col-sm-8 col-md-6">
                                    <div class="media">
                                        <a class="thumbnail pull-left" href="#"> <img class="media-object" src="{{$item->gallery}}" style="width: 72px; height: 72px;"> </a>
                                        <div class="media-body">
                                            <h4 class="media-heading"><h6 style="color: blue">Name:</h6> {{$item->name}}</h4>
                                            <h5 class="media-heading"><h6 style="color: blue">Description:</h6> {{$item->description}}</h5>
                                        </div>
                                    </div></td>
                                    <td class="col-sm-1 col-md-1 text-center"><strong>{{$item->address1}}</strong></td>
                                    <td class="col-sm-1 col-md-1 text-center"><strong>{{$item->price}} Rs</strong></td>
                                    <td class="col-sm-1 col-md-1 text-center"><strong>{{$item->payment_method}}</strong></td>
                                    
                                    
                                    
                                    <td class="col-sm-1 col-md-1">
                                    <form action="/delete_order/{{$item->id}}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">
                                        <span class="glyphicon glyphicon-remove"></span> Remove
                                    </button>
                                    </form>
                                </td>
                                </tr>
                                
                                @endforeach
                                
            
            
            
            
                                
                               
                               
                               
                                <tr>
                                    <td>   </td>
                                    <td>   </td>
                                    <td>   </td>
                                    <td>   </td>
                                    <td>
                                </td>
                                    <td>
                                        <form action="/delete_all" method="POST">
                                            @csrf
                                        <button type="submit" class="btn btn-danger">
                                        Remove All <span class="glyphicon glyphicon-play"></span>
                                    </button>
                                </form>
                                </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
           
            
            
             @endif





             @if ($products==true)
           
             <div class="container">
                 <div class="row">
                     <div class="col-sm-12 col-md-10 col-md-offset-1">
                         <table class="table table-hover">
                             <thead>
                                 <tr>
                                     <th class="text-center">Product Id</th>
                                     <th class="text-center">Product</th>
                                     <th class="text-center">Category</th>
                                     <th class="text-center">Price</th>
                                     <th class="text-center">Gallery</th>
                                     
                                     
                                     
                                     <th> </th>
                                 </tr>
                             </thead>
                             <tbody>
                                 @foreach($product_rows as $item)
                                 
                                 <tr>
                                     <td class="col-sm-1 col-md-1 text-center"><strong>{{$item->id}}.</strong></td>
                                     <td class="col-sm-8 col-md-6">
                                     <div class="media">
                                         <a class="thumbnail pull-left" href="#"> <img class="media-object" src="{{$item->gallery}}" style="width: 72px; height: 72px;"> </a>
                                         <div class="media-body">
                                             <h4 class="media-heading"><h6 style="color: blue">Name:</h6> {{$item->name}}</h4>
                                             <h5 class="media-heading"><h6 style="color: blue">Description:</h6> {{$item->description}}</h5>
                                         </div>
                                     </div></td>
                                     <td class="col-sm-1 col-md-1 text-center"><strong>{{$item->category}}</strong></td>
                                     <td class="col-sm-1 col-md-1 text-center"><strong>{{$item->price}} Rs</strong></td>
                                     <td class="col-sm-1 col-md-1 text-center"><strong>{{$item->gallery}}</strong></td>
                                     
                                     
                                     
                                     <td class="col-sm-1 col-md-1">
                                     <form action="/delete_product/{{$item->id}}" method="POST">
                                         @csrf
                                         <button type="submit" class="btn btn-danger">
                                         <span class="glyphicon glyphicon-remove"></span> Remove
                                     </button>
                                     </form>
                                 </td>
                                 </tr>
                                 
                                 @endforeach
                                 
             
             
             
             
                                 
                                
                                
                                
                                 <tr>
                                     <td>   </td>
                                     <td>   </td>
                                     <td>   </td>
                                     <td>   </td>
                                     <td>
                                 </td>
                                     <td>
                                         <form action="/delete_all_product" method="POST">
                                             @csrf
                                         <button type="submit" class="btn btn-danger">
                                         Remove All <span class="glyphicon glyphicon-play"></span>
                                     </button>
                                 </form>
                                 </td>
                                 </tr>
                             </tbody>
                         </table>
                     </div>
                 </div>
             </div>
            
             
             
              @endif

             







              @if ($customer==true)
           
             <div class="container">
                 <div class="row">
                     <div class="col-sm-12 col-md-10 col-md-offset-1">
                         <table class="table table-hover">
                             <thead>
                                 <tr>
                                     <th class="text-center">User Id</th>
                                     <th class="text-center">First Name</th>
                                     <th class="text-center">Last Name</th>
                                     <th class="text-center">Phone Number</th>
                                     <th class="text-center">Age</th>
                                     <th class="text-center">Email</th>
                                     <th class="text-center">Address 1</th>
                                     <th class="text-center">Address 2</th>
                                     <th class="text-center">City</th>
                                     <th class="text-center">Country</th>
                                     <th class="text-center">State</th>
                                     <th class="text-center">Zip</th>
                                     <th class="text-center">Date Created</th>
                                     
                                     
                                     
                                     <th> </th>
                                 </tr>
                             </thead>
                             <tbody>
                                 @foreach($user_rows as $item)
                                 
                                 <tr>
                                     <td class="col-sm-1 col-md-1 text-center"><strong>{{$item->id}}.</strong></td>
                                     <td class="col-sm-1 col-md-1 text-center"><strong>{{$item->firstname}}.</strong></td>
                                     <td class="col-sm-1 col-md-1 text-center"><strong>{{$item->lastname}}</strong></td>
                                     <td class="col-sm-1 col-md-1 text-center"><strong>{{$item->phonenumber}}</strong></td>
                                     <td class="col-sm-1 col-md-1 text-center"><strong>{{$item->age}}</strong></td>
                                     <td class="col-sm-1 col-md-1 text-center"><strong>{{$item->email}}</strong></td>
                                     <td class="col-sm-1 col-md-1 text-center"><strong>{{$item->address1}}</strong></td>
                                     <td class="col-sm-1 col-md-1 text-center"><strong>{{$item->address2}}</strong></td>
                                     <td class="col-sm-1 col-md-1 text-center"><strong>{{$item->city}}</strong></td>
                                     <td class="col-sm-1 col-md-1 text-center"><strong>{{$item->country}}</strong></td>
                                     <td class="col-sm-1 col-md-1 text-center"><strong>{{$item->state}}</strong></td>
                                     <td class="col-sm-1 col-md-1 text-center"><strong>{{$item->zip}}</strong></td>
                                     <td class="col-sm-1 col-md-1 text-center"><strong>{{$item->created_at}}</strong></td>
                                     
                                     
                                     
                                     <td class="col-sm-1 col-md-1">
                                     <form action="/delete_user/{{$item->id}}" method="POST">
                                         @csrf
                                         <button type="submit" class="btn btn-danger">
                                         <span class="glyphicon glyphicon-remove"></span> Remove
                                     </button>
                                     </form>
                                 </td>
                                 </tr>
                                 
                                 @endforeach
                                 
             
             
             
             
                                 
                                
                                
                                
                                 <tr>
                                     <td>   </td>
                                     <td>   </td>
                                     <td>   </td>
                                     <td>   </td>
                                     <td>   </td>
                                     <td>   </td>
                                     <td>   </td>
                                     <td>   </td>
                                     <td>   </td>
                                     <td>   </td>
                                     <td>   </td>
                                     <td>   </td>
                                     <td>   </td>
                                     <td>
                                         <form action="/delete_all_user" method="POST">
                                             @csrf
                                         <button type="submit" class="btn btn-danger">
                                         Remove All <span class="glyphicon glyphicon-play"></span>
                                     </button>
                                 </form>
                                 </td>
                                 </tr>
                             </tbody>
                         </table>
                     </div>
                 </div>
             </div>
            
             
             
              @endif




              @if ($insert_products==true)
              <div class="tab-content ml-1" id="myTabContent">
                <div class="tab-pane fade show active" id="basicInfo" role="tabpanel" aria-labelledby="basicInfo-tab">
                    
                    <form action="/admin_product_upload" method="POST" enctype="multipart/form-data">
                        @csrf
                    <div class="row">
                        <div class="col-sm-3 col-md-2 col-5">
                            <label style="font-weight:bold;">Product Name</label>
                        </div>
                        <div class="col-md-8 col-6">
                            <input type="text" class="form-control" id="fn_id" name="pn" placeholder="Name of Product" value="{{old('pn')}}">
                            <span id="fn_span" style="color: red">{{ $errors->first('pn') }}</span> 
                        </div>
                    </div>
                    <hr />

                    <div class="row">
                        <div class="col-sm-3 col-md-2 col-5">
                            <label style="font-weight:bold;">Product Price</label>
                        </div>
                        <div class="col-md-8 col-6">
                            <input type="text" class="form-control 1" id="ln_id" name="pp" value="{{old('pp')}}" placeholder="Price in Rupees">
                            <span id="fn_span" style="color: red">{{ $errors->first('pp') }}</span>
                          </div>
                    </div>
                    <hr />
                    
                    
                    <div class="row">
                        <div class="col-sm-3 col-md-2 col-5">
                            <label style="font-weight:bold;">Product Category</label>
                        </div>
                        <div class="col-md-8 col-6">
                            <input type="text" class="form-control" id="mn_id" name="pc" value="{{old('pc')}}" placeholder="Category">
                            <span id="fn_span" style="color: red">{{ $errors->first('pc') }}</span>
                        </div>
                    </div>
                    <hr />

                    <div class="row">
                        <div class="col-sm-3 col-md-2 col-5">
                            <label style="font-weight:bold;">Product Description</label>
                        </div>
                        <div class="col-md-8 col-6">
                            <input type="text" class="form-control" id="age_id" name="pd" value="{{old('pd')}}" placeholder="Description">
                            <span id="fn_span" style="color: red">{{ $errors->first('pd') }}</span>
                        </div>
                    </div>
                    <hr />
                   
                    
                   
                    
                   
                   
                   
                    <div class="row">
                        <div class="col-sm-3 col-md-2 col-5">
                            <label style="font-weight:bold;">Picture</label>
                        </div>
                        <div class="col-md-8 col-6">
                          <input type="file" name="file" class="form-control" placeholder="Choose file" id="file">
                          <span id="fn_span" style="color: red">{{ $errors->first('file') }}</span>
                            
                        </div>
                    </div>
                    <hr />
                    @isset($upload_product)
                    <div class="alert alert-success">
                      <strong>Product Has Been Uploaded Successfully</strong>
                  </div>    
                    @endisset
                    
                    <div class="middle">
                        
                        <button type="submit" class="btn btn-primary">Upload Item</button>
                        
                    </div>
                </form>
                </div>
            </div>
                  
              @endif




      
      </main>
  </div>
</div>


    <script src="{{asset('dist/js/bootstrap.bundle.min.js')}}"></script>

      <script src="{{asset('feathericons3.js')}}" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="{{asset('feathericons3.js')}}" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="{{asset('dashboard.js')}}"></script>
      <script>
        feather.replace()
      </script>
    </body>
</html>

@else
{{App\Http\Controllers\AdminClientController::home()}}
@endif