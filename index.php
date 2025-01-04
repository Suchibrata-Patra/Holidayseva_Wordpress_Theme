<?php 
    // Output the URL of the theme directory (alternative method)
    echo get_template_directory_uri();
    echo '<br>';
    
    // Alternative method (commented out)
    // bloginfo('template_directory');
    
    // Get the header
    get_header(); 
?>
    <div>
        <h1>This page Comes from index.php</h1>
        
        <!-- Output the content of the current post or page -->
        <?php
        if (have_posts()) : 
            while (have_posts()) : the_post(); 
                the_content(); // This outputs the content of the post/page
            endwhile;
        else : 
            echo '<p>No content found</p>';
        endif;
        ?>
    </div>
    
<?php 
    // Get the footer
    get_footer();
?>
