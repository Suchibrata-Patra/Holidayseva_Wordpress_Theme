<?php
//Template Name: Blog Post
?>
<?php get_header();?>
<?php
	while(have_posts()){
		the_post();
				$imagepath = wp_get_attachment_image_src(get_post_thumbnail_id(),'large');
?>
	<div>
		<img src="<?php echo $imagepath[0] ?>">
		<h2><?php the_title(); ?></h2>
		<?php echo get_the_date(); ?>
		<?php echo get_the_excerpt(); ?>
	</div>
	
<?php
} 
?>

