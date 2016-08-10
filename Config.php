<?php
	$servername = '89.77.118.160';
	$DB_USERNAME = 'user';
	$DB_PASSWORD = '666number';
	$conn = mysqli_connect($servername, $DB_USERNAME, $DB_PASSWORD);
	if (!$conn)
	{
	die("Failed to connect to MySQL: " .  mysqli_connect_error());
	} else {
	echo "Connected";
	}
?>