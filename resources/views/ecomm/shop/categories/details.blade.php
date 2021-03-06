@extends('ecomm.shop.layouts.shopstyle')
@section('content')
@include('ecomm.partials.shop1.top_info')
@include('ecomm.partials.shop1.header')
@include('ecomm.partials.shop1.breadcrumbs', ['breadcrumbs' => Breadcrumbs::render('category', $category) ])

<section class="light_section">
	<div class="container">
	<div class="row text-center">		
		<strong class="section_header text-center">{{$category->name}}</strong>
	</div>
		<div class="row">		
			@foreach($category->subcategories as $subcategory)
									
						<?php $product_subcategory = App\Product::where('subcatgeory_id', '=' , $subcategory->id)->where('availability', '=' , 1); ?>
						@if($product_subcategory->count())
						<strong class="section_header text-right"><a href="{{route('shop_subcategories_show', $subcategory->id)}}">{{$subcategory->sub_name}} </a> - Total {{$product_subcategory->count()}} Products</strong>
						@endif
						<hr>
						<div class="col-md-12">
							<div class="panel panel-default">
								<div class="owl-carousel">
						@foreach(App\Product::where('subcatgeory_id', '=' , $subcategory->id)->where('availability', '=' , 1)->get() as $product)
						<div class="shop-product"> 
							<div class="product-wrapper">
								<div class="product-image">
									<a href=" {{route('shop_product_show', $product->id)}} ">
										@if($product->order_count >= 15)                           
										<span class="for-sale"><span class="fa fa-star"> Hot</span></span>
										@elseif($product->order_count >= 1)
										<span class="for-sale">{{$product->order_count}} Sale</span>
										@elseif($product->created_at > Carbon\Carbon::now()->subDays(3) || $product->order_count == 0)
										<span class="for-sale">New Product</span>                                    
										@endif
										<img alt="insert pattern" src="{{asset($product->image)}}" width="350" height="350">
									</a>
								</div>
								<div class="product-details">
									<h4 class="product-title">
										<a href="{{route('shop_product_show', $product->id)}}">{{$product->title}}</a>
									</h4>                              
									<div class="row">
										<div class="col-xs-8 text-left">
											<div class="product-rating">
												@for ($i=1; $i <= 5 ; $i++)
												<span class="fa fa-star{{ ($i <= $product->rating_cache) ? '' : '-o'}}"></span>
												@endfor
											</div>    
											<div class="product-price">${{$product->price}}</div>
											<p>
												{{Str::limit($product->description, 80)}}
											</p>
										</div>
										<div class="col-xs-4">
											<form action="{{route('wishlist_add', $product->id)}}" method="POST">
												<?php echo csrf_field(); ?>
												<div class="product-tools">
													<button class="btn btn-warning fa fa-heart" data-toggle="tooltip" title="Add to Wishlist"></button>                                            
												</div>
											</form>
											{{-- Break Form --}}
											<form action="{{route('cart_add', $product->id)}}" method="POST">
												<?php echo csrf_field(); ?>

												<span>
													<button class="btn btn-danger fa fa-shopping-cart" data-toggle="tooltip" title="Add to Cart"></button>
												</span> 
											</div>
											{{-- Form Move To Up For Add To Cart --}}
											<div class="col-xs-4">                                        
												<strong> Color:</strong> 
												<select class="form-control" name="color_id">
													@foreach($product->colors as $color)
													@if($color->name != null)
													<option value="{{$color->id}}" selected="">{{$color->name}}</option>
													@else
													<option selected="selected">None</option>
													@endif
													@endforeach
												</select>                                
											</div>
											<div class="col-xs-4">
												<strong> Size:</strong> 
												<select class="form-control" name="size_id">
													@foreach($product->sizes as $size)
													@if($size->name != null)
													<option value="{{$size->id}}" selected="">{{$size->name}}</option>
													@else
													<option value="1" selected="selected">None</option>
													@endif
													@endforeach
												</select>                           
											</div>
											<div class="col-xs-4">                                                
												<input type="hidden" name="product" value="{{$product->id}}">
												<br>
												<span class="quantity form-group" name="amount">
													<input type="button" value="-" class="minus">
													<input type="number" step="1" min="0" name="amount" value="1" class="form-control ">
													<input type="button" value="+" class="plus">
												</span>                                                                
											</div>
										</form>                                 
									</div>  <!-- End of Row -->                          
								</div> <!-- end of product details -->
							</div> <!-- product-wrapper --> 
						</div>  <!-- end of shop-product --> 
						@endforeach
					</div> <!-- owl-carousel -->
				</div> <!-- panel panel-default -->
			</div> <!-- col-md-12 -->
			@endforeach
		</div> <!-- row -->
	</div> <!-- container -->
</section>
@include('ecomm.partials.shop1.footer')
@include('ecomm.partials.shop1.copyright')
@stop