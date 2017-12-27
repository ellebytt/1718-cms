		<?php
/**
* Sidebar template. 
*/
?>
		<ul id="sidebar" class="sidebar">
			<?php do_action( 'before_sidebar' ); ?>
			<?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>
			<?php endif; // end sidebar widget area ?>
		</ul>