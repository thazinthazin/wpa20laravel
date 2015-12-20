<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <title>Title</title>
    <meta charset="utf-8">
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <![endif]-->
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
        <link rel="stylesheet" type="text/css" href="/slider/css/bootstrap.min.css" media="screen">
        <link rel="stylesheet" type="text/css" href="/slidercss/flexslider.css" media="screen">
        <link rel="stylesheet" type="text/css" href="/slidercss/font-awesome.css" media="screen">
        <link rel="stylesheet" type="text/css" href="/slidercss/magnific-popup.css" media="screen">

        <link rel="stylesheet" href="/assets/shop/css/bootstrap.min.css">
        <link rel="stylesheet" href="/assets/shop/css/main.css">
        <link rel="stylesheet" href="/assets/shop/css/animations.css">
        <link rel="stylesheet" href="/assets/shop/css/fonts.css">        
        
        
        @yield('link')
        <script src="/src/js/jquery.min.js"></script>
        





    </head>
    <body>
    
<div id="box_wrapper">
        @include('ecomm.partials.shop1.top_bar')
        
        @yield('content')
</div><!-- eof #box_wrapper -->


        

        
       
             
        <script type="text/javascript" src="/slider/js/jquery.flexslider.js"></script>
        <script type="text/javascript" src="/slider/js/jquery.imagesloaded.min.js"></script>
        <script type="text/javascript" src="/slider/js/waypoint.min.js"></script>
        <script type="text/javascript" src="/slider/js/script.js"></script> 

        <!-- libraries -->
        <script src="/assets/shop/js/script.js"></script>

        <script src="/assets/shop/js/vendor/jquery-1.11.1.min.js"></script>
        <script src="/assets/shop/js/vendor/bootstrap.min.js"></script>
        <script src="/assets/shop/js/vendor/jquery.appear.js"></script>

        <!-- superfish menu  -->
        <script src="/assets/shop/js/vendor/jquery.hoverIntent.js"></script>
        <script src="/assets/shop/js/vendor/superfish.js"></script>

        <!-- page scrolling -->
        <script src="/assets/shop/js/vendor/jquery.easing.1.3.js"></script>
        <script src='/assets/shop/js/vendor/jquery.nicescroll.min.js'></script>
        <script src="/assets/shop/js/vendor/jquery.ui.totop.js"></script>
        <script src="/assets/shop/js/vendor/jquery.localscroll-min.js"></script>
        <script src="/assets/shop/js/vendor/jquery.scrollTo-min.js"></script>
        <script src='/assets/shop/js/vendor/jquery.parallax-1.1.3.js'></script>

        <!-- widgets -->
        <script src="/assets/shop/js/vendor/jquery.easypiechart.min.js"></script><!-- pie charts -->
        <script src='/assets/shop/js/vendor/jquery.countTo.js'></script><!-- digits counting -->
        <script src="/assets/shop/js/vendor/jquery.prettyPhoto.js"></script><!-- lightbox photos -->
        <script src='/assets/shop/js/vendor/jquery.plugin.min.js'></script><!-- plugin creator for comingsoon counter -->
        <script src='/assets/shop/js/vendor/jquery.countdown.js'></script><!-- coming soon counter -->        
        <script src="/assets/shop/js/vendor/jquery.elevateZoom-3.0.8.min.js"></script><!-- zoom images -->
        <script src='/assets/shop/js/vendor/jflickrfeed.min.js'></script><!-- flickr -->        

        <!-- sliders, filters, carousels -->
        <script src="/assets/shop/js/vendor/jquery.isotope.min.js"></script>
        <script src='/assets/shop/js/vendor/owl.carousel.min.js'></script>
        

        <!-- custom scripts -->
        <script src="/assets/shop/js/plugins.js"></script>
        <script src="/assets/shop/js/main.js"></script>
        @yield('script')

    </body>
    </html>