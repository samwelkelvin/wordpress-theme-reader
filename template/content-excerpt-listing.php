<?php

// Displays blogs excerpts for all pages except main blog page aka home

try {
	get_header();

	get_template_part('templates-parts/default', 'header');

	?>
    <section class="content_wrapper">

        <div class="theme_container">

            <div class="row justify-content-center" <?php echo get_theme_mod('blog_pages_sidebar') === 'left_sidebar' ? 'style="flex-wrap: wrap-reverse;"' : '' ?>>

                <?php if (get_theme_mod('show_sidebar_in_blog_pages') && (get_theme_mod('blog_pages_sidebar') === 'left_sidebar')) : ?>

                    <div class="col-md-4 col-lg-3 mb-5 mb-lg-0">

                        <?php get_template_part('templates-parts/page', 'sidebar') ?>

                    </div>

                <?php endif; ?>

                <div class="<?php echo get_theme_mod('show_sidebar_in_blog_pages') ? 'col-md-8 col-lg-9' : 'col-md-10 col-lg-10' ?> mb-5 mb-lg-0">

                    <h3 class="h3 mb-4  py-3"><?php echo  isset($args['page_title']) ? $args['page_title'] : esc_html(get_the_title()); ?></h3>

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
