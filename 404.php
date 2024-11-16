    <?php

	try {
		get_header();

		get_template_part('templates-parts/default', 'header');

		?>

        <section class="section">
            <div class="theme_container">
                <div class="row justify-content-center">
                    <?php get_search_form() ?>
                </div>

                <div class="col-lg-12 text-center">
                    <img class="mb-5" src="<?= THEME_DIR_URI ?>/assets/images/no-search-found.svg" alt="">
                    <h3>Page not found</h3>
                </div>

                <div class="col-lg-12">

                    <h5 class="h5 section-title">Recent Post </h5>
                    <?php

						$recent_posts = wp_get_recent_posts(array(
							'numberposts' => 4, // Number of recent posts thumbnails to display
							'post_status' => 'publish' // Show only the published posts
						));

		foreach ($recent_posts as $post_item) : ?>
                        <article class="widget-card">
                            <div class="d-flex">
                                <img class="card-img-sm" src="<?php echo get_the_post_thumbnail_url($post_item['ID'], 'thumbnail') ?>">
                                <div class="ml-3">
                                    <h5><a class="post-title" href="<?php echo get_permalink($post_item['ID']) ?>">
                                            <?php echo $post_item['post_title'] ?>
                                        </a>
                                    </h5>
                                    <ul class="card-meta list-inline mb-0">
                                        <li class="list-inline-item mb-0">
                                            <i class="ti-calendar"></i><?php echo date('F j, Y, g:i a', strtotime($post_item['post_date'])); ?>
                                        </li>
                                    </ul>
                                    <div style="max-width:350px; white-space: nowrap;overflow: hidden;text-overflow: ellipsis;">
                                        <?php echo $post_item['post_content'] ?>
                                    </div>

                                </div>
                            </div>
                        </article>

                    <?php endforeach; ?>

                </div>

            </div>
            </div>
        </section>

    <?php

		get_template_part('templates-parts/default', 'footer');

		get_footer();
	} catch (\Throwable $th) {
		echo $th->getMessage();
	}

?>