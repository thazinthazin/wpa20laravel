@extends('ecomm.shop.layouts.shopstyle')
@section('content')
@include('ecomm.partials.shop1.top_info')
@include('ecomm.partials.shop1.header')
<section class="light_section">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h2 class="section_header to_animate">Welcome To <span class="highlight">Wpa20 Students</span> SHOP</h2>
                <p class="to_animate">We Created This Page Use Laravel Framework</p>
            </div>
        </div>
        <div class="row">          
            <div class="col-sm-12 to_animate" data-animation="fadeInRight">
                <div class="widget widget_text">
                    <h3 class="topmargin0">Looks Great Everywhere</h3>
                    <p>ယခုျပဳလုပ္ထားေသာ Web Page အား Laravel Framework အားအသုံးျပဳထားၿပီး
                    	Myanmar Links WPA20-Students မ်ားမွ တည္ေဆာက္ထားျခင္းျဖစ္ပါသည္။
                    	Front End Template ကို Bootstrap Themes Template ထဲမွ y_shop Template အား
                    	laravel blade view အျဖစ္ ေျပာင္းလဲအသုံးျပဳထားျခင္းျဖစ္ပါသည္။
                    	အေသးစိတ္ျပဳလုပ္ထားေသာ Front End & Back End မ်ားမွာ ....</p>
                    

                        <div class="row">
                            <div class="col-sm-6">
                                <h4>Frond End List</h4>
                                <ul class="list1">
                                    <li>Categories</li>
                                    <li>SubCategories</li>
                                    <li>Products</li>
                                    <li>Cart</li>
                                    <li>Wish_List</li>
                                    <li>User Register</li>
                                    <li>User Login</li>
                                    <li>Social Login</li>
                                    <li>Contact Email</li>
                                    <li>Search Box</li>
                                    <li>Filter Box</li>
                                </ul>  
                                
                            </div>
                            <div class="col-sm-6">
                                <h4>Back End List</h4>
                                <ul class="list1">
                                    <li>CRUD Categories</li>
                                    <li>CRUD SubCategories</li>
                                    <li>CRUD Products</li>
                                    <li>CRUD User Management</li>
                                    <li>Login/Logout With Sentienl</li>
                                    <li>Social Login With Socialize</li>                                    
                                    <li>Order Management</li>
                                    <li>Upload Manager</li>
                                    <li>So Many Others</li>
                                </ul>  
                            </div>
                        </div>
                </div>
            </div>
            
        </div> 
        <div class="row">
            <hr>
            <div class="col-sm-12 text-center to_animate">                
                <h2 class="section_header text-center">To See Our Shop</h2>              
                <p class="divider20"><a href="{{route('shop_home')}}" class="theme_button">Go To Shop</a> - OR - <a href="/admin/backend/login" class="theme_button">Go To BackEnd</a></p>
                                
            </div>
        </div> 
    </div>
</section>

<section class="grey_section">
    <div class="container">
        <div class="row">
            <div class="col-sm-4 to_animate">
                <div class="teaser">
                    <div class="teaser_icon">
                        <i class="rt-icon-users"></i>
                    </div>
                    <div class="teaser_description">
                        <h3>Who We Are?</h3>
                        
                        <p><a href="{{route('about')}}" class="theme_button">Know More</a></p>
                    </div>
                </div>

            </div>


            <div class="col-sm-4 to_animate">

                <div class="teaser">
                    <div class="teaser_icon">
                        <i class="rt-icon-clock"></i>
                    </div>
                    <div class="teaser_description">
                        <h3>What Our Services?</h3>                        
                        <p><a href="{{route('about')}}" class="theme_button">Know More</a></p>
                    </div>
                </div>

            </div>


            <div class="col-sm-4 to_animate">

                <div class="teaser">
                    <div class="teaser_icon">
                        <i class="rt-icon-ok"></i>
                    </div>
                    <div class="teaser_description">
                        <h3>How We Learn?</h3>                        
                        <p><a href="{{route('about')}}" class="theme_button">Know More</a></p>
                    </div>
                </div>

            </div>
                

            
        </div>
    </div>
</section>

@include('ecomm.partials.shop1.footer')
@include('ecomm.partials.shop1.copyright')
@endsection