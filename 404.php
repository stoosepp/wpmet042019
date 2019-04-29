<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>

<div class="content-container">

			<header class="page-header">
				<h1 class="page-title"><?php _e( 'Not Found', 'twentythirteen' ); ?></h1>
			</header>

			<div class="page-wrapper">
				<div class="page-content">
					<h2><?php _e( 'Hrrmmmmm. The thing is not here.', 'twentythirteen' ); ?></h2>
					<p><?php _e( 'It looks like nothing was found at this location. Maybe head back to the home page...', 'twentythirteen' ); ?></p>

					<a href="<?php echo get_site_url();?>">Take me to there!</a>
				</div><!-- .page-content -->
			</div><!-- .page-wrapper -->

		</div>
	

<?php get_footer(); ?>