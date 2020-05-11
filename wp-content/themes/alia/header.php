<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
	<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-137349206-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-137349206-1');
</script>
<!-- Chống Copy nội dung by AppNet -->

<style>
body {
-webkit-touch-callout: none;
-webkit-user-select: none;
-khtml-user-select: none;
-moz-user-select: none;
-ms-user-select: none;
user-select: none;
}
</style>
<script type="text/javascript">
//<=!=[=C=D=A=T=A=[
document.onkeypress = function(event) {
event = (event || window.event);
if (event.keyCode === 123) {
//alert('No F-12');
return false;
}
};
document.onmousedown = function(event) {
event = (event || window.event);
if (event.keyCode === 123) {
//alert('No F-keys');
return false;
}
};
document.onkeydown = function(event) {
event = (event || window.event);
if (event.keyCode === 123) {
//alert('No F-keys');
return false;
}
};

function contentprotector() {
return false;
}
function mousehandler(e) {
var myevent = (isNS) ? e : event;
var eventbutton = (isNS) ? myevent.which : myevent.button;
if ((eventbutton === 2) || (eventbutton === 3))
return false;
}
document.oncontextmenu = contentprotector;
document.onmouseup = contentprotector;
var isCtrl = false;
window.onkeyup = function(e)
{
if (e.which === 17)
isCtrl = false;
}

window.onkeydown = function(e)
{
if (e.which === 17)
isCtrl = true;
if (((e.which === 85) || (e.which === 65) || (e.which === 88) || (e.which === 67) || (e.which === 86) || (e.which === 83)) && isCtrl === true)
{
return false;
}
}
isCtrl = false;
document.ondragstart = contentprotector;
//]=]=> </script>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<?php if (alia_option('alia_enable_sticky_header')) { ?>
		<div class="sticky_header_nav_wrapper header_nav_wrapper">
			<div class="header_nav">
				<?php
					get_template_part( 'template-parts/header/header_bar' );
				?>
			</div><!-- end .header_nav -->
		</div><!-- end .header_nav_wrapper -->
	<?php } ?>
	<div class="site_main_container">

		<header class="site_header">

			<?php if (alia_cross_option('alia_show_top_header_area', '', 1)): ?>

				<?php
				$custom_header_attr = '';
				if(get_custom_header() && get_header_image()) {
					$custom_header_attr .= ' style=background-image:url('.get_header_image().')';
				}
				?>
			<div class="gray_header" <?php echo esc_attr($custom_header_attr); ?> >
				<div class="container site_header">
					<?php get_template_part( 'template-parts/header/site', 'branding' ); ?>
				</div>
			</div>
			<?php endif; ?>
			<div class="header_nav_wrapper unsticky_header_nav_wrapper">
				<div class="header_nav">
					<?php
						get_template_part( 'template-parts/header/header_bar' );
					?>
				</div><!-- end .header_nav -->
			</div><!-- end .header_nav_wrapper -->
		</header>

		<main id="content" class="site-content">
