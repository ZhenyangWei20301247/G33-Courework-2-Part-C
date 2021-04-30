<?php
	if($_COOKIE["isLogin"]!="1"){
		echo "<script>alert(\"Login First!!\");</script>";
		header("Location:Login.html");
	}
	?>
<!DOCTYPE html>
<html>
<head>

	<link rel="stylesheet" type="text/css" href="background.css">
	<title>Administer</title>
</head>
<body>
	<a href="Administer.php">Administer &nbsp;</a><br>
	<a href="Welcome.php">Back</a>
	<?php
	echo "<a href=\"LogOut.php\">Log Out</a>";
	?>
	<table style="background-color:  rgba(255, 240, 245, 0.4)">
		<tr>
			<td height="60px"><button onclick=JavaScript:window.location.href="NewRental.html">Record New Rental</button></td>
		</tr>
		<tr>
			<td height="60px"><button onclick=JavaScript:window.location.href="NewPayment.html">Make New Payment</button></td>
		</tr>
		<tr>
			<td height="60px"><button onclick=JavaScript:window.location.href="FinishRentalPayment.html">FinishRentalPayment</button></td>
		</tr>
		<tr>
			<td height="60px"><button onclick=JavaScript:window.location.href="NewCustomer.html">New Customer</button></td>
			<td height="60px"><button onclick=JavaScript:window.location.href="EditCustomer.html">Edit Customer</button></td>
		</tr>
	</table>
	<table style="background-color:  rgba(255, 240, 245, 0.4)">
		<tr>
			<td width="200px" height="60px"><button onclick=JavaScript:window.location.href="SelFilm.html">Search a film</button></td>
			<td width="200px" height="60px"><button onclick=JavaScript:window.location.href="DelFilm.php">Delete a film</button></td>
		</tr>
		<tr>
			<td width="200px" height="60px"><button onclick=JavaScript:window.location.href="SelInventory.php">Search a Inventory</button></td>
			<td width="200px" height="60px"><button onclick=JavaScript:window.location.href="DelInventory.php">Delete a Inventory</button></td>
		</tr>
		<tr>
			<td width="200px" height="60px"><button onclick=JavaScript:window.location.href="SelCustomer.php">Search a Customer</button></td>
			<td width="200px" height="60px"><button onclick=JavaScript:window.location.href="DelCustomer.php">Delete a Customer</button></td>
		</tr>
		<tr>
			<td width="200px" height="60px"><button onclick=JavaScript:window.location.href="SelRental.php">Search a Rental</button></td>
			<td width="200px" height="60px"><button onclick=JavaScript:window.location.href="NewAdd.html">Add an Address</button></td>
		</tr>
		<tr>
			<td width="200px" height="60px"><button onclick=JavaScript:window.location.href="SelAdd.php">Search an Address</button></td>
			<td width="200px" height="60px"><button onclick=JavaScript:window.location.href="DelAdd.php">Delete an Address</button></td>
		</tr>
	</table>

	

	

</body>
</html>