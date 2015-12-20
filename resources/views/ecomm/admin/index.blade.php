@extends('ecomm.admin.layouts.adminstyle2')
@section('title', 'Admin')
@section('content')
@include('ecomm.admin.partials.admin_breadcrumbs', ['breadcrumbs' => Breadcrumbs::render('dashboard')])
<div class="row">
	<div class="col-md-3">
		<div class="widget widget-primary widget-item-icon">
			<div class="widget-item-left">
				<span class="fa fa-user"></span>
			</div>
			<div class="widget-data">
				<div class="widget-int num-count">{{count(DB::table('role_users')->where('role_id' , '=' , 2)->get())}}</div>
				<div class="widget-title">Total Users</div>
				<div class="widget-int num-count">{{count(DB::table('role_users')->where('role_id' , '=' , 1)->get())}}</div>
				<div class="widget-subtitle">Admin</div>
			</div>
			<div class="widget-controls">                                
				<a href="{{route('admin_user')}}" class="widget-control-right"><span class="fa fa-users"></span></a>
			</div>                            
		</div>
	</div>
	
	<div class="col-md-3">
		<div class="widget widget-info widget-item-icon">
			<div class="widget-item-left">
				<span class="glyphicon glyphicon-shopping-cart"></span>
			</div>
			<div class="widget-data">
				<div class="widget-int num-count">{{count(App\Order::get())}}</div>
				<div class="widget-title">Total Orders</div>
				<div class="widget-int num-count">{{count(DB::table('order_tables')->get())}}</div>
				<div class="widget-subtitle">Total Order Products</div>
			</div>
			<div class="widget-controls">                                
				<a href="{{route('admin_order')}}" class="widget-control-right"><span class="fa fa-truck"></span></a>
			</div>                            
		</div>

	</div>
	<div class="col-md-3">
		<div class="widget widget-success widget-item-icon">
			<div class="widget-item-left">
				<span class="fa fa-dollar"></span>
			</div>
			<div class="widget-data">
				<div class="widget-int num-count">$ {{App\Order::get()->sum('total')}}</div>
				<div class="widget-title">Total Get Money</div>
				<div class="widget-int num-count">$ {{App\Order::where('created_at', '>' , Carbon\Carbon::now()->subWeek())->get()->sum('total')}}</div>
				<div class="widget-subtitle">Last 7 days Get Money</div>
			</div>			                          
		</div>
	</div>	
</div>
@stop