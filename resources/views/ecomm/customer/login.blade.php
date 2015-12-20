@extends('ecomm.shop.layouts.shopstyle')
@section('title', 'Customer Login')
@section('content')
<div class="login-modal">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Login With Account</h4>               
            </div>  
            @include('ecomm.partials.errors')
            @include('ecomm.partials.required')         
            <form role="form" action="{{route('customer_post_login')}}" method="POST">           
                <?php echo csrf_field() ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Email address</label>
                        <input type="email" name="email" class="form-control"placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password">                                              
                    </div>                  

                    <a href="{{route('shop_home')}}" class="btn btn-info pull-right">View As Guest</a>
                    <button type="submit" class="btn btn-primary ">Log in</button>
                    <br>

                </div>
                <div class="modal-footer">
                    <div class="col-md-12">
                        <div class="alert alert-danger" role="alert" align="center">                            

                            <label for="">Login Name:</label>
                            <span>user@gmail.com</span>
                            <br>
                            <label for="">Password:</label>
                            <span>123456</span>
                        </div>
                    </div>
                    <h5>OR</h5>
                    <a href="{{route('social_login', 'facebook')}}" class="btn btn-info" role="button">Login With Facebook</a>
                    <p>
                        If u don't have account.
                    </p>
                    <a href="{{route('customer.create')}}" class="btn btn-success text-center">Create Account</a>                                     
                </div>
            </form>
        </div>            
    </div>
</div>
@stop