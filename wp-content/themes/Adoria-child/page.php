<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Bacardi
 */

get_header(); ?>
 
<div class="container-fluid about_first">
    <div class="panel-body container">
        <?php the_breadcrumb(); ?>
        <hr class="hor_blue"></hr>
        <?php while ( have_posts() ) : the_post(); ?>

          <h2 class="page_title"><?php the_title(); ?></h2>
          <?php the_content();?>
          <div class="col-md-8 col-md-offset-2">

              <?php
              if ( comments_open() || get_comments_number() ) :
                  comments_template();
              endif;
              ?>

          </div> 
        <?php endwhile; // end of the loop. ?>
    </div>
</div>

<?php get_footer(); ?>
