<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="background.css">
	<title>Delete Inventory</title>
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

	function deleteC($inventory){
		return "DELETE FROM inventory WHERE INVENTORY_ID={$inventory}";
	}

	@$inventoryID=$_GET["inventoryID"];
	$sql=deleteC($inventoryID);
	// if($conn->query($sql)==TRUE){
	// 	echo "New record deleted successfully";
	// } else {
 //    echo "Error: " . $sql . "<br>" . $conn->error;
	// }


	?>

</body>
</html>