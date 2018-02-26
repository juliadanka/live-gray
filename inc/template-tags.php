<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Live_Gray
 */

if (!function_exists('live_gray_posted_on')) :
    /**
     * Prints HTML with meta information for the current post-date/time.
     */
    function live_gray_posted_on()
    {
        $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
        if (get_the_time('U') !== get_the_modified_time('U')) {
            $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
        }

        $time_string = sprintf($time_string,
            esc_attr(get_the_date('c')),
            esc_html(get_the_date()),
            esc_attr(get_the_modified_date('c')),
            esc_html(get_the_modified_date())
        );

        $posted_on = sprintf(
        /* translators: %s: post date. */
            esc_html_x('Posted on %s', 'post date', 'live-gray'),
            '<a href="' . esc_url(get_permalink()) . '" rel="bookmark">' . $time_string . '</a>'
        );

        echo '<span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.

    }
endif;

if (!function_exists('live_gray_posted_by')) :
    /**
     * Prints HTML with meta information for the current author.
     */
    function live_gray_posted_by()
    {
        $byline = sprintf(
        /* translators: %s: post author. */
            esc_html_x('by %s', 'post author', 'live-gray'),
            '<span class="author vcard"><a class="url fn n" href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">' . esc_html(get_the_author()) . '</a></span>'
        );

        echo '<span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

    }
endif;

if (!function_exists('live_gray_entry_footer')) :
    /**
     * Prints HTML with meta information for the categories, tags and comments.
     */
    function live_gray_entry_footer()
    {
        // Hide category and tag text for pages.
        if ('post' === get_post_type()) {
            /* translators: used between list items, there is a space after the comma */
            $categories_list = get_the_category_list(esc_html__(', ', 'live-gray'));
            if ($categories_list) {
                /* translators: 1: list of categories. */
                printf('<span class="cat-links">' . esc_html__('Posted in %1$s', 'live-gray') . '</span>', $categories_list); // WPCS: XSS OK.
            }

            /* translators: used between list items, there is a space after the comma */
            $tags_list = get_the_tag_list('', esc_html_x(', ', 'list item separator', 'live-gray'));
            if ($tags_list) {
                /* translators: 1: list of tags. */
                printf('<span class="tags-links">' . esc_html__('Tagged %1$s', 'live-gray') . '</span>', $tags_list); // WPCS: XSS OK.
            }
        }

        if (!is_single() && !post_password_required() && (comments_open() || get_comments_number())) {
            echo '<span class="comments-link">';
            comments_popup_link(
                sprintf(
                    wp_kses(
                    /* translators: %s: post title */
                        __('Leave a Comment<span class="screen-reader-text"> on %s</span>', 'live-gray'),
                        array(
                            'span' => array(
                                'class' => array(),
                            ),
                        )
                    ),
                    get_the_title()
                )
            );
            echo '</span>';
        }

        edit_post_link(
            sprintf(
                wp_kses(
                /* translators: %s: Name of current post. Only visible to screen readers */
                    __('Edit <span class="screen-reader-text">%s</span>', 'live-gray'),
                    array(
                        'span' => array(
                            'class' => array(),
                        ),
                    )
                ),
                get_the_title()
            ),
            '<span class="edit-link">',
            '</span>'
        );
    }
endif;

if (!function_exists('live_gray_post_thumbnail')) :
    /**
     * Displays an optional post thumbnail.
     *
     * Wraps the post thumbnail in an anchor element on index views, or a div
     * element when on single views.
     */
    function live_gray_post_thumbnail()
    {
        if (post_password_required() || is_attachment() || !has_post_thumbnail()) {
            return;
        }

        if (is_singular()) :
            ?>

            <div class="post-thumbnail">
                <?php the_post_thumbnail(); ?>
            </div><!-- .post-thumbnail -->

        <?php else : ?>

            <a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
                <?php
                the_post_thumbnail('post-thumbnail', array(
                    'alt' => the_title_attribute(array(
                        'echo' => false,
                    )),
                ));
                ?>
            </a>

        <?php endif; // End is_singular().
    }
endif;


if (!function_exists('live_gray_socials')) :
    /**
     * Displays socials links.
     */
    function live_gray_socials()
    {

        $facbook_link = esc_url(get_theme_mod('live_gray_facebook_url', '#'));
        $instagram_link = esc_url(get_theme_mod('live_gray_instagram_url', '#'));
        $twitter_link = esc_url(get_theme_mod('live_gray_twitter_url', '#'));
        $linkedin_link = esc_url(get_theme_mod('live_gray_linkedin_url', '#'));
        $pinterest_link = esc_url(get_theme_mod('live_gray_pinterest_url', '#'));
        ?>
        <ul class="social-list">
            <?php if (!empty($facbook_link)): ?>
                <li><a href="<?php echo $facbook_link; ?>" class="button-facebook" title="Facebook"
                       target="_blank"><i class="icon-facebook"></i></a></li>
            <?php endif; ?>
            <?php if (!empty($instagram_link)): ?>
                <li><a href="<?php echo $instagram_link; ?>" class="button-instagram"
                       title="Instagram" target="_blank"><i class="icon-instagram"></i></a></li>
            <?php endif; ?>
            <?php if (!empty($twitter_link)): ?>
                <li><a href="<?php echo $twitter_link; ?>" class="button-twitter" title="Twitter"
                       target="_blank"><i class="icon-twitter"></i></a></li>
            <?php endif; ?>
            <?php if (!empty($linkedin_link)): ?>
                <li><a href="<?php echo $linkedin_link; ?>" class="button-linkedin"
                       title="LinkedIn" target="_blank"><i class="icon-linkedin"></i></a></li>
            <?php endif; ?>
            <?php if (!empty($pinterest_link)): ?>
                <li><a href="<?php echo $pinterest_link; ?>" class="button-pinterest"
                       title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a></li>
            <?php endif; ?>
        </ul><!--.social-list -->
        <?php
    }
endif;
