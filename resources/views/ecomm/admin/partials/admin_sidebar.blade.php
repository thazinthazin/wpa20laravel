 <!-- START PAGE SIDEBAR -->
 <div class="page-sidebar">
    <!-- START X-NAVIGATION -->
    <ul class="x-navigation">
        <li class="">
            <a href="#">Admin</a>
            <a href="#" class="x-navigation-control"></a>
        </li>
        <li class="xn-profile">
            <div class="profile">
                <div class="profile-image">
                    <img src="{{asset('uploads/user/avatar/admin.jpg')}}" alt="Admin"/>
                </div>
                <div class="profile-data">
                    <div class="profile-data-name">Admin</div>
                    <div class="profile-data-title">Ecommerce Admin</div>
                </div>
            </div>                                                                        
        </li>
        <li class="xn-title">Navigation</li>
        <li class="{{set_active('admin/dashboard')}}">
            <a href="{{route('admin_home')}}"><span class="fa fa-desktop"></span> <span class="xn-text">Dashboard</span></a>                        
        </li>
        <li class="{{set_active('admin/upload')}}">
            <a href="{{route('admin_upload')}}"><span class="fa fa-folder"></span> <span class="xn-text">Upload Manager</span></a>                        
        </li>     
        <li class="xn-title">Product Managment</li>
        <li class="{{set_active('admin/categories')}}">
            <a href="{{route('admin.categories.index')}}"><span class="fa fa-pencil"></span> <span class="xn-text">Categories</span></a>                        
        </li>
        <li class="{{set_active('admin/products')}}">
            <a href="{{route('admin.products.index')}}"><span class="fa fa-heart-o"></span> <span class="xn-text">Products</span></a>                        
        </li>                    

        <li class="xn-title">User Managment</li>
        
        <li class="{{set_active('admin/users')}}">
            <a href="{{route('admin_user')}}"><span class="fa fa-users"></span> <span class="xn-text">All User</span></a>                        
        </li>

        <li class="{{set_active('admin/orders')}}">
            <a href="{{route('admin_order')}}"><span class="fa fa-truck"></span> <span class="xn-text">All Orders</span></a>                        
        </li>

        <li class="{{set_active('admin/messages')}}">
            <a href="{{route('admin_message')}}"><span class="fa fa-comments"></span> <span class="xn-text">All Message</span></a>                        
        </li>
         <li class="xn-title">Log Out</li>       
        <li>
            <a href="{{route('admin_logout')}}" class="mb-control" data-box="#mb-signout"><span class="fa fa-power-off"></span>Log Out Admin</a>                        
        </li> 

    </ul>
    <!-- END X-NAVIGATION -->
</div>
<!-- END PAGE SIDEBAR -->
<!-- MESSAGE BOX-->
<div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
    <div class="mb-container">
        <div class="mb-middle">
            <div class="mb-title"><span class="fa fa-sign-out"></span> Log <strong>Out</strong> ?</div>
            <div class="mb-content">
                <p>Are you sure you want to log out?</p>                    
                <p>Press No if you want to continue work. Press Yes to logout.</p>
            </div>
            <div class="mb-footer">
                <div class="pull-right">
                    <a href="{{route('admin_logout')}}" class="btn btn-success btn-lg">Yes</a>
                    <button class="btn btn-default btn-lg mb-control-close">No</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END MESSAGE BOX-->