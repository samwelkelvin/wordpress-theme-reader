<?php

// Template Name: Default theme template (new) - left sidebar

get_header();

get_template_part('templates-parts/default', 'header');
?>


<div class="content_wrapper">
    <div class="theme_container">

        <div class="row justify-content-center">

            <!-- sidebar -->
            <div class="col-md-4 col-lg-3 ">

                <?php get_template_part('templates-parts/page', 'sidebar') ?>

            </div>

            <div class="col-md-8 col-lg-9 mb-5 mb-lg-0">
                <h2 class="h5 section-title">Recent Post</h2>

                <?php

				if (have_posts()):
					while (have_posts()) : the_post();

						echo '<h1>';
						the_title();
						echo '</h1>';

						echo '<h1>From template with full width right sidebar</h1>';

						the_content();

					endwhile;
				else:
					echo '<h3>Page data </h3>';
				endif;

?>

                <!-- <ul class="pagination justify-content-center">
                            <li class="page-item page-item active ">
                                <a href="#!" class="page-link">1</a>
                            </li>
                            <li class="page-item">
                                <a href="#!" class="page-link">2</a>
                            </li>
                            <li class="page-item">
                                <a href="#!" class="page-link">»</a>
                            </li>
                        </ul> -->
            </div>

        </div>

    </div>
</div>

<?php

get_template_part('templates-parts/default', 'footer');

get_footer();
