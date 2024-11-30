<?php

// Displays blog posts

$style = '';

if (get_theme_mod('blog_pages_sidebar') === 'left_sidebar') {
	$style = 'style="flex-wrap: wrap-reverse";';
}

var_dump(get_theme_mod('blog_pages_sidebar'));
?>

<style>
    @media screen and (min-width:991px) {
        .lg-featureImaged {
            height: 550px;
        }
    }
</style>

<?php if (get_theme_mod('show_sidebar_in_blog_pages')) : ?>

    <div class="section" style="padding-top: 10px;">

        <div class="theme_container">

            <div class="row justify-content-center <?php echo  get_theme_mod('blog-layout') === 'grid' ? '' : 'blogs_container_wrapper'; ?>" <?php echo $style; ?>>

                <!-- if configured to show sidebar on left -->
                <?php if (get_theme_mod('blog_pages_sidebar') === 'left_sidebar'): ?>

                    <!-- sidebar -->
                    <div class="col-md-4 <?php echo  get_theme_mod('blog-layout') === 'grid' ? 'col-lg-3' : 'col-lg-4' ?>">

                        <?php get_template_part('templates-parts/page', 'sidebar') ?>

                    </div>

                <?php endif; ?>
                <div class="col-md-8 <?php echo  get_theme_mod('blog-layout') === 'grid' ? 'col-lg-9' : 'col-lg-8' ?>  mb-5 mb-lg-0">
                    <h2 class="h5 section-title">Blog Posts</h2>
                    <?php

					get_template_part('templates-parts/blog', 'posts');

	?>
                </div>

                <!-- if configured to show sidebar on right -->
                <?php if (get_theme_mod('blog_pages_sidebar') === 'right_sidebar' || !get_theme_mod('blog_pages_sidebar')): ?>
                    <!-- sidebar -->
                    <div class="col-md-4  <?php echo  get_theme_mod('blog-layout') === 'grid' ? 'col-lg-3' : 'col-lg-4' ?>">

                        <?php get_template_part('templates-parts/page', 'sidebar') ?>

                    </div>

                <?php endif; ?>
            </div>

        </div>
    </div>

<?php else: ?>

    <div class="section">
        <div class="<?php echo get_theme_mod('blog-layout') === 'grid' ? 'theme_container' : 'container'; ?>">

            <div class="row justify-content-center">

                <div class="mb-5 mb-lg-0">
                    <h2 class="h5 section-title">Recent Post</h2>

                    <?php

	get_template_part('templates-parts/blog', 'posts', $args);

	?>
                </div>
            </div>

        </div>
    </div>

<?php endif; ?>