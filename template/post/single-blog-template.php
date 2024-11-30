<?php

// Displays details of single blog post

$style = '';

$blogClasses = 'col-md-12';

$sideClasses = '';

$commentForm = '';

$container = 'container';

if (get_theme_mod('blog_pages_sidebar') === 'left_sidebar' || !get_theme_mod('show_sidebar_in_blog_pages')) {
	$style = 'style="flex-wrap: wrap-reverse;";';

	$commentForm = 'style="justify-content:flex-end";';
}

if (get_theme_mod('show_sidebar_in_blog_pages')) {
	$blogClasses = 'col-md-9 col-lg-9';

	$sideClasses = 'col-md-3 col-lg-3';

	$container = 'theme_container';
}

?>

<style>
    .blog article {
        width: 100%;
        overflow-x: hidden;
    }

    .blog article .content p {
        line-height: 2.5rem;
        font-size: 16px;
    }

    .content {
        margin-bottom: 40px
    }

    .content img{
        width: 100%;
        height: auto;
    }

</style>
<div class="py-2"></div>

<section class="section" style="padding-top: 10px;">
    <div class="<?php echo $container ?>">

        <div class="row" <?php echo $style; ?>>

            <?php if (get_theme_mod('show_sidebar_in_blog_pages') && get_theme_mod('blog_pages_sidebar') === 'left_sidebar') : ?>
                <!-- sidebar -->
                <div class="<?php echo $sideClasses ?>">

                    <?php get_template_part('templates-parts/page', 'sidebar') ?>

                </div>

            <?php endif; ?>

            <div class="<?php echo $blogClasses ?> mb-5  blog">
                <article>

                    <?php if (get_the_post_thumbnail_url($post, 'full') != null && get_the_post_thumbnail_url($post, 'full') != '') : ?>
                        <div class="featured_img">
                            <img src="<?php echo get_the_post_thumbnail_url($post, 'full') ?>" class="img-fluid card-img-top mb-4 mb-md-4 mb-lg-4" alt="<?php the_title() ?>" aria-hidden="false" style="max-height:650px">
                        </div>
                    <?php endif; ?>

                    <h1 class="h2 blog_title"> <?php the_title() ?> </h1>

                    <ul class="card-meta my-3 list-inline">
                        <li class="list-inline-item">
                            <span class="card-meta-author">
                                <?php echo get_avatar(get_the_author_meta('ID')); ?>
                            </span>
                            <?php echo get_the_author_posts_link(); ?> (<?php echo get_the_author_posts(); ?> Posts)
                        </li>
                        <li class="list-inline-item">
                            <!-- <i class="ti-timer"></i>3 Min To Read -->
                        </li>
                        <li class="list-inline-item">
                            <i class="ti-calendar"></i><?php the_date(); ?>
                        </li>
                        <li class="list-inline-item post_tags">
                            <ul class="card-meta-tag list-inline">
                                <?php the_tags('<li class="list-inline-item">', '</li><li class="list-inline-item">', '</li>'); ?>
                            </ul>
                        </li>
                    </ul>

                    <ul class="card-meta my-3 list-inline">
                        <li class="list-inline-item">
                            <ul class="card-meta-tagj list-inline">
                                <li class="list-inline-item">
                                    <b>Post Category </b>
                                </li>

                                <?php
								$postcat = get_the_category($post->ID);

if (!empty($postcat)) {
	foreach ($postcat  as $nameCategory) {
		echo '<li class="list-inline-item">' . $nameCategory->name . ' </li>';
	}
}
?>
                            </ul>
                        </li>
                    </ul>
                    <div class="content">

                        <?php if (has_post_format('video')) : ?>

                            <style>
                                iframe {
                                    position: absolute;
                                    top: 0;
                                    left: 0;
                                    width: 100%;
                                    height: 100%;
                                    border: 0;
                                }

                                .featured_img,
                                .post_tags {
                                    display: none;
                                }
                            </style>

                            <div style="position: relative;padding-bottom: 56.25%;height: 0;overflow: hidden;">
                                <?php the_content(); ?>
                                <!-- <iframe src="https://www.youtube.com/embed/C0DPdy98e4c" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; border:0;" allowfullscreen="" title="YouTube Video"></iframe> -->
                            </div>

                        <?php else: ?>

                            <?php the_content(); ?>

                        <?php endif; ?>

                        <?php if (has_post_format('image')) : ?>

                            <style>
                                .content {
                                    display: flex;
                                    justify-content: center;
                                }

                                .featured_img,
                                .post_tags {
                                    display: none;
                                }
                            </style>
                        <?php endif; ?>



                        <?php

						// if (has_post_format('audio')) {
						//     echo 'this is the audio format';
						// }
						// if (has_post_format('chat')) {
						//     echo 'this is the chat format';
						// }
						// if (has_post_format('status')) {
						//     echo 'this is the status format';
						// }
						// if (has_post_format('quote')) {
						//     echo 'this is the quote format';
						// }

						// if (has_post_format('link')) {
						//     echo 'this is the link format';
						// }
						// if (has_post_format('gallery')) {
						//     echo 'this is the gallery format';
						// }
						// if (has_post_format('aside')) {
						//     echo 'this is the aside format';
						// }

?>



                    </div>

                    <ul class="single_post_pagnation pagination justify-content-center">

                        <?php

previous_post_link();

next_post_link();

?>

                    </ul>

                </article>

                <div class="mt-5">
                    <div class="mb-5 border-top mt-4 pt-5">
                        <div class="row-" <?php echo $commentForm ?>>

                            <?php

	//include comments templates
	if (comments_open() || get_comments_number()) :

		comments_template();

	else:
		?>
                                <p class="no-comments alert alert-info"><?php esc_html_e('Comments are disabled for this post.', 'reader'); ?></p>
                            <?php
	endif;

?>
                        </div>
                    </div>
                </div>

            </div>

            <?php if (get_theme_mod('show_sidebar_in_blog_pages') && get_theme_mod('blog_pages_sidebar') === 'right_sidebar') : ?>
                <!-- sidebar -->
                <div class="<?php echo $sideClasses ?>">

                    <?php get_template_part('templates-parts/page', 'sidebar') ?>

                </div>

            <?php endif; ?>

        </div>
    </div>
</section>