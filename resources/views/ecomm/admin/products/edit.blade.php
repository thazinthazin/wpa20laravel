@extends('ecomm.admin.layouts.adminstyle2')

@section('link')
<link rel="stylesheet" href="/src/css/select2.min.css">
@endsection

@section('content')
@include('ecomm.admin.partials.admin_breadcrumbs', ['breadcrumbs' => Breadcrumbs::render('admin_products_edit')])
<div class="page-content-wrap">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"><strong>Edit</strong> Product =><strong>{!! $products->title !!}</strong></h3>
					<ul class="panel-controls">																				
						<li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>					
					</ul>
					<div class="panel-body">
						@include('ecomm.partials.required')
						
						<form action="{{route('admin.products.update', $products->id)}}" enctype="multipart/form-data" class="form-horizontal" method="POST">
							<?php echo csrf_field(); ?>
							<input name="_method" type="hidden" value="PUT">
							<div class="col-md-3">
								<div class="form-group">																		
									<label for="cat_sub">Select New Category</label>									
									<br>
									<select name="category_id" id="category_list" class="form-control">
										@foreach($categories as $category)
										<option @if(in_array($category->id, $categories_product)) selected @endif value="{{$category->id}}">{{$category->name}}</option>
										@endforeach
									</select>
									<br>
									<label for="cat_sub">Select New Category [MUST CLICK CATEGORY FIRST]</label>					
								<select name="subcatgeory_id" id="subcategory" class="form-control">
										@foreach(App\SubCategory::where('id', '=' , $products->subcatgeory_id)->get() as $subcategory)
										<option value="{{$subcategory->id}}">{{$subcategory->sub_name}}</option>
										@endforeach										
									</select>
								</div>							
							</div>

							<div class="col-md-12">
								<div class="form-group">
									<br>
									<label for="image">Choose Image</label>
									<br>
									<img src="{{asset($products->image)}}" alt="image loading" width="150" height="100" >
									<input type="file" name="image" multiple id="file-simple"/>	
									
									
								</div>															
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<br>
									<label for="title">Product Title</label>
									<br>
									<input type="text" name="title" id="product_title" class="form-control" value="{{$products->title}}">
									<br>									
									<label for="description">Product Description</label>
									<textarea name="description" id="product_description" rows="5" class="form-control">{{$products->description}}</textarea>
									<br>
									<label for="product_price">Price</label>
									<br>
									<input type="integer" name="price" id="product_price" class="form-price" value="{{$products->price}}">
									<br>																

									<div class="col-md-4">
										<div class="form-group">
											<br>
											<label for="color_select">Choose Color</label>
											<br>
											<select name="color_id[]" id="color_list" class="form-control" multiple="multiple">
												@foreach(App\Color::get() as $color)
												@if(count($color->name))											
												<option @if(in_array($color->id, $colors)) selected @endif value="{{$color->id}}">
													{{$color->name}}
												</option>												
												@endif
												@endforeach
											</select>

											
											
											<br>
											<label for="size_select">Choose Size</label>
											<br>
											<select name="size_id[]" id="size_list" class="form-control" multiple="multiple">
												@foreach(App\Size::get() as $size)
												@if(count($size->name))
												<option @if(in_array($size->id, $sizes)) selected @endif value="{{$size->id}}">{{$size->name}}</option>												
												@endif
												@endforeach
											</select>
										</div>								
									</div>
								</div>
							</div>							
							
							
							<div class="col-md-12">
								<div class="form-group">
									<br>									
									<button type="submit" class="btn btn-primary">Submit</button>
								</div>
							</div>

						</form>

						@endsection

					</div>
				</div>
			</div>
		</div>
	</div>
</div>








@section('script')
<script>
	$('#category_list').on('click', function(e){
		console.log(e);

		var cat_id = e.target.value;

		//ajax
		$.get('/ajax-subcat?cat_id=' + cat_id, function(data){
			//console.log(data);
			//success data
			$('#subcategory').empty();

			$.each(data, function(index, subcatObj){
				$('#subcategory').append('<option value="'+subcatObj.id+'">'+subcatObj.sub_name+'</option>')
			});

		});

	});
</script>
<script src="/src/js/select2.min.js"></script>

<script type="text/javascript" src="/assets/admin/js/plugins/fileinput/fileinput.min.js"></script>        

<script>
	$('#color_list').select2();
</script>

<script>
	$('#size_list').select2();
</script>



<script>
	$(function(){
		$("#file-simple").fileinput({
			showUpload: false,
			showCaption: false,
			browseClass: "btn btn-danger",
			fileType: "any"
		});            
		$("#filetree").fileTree({
			root: '/',
			script: '/assets/admin/assets/filetree/jqueryFileTree.php',
			expandSpeed: 100,
			collapseSpeed: 100,
			multiFolder: false                    
		}, function(file) {
			alert(file);
		}, function(dir){
			setTimeout(function(){
				page_content_onresize();
			},200);                    
		});                
	});            
</script>
@stop
