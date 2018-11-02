<?php
/**
 * The template for displaying Category pages
 *
 * Used to display archive-type pages for posts in a category.
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

			<?php if ( have_posts() ) : ?>
				<header class="archive-header">
					<h1 class="archive-title"><?php echo single_cat_title( '', false ); ?></h1>
				</header><!-- .archive-header -->
				<div class="col-raw">
				<?php
				/* Start the Loop */
				while ( have_posts() ) : the_post();
				?>
				<div class="col-4 col-n entry-content">
					<?php require( get_template_directory() . '/inc/content-panel-post.php' ); ?>
				</div>
				<?php endwhile; ?>
				</div>
				<?php
				// 用wp_pagenavi插件分页
				if(function_exists('wp_pagenavi')){
					wp_pagenavi();
				}
				?>

			<?php else : ?>
				<?php get_template_part( 'content', 'none' ); ?>
			<?php endif; ?>

		</div>
	</div>
</div>

<?php get_footer(); ?>