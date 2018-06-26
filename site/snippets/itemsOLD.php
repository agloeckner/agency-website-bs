<?php

// config

$section_name = reset($section);

$class = $section[1];

$path = page($section[2])->{$section_name}()->toStructure();
  
?>

<div class="<?php echo $section_name ?>" id="<?php echo $section_name ?>">
<h2 class="wow fadeInLeft"><a href="#<?php echo $section_name ?>"><?php echo $class ?? $page->{$section_name . 'Title'}() ?></a></h2>

<div class="content">

  <?php
	    
  $x = 0;
  
  foreach($path as $item):
  
  $x++; ?>  
  
  	<?php if($item->url()->isEmpty()): ?>
  	
      <div class="item wow fadeIn <?php if(!$item->button()->isEmpty()){ echo 'pointer' . ' btn-' . $class . '-' . $x ;}?>" data-wow-delay="<?php echo $x ?>00ms" href="<?php echo $item->url() ?>">

	<?php else: ?>

      <a class="item wow fadeIn" data-wow-delay="<?php echo $x ?>00ms" href="<?php echo $item->url() ?>">
	      
	<?php endif ?>
		
		<?php // TITLE
			
			if(!$item->title()->isEmpty()){ ?>
	    	<div class="title"><?php echo $item->title() ?></div>
	    <?php } ?>

		<?php // SUBTITLE
			
			if(!$item->subtitle()->isEmpty()){ ?>
			<div class="subtitle"><?php echo $item->subtitle() ?></div>
	    <?php } ?>
	    
	    <?php // TEXT
			
			if(!$item->text()->isEmpty()){ ?>
			<div class="text"><?php echo $item->text()->kirbytext() ?></div>
	    <?php } ?>

	    <?php // BUTTON
			
			if(!$item->button()->isEmpty()){ ?>
			<div class="ext-<?php echo $class ?>-<?php echo $x ?>"><?php echo $item->button()->kirbytext() ?></div>

			<script>
			$('div.<?php echo $class ?> div.btn-<?php echo $class ?>-<?php echo $x ?>').click(function() {
			$('div.ext-<?php echo $class ?>-<?php echo $x ?>').fadeIn();
			$('body').css({'overflow':'hidden'});
// 			$('div.extension').show();
			});
			
			$('div.ext-<?php echo $class ?>-<?php echo $x ?>').click(function() {
			$('div.ext-<?php echo $class ?>-<?php echo $x ?>').fadeOut();
			$('body').css({'overflow':'unset'});
// 			$('div.extension').hide();
			});			
			</script>

	    <?php } ?>

	    <?php // ADDRESS
		    
			if(!$item->address()->isEmpty()){ ?>
			<div class="address"><?php echo $item->address()->kirbytext() ?></div>

		<?php } ?>

	    <?php // EMAIL
			
			if(!$item->email()->isEmpty()){ ?>
			<a class="email" href="mailto:<?php echo $item->email() ?>"><?php echo $item->email() ?></a>
	    <?php } ?>

	    <?php // PHONE
		    
			if(!$item->phone()->isEmpty()){ ?>
			<div class="phone"><?php echo $item->phone() ?></div>
	    <?php } ?>

	    <?php // LIST
		    
		    if(!$item->item_list()->isEmpty()){ ?>
		    
		    <ul class="list">
		    
			<?php foreach($item->item_list()->yaml() as $items): ?>
							
			<li><?php echo $items ?></li>
				
			<?php endforeach ?>
		
			</ul>

		<?php } ?>


	    <?php // VIDEO
		    
			if(!$item->video()->isEmpty()){ 
				
			$videoLS = $item->video()->toFile()->url();
				
			?>

			<video autoplay muted loop playsinline="yes" preload="auto" autobuffer="auto" 
			
			src="<?php echo $videoLS ?>"
			
			id="video1" class="video">
								
			<p>Sorry, your browser does not support the video.</p>
			
			</video>	

	    <?php } ?>
		
		<?php // IMAGE
			
			if(!$item->image()->isEmpty()){ ?>
			
			<?php 
				
			$i = 0;
				
			foreach($item->image()->toStructure() as $image):
			
			$i++;
			
			?>

			<img class="<?php echo 'img' . $i ?> wow fadeIn"
				src="<?php echo thumb($image->image($image)->toFile(), array('width' => 1000))->url() ?>">
			<?php endforeach ?>
			
				
	    <?php } ?>


  	<?php if($item->url()->isEmpty()): ?>

      </div>

	<?php else: ?>

      </a>
	
	<?php endif ?>

<?php endforeach ?>

</div>

</div>