@extends('ecomm.shop.layouts.shopstyle')
@section('content')

@include('ecomm.partials.shop1.header')
@include('ecomm.partials.shop1.breadcrumbs', ['breadcrumbs' => Breadcrumbs::render('about') ])


<header class="intro-header" style="#">
<div class="container">
   

	<div class="row">
		<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
			<div class="site-heading">				
				<h2 class="subheading">
					Have questions? I have answers (maybe).
				</h2>
			</div>
		</div>
	</div>
</div>
</header>

<div class="container">
@include('ecomm.partials.required')
@include('ecomm.partials.errors')
	<div class="row">
		<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">			
			<p>
				Want to get in touch with me? Fill out the form below to send me a
				message and I will try to get back to you within 24 hours!
			</p>
			<form action="{{route('shop_post_contact')}}" method="post">
				<input type="hidden" name="_token" value="{!! csrf_token() !!}">							
							
				<div class="row control-group">
					<div class="form-group col-xs-12 controls">
						<label for="message">Leave Message</label>
						<textarea rows="10" class="form-control" id="message"
						name="message">{{ old('message') }}</textarea>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="form-group col-xs-12">
						<button type="submit" class="btn btn-primary">Send</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
@stop