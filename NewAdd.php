<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="background.css">
	<title>Add new Address</title>
</head>
<body>
	<?php
	require "ConnectDB.php";

	$address=$_GET["address"];
	$address2=$_GET["address2"];
	$district=$_GET["district"];
	$city_ID=$_GET["city_ID"];
	$post=$_GET["post"];
	$phone=$_GET["phone"];
	$maxid="";

	$sql="SELECT MAX(address.ADDRESS_ID) as maxs FROM address;";
	$res=$conn->query($sql);
	if($res->num_rows > 0){
		while($row = $res->fetch_assoc()){
			$maxid=$row["maxs"]+1;
			echo "$maxid"."<br>";
		}
	}
	$addressid=$maxid;

	$sql="INSERT INTO address(ADDRESS_ID, ADDRESS, ADDRESS2, DISTRICT, CITY_id, POSTAL_CODE, PHONE, LAST_UPDATE) VALUES ({$addressid},'{$address}','{$address2}','{$district}',{$city_ID},{$post},{$phone},NOW());";
	if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
	} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
	echo "<a href=\"NewAdd.html\">";

	?>
		<a href="Administer.php">Back</a>


</body>
</html>