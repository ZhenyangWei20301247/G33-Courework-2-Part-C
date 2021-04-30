<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="background.css">
	<title>Delete a Address</title>
</head>
<body>
	<form action="" method="get">
		<table>
			<tr>
				<th>Enter the Address ID to Delete:</th>
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
	@$sql="SELECT * FROM address WHERE ADDRESS_ID={$addressId};";
	if($conn->query($sql)===True){
		echo "Deleted Successfully!";
	}
	echo "<a href=\"Administer.php\"";


	?>

</body>
</html>