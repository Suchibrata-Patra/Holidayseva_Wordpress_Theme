<?php
//Template Name: Blog Post
?>
<?php get_header(); ?>
<?php the_post(); ?>

<?php
  while (have_posts()) {
    the_post();
    // Get the post's featured image URL
    $imagepath = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large');
    ?>
    <div class="post">
      <!-- Check if the post has a featured image -->
      <?php if ($imagepath): ?>
        <img src="<?php echo esc_url($imagepath[0]); ?>" alt="<?php the_title(); ?>">
      <?php endif; ?>

      <h2><?php the_title(); ?></h2>
      <?php the_content(); ?>

      <!-- Display the post's publish date -->
      <p class="post-date"><?php echo get_the_date(); ?></p>

      <!-- Display the post's excerpt -->
      <p class="post-excerpt"><?php echo get_the_excerpt(); ?></p>
    </div>
  <?php
  }
?>
<?php get_footer(); ?>
