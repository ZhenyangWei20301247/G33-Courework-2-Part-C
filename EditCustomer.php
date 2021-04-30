<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="background.css">
	<title>Create new Customer Account</title>
</head>
<body>
	<?php
	require "ConnectDB.php";

	$customerID=$_POST["customerID"];
	$storeID=$_POST["storeID"];
	$fname=$_POST["fname"];
	$lname=$_POST["lname"];
	$email=$_POST["email"];
	$addressID=$_POST["addressID"];
	$active=$_POST["active"];

	$sql="SELECT * FROM customer WHERE customerID={$customerID};";
	$res=$conn->query($sql);
	if(!$res->num_rows){
		echo "Not existed!<br>";
		echo "<a href=\"EditCustomer.html\">Back</a>";
		exit();
	}

	$sql="UPDATE customer SET STORE_ID={$storeID},FIRST_NAME={$fname},LAST_NAME={$lname},EMAIL={$email},ADDRESS_ID={$addressID},ACTIVE={$active},CLAST_UPDATE=NOW() WHERE CUSTOMER_ID={$customerID};";
	if($conn->query($sql)===TRUE){
		echo "Update Successfully!";
	}else{
		echo "Error:". $sql . "<br>" . $conn->error;
	}

	?>
</body>
</html>