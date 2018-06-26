<!DOCTYPE html>

<?php snippet('head') ?>

<body ontouchstart="">

<div class="main" id="home">

<div class="wrapper"></div>

<?php snippet('items', array('section' => array('stage', 'stage', 'home', ''))) ?>

<?php snippet('items', array('section' => array('brands', 'brands', 'home', ''))) ?>

<?php snippet('items', array('section' => array('team', 'team', 'home', ''))) ?>

<?php snippet('items', array('section' => array('contact', 'Kontakt', 'home', ''))) ?>

<?php snippet('items', array('section' => array('showroom', 'showroom', 'home', 'gallery'))) ?>

<?php snippet('items', array('section' => array('navigation', 'footer', 'home', ''))) ?>

<?php snippet('items', array('section' => array('navigation', 'navigation', 'home', ''))) ?>

<?php snippet('items', array('section' => array('navigation', 'mobile-navigation', 'home', ''))) ?>

<div class="script">

	
<script>
	
// move navi to stage
$('div.navigation').appendTo('div.stage');
$('div.mobile-navigation a.item:last').clone().appendTo('div.mobile-navigation').html('Top').attr('href','#home');

</script>

	
</div>

</div>
</body>
</html>