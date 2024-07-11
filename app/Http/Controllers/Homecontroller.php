<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use illuminate\Support\Facades\DB;
use Alert;

class Homecontroller extends Controller
{
    public function redirect()
    {
      if(Auth::id()){
        
        $usertype=Auth()->user()->usertype;

        if($usertype=='user'){

          $data = Product::all();
          $user = Auth()->user();
          $count = Cart::where('email',$user->email)->count(); 
        return view('user.home',compact('data','count'));
  
        }

        else if($usertype=='admin'){
            return view('admin.home');
        }
        else{
            return redirect()->back();
        }
    }
    }

    public function index()
    {
      $data = Product::all();
      return view('user.home',compact('data'));
    }

    public function add_post()

    {
      return view('user.add_post');
    }

    public function search(Request $request)
    {
      $search =$request->search;
      $data = Product::where('product','Like','%'.$search.'%')->get();
      return view('user.home',compact('data'));
    }

    public function addcart(Request $request,$id)
    {
      if(Auth::id())
      {

        $user = Auth()->user();
        $product = Product::find($id);

        $cart = new Cart();

        $cart->name=$user->name;
        $cart->phone=$user->phone;
        $cart->address=$user->address;
        $cart->email=$user->email;
        $cart->product=$product->product;
        $cart->price=$product->price;
        $cart->quantity=$request->quantity;
        $cart->save();
        Alert::success('Congrats','You have  successfully added To a cart!');
        return redirect()->back();

      }
      else
      {
         return redirect('login');
      }
    }

    public function showcart()
    {
      $data = Product::paginate(3);
      $user = Auth()->user();
      $cart = Cart::where('email',$user->email)->get(); 
      $count = Cart::where('email',$user->email)->count(); 
      return view('user.showcart',compact('count','cart'));
    }
    public function delete_cart($id)
    {
      $cart = Cart::find($id);
      $cart->delete();
      Alert::success('Congrants','You have successful deleted a cart');
      return redirect()->back();
    }


    public function place_order(Request $request)

    {
      $user = Auth()->user();
      $name = $user->name;
      $email = $user->email;
      $phone = $user->phone;
      $address = $user->address;

      foreach($request->product as $key=>$product)
      {
        $order = new Order;
        $order->product =$request->product[$key];
        $order->price =$request->price[$key];
        $order->quantity =$request->quantity[$key];
        $order->name=$name;
        $order->phone=$phone;
        $order->address=$address;
        $order->status="NOT DELIVERED";
        $order->save();

      }
      
      $order = Cart::where('email',$user->email)->delete();
      Alert::success('congrats','You have successful make an order');
      return redirect()->back();
    }
}
