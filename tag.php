<?php get_header();
// tag.php
?>

<div class="cat-all parallax-window" data-parallax="scroll" data-image-src="<?php header_image(); ?>">

      <h1 class="page-header-img">
          <?php bloginfo('name'); ?>
          <small><?php bloginfo('description'); ?></small>
      </h1>

  <h2>Wybrany Tag: <b><?php single_tag_title(); ?></b></h2>

 <h3>Zobacz Popularne Tagi:</h3>

<ul class='tag-cloud'>
   <li><?php wp_tag_cloud(array('number' => 12, 'order' => 'RAND')); ?></li>
</ul>

</div>
<br />


<!-- Page Content -->
<div class="container">

    <div class="row">

<?php if ( is_active_sidebar( 'sidebar-prawy' ) ) : ?>
        <!-- Blog Entries Column -->
        <div class="col-md-8">

        <?php else : ?>

          <div class="col-md-12">

<?php endif ?>

          <!-- First Blog Post -->
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post();

                 get_template_part('template-parts/content', 'tag');

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
