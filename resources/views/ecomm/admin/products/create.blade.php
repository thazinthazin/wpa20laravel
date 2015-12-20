@extends('ecomm.admin.layouts.adminstyle2')

@section('link')
<link rel="stylesheet" href="/src/css/select2.min.css">
@endsection
@section('content')
@include('ecomm.admin.partials.admin_breadcrumbs', ['breadcrumbs' => Breadcrumbs::render('admin_products_create')])

<div class="page-content-wrap">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"><strong>Create New</strong> Product</h3>
					<ul class="panel-controls">																				
						<li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>					
					</ul>
					<div class="panel-body">
						@include('ecomm.partials.required')					
						
						<form action="{{route('admin.products.store')}}" enctype="multipart/form-data" class="form-horizontal" method="POST">
							<?php echo csrf_field(); ?>	
							<div class="col-md-2">
								<div class="form-group">
									<label for="cat_sub">Choose Category and Subcategory</label>									
									<br>
									<select name="category_id" id="category_list" class="form-control">
										@foreach($categories as $category)
										<!-- CHECK IF CATEGORY MUST HAVE SUBCATEGORY -->
										@if(App\SubCategory::where('category_id', '=' , $category->id)->count())
										<option value="{{$category->id}}" selected="">{{$category->name}}</option>
										@endif
										@endforeach
									</select>
									<br>
									<select name="subcatgeory_id" id="subcategory" class="form-control">
										<option value="" selected="">Select Category First</option>
									</select>
								</div>							
							</div>

							<div class="col-md-12">
								<div class="form-group">
									<br>
									<label for="image">Choose Image</label>
									<br>													

									<input type="file" id="image" name="image" value="{{old('image')}}" multiple id="file-simple"/>	
								</div>
								{{-- 
								<div class="col-md-8">
									<input type="text" class="form-control" name="page_image"
									id="page_image" onchange="handle_image_change()"
									alt="Image thumbnail" value="">
								</div>
								<script>
									function handle_image_change(){
										$("#page-image-preview") . attr("src", function()
										{
											var value = $("#page_image") . val();
											if(! value)
											{
												value = {!! json_encode(config('site.page_image')) !!};
												if (value == null){
													value = '';
												}
											}
											if(value.substr(0, 4) != 'http' && value.substr(0, 1) != '/')
											{
												value = {!! json_encode(config('site.uploads.webpath')) !!} + '/' + value;
											}
											return value;
										});
									}
								</script>
								--}}															
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<br>
									<label for="title">Product Title</label>
									<br>
									<input type="text" name="title" id="product_title" class="form-control" value="{{old('title')}}">
									<br>									
									<label for="description">Product Description</label>
									<textarea name="description" id="product_description" rows="5" class="form-control">{{old('description')}}</textarea>
									<br>
									<label for="product_price">Price</label>
									<br>
									<input type="integer" name="price" id="product_price" class="form-price" value="{{old('price')}}">
									<br>																
												
							<div class="col-md-4">
								<div class="form-group">
									<br>
									<label for="color_select">Choose Color</label>
									<br>

									<select name="color_id[]" id="color_list" class="form-control" multiple="multiple">
										@foreach(App\Color::get() as $color)
										@if(count($color->name))
										<option value="{{$color->id}}">{{$color->name}}</option>
										@endif
										@endforeach
									</select>									
									<br>
									<label for="size_select">Choose Size</label>
									<br>
									<select name="size_id[]" id="size_list" class="form-control" multiple="multiple">
										@foreach(App\Size::get() as $size)
										@if(count($size->name))
										<option value="{{$size->id}}">{{$size->name}}</option>
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
<script type='text/javascript' src='/assets/admin/js/plugins/icheck/icheck.min.js'></script>
<script type="text/javascript" src="/assets/admin/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>

<script type="text/javascript" src="/assets/admin/js/plugins/dropzone/dropzone.min.js"></script>
<script type="text/javascript" src="/assets/admin/js/plugins/fileinput/fileinput.min.js"></script>        
<script type="text/javascript" src="/assets/admin/js/plugins/filetree/jqueryFileTree.js"></script>
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
