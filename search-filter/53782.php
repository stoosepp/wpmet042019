<?php
/**
 * Search & Filter Pro 
 *
 * Sample Results Template
 * 
 * @package   Search_Filter
 * @author    Ross Morsali
 * @link      http://www.designsandcode.com/
 * @copyright 2015 Designs & Code
 * 
 * Note: these templates are not full page templates, rather 
 * just an encaspulation of the your results loop which should
 * be inserted in to other pages by using a shortcode - think 
 * of it as a template part
 * 
 * This template is an absolute base example showing you what
 * you can do, for more customisation see the WordPress docs 
 * and using template tags - 
 * 
 * http://codex.wordpress.org/Template_Tags
 *
 */

if ( $query->have_posts() )
{	?>

	<!--Found <?php echo $query->found_posts; ?> Results<br />-->
	<div class='search-filter-results-list'>
	<?php
		
		while ( $query->have_posts() ) {
				
		    $query->the_post();
		         
				// Post data goes here.// ?>
				<div class="post-container">
					
					<!-- AUTHOR IMAGES -->
					<div class="home-author-image">
						<?php if($avatar = get_avatar(get_the_author_meta('ID')) !== FALSE): ?>
							<?php $avatar_url = get_avatar_url(get_the_author_meta( 'ID' ), array('size' => 75)); ?>
							<img src="<?php echo $avatar_url; ?>" alt="">
						<?php else: ?>
							<img src="/images/defaultuser.png">
						<?php endif; ?>
						<p> <?php    
							$votecount = get_post_meta(get_the_ID(), 'metric-1-votes', true); 
							$score  = get_post_meta(get_the_ID(), 'metric-1-score', true); ?>
							<p><?php
							if ($votecount){
									echo $votecount;?> <img class="stats-icon" src = "<?php bloginfo("template_directory"); ?>/images/thumbsupicon.png" /><br />
									<?php
							}
	
							if (!empty($score)){
								?><?php 
									$getlength = strlen($score);
									$thelength = 4;
									echo substr($score, 0, $thelength); ?> <img class="stats-icon" src = "<?php bloginfo("template_directory"); ?>/images/staricon.png" /> <?php
							}?> </p>  
					</div>
					<!-- POST IMAGES -->
					<?php if ( has_post_thumbnail() ) {	
						//if (file_exists(the_post_thumbnail_url())){				
							?><div class = "post-image"><img src="<?php the_post_thumbnail_url(); ?>"/></div><?php
							
						//}
					}?>
			<div class="post-copy">
				<h2>
					<a href="<?php echo the_permalink($id); ?>">
					<?php echo get_the_title(); /* or you can use get_the_title() */
					?></a>
				</h2>
				<p class="post-category"><?php echo allCatLinks(); ?></p>
				<p class="post-meta"><?php echo get_the_date(); ?>,
				<?php $author= get_the_author();
					$author_slug  = get_the_author_meta( 'user_login' );
					if ($author){
						//echo 'by <a href="'.get_site_url().'/?_sft_author='.$author_slug.'">'.$author.'</a>';
						//echo  the_author_posts_link(); 
						echo $author;
					
					}
				?>
				<p class="post-excerpt"><?php echo get_the_excerpt(); ?></p>
					
			</div>
			
				</div>
			      
		<?php
			}
	?>
	
<?php
}
else
{
	?>
	<div class='search-filter-results-list' data-search-filter-action='infinite-scroll-end'>
		<p class="end-of-results">"This is the end. My only friend, the end." - Jim Morrison ☹️</p>
	</div>
	<?php
}
?></div>