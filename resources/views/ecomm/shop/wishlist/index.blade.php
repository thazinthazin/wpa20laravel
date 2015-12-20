@extends('ecomm.shop.layouts.shopstyle')
@section('content')
@include('ecomm.partials.shop1.header')
@include('ecomm.partials.shop1.breadcrumbs', ['breadcrumbs' => Breadcrumbs::render('wishlist')])

@if(!$wishlist_product->count())    
<h1 class="text-center">Sorry Your Wishlist Is Empty!</h1>
<br>
<form class="form-inline text-center">
	<div class="form-group">
		<a href="{{route('shop_home')}}" class="theme_button">Start Shopping</a>  
	</div>               
</form>
@else
<div class="container">	
	<table class="cart-table table table-bordered">
		<tr>           
			<th colspan="4" class="text-center">Show Product Details</th>            

			<th>Price</th>			
			<th colspan="2">Actions</th>			
		</tr>
		
		@foreach($wishlist_product as $wishlist_item)
		@if($wishlist_item->products->availability)		
		<tr>
			<td class="text-center">
				<div class="product-image">
					<a href="{{route('shop_product_show' , $wishlist_item->products->id)}}">
						<span class="for-sale">{{$wishlist_item->products->instock}} Stock</span>
						<img alt="insert pattern" src="{{asset($wishlist_item->products->image)}}" width="120" height="120">
					</a>					
				</div>                 
			</td>
			<td>
				<div class="widget widget_tag_cloud">
					<div class="tagcloud">
						<a href="{{route('shop_product_show' , $wishlist_item->products->id)}}">{{$wishlist_item->products->title}}</a>                        
					</div>
				</div> 
			</td>
			<td>
				@foreach($wishlist_item->products->colors as $colors)

				<li>
					
					@foreach(App\Color::where('id', '=' , $colors->id)->get() as $color)
					<span class="badge badge-default">{{$color->name or 'None'}}</span>
					@endforeach

				</li>
				@endforeach

			</td>
			<td>
				@foreach($wishlist_item->products->sizes as $sizes)
				
				<li>					
					@foreach(App\Size::where('id', '=' , $sizes->id)->get() as $size)
					<span class="badge badge-default">{{$size->name or 'None'}}</span>
					@endforeach
				</li>


				@endforeach
			</td>

			<td> ${{$wishlist_item->products->price}} </td>
			
			<td>

				<a href="{{route('shop_product_show', $wishlist_item->products->id)}}"> <button class="btn btn-danger fa fa-shopping-cart" data-toggle="tooltip" title="Add to Cart"></button></a>           
			</div>
			
			
		</td>

		<td>
			<form action="{{route('wishlist_delete', $wishlist_item->id)}}" method="POST">
				<?php echo csrf_field(); ?>
				<input type="hidden" name="_method" value="DELETE">
				<input class="btn btn-danger" onclick="return confirm('Are you sure?')" value="Delete" type="submit">
			</form>                                           				
		</td>
	</tr>
	@endif
	@endforeach

	<tr>
		<td colspan="8">
			<form class="form-inline">
				<div class="form-group">
					<a href="{{route('shop_home')}}" class="theme_button">Continue Shopping</a>  
				</div>               
			</form>       
		</td>
	</tr>
	{!! $wishlist_product->render() !!}      
</table>

</div>

@endif

@endsection

