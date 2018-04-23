<?php
get_header();
?>
 <?php
	
	
	add_theme_support('post-thumbnails');
		
?>
this is the plugin single template 
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); 
global $post;
$custom = get_post_custom($post->ID);
$staff_directory_full_bio = $custom["staff_directory_full_bio"][0];

$post_id = get_the_ID(); 
 ?>

    <b>Post Title:</b><?php the_title(sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>'); ?><br>
	<b>Bio: </b><?php  echo $staff_directory_full_bio; ?><br><br><br>
	<?php  the_post_thumbnail()?> 
<?php endwhile; else : ?>
	<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>