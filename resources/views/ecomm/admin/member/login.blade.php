@extends('ecomm.admin.layouts.loginstyle')
@section('title', 'Admin Login')
@section('content')
<div class="col-md-8 col-md-offset-2">
    <div class="panel panel-default">
        <div class="panel-heading">Login</div>
        <div class="panel-body">
        @include('ecomm.partials.errors')
        <form class="form-horizontal" role="form" method="POST" action="{{route('admin_post_login')}}">
            <?php echo csrf_field(); ?>
            <div class="form-group">
                <label class="col-md-4 control-label">E-Mail Address</label>
                <div class="col-md-6">
                    <input type="email" class="form-control" name="email"
                    value="{{ old('email') }}" autofocus>
                    {{ $errors->first('email') }}
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label">Password</label>
                <div class="col-md-6">
                    <input type="password" class="form-control" name="password">
                    {{ $errors->first('password') }}
                </div>
            </div>          
            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
            </div>           
        </form>
   
        <div class="col-md-12">
        <div class="alert alert-danger" role="alert" align="center">
            <strong>!!! MUST DELETE WHEN ONLINE !!!</strong>
            <br>
            <label for="">Login Name:</label>
            <span>admin@gmail.com</span>
            <br>
            <label for="">Password:</label>
            <span>123456</span>
            </div>
        </div>
    </div>


</div>
</div>

@stop