@extends('ecomm.shop.layouts.shopstyle')
@section('content')

@include('ecomm.partials.shop1.header')
@include('ecomm.partials.shop1.breadcrumbs', ['breadcrumbs' => Breadcrumbs::render('order')])
<br>
<div class="container">
<?php $order_items = App\Order::where('user_id', Sentinel::getUser()->id)->get(); ?>
@if($order_items->count() == 0)
<h1>Sorry Your Have No Order ...</h1>
@else
<h3>{{$order_items->count()}} Orders List</h3>
	@foreach($orders as $order)
		<a href="#">Order #{{$order->id}} - {{Sentinel::getUser()->first_name}} - {{$order->created_at}}</a>
		 @if($order->orderItems->count() == 1)
		 <h5>Total {{$order->orderItems->count()}} Product</h5>
		 @else
		 <h5>Total {{$order->orderItems->count()}} Products</h5>
		 @endif
		<table class="table table-bordered table-striped">
			<thead>
				<th>Title</th>
				<th>Amount</th>
				<th>Price</th>
				<th>Total</th>
			</thead>
			<tbody>
				@foreach($order->orderItems as $order_item)
					<tr>
						<td>{{$order_item->title}}</td>
						<td>{{$order_item->pivot->amount}}</td>
						<td>{{$order_item->pivot->price}}</td>
						<td>{{$order_item->pivot->total}}</td>
					</tr>
				@endforeach
				<tr>
					<td></td>
					<td></td>
					<td><strong>Total</strong></td>
					<td><strong>{{$order->total}}</strong></td>
				</tr>
			</tbody>
		</table>
	@endforeach
	{!! $orders->render() !!}
	@endif
</div>

@stop