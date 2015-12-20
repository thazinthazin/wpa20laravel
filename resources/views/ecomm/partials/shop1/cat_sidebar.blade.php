  <!-- Sidebar -->
    <aside class="col-sm-4 col-md-4 col-lg-3 col-sm-pull-8 col-md-pull-8 col-lg-pull-9">
        <div class="widget widget_categories">
            <h3 class="widget-title"><a href="{{route('shop_categories')}}">Categories</a></h3>
            @foreach(App\Category::all() as $category)
            <ul>
                <li>
                     @if(App\Product::where('category_id', '=' , $category->id)->count())
                    <a href="{{route('shop_categories_show', $category->id)}}">{{$category->name}}</a> <span></span>
                    @endif

                </li>

            </ul>
            @endforeach
        </div>
        @include('ecomm.partials.shop1.popular_product_sidebar')
        @include('ecomm.partials.shop1.bestseller_product_sidebar')
    </aside>
    <!-- eof sidebar -->