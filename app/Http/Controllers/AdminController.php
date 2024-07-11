<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use Alert;

class AdminController extends Controller
{

//view the uploading page content
public function products()
{

           if(Auth::id())
                {
                     if(Auth::user()->usertype=="admin")
                          {
                             return view('admin.products');
     
                           }

            else
                 {
                    return redirect()->back();

                   }
             
                }
          else
               {
                 return redirect('login');
    
               }
}

public function upload_product(Request $request)
{
    $data = new Product;

    $data->product=$request->product;
    $data->price=$request->price;
    $data->description=$request->description;
    $data->quantity=$request->quantity;

    $image = $request->image;  
        if($image){
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('postimages',$imagename);
        $data->image = $imagename; 
        }
        $data->save();
    Alert::success('Congrats','You have  successfully uploaded product');

    return redirect()->back();
}


  public function show_product()
  {
    $data=Product::all();
    return view('admin.show_product',compact('data'));
  }

  public function delete($id)
  {
    $data = Product::find($id);
    $data->delete();
    Alert::success('Congrats','You have  successfully deleted the product');

    return redirect()->back();
  }

  public function edit($id)
  {
    $data=Product::find($id);
    return view('admin.edit',compact('data'));
  }

  public function update(Request $request,$id)
  {

    $data=Product::find($id);
    $data->product=$request->product;
    $data->price=$request->price;
    $data->quantity=$request->quantity;
    $data->description=$request->description;
    $image = $request->image;  
    if($image){
    $imagename=time().'.'.$image->getClientOriginalExtension();
    $request->image->move('postimages',$imagename);
    $data->image = $imagename; 
    }
    $data->save();
    Alert::success('Congrats','You have  successfully Updated an order!');

    return redirect()->back();
  }


  //showing  undelivered orders 

  public function undelivered_orders()
  {
    $order = Order::where('status','=','NOT DELIVERED')->get();
    return view('admin.undelivered_orders',compact('order'));
  }


   //showing  delivered orders 

   public function delivered_orders()
   {
     $order = Order::where('status','=','DELIVERED')->get();
     return view('admin.delivered_orders',compact('order'));
   }

  //accepting order

  public function accept_order($id)
  {
      $order=Order::find($id);
      $order->status='DELIVERED';
      $order->save();
      Alert::success('Congrats','You have  successfully accepted the order');
      return redirect()->back();
     
  }

    //arejecting order

    public function reject_order($id)
    {
        $order=Order::find($id);
        $order->status='NOT DELIVERED';
        $order->save();
        Alert::success('Congrats','You have  successfully rejected the order');
        return redirect()->back();
       
    }
}
