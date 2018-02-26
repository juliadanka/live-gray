<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Live_Gray
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e('Skip to content', 'live-gray'); ?></a>

    <header id="masthead" class="site-header">
        <div class="row align-middle">
            <div class="columns small-12 medium-12  large-4 site-socials">
                <?php live_gray_socials(); ?>
            </div><!--.column-->
            <div class="column small-12  medium-12  large-4">
                <div class="site-branding">
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="custom-logo-link" rel="home" >
                        <img width="263" height="30"
                             src="<?php echo(get_stylesheet_directory_uri() . '/images/logo.svg'); ?>"
                             alt="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>"
                             class="custom-logo"
                             />
                    </a>
                    <?php
                    if (is_front_page() && is_home()) : ?>
                        <h1 class="site-title screen-reader-text"><?php bloginfo('name'); ?></h1>
                    <?php else : ?>
                        <p class="site-title screen-reader-text"><?php bloginfo('name'); ?></p>
                        <?php
                    endif;
                    $description = get_bloginfo('description', 'display');
                    if ($description || is_customize_preview()) : ?>
                        <p class="site-description screen-reader-text"><?php echo $description; /* WPCS: xss ok. */ ?></p>
                        <?php
                    endif; ?>
                </div><!-- .site-branding -->
            </div><!--.column-->
            <div class="columns small-12 medium-12   large-4 site-navigation">
                <nav id="site-navigation" class="main-navigation">
                    <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span></button>
                    <div class="menus-wrapper">
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'menu-1',
                            'menu_id' => 'primary-menu',
                        ));
                        ?>
                        <?php live_gray_socials(); ?>
                    </div><!-- .menus-wrapper -->
                </nav><!-- #site-navigation -->
            </div><!--.columns -->
        </div><!--.row -->
    </header><!-- #masthead -->

    <div id="content" class="site-content">
