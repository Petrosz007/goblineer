<div class="blog-post">
	<p class="blog-post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
	<p class="blog-post-meta">
        <?php the_date(); ?> by <a href="#"><?php the_author(); ?></a> - 
        <a href="<?php comments_link(); ?>"><?php echo(number_format_i18n(get_comments_number()) . " comments"); ?></a>
    </p>


    <?php if ( has_post_thumbnail() ) {
        the_post_thumbnail();
    } ?>

    <?php the_excerpt(); ?>

</div><!-- /.blog-post -->