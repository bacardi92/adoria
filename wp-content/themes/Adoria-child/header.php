<?php 

	global $adoria;

	$logo = (isset($adoria['header_logo']['url'])? $adoria['header_logo']['url'] : ''); 
	$button_text = (isset($adoria['header_additional_button_text'])? $adoria['header_additional_button_text'] : null);
	$button_link = (isset($adoria['header_additional_button_link'])? $adoria['header_additional_button_link'] : null);
	extract($adoria);
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-title" content="<?php bloginfo('name'); ?> - <?php bloginfo('description'); ?>">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <?php wp_head(); ?>
</head>
    <body id="adoriaBodyContent" <?php body_class(); ?>>
    	<?php 
			$header_style = '';
			if ( is_admin_bar_showing() ) {
				$header_style="style=\"padding-top:32px;\"";
			}
		?>
		<div id="backToTop"><i class="fa fa-angle-up"></i> <span>Back to top</span></div>
		<header class="container-fluid">
			<div class="blackLine">
				<div class="container"> 
					<div class="topPhone topContact">
						<i class="fa fa-phone"></i>
						<?php foreach ($phone_contact_footer as $phone): extract($phone)  ?>
							<a class="ga-event" target=_blank rel="nofollow" href="skype:<?php echo str_replace(" ", "", $phone_contact_footer_link); ?>?call"><?php echo $phone_contact_footer_link; ?></a>

						<?php endforeach; ?>
					</div>
					<div class="topMail topContact">
						<i class="fa fa-envelope"></i>
						<?php foreach ($email_contact_footer as $email): extract($email)  ?>

							<a href="mailto:<?php echo $email_contact_footer_link; ?>" target=_blank rel="nofollow" class="ga-event"><?php echo $email_contact_footer_link; ?></a>

						<?php endforeach; ?>
					</div>
				</div>

			</div>
			<nav class="navbar container navbar-default" role="navigation">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="/"><img src="<?php echo $logo; ?>" alt="Logo"></a>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse navbar-main-collapse text-uppercase">
					<div class="navbar-form navbar-right">
					<?php if ( $button_text && $button_link ): ?>
						<form action="<?php echo $button_link; ?>">
							<button type="submit" class="btn btn-primary-light"><?php echo $button_text; ?></button>
						</form>
					<?php endif; ?>
					</div>
					<?php
						wp_nav_menu([
							'depth'=>2,
							'theme_location' => 'primary',
							'menu' => 'HeadMenu',
							'menu_class'=>'nav navbar-nav navbar-right',
							'walker'=> new Walker_Extend_Menu(),
							'sort_column' => 'menu_order',
						]);
					?>
				</div><!-- /.navbar-collapse -->
			</nav>
		</header>
