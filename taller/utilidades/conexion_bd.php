<?php

	$host = "localhost";
	$user = "root";
	$pw = "";
	$db = "taller_erp";

	$BD = new mysqli($host, $user, $pw, $db);

	if ($BD->connect_errno) {
		echo "Lo sentimos";
		echo "";
		echo "";

		exit;
	}