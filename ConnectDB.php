<?php
	require 'Authorise.php';
	
	$conn = new mysqli($sn,$un,$pd,$db);

	if($conn->connect_error){
		die("Connect Failed: ".$conn->connect_error);
	}

	//echo "Connect Successfully!"."<br>";
?>