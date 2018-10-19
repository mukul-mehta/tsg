<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

get_header();
?>

	<div id="content" class="row" role="main">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<div class="navigation">
			<div class="alignleft"><?php previous_post_link( '%link', '&laquo; %title' ) ?></div>
			<div class="alignright"><?php next_post_link( '%link', '%title &raquo;' ) ?></div>
		</div>
		
		<div <?php post_class("col s12 m9 l8 offset-m1 offset-l1"); ?> id="post-<?php the_ID(); ?>">
		<h2><?php the_title(); ?></h2>
		
		<div class="entry">
				<?php the_content('<p class="serif">' . __('Read the rest of this entry &raquo;', 'kubrick') . '</p>'); ?>

				<?php wp_link_pages(array('before' => '<p><strong>' . __('Pages:', 'kubrick') . '</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
				<?php the_tags( '<p>' . __('Tags:', 'kubrick') . ' ', ', ', '</p>'); ?>

				<p class="postmetadata alt">
					<small>
						<?php /* This is commented, because it requires a little adjusting sometimes.
							You'll need to download this plugin, and follow the instructions:
							http://binarybonsai.com/wordpress/time-since/ */
							/* $entry_datetime = abs(strtotime($post->post_date) - (60*120)); $time_since = sprintf(__('%s ago', 'kubrick'), time_since($entry_datetime)); */ ?>
						<?php printf(__('This entry was posted on %1$s at %2$s and is filed under %3$s.', 'kubrick'), get_the_time(__('l, F jS, Y', 'kubrick')), get_the_time(), get_the_category_list(', ')); ?>
						<?php printf(__("You can follow any responses to this entry through the <a href='%s'>RSS 2.0</a> feed.", "kubrick"), get_post_comments_feed_link()); ?> 

						<?php if ( comments_open() && pings_open() ) {
							// Both Comments and Pings are open ?>
							<?php printf(__('You can <a href="#respond">leave a response</a>, or <a href="%s" rel="trackback">trackback</a> from your own site.', 'kubrick'), get_trackback_url()); ?>

						<?php } elseif ( !comments_open() && pings_open() ) {
							// Only Pings are Open ?>
							<?php printf(__('Responses are currently closed, but you can <a href="%s" rel="trackback">trackback</a> from your own site.', 'kubrick'), get_trackback_url()); ?>

						<?php } elseif ( comments_open() && !pings_open() ) {
							// Comments are open, Pings are not ?>
							<?php _e('You can skip to the end and leave a response. Pinging is currently not allowed.', 'kubrick'); ?>

						<?php } elseif ( !comments_open() && !pings_open() ) {
							// Neither Comments, nor Pings are open ?>
							<?php _e('Both comments and pings are currently closed.', 'kubrick'); ?>

						<?php } edit_post_link(__('Edit this entry', 'kubrick'),'','.'); ?>

					</small>
				</p>
				
			</div>
		</div>
		
		
		<?php comments_template(); ?>
		
		<?php endwhile; else: ?>
		
		<p><?php _e('Sorry, no posts matched your criteria.', 'kubrick'); ?></p>
		
		<?php endif; ?>
		
		<div class="fixed-action-btn">
			<span class="btn-floating btn-large blue">
				<i class="large material-icons">share</i>
		</span>
		<ul>
			<li><a class="btn-floating green"><i class="material-icons">email</i></a></li>
			<li><a class="btn-floating pink"><i class="material-icons">insert_link</i></a></li>
			<li><a class="btn-floating blue lighten-1" href="http://twitter.com/intent/tweet?text=Read this blogpost on Technology Students Gymkhana&url=<?php esc_url(the_permalink()); ?>&hashtags=tsg,iitkgp"><i class="icon-twitter"></i></a></li>
			<li><a class="btn-floating facebook-color" target="popup" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=<?php get_post_permalink(); ?>&amp;src=sdkpreparse','popup','width=600,height=600'); return false;" href="https://www.facebook.com/sharer/sharer.php?u=<?php get_post_permalink(); ?>&amp;src=sdkpreparse"><i class="icon-facebook"></i></a></li>
		</ul>
	</div>

	</div>

<?php get_footer(); ?>
