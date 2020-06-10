<?php
	define('DB_HOST','localhost');
	define('DB_USER','root');
	define('DB_PASS','');
	define('DB_NAME','online_attendance');

	$connection_status = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);


	
	if(!$connection_status){
		die("Connection Failed".mysqli_connect_error());
	}



?>