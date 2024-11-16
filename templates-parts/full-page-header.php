<?php

/**
 *
 * header contents are wrapped in bootsrap container-fluid for full page coverage
 *
 */
?>
<!-- navigation -->
<header class="navigation fixed-top">
    <div class="container-fluid">

        <?php get_template_part('templates-parts/primary', 'menu'); ?>

    </div>
</header>
<!-- /navigation -->

 <?php

if (is_front_page()) {
	get_template_part('templates-parts/pages/homepage', 'header-banner');
}
