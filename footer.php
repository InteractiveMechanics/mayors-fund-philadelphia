    </main>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <a href="<?php print get_bloginfo('url'); ?>">Logo goes here!</a>
                    <p>The Mayor's Fund for Philadelphia is an independent nonprofit that seeks to improve the quality of life for all Philadelphians.</p>
                </div>
                <div class="col-sm-8">
                    <p>Sign up for our newsletter</p>
                    <div class="row">
                        <div class="col-sm-6">  
                            <div class="input-group">
                                <input type="text" class="form-control">
                                <span class="input-group-btn"><button class="btn btn-default" type="button">Submit</button></span>
                            </div>
                        </div>
                    </div>
                    <?php wp_nav_menu( 
                        array( 
                            'theme_location'    => 'secondary', 
                            'container'         => '',
                            'menu_class'        => 'list-inline'
                        )
                    ); ?>
                    <small>Copyright &copy; <?php print date('Y'); ?> The Mayor's Fund for Philadelphia. <a href="#" class="hidden">Copyright information</a></small>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="<?php bloginfo('template_directory'); ?>/js/vendor/bootstrap.min.js"></script>
    <script src="<?php bloginfo('template_directory'); ?>/js/vendor/slick.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){
          $('.slideshow').slick({
                dots: true,
                infinite: true,
                autoplay: true,
                autoplaySpeed: 6000,
                arrows: false
            });
        });
    </script>

    <?php wp_footer(); ?>
</body>
</html>