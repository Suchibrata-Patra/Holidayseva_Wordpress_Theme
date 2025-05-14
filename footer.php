<footer id="site-footer" class="site-footer">
    <div class="footer-container">
        <div class="footer-brand">
            <h2><?php bloginfo('name'); ?></h2>
            <p><?php bloginfo('description'); ?></p>
        </div>

        <div class="footer-nav">
            <h3>Quick Links</h3>
            <a href="#" aria-label="Facebook">Facebook</a> |
            <a href="#" aria-label="Twitter">Twitter</a> |
            <a href="#" aria-label="LinkedIn">LinkedIn</a>
            <?php wp_nav_menu(array(
                'theme_location' => 'footer-menu',
                'menu_class' => 'footer-menu',
                'fallback_cb' => false
            )); ?>
        </div>

        <div class="footer-contact">
            <h3>Contact</h3>
            <p>Email: <a href="mailto:info@example.com">info.offial@holidayseva.com</a></p>
            <p>Phone: <a href="tel:+911234567890">+91 8145302135</a></p>
        </div>

        <div class="footer-social">
            <h3>Follow Us</h3>
            <a href="#" aria-label="Facebook">Facebook</a> |
            <a href="#" aria-label="Twitter">Twitter</a> |
            <a href="#" aria-label="LinkedIn">LinkedIn</a>
        </div>
    </div>

    <!-- <div class="footer-bottom">
        <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved.</p>
    </div> -->
</footer>

<style>
.site-footer {
    background-color:#F5F5F7;
    color:black;
    padding: 40px 20px 20px;
}
.footer-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    gap: 30px;
    max-width: 1200px;
    margin: 0 auto;
}
.site-footer h2,
.site-footer h3 {
    margin-top: 0;
    color:rgb(35, 35, 35);
    font-weight: 400;
}
.site-footer a {
    color:grey;
    text-decoration: none;
    font-weight: 300;
}
.site-footer a:hover {
    text-decoration: underline;
}
.footer-nav .footer-menu {
    list-style: none;
    padding: 0;
    margin: 0;
}
.footer-nav .footer-menu li {
    margin: 5px 0;
}
.footer-contact,
.footer-brand,
.footer-nav,
.footer-social {
    flex: 1 1 200px;
    min-width: 200px;
}
.footer-bottom {
    text-align: center;
    border-top: 1px solid #333;
    margin-top: 20px;
    padding-top: 20px;
    font-size: 1rem;
}
@media screen and (max-width: 768px) {
    .footer-container {
        flex-direction: column;
        align-items: flex-start;
    }
}
</style>
<?php wp_footer(); ?>
</body>
</html>
