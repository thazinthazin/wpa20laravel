@extends('ecomm.admin.layouts.adminstyle2')
@section('content')
@include('ecomm.admin.partials.admin_breadcrumbs', ['breadcrumbs' => Breadcrumbs::render('admin_orders')])
<div class="page-content-wrap">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"><strong>Show All</strong> Orders</h3>
					<ul class="panel-controls">								
						<li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>						
					</ul>
					<div class="panel-body">

						<table id="orders-table" class="table table-striped table-bordered">
							<thead>
								<tr>									
									<th>ID</th>
									<th>Product Info</th>
									<th>Qty</th>
									<th>Price</th>
									<th>Total</th>
									<th>Order ID</th>
									<th>Order Date</th>
									<th>User Name</th>
									<th>User Email</th>
									<th>Contact Phone</th>
									<th>Company Name</th>
									<th>Postal Code</th>
									<th>Address</th>
								</tr>
							</thead>
							<tbody>
									@foreach($order_tables as $order_table)
								<tr>
									<td>
										{{$order_table->id}}
									</td>
									<td>
										<strong>Name</strong>
										@foreach(App\Product::where('id', '=', $order_table->product_id)->get() as $product)
										{{$product->title}}										
										@endforeach
										<br>
										<strong>Color</strong>
										@foreach(App\Color::where('id', '=', $order_table->color_id)->get() as $color)
										{{$color->name}}
										@endforeach
										<br>
										<strong>Size</strong>
										@foreach(App\Size::where('id', '=', $order_table->size_id)->get() as $size)
										{{$size->name}}
										@endforeach
									</td>
									<td>{{$order_table->amount}}</td>
									<td>{{$order_table->price}}</td>
									<td>{{$order_table->total}}</td>
										@foreach(App\Order::where('id', '=', $order_table->order_id)->get() as $orders)
									<td>
										{{$orders->id}}	
									</td>
									<td>
										{{$orders->created_at}}
									</td>
									<?php $users = App\User::where('id', '=' , $orders->user_id)->get();  ?>									

									<td>
									@foreach($users as $user)
										{{$user->first_name . ' ' . $user->last_name}}
									@endforeach	
									</td>																		
									<td>
									@foreach($users as $user)									
										{{$user->email}}
									@endforeach									
									</td>									
																			
									
																										
									
									<td>{{$orders->phone}}</td>
									<td>{{$orders->company_name}}</td>
									<td>{{$orders->postcode}}</td>
									<td>
										<ul>
											@if(!empty($orders->home_address || $orders->street_address))
											<li>
												{{$orders->home_address}}
												<ul>												
												<li>													
												{{$orders->street_address}}
												</li>																																	
												</ul>
											</li>
											@endif
											@if(!empty($orders->town || $orders->city || $orders->country))
											<li>
												{{$orders->town}}
												<ul>
													<li>
														{{$orders->city}}
													</li>
													<li>
														{{$orders->country}}
													</li>
												</ul>
											</li>
											@endif
										</ul>
									</td>														
									@endforeach
								</tr>					
								@endforeach
							</tbody>
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
	$("#orders-table").DataTable();
});
</script>
@stop