<?php get_header();

/* Template Name: Full Width */

?>

<?php if ( has_post_thumbnail() ) :?>

    <div class="parallax-window" data-parallax="scroll" data-image-src="<?php the_post_thumbnail_url(); ?>">

       <h1 class="page-header-img">
             <?php the_title();?>
        </h1>

    </div>

    <br>

<?php endif; ?>


<!-- Page Content -->
<div class="container-fluid">

<!-- Loop Page -->
<?php while ( have_posts() ) : the_post();

 get_template_part('template-parts/content','full'); ?>

        <!-- Pager -->
        <div class="pager">
            <?php previous_post_link('<span class="prev-link">%link</span>', __('&larr; Poprzednia','textdomain')); ?>
            <?php next_post_link('<span class="next-link">%link</span>', __('Następna &rarr;','textdomain')); ?>
        </div>

<?php endwhile; ?>

<?php get_footer(); ?>