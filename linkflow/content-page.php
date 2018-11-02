<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<?php
		if( !( get_section_level() > 1 
			|| 
			( get_section_level() == 1 && ( $c = get_children(array('post_parent' => $post->ID, 'post_type' => 'page')) ) && !empty($c) ) 
			||
			( get_section_level() == 0 && ( $c = get_children(array('post_parent' => $post->ID, 'post_type' => 'page')) ) && !empty($c) ) 
		) ):?>
		<header class="entry-header">
			<h1 class="entry-title"><?php the_title(); ?></h1>
		</header>
		<?php endif; ?>

		<div class="entry-content">		
			<?php if ( get_section_level() > 1 || 
				( get_section_level() == 1 && ( $c = get_children(array('post_parent' => $post->ID, 'post_type' => 'page')) ) && !empty($c) ) 
				||
				( get_section_level() == 0 && ( $c = get_children(array('post_parent' => $post->ID, 'post_type' => 'page')) ) && !empty($c) ) 
			) :?>
				<div class="inner_nav">
					<ul class="nav">
						<?php
							$sub_parent = ( 1 == get_section_level() || 0 == get_section_level() ) ? $post->ID : $post->post_parent;
							wp_list_pages(array('child_of' => $sub_parent, 'depth' => 2, 'title_li' => '', 'hmc_action' => 'menu_sub', 'hmc_page' => $sub_parent));
							//$sub_parent = ( 1 == get_section_level()  ) ? $post->ID : $post->post_parent;
							//wp_list_pages(array('child_of' => $sub_parent, 'depth' => -1, 'title_li' => '', 'hmc_action' => 'menu_sub', 'hmc_page' => $sub_parent));
						?>
					</ul>

				</div>
				<div class="inner_content">
				<?php if (get_section_level()>1 ): ?>
					<h1 class="title_sub"><?php the_title(); ?></h1>
				<?php else: ?>	
					<h1 class="title_sub"><?php the_title(); ?></h1>
				<?php endif; ?>
				
				<?php the_content(); ?>
				</div>
			
			<?php else: ?>	
				<div>				
				<?php the_content(); ?>
				</div>
			<?php endif; ?>
			
			<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'twentytwelve' ), 'after' => '</div>' ) ); ?>
		</div><!-- .entry-content -->
		<footer class="entry-meta">
			<?php edit_post_link( __( 'Edit', 'twentytwelve' ), '<span class="edit-link">', '</span>' ); ?>
		</footer><!-- .entry-meta -->
	</article><!-- #post -->
