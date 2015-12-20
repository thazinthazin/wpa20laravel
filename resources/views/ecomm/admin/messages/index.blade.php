@extends('ecomm.admin.layouts.adminstyle2')
@section('content')
@include('ecomm.admin.partials.admin_breadcrumbs', ['breadcrumbs' => Breadcrumbs::render('admin_messages')])
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

						<table id="messages-table" class="table table-striped table-bordered">
							<thead>
								<tr>									
									<th>Approved</th>
									<th>User Name</th>
									<th>Email</th>
									<th>Message Body</th>
									
									<th>Created_at</th>
								</tr>
							</thead>
							<tbody>
								@foreach($messages as $message)
								<tr>
									
									<td>
										@if($message->approved == 0)
										<form action="{{route('admin_message_update', $message->id)}}" method="POST">
											<input type="hidden" name="_method" value="PUT">   
											<input type="hidden" name="_token" value="{{ csrf_token() }}" >
											<input type="hidden" name="approved" value="1">
											<button class="btn btn-danger">New</button>																					
										</form>
										@else
										<form action="{{route('admin_message_update', $message->id)}}" method="POST">
											<input type="hidden" name="_method" value="PUT">   
											<input type="hidden" name="_token" value="{{ csrf_token() }}" >
											<input type="hidden" name="approved" value="0">
											<button class="btn btn-success">Seen</button>																					
										</form>
										@endif										
									</td>
									<td>
									@foreach(App\User::where('id', '=' , $message->user_id)->get() as $user)
									{{$user->first_name . ' ' . $user->last_name}}
									@endforeach
									</td>
									<td>{{$message->email}}</td>
									<td>{{$message->message}}</td>
									<td>{{$message->created_at}}</td>
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
	$("#messages-table").DataTable();
});
</script>
@stop