<div class="col-sm-8">
	<?php if (have_posts()): while (have_posts()) : the_post(); ?>
		<div <?php post_class(); ?>>
			<?php if(is_archive()){ ?>
				<?php the_title('<h2><a href="'.get_the_permalink().'">','</a></h2>'); ?>
				<?php the_excerpt(); ?>
				<hr>
			<?php } else { ?>
				<?php if(!is_front_page()){ ?>
				<?php the_title('<h1>','</h1>'); ?>
				<?php } ?>
				<?php the_content(); ?>
			<?php } ?>
			<?php wp_link_pages(); ?>
		</div>
	<?php endwhile; else : ?>
		<p><?php _e('Sorry, no posts matched your criteria.', $theme_textdomain); ?></p>
	<?php endif; ?>
</div>