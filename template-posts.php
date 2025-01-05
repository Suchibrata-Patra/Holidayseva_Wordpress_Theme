<?php
//Template Name: Blog Post
?>
<?php get_header(); ?>

<?php
  while (have_posts()) {
    the_post();
    ?>
    <div class="post">
      <!-- Check if the post has a featured image -->
      <?php if (has_post_thumbnail()): ?>
        <div class="post-thumbnail">
          <?php the_post_thumbnail('medium'); ?>
        </div>
      <?php else: ?>
        <p>No featured image</p>
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
