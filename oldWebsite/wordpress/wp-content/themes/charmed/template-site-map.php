<?php
/**
 * Template Name: Site Map
 * The template for displaying the site map.
 *
 * This template simply defaults to the standard page layout,
 * for which specialized content is loaded based on a is_page_template
 * check. 
* 
 * Reference page.php and template-parts/content-page.php. 
 *
 * @package Charmed
 */

get_header(); ?>

<div id="primary" class="content-area">

	<main id="main" class="site-main" role="main">

		<?php 
		// Start the loop.
		while ( have_posts() ) : the_post();
			
			//Retrieve the page content.
			get_template_part( 'template-parts/content', 'page' );

		// End of the loop.
		endwhile; ?>

	</main><!-- #main -->	

</div><!-- #primary -->

<?php get_footer();