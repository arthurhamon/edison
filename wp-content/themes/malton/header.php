<!DOCTYPE html>
<html <?php language_attributes(); ?> <?php get_locale(); ?>>
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php bloginfo('name'); ?><?php wp_title(); ?></title>
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
	<?php wp_head(); ?>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body data-spy="scroll" data-target="#navbar" class="<?php if(wpmd_is_phone()) echo 'is-phone'; ?> <?php if(wpmd_is_tablet()) echo 'is-tablet'; ?>">
  <div class="visible-xs visible-sm">
	  <div class="wrap-mobile-menu" id="mobile-menu">
		  <div class="mobile-menu text-center">
				<div class="vertical-middle">
					<?php wp_nav_menu( array( 'theme_location' => 'main-menu', 'container_class' => 'menu', 'container_id' => 'navbar', 'menu_class' => '' ) ); ?>
				</div>
		  </div>
	  </div>
  </div>
  <header class="text-center">
	<div class="top-part">
		<div class="vertical-bottom">
			<a href="/" class="logo hidden-xs hidden-sm"><img src="<?php echo get_bloginfo('template_url').'/svg/logo-2.svg'; ?>" alt="" /></a>	
			<a href="/" class="logo"><img src="<?php echo get_bloginfo('template_url').'/svg/logo-3.svg'; ?>" alt="" /></a>	
		</div>
	</div>
	<div class="middle-part">
		<a class="switch-mobile-menu visible-xs visible-sm" href="#mobile-menu"><div class="icon"><div class="middle-line"></div></div></a>
		<div class="vertical-middle hidden-xs hidden-sm">
			<?php wp_nav_menu( array( 'theme_location' => 'main-menu', 'container_class' => 'menu', 'container_id' => 'navbar', 'menu_class' => '' ) ); ?>
		</div>
	</div>
	<div class="bottom-part">
		<div class="h4 phone hidden-xs hidden-sm"><?php the_field('phone', 'options'); ?></div>
		<p class="address hidden-xs hidden-sm"><?php the_field('address', 'options'); ?></p>
		<a class="btn btn-red text-uppercase hidden-xs hidden-sm" href="#">Напишите нам</a>
		<?php if( have_rows('social', 'options') ): ?>
		<div class="social">
			<?php while ( have_rows('social', 'options') ) : the_row(); ?>
				<a href="<?php the_sub_field('href'); ?>"><i class="fa <?php the_sub_field('icon'); ?>" aria-hidden="true"></i></a>
			<?php endwhile; ?>
		</div>
		<?php endif; ?>
		<a class="btn btn-red text-uppercase visible-xs visible-sm" href="#"><i class="fa fa-comment" aria-hidden="true"></i></a>
		<div class="copyright hidden-xs hidden-sm">© Калуга 2017<br />Сделано в Malton Tech.</div>
	</div>
  </header>
  <div id="content">