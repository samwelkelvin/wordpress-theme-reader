<?php

$defaults = array(
	'menu'                 => '',
	'container'            => 'div',
	'container_class'      => 'col-md-5 text-center text-md-left mb-4',
	'container_id'         => '',
	'container_aria_label' => '',
	'menu_class'           => 'list-inline footer-list mb-0',
	'menu_id'              => '',
	'echo'                 => true,
	'fallback_cb' => 'WP_Bootstrap_Navwalker_Footer::fallback',
	'before'               => '',
	'after'                => '',
	'link_before'          => '',
	'link_after'           => '',
	'items_wrap'           => '<ul id="%1$s" class="%2$s">%3$s</ul>',
	// 'item_spacing'         => 'preserve',
	'depth'                => 2,
	'walker'               => new WP_Bootstrap_Navwalker_Footer(),
	'theme_location'       => 'footer',
);

wp_nav_menu($defaults);

?>

<div class="col-md-2 text-center mb-4">
    <a href="<?php echo esc_url(home_url('/')); ?>">
        <?php get_template_part('templates-parts/site', 'logo') ?>
    </a>
</div>
<div class="col-md-5 text-md-right text-center mb-4">
    <ul class="list-inline footer-list mb-0">

                    <?php if (get_theme_mod('twitter')): ?>

                        <li class="list-inline-item">

                            <a class="light-text" href="<?php echo get_theme_mod('twitter'); ?>" target="_blank">
                                <i class="ti-twitter-alt"></i></i>
                            </a>

                        </li>
                    <?php endif; ?>

                    <?php if (get_theme_mod('instagram')): ?>

                        <li class="list-inline-item">
                            <a class="light-text" href="<?php echo get_theme_mod('instagram'); ?>" target="_blank">
                                <i class="ti-instagram"></i></i>
                            </a>
                        </li>
                    <?php endif; ?>

                    <?php if (get_theme_mod('facebook')): ?>
                        <li class="list-inline-item">
                            <a class="light-text" href="<?php echo get_theme_mod('facebook'); ?>" target="_blank">
                                <i class="ti-facebook"></i></i>
                            </a>
                        </li>
                    <?php endif; ?>

                    <?php if (get_theme_mod('linkedin')): ?>
                        <li class="list-inline-item">
                            <a class="light-text" href="<?php echo get_theme_mod('linkedin'); ?>" target="_blank">
                                <i class="ti-linkedin"></i></i>
                            </a>
                        </li>
                    <?php endif; ?>

                    <?php if (get_theme_mod('github')): ?>

                        <li class="list-inline-item">
                            <a class="light-text" href="<?php echo get_theme_mod('github'); ?>" target="_blank">
                                <i class="ti-github"></i></i>
                            </a>
                        </li>
                    <?php endif; ?>

                    <?php if (get_theme_mod('youtube')): ?>
                        <li class="list-inline-item">
                            <a class="light-text" href="<?php echo get_theme_mod('youtube'); ?>" target="_blank">
                                <i class="ti-youtube"></i></i>
                            </a>
                        </li>
                    <?php endif; ?>

    </ul>
</div>
<div class="col-12">
    <div class="border-bottom border-default"></div>
</div>