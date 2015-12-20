@extends('ecomm.shop.layouts.shopstyle')
@section('title', 'Customer Register')
@section('content')
<div class="login-modal">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Register Account</h4>               
            </div>  
            @include('ecomm.partials.errors')
            @include('ecomm.partials.required')         
            <form role="form" action="{{route('customer.store')}}" method="POST">           
                <?php echo csrf_field() ?>
                <div class="modal-body">
                	<div class="col-md-6 form-group">
                		<label>First Name</label>
                		<input type="text" name="first_name" class="form-control" placeholder="Enter Your First Name" value="{{old('first_name')}}">                		
                	</div>               	
                    <div class="col-md-6 form-group">
                        <label>Last Name</label>
                        <input type="text" name="last_name" class="form-control"placeholder="Enter Your Last Name" value="{{old('last_name')}}">
                    </div>
                    <div class="col-md-12 form-group">
                        <label>Email address</label>
                        <input type="email" name="email" class="form-control"placeholder="Enter Your email" value="{{old('email')}}">
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Enter Your Password" value="{{old('password')}}">                                              
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Confirm Password</label>
                        <input type="password" name="password_confirmation" class="form-control" placeholder="Enter Your Password" value="{{old('password')}}">                                              
                    <br>
                    </div>

                    
                    <a href="{{route('shop_home')}}" class="btn btn-info pull-right">GO BACK HOME</a>
                    <button type="submit" class="btn btn-primary ">REGISTER</button>
                    <br>

                </div>
                <div class="modal-footer">
                    <p>
                        I have an account.
                    </p>
                    <a href="{{route('customer_login')}}" class="btn btn-success">Login With Account</a>                    
                </div>            
            </form>
        </div>
    </div>
</div>
@stop