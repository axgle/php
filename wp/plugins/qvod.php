<?php
/**
Plugin Name: qvod
*/
add_action('init','qvod');
function qvod(){
  register_post_type('qvod',
  array('public'=>true,'label'=>'Qvod',
  //'rewrite' =>  false,//array('slug'=>'','with_front'=>false),
  'query_var'=>false,
	  'show_ui' => true,
 // 'capability_type'=>'post' ,
  ));
  
}

//flush_rewrite_rules();
?>