<?php
	// Берем данные из конфига
	$ini_array = parse_ini_file("config.cfg");
	
	$userDB 	= $ini_array[user];
	$passwordDB = $ini_array[password];
	$nameDB 	= $ini_array[db];
	$hostDB		= $ini_array[host];
	$portDB		= $ini_array[port];
?>