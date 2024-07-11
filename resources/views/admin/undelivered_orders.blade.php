<!DOCTYPE html>
<html>
  <head> 
   @include('admin.style')
   <style type="text/css">
      .image_design{
       padding:20px;
       width: 200px;
       height: 150px;
     }
  </style>
  </head>
  <body>
   @include('admin.header')
   @include('sweetalert::alert')

    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
     @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
      <div class="page-content">
   
    <div class="container-fluid">
            <div class="row">
              <div class="col-lg-12">
                <div class="block margin-bottom-sm">
                  <div class="title" align="center"><strong>List of Undelivered Orders </strong></div><hr>
                  <div class="table-responsive"> 
                    
                    <table class="table">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Order creater</th>
                          <th>Address</th>
                          <th>Mobile</th>
                          <th>Product Name</th>
                          <th>Product Price</th>
                          <th>Qunantity</th>
                          <th>Date Made</th>
                          <th>Status</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($order as $order)

                        <tr>
                          <th scope="row">{{$loop->iteration}}</th>
                          <td>{{$order->name}}</td>
                          <td>{{$order->address}}</td>
                          <td>{{$order->phone}}</td>
                          <td>{{$order->product}}</td>
                          <td>${{$order->price}}</td>
                          <td>{{$order->quantity}}</td>
                          <td>{{$order->created_at}}</td>
                          <td style="color:red;">{{$order->status}}</td>
                          <td><a href="{{url('accept_order',$order->id)}}" class="button btn btn-outline-secondary">ACCEPT</td>
                        </tr>
                        @endforeach
                        
                      </tbody>
                    </table>
                    
                </div>
        </div>
    </div>
        
    </div>
    @include('admin.footer')
  </body>
</html>
