<div class="widget widget_popular_entries">
    <h3 class="widget-title">Popular Products</h3>

    <ul class="media-list">
    @foreach(App\Product::where('availability' , '=' , 1)->take(5)->orderBy( 'rating_cache', 'DESC' )->get() as $product)
        <li class="media">
            <a class="pull-left" href="{{route('shop_product_show', $product->id)}}">
                <img class="media-object" src="{{asset($product->image)}}">
            </a>
            <div class="media-body">
                <p class="media-heading">
                    <a href="{{route('shop_product_show', $product->id)}}">{{$product->title}}</a>
                </p>
                <p class="excerpt"></p>
                <div class="product-rating">
                   @for ($i=1; $i <= 5 ; $i++)
                   <span class="fa fa-star{{ ($i <= $product->rating_cache) ? '' : '-o'}}"></span>
                   @endfor
               </div>
           </div>
       </li>
       @endforeach               
   </ul> 

</div>