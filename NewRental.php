<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="background.css">
	<title>New Payment Insert</title>
</head>
<body>
<?php
	require "ConnectDB.php";
	echo "<a href=\"Administer.php\">Administer &nbsp;</a>";
	echo "<a href=\"Welcome.php\">Back</a><br>";

	$sql="SELECT MAX(rental.RENTAL_ID) as maxs FROM rental;";
	$res=$conn->query($sql);
	if($res->num_rows > 0){
		while($row = $res->fetch_assoc()){
			$maxid=$row["maxs"]+1;
			echo "$maxid";
		}
	}

	//$rentalDate=$time;
	//These are the data from POST html
	$inventoryID=$_POST["Inventory"];
	$customerID=$_POST["Customer"];
	$staffID=$_POST["Staff"];



	//These is check if three foreign keys are in the range
	$sql="SELECT MAX(inventory.INVENTORY_ID) as maxs FROM inventory;";
	$res=$conn->query($sql);
	if($res->num_rows > 0){
		while($row = $res->fetch_assoc()){
			if($inventoryID>$row["maxs"]||$inventoryID<0){
				exit("Inventory ID not in Range");
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

	$sql="SELECT MAX(staff.STAFF_ID) as maxs FROM staff;";
	$res=$conn->query($sql);
	if($res->num_rows > 0){
		while($row = $res->fetch_assoc()){
			if($staffID>$row["maxs"]||$staffID<0){
				exit("Staff ID not in Range");
			}
		}
	}
	

	

	//This is Insert Query
	// $timeoffset=8;
	// $time=gmdate("Y-m-d H:i:s",time()+$timeoffset*3600);

	$sqls="";

	$rentalID=$maxid;
	
	//$lastUpdate=$time;
	if($_POST["Return"]=="1"){
		$sqls="INSERT INTO rental(RENTAL_ID, RENTAL_DATE, INVENTORY_ID, CUSTOMER_ID, RETURN_DATE, STAFF_ID, LAST_UPDATE) VALUES ({$rentalID},  NOW(),{$inventoryID},{$customerID}, NOW(),'{$staffID}',  NOW());";
		
	} else{
	 	$sqls="INSERT INTO rental(RENTAL_ID, RENTAL_DATE, INVENTORY_ID, CUSTOMER_ID, RETURN_DATE, STAFF_ID, LAST_UPDATE) VALUES ($rentalID,NOW(),$inventoryID,$customerID,NULL,$staffID,NOW());";
	}

	if ($conn->query($sqls) === TRUE) {
    echo "New record created successfully";
	} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
	}



	//This is checking
	echo "<p>One line is recorded!</p>";
	
	$sql1="SELECT MAX(rental.RENTAL_ID) as maxss FROM rental;";
	$res1=$conn->query($sql1);
	if($res1->num_rows > 0){
		while($row1 = $res1->fetch_assoc()){
			$maxid1=$row1["maxss"];
			echo "$maxid1"."<br>";
			echo "$time";
		}
	}

	$conn->close();

?>
</body>
</html>