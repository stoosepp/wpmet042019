<!DOCTYPE html>
<head>
	<?php wp_head() ?>
	<!--Code to Scroll up on FacetWP's pagination -->
	<script>
(function($) {
    $(document).on('facetwp-loaded', function() {
        if (FWP.loaded) {
            $('html, body').animate({
                scrollTop: $('.facetwp-template').offset().top
            }, 500);
        }
    });
})(jQuery);

</script>
<link rel="stylesheet" type="text/css" href="<?php bloginfo("template_directory"); ?>/style.css" />
<!-- <script type='text/javascript' src='<?php get_site_url();?>/wp-includes/js/jquery/jquery.js?ver=1.12.4'></script> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
		<!--<link rel="stylesheet" type="text/css" href="<?php bloginfo("template_directory"); ?>/css/font-awesome.min.css" />-->
</head>
<html>
	<body>
		<div id="header">
			<div id="banner">
				<a href="http://www.ubc.ca" target="_blank"><img src="<?php bloginfo("template_directory"); ?>/images/ubc-logo-small.png"/></a>
				<a href="<?php echo get_site_url();?>"><h1><?php echo get_bloginfo( 'name' ); ?></h1></a>
				<h2><?php echo get_bloginfo( 'description' ); ?></h2>
				
				<?php if ( is_user_logged_in() ) { ?>
					<div class="login-prompt">Hi <?php $current_user = wp_get_current_user();echo $current_user->user_firstname;?>.<br/> <a href="<?php echo get_site_url();?>/wp-admin/post-new.php">Add post</a>  |  <a href="<?php echo get_site_url();?>/wp-admin/">Dashboard</a> |  <a href="<?php echo wp_logout_url();?>">Logout</a></div>
				<?php } else { ?>
				<div class="login-prompt"><a href="<?php echo wp_login_url(); ?>" title="Login">[LOG IN]</a></div>
				<?php } ?>
				
				<!-- <a id="about-the-course" href="#" title="About the Course">About the Course</a> -->
			</div>
			
		</div>

	</body>
</html>