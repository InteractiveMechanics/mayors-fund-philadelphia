<?php 
    function detectmobile(){
        $agent = $_SERVER['HTTP_USER_AGENT'];
        $useragents = array (
            "iPhone",
            "iPod",
            "Android",
            "blackberry9500",
            "blackberry9530",
            "blackberry9520",
            "blackberry9550",
            "blackberry9800",
            "webOS",
            "iPad"
            );
            $result = false;
        foreach ( $useragents as $useragent ) {
        if (preg_match("/".$useragent."/i",$agent)){
                $result = true;
            }
        }
        return $result;
    }
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
    <meta name="title" content="<?php wp_title( '|', true, 'right' ); ?>">
	<meta name="Copyright" content="Copyright &copy; <?php bloginfo('name'); ?> <?php echo date('Y'); ?>. All Rights Reserved.">

    <title><?php wp_title( '-', true, 'right' ); ?></title>

    <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" />

    <link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <?php wp_head(); ?>
</head>
<body>
  <header>
    <div class="container">
      <div class="aboveNav">
        <div class="twitter">
          <span class="fa-stack fa-lg">
            <a href="https://twitter.com/mayorsfundphila"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-twitter fa-stack-1x fa-inverse"></i></a>
          </span>
        </div>
        <div class="supporter">
          <i class="fa fa-heart"></i> Become a supporter!
        </div>
      </div>
    </div>
    <div class="container">
      <nav class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Brand</a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">

              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">About the Fund <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="#">About the Fund</a></li>
                  <li><a href="#">Board &amp; Staff</a></li>
                  <li><a href="#">Annual Report</a></li>
                  <li><a href="#">Staff Resources</a></li>
                </ul>
              </li>
              <li><a href="#">Our Initiatives</a></li>
              <li><a href="#">Media</a></li>
              <li><a href="#">Get Involved</a></li>
            </ul>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>
    </div>
  </header>
  <main>
