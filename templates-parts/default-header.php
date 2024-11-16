 <?php
	/**
	 *
	 * Maximum page width is 1400px
	 *
	 */
?>
 <!-- navigation -->
 <header class="navigation fixed-top">
     <div class="theme_container">

         <?php get_template_part('templates-parts/primary', 'menu'); ?>

     </div>
 </header>
 <!-- /navigation -->

 <?php
if (is_front_page() and !is_home()) {
	//get_template_part("templates-parts/pages/homepage", "header-banner");
}
