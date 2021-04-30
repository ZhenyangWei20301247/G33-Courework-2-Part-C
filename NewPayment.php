<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="background.css">
	<title>New Payment</title>
</head>
<body>
	<?php
require "ConnectDB.php";
	echo "<a href=\"Administer.php\">Administer &nbsp;</a>";
	echo "<a href=\"Welcome.php\">Back</a><br>";

	$sql="SELECT MAX(payment.PAYMENT_ID) as maxs FROM payment;";
	$res=$conn->query($sql);
	if($res->num_rows > 0){
		while($row = $res->fetch_assoc()){
			$maxid=$row["maxs"]+1;
			echo "$maxid"."<br>";
		}
	}

	$staffID=$_POST["staff"];
	$customerID=$_POST["customer"];
	$rentalID=$_POST["rental"];
	$amount=$_POST["amount"];
	echo "$customerID";
	

	//These is check if three foreign keys are in the range
	$sql="SELECT MAX(staff.STAFF_ID) as maxs FROM staff;";
	$res=$conn->query($sql);
	if($res->num_rows > 0){
		while($row = $res->fetch_assoc()){
			if($staffID>$row["maxs"]||$staffID<0){
				exit("Staff ID not in Range");
			}
		}
	}

	$sql="SELECT MAX(customer.CUSTOMER_ID) as maxs FROM customer;";
	$res=$conn->query($sql);
	if($res->num_rows > 0){
		while($row = $res->fetch_assoc()){
			if($customerID>$row["maxs"]||$customerID<0){
				exit("Customer ID not in Range");
			}
		}
	}

	$sql="SELECT MAX(rental.RENTAL_ID) as maxs FROM rental;";
	$res=$conn->query($sql);
	if($res->num_rows > 0){
		while($row = $res->fetch_assoc()){
			if($rentalID>$row["maxs"]||$rentalID<0){
				exit("Rental ID not in Range");
			}
		}
	}

	// $timeoffset=8;
	// $time=gmdate("Y-m-d H:i:s",time()+$timeoffset*3600);

	$sqls="";

	$paymentID=$maxid;
	
	//$lastUpdate=$time;
	if($_POST["noRental"]!="1"){
		$sqls="INSERT INTO payment(PAYMENT_ID, CUSTOMER_ID, STAFF_ID, RENTAL_ID, AMOUNT,PAYMENT_DATE, LAST_UPDATE) VALUES ({$paymentID}, {$customerID},{$staffID}, {$rentalID}, {$amount}, NOW(), NOW());";
		
	} else{
	 	$sqls="INSERT INTO payment(PAYMENT_ID, CUSTOMER_ID, STAFF_ID, RENTAL_ID, AMOUNT,PAYMENT_DATE, LAST_UPDATE) VALUES  ({$paymentID}, {$customerID},{$staffID}, NULL, {$amount}, NOW(), NOW());";
	}

	if ($conn->query($sqls) === TRUE) {
    echo "New record created successfully";
	} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
?>
</body>
</html>