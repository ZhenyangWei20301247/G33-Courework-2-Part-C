<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="background.css">
	<title>Finishi a Rental</title>
</head>
<body>
<?php
require "ConnectDB.php";

	echo "<a href=\"Administer.php\">Administer &nbsp;</a>";
	echo "<a href=\"Welcome.php\">Back</a><br>";

$amount=$_POST["amount"];
$rental=$_POST["rental"];

$sql="select * from rental where RENTAL_ID={$rental}";
$res=$conn->query($sql);
if(!$res->num_rows){
	echo "Record doesn't exist";
	echo "<a href='FinishRentalPayment.html'>Back</a>";
	exit();
}else{
	echo "Record exists";
}


$sql="UPDATE rental SET RETURN_DATE=NOW() WHERE RENTAL_ID={$rental}";
if ($conn->query($sql) === TRUE) {
    echo "<br> RETURN_DATE updated successfully";
	} else {
    echo "<br>Error: " . $sql . "<br>" . $conn->error;
	}

$sql="UPDATE rental SET LAST_UPDATE=NOW() WHERE RENTAL_ID={$rental}";
if ($conn->query($sql) === TRUE) {
    echo "<br> LAST_UPDATE updated successfully";
	} else {
    echo "<br>Error: " . $sql . "<br>" . $conn->error;
	}



$sql="select * from payment where RENTAL_ID={$rental}";
$res=$conn->query($sql);
if(!$res->num_rows){
	echo "<br>Payment doesn't exist";
	echo "<a href='NewPayment.html'>Go to Make new Payment for it</a>";
}else{
	echo "<br>Payment exists";
	$sql="UPDATE payment SET AMOUNT={$amount} WHERE RENTAL_ID={$rental}";
	if ($conn->query($sql) === TRUE) {
    	echo "<br> Amount updated successfully";
	} else {
    	echo "<br>Error: " . $sql . "<br>" . $conn->error;
	}

	$sql="UPDATE payment SET LAST_UPDATE=NOW() WHERE RENTAL_ID={$rental}";
	if ($conn->query($sql) === TRUE) {
    	echo "<br> LAST_UPDATE updated successfully";
	} else {
    	echo "<br>Error: " . $sql . "<br>" . $conn->error;
	}

}

$conn->close();

?>
</body>
</html>