<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="background.css">
	<title>Search an inventory</title>
</head>
<body>
	<form action="" method="get">
		<table>
			<tr>
				<th>Enter the Inventory ID to Search:</th>
			</tr>
			<tr>
				<th><input type="text" name="inventoryID"></th>
			</tr>
			<tr>
				<td><input type="submit" value="Go"></td>
			</tr>
		</table>
	</form>

	<a href="Administer.php" style="font-size: 15">Back</a>

	<?php
	require "ConnectDB.php";
@	$inventoryID=$_GET["inventoryID"];
	$sql="SELECT * FROM inventory WHERE INVENTORY_ID={$inventoryID}";
	$res=$conn->query($sql);
	if(!@$res->num_rows){
		echo "<br>ID is not correct";
		//echo "<br><a href=\"Administer.php\">Back</a>";
		exit;
	}
	echo "<table width=70% align=\"center\" border='2'>";
		echo "<tr>";
		echo "<th>Inventory ID</th><th>Film ID</th><th>Store ID</th><th>Last Update</th>";
		echo "</tr>";
		while ($row=$res->fetch_assoc()) {
			echo "<tr>";
			echo "<th>".$row["INVENTORY_ID"]."</th>"."<th>".$row["FILM_ID"]."</th>"."<th>".$row["STORE_ID"]."</th>"."<th>".$row["LAST_UPDATE"]."</th>";
			echo "</tr>";
		}

		echo "</table>";

	?>
</body>
</html>