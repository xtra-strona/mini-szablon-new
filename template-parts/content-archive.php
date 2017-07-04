<?php // content-archive.php ?>
<div id="post-<?php the_ID(); ?>" class="archive-content panel panel-default">
  <div class="panel-heading">
    <b>Nazwa Wpisu:</b> <a href="<?php the_permalink(); ?>">
      <?php the_title(); ?>
    </a>
  </div>
    <div class="panel-body">
      <b>Dodano:</b> <?php echo the_time('j F, Y'); ?>
    </div>
</div>
