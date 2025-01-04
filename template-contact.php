<?php
// Template Name: Contact
?>
<?php get_header(); ?>

<?php
  // Check if we have content for the current page
  if(have_posts()) {
    while(have_posts()) {
      the_post();
      $imagepath = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large');
?>

      <div>
        <?php if ($imagepath): ?>
          <img src="<?php echo esc_url($imagepath[0]); ?>" alt="<?php the_title(); ?>">
        <?php endif; ?>
        <h2><?php the_title(); ?></h2>
        <p><?php echo get_the_date(); ?></p>
        <p><?php the_excerpt(); ?></p>
        <?php the_content(); ?>
      </div>

<?php 
    }
  } else {
    echo '<p>No content found.</p>';
  }
?>

<?php get_footer(); ?>
