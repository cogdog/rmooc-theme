<?php get_header(); ?>

		<?php
		$i = 0;
		global $do_not_duplicate;
		$temp = $wp_query;
		$wp_query = NULL;
		$args = array(
			'paged' => $paged,
			'post__not_in' => $do_not_duplicate
		);
		$wp_query = new WP_Query();
		$wp_query->query($args);
		while ($wp_query->have_posts()) : $wp_query->the_post(); $i++; ?>
		<div class="span-8 post-<?php the_ID(); ?><?php if ($i == 3) { ?> last<?php  } ?>">
		
		
		<?php if ( in_category( 'twitter' )  ) :?>
			
			<h6 class="archive-header"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">#rmooc tweet</a></h6>
			<?php echo wp_oembed_get( get_permalink() ); // twitter uses oembed ?>
			
			<p class="postmetadata"><?php edit_post_link(esc_html__('Edit/Cat', 'gpp'));?></p>

		<?php else: ?>
				<h6 class="archive-header"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title() ?></a></h6>
				<div class="thumbnailbox">
				<?php get_the_image( array( 'custom_key' => array( 'thumbnail' ), 'default_size' => 'thumbnail', 'width' => '310', 'height' => '150' ) ); ?>	
				</div>
				
				<div class="post">
					<div class="excerpt">

					<?php if (is_syndicated()) {

					   // Strip down to an excerpt
					   $text = get_the_content(); $text = strip_tags($text);
   
					   if (strlen($text) > EXCERPT_LENGTH_CHARS) {
							$text = substr($text, 0, EXCERPT_LENGTH_CHARS) .'...<div class="more-link"><a href="' . get_permalink(). '">more &raquo;&raquo;</div>';
					   }
   
					print $text;
   
					  } else {
						   the_excerpt( );
					  } ?>
					</div>  <!-- //excerpt -->        
          
<p class="postmetadata"><?php the_time( get_option( 'date_format' ) ); ?> | <?php comments_popup_link(esc_html__('Comments &#187;', 'gpp'), esc_html__('1 Comment &#187;', 'gpp'), esc_html__('% Comments &#187;', 'gpp')); ?> | <?php edit_post_link(esc_html__('Edit/Cat', 'gpp')); ?></p>



				</div> <!-- //post -->    
				
		<?php endif; // twitter category ?>
		
		</div> <!-- //span-8 -->   
		<?php if ($i == 3) { ?><div class="archive-stack clear"></div><?php $i = 0; } ?>
		<?php endwhile; ?>
		<div class="clear"></div>
		<div class="navigation clearfix">
			<div><?php next_posts_link(esc_html__('&laquo; Older Entries', 'gpp')) ?></div>
			<div><?php previous_posts_link(esc_html__('Newer Entries &raquo;', 'gpp')) ?></div>
		</div><div class="clear"></div>
		<?php $wp_query = NULL; $wp_query = $temp;?>
		
<?php get_template_part( 'bottom' ); ?>
<?php get_footer(); ?>