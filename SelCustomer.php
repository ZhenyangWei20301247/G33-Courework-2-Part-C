<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="background.css">
	<title>Search a Customer</title>
</head>
<body>
	<form action="" method="get">
		<table>
			<tr>
				<th>Enter the Film ID to Search:</th>
			</tr>
			<tr>
				<th><input type="text" name="customerID"></th>
			</tr>
			<tr>
				<td><input type="submit" value="Go"></td>
			</tr>
		</table>
	</form>

	<?php
	require "ConnectDB.php";

	@$customerID=$_GET["customerID"];
	$sql="SELECT * FROM customer WHERE CUSTOMER_ID={$customerID}";

	$res=$conn->query($sql);
	if(!@$res->num_rows){
		echo "<br>Film ID is not existed";
		echo "<br><a href=\"Administer.php\">Back</a>";
		exit;
	}
	echo "<table width=70% align=\"center\" border='2'>";
		echo "<tr>";
		echo "<th>CUSTOMER_ID</th><th>STORE_ID</th><th>FIRST_NAME</th><th>LAST_NAME</th><th>EMAIL</th><th>ADDRESS_ID</th><th>ACTIVE</th><th>CREATE_DATE</th><th>LAST_UPDATE</th>";
		echo "</tr>";
		while ($row=$res->fetch_assoc()) {
			echo "<tr>";
			echo "<th>".$row["CUSTOMER_ID"]."</th>"."<th>".$row["STORE_ID"]."</th>"."<th>".$row["FIRST_NAME"]."</th>"."<th>".$row["LAST_NAME"]."</th>"."<th>".$row["EMAIL"]."</th>"."<th>".$row["ADDRESS_ID"]."</th>"."<th>".$row["ACTIVE"]."</th>"."<th>".$row["CREATE_DATE"]."</th>"."<th>".$row["LAST_UPDATE"]."</th>";
			echo "</tr>";
		}

		echo "</table>";

	?>

	<a href="Administer.php" style="font-size: 15">Back</a>
</body>
</html>