<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

<div id="inner_header" class="inner_header inner_blog" data-stellar-background-ratio="0.5">
	<div id="inner_title">
		<h2>Linkflow 博客</h2>
		<ul class="list-categories">
			<?php wp_list_categories( array(
				'orderby' => 'name',
				'title_li' => '',
			) ); ?> 
		</ul>
	</div>
</div>
<div id="primary">
	<div id="p-blog-1" class="p-linesection">
		<div class="site-content entry-content wrapper">
				<header class="archive-header">
				<h1 class="archive-title">全部文章</h1>
				</header><!-- .archive-header -->
					<div class="col-raw">
					<?php if ( have_posts() ) : ?>
					<?php while ( have_posts() ) : the_post();
						setup_postdata( $post );
						$content = $post->post_content;
						$content = apply_filters( 'the_content', $content );
						$postNum++;
					?>
						<div class="col-4 col-n entry-content">
							<?php require( get_template_directory() . '/inc/content-panel-post.php' ); ?>
						</div>
					<?php endwhile; // end of the loop. ?>
					<?php endif; // end have_posts() check ?>
					</div>
				
			<?php
				// 用wp_pagenavi插件分页
				if(function_exists('wp_pagenavi')){
					wp_pagenavi();
				}
			?>
		</div>
	</div>
</div>

<?php get_footer(); 
?>