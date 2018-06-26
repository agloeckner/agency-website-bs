<?php 

$blueprint = $section[0];

$blueprint_path = page()->$blueprint()->toStructure();

?>

<?php // STAGE
	
  if($blueprint == 'stage'): ?>

<div class="stage">

<?php 
	
	$i = 0;
	
	foreach($blueprint_path as $item):
	
	$i++; ?>

<img class="img-<?php echo $i ?> img-l" src="<?php 

	// logo
	if($item->type() == 'logo'):
	
	  if($image = $page->image($item->image())) {
		
	  echo $page->image($item->image())->resize(500)->url();
	
	  };
	
	// regular image
	else:
	
	  if($image = $page->image($item->image())) {
		
	  echo thumb($page->image($item->image()), array('width' => 1200, 'height' => 600, 'crop' => true, 'grayscale' => true))->url();
	
	  };
	
	endif; ?>">
	
<img class="img-<?php echo $i ?> img-p" src="<?php 
	
	// logo
	if($item->type() == 'logo'):
	
	  if($image = $page->image($item->image())) {
		
	  echo $page->image($item->image())->resize(500)->url();
	
	  };
	
	// regular image
	else:
	
	  if($image = $page->image($item->image())) {
		
	  echo $page->image($item->image())->crop(600,900)->url();
	
	  };
	
	endif; ?>">

<?php endforeach ?>

</div>

<?php // NAVIGATION + FOOTER
	
  elseif($blueprint == 'navigation'): ?>


<div class="<?php echo $section[1] ?>" id="<?php echo $section[1] ?>">
  <?php if($section[1] == 'footer'){ ?><div class="footer"><?php } ?>

<?php 
	
  $i = 0;
  
  $blueprint_path_navi = $blueprint_path->filterBy('position', '!=', 'bottom');
  
  if($section[1] == 'footer'){
  
  $blueprint_path_navi = $blueprint_path;
  
  }

  foreach($blueprint_path_navi as $item):
	
  $i++; ?>
	
  <?php // BUTTON or LINK
	  
  if($item->type() == 'button'): ?>
  
  <div class="item btn-<?php echo $i ?>"><?php echo $item->title() ?>
  
    <div class="text txt-<?php echo $i ?>">
	  <?php echo $item->button()->kirbytext() ?>
    </div>
    <div class="image img-<?php echo $i ?>">
	    
    </div>

  <script>

	// button click to show text
	$('div.<?php echo $section[1] ?> div.btn-<?php echo $i ?>').click(function() {
	$('div.wrapper').addClass('wrapper-active');
	$('div.wrapper div.txt-<?php echo $i ?>').addClass('wrapper-item-active');
	$('div.main').css({'position':'fixed'});
	});

	// wrapper bg close
	$('div.wrapper').click(function() {
	$('div.wrapper').removeClass('wrapper-active');
	$('div.wrapper div.txt-<?php echo $i ?>').removeClass('wrapper-item-active');
	$('div.main').css({'position':'relative'});
	});

	// move txt/img to wrapper div
	$('div.<?php echo $section[1] ?> div.txt-<?php echo $i ?>').appendTo('div.wrapper');

  </script>
  
  </div>
  
  <?php else: ?>
    
    <?php if($item->nav_img() == ''): ?>
    <a class="item itm-<?php echo $i ?>" href="<?php echo $item->url() ?>"><?php echo $item->title() ?></a>
    
    <?php else: ?>
    <img src="<?php echo $page->image($item->nav_img())->resize(500)->url() ?>">
	<?php endif ?>
	
  <?php endif ?>

  <?php endforeach ?>

  <?php if($section[1] == 'footer'){ ?></div>

  <div class="copyright"><?php echo $site->copyright()->kirbytext() ?></div>

  <?php } ?>
	
  </div>



<?php // GALLERY
	
  elseif($section[3] == 'gallery'): ?>

<div class="<?php echo $blueprint ?>" id="<?php echo $blueprint ?>">
	
 <h2><a href="#<?php echo $blueprint ?>"><?php echo $section[1] ?></a></h2>
 <h2 class="bg"><?php echo $section[1] ?></h2>
	
  <div class="content">
	   	
  	<?php foreach($blueprint_path as $item): ?>
  	
  	<?php $image = $item->item_image()->yaml() ?>	  	
  	<?php if($image): ?>
  	
	<div class="swiper-container">
		
	<div class="swiper-wrapper">	 

	  <?php foreach($image as $img): ?>	
	  	
	  	<div class="swiper-slide">
	 		<img class="img-l" src="<?php if($page->image($img)) {
		 		echo thumb($page->image($img), array('width' => 1000))->url(); } ?>">
	 		<img class="img-p" src="<?php if($page->image($img)) {
		 		echo $page->image($img)->crop(600)->url(); } ?>">

		</div>
	  <?php endforeach ?>
	
	</div>

  	<div class="swiper-button-next">
	  	<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 129 129" width="512" height="512"><path d="m40.4 121.3c-0.8 0.8-1.8 1.2-2.9 1.2s-2.1-0.4-2.9-1.2c-1.6-1.6-1.6-4.2 0-5.8l51-51-51-51c-1.6-1.6-1.6-4.2 0-5.8 1.6-1.6 4.2-1.6 5.8 0l53.9 53.9c1.6 1.6 1.6 4.2 0 5.8l-53.9 53.9z" fill="#FFF"/></svg>
  	</div>
  	<div class="swiper-button-prev">
	  	<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 129 129" width="512" height="512"><path d="m88.6 121.3c0.8 0.8 1.8 1.2 2.9 1.2s2.1-0.4 2.9-1.2c1.6-1.6 1.6-4.2 0-5.8l-51-51 51-51c1.6-1.6 1.6-4.2 0-5.8s-4.2-1.6-5.8 0l-54 53.9c-1.6 1.6-1.6 4.2 0 5.8l54 53.9z" fill="#FFF"/></svg>
  	</div>	

	<script>
		
	// Initialize Swiper
	
	$('.<?php echo $section[1] ?> .swiper-container').each(function(){
	    var swiper = new Swiper('.<?php echo $section[1] ?> .swiper-container', {
	        loop: true,
	        autoplay: true,
	        clickable: false,
	        paginationType: 'fraction',
	        hashnavWatchState: true,
	        paginationClickable: true,
			speed: 500,
		    spaceBetween: 0,
		    effect: 'slide',
			navigation: {
			  nextEl: '.swiper-button-next',
			  prevEl: '.swiper-button-prev',
			},
	});
	});
	
	</script>

	</div>
	
	<?php endif ?>

	<?php endforeach ?>
	
	</div>
	
  </div>

	
<?php // DEFAULT

  else: ?>

<div class="<?php echo $blueprint ?>" id="<?php echo $blueprint ?>">
	
 <h2><a href="#<?php echo $blueprint ?>"><?php echo $section[1] ?></a></h2>
 <h2 class="bg"><?php echo $section[1] ?></h2>
	
  <div class="content">

  <?php if($section[3] == 'button'): ?>

  	<div class="sec-btn"></div>
  	<div class="sec-dspl"></div>

  <?php endif ?>
  	
  <?php
	
  $i=0;
  
  foreach($blueprint_path as $item):
  
  $i++;
  
  $itemClean = preg_replace('/[^a-zA-Z]/', '', $item->title()); ?>
  	
  <<?php if($item->url()->isEmpty()): echo 'div'; else: echo 'a href="' . $item->url() . '"'; endif ?> class="item dspl itm-<?php echo $i ?>">

	<div class="text txt-<?php echo $i ?>">
	
	  <?php $items = $item->title() ?>
	  <?php if(!$items->isEmpty()): ?>
	  <div class="atom"><?php echo $items?></div>
	  <?php endif ?>
	
	  <?php $items = $item->subtitle() ?>
	  <?php if(!$items->isEmpty()): ?>
	  <div class="atom"><?php echo $items ?></div>
	  <?php endif ?>

	  <?php $items = $item->hours()->kirbytext() ?>
	  <?php if(!$items->isEmpty()): ?>
	  <div class="atom"><?php echo $items ?></div>
	  <?php endif ?>
	  
	  <?php $items = $item->text()->kirbytext() ?>
	  <?php if(!$items->isEmpty()): ?>
	  <div class="atom"><?php echo $items ?></div>
	  <?php endif ?>

	  <?php $items = $item->address()->kirbytext() ?>
	  <?php if(!$items->isEmpty()): ?>
	  <div class="atom"><?php echo $items ?></div>
	  <?php endif ?>
	  
	  <?php $items = $item->phone() ?>
	  <?php if(!$items->isEmpty()): ?>
	  <div class="atom"><a href="tel:<?php echo $items ?>"><?php echo $items ?></a></div>
	  <?php endif ?>
	  
	  <?php $items = $item->email() ?>
	  <?php if(!$items->isEmpty()): ?>
	  <div class="atom"><a href="mailto:<?php echo $items ?>"><?php echo $items ?></a></div>
	  <?php endif ?>	
	  	  	
	</div>  	

  	<?php $image = $item->item_image()->yaml() ?>	  	
  	<?php if($image): ?>
  	  	
	<div class="img img-<?php echo $i ?>">
	  <?php foreach($image as $img): ?>	
	  	
	  	<div class="img img-<?php echo $i ?>">	
	 		<img src="<?php if($page->image($img)) {
		 		echo thumb($page->image($img), array('width' => 300, 'crop' => true, 'grayscale' => true))->url(); } ?>">
		  	</div>
	  <?php endforeach ?>
	</div>

	<?php endif ?>
	  
  </<?php if($item->url()->isEmpty()): echo 'div'; else: echo 'a'; endif ?>>


  <?php if($section[3] == 'button'): ?>
	  
  <div class="item btn btn-<?php echo $i ?>">

	<div class="text txt-<?php echo $i ?>">
	  
	  <?php $items = $item->title() ?>
	  <?php if(!$items->isEmpty()): ?>
	  <div class="atom"><?php echo $items?></div>
	  <?php endif ?>
	
	  <?php $items = $item->address()->kirbytext() ?>
	  <?php if(!$items->isEmpty()): ?>
	  <div class="atom"><?php echo $items ?></div>
	  <?php endif ?>
  	  
    </div>
    
  </div>

	<script>
	
	$('div.<?php echo $blueprint ?> div.btn-<?php echo $i ?>').click(function() {
	$('div.<?php echo $blueprint ?> [class*=itm-]').css({'opacity':'0'}).css({'z-index':'-1'});
	$('div.<?php echo $blueprint ?> div.itm-<?php echo $i ?>').css({'opacity':'1'}).css({'z-index':'0'});
	});
	
	</script>
  
  <?php endif ?>


<?php endforeach ?>
	
  </div>
  
</div>

<?php endif ?>