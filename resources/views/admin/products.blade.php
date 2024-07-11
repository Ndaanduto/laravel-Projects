<!DOCTYPE html>
<html>
  <head> 
   @include('admin.style')
  </head>
  <body>
  @include('sweetalert::alert')
   @include('admin.header')
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
     @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
    
   <div class="page-content">

           <div align="center">

             <h1 style="padding-top: 25px;font-size:25px">Add Products</h1>
   
            </div>


            <div align="center" style="padding-top:25px;">
                
        
               <form class="form-horizontal" method="post" action="{{url('upload_product')}}" enctype="multipart/form-data">
                @csrf
                      <div class="form-group row">
                        <label class="col-sm-3 form-control-label">Product Title</label>
                        <div class="col-sm-6">
                          <input id="inputHorizontalSuccess" name="product" type="text" placeholder="Give a product title" class="form-control form-control-success">
                        </div>
                       
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-3 form-control-label">Price</label>
                        <div class="col-sm-6">
                          <input id="inputHorizontalWarning" name="price" type="number" placeholder="Give a price" class="form-control form-control-warning">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label class="col-sm-3 form-control-label">Description</label>
                        <div class="col-sm-6">
                          <input id="inputHorizontalWarning" name="description" type="text" placeholder="Give a Description" class="form-control form-control-warning">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label class="col-sm-3 form-control-label">Quantity</label>
                        <div class="col-sm-6">
                          <input id="inputHorizontalWarning" name="quantity" type="number" placeholder="Give a Quantity" class="form-control form-control-warning">
                        </div>
                      </div>

                      <div class="form-group row">
                      <label class="col-sm-3 form-control-label">Product's Image</label>
                        <div class="col-sm-6">
                          <input id="inputHorizontalWarning" name="image" type="file" placeholder="upload a picture" class="form-control form-control-warning">
                        </div>
                      </div>

                      <div class="form-group row">       
                        <div class="col-sm-6 offset-sm-3">
                          <input type="submit" value="Save Data" class="btn btn-primary">
                        </div>
                      </div>
                    </form>
                </div>

            
    </div>

    @include('admin.footer')
  </body>
</html>
