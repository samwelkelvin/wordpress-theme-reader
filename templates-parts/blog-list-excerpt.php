<?php

if (isset($args['hasFeatureImage']) && isset($args['excerptWidthClass'])) {
	$hasFeaturedImage = $args['hasFeatureImage'];

	$excerptWidthClass = $args['excerptWidthClass'];
} else {
	$hasFeaturedImage = false;

	$excerptWidthClass = 'col-md-12';
}
?>

<article class="card mb-4">
    <div class="row card-body">

        <?php if ($hasFeaturedImage) : ?>
            <div class="col-lg-4 mb-4 mb-md-4 mb-lg-0">
                <div class="post-slider slider-sm slick-initialized slick-slider">
                    <div class="slick-list draggable">
                        <div class="slick-track" style="opacity: 1;">
                            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                <img src="<?php echo get_the_post_thumbnail_url($post, 'medium') ?>" class="img-fluid card-img list_excerpt_thumbnail" alt="<?php the_title(); ?>" style="object-fit: cover;" aria-hidden="false">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <div class="<?= $excerptWidthClass ?>">
            
            <h3 class="h4 mb-3"><a class="post-title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
           
            <?php if (get_post_type(get_the_ID()) === 'post') : ?>

                <ul class="card-meta list-inline">
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
                        <ul class="card-meta-tag pl-0 pt-0">

                            <?php the_tags('<li class="list-inline-item">', '</li><li class="list-inline-item">', '</li>'); ?>

                        </ul>
                    </li>
                </ul>

            <?php endif; ?>

            <p><?php the_excerpt(); ?></p>

            <a href="<?php the_permalink(); ?>" class="btn btn-outline-primary"><?php echo (get_post_type(get_the_ID()) === 'post') ? 'Read more' : 'Visit page' ?> <i class="ti-arrow-right"></i></a>
        
        </div>
    </div>
</article>