<div class="services_section layout_padding">
         <div class="container">
            <h1 class="services_taital" align="center">Our Services </h1>
            <form action="{{url('search')}}" method="get" class="form-inline" style="float:right;padding:10px;" >
              @csrf
            <input type="search" name="search" placeholder="search" class="form-control" >

           <input type="submit" value="search" class="btn btn-success">
          </form>
            <div class="services_section_2">
               <div class="row">
                  @foreach($data as $data)
                  <div class="col-md-4">
                     <div><img src="postimages/{{$data->image}}" style="width: 400px;height: 250px;" class="services_img"></div>
                     <p class="services_text">{{$data->product}}</p>
                     <strong><p class="services_text" >${{$data->price}}</p></strong>
                     <p class="services_text">{{$data->description}}</p>
                     

                     <form action="{{url('addcart',$data->id)}}" method="post">
                        @csrf
                        <input type="number" name="quantity" style="width: 100px;" class="form-control" value="1" min="1">
                        <input type="submit" value="Add Cart" class="btn btn-primary">
                     </form>
                  </div>
                 @endforeach
               </div>
            </div>
         </div>
      </div>