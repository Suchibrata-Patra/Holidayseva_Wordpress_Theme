<?php 
    // echo get_template_directory_uri();
    echo '<br>';
    // bloginfo('template_directory');
    get_header();
    get_post();
?>
<body>
   This page Comes from index.php
   
   <?php the_title(); ?>
   <?php the_content(); ?>
</body>
</html>