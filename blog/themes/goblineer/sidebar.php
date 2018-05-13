<div class="col-sm-3 blog-sidebar">
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
</div><!-- /.blog-sidebar -->