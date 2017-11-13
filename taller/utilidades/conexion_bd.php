<?php

	$host = "localhost";
	$user = "root";
	$pw = "";
	$db = "taller_erp";

	/*$host = "mysql.hostinger.co.uk";
	$user = "u716137959_darka";
	$pw = "123456";
	$db = "u716137959_erp";*/

	/*$host = "localhost";
	$user = "id3585513_root";
	$pw = "123456";
	$db = "id3585513_darkalika";*/

	$BD = new mysqli($host, $user, $pw, $db);

	if ($BD->connect_errno) {
		echo "Lo sentimos";
		echo "";
		echo "";

		exit;
	}