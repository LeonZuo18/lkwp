<div class="panel-post-container post_<?php echo $postNum ?>" >
	<a href="<?php the_permalink(); ?>" class="panel-post-thumbnail">
		<?php if ( has_post_thumbnail() ) { ?>
		<?php the_post_thumbnail('post-thumb',array( 'alt' => get_the_title() )); ?>
		<?php } else {
			$thumbnail_url = get_post_first_img();
			if(empty($thumbnail_url))
				$thumbnail_url= get_template_directory_uri()."/images/default_website.png";
			 ?>
			<img src="<?php echo $thumbnail_url; ?>" alt="<?php echo the_title(); ?>" />
		<?php } ?>
	</a>
	<div class="panel-post-txt">
		<a href="<?php the_permalink(); ?>" class="panel-post-title"><?php echo the_title(); ?></a>
		<div class="panel-post-sub">
			<i class="icon-article icon-article-time"></i><?php
			printf( '<time class="entry-date" datetime="%3$s">%4$s</time>',
				esc_url( get_permalink() ),
				esc_attr( get_the_time() ),
				esc_attr( get_the_date( 'c' ) ),
				esc_html( get_the_date() )
			); ?>
			&nbsp; <i class="icon-article icon-article-view"></i><?php
			if(function_exists('the_views')) the_views();
			?>

			&nbsp; <i class="icon-article icon-article-folder"></i><?php the_category( ', ' ); ?>

			<!--  ・ <i class="fa fa-commenting-o"></i>  -->
			<?php //comments_popup_link( '<span class="leave-reply">' . __( 'Leave a reply', 'twentytwelve' ) . '</span>', __( '1 Reply', 'twentytwelve' ), __( '% Replies', 'twentytwelve' ) ); ?>
		</div><!-- .panel-post-sub -->
		<div class="panel-post-content">
			<?php
				$content = mb_strimwidth(strip_tags($content), 0, 190,"...");
				$content = preg_replace('/(http)(.)*([a-z0-9\-\.\_])+/i','',$content);
				$content = preg_replace('/(www)(.)*([a-z0-9\-\.\_])+/i','',$content);
				echo $content;
			?>
		</div>
	</div>
</div>