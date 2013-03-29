<!doctype html>
<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--><html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->
	<head>
		<meta charset="utf-8">

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title><?php wp_title(''); ?></title>

		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

		<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/images/apple-icon-touch.png">
		<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
		<!--[if IE]>
			<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
		<![endif]-->
		<meta name="msapplication-TileColor" content="#f01d4f">
		<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/images/win8-tile-icon.png">

  	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
    <header class="header hide-for-small" id="header" role="banner">
      <div id="header-inner">
        <div class="wrapper">
           <a href="<?php echo home_url(); ?>" rel="nofollow">
            <h1 id="logo">
               <?php bloginfo('name'); ?>
            </h1>
           </a>
           <nav id="navigation-main" class="navigation" role="navigation">
             <?php sn_main_nav(); ?>
           </nav>
         </div>
      </div>
    </header>
    <nav class="top-bar show-for-small">
      <ul class="title-area">
        <li class="name">
          <h1>
            <a href="<?php echo home_url(); ?>" rel="nofollow">
              <?php bloginfo('name'); ?>
            </a>
          </h1>
        </li>
        <li class="toggle-topbar menu-icon">
          <a href="#">
            <span><?php _e('Menu', 'sn'); ?></span>
          </a>
        </li>
      </ul>
      <section class="top-bar-section">
        <?php sn_main_nav(); ?>
      </section>
    </nav>
