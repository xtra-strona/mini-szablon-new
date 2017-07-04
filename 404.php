<?php get_header(); ?>


    <?php if(has_header_image()) : ?>

          <div class="parallax-window" data-parallax="scroll" data-image-src="<?php header_image(); ?>">

              <h1 class="page-header-img">
                  <?php bloginfo('name'); ?>
                  <small><?php bloginfo('description'); ?></small>
              </h1>

                <h2 class="alert alert-danger">
                   Błąd 404 Brak Podanej Strony !!!
                </h2>
          
          </div>
 <br />
    <?php endif; ?>

<!-- Page Content -->
<div class="container">

    <div class="row">

<?php if ( is_active_sidebar( 'sidebar-prawy' ) ) : ?>
        <!-- Blog Entries Column -->
        <div class="col-md-8">

        <?php else : ?>

          <div class="col-md-12">

<?php endif ?>

 <?php if(!has_header_image()) : ?>
         <h2 class="alert alert-danger">
                   Błąd 404 Brak Podanej Strony !!!
         </h2>
  <?php endif; ?>

  <h2>Może Tutaj Coś Znajdziesz:</h2>

<?php get_search_form(); ?>

<h2>Lub Poszukaj w Archiwach Strony</h2>

<select class='well' name="archive-dropdown" onchange="document.location.href=this.options[this.selectedIndex].value;">
  <option value=""><?php echo esc_attr( __( 'Select Day' ) ); ?></option>
  <?php wp_get_archives( array( 'type' => 'daily', 'format' => 'option', 'show_post_count' => 1 ) ); ?>
</select>

<select class='well' name="archive-dropdown" onchange="document.location.href=this.options[this.selectedIndex].value;">
  <option value=""><?php echo esc_attr( __( 'Select Month' ) ); ?></option>
  <?php wp_get_archives( array( 'type' => 'monthly', 'format' => 'option', 'show_post_count' => 1 ) ); ?>
</select>

<select class='well' name="archive-dropdown" onchange="document.location.href=this.options[this.selectedIndex].value;">
  <option value=""><?php echo esc_attr( __( 'Select Year' ) ); ?></option>
  <?php wp_get_archives( array( 'type' => 'yearly', 'format' => 'option', 'show_post_count' => 1 ) ); ?>
</select>

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
