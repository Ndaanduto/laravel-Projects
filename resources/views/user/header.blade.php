<div class="header_section">
   <div class="header_main">
      <div class="mobile_menu">
         <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="logo_mobile"><a href="index.html"></a></div>
                  
                  
               </nav>
            </div>
                   <div class="container-fluid">
               
                       <div class="menu_main">
                           <ul>
                               <li class="active"><a href="index.html">Home</a></li>
                               <li><a href="about.html">About</a></li>
                               <li><a href="services.html">Services</a></li>
                               <li><a href="blog.html">Blog</a></li>
                               <li><a href="contact.html">Contact us</a></li>
                               <li>
                                @if (Route::has('login'))
               
                                @auth
                                <li><a href="{{'redirect'}}">Place Order</a></li>

                                <li><a href="{{'showcart'}}"><i class="fas fa-shopping-cart"></i>Cart[{{$count}}]</a></li>
                                <li><x-app-layout></x-app-layout></li>
                                @else
                                <a href="{{ route('login') }}" >Log in</a>

                                @if (Route::has('register'))
                                <a href="{{ route('register') }}" >Register</a>
                               @endif
                               @endauth
                
                               @endif
                             </li>
                           </ul>
                          </div>
                         </div>
                        </div>
        
                     </div>
                  </div>
               </div>
            </div>
         </nav>

      
      </div>  
    </div>  
</div>  
