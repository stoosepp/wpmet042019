<?php
/**
 * Register our sidebars and widgetized areas.
 *
 */
function met_widgets_init() {

	register_sidebar( array(
		'name'          => 'Below Single Post',
		'id'            => 'below-single-post',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="rounded">',
		'after_title'   => '</h2>',
	) );

}
add_action( 'widgets_init', 'met_widgets_init' );

function catName($cat_id) {
    $cat_id = (int) $cat_id;
    $category = &get_category($cat_id);
    return $category->name;
}
function catLink($cat_id) {
    $category = get_the_category();
    $category_link = get_category_link($cat_id);
    echo $category_link;
}

function catCustom() {
   $cats = get_the_category($post->ID);
    $parent = get_category($cats[1]->category_parent);
    if (is_wp_error($parent)){
        $cat = get_category($cats[0]);
      }
      else{
        $cat = $parent;
      }
    echo '<a href="'.get_site_url().'/?_sft_category='.$cat->slug.'">'.$cat->name.'</a>';    
}
function allCatLinks() {
  $cats = get_the_category($post->ID);
  $string = '';
  for ($x = 1; $x <= count($cats); $x++) {
    $cat = $cats[$x-1];
    if ($x == count($cats)){
      $string .= '<a href="'.get_site_url().'/?_sft_category='.$cat->slug.'">'.$cat->name.' </a>';
    }
    else{
      $string .= '<a href="'.get_site_url().'/?_sft_category='.$cat->slug.'">'.$cat->name.'</a>  |  ';
    }
    
  } 
   echo $string; 
      
}
function checkURL($url){
  $handle = curl_init($url);
  curl_setopt($handle,  CURLOPT_RETURNTRANSFER, TRUE);
  
  /* Get the HTML or whatever is linked in $url. */
  $response = curl_exec($handle);
  
  /* Check for 404 (file not found). */
  $httpCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);
  if($httpCode == 404) {
      /* Handle 404 here. */
      echo 'No';
  }
  else{
    echo 'Yes';
  }
  
  curl_close($handle);
}

?>