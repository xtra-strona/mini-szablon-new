<article id="post-<?php the_ID(); ?>" <?php post_class('cont-auth'); ?>>
  <h2>
      <a href="<?php the_permalink(); ?>"><?php the_title();?></a>

      <small>
        <?php _e('Dodał', 'textdomain')?>
          <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>">
            <?php the_author(); ?>
          </a>
           |
          <span class="glyphicon glyphicon-time"></span>
          <span class='posted-on'> Posted on <?php the_time('j F, Y'); ?></span>
      </small>

  </h2>

<p class="lead"> Kategoria: <?php the_category( ', ' ); ?></p>

    <?php if ( has_post_thumbnail() ) { ?>
    <hr />
      <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('large',array('class'=>'img-responsive')); ?></a>
    <hr />
    <?php } else {
// Obrazek Zastępczy z http://placehold.it
      echo "<hr /><img class='img-responsive' src='http://placehold.it/900x300' alt='dodaj-obrazek'><hr />";
    } ?>

    <?php the_excerpt(); ?>
    <a class="btn btn-primary" href="<?php the_permalink(); ?>">Czytaj Wiecej <span class="glyphicon glyphicon-chevron-right"></span></a>

    <hr>
</article>
