<?php
	$path = realpath(dirname(__FILE__) . '/..');
	include_once $path.'/includes/default_config.php';
	include_once $path.'//includes/'.$Config->auth_class;	// Class Auth

	Auth::logout();
?>
