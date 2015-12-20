      <header id="header">
         <div class="container">
            <div class="row">
              <div class="col-sm-12">
                <span id="toggle_mobile_menu"></span>
                <nav id="mainmenu_wrapper">
                  <ul id="mainmenu" class="nav nav-justified sf-menu">
                    <li class="{{set_active('/')}}">
                      <a href="{{route('home')}}"><i class="rt-icon-home"></i> Home</a>
                    </li>
                    <li class="{{set_active('shop')}}">
                      <a href="{{route('shop_home')}}"><i class="rt-icon-shop"></i> Shop</a>
                    </li>                                                     

                    <li class="{{set_active('categories')}}">
                      <a href="{{route('shop_categories')}}"><i class="rt-icon-layers"></i> Categories </a>
                      <ul>
                       @foreach($categories = App\Category::all() as $category)
                       @if(App\Product::where('category_id', '=' , $category->id)->count())
                       <li>
                        <a href=" {{route('shop_categories_show', $category->id)}} "><i class="rt-icon-layers"></i> {{$category->name}}</a>                                    
                        <ul>
                          <li>
                           @foreach(App\SubCategory::where('category_id', '=' , $category->id)->get() as $subcategory)                                       
                           @if(App\Product::where('subcatgeory_id', '=' , $subcategory->id)->get()->count())                   
                           <a href="{{route('shop_subcategories_show', $subcategory->id)}}"> {{$subcategory->sub_name}}</a>
                           @endif
                           @endforeach 
                         </li>
                       </ul>
                     </li> 
                     @endif                                                               
                     @endforeach 
                   </ul>
                 </li>           

                 <li class="{{set_active('contact')}}">
                  <a href="{{route('shop_contact')}}"><i class="rt-icon-contacts"></i> Contact</a>
                </li>
                <li class="{{set_active('about')}}">
                  <a href="{{route('about')}}"><i class="rt-icon-book2"></i> About Us</a>
                </li>  
              </ul>  
            </nav>

          </div>
        </div>
      </div>
    </header>