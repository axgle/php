<?php

require('d:/www/wordpress/wp-load.php');

if(true):
	echo $id=wp_insert_post(
	array(
  "ID"=>"78",
  'post_title'=>wp_filter_nohtml_kses( "ok"),

	'post_content'=>wp_filter_kses('<script>alert(1)</script><b>
	some html code
  oops
   and more <i>oh yes</i></b><base/>').file_get_contents('http://dhv.cc'),
	'post_status'=>'publish'
	)

	);
endif;