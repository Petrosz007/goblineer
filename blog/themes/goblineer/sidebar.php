<div class="col-sm-3 col-sm-offset-1 blog-sidebar">
	<div class="sidebar-module sidebar-module-inset">
		<p class="sidebar-title">About</p>
		<hr>
		<p><?php echo get_bloginfo( 'description' ); ?></p>
	</div>
	<div class="sidebar-module">
		<p class="sidebar-title">Archives</p>
		<hr>
		<ol class="list-unstyled">
			<?php wp_get_archives('type=monthly');?>
			<!-- More archive examples -->
		</ol>
	</div>
	<div class="sidebar-module">
		<p class="sidebar-title">Elsewhere</p>
		<hr>
		<ol class="list-unstyled">
			<li><a href="<?php echo get_option('github'); ?>">GitHub</a></li>
			<li><a href="<?php echo get_option('twitter'); ?>">Twitter</a></li>
		</ol>
	</div>
</div><!-- /.blog-sidebar -->