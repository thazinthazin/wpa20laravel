@extends('ecomm.shop.layouts.shopstyle')
@section('content')
@include('ecomm.partials.shop1.header')
@include('ecomm.partials.shop1.breadcrumbs', ['breadcrumbs' => Breadcrumbs::render('cart')])



@if(!$cart_product->count())    
<h1 class="text-center">Sorry Your Cart Is Empty!</h1>
<br>
<form class="form-inline text-center">
    <div class="form-group">
        <a href="{{route('shop_home')}}" class="theme_button">Start Shopping</a>  
    </div>               
</form>

@else
<section class="light_section">
    <div class="container">   
        <div class="row">
            <table class="cart-table table table-bordered text-center">
                <tr >           
                    <th colspan="4" class="text-center">Show Product Details</th>            
                    <th class="text-center">Qty</th>
                    <th>Price</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
                @foreach($cart_product as $cart_item)             
                <tr>
                    <td>                       
                        <div class="product-image">
                            <a href="{{route('shop_product_show' , $cart_item->Products->id)}}">
                                <span class="for-sale">{{$cart_item->Products->instock}} Stock</span>
                                <img alt="insert pattern" src="{{asset($cart_item->Products->image)}}" width="120" height="120">
                            </a>
                        </div>                      
                    </td>
                    <td colspan="3">
                        <ul>                            
                         <div class="widget widget_tag_cloud">
                            <div class="tagcloud">
                                <a href="{{route('shop_product_show' , $cart_item->Products->id)}}">  {{$cart_item->Products->title}} </a>                        
                            </div>
                        </div>                  

                        @foreach(App\Color::where('id', '=' , $cart_item->color_id)->get() as $color)
                       
                        <span class="highlight">{{$color->name or 'default'}}</span> Color
                        @endforeach
                        - & -
                        @foreach(App\Size::where('id', '=' , $cart_item->size_id)->get() as $size)
                        
                        <span class="highlight">{{$size_name or 'default'}}</span> Size
                        @endforeach                        
                    </ul>
                </td>
                <td> 
                    <form action="{{route('cart_update', [$cart_item->id, $cart_item->Products->id])}}" method="POST" class="text-center">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="_method" value="PUT">                    
                        <span class="quantity form-group" name="amount">
                            <input type="button" value="-" class="minus">
                            <input type="number" step="1" min="0" name="amount" value="{{$cart_item->amount}}" class="form-control ">
                            <input type="button" value="+" class="plus">                                                                       
                        </span>
                        <span>
                            <button class="theme_button">Update</button>
                        </span>                    
                    </form>                
                </td>
                <td> ${{$cart_item->Products->price}} </td>
                <td> ${{$cart_item->total}} </td>
                <td>           
                  <form action="{{route('cart_delete', $cart_item->id)}}" method="POST">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="_method" value="DELETE">
                    <input class="btn btn-danger" onclick="return confirm('Are you sure?')" value="Delete" type="submit">
                </form>                                           
            </td>
        </tr>       
        @endforeach
        <tr>
                    
            <td colspan="6" class="text-right"><h4>Total -</h4></td>
            <td colspan="2" class="text-center"><h4>${{$cart_total}}</h4></td>
          
        </tr>
        <tr>
            <td colspan="8" class="text-left">
                <form class="form-inline">
                    <div class="form-group">
                        <a href="{{route('shop_home')}}" class="theme_button">Continue Shopping</a>  
                    </div>               
                </form>       
            </td>
        </tr>
        {!! $cart_product->render() !!}      
    </table>

    <h1>Add To Order List</h1>
     @include('ecomm.partials.errors')
    <div class="cart-collaterals">
     <?php $profiles = App\Profile::where('user_id', '=', Sentinel::getUser()->id)->get(); ?>
     @foreach($profiles as $profile)
     <form action="{{route('order_add')}}" method="POST">
        <?php echo csrf_field(); ?>    
        @include('ecomm.partials.required')                         
        <div class="panel-group" id="shipping-calculator-form">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#shipping-calculator-form" href="#shipping-calculator-collapse" class="">
                         Please Fill Your Shipping Address
                     </a>
                 </h4>
             </div>
             <div id="shipping-calculator-collapse" class="panel-collapse collapse in">
                <div class="panel-body">
                    <p>
                        <strong>You Can Use Your Profile Address Or Fill New Address</strong>
                    </p>
                    <span class="fa fa-phone"> Phone No:</span>
                    <input type="text" name="phone" value="{{(Input::old('phone')) ? Input::old('phone') : $profile->phone}}" class="form-control">
                    <br>
                    <span class="fa fa-desktop"> Company Name:</span>
                    <input type="text" name="company_name" value="{{(Input::old('company_name')) ? Input::old('company_name') : $profile->company_name}}" placeholder="Enter Your Company Name" class="form-control">
                    <br>
                    <span class="fa fa-home"> Address:</span>
                    <input type="text" name="street_address" value="{{(Input::old('street_address')) ? Input::old('street_address') : $profile->street_address}}" placeholder="Enter Your Street Address" class="form-control">
                    <br>
                    <input type="text" name="home_address" value="{{(Input::old('home_address')) ? Input::old('home_address') : $profile->home_address}}" placeholder="Enter Your Home Address" class="form-control">
                    <br>
                    <span class="fa fa-dot-circle-o"> Post Code:</span>
                    <input type="integer" name="postcode" value="{{(Input::old('postcode')) ? Input::old('postcode') : $profile->postcode}}" placeholder="Enter Your Post Code" class="form-control">
                    <br>
                    <span class="fa fa-map-marker"> Town/ City/ Country:</span>
                    <input type="text" name="town" value="{{(Input::old('town')) ? Input::old('town') : $profile->town}}" placeholder="Enter Your Town Name" class="form-control">
                    <br>
                    <input type="text" name="city" value="{{(Input::old('city')) ? Input::old('city') : $profile->city}}" placeholder="Enter Your City Name" class="form-control">
                    <br>
                    <input type="text" name="country" value="{{(Input::old('country')) ? Input::old('country') : $profile->country}}" placeholder="Enter Your Country Name" class="form-control">
                    <br>                                                             
                    <button class="btn btn-info">Place Order</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endforeach
</div> <!-- end of cart-collaterals -->
</div> <!-- end of row -->
</div> <!-- end of container -->
@include('ecomm.partials.shop1.copyright')
</section>
@endif
@stop