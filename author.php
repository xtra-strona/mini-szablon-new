<?php get_header(); ?>

<div class="cat-all parallax-window" data-parallax="scroll" data-image-src="<?php header_image(); ?>">

      <h1 class="page-header-img">
          <?php bloginfo('name'); ?>
          <small><?php bloginfo('description'); ?></small>
      </h1>

  <h2>Autor Wpisu: <b><?php the_author(); ?></b></h2>

</div>
<br />

<!-- Page Content -->
<div class="container">

<h3><?php _e('Zobacz Wszystkich Autorów:', 'textdomain'); ?></h3>
<ul class="nav nav-pills" role="tablist">
  <?php

       $list_auth = wp_list_authors(array('echo' => false, 'optioncount' => true));
       $list_auth = str_replace("<li>","<li role='presentation' class='active'>", $list_auth );
       $list_auth = str_replace("</a>"," ", $list_auth );
       $list_auth = str_replace("(", "<span class='badge'>", $list_auth );
       $list_auth = str_replace(")", "</span></a>", $list_auth );

echo $list_auth;

   ?>
</ul>
<br />
    <div class="row">

<?php if ( is_active_sidebar( 'sidebar-prawy' ) ) : ?>
        <!-- Blog Entries Column -->
        <div class="col-md-8">

        <?php else : ?>

          <div class="col-md-12">

<?php endif ?>

          <!-- First Blog Post -->
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post();

                 get_template_part('template-parts/content', 'author');

              endwhile; ?>

              <!-- Pager -->
                <?php the_posts_pagination( array(
                     'mid_size'  => 2,
                     'prev_text' => __( '&larr; Poprzedni', 'textdomain' ),
                     'next_text' => __( 'Następny &rarr;', 'textdomain' ),
                    ) );

                   else : ?>

            	<h3><?php _e( 'Przepraszamy, brak wpisów spełniających podane kryteria.','textdomain' ); ?></h3>

            <?php endif; ?>

        </div>

    <?php if ( is_active_sidebar( 'sidebar-prawy' ) ) { ?>
        <!-- Blog Sidebar Widgets Column -->
        <div class="col-md-4">
                 <?php get_sidebar(); ?>
        </div>
    <?php } ?>

    </div>
    <!-- /.row -->

    <hr>
<?php get_footer(); ?>
