<nav class="navbar navbar-expand-lg navbar-white">
    <a class="navbar-brand order-1" href="<?php echo esc_url(home_url('/')); ?>">
        <?php get_template_part('templates-parts/site', 'logo') ?>
    </a>

    <?php

	$defaults = array(
		'menu'                 => '',
		'container'            => 'div',
		'container_class'      => 'collapse navbar-collapse text-center order-lg-2 order-3',
		'container_id'         => 'navigation',
		'container_aria_label' => '',
		'menu_class'           => 'navbar-nav mx-auto',
		'menu_id'              => '',
		'echo'                 => true,
		'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
		'before'               => '',
		'after'                => '',
		'link_before'          => '',
		'link_after'           => '',
		'items_wrap'           => '<ul id="%1$s" class="%2$s">%3$s</ul>',
		// 'item_spacing'         => 'preserve',
		'depth'                => 2,
		'walker'               => new WP_Bootstrap_Navwalker(),
		'theme_location'       => 'primary',
	);

    wp_nav_menu($defaults);

    ?>

    <div class="order-2 order-lg-3 d-flex align-items-center">
        <!-- <select class="m-2 border-0 bg-transparent" id="select-language">
            <option id="en" value="" selected>En</option>
            <option id="fr" value="">Fr</option>
        </select> -->

        <!-- search -->

        <form class="search-bar" action="<?php echo esc_url(home_url('/')); ?>">

            <input id="search-query" name="s" type="search" placeholder="<?php echo esc_attr_e('Type &amp; Hit Enter...', 'reader-blog') ?>" value="<?php echo get_search_query() ?>"  title="<?php echo esc_attr_e('Search for:', 'bootstrap-blog') ?>" />

        </form>

        <button class="navbar-toggler border-0 order-1" type="button" data-toggle="collapse" data-target="#navigation">
            <i class="ti-menu"></i>
        </button>
    </div>

</nav>