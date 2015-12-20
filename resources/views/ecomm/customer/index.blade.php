@extends('ecomm.shop.layouts.shopstyle')
@section('content')

@include('ecomm.partials.shop1.breadcrumbs', ['breadcrumbs' => Breadcrumbs::render('customer')])

<br>
<div class="container">
	<?php $user = Sentinel::getUser(); ?>

	<div class="row">
		<div class="col-md-4">
			<div class="panel panel-default">
				<div class="col-md-12">
					<span>Welcome {{$user->first_name}}</span>
					<br><br>
					<div class="col-md-4">					
						<?php $profiles = App\Profile::where('user_id', '=', $user->id)->get(); ?>
						@foreach($profiles as $profile)
						<span>
							<img src="{{asset($profile->avatar)}}" class="img-thumbnail img-responsive" alt="no img">
						</span>					
						@endforeach
					</div>
					<div class="col-md-8">
						<span class="fa fa-user"> {{$user->first_name . ' ' . $user->last_name}}</span>
						<br>
						<span class="fa fa-envelope"> {{$user->email}}</span>
					</div>
				</div>

				<div class="col-md-6">
					<br>
					<a href="{{route('shop_home')}}" class="theme_button"><span class="fa fa-shopping-cart"></span> Shopping</a> 								
				</div>
				<div class="col-md-6">
					<br>
					<a href="{{route('shop_contact')}}" class="theme_button"><span class="fa fa-comments"></span> Message</a> 
				</div>
			</div>

		</div>


		<div class="col-md-8">
			<div id="product-tabs">
				<ul class="nav nav-tabs" role="tablist">
					<li class="active">
						<a href="#profile" role="tab" data-toggle="tab"><span class="fa fa-user"></span> Profile</a>
					</li>
					<li>
						<a href="#wishlist" role="tab" data-toggle="tab"><span class="fa fa-heart"></span> WishList <span class="badge badge-default">{{count($count_wishlist_product)}}</span></a>
					</li>
					<li>
						<a href="#cart" role="tab" data-toggle="tab"><span class="fa fa-shopping-cart"></span> Cart <span class="badge badge-danger">{{$cart_product->count()}}</span></a>
					</li>
					<li>
						<a href="#order" role="tab" data-toggle="tab"><span class="fa fa-truck"></span> Orders <span class="badge badge-danger">{{$orders->count()}}</span></a>
					</li>
					<li>
						<a href="#editprofile" role="tab" data-toggle="tab"><span class="fa fa-cog"></span> Edit Profile </a>
					</li>							
				</ul>
				<div class="col-md-12 tab-content">
					<div class="tab-pane fade in active" id="profile">						
						<div class="col-md-6">
							<span><strong>My Profile</strong></span>
							<br>
							<span class="fa fa-user"> {{$user->first_name . ' ' . $user->last_name}}</span>
							<br>
							<span class="fa fa-envelope"> {{$user->email}}</span>
						</div>
						<div class="col-md-6">
							<span><strong>Contact:</strong></span>
							<?php $profiles = App\Profile::where('user_id', '=', $user->id)->get(); ?>
							@foreach($profiles as $profile)
							<br>
							<span class="fa fa-phone"> {{$profile->phone}}</span>
							<br>
							<span class="fa fa-desktop"> {{$profile->company_name}} <strong>Company</strong></span>
							<br>
							<span class="fa fa-home"> {{$profile->street_address}} , {{$profile->home_address}}</span>
							<br>
							<span class="fa fa-dot-circle-o"> {{$profile->postcode}}</span>
							<br>
							<span class="fa fa-map-marker"> {{$profile->town}} , {{$profile->city}} , {{$profile->country}}</span>
							@endforeach
						</div>
					</div>
					<div class="tab-pane fade" id="wishlist">

						@if(empty($count_wishlist_product))
						<h1 class="text-center">Sorry Your Wishlist Is Empty!</h1>
						<br>
						@else
						<h5 class="text-right">Show Last <span class="badge"><h5>3</h5></span> Products From Your Wishlist</h5>
						<br>
						<ul class="media-list">
													
							@foreach($wishlist_product->take(3) as $wishlist_item)
							@if($wishlist_item->products->availability == 1)
							<li class="media">
								<a class="pull-left" href="{{route('shop_product_show', $wishlist_item->products->id)}}">
									<img src="{{asset($wishlist_item->products->image)}}" width="100" height="100">
								</a>
								<div class="media-body">
									<label for="title">Name:</label>
									<a href="{{route('shop_product_show', $wishlist_item->products->id)}}">{{$wishlist_item->products->title}}</a>
									
									<p class="excerpt">									
										<label for="color">Color:</label>
										@foreach($wishlist_item->products->colors as $colors)
										@foreach(App\Color::where('id', '=' , $colors->id)->get() as $color)
										<span class="badge badge-default">{{$color->name}}</span>
										@endforeach
										@endforeach
										<span class="pull-right">
											<strong>${{$wishlist_item->products->price}}</strong>	
										</span>

										<br>
										<label for="size">Size:</label>	
										@foreach($wishlist_item->products->sizes as $sizes)
										@foreach(App\Size::where('id', '=' , $sizes->id)->get() as $size)
										<span class="badge badge-default">{{$size->name}}</span>
										@endforeach
										@endforeach
									</p>

								</div>

							</li>
							<hr>

							@endif
							@endforeach

						</ul>
						
						<a href="{{route('wishlist_show')}}" class="theme_button"><span class="fa fa-heart"></span>See More Go To Wishlist</a> 								


						@endif

					</div>
					<div class="tab-pane fade" id="cart">						
						@if(!$cart_product->count())
						<h1 class="text-center">Sorry Your Cart Is Empty!</h1>
						<br>
						@else
						<h5 class="text-right">Show Last <span class="badge badge-default"><h5>3</h5></span> Products From Your Cart</h5>
						<br>
						<ul class="media-list">
							@foreach($cart_product->take(3) as $cart_item)
							<li class="media">
								<a class="pull-left" href="{{route('shop_product_show', $cart_item->products->id)}}">																
									<img src="{{asset($cart_item->Products->image)}}" width="100" height="100">
								</a>
								<div class="media-body">								
									<label for="title">Name:</label>
									<a href="{{route('shop_product_show', $cart_item->products->id)}}"> 
										{{$cart_item->Products->title}}
									</a>								
									<p class="excerpt">
										<label for="color">Color:</label>	
										@foreach(App\Color::where('id', '=' , $cart_item->color_id)->get() as $color)
										<span class="badge badge-default">{{$color->name}}</span>
										@endforeach
										<span class="pull-right">								
											<strong>${{$cart_item->products->price}} / product</strong>
										</span>					
										<label for="size">Size:</label>	
										@foreach(App\Size::where('id', '=' , $cart_item->size_id)->get() as $size)
										<span class="badge badge-default">{{$size->name}}</span>
										@endforeach
										<br>
										<span>
											<strong>Qty:{{$cart_item->amount}}</strong>
										</span>
										<br>
										<span>
											<strong>Total: $ {{$cart_item->products->price * $cart_item->amount}}</strong>
										</span>								
									</p>																
								</div>	
							</li>
							<hr>
							@endforeach
						</ul>
						<a href="{{route('cart_show')}}" class="theme_button"><span class="fa fa-shopping-cart"></span>See More Go To Cart</a>
						@endif
					</div>
					<div class="tab-pane fade" id="order">
						@if(!$orders->count())
						<h1 class="text-center">Sorry Your Don't Have Any Orders !!</h1>	

						@else
						
						@foreach($orders->take(3) as $order)
						<a href="#">Order #{{$order->id}} - {{Sentinel::getUser()->first_name}} - {{$order->created_at}}</a>
						@if($order->orderItems->count() == 1)
						<h5>Total {{$order->orderItems->count()}} Product</h5>
						@else
						<h5>Total {{$order->orderItems->count()}} Products</h5>
						@endif
						<table class="table table-bordered table-striped">
							<thead>
								<th>Title</th>
								<th>Amount</th>
								<th>Price</th>
								<th>Total</th>
							</thead>
							<tbody>
								@foreach($order->orderItems as $order_item)
								<tr>
									<td>{{$order_item->title}}</td>
									<td>{{$order_item->pivot->amount}}</td>
									<td>{{$order_item->pivot->price}}</td>
									<td>{{$order_item->pivot->total}}</td>
								</tr>
								@endforeach
								<tr>
									<td></td>
									<td></td>
									<td><strong>Total</strong></td>
									<td><strong>{{$order->total}}</strong></td>
								</tr>
							</tbody>
						</table>
						@endforeach
						<hr>
						<a href="{{route('order_show')}}" class="theme_button"><span class="fa fa-shopping-cart"></span>See More Go To Order List</a>
						@endif
					</div>
					<div class="tab-pane fade" id="editprofile">
						<div class="col-md-6">
							<span><strong><u>Edit Profile</u></strong></span>
							
							<form action="{{route('customer.update', $user->id )}}" method="POST" class="form-group">
								<input type="hidden" name="_method" value="PUT">
								<?php echo csrf_field(); ?>
								<label for="first_name" >First Name:</label>
								<input type="text" name="first_name" value="{{$user->first_name}}" class="form-control">
								<br>
								<label for="last_name">Last Name:</label>
								<input type="text" name="last_name" value="{{$user->last_name}}" class="form-control">
								<br>
								<label for="email">Email:</label>
								<input type="text" name="email" value="{{$user->email}}" class="form-control">
								<br>
								<button class="btn-sm btn-info" type="submit">Update Profile</button>
							</form>							
						</div>
						<div class="col-md-6">
							<span><strong><u>Contact:</u></strong></span>
							@include('ecomm.partials.required')							
							<?php $profiles = App\Profile::where('user_id', '=', $user->id)->get(); ?>
							@foreach($profiles as $profile)
							<form action="{{route('customer_profile_update', $profile->id )}}" method="POST" enctype="multipart/form-data" class="form-group">
								<input type="hidden" name="_method" value="PUT">
								<?php echo csrf_field(); ?>
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
								<label for="avatar">Change Profile Avatar</label>
								<input type="file" name="avatar" value="{{asset($profile->avatar)}}" />											
								<br>														
								<button class="btn-sm btn-info" type="submit">Update Contact</button>
							</form>																							
							@endforeach							
						</div> <!-- col-md-6 -->
					</div> <!-- tab-pane fade editprofile -->


				</div>	<!-- col-md-12 tab-content -->
			</div> <!-- product-tabs -->
		</div> <!-- end of col-md-8 -->

	</div> <!-- end of row -->
	<!-- Show Latest Products -->

	
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="widget widget_popular_entries">
					<br>
					<h4 class="widget-title">Latest Products</h4>								

					<div id="related-products-carousel" class="owl-carousel">

						@foreach($products as $product)
						@if($product->availability == 1)


						<div class="shop-product"> 
							<div class="product-wrapper">
								<div class="product-image">
									<a href=" {{route('shop_product_show', $product->id)}} ">
										@if($product->created_at > Carbon\Carbon::now()->subDays(2) || $product->order_count == 0)
										<span class="for-sale">New Product</span>

										@elseif($product->order_count <= 10)
										<span class="for-sale">{{$product->order_count}} Sale</span>
										@else
										<span class="for-sale">Hot Sale</span>
										@endif
										<img alt="" src="{{asset($product->image)}}" width="240" height="180">
									</a>
								</div>
								<br>
								<div class="product-details">								
																		
									<div class="col-xs-9 text-left">
										<h4><a href="{{route('shop_product_show', $product->id)}}">{{$product->title}}</a></h4>
										
										<div class="product-rating">
											@for ($i=1; $i <= 5 ; $i++)
											<span class="fa fa-star{{ ($i <= $product->rating_cache) ? '' : '-o'}}"></span>
											@endfor
										</div>
									</div>
									<form action="{{route('wishlist_add', $product->id)}}" method="POST">
										<?php echo csrf_field(); ?>
										<div class="col-xs-3 text-left">
											<div class="product-tools">
												<button class="btn btn-warning fa fa-heart" data-toggle="tooltip" title="Add to Wishlist"></button>                                           
											</div>
										</div>
									</form>
									
									
									<div class="col-xs-9 text-left">
										<div class="product-price">${{$product->price}}</div>
									</div>                                
									<div class="col-xs-3 text-left">                                                                                
										<a href="{{route('shop_product_show', $product->id)}}"><button class="btn btn-danger fa fa-shopping-cart" data-toggle="tooltip" title="Add to Cart"></button></a>
									</div>				
								</div>
							</div>
						</div>
						@endif
						@endforeach
					</div>
				</div>
			</div>
		</div>	
	</div>

	<!--End  Show Latest Products -->
</div> <!-- end of container -->


@include('ecomm.partials.script')
@stop