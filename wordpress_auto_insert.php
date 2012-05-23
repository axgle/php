<?php

require('d:/www/wordpress/wp-load.php');

if(true):
	echo $id=wp_insert_post(
	array(
  "ID"=>"78",
  'post_title'=>wp_filter_nohtml_kses( "ok"),

	'post_content'=>wp_filter_kses('<script>alert(1)</script><b>这样而也
  那是当然的啊,不是吗
  oops
  可以的吗<i>oh yes</i></b>'),//file_get_contents('http://php.net'),
	'post_status'=>'publish'
	)

	);
endif;