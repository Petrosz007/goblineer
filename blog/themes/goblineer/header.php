<!DOCTYPE html>
<html lang="en">
   <head>
      <?php include_once($_SERVER['DOCUMENT_ROOT'] . '/inc/header_parts/headers.php'); ?>
      <?php wp_head();?>
      <link href="<?php echo get_bloginfo( 'template_directory' );?>/blog.css" rel="stylesheet">
   </head>
   <body>
      <?php include_once($_SERVER['DOCUMENT_ROOT'] . '/inc/header_parts/navbar.php'); ?>
      <div class="container-fluid" id="bootstrap-overrides">

        <!-- <div class="blog-header">
            <div class="blog-header-content">
              <p class="blog-title"><a href="<?php //echo get_bloginfo( 'wpurl' );?>"><?php //echo get_bloginfo( 'name' ); ?></a></p>
              <!-- <p class="lead blog-description"><?php //echo get_bloginfo( 'description' ); ?></p> -->
            <!-- </div>
        </div> -->

        <div class="row">
          <div class="col-md-3 col-sm-1 col-xs-0">
          </div>

          <div class="col-md-6 col-sm-8 col-xs-12" id="main-body">
