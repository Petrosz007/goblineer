<?php get_header(); ?>

<div class="row">

    <div class="col-sm-9 blog-main">

		<?php
			while ( have_posts() ) :
				the_post();
		?>
			<div class="blog-post">
			<p class="blog-post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
			<p class="blog-post-meta">
				<?php the_date(); ?> by <a href="#"><?php the_author(); ?></a> - 
				<a href="<?php comments_link(); ?>"><?php echo(number_format_i18n(get_comments_number()) . " comments"); ?></a>
			</p>

			<?php if ( has_post_thumbnail() ) {
				the_post_thumbnail();
			} ?>

			<?php the_content(); ?>

			</div><!-- /.blog-post -->

			<?php
				if ( comments_open() || get_comments_number() ) {
					comments_template();
				}
			?>

		<?php endwhile;?>

    </div> <!-- /.blog-main -->

    <?php get_sidebar(); ?>

</div> <!-- /.row -->

<?php get_footer(); ?>