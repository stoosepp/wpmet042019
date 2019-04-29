<!DOCTYPE html>
<html style="margin-top:0px !important;">
	<head>
		
	    <title><?php echo get_bloginfo( 'name' ); ?></title>
	    <script>
// When the user scrolls the page, execute myFunction 
window.onscroll = function() {hugNavBarToTop()};

// Add the sticky class to the header when you reach its scroll position. Remove "sticky" when you leave the scroll position
function hugNavBarToTop() {
	
	// Get the filter menu
	var filterMenu = document.getElementById("navbar");
	
	// Get the offset position of the navbar
	var sticky = filterMenu.offsetTop;
  
  if (window.pageYOffset > 115) {
    filterMenu.classList.add("sticky");
  } else {
    filterMenu.classList.remove("sticky");
  }
}
	</script>
	   
	</head>
	<body>
<!--
		<!--HEADER-->
		<?php get_header(); ?>
		
		<!--SEARCH AND FILTER-->
		<div id="navbar">
			<!--<p><a href="<?php get_site_url();?>/?_sft_category=announcements">Announcements</a></p>-->
			<!-- <?php echo do_shortcode( '[searchandfilter id="53782"]' ); ?> -->
			<?php echo do_shortcode( '[searchandfilter id="54446"]' ); ?>
			
		</div>
		<div class="content-container">
		<!-- <?php echo do_shortcode( '[searchandfilter id="53782" show="results"]' ); ?> -->
		<?php echo do_shortcode( '[searchandfilter id="54446" show="results"]' ); ?>
		</div>
		
		<!--FOOTER-->
		<?php get_footer(); ?>

	</body>
</html>