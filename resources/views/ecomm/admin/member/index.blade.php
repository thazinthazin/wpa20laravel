@extends('ecomm.admin.layouts.adminstyle2')
@section('content')
@include('ecomm.admin.partials.admin_breadcrumbs', ['breadcrumbs' => Breadcrumbs::render('admin_users')])
<div class="page-content-wrap">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"><strong>Show All</strong> Users</h3>
					<ul class="panel-controls">			
						{{-- <li class="pull-left">
							<a href="{{route('admin.products.create')}}" data-original-title="Tooltip on left" type="button" data-toggle="tooltip" data-placement="left" title="Add New Product"><span class="fa fa-plus"></span></a>
						</li> --}}
						<li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>						
					</ul>
					<div class="panel-body">

						<table id="users-table" class="table table-striped table-bordered">
							<thead>
								<tr>
									<th>Id</th>									
									<th>First Name</th>
									<th>Last Name</th>
									<th>Email_Address</th>
									<th>Roles</th>
									<th>Company Name</th>
									<th>Phone</th>									
									<th>Postal Code</th>
									<th>Scoail Id</th>					
									<th>Name Social</th>
									<th>Address</th>
									<th>Actions</th>									
								</tr>
							</thead>
							<tbody>
								@foreach($users as $user)
								<tr>
									<td>{{$user->id}}</td>
									<td>
										{{$user->first_name}}
									</td>
									<td>
										{{$user->last_name}}
									</td>
									<td>										
										{{$user->email}}										
									</td>						
									<td>{{$user->name}}</td>
									
									@foreach(App\Profile::where('user_id', $user->id)->get() as $profile)
									<td>{{$profile->company_name}}</td>
									<td>{{$profile->phone}}</td>									
									<td>{{$profile->postcode}}</td>
									<td>{{$profile->idsocial}}</td>
									<td>{{$profile->social}}</td>
									<td>
										<ul>
											@if(!empty($profile->home_address || $profile->street_address))
											<li>
												{{$profile->home_address}}
												<ul>												
												<li>													
												{{$profile->street_address}}
												</li>																																	
												</ul>
											</li>
											@endif
											@if(!empty($profile->town || $profile->city || $profile->country))
											<li>
												{{$profile->town}}
												<ul>
													<li>
														{{$profile->city}}
													</li>
													<li>
														{{$profile->country}}
													</li>
												</ul>
											</li>
											@endif
										</ul>
									</td>
									@endforeach
									
									<td>									
										<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#{{$user->id}}">											
											<i class="glyphicon glyphicon-trash"></i>
										</button>										
									</td>
								</tr>
								{{-- Confirm Delete Modal --}}
								<div class="modal fade" id="{{$user->id}}" tabIndex="-1">
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
													Are You Sure Delete This <strong>{{$user->first_name}} {{$user->last_name}}</strong> User ?
												</p>
											</div>
											<div class="modal-footer">
												<form class="delete" action="{{ route('admin_user_delete', $user->id)}}" method="POST">
													<input type="hidden" name="_method" value="DELETE">
													<input type="hidden" name="_token" value="{{ csrf_token() }}" >													
													<button type="submit" class="btn btn-danger">DELETE</button>
												</form>

												<a href="#" class="btn btn-primary" data-dismiss="modal">Close</a>
											</div>
										</div>
									</div>
								</div>	<!-- END OF CONFIRM MODAL -->
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
	$("#users-table").DataTable();
});
</script>
@stop