@extends('ecomm.shop.layouts.shopstyle')
@section('content')
@section('link')
<link rel="stylesheet" href="/src/css/select2.min.css">
@endsection
@include('ecomm.partials.shop1.top_info')
@include('ecomm.partials.shop1.header')
@include('ecomm.partials.shop1.breadcrumbs', ['breadcrumbs' => Breadcrumbs::render('shop')])


  <section class="light_section">
    <div class="container">
        @include('ecomm.partials.shop1.products_filter_')   
        <div class="row">        
            <div class="col-md-8 col-lg-9 col-sm-push-4 col-md-push-4 col-lg-push-3">
              <div id="product_listing">                   
                <div class="row">
                    @if (!$products->count())
                    <br>
                    <h1>No results found, sorry ....</h1>
                    <br><br><br><br><br><br><br><br><br><br><br><br>
                    <br><br><br><br><br><br><br><br><br><br><br><br>
                    
                    @else                
                    @foreach($products as $product)
                    @if($product->availability == 1)                  
                    <div class="col-sm-4 shop-product"> 
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
                                    <img alt="insert pattern" src="{{asset($product->image)}}" width="280" height="280">
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
                                           {{Str::limit($product->description, 15)}}
                                           
                                       </p>
                                   </div>
                                   <div class="col-xs-4 text-right">
                                    <form action="{{route('wishlist_add', $product->id)}}" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <div class="product-tools">
                                            <button class="btn btn-warning fa fa-heart" data-toggle="tooltip" title="Add to Wishlist"></button>                                            
                                        </div>
                                    </form>
                                    <a href="{{route('shop_product_show', $product->id)}}"> <button class="btn btn-danger fa fa-shopping-cart" data-toggle="tooltip" title="Add to Cart"></button></a>
                                </div>
                            </div>                              
                        </div>
                    </div>
                </div>
                @endif                     
                @endforeach                    
                @endif                   

            </div> <!-- end of row -->
        </div> <!-- end of product_listing -->            

        <!-- Start Show Products With Categoriess -->
        <br>           
        <h3>Show Products By Brands</h3>

        @foreach($categories as $category)
        <?php $product_slides = App\Product::where('category_id', '=' , $category->id)->orderBy('rating_cache', 'DESC')->get()->take(3); ?> 

        <?php $products = App\Product::where('category_id', '=' , $category->id)->get(); ?>                             
        @if(App\Product::where('category_id', '=' , $category->id)->count())

        <hr>
        <div class="col-md-12 text-center">
            <strong class="section_header text-center"> <a href="{{route('shop_categories_show', $category->id)}}">{{$category->name}}</a></strong>          
        <br><br>
        </div>



        <div class="row text-center">
            <div class="col-sm-8">                    
                <div class="project-gallery">
                    <div class="flexslider">
                        <ul class="slides">
                            @foreach($product_slides as $product_slide)            
                            <li>
                                <img alt="no image" src="{{asset($product_slide->image)}}" width="550" height="550" />
                            </li>                           
                            @endforeach
                        </ul>
                    </div>              
                </div>              
            </div>         
            <div class="col-sm-4">
                <br>                            
                <div class="widget widget_popular_entries text-right">                              
                    <ul class="media-list">
                        @foreach(App\SubCategory::with('products')->where('category_id', '=' , $category->id)->get() as $sub_product)
                        <?php $sub_products = App\Product::where('subcatgeory_id', '=' , $sub_product->id)->where('availability', '=' , 1)->get(); ?>
                        @foreach($sub_product->products->take(1) as $product)
                        @if($product->availability == 1)
                        <li class="media">
                            <a class="pull-left">
                             <img class="media-object" src="{{asset($product->image)}}">
                         </a>
                         <div class="media-body">
                            <p class="media-heading">
                                <a href="{{route('shop_subcategories_show', $sub_product->id)}}">{{$sub_product->sub_name}}</a>
                            </p>
                            <div class="product-rating">
                                <span>{{count($sub_products)}} Different Products</span>
                            </div>                                          
                            <div class="product-rating">
                                <?php $order_count = $sub_product->products->lists('order_count')->sum() ?>
                                <span>{{$order_count}} Products Sale</span>
                            </div>
                        </div>
                    </li>
                    @endif
                    @endforeach
                    @endforeach               
                </ul> 
            </div>
        </div>                     
    </div>


     


@endif
@endforeach

<!-- End Products Show Categories -->


</div> <!--end of col-md-8 col-lg-9 col-sm-push-4 col-md-push-4 col-lg-push-3 -->

{{-- Side Bar Add That Place --}}
@include('ecomm.partials.shop1.cat_sidebar')        
{{-- @include('ecomm.partials.shop1.pagination') --}}


</div> <!-- end of row -->

</div> <!-- end of container -->

</section>


@include('ecomm.partials.shop1.footer')
@include('ecomm.partials.shop1.copyright')
@include('ecomm.partials.script')
<script src="/src/js/select2.min.js"></script>
<script>
    $('#brands_list').select2();
</script>
<script>
    $('#types_list').select2();
</script>
@stop