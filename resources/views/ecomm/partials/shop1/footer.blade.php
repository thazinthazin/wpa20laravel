 <footer id="footer" class="darkgrey_section">
        <div class="container">
            <div class="row">

                <div class="col-md-4 col-sm-6 to_animate">
                    <div class="widget widget_text">
                        <h3 class="widget-title">Info</h3>
                        <div class="textwidget">
                                <p>
                                    <i class="rt-icon-home2"></i> <a href="{{route('home')}}">Home</a>
                                </p>
                                <p>
                                    <i class="rt-icon-shop"></i> <a href="{{route('shop_home')}}">Shop</a>
                                </p>
                                @if(!Sentinel::check())                                
                                <p>
                                    <i class="rt-icon-user2"></i> <a href="{{route('customer_login')}}">Login</a>
                                </p>
                                <p>
                                    <i class="rt-icon-locked"></i> <a href="{{route('customer_create')}}">Register</a>
                                </p>
                                @else
                                <p>
                                    <i class="rt-icon-user4"></i><a href="{{route('customer.index')}}"> {{ Sentinel::getUser()->first_name . ' ' . Sentinel::getUser()->last_name }}</a>
                                </p>
                                <p>
                                    <i class="rt-icon-shopping-cart"></i> <a href="{{route('cart_show')}}">Cart</a> 
                                </p>
                                <p>
                                     <i class="rt-icon-heart"></i> <a href="{{route('wishlist_show')}}">Wishlist</a> 
                                </p>
                                <p>
                                    <i class="rt-icon-truck"></i> <a href="{{route('order_show')}}">Order</a>
                                </p>
                                <p>
                                    <i class="rt-icon-unlocked"></i> <a href="{{route('customer_logout')}}">Logout</a>
                                </p>
                                @endif

                        </div>
                    </div>
                </div>
                                        
                
             

                <div class="col-md-4 col-sm-6 to_animate">
                    <div class="widget widget_categories">
                        <h3 class="widget-title">Categories</h3>
                        <ul>
                            @foreach($categories = App\Category::get()->take(5) as $category)
                            @if(App\Product::where('category_id', '=' , $category->id)->count())                  
                           
                            <li>
                                <a href=" {{route('shop_categories_show', $category->id)}} ">{{$category->name}}</a>
                            </li>
                           
                            @endif                                                               
                            @endforeach                            
                        </ul>
                    </div>
                </div>


               
                <div class="col-md-4 col-sm-6 to_animate">
                    <div class="widget widget_mailchimp">
                        <h3 class="widget-title">Quick Message</h3>
                            @include('ecomm.partials.required')
                            @include('ecomm.partials.errors')
                        <p>You Must Need To Login And Enter What You Want...</p>                        
                            <form action="{{route('shop_post_contact')}}" method="post" class="form-inline">
                                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                            <div class="form-group">                                
                                <textarea name="message" id="message" cols="40" rows="5" class="form-control">{{old('message')}}</textarea>
                            </div>
                            <br><br>
                            <button type="submit" class="theme_button">Send</button>                           
                        </form>
                    </div>

                </div>
                    
                    
                
            
            </div>
        </div>
    </footer>


