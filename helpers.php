<?php

// these use the date metabox for the page being used.
function get_the_meta_date($id = "default", $is_start_date = true){
	if($id == "default"){
	  $id = get_the_ID();
	}
	if($is_start_date){
	  $date = get_post_meta($id,"_my_start_date");
	} else {
	  $date = get_post_meta($id,"_my_end_date");
	}
	return $date[0];
}

function the_start_date($id = "default", $is_start_date = true){
	echo get_the_meta_date($id, $is_start_date);
}

function the_end_date($id = "default"){
	echo get_the_meta_date($id, false);
}

function get_the_meta_time($id = "default", $is_start_time = true){
	if($id == "default"){
  	$id = get_the_ID();
	}
	if($is_start_time){
  	$time = get_post_meta($id,"_my_start_time");
	} else {
  	$time = get_post_meta($id,"_my_end_time");
	}
	return $time[0];
}

function the_start_time($id = "default", $is_start_time = true){
	echo get_the_meta_time($id, $is_start_time);
}

function the_end_time($id = "default"){
	echo get_the_meta_time($id, false);
}


function get_the_meta_unix($id = "default", $is_start_date = true){
	return strtotime(get_the_meta_date($id, $is_start_date));
}

function the_bonus_unix($is_start = true){
	$id = get_the_ID();
	if($is_start){
	  $unix = get_post_meta($id,"_my_start_unix");
	} else {
	  $unix = get_post_meta($id,"_my_end_unix");
	}
	echo $unix[0];
}
function the_meta_unix($id = "default", $is_start_date = true){
	echo get_the_meta_unix($id, $is_start_date);
}

function get_formatted_meta($format = 'D d F Y', $id = "default", $is_start_date = true){
	$unix = get_the_meta_unix($id, $is_start_date);
	return date ($format, $unix);
}
function formatted_meta($format = 'D d F Y', $id = "default", $is_start_date = true){
	echo get_formatted_meta($format,$id, $is_start_date);
}