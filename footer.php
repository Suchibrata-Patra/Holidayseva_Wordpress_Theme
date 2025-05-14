<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @package YourThemeName
 */
?>

<footer id="site-footer" class="site-footer">
    <div class="footer-wrapper">
        <div class="footer-grid">

            <div class="footer-brand">
                <h2 class="brand-title"><?php bloginfo('name'); ?></h2>
                <p class="brand-description"><?php bloginfo('description'); ?></p>
            </div>

            <div class="footer-section">
                <h3 class="section-title">Company</h3>
                <?php wp_nav_menu(array(
                    'theme_location' => 'footer-menu',
                    'menu_class' => 'footer-menu',
                    'container' => false,
                    'fallback_cb' => false
                )); ?>
            </div>

            <div class="footer-section">
                <h3 class="section-title">Contact</h3>
                <ul class="contact-info">
                    <li>Email: <a href="mailto:info@example.com">info@example.com</a></li>
                    <li>Phone: <a href="tel:+911234567890">+91 123 456 7890</a></li>
                    <li>Address: 123 Business St, Kolkata, IN</li>
                </ul>
            </div>

            <div class="footer-section">
                <h3 class="section-title">Follow Us</h3>
                <ul class="social-links">
                    <li><a href="#" aria-label="Facebook">Facebook</a></li>
                    <li><a href="#" aria-label="Twitter">Twitter</a></li>
                    <li><a href="#" aria-label="LinkedIn">LinkedIn</a></li>
                </ul>
            </div>

        </div>

        <div class="footer-bottom">
            <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved.</p>
            <p class="credit-line">Crafted with strategy & style.</p>
        </div>
    </div>
</footer>

<style>
.site-footer {
    background-color: #0f0f0f;
    color: #ccc;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    font-size: 15px;
    padding-top: 60px;
    padding-bottom: 40px;
    line-height: 1.6;
}

.footer-wrapper {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
}

.footer-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
    gap: 40px;
    margin-bottom: 40px;
}

.footer-brand {
    grid-column: span 2;
}

.brand-title {
    font-size: 22px;
    color: #fff;
    margin-bottom: 10px;
}

.brand-description {
    font-size: 14px;
    color: #aaa;
}

.footer-section {
    display: flex;
    flex-direction: column;
}

.section-title {
    font-size: 16px;
    color: #fff;
    margin-bottom: 15px;
    font-weight: 600;
    text-transform: uppercase;
}

.footer-menu,
.contact-info,
.social-links {
    list-style: none;
    padding: 0;
    margin: 0;
}

.footer-menu li,
.contact-info li,
.social-links li {
    margin-bottom: 8px;
}

.footer-menu li a,
.contact-info a,
.social-links a {
    color: #ccc;
    text-decoration: none;
    transition: color 0.2s ease;
}

.footer-menu li a:hover,
.contact-info a:hover,
.social-links a:hover {
    color: #ffffff;
}

.footer-bottom {
    border-top: 1px solid #333;
    padding-top: 20px;
    text-align: center;
    font-size: 13px;
    color: #888;
}

.credit-line {
    margin-top: 5px;
    font-style: italic;
}

@media screen and (max-width: 768px) {
    .footer-brand {
        grid-column: span 1;
    }
}
</style>

<?php wp_footer(); ?>
</body>
</html>