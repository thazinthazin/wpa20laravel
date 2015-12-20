 <section id="topline" class="grey_section">
    <div class="container">
        <div class="row">

      
            <div class="col-md-10 text-right">                
                @if(!Sentinel::check())
                <span>
                    <i class="rt-icon-user2"></i> <a href="{{route('customer_login')}}">Login</a>                    
                </span>               
                <span>
                    <i class="rt-icon-locked"></i> <a href="{{route('customer_create')}}">Register</a>
                </span>
                @else
                <span>
                    <i class="rt-icon-user3"></i><a href="{{route('customer.index')}}"> {{ Sentinel::getUser()->first_name }}</a>
                </span>
                <span>                   
                    <i class="rt-icon-shopping-cart"></i> <a href="{{route('cart_show')}}">Cart</a>                   
                </span>
                <span>                   
                    <i class="rt-icon-truck"></i> <a href="{{route('order_show')}}">Order</a>                   
                </span>
                 <span>                   
                    <i class="rt-icon-heart"></i> <a href="{{route('wishlist_show')}}">Wishlist</a>                   
                </span>
                <span>
                    <i class="rt-icon-unlocked"></i> <a href="{{route('customer_logout')}}">Logout</a>
                </span>                
                @endif
            </div>
            
            <span class="divider20" title="MUST LOG-OUT USER" data-toggle="tooltip-buttom"><a href="/admin/backend/login" class="theme_button">Go To BackEnd</a></span>
        </div>
    </div>
</section>