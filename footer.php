<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Live_Gray
 */

?>

</div><!-- #content -->

<footer id="colophon" class="site-footer">
    <div class="row  align-middle">
        <div class="column small-12 medium-12  large-4">
            <div  class="main-navigation"><?php
                wp_nav_menu(array(
                    'theme_location' => 'menu-2',
                    'menu_id' => 'footer-menu'
                ));
                ?>
            </div><!-- .main-navigation -->
        </div><!--.column-->
        <div class="column small-12 medium-12  large-4">
            <?php live_gray_socials(); ?>
        </div><!--.column-->
        <div class="column small-12 medium-12  large-4">
            <div class="site-info">
                <?php
                $dateObj = new DateTime;
                $year = $dateObj->format("Y");
                printf('%2$s &copy; %1$s ', $year, get_bloginfo('name'));
                ?>
                <span class="sep"> | </span>
                <span>
                <?php
                /* translators: 1: Theme name, 2: Theme author. */
                printf(esc_html__('design by %2$s', 'live-gray'), 'live-gray', '<a href="http://214.co/" target="_blank">214</a>');
                ?></span>
            </div><!-- .site-info -->
        </div><!--.column-->
    </div><!--.row-->
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
