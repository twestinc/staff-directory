<?php
/*
Template Name: Archive Template
 */
 ?>
<?php
get_header();
?>
this is the plugin archive template 
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); 
global $post;
$custom = get_post_custom($post->ID);
$staff_directory_biography = $custom["staff_directory_biography"][0];?>
     <br> <br> <br>
    <b>Post Title:</b><?php the_title(sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>'); ?><br>
	<b>Bio: </b><?php  echo $staff_directory_biography; ?><br><br><br>
	<?php  the_post_thumbnail()?> 
<?php endwhile; else : ?>
	<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>