<?php

// ------ defined for RMOOC

define( EXCERPT_LENGTH_CHARS, 500 );   // default char length for excerpts
define( EXCERPT_LENGTH_WORDS, 50 );   // default word length for excerpts


// Load theme options
require_once ( get_template_directory() . '/theme-options.php' );

// Load Post Images
require_once ( get_template_directory() .  '/images.php');

// Automatic Feed Links
// yuck turn this off
/*
if ( function_exists( 'add_theme_support' ) ) { 
	add_theme_support('automatic-feed-links');
}
*/

// Add Editor Styles
add_editor_style('editor-style.css');

// Load Text Domain
load_theme_textdomain('gpp',get_template_directory().'/lang');

// Add Content Width
if ( ! isset( $content_width ) ) $content_width = 950;

// Allow Custom Background Image
add_custom_background();
	
// Add Custom Header
define('HEADER_TEXTCOLOR', '');
define('HEADER_IMAGE', '%s/images/default_header.jpg'); // %s is the template dir uri
define('HEADER_IMAGE_WIDTH', 950); // use width and height appropriate for your theme
define('HEADER_IMAGE_HEIGHT', 425);
define( 'NO_HEADER_TEXT', true );

// Add Custom Header CSS to Theme Head
function f8_header_style() {
    ?><style type="text/css">
        #header {
            background: url(<?php header_image(); ?>);
        }
    </style><?php
}

// Add Custom Header CSS to Admin
function f8_admin_header_style() {
    ?><style type="text/css">
        #headimg {
            width: <?php echo HEADER_IMAGE_WIDTH; ?>px;
            height: <?php echo HEADER_IMAGE_HEIGHT; ?>px;
        }
    </style><?php
}

add_custom_image_header('f8_header_style', 'f8_admin_header_style');

// Add Post Thumbnail Theme Support
if ( function_exists( 'add_theme_support' ) ) { 
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 310, 150, true ); // 310x150 size
	add_image_size( '950x425', 950, 425, true ); // 950x425 image size
	add_image_size( '950', 950, 9999 ); // 950 image size
}

// Enqueue Javascripts
if (!is_admin()) add_action( 'init', 'f8_load_base_js' );
function f8_load_base_js( ) {
	wp_enqueue_script('jquery');
	wp_enqueue_script('jquery.cycle', get_bloginfo('template_directory').'/js/jquery.cycle.js', array('jquery'));
	wp_enqueue_script('superfish', get_bloginfo('template_directory').'/js/nav/superfish.js', array( 'jquery' ) );
	wp_enqueue_script('supersubs', get_bloginfo('template_directory').'/js/nav/supersubs.js', array( 'jquery' ) );
	wp_enqueue_script( 'comment-reply' );
}

function f8_load_dom_ready_js() {

	$doc_ready_script = '';
	$doc_ready_script .= '
	<script type="text/javascript">
		jQuery(document).ready(function() {
		
			jQuery.fn.cleardefault = function() {
			return this.focus(function() {
				if( this.value == this.defaultValue ) {
					this.value = "";
				}
			}).blur(function() {
				if( !this.value.length ) {
					this.value = this.defaultValue;
				}
			});
		};
		
		jQuery(".clearit input, .clearit textarea").cleardefault();
		
		
    jQuery(".sf-menu ul").supersubs({ 
        minWidth:    12,
        maxWidth:    27,
        extraWidth:  1
    }).superfish({
    		delay:       100,
		animation:   {opacity:"show",height:"show"},
		autoArrows:  true,
		dropShadows: false
    });';
	 if( is_home() or is_front_page() ) {       
	 $doc_ready_script .= 'jQuery("#slideshow-posts").cycle({
	        fx:      "fade",
	        timeout:  4000,
	        prev:    "#prev",
	        next:    "#next",
	        pager:   "#slideshow-nav"
	    });';
	 }
	        
	 $doc_ready_script .= '});
	</script>
			';
					
	echo $doc_ready_script;
	
}

// Add Javascripts
add_action('wp_head', 'f8_load_dom_ready_js');

// Add Theme Support
if ( function_exists( 'add_theme_support' ) ) {
	
	// Register our predefined menu positions
	add_action( 'init', 'f8_register_menus' );
	function f8_register_menus() {
		register_nav_menus(
			array(
				'main-menu' => __( 'Main Menu', 'gpp')
			)
		);
	}
}

if ( ! function_exists( 'f8_comment' ) ) :

function f8_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case '' :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<div id="comment-<?php comment_ID(); ?>">
		<div class="comment-author vcard">
			<?php echo get_avatar( $comment, 40 ); ?>
			<?php printf( __( '%s <span class="says">says:</span>' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
		</div><!-- .comment-author .vcard -->
		<?php if ( $comment->comment_approved == '0' ) : ?>
			<em><?php _e( 'Your comment is awaiting moderation.' ); ?></em>
			<br />
		<?php endif; ?>

		<div class="comment-meta commentmetadata"><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
			<?php
				/* translators: 1: date, 2: time */
				printf( __( '%1$s at %2$s' ), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)' ), ' ' );
			?>
		</div><!-- .comment-meta .commentmetadata -->

		<div class="comment-body"><?php comment_text(); ?></div>

		<div class="reply">
			<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
		</div><!-- .reply -->
	</div><!-- #comment-##  -->

	<?php
			break;
		case 'pingback'  :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __('(Edit)'), ' ' ); ?></p>
	<?php
			break;
	endswitch;
}
endif;




// Make Menu Support compatible with earlier WP versions
function f8_theme_nav() {
	if ( function_exists( 'wp_nav_menu' ) )
		wp_nav_menu( 'sort_column=menu_order&container_class=sf-menu clearfix&menu_location=main-menu&fallback_cb=gpptheme_nav_fallback' );
	else
		f8_nav_fallback();
}

// Create our GPP Fallback Menu
function f8_nav_fallback() {
    wp_page_menu( 'menu_class=sf-menu clearfix' );
}



// Make Widgets
if ( function_exists('register_sidebar') )
{
    register_sidebar
    (   array
        (
          'name' => 'Left',
          'before_widget' => '<div class="widgetleft">',
          'after_widget' => '</div>',
          'before_title' => '<h6 class="widgettitle">',
          'after_title' => '</h6>',
        )
    );  
    register_sidebar
    (   array
        (
          'name' => 'Middle',
          'before_widget' => '<div class="widgetmiddle">',
          'after_widget' => '</div>',
          'before_title' => '<h6 class="widgettitle">',
          'after_title' => '</h6>',
        )
    );   
 register_sidebar
    (   array
        (
          'name' => 'Right',
          'before_widget' => '<div class="widgetright">',
          'after_widget' => '</div>',
          'before_title' => '<h6 class="widgettitle">',
          'after_title' => '</h6>',
        )
    );   
}


/* custom for RMOOC site by @cogdog ---------------------- */

add_action( 'widgets_init', 'switch_recent_posts_widget' );


/* modify recent post widget to truncate title length
   since twitter ones oare long
   http://wordpress.stackexchange.com/questions/24316/how-to-truncate-titles-in-recent-posts-widget
   ------------------------------------------------------- */


// from http://stackoverflow.com/questions/965235/how-can-i-truncate-a-string-to-the-first-20-words-in-php

function limit_text($text, $limit) {
      if (str_word_count($text, 0) > $limit) {
          $words = str_word_count($text, 2);
          $pos = array_keys($words);
          $text = substr($text, 0, $pos[$limit]) . '...';
      }
      return $text;
    }
    
    
function switch_recent_posts_widget() {

    unregister_widget( 'WP_Widget_Recent_Posts' );
    register_widget( 'WP_Widget_Recent_Posts_Truncated' );

}

class WP_Widget_Recent_Posts_Truncated extends WP_Widget {

    function __construct() {
        $widget_ops = array('classname' => 'widget_recent_entries', 'description' => __( "The most recent posts on your site") );
        parent::__construct('recent-posts', __('Recent Posts'), $widget_ops);
        $this->alt_option_name = 'widget_recent_entries';

        add_action( 'save_post', array(&$this, 'flush_widget_cache') );
        add_action( 'deleted_post', array(&$this, 'flush_widget_cache') );
        add_action( 'switch_theme', array(&$this, 'flush_widget_cache') );
    }

    function widget($args, $instance) {
        $cache = wp_cache_get('widget_recent_posts', 'widget');

        if ( !is_array($cache) )
            $cache = array();

        if ( isset($cache[$args['widget_id']]) ) {
            echo $cache[$args['widget_id']];
            return;
        }

        ob_start();
        extract($args);

        $title = apply_filters('widget_title', empty($instance['title']) ? __('Recent Posts') : $instance['title'], $instance, $this->id_base);
        if ( ! $number = absint( $instance['number'] ) )
            $number = 10;

        $r = new WP_Query(array('posts_per_page' => $number, 'no_found_rows' => true, 'post_status' => 'publish', 'ignore_sticky_posts' => true));
        if ($r->have_posts()) :
?>
        <?php echo $before_widget; global $post ?>
        <?php if ( $title ) echo $before_title . $title . $after_title; ?>
        <ul>
        <?php  while ($r->have_posts()) : $r->the_post(); ?>
        <li><a href="<?php the_permalink() ?>" title="<?php echo esc_attr(get_the_title() ? get_the_title() : get_the_ID()); ?>">
            <?php 
            if( get_the_title() ) 
                echo limit_text( get_the_title(), 10);
            else 
                the_ID(); 
            ?>
        </a></li>
        <?php endwhile; ?>
        </ul>
        <?php echo $after_widget; ?>
<?php
        // Reset the global $the_post as this query will have stomped on it
        wp_reset_postdata();

        endif;

        $cache[$args['widget_id']] = ob_get_flush();
        wp_cache_set('widget_recent_posts', $cache, 'widget');
    }

    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['number'] = (int) $new_instance['number'];
        $this->flush_widget_cache();

        $alloptions = wp_cache_get( 'alloptions', 'options' );
        if ( isset($alloptions['widget_recent_entries']) )
            delete_option('widget_recent_entries');

        return $instance;
    }

    function flush_widget_cache() {
        wp_cache_delete('widget_recent_posts', 'widget');
    }

    function form( $instance ) {
        $title = isset($instance['title']) ? esc_attr($instance['title']) : '';
        $number = isset($instance['number']) ? absint($instance['number']) : 5;
?>
        <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>

        <p><label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Number of posts to show:'); ?></label>
        <input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" size="3" /></p>
<?php
    }
}

/* -------------------------- RMOOC specific functions --------------------- */


// remove p tags for category description
remove_filter('term_description','wpautop');

add_filter( 'excerpt_more', 'rmooc_excerpt_more');

function rmooc_excerpt_more( $more ) {
	return '...<div class="more-link"><a href="'. get_permalink( get_the_ID() ) . '">more &raquo;&raquo;</a></div>';
}


add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function custom_excerpt_length( $length ) {
	return EXCERPT_LENGTH_WORDS;
}



?>