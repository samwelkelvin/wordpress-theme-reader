<?php

/**
 *
 * Displays blogs are list
 *
 */

if (have_posts()):

	//check if page is to diaplay grid or list

	$displayContainerClass = '';

	if (!get_theme_mod('show_sidebar_in_blog_pages') && get_theme_mod('blog-layout') === 'list') {
		$displayContainerClass =  'col-lg-10 mx-auto';

		$featuredImg = 'lg-featureImaged';
	} else {
		$displayContainerClass = (get_theme_mod('blog-layout') === 'grid') ? 'col-md-12 col-lg-6' : 'col-lg-12';
	}
?>

    <div class="row" <?php echo get_theme_mod('blog-layout') === 'grid' && get_theme_mod('blog_pages_sidebar') === 'right_sidebar' && get_theme_mod('show_sidebar_in_blog_pages') ? 'style="justify-content: flex-end;"' : ''; ?>>

        <?php
		while (have_posts()) : the_post();

			if (has_post_thumbnail($post)) {
				$featuredImageClass = 'featuredImage';
			} else {
				$featuredImageClass = 'noFeaturedImage';
			}
			?>

            <div class="<?php echo $displayContainerClass ?> d-flex">
                <article class="card mb-4" style="width: 100%;">
                    <div class="post-slider slick-initialized slick-slider">
                        <div class="slick-list draggable">
                            <div class="slick-track <?php echo $featuredImageClass . ' ' . $featuredImg ?>" style="opacity: 1; max-width:100%;">

                                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                    <img src="<?php echo get_the_post_thumbnail_url($post, 'large') ?>" class="card-img-top" alt="<?php the_title(); ?>" aria-hidden="false" tabindex="0" style="width: 100%;">
                                </a>

                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h3 class="mb-3"><a class="post-title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>


                        <ul class="card-meta list-inline">
                            <!-- <li class="list-inline-item">
                                <a href="<?php the_permalink(); ?>" class="card-meta-author">
                                    <?php echo get_avatar(get_the_author_meta('ID')); ?>
                                    <span><?php the_author() ?></span>
                                </a>
                            </li> -->
                            <li class="list-inline-item">
                                <span class="card-meta-author">
                                    <?php echo get_avatar(get_the_author_meta('ID')); ?>
                                </span>
                                <?php echo get_the_author_posts_link(); ?> (<?php echo get_the_author_posts(); ?> Posts)
                            </li>
                            <li class="list-inline-item">
                                <i class="ti-comments"></i> <?php comments_number(); ?>
                            </li>
                            <li class="list-inline-item">
                                <i class="ti-calendar"></i> <?php the_date(); ?> at <?php the_time()  ?>
                            </li>
                            <li class="list-inline-item">
                                <ul class="card-meta-tag pl-0">

                                    <?php the_tags('<li class="list-inline-item">', '</li><li class="list-inline-item">', '</li>'); ?>

                                </ul>
                            </li>
                        </ul>

                        <?php the_excerpt(); ?>

                        <a href="<?php the_permalink(); ?>" class="btn btn-outline-primary">Read More</a>

                    </div>
                </article>
            </div>

        <?php

		endwhile;

//the_post_navigation();

?>
    </div>
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
	echo '<h3>No data found </h3>';
endif;
?>