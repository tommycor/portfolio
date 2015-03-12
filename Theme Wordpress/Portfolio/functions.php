<?php 
function isMobile(){
	//User agent
	$user_agent = $_SERVER['HTTP_USER_AGENT'];
	//test si il s'agit d'un mobile
	return 	preg_match('/iphone/i',$user_agent) || preg_match('/android/i',$user_agent) || preg_match('/ipad/i',$user_agent) || preg_match('/ipod/i',$user_agent)
			|| preg_match('/Windows Phone/i',$user_agent) || preg_match('/mobile/i',$user_agent) || preg_match('/phone/i',$user_agent) ||preg_match('/blackberry/i',$user_agent);
	 
}