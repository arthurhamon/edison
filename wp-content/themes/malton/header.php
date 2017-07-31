<!DOCTYPE html>
<html <?php language_attributes(); ?> <?php get_locale(); ?>>
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	
	<?php if(wpmd_is_tablet()) : ?>
	<meta name="viewport" content="width=1080">
	<?php else : ?>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php endif; ?>
    <!--meta name="viewport" content="width=1020, initial-scale=1"-->
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php bloginfo('name'); ?><?php wp_title(); ?></title>

    <?php wp_head(); ?>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="<?php if(is_front_page()) echo 'is-front-page'; ?> <?php if(wpmd_is_phone()) echo 'is-phone'; ?> <?php if(wpmd_is_tablet()) echo 'is-tablet'; ?>" data-spy="scroll" data-target="#nav-scroll" data-offset="200">
	<?php 
		if(is_front_page()) {
			get_template_part('blocks/front-page/first-screen');
		}	
	?>
	<div id="content">
	<div id="menu-first-screen" class="first-screen-wrap-menu">
		<div class="close-area"></div>
		<?php wp_nav_menu( array( 'theme_location' => 'main-menu', 'container_class' => 'menu', 'menu_class' => '' ) ); ?>
	</div>
	<div class="header">
		<div class="fixed-part">
			<div class="container">
				<div class="row">
					<div class="col-xs-1 visible-xs">	
						<div class="wrap-btn-menu">
							<a href="#menu-first-screen" class="btn-menu switch-menu-first-screen" id="switch-menu-first-screen">
								<span class="icon"><span class="middle-line"></span></span>
							</a>
						</div>
					</div>
					<div class="col-sm-2 col-xs-10">
						<a href="/" class="logo"></a>
					</div>
					<div class="col-xs-10 hidden-xs text-right">
						<?php wp_nav_menu( array( 'theme_location' => 'main-menu', 'container_class' => 'menu', 'menu_class' => '' ) ); ?>
					</div>
				</div>
			</div>
		</div>
	</div>