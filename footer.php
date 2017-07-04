<!--Tutaj Przeniosłem zakończenie diva kontenera strony -->
</div>
<!-- /.container -->

<!-- Footer -->
<footer>
    <div class="row">
        <div class="col-lg-12">
            <p>Copyright &copy; <?php bloginfo('name'); ?> <?php echo date('Y'); ?></p>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</footer>

 <!--jQuery -->
<!--<script src="<?php // bloginfo('template_directory');?>/js/jquery.js"></script>-->

<!-- PARALLAX.JS -->
<!--<script src="<?php // bloginfo('template_directory');?>/js/parallax.min.js"></script>-->

<!-- Bootstrap Core JavaScript -->
<!--<script src="<?php //  bloginfo('template_directory');?>/js/bootstrap.min.js"></script>-->

<?php wp_footer(); ?>

<script type="text/javascript">
    $(document).ready(function() {
    
    /*Colors you need to add for your anchor tags*/
    var colors = ['red', 'green', 'blue', 'orange', 'gray'];
    
    /*Minimum & Maximum font Size*/
    var minFontSize = 20;
    var maxFontSize = 40;
    
    /*Finding all the links inside a Div*/
    $('.tag-cloud, .tagcloud').find('a').each(function(e) {
    /*Applying font size*/
    $(this).css("fontSize", randomNumberGenerator(minFontSize, maxFontSize));
    /*Applying font color*/
    $(this).css("color", colors[Math.floor(Math.random() * colors.length)]);
    });
    
    /*Random Number Generator function*/
    function randomNumberGenerator(min,max)
    {
    return Math.floor(Math.random()*(max-min+1)+min);
    }
    });
</script>

</body>

</html>
