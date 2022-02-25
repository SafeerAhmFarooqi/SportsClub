<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UploadProductRequest;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;
use App\Models\User;
use App\Models\items;
use App\Models\cart;
use App\Models\order;
use Illuminate\Support\Facades\Hash;
use App\Http\Middleware\UserLoginAuth;
use Illuminate\Session\Middleware\StartSession;
use Session;
use Illuminate\Support\Facades\DB;
class AdminClientController extends Controller
{
    static function home()
    {
        $userpage=false;
        $warning=false;
        return view('home',['userpage'=>$userpage,'warning'=>$warning]);
    }
   public function create()
    {
        return view('signup');
    }
    function signout()
    {
        Session::forget('user');
        return redirect('/');
    }
   public  function store(Request $req)
    {
        $validated = $req->validate([
            'fn' => 'required|string|different:ln|max:50',
            'ln' => 'required|string|different:fn|max:50',
            'mn' => 'required|digits_between:1,30',
            'age' => 'required|integer|max:100|min:7',
            'email' => 'required|email:rfc,dns|unique:App\Models\User,email|max:60',
            'password' =>  Password::min(8)->letters()->mixedCase()->numbers()->symbols()->required(),
            'address1' => 'required|string|max:200',
            'address2' => 'string|nullable|different:address|max:200',
            'city' => 'required|string|max:40',
            'country' => 'required|string|max:40',
            'state' => 'required|string|max:40',
            'zip' => 'required|string|max:60',
        ]);
        $user=new User();
        $user->firstname=$validated['fn'];
        $user->lastname=$validated['ln'];
        $user->phonenumber=$validated['mn'];
        $user->age=$validated['age'];
        $user->email=$validated['email'];
        $user->password=Hash::make($validated['password']);
        $user->address1=$validated['address1'];
        if($validated['address2']==null)
        {
            $user->address2="";
        }
        else
        {
            $user->address2=$validated['address2'];
        }
        $user->city=$validated['city'];
        $user->country=$validated['country'];
        $user->state=$validated['state'];
        $user->zip=$validated['zip'];
        $user->save();
        $row=User::where(['email'=>$validated['email']])->first();
        $req->session()->put('user',$row);
        return redirect('/userapp');
    }
    function login(Request $req)
    {
        if($req->lemail=="admin@sportsclub.com"&&$req->lpassword=="myfirstapp")
        {
        $pass=true;
       $orders=false;
       $products=false;
       $customer=false;
       $insert_products=false;
       return view('admin2',['pass'=>$pass,'orders'=>$orders,'products'=>$products,'customer'=>$customer,'insert_products'=>$insert_products]);
        }
        $row=User::where(['email'=>$req->lemail])->first();
        if(!$row||!Hash::check($req->lpassword,$row->password))
        {
            $userpage=false;
            $warning=true;
            return view('home',['userpage'=>$userpage,'warning'=>$warning]);
        }
        else
        {
            $req->session()->put('user',$row);
            return redirect('/userapp');
        }
    }
    static function no_of_cart_items(Request $req)
    {
        if($req->session()->has('user'))
        {
            $cart_items=cart::where(['user_id'=>$req->session()->get('user')['id']])->get();
            $no_of_cart_items=0;
            foreach($cart_items as $value)
            {
                $no_of_cart_items++;
            }
            return $no_of_cart_items;
        }
        else
        {
            return 0;
        }
    }
    static function cart_items_names(Request $req)
    {
        if($req->session()->has('user'))
        {
            $cart_items=cart::where(['user_id'=>$req->session()->get('user')['id']])->get();
            $iteration=0;
            $cart_items_names=array();
            foreach($cart_items as $value)
            {
                $row=items::where(['id'=>$value['product_id']])->first();
                $cart_items_names[$iteration]=$row['name'];
                $iteration++;
            }
            return $cart_items_names;
        }
        else
        {
            return 0;
        }
    }
    static function cart_items_names_1()
    {
        if(Session::has('user'))
        {
            $cart_items=cart::where(['user_id'=>Session::get('user')['id']])->get();
            $iteration=0;
            $cart_items_names=array();
            foreach($cart_items as $value)
            {
                $row=items::where(['id'=>$value['product_id']])->first();
                $cart_items_names[$iteration]=$row;
                $iteration++;
            }
            return $cart_items_names;
        }
        else
        {
            return 0;
        }
    }
    function items(Request $req)
    {
        $no_of_cart_items=0;
        $cart_items_names=array();
        if($req->session()->has('user'))
        {
            $userpage=true;
            $iteration=0;
            $cart_items=cart::where(['user_id'=>$req->session()->get('user')['id']])->get();
            foreach($cart_items as $value)
            {
                $no_of_cart_items++;
                $row=items::where(['id'=>$value['product_id']])->first();
                $cart_items_names[$iteration]=$row['name'];
                $iteration++;
            }
        }
        else
        {
            $userpage=false;
        }
        $data=items::all();
        return view('items',['items'=>$data,'cart_items'=>$no_of_cart_items,'userpage'=>$userpage,'cart_items_names'=>$cart_items_names]);
    }
    function buyitempage(Request $req,$id)
    {
        if($req->session()->has('user'))
        {
            $userpage=true;
        }
        else
        {
            $userpage=false;
        }
        $data=items::find($id);
        return view('buyitem',['row'=>$data,'userpage'=>$userpage,'cart_items'=>AdminClientController::no_of_cart_items($req),'cart_items_names'=>AdminClientController::cart_items_names($req)]);
    }
    function add_to_cart(Request $req,$id)
    {
        if(Session::has('user'))
        {
            $userpage=true;
            $cart=new cart();
            $cart->user_id=$req->session()->get('user')['id'];
            $cart->product_id=$id;
            $cart->save();
            return redirect("/useritems");
        }
        else
        {
            $userpage=false;
            return view('alertpage',['userpage'=>$userpage],['id'=>$id]);
        }
    }
    function buy_now(Request $req,$id)
    {
        if(Session::has('user'))
        {
            $userpage=true;
            $cart=new cart();
            $cart->user_id=$req->session()->get('user')['id'];
            $cart->product_id=$id;
            $cart->save();
            $user_id=Session::get('user')['id'];
            if($user_id)
            {
                $userpage=true;
            }
            else
            {
                $userpage=false;
            }
            $items = DB::table('cart')
            ->join('items', 'cart.product_id', '=', 'items.id')
            ->where('cart.user_id', $user_id)
            ->select('items.*','cart.id as cart_id')
            ->get();    
            $price = DB::table('cart')
                ->join('items', 'cart.product_id', '=', 'items.id')
                ->where('cart.user_id', $user_id)
                ->sum("items.price");
                return view('checkout',['userpage'=>$userpage,'items'=>$items,'total_price'=>$price,'cart_items'=>AdminClientController::cart_items(),'cart_items_names'=>AdminClientController::cart_items_names_1()]);
        }
        else
        {
            $userpage=false;
            return view('alertpage',['userpage'=>$userpage],['id'=>$id]);
        }
    }
    function buy_now_get(Request $req,$id)
    {
        if(Session::has('user'))
        {
            $userpage=true;
            $cart=new cart();
            $cart->user_id=$req->session()->get('user')['id'];
            $cart->product_id=$id;
            $cart->save();
            $user_id=Session::get('user')['id'];
            if($user_id)
            {
                $userpage=true;
            }
            else
            {
                $userpage=false;
            }
            $items = DB::table('cart')
            ->join('items', 'cart.product_id', '=', 'items.id')
            ->where('cart.user_id', $user_id)
            ->select('items.*','cart.id as cart_id')
            ->get();    
            $price = DB::table('cart')
                ->join('items', 'cart.product_id', '=', 'items.id')
                ->where('cart.user_id', $user_id)
                ->sum("items.price");
                return view('checkout',['userpage'=>$userpage,'items'=>$items,'total_price'=>$price,'cart_items'=>AdminClientController::cart_items(),'cart_items_names'=>AdminClientController::cart_items_names_1()]);
        }
        else
        {
            $userpage=false;
            return view('alertpage',['userpage'=>$userpage],['id'=>$id]);
        }
    }
   static function cart_items()
    {
        if(Session::has('user'))
        {
            $user_id=Session::get('user')['id'];
            $no_of_cart_items=cart::where(['user_id'=>$user_id])->count();
            return $no_of_cart_items;
        }
        else
        {
            return 0;
        }
    }
    function cart_item_page()
    {
        if(Session::has('user'))
        {
        $user_id=Session::get('user')['id'];
        if($user_id)
        {
            $userpage=true;
        }
        else
        {
            $userpage=false;
        }
        $items = DB::table('cart')
            ->join('items', 'cart.product_id', '=', 'items.id')
            ->where('cart.user_id', $user_id)
            ->select('items.*','cart.id as cart_id')
            ->get();
            if($items->count()>0)
            {
                return view('cartitempage',['userpage'=>$userpage,'items'=>$items,'cart_items'=>AdminClientController::cart_items(),'cart_items_names'=>AdminClientController::cart_items_names_1()]);
            }
            else
            {
                return redirect('/');
            }
        }
        else
        {
           return redirect('/');
        }
    }
    function delete_cart_item($cart_id)
    {
        cart::destroy($cart_id);
        if(AdminClientController::cart_items()==0)
        {
            return redirect('/useritems');
        }
        else
        {
            return redirect('/cartpage');
        }
    }
    function checkout()
    {
        if(Session::has('user'))
        {
            $user_id=Session::get('user')['id'];
        if($user_id)
        {
            $userpage=true;
        }
        else
        {
            $userpage=false;
        }
        $items = DB::table('cart')
        ->join('items', 'cart.product_id', '=', 'items.id')
        ->where('cart.user_id', $user_id)
        ->select('items.*','cart.id as cart_id')
        ->get();    
        $price = DB::table('cart')
            ->join('items', 'cart.product_id', '=', 'items.id')
            ->where('cart.user_id', $user_id)
            ->sum("items.price");
            return view('checkout',['userpage'=>$userpage,'items'=>$items,'total_price'=>$price,'cart_items'=>AdminClientController::cart_items(),'cart_items_names'=>AdminClientController::cart_items_names_1()]);
        }
        else
        {
           return redirect('/');
        }
    }
    function place_order(Request $req)
    {
        if(Session::has('user'))
        {
            
            $validated = $req->validate([
                'first_name' => 'required|string|different:ln|max:50',
                'last_name' => 'required|string|different:fn|max:50',
                'mn' => 'required|digits_between:1,30',
                'email' => 'email:rfc,dns|max:60',
                'address1' => 'required|string|max:200',
                'address2' => 'string|nullable|different:address|max:200',
                'country' => 'required|string|max:50',
                'state' => 'required|string|max:50',
                'zip' => 'required|string|max:60',
            ]);
            if($req->paymentMethod=="credit_card"||$req->paymentMethod=="debit_card")
            {
                $validated += $req->validate([
                    'ccname' => 'required|string|max:50',
                    'ccnumber' => 'required|digits_between:1,40',
                    'ccexp' => 'required|date|max:20',
                    'cccvv' => 'required|digits_between:000,999|size:3',
                ]); 
            }
            $user_id=Session::get('user')['id'];
            $cart_order_items=cart::where('user_id',$user_id)->get();
            $userpage=true;
            foreach($cart_order_items as $items)
            {
                $order=new order();
                $order->product_id=$items['product_id'];
                $order->user_id=$items['user_id'];
                $order->firstname=$req->first_name;
                $order->lastname=$req->last_name;
                if($req->email)
                {
                    $order->email=$req->email;
                }
                else
                {
                    $order->email="";
                }
                $order->address1=$req->address1;
                if($req->address2)
                {
                    $order->address2=$req->address2;
                }
                else
                {
                    $order->address2="";
                }
                $order->country=$req->country;
                $order->state=$req->state;
                $order->zip=$req->zip;
                if($req->save_info)
                {
                    $order->save_info="1";
                }
                else
                {
                    $order->save_info="0";
                }
                $order->payment_method=$req->paymentMethod;
                $order->payment_status=$req->paymentMethod;
                $order->save();
                cart::where('user_id',$user_id)->delete();
            }
            return view('orderconfirm',['userpage'=>$userpage,'cart_items'=>AdminClientController::cart_items(),'cart_items_names'=>AdminClientController::cart_items_names_1()]);
        }
        else
        {
           return redirect('/');
        }
        
    }
    function userapp(Request $req)
    {
        $userpage=true;
    $cart_items=cart::where(['user_id'=>$req->session()->get('user')['id']])->get();
    $no_of_cart_items=0;
    $iteration=0;
    $cart_items_names=array();
    foreach($cart_items as $value)
    {
        $no_of_cart_items++;
        $row=items::where(['id'=>$value['product_id']])->first();
        $cart_items_names[$iteration]=$row['name'];
        $iteration++;
    }
    return view('userapp',['userpage'=>$userpage,'cart_items'=>$no_of_cart_items,'cart_items_names'=>$cart_items_names]);
    }
    function search_items(Request $req)
    {
        $search_items=array();
        $iteration=0;
        $percent1=0;
        $percent2=0;
        $percent3=0;
        $percent4=0;
        foreach(items::all() as $item)
        {
            similar_text(strtolower($item->name),strtolower($req->search_string),$percent1);
            similar_text(strtolower($item->price),strtolower($req->search_string),$percent2);
            similar_text(strtolower($item->category),strtolower($req->search_string),$percent3);
            similar_text(strtolower($item->description),strtolower($req->search_string),$percent4);
            if($percent1>30||$percent2==100||$percent3>30||$percent4>30)
            {
                $search_items[$iteration]=$item;
                $iteration++;    
            }
        }
        return view('searchresult',['search_items'=>$search_items]);
    }
    function show_profile()
    {
        if(Session::has("user"))
        {
                $row=User::find(Session::get('user')['id']);
                return view("showprofile",['row'=>$row]);
        }
        else
        {
            return redirect('/');
        }
    }
    function edit_profile()
    {
        if(Session::has("user"))
        {
                $row=User::find(Session::get('user')['id']);
                return view("editprofile",['row'=>$row]);
        }
        else
        {
            return redirect('/');
        }
    }
    function save_changes(Request $req)
    {
        $validated = $req->validate([
            'fn' => 'required|string|different:ln|max:50',
            'ln' => 'required|string|different:fn|max:50',
            'mn' => 'required|digits_between:1,30',
            'age' => 'required|integer|max:100|min:7',
            'address1' => 'required|string|max:200',
            'address2' => 'string|nullable|different:address|max:200',
            'city' => 'required|string|max:40',
            'country' => 'required|string|max:40',
            'state' => 'required|string|max:40',
            'zip' => 'required|string|max:60',
        ]);
        $user=User::find($req->session()->get('user')['id']);
        $user->firstname=$validated['fn'];
        $user->lastname=$validated['ln'];
        $user->phonenumber=$validated['mn'];
        $user->age=$validated['age'];
        $user->address1=$validated['address1'];
        if($validated['address2']==null)
        {
            $user->address2="";
        }
        else
        {
            $user->address2=$validated['address2'];
        }
        $user->city=$validated['city'];
        $user->country=$validated['country'];
        $user->state=$validated['state'];
        $user->zip=$validated['zip'];
        $user->save();
        $row=User::find($req->session()->get('user')['id']);
        $req->session()->put('user',$row);
        return view('editprofilesuccess');
    }
    function change_password()
    {
        $pass_error=false;
        $pass_error2=false;
        return view('changepassword',['pass_error'=>$pass_error,'pass_error2'=>$pass_error2]);
    }
    function change_password_post(Request $request)
    {
        if(Session::has('user'))
        {
            $row=User::find(Session::get("user")['id']);
            if(Hash::check($request->current_password,$row['password']))
            {
                $validated = $request->validate([
                    'new_password' =>  Password::min(8)->letters()->mixedCase()->numbers()->symbols()->required(),
                    'confirm_password' =>  Password::min(8)->letters()->mixedCase()->numbers()->symbols()->required(),
                ]);
                if($request->new_password!=$request->confirm_password)
                {
                    $pass_error=false;
                    $pass_error2=true;
                    return view('changepassword',['pass_error'=>$pass_error,'pass_error2'=>$pass_error2]);
                }
                else
                {
                    $row->password= Hash::make($request->new_password);
                    $row->save();
                    return view('passwordchangesuccess');
                }
            }
            else
            {
                $pass_error=true;
                $pass_error2=false;
                return view('changepassword',['pass_error'=>$pass_error,'pass_error2'=>$pass_error2]);
            }
        }
        else
        {
            return redirect('/');
        }
    }
    function forgot_password()
    {
        $pass_error=false;
        $pass_error2=false;
        return view('forgotpassword',['pass_error'=>$pass_error,'pass_error2'=>$pass_error2]);
    }
    function forgot_password_post(Request $request)
    {
        $row=User::where(['email'=>$request->email])->first();
        if($row)
        {
                 if($row->phonenumber==$request->mn)
                 {
                    if($row->age==$request->age)
                    {
                        $validated = $request->validate([
                            'new_password' =>  Password::min(8)->letters()->mixedCase()->numbers()->symbols()->required(),
                            'confirm_password' =>  Password::min(8)->letters()->mixedCase()->numbers()->symbols()->required(),
                        ]);
                        if($request->new_password!=$request->confirm_password)
                        {
                            $pass_error=false;
                            $pass_error2=true;
                            return view('forgotpassword',['pass_error'=>$pass_error,'pass_error2'=>$pass_error2]);
                        }
                        else
                        {
                            $row->password= Hash::make($request->new_password);
                            $row->save();
                            return view('passwordchangesuccess');
                        }
                    }
                    else
                    {
                       $pass_error=true;
                   $pass_error2=false;
                   return view('forgotpassword',['pass_error'=>$pass_error,'pass_error2'=>$pass_error2]);     
                    }
                 }
                 else
                 {
                    $pass_error=true;
                $pass_error2=false;
                return view('forgotpassword',['pass_error'=>$pass_error,'pass_error2'=>$pass_error2]);     
                 }
        }
        else
        {
                $pass_error=true;
                $pass_error2=false;
                return view('forgotpassword',['pass_error'=>$pass_error,'pass_error2'=>$pass_error2]);
        }
    }
    function admin_get()
    {
       $pass=false;
       $orders=false;
       $products=false;
       $customer=false;
       $insert_products=false;
       return view('admin2',['pass'=>$pass,'orders'=>$orders,'products'=>$products,'customer'=>$customer,'insert_products'=>$insert_products]);
    } 
    function admin_orders()
    {
        $pass=true;
       $orders=true;
       $products=false;
       $customer=false;
       $insert_products=false;
       $items = DB::table('orders')
       ->join('items', 'orders.product_id', '=', 'items.id')
       ->select('orders.*','items.id as item_id','items.name','items.price','items.category','items.description','items.gallery')
       ->get();
       return view('admin2',['pass'=>$pass,'orders'=>$orders,'products'=>$products,'customer'=>$customer,'insert_products'=>$insert_products,'order_rows'=>$items]);
    }
    function admin_orders_get()
    {
        $pass=false;
       $orders=false;
       $products=false;
       $customer=false;
       $insert_products=false;
       return view('admin2',['pass'=>$pass,'orders'=>$orders,'products'=>$products,'customer'=>$customer,'insert_products'=>$insert_products]);
    }
    function delete_order($id)
    {
        order::destroy($id);
        return AdminClientController::admin_orders();
    }
    function delete_order_get($id)
    {
        return redirect('/');
    }
    function delete_all()
    {
        $allrecords=order::all();
        foreach($allrecords as $record)
        {
            $record->delete();
        }
        return AdminClientController::admin_orders();
    }
    function delete_all_get()
    {
        
        return redirect('/');
    }
    function admin_products()
    {
        $pass=true;
       $orders=false;
       $products=true;
       $customer=false;
       $insert_products=false;
       $items = items::all();
       return view('admin2',['pass'=>$pass,'orders'=>$orders,'products'=>$products,'customer'=>$customer,'insert_products'=>$insert_products,'product_rows'=>$items]);
    }
    function admin_products_get()
    {
        $pass=false;
       $orders=false;
       $products=false;
       $customer=false;
       $insert_products=false;
       return view('admin2',['pass'=>$pass,'orders'=>$orders,'products'=>$products,'customer'=>$customer,'insert_products'=>$insert_products]);
    }
    function delete_product($id)
    {
        items::destroy($id);
        return AdminClientController::admin_products();
    }
    function delete_product_get($id)
    {
        return redirect('/');
    }
    function admin_users()
    {
        $pass=true;
       $orders=false;
       $products=false;
       $customer=true;
       $insert_products=false;
       $items = User::all();
       return view('admin2',['pass'=>$pass,'orders'=>$orders,'products'=>$products,'customer'=>$customer,'insert_products'=>$insert_products,'user_rows'=>$items]);
    }
    function admin_users_get()
    {
        $pass=false;
       $orders=false;
       $products=false;
       $customer=false;
       $insert_products=false;
       return view('admin2',['pass'=>$pass,'orders'=>$orders,'products'=>$products,'customer'=>$customer,'insert_products'=>$insert_products]);
    }
    function delete_all_product()
    {
        $allrecords=items::all();
        foreach($allrecords as $record)
        {
            $record->delete();
        }
        return AdminClientController::admin_products();
    }
    function delete_all_product_get()
    {
        
        return redirect('/');
    }
    function delete_user($id)
    {
        User::destroy($id);
        return AdminClientController::admin_users();
    }
    function delete_user_get($id)
    {
        return redirect('/');
    }
    function delete_all_user()
    {
        $allrecords=User::all();
        foreach($allrecords as $record)
        {
            $record->delete();
        }
        return AdminClientController::admin_users();
    }
    function delete_all_user_get()
    {
        
        return redirect('/');
    }
    function admin_signout()
    {
        Session::flush();
        return redirect('/');
    }
    function admin_insert_products()
    {
        $pass=true;
       $orders=false;
       $products=false;
       $customer=false;
       $insert_products=true;
       return view('admin2',['pass'=>$pass,'orders'=>$orders,'products'=>$products,'customer'=>$customer,'insert_products'=>$insert_products]);
    }
    function admin_insert_products_get()
    {
        $pass=false;
       $orders=false;
       $products=false;
       $customer=false;
       $insert_products=false;
       return view('admin2',['pass'=>$pass,'orders'=>$orders,'products'=>$products,'customer'=>$customer,'insert_products'=>$insert_products]);
    }
    function admin_product_upload(UploadProductRequest $request)
    {
        $validated = $request->validated();
        $path = $request->file('file')->store('images','public2');
        $product=new items();
        $product->name=$request->pn;
        $product->price=$request->pp;
        $product->category=$request->pc;
        $product->description=$request->pd;
        $product->gallery=$path;
        $product->save();
        $pass=true;
       $orders=false;
       $products=false;
       $customer=false;
       $insert_products=true;
       $upload_product=true;
       return view('admin2',['pass'=>$pass,'orders'=>$orders,'products'=>$products,'customer'=>$customer,'insert_products'=>$insert_products,'upload_product'=>$upload_product]);
    }
    function admin_product_upload_get()
    {
        $pass=false;
       $orders=false;
       $products=false;
       $customer=false;
       $insert_products=false;
       return view('admin2',['pass'=>$pass,'orders'=>$orders,'products'=>$products,'customer'=>$customer,'insert_products'=>$insert_products]);
    }
}