<!DOCTYPE html>
<html lang="en">
<head>        
    <!-- META SECTION -->
    <title>@yield('title')</title>            

    <!-- CSS INCLUDE -->       
    @yield('link')
    {{-- 
    <link rel="stylesheet" href="{{asset('src/css/admin.css')}}">
    <link rel="stylesheet" href="{{asset('src/css/dataTables.bootstrap.css')}}">
    --}}
    <link rel="stylesheet" type="text/css" id="theme" href="{{asset('assets/admin/css/theme-default.css')}}"/>
    <script src="{{asset('src/js/jquery.min.js')}}"></script>

    
    <!-- EOF CSS INCLUDE -->                                    
</head>
<body>
    <div class="page-container">
        @include('ecomm.admin.partials.admin_sidebar')
        <div class="page-content">
            @include('ecomm.admin.partials.admin_nav')
           

            <div class="page-content-wrap">
                @yield('content')
            </div>
        </div>
    </div>

    


    <!-- START SCRIPTS -->
    <script src="/src/js/admin.js"></script>
     @yield('script')
   
    <!-- START PLUGINS -->
    {{-- 
    <script type="text/javascript" src="{{asset('assets/admin/js/plugins/jquery/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/admin/js/plugins/bootstrap/bootstrap.min.js')}}"></script>
    --}}
    <script type="text/javascript" src="{{asset('assets/admin/js/plugins/jquery/jquery-ui.min.js')}}"></script>    
           
    <!-- END PLUGINS -->

    <!-- START THIS PAGE PLUGINS-->        
    <script type='text/javascript' src="{{asset('assets/admin/js/plugins/icheck/icheck.min.js')}}"></script>        
    <script type="text/javascript" src="{{asset('assets/admin/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/admin/js/plugins/scrolltotop/scrolltopcontrol.js')}}"></script>

    <script type="text/javascript" src="{{asset('assets/admin/js/plugins/morris/raphael-min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/admin/js/plugins/morris/morris.min.js')}}"></script>       
    <script type="text/javascript" src="{{asset('assets/admin/js/plugins/rickshaw/d3.v3.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/admin/js/plugins/rickshaw/rickshaw.min.js')}}"></script>
    <script type='text/javascript' src="{{asset('assets/admin/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
    <script type='text/javascript' src="{{asset('assets/admin/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>                
    <script type='text/javascript' src="{{asset('assets/admin/js/plugins/bootstrap/bootstrap-datepicker.js')}}"></script>                
    <script type="text/javascript" src="{{asset('assets/admin/js/plugins/owl/owl.carousel.min.js')}}"></script>                 

    <script type="text/javascript" src="{{asset('assets/admin/js/plugins/moment.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/admin/js/plugins/daterangepicker/daterangepicker.js')}}"></script>
    <!-- END THIS PAGE PLUGINS--> 

    <script type="text/javascript" src="{{asset('assets/admin/js/plugins.js')}}"></script>        
    <script type="text/javascript" src="{{asset('assets/admin/js/actions.js')}}"></script>
     <!-- END SCRIPTS --> 
</body>
</html>






