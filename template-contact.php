<?php
//Template Name: Contact
?>
<?php get_header();?>
<?php
   the_post();
	while(have_posts()){
		the_post();
				$imagepath = wp_get_attachment_image_src(get_post_thumbnail_id(),'large');
?>
	<div>
		<img src="<?php echo $imagepath?>">
		<h2><?php the_title(); ?></h2>
		<?php echo get_the_date(); ?>
		<?php echo get_the_excerpt(); ?>
	</div>
	
<?php
} 
?>