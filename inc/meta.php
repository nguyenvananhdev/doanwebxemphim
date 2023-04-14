
<link type="text/css" href="<?php echo $trangchu ?>/assets/css/<?php echo $style ?>?v=1.1" rel="stylesheet"/>
    <link type="text/css" href="<?php echo $trangchu ?>/assets/css/main.css?v=1.1" rel="stylesheet"/>
    <link type="text/css" href="<?php echo $trangchu ?>/assets/css/owl.carousel.css" rel="stylesheet"/>
        <script type="text/javascript" src="<?php echo $trangchu ?>/assets/js/jquery-2.2.3.min.js"></script>
    <script type="text/javascript" src="<?php echo $trangchu ?>/assets/js/actions.js?v=4.0"></script>
    <script type="text/javascript" src="<?php echo $trangchu ?>/assets/js/functions.js"></script>
    <script type="text/javascript" src="<?php echo $trangchu ?>/assets/js/owl.carousel.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
   <link rel="icon" href="https://i.imgur.com/SQ5D74B.png" />
     <!--<meta name="google-site-verification" content="<?php echo $google ?>"/>-->
    <script type="text/javascript" src="<?php echo $trangchu ?>/assets/js/jquery.jpanelmenu.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        $(".items").owlCarousel({
            items:5,
            itemsTablet: [700,3],
            itemsMobile : [479,2],
            scrollPerPage:true,
            lazyLoad:true,
            navigation : true, // Show next and prev buttons
            slideSpeed : 800,
            paginationSpeed : 400,
            stopOnHover:true,
            pagination:false,
            autoPlay:8000,
            navigationText : ['<div class="control prev"></div>','<div class="control next"></div>']
        });
    });
</script>
    <style>
        #hide_float_left a {
            background: #01AEF0;
            padding: 0px;
            color: #FFF;
            font-size: 15px;
        }
    </style>