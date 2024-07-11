<!DOCTYPE html>
<html lang="en">
   <head>
     @include('user.style')
   </head>
   <body>
   @include('sweetalert::alert')
      <!-- header section start -->
   @include('user.header')
   <div class="container-fluid">
            <div class="row">
              <div class="col-lg-12">
                <div class="block margin-bottom-sm">
                  <div class="title" align="center"><strong>List of Products </strong></div><hr>
                  <div class="table-responsive"> 
                    
                    <table class="table">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Product Name</th>
                          <th>Quantity</th>
                          <th>Price</th>
                          <th>Date created</th>
                          <th col="2">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <form action="{{url('place_order')}}" method="post">
                          @csrf
                   @foreach($cart as $cart)

                        <tr>
                          <th scope="row">{{$loop->iteration}}</th>
                          <td>
                            <input type="text" name="product[]" value="{{$cart->product}}" hidden="">
                          {{$cart->product}}
                         </td>
                          <td>
                          <input type="number" name="quantity[]" value="{{$cart->quantity}}" hidden="">
                            {{$cart->quantity}}

                          </td>
                          <td>
                          <input type="number" name="price[]" value="{{$cart->price}}" hidden="">
                          ${{$cart->price}}</td>
                          <td>
                          
                            {{$cart->created_at}}

                          </td>
                          <td><a href="{{url('edit',$cart->id)}}" class="button btn btn-primary">Update</td>
                          <td><a href="{{url('delete_cart',$cart->id)}}" class="button btn btn-danger">Delete</td>
                        </tr>
                        @endforeach
                     
                        
                      </tbody>
                    </table>
                     <center>
                     <button class="btn btn-success" >Place order</button>
                     </center>
                   
                    </form>
                </div>
        </div>
    </div>
        
    </div>
    
   
      
      
   </body>
</html>