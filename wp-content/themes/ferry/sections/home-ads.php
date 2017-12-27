<?php 
  $ferry_ads_enable = get_theme_mod('ferry_ads_enable');
  $ferry_ads_one = array(get_theme_mod('ferry_ads_one'));
  $ferry_ads_two = array(get_theme_mod('ferry_ads_two'));
  $ferry_ads_three = array(get_theme_mod('ferry_ads_three'));
  if($ferry_ads_enable){
  ?>
<!--==================== ads SECTION ====================-->
<section id="ads" class="ferry-section">
  <div class="container">
    <div class="row">
      <div class="col-md-12 wow fadeInDown animated padding-bottom-50 text-center">
        <div class="ferry-heading">
          <?php $ferry_ads_title = esc_attr(get_theme_mod('ferry_ads_title')); 
					
			if( !empty($ferry_ads_title) ):

				echo '<h3 class="ferry-heading-inner">'.esc_attr($ferry_ads_title).'</h3>';

			endif; ?>
        </div>
        <?php  $ferry_ads_subtitle = esc_attr(get_theme_mod('ferry_ads_subtitle'));

			if( !empty($ferry_ads_subtitle) ):

				echo '<p class="heading">'.esc_attr($ferry_ads_subtitle).'</p>';

			endif; ?>
      </div>
	  </div>
	  <?php
	 if($ferry_ads_one){ 
			$ads_query = new WP_Query( array( 'post_type' => 'page','post__in' => $ferry_ads_one));
            if( $ads_query->have_posts() ){                
                while( $ads_query->have_posts() ){
                    $ads_query->the_post();		
     ?>
		<div class="col-sm-4 col-md-4 text-center">
            <div class="ferry-adsbanner">
               <figure>
					<?php if(has_post_thumbnail()){  
					  $defalt_arg =array('class' => "img-responsive");  
					  the_post_thumbnail('', $defalt_arg); 
					  }  ?>
				</figure>
                <div class="adsbanner-inner">
                    <div class="text-wrapper">
                        <div class="vert">
                            <div class="text-1"> <?php the_title(); ?></div>
                            <div class="text-2"><?php the_content(); ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<?php } } wp_reset_query(); }
		
		 if($ferry_ads_two){ 
				$ads_query = new WP_Query( array( 'post_type' => 'page','post__in' => $ferry_ads_two));
				if( $ads_query->have_posts() ){                
					while( $ads_query->have_posts() ){
						$ads_query->the_post();		
		?>
		<div class="col-sm-4 col-md-4 text-center">
            <div class="ferry-adsbanner">
               <figure>
					<?php if(has_post_thumbnail()){  
					  $defalt_arg =array('class' => "img-responsive");  
					  the_post_thumbnail('', $defalt_arg); 
					  }  ?>
				</figure>
                <div class="adsbanner-inner">
                    <div class="text-wrapper">
                        <div class="vert">
                            <div class="text-1"> <?php the_title(); ?></div>
                            <div class="text-2"><?php the_content(); ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		
		<?php } } wp_reset_query(); }
		
		 if($ferry_ads_three){ 
				$ads_query = new WP_Query( array( 'post_type' => 'page','post__in' => $ferry_ads_three));
				if( $ads_query->have_posts() ){                
					while( $ads_query->have_posts() ){
						$ads_query->the_post();		
		?>
		<div class="col-sm-4 col-md-4 text-center">
            <div class="ferry-adsbanner">
               <figure>
					<?php if(has_post_thumbnail()){  
					  $defalt_arg =array('class' => "img-responsive");  
					  the_post_thumbnail('', $defalt_arg); 
					  }  ?>
				</figure>
                <div class="adsbanner-inner">
                    <div class="text-wrapper">
                        <div class="vert">
                            <div class="text-1"> <?php the_title(); ?></div>
                            <div class="text-2"><?php the_content(); ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
  </div>
  <?php } } wp_reset_query(); } ?>
</section>
  <?php } ?>