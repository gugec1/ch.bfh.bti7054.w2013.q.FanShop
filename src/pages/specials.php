<!--Jquery Slider-->
<!--from http://www.basic-slider.com/-->


<script src="bjqs-1.3.min.js"></script>

<div id="banner-fade">

    <!-- start Basic Jquery Slider -->
    <ul class="bjqs">
        <li><img src="images/banner_1.jpg" title=""></li>
        <li><img src="images/banner_2.jpg" title=""></li>
        <li><img src="images/banner_3.jpg" title=""></li>
        <li><img src="images/banner_4.jpg" title=""></li>
    </ul>
    <!-- end Basic jQuery Slider -->

</div>

<script class="secret-source">
    jQuery(document).ready(function($) {

        $('#banner-fade').bjqs({
            animtype      : 'slide',
            height        : 250,
            width         : 940,
            responsive    : true,
            randomstart   : true
        });

    });
</script>