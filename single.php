<?php 
    // echo get_template_directory_uri();
    echo '<br>';
    // bloginfo('template_directory');
    get_header();
    get_post();
?>
<body>
   This page Comes from index.php
   
  <strong>
  <?php the_title(); ?>
  </strong>
   <?php the_content(); ?>
</body>
</html>