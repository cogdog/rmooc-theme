<div id="footer">
<p class="quiet">
		<a href="/"><?php bloginfo( 'name' ) ?></a> is <?php esc_html_e('powered by', 'gpp'); ?> <a href="http://wordpress.org/"><?php esc_html_e('Wordpress', 'gpp'); ?></a> crafted by <a href="http://cogdog.it/">CogDog</a> <?php esc_html_e('using the', 'gpp'); ?> <a href="http://graphpaperpress.com">F8 Lite Theme</a><br /><a href="<?php bloginfo('rss2_url'); ?>" class="feed"><?php esc_html_e('subscribe to posts', 'gpp'); ?></a> <?php esc_html_e('or', 'gpp'); ?> <a href="<?php bloginfo('comments_rss2_url'); ?>" class="feed"><?php esc_html_e('subscribe to comments', 'gpp'); ?></a><br /><?php wp_loginout(); ?>
		<!-- <?php echo get_num_queries(); ?> queries. <?php timer_stop(1); ?> seconds. -->
	</p>
</div>
</div>
</div>
	<?php wp_footer(); ?>
</body>
</html>
