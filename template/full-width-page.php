<?php

// Template Name: Full width page (new) - No sidebar

get_header();

get_template_part('templates-parts/full', 'page-header');
?>

<div class="content_wrapper">

    <?php

	if (have_posts()):
		while (have_posts()) : the_post();

			the_content();

		endwhile;
	else:
		echo '<h3>Page data </h3>';
	endif;
?>

</div>


<?php

get_template_part('templates-parts/full', 'page-footer');

get_footer();
