      <aside class="page_sidebar">
          <?php

				function createSideBarWidgets()
				{
					//search form
					echo '<div class="widget">';

					echo  get_search_form();

					echo '</div>';

					//latest posts
					the_widget('Reader_Recent_Posts');

					//categories
					the_widget('Reader_categories');

					//tags
					the_widget('Reader_Tags');
				}

          if (is_home()) :

          	if (is_active_sidebar('blog-sidebar')):

          		dynamic_sidebar('blog-sidebar');

          	else:

          		createSideBarWidgets();

          	endif;

          else:

          	if (is_active_sidebar('sidebar')):

          		dynamic_sidebar('sidebar');

          	else:

          		createSideBarWidgets();

          	endif;

          endif;

          ?>

              <style>
                  .widget-archives li {
                      display: flex !important;
                  }

                  .widget-archives a {
                      margin-right: auto !important
                  }

                  .widget-archives a::before {
                      position: relative;
                      content: "#";
                      color: #4FD675;
                      left: 0px;
                      top: 0;
                  }
              </style>
              <div class="widget widget-archives">
                  <h4 class="widget-title"><span>Archives</span></h4>
                  <ul class="list-unstyled widget-list">

                      <?php
          		$args = array(
          			'type' => 'monthly',
          			'limit' => 12,
          			'format' => 'html',
          			'before' => '',
          			'post_type' => 'post',
          			'after' => '',
          			'show_post_count' => true,
          			'echo' => 1,
          			'order' => 'DESC'
          		);

          wp_get_archives($args);

          ?>

                  </ul>
              </div>

              <?php if (get_theme_mod('show_social_media_handles')): ?>

                  <div class="widget">
                      <h4 class="widget-title"><span>Social Links</span></h4>
                      <ul class="list-inline widget-social">

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

              <?php endif; ?>

      </aside>