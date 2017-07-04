<article id="post-<?php the_ID(); ?>" <?php post_class('cont-link'); ?>>

        <div class="jumbotron">

            <a href='<?php echo get_the_content(); ?>' target='_blank'>
                <h1><?php echo the_title();?></h1>
            </a> 

                <!-- 16:9 aspect ratio -->
                <div class="embed-responsive embed-responsive-16by9">
                <?php the_content(); ?>
                </div>

        </div>

</article>