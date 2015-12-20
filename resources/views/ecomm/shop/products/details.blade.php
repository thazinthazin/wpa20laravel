@extends('ecomm.shop.layouts.shopstyle')
@section('content')
@include('ecomm.partials.shop1.top_info')
@include('ecomm.partials.shop1.header')
@include('ecomm.partials.shop1.breadcrumbs', ['breadcrumbs' =>  Breadcrumbs::render('product_show', $product)])


<section class="light_section">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="row">
				@if($product->availability == 1)
					<div class="col-sm-4">
						<div class="product-image">
							@if($product->order_count >= 15)                           
							<span class="for-sale"><span class="fa fa-star"> Hot Item</span></span>
							@elseif($product->order_count >= 1)
							<span class="for-sale">{{$product->order_count}} Sale</span>
							@elseif($product->created_at > Carbon\Carbon::now()->subDays(3) || $product->order_count == 0)
							<span class="for-sale">New Product</span>                                    
							@endif						
							<img id="product-image" src="{{asset($product->image)}}" data-zoom-image="{{asset($product->image)}}" alt="">
							<hr>
							<div id="product-image-gallery" class="row">
								<div class="col-xs-4">
									<a href="#" data-image="{{asset($product->image)}}" data-zoom-image="{{asset($product->image)}}">
										<img id="img_02" src="{{asset($product->image)}}" alt="">
									</a>
								</div>
								{{-- Add Others Images --}}
							{{-- <div class="col-xs-4">
									<a href="#" data-image="/assets/shop/example/shop/03.jpg" data-zoom-image="/assets/shop/example/shop/03.jpg">
										<img id="img_03" src="/assets/shop/example/shop/03.jpg" alt="">
									</a>
								</div>
								<div class="col-xs-4">
									<a href="#" data-image="/assets/shop/example/shop/04.jpg" data-zoom-image="/assets/shop/example/shop/04.jpg">
										<img id="img_04" src="/assets/shop/example/shop/04.jpg" alt="">
									</a>
								</div> --}}
							</div>
							<hr>
						</div>
					</div>

					<div class="col-sm-8 single-product-description">
						<div class="product-sdescr">
							<h2><strong> {{$product->title}} </strong></h2>				
						</div>
						<div class="product-prices">
							<div class="row">
								<div class="col-xs-6">
									<span class="product-price">${{$product->price}}</span>
								</div>
								<div class="col-xs-6 text-right">
									<i class="fa fa-suitcase"></i>
									<span><strong>{{$product->instock}}</strong> Items in Stock</span> 
								</div>
							</div>
						</div>
						<div class="product-rating"> 
							<div class="row">
								<div class="col-xs-6">
									@for ($i=1; $i <= 5 ; $i++)
									<span class="fa fa-star{{ ($i <= $product->rating_cache) ? '' : '-o'}}"></span>
									@endfor
									{{($product->rating_cache)}} stars 
									
								</div>
								<form id="addwishlist" action="{{route('wishlist_add', $product->id)}}" method="POST">
									<?php echo csrf_field(); ?>



									<div class="col-xs-6 text-right pull-right">										
										<span>																					
											<button class="btn btn-warning fa fa-heart" data-toggle="tooltip" title="" data-original-title="Add to Wishlist"></button>										
										</span>

									</div>
								</form>	
							</div>
						</div>

						<div class="product-vars"> 
							<form action="{{route('cart_add', $product->id)}}" method="POST">
								<?php echo csrf_field(); ?>
								<strong>
									Color:
								</strong> 
								<select class="form-control" name="color_id">
									@foreach($product->colors as $color)
									@if($color->name != null)
									<option value="{{$color->id}}" selected="">{{$color->name}}</option>
									@else
									<option value="1" selected="selected">None</option>
									@endif
									@endforeach
								</select>
								
								<strong>
									Size:
								</strong> 
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
							
							<div class="add-tocart form-inline">
								<input type="hidden" name="product" value="{{$product->id}}">
								<span class="quantity form-group" name="amount">
									<input type="button" value="-" class="minus">
									<input type="number" step="1" min="0" name="amount" value="1" class="form-control ">
									<input type="button" value="+" class="plus">
								</span>								
								<span>
									<button class="btn btn-danger fa fa-shopping-cart" data-toggle="tooltip" title="" data-original-title="Add to Cart"></button>	
								</span>
							</div>
						</form>						
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<div id="product-tabs">
						<ul class="nav nav-tabs" role="tablist">
							<li class="active">
								<a href="#product-description" role="tab" data-toggle="tab">Description</a>
							</li>
							<li>
								<a href="#product-specifications" role="tab" data-toggle="tab">Specifications</a>
							</li>
							<li>
								<a href="#product-reviews" role="tab" data-toggle="tab">Reviews</a>
							</li>							
						</ul>
						<div class="tab-content">
							<div class="tab-pane fade in active" id="product-description">
								<p>
									{{$product->description}}
								</p>
							</div>
							<div class="tab-pane fade" id="product-specifications">
								<h4><strong>Specifications For </strong>Product Name</h4>
								<table class="table table-striped table-bordered">
									<tbody>
										<tr>
											<th colspan="2">General</th>
										</tr>
										<tr>
											<td>Product Title: </td>
											<td>{{$product->title}}</td>
										</tr>										
										<tr>
											<td>Brand:</td>
											<td><a href="{{route('shop_categories_show', $product->category_id)}}">
												@foreach(App\Category::where('id', '=' , $product->category_id)->get() as $category)
												{{$category->name}}
												@endforeach
											</a></td>
										</tr>
										
										<tr>
											<td>Size:</td>
											<td>												
												@foreach($product->sizes as $size)
												@if($size->name != null)
												<li>
													{{$size->name}}
													@else
													None
												</li>
												@endif												
												@endforeach
											</td>
										</tr>
										<tr>
											<td>Color:</td>
											<td>
												@foreach($product->colors as $color)
												@if($color->name != null)
												<li>
													{{$color->name}}
													@else
													None
												</li>
												@endif	
												@endforeach
											</td>
										</tr>										
										<tr>
											<td>Targeted Group:</td>
											<td>
												<a href="{{route('shop_subcategories_show', $product->subcatgeory_id)}}">
													@foreach(App\SubCategory::where('id', '=' , $product->subcatgeory_id)->get() as $subcategory)
													{{$subcategory->sub_name}}
													@endforeach
												</td>
											</tr>
										</tbody>
									</table>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel reprehenderit molestiae iure officiis sapiente quaerat enim tenetur dolorum expedita provident, eaque incidunt, libero natus itaque rerum perferendis. Perferendis, dolores, ea.</p>
								</div>

								<!-- Reviews Panel -->
								<div class="tab-pane fade" id="product-reviews">
									<div class="reviews">
										<div class="hidden">
											<p class="hint hintMargin">This item has no reviews yet. Be the first one and review it now:</p>
											<p><a class="theme_button">Write a Review</a></p>
										</div>
										<div class="text-right">
											<h5>This item has avarage rating <span class="highlight"><strong></strong>{{$product->rating_cache, 1}}</span> based on {{$product->rating_count}} reviews: </h5>
											<div class="product-rating">
												@for ($i=1; $i <= 5 ; $i++)
												<span class="fa fa-star{{ ($i <= $product->rating_cache) ? '' : '-o'}}"></span>
												@endfor
												{{ number_format($product->rating_cache, 1)}} stars 
											</div>
										</div>



										<div class="comments-area" id="comments">
											<h4 class="comments-title">Total {{$product->rating_count}} Reviews</h4>
											<ol class="comment-list">
												<li class="comment even thread-even depth-1 parent">
													<article class="comment-body media">
														@foreach($reviews as $review)
														<a class="pull-left">
															@if(count($review->user))
															@foreach(App\Profile::where('user_id', '=' , $review->user->id)->get() as $profile)
															<img class="media-object" alt="" src="{{asset($profile->avatar)}}">
															@endforeach 
															@else
															<img class="media-object" alt="" src="/assets/shop/example/No-User.png">
															@endif
														</a>
														<div class="media-body">
															<div class="comment-meta">
																<a class="author_url" rel="external nofollow">{{ $review->user ? $review->user->first_name : 'Anonymous'}}</a>
																<span class="product-rating">
																	@for ($i=1; $i <= 5 ; $i++)
																	<span class="fa fa-star{{ ($i <= $review->rating) ? '' : '-o'}}"></span>
																	@endfor
																</span>
																<span class="date">

																	<time class="entry-date">{{$review->updated_at}}</time>
																</span>
																
															</div>                              
															<p>{{$review->comment}}</p>
														</div>
														@endforeach
													</article>
													<!-- .comment-body -->												
												</li>
												<!-- #comment-## -->											
											</ol>
											<!-- .comment-list -->
											<div class="row">
												<div class="col-sm-12 text-center">
													<ul class="pagination">

														<li>{!! $reviews->render() !!}</li>

													</ul>
												</div>
											</div>


										</div>
										<!-- #comments -->


										<div class="comment-respond" id="respond">
											<h3>Leave a Review</h3>
											<form class="comment-form" id="commentform" method="post" action="{{route('shop_addreview', $product->id)}}">
												<?php echo csrf_field(); ?>
												
												<p class="comment-form-rating">

													<select class="form-control" name="rating">
														<option selected="selected">5</option>
														<option>4</option>
														<option>3</option>
														<option>2</option>
														<option>1</option>
													</select>

												</p>
												<p class="comment-form-comment">
													<label for="comment">Review</label>
													<textarea aria-required="true" rows="8" cols="45" name="comment" id="comment" class="form-control" placeholder="Comment"></textarea>
												</p>
												<p class="form-submit">
													<button type="submit" id="submit" name="submit" class="theme_button"><i class="fa fa-comment"></i> Leave a Review</button>
												</p>
											</form>
										</div>
										<!-- #respond -->   




									</div>
								</div>
								
								
							</div>
						</div>
					</div>
				</div>

				<!-- Start Simliar Products Show -->
				<div class="row">
					<div class="col-md-12">
						<div class="panel panel-default">
							<div class="widget widget_popular_entries">
								<br>
								<h4 class="widget-title">Similar Products</h4>
								
								<div id="related-products-carousel" class="owl-carousel">                 
									@foreach(App\SubCategory::where('id', '=' , $product->subcatgeory_id)->get() as $subcategory)

									<?php $product_similars = App\SubCategory::where('sub_name', '=' , $subcategory->sub_name)->get(); ?>

									@foreach($product_similars as $product_similar)

									<?php $products = App\Product::where('subcatgeory_id', '=' , $product_similar->id)->get(); ?>

									@foreach($products as $product_new)
									@if($product_new->availability == 1)

									@if($product_new->id != $product->id)

									<div class="shop-product">
										<div class="product-wrapper">
											<div class="product-image">
												<a href=" {{route('shop_product_show', $product_new->id)}} ">
													@if($product_new->order_count >= 15)                           
													<span class="for-sale"><span class="fa fa-star"> Hot Item</span></span>
													@elseif($product_new->order_count >= 1)
													<span class="for-sale">{{$product_new->order_count}} Sale</span>
													@elseif($product_new->created_at > Carbon\Carbon::now()->subDays(3) || $product->order_count == 0)
													<span class="for-sale">New Product</span>                                    
													@endif
													<img alt="" src="{{asset($product_new->image)}}" width="240" height="180">
												</a>
											</div>
											<div class="product-details">
												<h4 class="product-title">
													<a href="{{route('shop_product_show', $product_new->id)}}">{{$product_new->title}}</a>
												</h4>
												<div class="row">
													<div class="col-xs-8 text-left">
														<div class="product-rating">
															@for ($i=1; $i <= 5 ; $i++)
															<span class="fa fa-star{{ ($i <= $product_new->rating_cache) ? '' : '-o'}}"></span>
															@endfor
														</div>
													</div>
													<form action="{{route('wishlist_add', $product_new->id)}}" method="POST">
														<?php echo csrf_field(); ?>
														<div class="col-xs-4 text-right">
															<div class="product-tools">
																<button class="fa fa-heart" data-toggle="tooltip" title="Add to Wishlist"></button>                                            
															</div>
														</div>
													</form>
												</div>

												<div class="row">
													<div class="col-xs-4 text-left">
														<div class="product-price">${{$product_new->price}}</div>
													</div>                                
													<div class="col-xs-8 text-right">                                                                                
														<a href="{{route('shop_product_show', $product_new->id)}}"><button>Add To Cart</button></a>
													</div>
												</div>
											</div>
										</div>
									</div>
									@endif
									@endif
									@endforeach
									@endforeach 
									@endforeach
								</div> <!-- end of related-products-carousel -->
							
							</div> <!-- end of widget widget_popular_entries -->
						</div> <!-- end of panel panel-default -->
					</div> <!-- end of col-md-12 -->
				</div>
				<!-- End of Similar Products -->



			</div> <!-- div-col-sm-12 -->
			@endif
		</div> <!-- row -->
	</div>	<!-- container -->
</section>
@include('ecomm.partials.shop1.footer')
@include('ecomm.partials.shop1.copyright')
@include('ecomm.partials.script')
@stop


