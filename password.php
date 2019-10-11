<?php

$PASSWORD = '1337'; 
session_start();
if( ! isset($_SESSION['_sfm_allowed'])) {
	// sha1, and random bytes to thwart timing attacks.  Not meant as secure hashing.
	$t = bin2hex(openssl_random_pseudo_bytes(10));	
	if(isset($_POST['p']) && sha1($t.$_POST['p']) === sha1($t.$PASSWORD)) {
		$_SESSION['_sfm_allowed'] = true;
		header('Location: ?');
		exit;
	}
	echo '<html><body><form action=? method=post>curious ??: <input type=password name=p autofocus required></form></body></html>'; 
	exit;
}

?>
