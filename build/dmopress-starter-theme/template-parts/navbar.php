<nav class="navbar navbar-default">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#"><?php echo get_bloginfo('name', 'raw'); ?></a>
		</div>
		<?php 
			$args = array(
            'menu'              => 'main',
            'theme_location'    => 'main',
            'depth'             =>  2,
            'container'         => 'div',
            'container_class'   => 'collapse navbar-collapse',
     		'container_id'      => 'navbar-collapse',
            'menu_class'        => 'nav navbar-nav navbar-right',
            'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
            'walker'            => new wp_bootstrap_navwalker()
      	);
			wp_nav_menu( $args );
		?>
	</div>
</nav>