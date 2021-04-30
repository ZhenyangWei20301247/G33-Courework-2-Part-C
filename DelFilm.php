<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="background.css">
	<title>Delete a Film</title>
</head>
<body>
	<form action="" method="="get>
		<table>
			<tr>
				<th>Film ID to Delete: </th>
			</tr>
			<tr>
				<th><input type="text" name="filmID"></th>
			</tr>
			<tr>
				<tb><input type="submit" value="Go"></tb>
			</tr>
		</table>
	</form>

	<a href="Administer.php" style="font-size: 15">Back</a>

	<?php
	require "ConnectDB.php";

	@$filmID=$_GET["filmID"];
	// $sql="DELETE FROM film_actor WHERE FILM_ID={$filmID};";
	// if($conn->query($sql)==TRUE){
	// 	echo "New record deleted successfully";
	// } else {
 //    echo "Error: " . $sql . "<br>" . $conn->error;
	// }


	// $sql="DELETE FROM film_text WHERE FILM_ID={$filmID};";
	// if($conn->query($sql)==TRUE){
	// 	echo "New record deleted successfully";
	// } else {
 //    echo "Error: " . $sql . "<br>" . $conn->error;
	// }

	// $sql="DELETE FROM film_category WHERE FILM_ID={$filmID};";
	// if($conn->query($sql)==TRUE){
	// 	echo "New record deleted successfully";
	// } else {
 //    echo "Error: " . $sql . "<br>" . $conn->error;
	// }

	// $sql="DELETE FROM inventory WHERE FILM_ID={$filmID};";
	// if($conn->query($sql)==TRUE){
	// 	echo "New record deleted successfully";
	// } else {
 //    echo "Error: " . $sql . "<br>" . $conn->error;
	// }

//	$sql="DELETE FROM film WHERE FILM_ID={$filmID};";
//	if($conn->query($sql)==TRUE){
//		echo "New record deleted successfully";
//	} else {
//    echo "Error: " . $sql . "<br>" . $conn->error;
//	}

	?>

</body>
</html>