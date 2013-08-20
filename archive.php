<?php get_header(); rewind_posts(); ?>

		<?php 
		query_posts($query_string.'&posts_per_page=24');
		if (have_posts()) : ?>

 	  <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
 	  <?php /* If this is a category archive */ if (is_category()) { ?>
		<h2><?php single_cat_title(); ?>: <span class="archive-description"><?php echo category_description( ); ?> </span></h2>
 	  <?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
		<h2><?php _e('Posts Tagged', 'gpp'); ?> &#8216;<?php single_tag_title(); ?>&#8217;</h2>
 	  <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
		<h2><?php _e('Archive for', 'gpp'); ?> <?php the_time('F jS, Y'); ?></h2>
 	  <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
		<h2><?php _e('Archive for', 'gpp'); ?> <?php the_time('F, Y'); ?></h2>
 	  <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
		<h2><?php _e('Archive for', 'gpp'); ?> <?php the_time('Y'); ?></h2>
	  <?php /* If this is an author archive */ } elseif (is_author()) { ?>
		<h2><?php _e('Author Archive', 'gpp'); ?></h2>
 	  <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
		<h2><?php _e('Blog Archives', 'gpp'); ?></h2>
 	  <?php } ?>
<div class="clear"></div>
<?php $i = 0; ?>
<?php while (have_posts()) : the_post(); $i++; ?>
<div class="span-8 post-<?php the_ID(); ?><?php if ($i == 3) { ?> last<?php  } ?>">
<div class="post">

<?php if ( is_category( 'twitter' ) or in_category( 'twitter' )  ) : ?>
			
	<h6 class="archive-header"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">#rmooc tweet</a></h2>
	<?php echo wp_oembed_get( get_permalink() ); ?>
	<p class="postmetadata"><?php edit_post_link(esc_html__('Edit/Cat', 'gpp'));?></p>

<?php else:?>

<h6 class="archive-header"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title() ?></a></h2>
<div class="thumbnailbox">
<?php get_the_image( array( 'custom_key' => array( 'thumbnail' ), 'default_size' => 'thumbnail', 'width' => '310', 'height' => '150' ) ); ?>
</div>


	<div class="excerpt">

	<?php if (is_syndicated()) {

	   // Strip down to an excerpt
	   $text = get_the_content(); $text = strip_tags($text);
   
	   if (strlen($text) > EXCERPT_LENGTH_CHARS) {
			$text = substr($text, 0, EXCERPT_LENGTH_CHARS) . '...<div class="more-link"><a href="' . get_permalink() . '">more &raquo;&raquo;</a></div>';
	   }
   
		print $text;
   
	  } else {
		   the_excerpt( );
	  }?>
	</div>  <!-- //excerpt -->        
          
<p class="postmetadata"><?php the_time( get_option( 'date_format' ) ); ?> | <?php comments_popup_link(esc_html__('Comments &#187;', 'gpp'), esc_html__('1 Comment &#187;', 'gpp'), esc_html__('% Comments &#187;', 'gpp')); ?> | <?php edit_post_link(esc_html__('Edit/Cat', 'gpp')); ?></p>

<?php endif?>


</div> <!-- //post -->     

</div> <!-- //span-8 -->   
<?php if ($i == 3) { ?><div class="archive-stack clear"></div><?php $i = 0; } ?>
<?php endwhile; ?>

<div class="clear"></div>

<div class="nav-interior">
			<div class="prev"><?php next_posts_link(esc_html__('&laquo; Older Entries', 'gpp')) ?></div>
			<div class="next"><?php previous_posts_link(esc_html__('Newer Entries &raquo;', 'gpp')) ?></div>
		</div>
<div class="clear"></div>

	<?php else : ?>

		<h2 class="center"><?php _e('Not Found', 'gpp'); ?></h2>
		<?php include (TEMPLATEPATH . '/searchform.php'); ?>

	<?php endif; ?>

<?php get_template_part( 'bottom' ); ?>
<?php get_footer(); ?>