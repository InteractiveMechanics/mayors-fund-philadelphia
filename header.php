<?php 
    global $post;
    $slug = get_post( $post )->post_name;

    if ( $slug === 'about' ){ wp_redirect( get_permalink(46) ); exit; }

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
        <div class="above-nav hidden-xs">
            <div class="twitter">
                <a href="https://twitter.com/mayorsfundphila"><i class="fa fa-twitter"></i> Follow us</a>
            </div>
            <div class="supporter">
                <a href="#" data-toggle="modal" data-target="#support"><i class="fa fa-heart"></i> Become a supporter</a>
            </div>
        </div>
        <nav class="navbar navbar-default" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Menu</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php print get_bloginfo('url'); ?>"><?php include('svg/logo_header.php'); ?></a>
            </div>

            <?php wp_nav_menu( 
                array( 
                    'theme_location'    => 'primary', 
                    'container_class'   => 'collapse navbar-collapse',
                    'container_id'      => 'bs-example-navbar-collapse-1',
                    'menu_class'        => 'nav navbar-nav navbar-right',
                    'walker'            => new wp_bootstrap_navwalker()
                )
            ); ?>
        </nav>
    </div>
</header>
<main>
