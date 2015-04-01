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
                        <a href="#" class="hidden-xs">Copyright information</a></small>
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
                <div class="modal-body">
                    <form>
                        <div class="donation-form">
                            <p>Thank you for choosing to make a contribution to the Mayor's Fund for Philadelphia.  You can designate your contribution for a specific program, or your contribution go toward the Fund's most urgent need.</p>
                            <div class="row">
                                <div class="form-group col-sm-12 col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2">
                                    <label for="program-list">Program</label> 
                                    <select name="Programs" id="program-list">
                                        <option value="all">Most Urgent Need</option>
                                        <option value="the-dilworth-award">Dilworth Award</option>
                                        <option value="Graduation Coaches">Graduation Coaches</option>
                                        <option value="Better Bike Share Parntership">Better Bike Share Partnership</option>
                                        <option value "Mayor's Summer Job Challenge">Mayor's Summer Job Challenge</option>
                                    </select>
                                </div>
                                <div class="form group col-sm-12 col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2">
                                    <label>Donation Amount</label>
                                    <div class="input-group input-group-lg">
                                        <span class="input-group-addon">$</span>
                                        <input type="number" class="form-control" aria-label="Amount (to the nearest dollar)">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Complete My Donation</button>
                </div>
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