<?php get_header(); ?>
    <h1> <?php the_title(); ?> </h1>
    <div style="display:flex;">
        <?php the_post_thumbnail(array(100, 100)); // Other resolutions (height, width)?>
        <?php $imagepath = wp_get_attachment_image_src(get_post_thumbnail_id(),'large');?>
        <div> <?php the_content(); ?> </div>
    </div>
    <!-- The Following Portion is Completely for Page Speed -->
    <br><br>
    <div id="stats"><p><strong>Page Load time</strong> <span id="dom-content-loaded"></span></p></div>
    <script src="<?php echo get_template_directory_uri();?>/Assets/javascript/PageSpeed.js" defer></script>
</body>
</html>
This Content is Getting Fetched From Page.php<br>
<?php get_sidebar(); ?>