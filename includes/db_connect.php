<?php
	define("DB_HOST", "localhost");
	define("DB_USER", "root");
	define("DB_PASS", "root");
	define("DB_NAME", "fifa2018");

	// define("DB_HOST", "us-cdbr-iron-east-04.cleardb.net");
	// define("DB_USER", "bdb8f6a6942bdc");
	// define("DB_PASS", "fd97bab6");
	// define("DB_NAME", "heroku_026fda314241625");

	$db_connect = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

	//Kontrollerar att den finns någon anslutning till db
	if($db_connect->connect_errno) {
		echo "Det gick inte att ansluta till databasen " . $db_connect->connect_error;
		exit();
	}
	// else {
	// 	echo "Det funkar";
	// }

	$db_connect->set_charset("utf8");

	function hasDateExpired($startDate){

		$date = date('Y-m-d H:i:s');
		$currentDate = strtotime($date);
		$lock_time = $currentDate+(60*10);

		$start_time = strtotime($startDate);

		return $start_time >= $lock_time;
	}
?>