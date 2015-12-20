<div class="widget widget_popular_entries">
  <h3 class="widget-title">Best Selling</h3>

  <ul class="media-list">
    @foreach(App\Product::take(8)->orderBy( 'order_count', 'DESC' )->get() as $product)
    <li class="media">
      <a class="pull-left" href="{{route('shop_product_show', $product->id)}}">
        <img class="media-object" src="{{asset($product->image)}}">
      </a>
      <div class="media-body">
        <p class="media-heading">
          <a href="{{route('shop_product_show' , $product->id)}}">{{$product->title}}</a>                    
        </p>
        <div class="product-rating">
        <span>Total {{$product->order_count}} Sale</span>
       </div>                
     </div>           
   </li>
   @endforeach               
 </ul> 

</div>