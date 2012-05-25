<?php
/**
 * Front to the WordPress application. This file doesn't do anything, but loads
 * wp-blog-header.php which does and tells WordPress to load the theme.
 *
 * @package WordPress
 */

/**
 * Tells WordPress to load the WordPress theme and output it.
 *
 * @var bool
 */
define('WP_USE_THEMES', false);

/** Loads the WordPress Environment and Template */
require('D:\www\wordpress/wp-blog-header.php');
//register_post_type('go',array("label"=>'go','public'=>true));
$t='qvod';
?>
<a href="qvod.php">refrish</a>
<?
$q  = new wp_query(array('post_type'=>$t));

while($q->have_posts()){
  $q->the_post();
  the_title();
  the_content();
  edit_post_link();
  echo "<br>";
}

  wp_insert_post(array('post_title'=>"new test".rand(),'post_type'=>$t,'post_conent'=>'test ...','post_status'=>'publish'));

?>
<a href="qvod.php">refrish</a>