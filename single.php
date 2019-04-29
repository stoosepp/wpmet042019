<!DOCTYPE html>
<html style="margin-top:0px !important;">
	<head>
		<link rel="stylesheet" type="text/css" href="<?php bloginfo("template_directory"); ?>/style.css" />
	    <title><?php echo get_bloginfo( 'name' ); ?></title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<!-- IMPORT STUFF FOR PULSE -->
	   <!-- <script type='text/javascript' src='<?php echo plugins_url(); ?>/pulse-cpt/js/form.js?t=1511293041&#038;ver=1.0'></script>
		<script type='text/javascript' src='<?php echo plugins_url(); ?>/pulse-cpt/js/pulse.js?t=1511293041&#038;ver=1.0'></script>
		<script type='text/javascript' src='<?php echo plugins_url();?>/pulse-cpt/js/bootstrap-popover.min.js?ver=1.0'></script> -->

	</head>
	<body>
<!--
		<!--HEADER-->
		<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
 
get_header(); ?>
<div id="navbar">
	<a  href="<?php echo get_site_url(); ?>"><div class="single-back"><p><< Back to main</p></div></a>
</div>
<div class="content-container"> 
    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
 
        <?php
        // Start the loop.
        while ( have_posts() ) : the_post();
            /*
             * Include the post format-specific template for the content. If you want to
             * use this in a child theme, then include a file called called content-___.php
             * (where ___ is the post format) and that will be used instead.
             */
             ?><div class="single-post-container">
            <?php if ( has_post_thumbnail() ) {
							?>						
								 <div class = "post-image"><img src="<?php the_post_thumbnail_url('medium'); ?>"/></div><?php
							}?>
							<div class="single-author-image">
								<?php if($avatar = get_avatar(get_the_author_meta('ID')) !== FALSE): ?>
	                    	<?php $avatar_url = get_avatar_url(get_the_author_meta( 'ID' ), array('size' => 75)); ?>

                            <img src="<?php echo $avatar_url; ?>" alt="">
                            
                        <?php else: ?>
                            <img src="/images/defaultuser.png">
                        <?php endif; ?>
							</div>
					<div class="post-copy">
                    
			        <h1><?php echo the_title(); ?></h1>
			        <p class="post-meta"><?php echo get_the_date(); ?>, by <?php echo the_author_posts_link(); ?></p>
					<p> <?php    
							$votecount = get_post_meta(get_the_ID(), 'metric-1-votes', true); 
							$score  = get_post_meta(get_the_ID(), 'metric-1-score', true); ?>
							<p><?php
							if ($votecount){
									echo $votecount;?> <img class="stats-icon" src = "<?php bloginfo("template_directory"); ?>/images/thumbsupicon.png" /> 
									<?php
							}
	
							if (!empty($score)){
								?><?php 
									$getlength = strlen($score);
									$thelength = 4;
									echo substr($score, 0, $thelength); ?> <img class="stats-icon" src = "<?php bloginfo("template_directory"); ?>/images/staricon.png" /> <?php
							}?> </p>  
	                               <?php
			
			//The Content 
			echo the_content(); 
			?><hr><?php
             if ( is_user_logged_in() ) { ?>
					<p></p>
				<?php } else { ?>
				<p>Remember to <a href="<?php echo wp_login_url(); ?>" title="Login">login to leave feedback!</a></p>
				<?php } 
			
			//Pulse Widget
			if ( is_active_sidebar( 'below-single-post' ) ) : ?>
    <div  class="pulse-widget" role="complementary">
    	<?php dynamic_sidebar( 'below-single-post' ); ?>
    	</div>
     
		<?php endif; ?>
		<div class="post-navigation">
			<h3>Post Navigation</h3>
            <div class="prev-post"><?php previous_post_link(); ?></div>
            <div class="next-post">    <?php next_post_link(); ?></div>
		</div>
			 </div>
			 <?php
        // End the loop.
        endwhile;
        ?>
 
             </div>
    </div><!-- .content-area -->
</div>
<?php get_footer(); ?>

	</body>
</html>