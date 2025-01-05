<?php
// Template Name: Blog Post
?>
<?php get_header(); ?>

<?php
  // Custom query to fetch multiple posts
  $args = array(
    'posts_per_page' => 2,  // Show all posts
  );
  $query = new WP_Query($args);

  // The loop to display posts
  if ($query->have_posts()) :
    while ($query->have_posts()) :
      $query->the_post();
      // Get the post's featured image URL
      $imagepath = wp_get_attachment_image_src(get_post_thumbnail_id(), 'medium');
      ?>
      <div class="post">
        <!-- Check if the post has a featured image -->
        <?php if ($imagepath): ?>
          <img src="<?php echo esc_url($imagepath[0]); ?>" alt="<?php the_title(); ?>" width="50">
        <?php endif; ?>
        
        <h2><?php the_title(); ?></h2>

        <!-- Display the post's publish date -->
        <p class="post-date"><?php echo get_the_date(); ?></p>

        <!-- Display the post's excerpt -->
        <p class="post-excerpt"><?php echo get_the_excerpt(); ?></p>
      </div>
    <?php endwhile; ?>
  <?php endif; ?>
  
  <!-- Reset post data after custom query -->
  <?php wp_reset_postdata(); ?>

<?php get_footer(); ?>
