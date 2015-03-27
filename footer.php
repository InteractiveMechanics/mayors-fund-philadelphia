    </main>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <a href="<?php print get_bloginfo('url'); ?>"><?php include('svg/logo_footer.php'); ?></a>
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
    
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Yes! I'd like to make a donation!</h4>
          </div>
          <div class="modal-body">
            <form>
              <div class="donation-form">
              <div class="form-group">
                <p>Thank you for choosing to make a contribution to the Mayor's Fund for Philadelphia.  You can designate your contribution for a specific program, or your contribution go toward the Fund's most urgent need.</p>
                <p>Thank you for your support!</p>
                <label for="program-list">Program</label> 
                <select name="Programs" id="program-list">
                  Program
                  <option value="all">Most Urgent Need</option>
                  <option value="the-dilworth-award">Dilworth Award</option>
                  <option value="Graduation Coaches">Graduation Coaches</option>
                  <option value="Better Bike Share Parntership">Better Bike Share Partnership</option>
                  <option value "Mayor's Summer Job Challenge">Mayor's Summer Job Challenge</option>
                </select>
              </div>
              <div class="form group">
                <div class="input-group">
                  <label>Donation Amount</label>
                  <span class="input-group-addon">$</span>
                  <input type="number" class="form-control" aria-label="Amount (to the nearest dollar)">
                </div>
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Go Back</button>
          <button type="button" class="btn btn-primary">Complete My Donation</button>
        </div>
      </div>
    </div>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="<?php bloginfo('template_directory'); ?>/js/vendor/bootstrap.min.js"></script>
    <script src="<?php bloginfo('template_directory'); ?>/js/vendor/slick.min.js"></script>
    <script src="<?php bloginfo('template_directory'); ?>/js/app.js"></script>

    <?php wp_footer(); ?>
</body>
</html>