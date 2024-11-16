<?php

// Template Name: Full width page (new) - right sidebar

get_header();

get_template_part('templates-parts/full', 'page-header');
?>


<div class="content_wrapper">
    <div class="row justify-content-center">

        <div class="col-md-8 col-lg-9 mb-5 mb-lg-0">
            <h2 class="h5 section-title">Recent Post</h2>

            <?php

			if (have_posts()):
				while (have_posts()) : the_post();

					echo '<h1>';
					the_title();
					echo '</h1>';
					the_content();

				endwhile;
			else:
				echo '<h3>Page data </h3>';
			endif;

?>

        </div>

        <div class="col-md-4 col-lg-3 ">

            <?php get_template_part('templates-parts/page', 'sidebar') ?>

        </div>


    </div>
</div>


<?php

get_template_part('templates-parts/full', 'page-footer');

get_footer();
