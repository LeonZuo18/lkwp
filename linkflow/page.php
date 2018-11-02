<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>
	<div id="inner_header" class="inner_page" data-stellar-background-ratio="0.5">
		<div id="home_slogan1"><?php the_title(); ?></div>
	</div>

	<div id="main" class="site-content wrapper">
		<div id="primary" role="main">
			<?php while ( have_posts() ) : the_post(); ?>
			<div class="entry-content">
			
				<div class="inner_content_full">
					<!-- <h1 class="title_sub"><?php the_title(); ?></h1> -->
					<?php the_content(); ?>
				</div>
			
			</div>
			<footer class="entry-meta">
				<?php edit_post_link( __( 'Edit', 'twentytwelve' ), '<span class="edit-link">', '</span>' ); ?>
			</footer><!-- .entry-meta -->
			<?php endwhile; // end of the loop. ?>
		</div><!-- #primary -->
	</div><!-- #main -->

<?php get_footer(); ?>