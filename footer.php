    </main>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <a href="<?php print get_bloginfo('url'); ?>" class="brand"><?php include('svg/logo_footer.php'); ?></a>
                    <p>The Mayor's Fund for Philadelphia is an independent nonprofit that seeks to improve the quality of life for all Philadelphians.</p>
                </div>
                <div class="visible-xs divider"></div>
                <div class="col-sm-8 col-md-6 col-md-offset-1">
                    <h4>Sign up for our newsletter</h4>
                    <div class="row">
                        <div class="col-sm-12">
                            <form action="//mayorsfundphila.us10.list-manage.com/subscribe/post?u=234cb32d956bc94c9c8585fbb&amp;id=aa77320e29" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="johnsmith@me.com" name="EMAIL" id="mce-EMAIL">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="submit" name="subscribe" id="mc-embedded-subscribe"><?php include('svg/icon_arrow.php'); ?></button>
                                    </span>
                                </div>
                                <div style="position: absolute; left: -5000px;"><input type="text" name="b_234cb32d956bc94c9c8585fbb_aa77320e29" tabindex="-1" value=""></div>
                            </form>
                        </div>
                    </div>
                    <?php wp_nav_menu( 
                        array( 
                            'theme_location'    => 'secondary', 
                            'container'         => '',
                            'menu_class'        => 'list-inline'
                        )
                    ); ?>
                    <small>
                        Copyright &copy; <?php print date('Y'); ?> The Mayor's Fund for Philadelphia.
                        <a href="#" class="hidden">Copyright information</a>
                        <a href="tel: 2156860321" class="hidden-xs">(215) 686-0321</a></small>
                </div>
            </div>
        </div>
    </footer>
    
    <div class="modal fade" id="support" tabindex="-1" role="dialog" aria-labelledby="SupportModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Yes! I'd like to make a donation!</h4>
                </div>
                <form action="http://fund.gizmosoftware.com/paywrapper.php" method="POST">
                    <div class="modal-body">
                        <div class="donation-form">
                            <p>Thank you for choosing to make a contribution to the Mayor's Fund for Philadelphia.  You can designate your contribution for a specific program, or your contribution go toward the Fund's most urgent need.</p>
                            <div class="row">
                                <div class="form-group col-sm-12 col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2">
                                    <label for="program-list">Program</label>
                                    <?php 
                                        $args = array( 'posts_per_page' => 0, 'post_type' => 'initiative' );
                                        $initiatives = get_posts($args);
                                    ?>
                                    <select name="itemName" id="program-list">
                                        <option value="all">Most Urgent Need</option>
                                        <?php foreach ( $initiatives as $post ) : setup_postdata( $post ); ?>
                                            <?php if( get_field('show_support_button') ): ?>
                                                <option value="<?php the_title(); ?>"><?php the_title(); ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; wp_reset_postdata(); ?>
                                    </select>
                                </div>
                                <div class="form group col-sm-12 col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2">
                                    <label>Donation Amount</label>
                                    <div class="input-group input-group-lg">
                                        <span class="input-group-addon">$</span>
                                        <input type="number" class="form-control" name="customAmount" aria-label="Amount (to the nearest dollar)">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" type="submit" class="btn btn-primary" value="Complete My Donation">
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="<?php bloginfo('template_directory'); ?>/js/vendor/bootstrap.min.js"></script>
    <script src="<?php bloginfo('template_directory'); ?>/js/vendor/bootstrap-select.js"></script>
    <script src="<?php bloginfo('template_directory'); ?>/js/vendor/slick.min.js"></script>
    <script src="<?php bloginfo('template_directory'); ?>/js/app.js"></script>

    <?php wp_footer(); ?>
</body>
</html>