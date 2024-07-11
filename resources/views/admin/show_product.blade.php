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
                  <div class="title" align="center"><strong>List of Products </strong></div><hr>
                  <div class="table-responsive"> 
                    
                    <table class="table">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Product Name</th>
                          <th>Descriptions</th>
                          <th>Price</th>
                          <th>Image</th>
                          <th col="2">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($data as $data)

                        <tr>
                          <th scope="row">{{$loop->iteration}}</th>
                          <td>{{$data->product}}</td>
                          <td>{{$data->description}}</td>
                          <td>${{$data->price}}</td>
                          <td><img src="postimages/{{$data->image}}" class="image_design"></td>
                          <td><a href="{{url('edit',$data->id)}}" class="button btn btn-outline-secondary">Update</td>
                          <td><a href="{{url('delete',$data->id)}}" class="button btn btn-outline-secondary">Delete</td>
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
