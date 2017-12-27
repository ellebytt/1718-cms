<?php
//   Set the content width based on the theme's design and stylesheet.
 
            if ( ! isset( $content_width ) )
	          $content_width = 584;


if ( ! function_exists( 'coffee_setup' ) ):
function coffee_setup() {
//   This theme styles the visual editor with editor-style.css to match the theme style.
	     add_editor_style();
	
// Add default posts and comments RSS feed links to <head>
	
	add_theme_support( 'automatic-feed-links' );
	
//  Add support for Post Formats
	add_theme_support( 'post-formats', array( 'aside', 'gallery', 'link', 'video', 'image', 'quote' ) );
	
	
//  Add support for custom beckgrounds.

   add_theme_support( 'custom-background', array(
	// Background color default
	'default-color' => '000',
	// Background image default
	'default-image' => get_template_directory_uri() . '/images/bg.jpg'
) );

//  Add support for custom header
        
		add_theme_support ('custom-header', array(
		'default-image'          => get_template_directory_uri() . '/images/header.jpg',
		'width' => apply_filters( 'coffee_header_image_width', 1040 ),
		'height' => apply_filters('coffee_header_image_height', 200 ),
		'header-text'            => true,
		'default-text-color' => '990033',
		'uploads' => true,
		// Callback for styling the header.
		'wp-head-callback' => 'coffee_header_style',
		// Callback for styling the header preview in the admin.
		'admin-head-callback' => 'coffee_admin_header_style',	
	
	 ) );


if ( ! function_exists( 'coffee_header_style' ) ) :

function coffee_header_style() {

	
	$text_color = get_header_textcolor();

	// If no custom options for text are set, let's bail.
	if ( $text_color == HEADER_TEXTCOLOR )
		return;

	// If we get this far, we have custom styles. Let's do this.
	?>
	<style type="text/css">
	<?php
		// Has the text been hidden?
		if ( 'blank' == $text_color ) :
	?>
		#site-title,
		#site-description {
			position: absolute !important;
			clip: rect(1px 1px 1px 1px); /* IE6, IE7 */
			clip: rect(1px, 1px, 1px, 1px);
		}
	<?php
		// If the user has set a custom color for the text use that
		else :
	?>
		#site-title a,
		#site-description {
			color: #<?php echo $text_color; ?> !important;
		}
	<?php endif; ?>
	</style>
	<?php
}
endif; 

if ( ! function_exists( 'coffee_admin_header_style' ) ) :

function coffee_admin_header_style() {

?>
	<style type="text/css">
		#site-header {
            position: relative;
			max-width: 1040px;
		
		}

		#header_image  {
			display: block;
			width: 1040px;
			height: 200px;
		}

		#site-title a:link,
		#site-title a:visited,
		#site-title a:hover,
		#site-title a:focus {
			text-decoration: none;
			color: #fff;
		}

		#site-description {
			font-size: 0.8em;
	        font-weight: normal;
	        text-transform: uppercase;
	        margin-top: 0.2em;
	        margin-right: 0;
	        margin-bottom: 0.2em;
			color: #fff;
		
		}

		/* Conditional if header image is present */

		#header-title.header-image-true {
			width: 100%;
		}
		<?php
			// If the user has set a custom color for the text use that
			if ( get_header_textcolor() != get_theme_support( 'custom-header', 'default-text-color' ) ) :
		?>
			#site-title a,
			#site-description {
				color: #<?php echo get_header_textcolor(); ?>!important;
			}
		<?php endif; ?>
	</style>
<?php
}
endif;

//   Custom menus
	     register_nav_menus( array(
		'header_menu' => __( 'Header Menu', 'coffee' )
	) );
	
}
endif;
add_action( 'after_setup_theme', 'coffee_setup' );


	
//   Add widgetized areas
  
     function coffee_widgets_init() {

	    register_sidebar( array(
		'name' => __( 'Sidebar Widgets', 'coffee' ),
		'id' => 'sidebar-1',
		'description' => __( 'Widgets displayed in the sidebar on category and archive pages. ', 'coffee' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );
}
      add_action( 'widgets_init', 'coffee_widgets_init' );

//  Adds Title

	function coffee_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() )
		return $title;

	// Add the site name.
	$title .= get_bloginfo( 'name' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'coffee' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'coffee_wp_title', 10, 2 );


//   Template for comments and pingbacks.


if ( ! function_exists( 'coffee_comment' ) ) :

function coffee_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'coffee' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( 'Edit', 'coffee' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<footer class="comment-meta">
				<div class="comment-author vcard">
					<?php
						$avatar_size = 68;
						if ( '0' != $comment->comment_parent )
							$avatar_size = 20;

						echo get_avatar( $comment, $avatar_size );

						/* translators: 1: comment author, 2: date and time */
						printf( __( '%1$s on %2$s <span class="says">said:</span>', 'coffee' ),
							sprintf( '<span class="fn">%s</span>', get_comment_author_link() ),
							sprintf( '<a href="%1$s"><time datetime="%2$s">%3$s</time></a>',
								esc_url( get_comment_link( $comment->comment_ID ) ),
								get_comment_time( 'c' ),
								/* translators: 1: date, 2: time */
								sprintf( __( '%1$s at %2$s', 'coffee' ), get_comment_date(), get_comment_time() )
							)
						);
					?>

					<?php edit_comment_link( __( 'Edit', 'coffee' ), '<span class="edit-link">', '</span>' ); ?>
				</div><!-- .comment-author .vcard -->

				<?php if ( $comment->comment_approved == '0' ) : ?>
					<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'coffee' ); ?></em>
					<br />
				<?php endif; ?>

			</footer>

			<div class="comment-content"><?php comment_text(); ?></div>

			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply <span>&darr;</span>', 'coffe' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
		</article><!-- #comment-## -->


	<?php
			break;
	endswitch;
}
endif; 

function coffee_scripts() {
	

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'coffee_scripts' );

if ( ! function_exists( 'coffee_posted_on' ) ) :

//  Prints HTML with meta information for the current post-date/time and author.

function coffee_posted_on() {
	printf( __( '<a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a><span class="byline"> by <span class="author vcard"><a class="url fn n" href="%5$s" title="%6$s" rel="author">%7$s</a></span></span>', 'coffee' ),
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf( __( 'View all posts by %s', 'coffee' ), get_the_author() ) ),
		get_the_author()
	);
}
endif;

// Returns a "Continue Reading" link for excerpts
 
function coffee_continue_reading_link() {
	return ' <a href="'. get_permalink() . '">' . __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'coffee' ) . '</a>';
}

// Search form custom styling
 
function coffee_search_form( $form ) {
    $form = '<form role="search" method="get" class="searchform" action="' . esc_url( home_url() ) . '" >
    <div><label class="screen-reader-text" for="s">' . __( 'Search for:' ) . '</label>
    <input type="text" value="' . get_search_query() . '" name="s" id="s" />
    <input type="submit" class="searchsubmit" value="'. esc_attr__( 'Search' ) .'" />
    </div>
    </form>';

    return $form;
}

add_filter( 'get_search_form', 'coffee_search_form' );

//   Footer credits.
 function coffee_display_credits() {
	$text = '<a href="http://wordpress.org/" rel="generator">' . sprintf( __( 'Proudly powered by %s', 'coffee' ), 'WordPress' ) . '</a>';
	$text .= '<span class="sep"> | </span>';
	$text .= sprintf( __( 'Theme: %1$s by %2$s', 'coffee' ), 'Coffee', '<a href="http://organiksoft.com/web-development/ " rel="designer">Organiksoft</a>' );
	echo apply_filters( 'coffee_credits_text', $text );
}
add_action( 'coffee_credits', 'coffee_display_credits' );