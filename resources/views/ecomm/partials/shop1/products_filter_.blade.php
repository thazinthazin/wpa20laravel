 <div class="shop-filter">
    <div class="row">
        <div class="col-xs-9">
            <form action=" {{URL::current()}} " class="form-horizonal">
                <span>                    
                    <label for="">Price Range</label>
                    <input type="text" name="min_price" value="{{Input::get('min_price')}}">
                    <input type="text" name="max_price" value="{{Input::get('max_price')}}">
                </span>
                <span>
               </span>
               <span class ="pull-center">
                <?php $brands = Input::has('brands') ? Input::get('brands') : []; ?>
                <label for="">Brands</label>
                <select name="brands[]" id="brands_list" multiple="multiple" class="form-control">
                    @foreach($categories as $category)
                    @if(App\Product::where('category_id', '=' , $category->id)->count())
                    <option value="{{$category->id}}" {{in_array($category->id, $brands) ? 'selected' : ''}}>{{$category->name}}</option>
                    @endif
                    @endforeach
                </select>
            </span>
            <br>
            <span>                    
            <label for="">Colors</label>
            <input type="text" name="colors" value="{{Input::get('colors')}}">
            <label for="">Sizes</label>
            <input type="text" name="sizes" value="{{Input::get('sizes')}}">

        </span>

                   <button>OK</button>
        </form>
    </div>   
    <div class="text-right col-xs-3 list-grid">
        <a href="#" id="toggle_shop_view"></a>
    </div> 
</div>
</div>
