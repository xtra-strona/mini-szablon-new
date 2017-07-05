<?php get_header();?>

<!-- Page Content -->
<div class="container-fluid">

<!-- Loop Page -->
<?php while ( have_posts() ) : the_post();

// KONTENT TWOJEJ STRONY
  the_content();

endwhile; 

 get_footer(); ?>