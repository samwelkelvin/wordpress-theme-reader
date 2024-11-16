<?php

// Template Name: Default theme template (new) - No sidebar

get_header();

get_template_part('templates-parts/default', 'header');

?>


<div class="content_wrapper">
    <div class="theme_container">
        <?php

		if (have_posts()):
			while (have_posts()) : the_post();

				the_content();

			endwhile;
		else:
			echo '<h3>No Page data </h3>';
		endif;
?>

    </div>
</div>

<?php

get_template_part('templates-parts/default', 'footer');

get_footer();
