<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Live_Gray
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <div class="entry-content">
        <?php
        if (class_exists('acf')):

        ?>
        <?php
        $live_gray_twitter_description = get_field('live_gray_twitter_description');
        $live_gray_twitter_hash_tag = get_field('live_gray_hash_tag');
        if ($live_gray_twitter_description || $live_gray_twitter_hash_tag) {
            ?>
            <div class="section section-primary  section-twitter ">
                <div class="row" data-aos="zoom-in-up">
                    <div class="column small-12">
                        <?php
                        if ($live_gray_twitter_description) {
                            ?>
                            <p class="section-twitter-description"><?php echo $live_gray_twitter_description; ?></p>
                            <?php
                        }
                        if ($live_gray_twitter_hash_tag) {
                            ?>
                            <p class="section-twitter-hash-tag"><?php echo $live_gray_twitter_hash_tag; ?></p>
                            <?php
                        }
                        ?>
                    </div><!--.row-->
                </div><!--.row-->
            </div><!--.section-->
            <?php
        } ?>
        <?php
        $live_gray_news_title = get_field('live_gray_news_title');
        $live_gray_news_description = get_field('live_gray_news_description');
        $live_gray_news_button_text = get_field('live_gray_news_button_text');
        $live_gray_news_button_link = get_field('live_gray_news_button_link');
        $live_gray_news_video = esc_url(get_field('live_gray_news_video'));
        $live_gray_news_video_poster = get_field('live_gray_news_video_poster');
        if ($live_gray_news_title || $live_gray_news_description || ($live_gray_news_button_text && $live_gray_news_button_link)) {
            ?>
            <div class="section section-news">
                <div class="row">
                    <div class="column small-12 medium-12  large-6" data-aos="fade-right">
                        <?php
                        if ($live_gray_news_video_poster && $live_gray_news_video) {
                            ?>
                            <div class="section-news-image">
                                <a data-fancybox href="<?php echo $live_gray_news_video; ?>" class="video-fancybox">
                                    <i class="icon-play"></i>
                                    <?php echo wp_get_attachment_image($live_gray_news_video_poster, array(502, 334)); ?>
                                </a>
                            </div>
                            <?php
                        } ?>
                    </div><!--.column-->
                    <div class="column small-12 medium-12  large-6" data-aos="fade-left">
                        <?php if ($live_gray_news_title) {
                            ?>
                            <h3 class="section-news-title"><?php echo $live_gray_news_title; ?></h3>
                            <?php
                        }
                        if ($live_gray_news_description) {
                            ?>
                            <div class="section-news-description"><?php echo $live_gray_news_description; ?></div>
                            <?php
                        }
                        if ($live_gray_news_button_text && $live_gray_news_button_link) {
                            ?>
                            <div class="section-news-button-wrapper">
                                <a class="button hollow large"
                                   href="<?php echo esc_url($live_gray_news_button_link); ?>"
                                   target="_blank"><?php echo esc_html($live_gray_news_button_text); ?></a>
                            </div>
                            <?php
                        }
                        ?>
                    </div><!--.column-->
                </div><!--.row-->
            </div><!--.section-->
            <?php
        }
        ?>
        <?php
        $live_gray_info_title = get_field('live_gray_info_title');
        $live_gray_info_subtile = get_field('live_gray_info_subtile');
        $live_gray_info_left_block_title = get_field('live_gray_info_left_block_title');
        $live_gray_info_left_block_subtitle = get_field('live_gray_info_left_block_subtitle');
        $live_gray_info_left_block_description = get_field('live_gray_info_left_block_description');
        $live_gray_info_center_block_title = get_field('live_gray_info_center_block_title');
        $live_gray_info_center_block_subtitle = get_field('live_gray_info_center_block_subtitle');
        $live_gray_info_center_block_description = get_field('live_gray_info_center_block_description');
        $live_gray_info_right_block_title = get_field('live_gray_info_right_block_title');
        $live_gray_info_right_block_subtitle = get_field('live_gray_info_right_block_subtitle');
        $live_gray_info_right_block_description = get_field('live_gray_info_right_block_description');
        if ($live_gray_info_title || $live_gray_info_subtile || ($live_gray_news_button_text && $live_gray_news_button_link)) {
            ?>
            <div class="section section-gray section-info" id="trigger1">
                <div class="row" data-aos="fade-zoom-in" data-aos-offset="200" data-aos-easing="ease-in-sine"
                     data-aos-duration="600">
                    <div class="column small-12">
                        <?php
                        if ($live_gray_info_title) {
                            ?>
                            <h2 class="section-info-title"><?php echo $live_gray_info_title; ?></h2>
                            <?php
                        }
                        if ($live_gray_info_subtile) {
                            ?>
                            <div class="section-info-subtitle"><?php echo $live_gray_info_subtile; ?></div>
                            <?php
                        } ?>
                    </div><!--.column-->
                </div><!--.row-->
                <div class="row ">
                    <?php
                    if ($live_gray_info_left_block_title || $live_gray_info_left_block_subtitle || $live_gray_info_left_block_descrioption) {
                        ?>
                        <div class="column small-12 medium-6  large-4 block-info" data-aos="flip-left"
                             data-aos-duration="1500" data-aos-delay="0">
                            <div class="block-info-header">
                                <h3 class="block-info-title"><?php echo $live_gray_info_left_block_title; ?></h3>
                            </div>
                            <div class="block-info-subtitle"><span
                                        class="block-info-index">01</span><?php echo $live_gray_info_left_block_subtitle; ?>
                            </div>
                            <div class="block-info-description"><?php echo $live_gray_info_left_block_description; ?></div>
                        </div><!--.column-->
                        <?php
                    }
                    if ($live_gray_info_center_block_title || $live_gray_info_center_block_subtitle || $live_gray_info_center_block_description) {
                        ?>
                        <div class="column small-12 medium-6  large-4 block-info" data-aos="flip-left"
                             data-aos-delay="100" data-aos-duration="1500">
                            <div class="block-info-header">
                                <h3 class="block-info-title"><?php echo $live_gray_info_center_block_title; ?></h3>
                            </div>
                            <div class="block-info-subtitle"><span
                                        class="block-info-index">02</span><?php echo $live_gray_info_center_block_subtitle; ?>
                            </div>
                            <div class="block-info-description"><?php echo $live_gray_info_center_block_description; ?></div>
                        </div><!--.column-->
                        <?php
                    }
                    if ($live_gray_info_right_block_title || $live_gray_info_right_block_subtitle || $live_gray_info_right_block_description) {
                        ?>
                        <div class="column small-12 medium-6  large-4 block-info" data-aos="flip-left"
                             data-aos-delay="150" data-aos-duration="1500">
                            <div class="block-info-header">
                                <h3 class="block-info-title"><?php echo $live_gray_info_right_block_title; ?></h3>
                            </div>
                            <div class="block-info-subtitle"><span
                                        class="block-info-index">03</span><?php echo $live_gray_info_right_block_subtitle; ?>
                            </div>
                            <div class="block-info-description"><?php echo $live_gray_info_right_block_description; ?></div>
                        </div><!--.column-->
                        <?php
                    }
                    ?>
                </div><!--.row-->
            </div><!--.section-->
        <?php }
        ?>
        <?php
        $live_gray_testimonial_title = get_field('live_gray_testimonial_title');
        $live_gray_testimonial_description = get_field('live_gray_testimonial_description');
        $live_gray_testimonial_author = get_field('live_gray_testimonial_author');
        $live_gray_testimonial_avatar = get_field('live_gray_testimonial_avatar');
        if ($live_gray_testimonial_title || $live_gray_testimonial_description || $live_gray_testimonial_author || $live_gray_testimonial_avatar) {
            ?>
            <div class="section section-secondary section-testimonial">
                <div class="row">
                    <div class="column small-12 medium-3  large-4" data-aos="fade-zoom-in" data-aos-offset="200"
                         data-aos-easing="ease-in-sine" data-aos-duration="600">
                        <?php
                        if ($live_gray_testimonial_avatar) {
                            ?>
                            <div class="section-testimonial-avatar"><?php echo wp_get_attachment_image($live_gray_testimonial_avatar, array(292, 292)); ?></div>
                            <?php
                        }
                        ?>
                    </div><!--.column-->
                    <div class="column small-12 medium-9  large-8" data-aos="zoom-out-in" data-aos-offset="200"
                         data-aos-easing="ease-in-sine" data-aos-duration="600">
                        <?php
                        if ($live_gray_testimonial_title) {
                            ?>
                            <h2 class="section-testimonial-title"><?php echo $live_gray_testimonial_title; ?></h2>
                            <?php
                        }
                        if ($live_gray_testimonial_description) {
                            ?>
                            <blockquote><?php echo $live_gray_testimonial_description; ?></blockquote>
                            <?php
                        }
                        if ($live_gray_testimonial_author) {
                            ?>
                            <cite><?php echo $live_gray_testimonial_author; ?></cite>
                            <?php
                        }
                        ?>
                    </div><!--.column-->
                </div><!--.row-->
            </div><!--.section-->
            <?php
        } ?>



        <?php
        $live_gray_gallery_title = get_field('live_gray_gallery_title');
        $live_gray_gallery_images = get_field('live_gray_gallery_images');
        if ($live_gray_gallery_title && $live_gray_gallery_images) {
            ?>
            <div class="section section-gallery">
                <div class="row">
                    <div class="column small-12">
                        <?php
                        if ($live_gray_gallery_title) {
                            ?>
                            <h2 class="section-gallery-title" data-aos="fade-zoom-in" data-aos-offset="200"
                                data-aos-easing="ease-in-sine"
                                data-aos-duration="600"><?php echo $live_gray_gallery_title; ?></h2>
                            <?php
                        }
                        if ($live_gray_gallery_images) { ?>
                            <div>
                                <?php
                                echo do_shortcode($live_gray_gallery_images);
                                ?>
                            </div>
                            <?php
                        }
                        ?>
                    </div><!--.column-->
                </div><!--.row-->
            </div><!--.section-->
            <?php
        } ?>
        <?php
        $live_gray_from_title = get_field('live_gray_from_title');
        $live_gray_from_subtitle = get_field('live_gray_from_subtitle');
        $live_gray_from_content = get_field('live_gray_from_content');
        if ($live_gray_from_title || $live_gray_from_subtitle || $live_gray_from_content) {
            ?>
            <div class="section section-gray section-form" data-aos="fade-zoom-in" data-aos-offset="200"
                 data-aos-easing="ease-in-sine" data-aos-duration="600">
                <div class="row">
                    <div class="column small-12">
                        <?php
                        if ($live_gray_from_title || $live_gray_from_subtitle) {
                            ?>
                            <div class="section-header-wrapper">
                                <?php
                                if ($live_gray_from_title) {
                                    ?>
                                    <h2 class="section-form-title"><?php echo $live_gray_from_title; ?></h2>
                                    <?php
                                }
                                if ($live_gray_from_subtitle) {
                                    ?>
                                    <div class="section-form-subtitle"><?php echo $live_gray_from_subtitle; ?></div>
                                    <?php
                                } ?>
                            </div>
                            <?php
                        }
                        if ($live_gray_from_content) {
                            echo do_shortcode($live_gray_from_content);
                        }
                        ?>
                    </div><!--.column-->
                </div><!--.row-->
            </div><!--.section-->
            <?php
        } ?>
    </div><!-- .entry-content -->
    <?php else: ?>
        <div class="section">
            <div class="row">
                <div class="column small-12">
                    <?php the_content();
                    // If comments are open or we have at least one comment, load up the comment template.
                    if (comments_open() || get_comments_number()) :
                        comments_template();
                    endif;
                    ?>
                </div>
            </div>
        </div>
        <?php
    endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
