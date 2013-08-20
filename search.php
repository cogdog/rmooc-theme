<?php get_header(); ?>

<?php if (have_posts()) : ?>

	<h2><?php _e('Search Results', 'gpp'); ?> for "<?php the_search_query(); ?>"</h2>

	<div class="navigation">
		<div><?php next_posts_link(esc_html__('&laquo; Next Results', 'gpp')) ?></div>
		<div><?php previous_posts_link(esc_html__('Previous Results &raquo;', 'gpp')) ?></div>
	</div>

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

	<div class="navigation">
		<div><?php next_posts_link(esc_html__('&laquo; Next Results', 'gpp')) ?></div>
		<div><?php previous_posts_link(esc_html__('Previous Results &raquo;', 'gpp')) ?></div>
	</div>

<?php else : ?>

	<h2><?php _e('No results found. Try a different search?', 'gpp'); ?></h2>
	<?php include (TEMPLATEPATH . '/searchform.php'); ?>

<?php endif; ?>
<?php get_template_part( 'bottom' ); ?>
<?php get_footer(); ?>