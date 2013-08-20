<?php get_header(); ?>

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="post clearfix" id="post-<?php the_ID(); ?>">
			<h2 class="entry-title"><?php the_title(); ?></h2>
			<?php the_content('<p class="serif">'. esc_html__('Read the rest of this page &raquo;', 'gpp') . '</p>'); ?>
			
		</div>
		<?php endwhile; endif; ?>
				
		<div id="whatsnew" class="post">
				
				<h2>What's New...</h2>
				
				<?php 
					// set up query to get most recent spotlight
					$spotlight_query = new WP_Query( array('posts_per_page' =>'1', 'category_name' => 'news') );
					
					
					 while ( $spotlight_query->have_posts() ) : $spotlight_query->the_post(); ?>
				
						<img src="/wp-content/uploads/2013/07/re-logo.jpg" alt="" width="36" height="36" class="left" />
						<h3 class="entry-title"><?php the_title(); ?></h3>
						
						<?php the_excerpt('<p class="serif">'. esc_html__('Read the rest of this page &raquo;', 'gpp') . '</p>'); ?>

					<?php endwhile; ?>

					
					<p class="more"><a href="/news">See all News...</a></p>			
										
			</div><!-- whats new -->
				


			<?php wp_reset_query(); ?>

		
	<?php edit_post_link(esc_html__('Edit this entry.', 'gpp'), '<p>', '</p>'); ?>

<?php get_template_part( 'bottom' ); ?>
<?php get_footer(); ?>