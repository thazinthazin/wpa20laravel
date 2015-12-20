@extends('ecomm.admin.layouts.adminstyle2')
@section('content')
@include('ecomm.admin.partials.admin_breadcrumbs', ['breadcrumbs' => Breadcrumbs::render('admin_categories_edit')])
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"><strong>EDIT</strong> Category</h3>
				<ul class="panel-controls">
					<li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>						
				</ul>  
				<form action="{{route('admin.categories.update', $categories->id)}}" method="POST" class="form-horizontal">
					<input name="_method" type="hidden" value="PATCH">
					<?php echo csrf_field(); ?>
					<div class="panel-body">						
						<div class="form-group">
						@include('ecomm.partials.errors')
						@include('ecomm.partials.required')
							<div class="col-md-3">
								<input type="text" id="cat_name" name="name" class="form-control" value="{{$categories->name}}">
								{{$errors->first('name')}}
							</div>
							<button class="btn btn-primary">UPDATE CATEGORY</button>
							<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#{{$categories->id}}">											
								DELETE
							</button>
						</div>
					</div>
				</form>
			</div> <!-- end of panel-heading -->
		</div> <!-- end panel-default -->
		{{-- Confirm Delete Modal --}}
		<div class="modal fade" id="{{$categories->id}}" tabIndex="-1">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">
							&times;
						</button>
						<h4 class="modal-title">Please Confirm</h4>
					</div>
					<div class="modal-body">
						<p class="lead">
							<i class="fa fa-question-circle fa-lg"></i> &nbsp;
							Are you sure you want to delete this Category?
							All Sub_Categoires Deleted Too ...
						</p>
					</div>
					<div class="modal-footer">
						<form class="delete" action="{{ route('admin.categories.destroy', $categories->id)}}" method="POST">
							<input type="hidden" name="_method" value="DELETE">
							<input type="hidden" name="_token" value="{{ csrf_token() }}" />
							<input class="btn btn-danger pull-right" type="submit" value="Delete">
						</form>

						<a href="#" class="btn btn-primary" data-dismiss="modal">Close</a>
					</div>
				</div>
			</div>
		</div>	<!-- END OF CONFIRM MODAL -->
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"><strong>EDIT</strong> SubCategory</h3>
				<ul class="panel-controls">
					<li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>						
				</ul>  
				@foreach(App\SubCategory::where('category_id', '=' , $categories->id)->get() as $subcategory)
				<form action="{{route('admin.subcategories.update', $subcategory->id)}}" method="POST" class="form-horizontal">
					<input name="_method" type="hidden" value="PATCH">
					<?php echo csrf_field(); ?>
					<div class="panel-body">						
						<div class="form-group">
							<div class="col-md-3">
								<input type="text" id="subcat_name" name="sub_name" class="form-control" value="{{$subcategory->sub_name}}">
								{{$errors->first('name')}}
							</div>
							<button class="btn btn-primary">UPDATE CATEGORY</button>
							<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#{{$subcategory->id}}">											
								DELETE
							</button>
						</div>
					</div>
				</form>
				{{-- Confirm Delete Modal --}}
				<div class="modal fade" id="{{$subcategory->id}}" tabIndex="-1">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">
									&times;
								</button>
								<h4 class="modal-title">Please Confirm</h4>
							</div>
							<div class="modal-body">
								<p class="lead">
									<i class="fa fa-question-circle fa-lg"></i> &nbsp;
									Are you sure you want to delete this Sub_Category?
								</p>
							</div>
							<div class="modal-footer">
								<form class="delete" action="{{ route('admin.subcategories.destroy', $subcategory->id)}}" method="POST">

									<input type="hidden" name="_method" value="DELETE">
									<input type="hidden" name="_token" value="{{ csrf_token() }}" />
									<input class="btn btn-danger pull-right" type="submit" value="Delete">
								</form>

								<a href="#" class="btn btn-primary" data-dismiss="modal">Close</a>
							</div>
						</div>
					</div>
				</div>	<!-- END OF CONFIRM MODAL -->
				@endforeach
			</div>
		</div>
	</div>
</div>


@stop