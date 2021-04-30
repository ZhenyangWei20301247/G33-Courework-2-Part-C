<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="background.css">
	<title>Create new Customer Account</title>
</head>
<body>
	<?php
	require "ConnectDB.php";

	$storeID=$_POST["storeID"];
	$fname=$_POST["fname"];
	$lname=$_POST["lname"];
	$email=$_POST["email"];
	$addressID=$_POST["addressID"];
	$active=$_POST["active"];

	$maxid="";

	$sql="SELECT MAX(address.ADDRESS_ID) as maxs FROM address;";
	$res=$conn->query($sql);
	if($res->num_rows > 0){
		while($row = $res->fetch_assoc()){
			$maxid=$row["maxs"]+1;
			echo "$maxid"."<br>";
		}
	}
	$customerID=$maxid;

	$sql="INSERT INTO customer(CUSTOMER_ID,STORE_ID,FIRST_NAME,LAST_NAME,EMAIL,ADDRESS_ID,ACTIVE,CREATE_DATE,LAST_UPDATE) VALUES ({$customerID},{$storeID},'{$fname}','{$lname}','{$email}', {$addressID},{$active},NOW(),NOW());";
	if($conn->query($sql)===TRUE){
		echo "Insert Successfully!";
	}else{
		echo "Error:". $sql . "<br>" . $conn->error;
	}

	?>
</body>
</html>