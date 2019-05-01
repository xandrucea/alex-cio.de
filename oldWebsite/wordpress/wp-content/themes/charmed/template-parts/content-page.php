<?php
/**
 * The template used for displaying page content
 *
 * @package Charmed
 */ 
 ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<div class="entry-content">
		
		<?php

		the_title( '<h2 class="entry-title">', '</h2>');

		if ( has_post_thumbnail() ) { 
			echo '<div class="entry-media">'; 
				the_post_thumbnail('page-feat'); 
			echo '</div>'; }
		
		the_content();

		wp_link_pages( array(
			'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'charmed' ) . '</span>',
			'after'       => '</div>',
			'link_before' => '<span>',
			'link_after'  => '</span>',
			'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'charmed' ) . ' </span>%',
			'separator'   => '<span class="screen-reader-text">, </span>',
		) );

		/*
		 * Check to see if the page is using specialized page templates. 
		 * If so, load the functions below to get the specialized content. 
		 * If you want to override this in a child theme, then include the
		 * functions below (located in the template-tags.php file) and
		 * place them in your child theme's functions.php file. 
		 */

		if ( is_page_template('template-site-map.php') ) {
			charmed_site_map();
		}

		if ( is_page_template('template-archive.php') ) {
			charmed_site_archive();
		}

		if ( is_page_template('template-contact.php') ) {
			get_template_part( 'template-parts/contact', 'form' );
		}	
		?>

	</div><!-- .entry-content -->

</article><!-- #post-## -->