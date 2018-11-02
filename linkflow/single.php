<?php
/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header();
//wp_enqueue_script('tiny_mce');
?>
<div id="inner_header" class="inner_header inner_blog" data-stellar-background-ratio="0.5">
	<div id="inner_title" class="onlytitle">
		<h2><?php the_title(); ?></h2>
	</div>
</div>

<div id="page" class="hfeed site">
	<div id="main" class="wrapper">
	<div id="primary" class="site-content site-content-article">
		<div id="content" role="main">

			<?php while ( have_posts() ) : the_post();
				$categories = get_the_category();
				if ( ! empty( $categories ) ) {
					$first_term_id = $categories[0]->term_id;
					if( in_array($first_term_id,array(40,41,42)) ){
						echo "<script>$('#menu-item-151').addClass('current-menu-item');</script>";
					}else if( in_array($first_term_id,array(38)) ){
						echo "<script>$('#menu-item-107').addClass('current-menu-item');</script>";
					}
				}
				?>

				<header class="entry-header">
					<div class="breadcrumb"><?php //brain1981_get_breadcrumb(); ?></div>


						<div class="comments-link">
							<i class="icon-article icon-article-time"></i><?php
								printf( '<time class="entry-date" datetime="%3$s">%4$s  %2$s</time>',
									esc_url( get_permalink() ),
									esc_attr( get_the_time() ),
									esc_attr( get_the_date( 'c' ) ),
									esc_html( get_the_date() )
							); ?>
							&nbsp; <i class="icon-article icon-article-view"></i><?php
							if(function_exists('the_views')) the_views();
							?>
							&nbsp; <i class="icon-article icon-article-folder"></i><?php the_category( ', ' ); ?>

						</div>

						<!-- .comments-link -->
				</header><!-- .entry-header -->


				<div class="entry-content">
					<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentytwelve' ) ); ?>

					<p class="article-end">－END－</p>
					
					<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'twentytwelve' ), 'after' => '</div>' ) );

					$tag_list = get_the_tag_list( sprintf( '<p class="entry-taglist tags-links">%s: ', __( '标签', 'textdomain' ) ), ' ', '</p>' );
					if ( $tag_list ) {
						echo $tag_list;
					}

					?>
				</div><!-- .entry-content -->

			<?php endwhile; // end of the loop. ?>

			<?php comments_template( '', true ); ?>

		</div><!-- #content -->
	</div><!-- #primary -->

	<?php //require( get_template_directory() . '/inc/aside-inner.php' ); ?>

	</div><!-- #main .wrapper -->
</div><!-- #page -->

<?php get_footer(); ?>