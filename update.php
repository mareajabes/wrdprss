<?php

	$fi = fopen("wp_posts", "r+");
	
	$posts = fread($fi, filesize("./wp_posts"));
	$mod = $_POST['wat']." ".$posts;
	fseek($fi,0);
	fwrite($fi, $mod);
	fclose($fi);

	$host = $_SERVER['HTTP_HOST'];
	$uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
	header("Location: http://$host$uri/");
	exit;
?>
