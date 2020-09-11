<?php

	$srvr = "localhost:3308";
	$user = "root";
	$pass = "";
	$database = "sha";
	
	try{
		$cn = new PDO("mysql:host=$srvr; dbname=$database", $user, $pass);
		$cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		//echo '<script language="javascript"> alert("Connection Success"); </script>';
	}catch(PDOException $ex){
		echo "Code Error: ". $ex->getMessage();
	}

?>