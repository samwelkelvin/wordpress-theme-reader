<?php

/**
 *
 * Didplays  posts based on aurthor
 *
 */

?>
<style>
    .author {
        padding: 0 !important;
    }
</style>

<?php

try {
	get_header();

	get_template_part('templates-parts/default', 'header');

	?>

    <section class="content_wrapper">

        <div class="container py-4">
            <div class="row no-gutters justify-content-center">
                <div class="col-lg-3 col-md-4 mb-4 mb-md-0">

                    <img class="author-image" src="<?php echo get_avatar_url(get_the_author_meta('ID'), array('size' => 450)); ?>" alt="Aurthor">

                </div>
                <div class="col-md-8 col-lg-6 text-center text-md-left">
                    <h3 class="mb-2"><?php the_author() ?></h3>
                    <div class="content mb-4">
                        <?php echo get_the_author_meta('user_description') ?>
                    </div>

                    <a class="post-count mb-1" href="#"><i class="ti-pencil-alt mr-2"></i><span class="text-primary"><b> <?php echo get_the_author_posts(); ?> </b></span> Posts by this author</a>

                    <?php echo reader_get_user_social_links(); ?>

                </div>
            </div>
        </div>

        <div class="theme_container">

            <div class="row justify-content-center" <?php echo get_theme_mod('blog_pages_sidebar') === 'left_sidebar' ? 'style="flex-wrap: wrap-reverse;"' : '' ?>>

                <?php if (get_theme_mod('show_sidebar_in_blog_pages') && (get_theme_mod('blog_pages_sidebar') === 'left_sidebar')) : ?>

                    <div class="col-md-4 col-lg-3 mb-5 mb-lg-0">

                        <?php get_template_part('templates-parts/page', 'sidebar') ?>

                    </div>

                <?php endif; ?>

                <div class="<?php echo get_theme_mod('show_sidebar_in_blog_pages') ? 'col-md-8 col-lg-9' : 'col-md-10 col-lg-10' ?> mb-5 mb-lg-0">

                    <h3 class="h3 mb-4  py-3">
                        Posts by : <mark> <?php echo esc_html(get_the_author()) ?></mark>
                    </h3>

                    <?php

						if (have_posts()):
							while (have_posts()) : the_post();

								if (has_post_thumbnail($post)) {
									$hasFeaturedImage = true;

									$excerptWidthClass = 'col-lg-8';
								} else {
									$hasFeaturedImage = false;
									$excerptWidthClass = 'col-sm-12';
								}

								get_template_part('templates-parts/blog', 'list-excerpt', array('hasFeatureImage' => $hasFeaturedImage, 'excerptWidthClass' => $excerptWidthClass));

							endwhile;

	//the_post_navigation();

	?>
                        <ul class="pagination justify-content-center">

                            <?php the_posts_pagination(
                            	array(
                            		'prev_text'          => __('« Previous'),
                            		'next_text'          => __('Next »'),
                            	)
                            ); ?>

                        </ul>
                    <?php
                            				else:
                            					?>
                        <div class="col-lg-10 text-center">
                            <img class="mb-5" src="<?= THEME_DIR_URI ?>/assets/images/no-search-found.svg" alt="Not found">
                            <h3>Nothing Found</h3>
                        </div>

                    <?php endif; ?>


                </div>

                <?php if (get_theme_mod('show_sidebar_in_blog_pages') && (get_theme_mod('blog_pages_sidebar') === 'right_sidebar')) : ?>

                    <div class="col-md-4 col-lg-3 mb-5 mb-lg-0">

                        <?php get_template_part('templates-parts/page', 'sidebar') ?>

                    </div>

                <?php endif; ?>

            </div>
    </section>

<?php

	get_template_part('templates-parts/default', 'footer');

	get_footer();
} catch (\Throwable $th) {
	echo $th->getMessage();
}
