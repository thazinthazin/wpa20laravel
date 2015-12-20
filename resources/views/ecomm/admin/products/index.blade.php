@extends('ecomm.admin.layouts.adminstyle2')
@section('content')
@include('ecomm.admin.partials.admin_breadcrumbs', ['breadcrumbs' => Breadcrumbs::render('admin_products')])
@include('ecomm.partials.errors')
<div class="page-content-wrap">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"><strong>Show All</strong> Products</h3>
					<ul class="panel-controls">			
						<li class="pull-left">
							<a href="{{route('admin.products.create')}}" data-original-title="Tooltip on left" type="button" data-toggle="tooltip" data-placement="left" title="Add New Product"><span class="fa fa-plus"></span></a>
						</li>
						<li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>						
					</ul>
					<div class="panel-body">

						<table id="products-table" class="table table-striped table-bordered">
							<thead>
								<tr>
									<th>Id</th>
									<th>Title</th>
									<th>Image</th>
									<th>Cat & Sub-Cat Name</th>
									<th>Size & Color</th>					
									<th>Description</th>
									<th>Price</th>
									<th>InStock</th>
									<th>Available</th>
									<th>Actions</th>
									
								</tr>
							</thead>
							<tbody>
								@foreach($products as $product)
								<tr>
									<td>{{$product->id}}</td>
									<td>{{$product->title}}</td>
									<td>
										<img src="{{asset($product->image)}}" width="80" height="80">
									</td>
									<td>
										<ul>
											<li>
												<strong>													
													@foreach(App\Category::where('id', '=' , $product->category_id)->get() as $category)
													{{$category->name}}
													@endforeach
												</strong>
											</li>
											<ul>
												<li>
													@foreach(App\SubCategory::where('id', '=' , $product->subcatgeory_id)->get() as $subcategory)
													{{$subcategory->sub_name}}
													@endforeach		
												</li>
											</ul>											
										</ul>
									</td>
									<td>
										
										<ul>																					
											@foreach(DB::table('color_roles')->where('product_id' , '=' , $product->id)->get() as $color)											
											<li>
												@foreach(App\Color::where('id', '=' , $color->color_id)->get() as $list)
												{{$list->name or 'None'}}
												@endforeach											
											</li>
											@endforeach											
											<ul>												
												@foreach(DB::table('size_roles')->where('product_id' , '=' , $product->id)->get() as $size)											
												<li>
													@foreach(App\Size::where('id', '=' , $size->size_id)->get() as $list)
													
													{{$list->name or 'None'}}

													@endforeach											
												</li>
												@endforeach												
											</ul>
										</ul>
										
									</td>						
									<td>{{Str::limit($product->description, 30)}}</td>
									<td>{{$product->price}}</td>
									<td>
										
										@if($product->instock >= 10)
										<button type="button" class="btn btn-info" data-toggle="modal" data-target="#instock-{{$product->id}}">											
											<strong>{{$product->instock}}</strong>
										</button>	
										@elseif($product->instock > 0)
										<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#instock-{{$product->id}}">											
											<strong>{{$product->instock}}</strong>
										</button>
										@else
										<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#instock-{{$product->id}}">											
											<strong>{{$product->instock}}</strong>
										</button>
										@endif
									</td>
									<td>
										@if($product->availability == 1)
										<form action="{{route('admin.products.avail', $product->id)}}" method="POST">
											<input type="hidden" name="_method" value="PUT">   
											<input type="hidden" name="_token" value="{{ csrf_token() }}" >
											<input type="hidden" name="availability" value="0">
											<button class="btn btn-success">Enable</button>																					
										</form>
										@else
										<form action="{{route('admin.products.avail', $product->id)}}" method="POST">
											<input type="hidden" name="_method" value="PUT">   
											<input type="hidden" name="_token" value="{{ csrf_token() }}" >
											<input type="hidden" name="availability" value="1">											
											<button class="btn btn-danger">Disable</button>
										</form>
										@endif
									</td>

									<td class="text-center">
										<a class="btn btn-info" href="{{route('admin.products.edit', $product->id)}}">Edit</a>

									
										<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete-{{$product->id}}">											
											<i class="glyphicon glyphicon-trash"></i>
										</button>										
									</td>
								</tr>
								{{-- Confirm Delete Modal --}}
								<div class="modal fade" id="delete-{{$product->id}}">
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
													Are You Sure Delete This <strong>{{$product->title}}</strong> Product ?
												</p>
											</div>
											<div class="modal-footer">
												<form class="delete" action="{{ route('admin.products.destroy', $product->id)}}" method="POST">
													<input type="hidden" name="_method" value="DELETE">
													<input type="hidden" name="_token" value="{{ csrf_token() }}" >													
													<button type="submit" class="btn btn-danger">DELETE</button>
												</form>

												<a href="#" class="btn btn-primary" data-dismiss="modal">Close</a>
											</div>
										</div>
									</div>
								</div>	<!-- END OF CONFIRM MODAL -->
								{{-- Confirm Delete Modal --}}
								<div class="modal fade" id="instock-{{$product->id}}">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal">
													&times;
												</button>
												<h4 class="modal-title">Please Confirm</h4>
											</div>
											<form class="delete" action="{{ route('admin.products.instock', $product->id)}}" method="POST" class="form-group">
											<input type="hidden" name="_method" value="PUT">
											<input type="hidden" name="_token" value="{{ csrf_token() }}" >													
											<div class="modal-body">												
												<input  type="text" name="instock" class="form-control">												
											</div>
											<div class="modal-footer">
												<button type="submit" class="btn btn-danger">OK</button>
												<a href="#" class="btn btn-primary" data-dismiss="modal">Close</a>
											</div>
											</form>
										</div>
									</div>
								</div>	<!-- END OF CONFIRM MODAL -->
								@endforeach
							</tbody>
	
					{{-- {!! $products->render() !!} --}}
						</table>



					</div><!-- end of panel body -->
				</div><!-- end of panel heading -->
			</div><!-- end of panel default -->
		</div>
	</div><!-- end of row -->
</div><!-- end of page-content-wrap -->
@stop

@section('script')
<script>
// Startup code
$(function() {
	$("#products-table").DataTable();
});
</script>
@stop