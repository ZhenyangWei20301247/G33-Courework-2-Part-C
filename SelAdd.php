<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="background.css">
	<title>Select an address</title>
</head>
<body>
	<form action="" method="get">
		<table>
			<tr>
				<th>Enter the Address ID to Search:</th>
			</tr>
			<tr>
				<th><input type="text" name="addressID"></th>
			</tr>
			<tr>
				<td><input type="submit" value="Go"></td>
			</tr>
		</table>
	</form>

	<?php
	require "ConnectDB.php";

	@$addressID=$_GET["addressID"];

	$sql="SELECT MAX(address.ADDRESS_ID) as maxs FROM address;";
	$res=$conn->query($sql);
	if($res->num_rows > 0){
		while($row = $res->fetch_assoc()){
			if($addressID>$row["maxs"]||$addressID<0){
				exit("Address ID not in Range");
			}
		}
	}



	$sql="SELECT * FROM address WHERE ADDRESS_ID={$addressID};";

	$res=$conn->query($sql);
	if(!@$res->num_rows){
		echo "<br>Address ID is not existed";
		echo "<br><a href=\"Administer.php\">Back</a>";
		exit;
	}
	echo "<table width=70% align=\"center\" border='2'>";
		echo "<tr>";
		echo "<th>Address_ID</th><th>ADDRESS</th><th>ADDRESS2</th><th>DISTRICT</th><th>CITY_ID</th><th>POSTAL_CODE</th><th>PHONE</th><th>LAST_UPDATE</th>";
		echo "</tr>";
		while ($row=$res->fetch_assoc()) {
			echo "<tr>";
			echo "<th>".$row["ADDRESS_ID"]."</th>"."<th>".$row["ADDRESS"]."</th>"."<th>".$row["ADDRESS2"]."</th>"."<th>".$row["DISTRICT"]."</th>"."<th>".$row["CITY_ID"]."</th>"."<th>".$row["POSTAL_CODE"]."</th>"."<th>".$row["PHONE"]."</th>"."<th>".$row["LAST_UPDATE"]."</th>";
			echo "</tr>";
		}

		echo "</table>";

	?>

	<a href="Administer.php" style="font-size: 15">Back</a>

</body>
</html>