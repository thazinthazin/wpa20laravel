@extends('ecomm.admin.layouts.adminstyle2')
@section('content')
@include('ecomm.admin.partials.admin_breadcrumbs', ['breadcrumbs' => Breadcrumbs::render('admin_categories')])
@include('ecomm.partials.required')
@include('ecomm.partials.errors')

<!-- Add New Category -->
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"><strong>Add New</strong> Category</h3>
				
				<ul class="panel-controls">
					<li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>						
				</ul>  
				<form action="{{route('admin.categories.store')}}" method="POST" class="form-horizontal" >
					<?php echo csrf_field(); ?>
					<div class="panel-body">						
						<div class="form-group">
							<div class="col-md-3">
								<input type="text" id="cat_name" name="name" class="form-control"
								placeholder="Enter Category Name">								
							</div>
							<a href="{{route('admin.categories.index')}}" class="btn btn-default">Clear Form</a>					                                
							<button class="btn btn-primary">Submit</button>
						</div>											
					</div>					
				</form>
			</div>
		</div>
	</div>
</div>
<!-- End of Add New Category -->

<!-- Add New Sub-Category -->
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"><strong>Add New</strong> Sub Category</h3>
				
				<ul class="panel-controls">
					<li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>						
				</ul>  
				<form action="{{route('admin.subcategories.store')}}" method="POST" class="form-horizontal" >
					<?php echo csrf_field(); ?>
					<div class="panel-body">
						<div class="form-group">
							<select class="btn btn-default pull-left" name="category_id">
								@foreach($categories as $category)
								<option value=" {{$category->id}} ">
									{{$category->name}}
								</option>
								@endforeach
							</select>
							<div class="col-md-3">								
								<input type="text" id="sub_name" name="sub_name" class="form-control"
								placeholder="Enter Sub Category Name">								
							</div>
							<a href="{{route('admin.categories.index')}}" class="btn btn-default">Clear Form</a>					                                
							<button class="btn btn-primary">Submit</button>						
						</div>						
					</div>					
				</form>
			</div> <!-- end of panel-heading -->
		</div><!-- end of panel-default -->
	</div>
</div>
<!-- End of Add New Sub-Category -->


<div class="page-content-wrap">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"><strong>Show All</strong> Category & SubCategory</h3>
					<ul class="panel-controls">
						<li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>						
					</ul>
					<div class="panel-body">  				
						<table id="categories-table" class="table">
							<thead>
								<tr>
									<th>ID</th>
									<th>Name</th>
									<th>Sub_Name</th>
									<th></th>
									

								</tr>
							</thead>

							<tbody>
								@foreach($categories as $category)

								<tr>
									<td>{{$category->id}}</td>
									<td><strong>{{$category->name}}</strong></td>
									<td>
										@foreach(App\SubCategory::where('category_id', '=' , $category->id)->get() as $subcategory)
										<ul>
											<li>
												{{$subcategory->sub_name}}
											</li>
										</ul>
										@endforeach							
									</td>
									<td>							
										<a class="btn btn-primary" href="{{route('admin.categories.edit', $category->id)}}"><span class="fa fa-pencil"> Edit All</span></a>
									</td>
									
								</tr>
								@endforeach

							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop
@section('script')
<script>
// Startup code
$(function() {
	$("#categories-table").DataTable();
});
</script>
@stop