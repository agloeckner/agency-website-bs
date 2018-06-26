<head>
<meta charset="utf-8">
<title><?php echo $site->title() ?></title>

<?php echo css('assets/css/main.css') ?>
    
<meta name="viewport" content="width=device-width, initial-scale=1" />
	
<?php echo css('assets/css/animate.css') ?>

<?php echo js('assets/js/wow.min.js') ?>
<?php echo js('assets/js/jquery-1.12.1.min.js') ?>

<?php echo js('assets/js/swiper.min.js') ?>
<?php echo css('assets/css/swiper.min.css') ?>


<script type="text/javascript">

// wow js init

	new WOW().init();

// Scroll-to

$(document).ready(function(){
        $('a[href^="#"]').on('click',function (e) {
            e.preventDefault();
            var target = this.hash,
            $target = $(target);
            $('html, body').stop().animate({
                'scrollTop': $target.offset().top
            }, 500, 'swing', function () {
                window.location.hash = target;
            });
        });
});

</script>


</head>
