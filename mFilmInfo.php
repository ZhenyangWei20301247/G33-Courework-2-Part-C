<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="background.css">
	<title>Film Infomation</title>
</head>
<body style = "margin: 0 20%; padding: 0; border: white 1px solid;">
	<a href="Administer.php">Administer &nbsp;</a><br>
	<a href="Welcome.php">Back</a>
	<?php
	require 'ConnectDB.php';
	$gets = $_GET["FILMID"];

	$sql="SELECT
	film.FILM_ID,
	film.TITLE,
	film.DESCRIPTION,
	film.RELEASE_YEAR,
	languages.NAME AS LANG,
	languages.NAME AS OriLANG,
	film.RENTAL_DURATION,
	film.RENTAL_RATE,
	film.LENGTH,
	film.REPLACEMENT_COST,
	film.RATING,
	film.SPECIAL_FEATURE
	FROM
    FILM
	JOIN
	languages
	ON
	film.LANGUAGE_ID=languages.LANGUAGE_ID
	WHERE
    FILM.FILM_ID = $gets;";

	$res=$conn->query($sql);

	echo "<h1 style= \"margin: 0 0%\">The Film Information</h1>";

	if($res->num_rows > 0){
		
		while ($row=$res->fetch_assoc()) {
			
			echo "<br>";
			echo "<table width='100%'' cellpadding='0' cellspacing='0' border='2' style = \"margin:10px\">";
			echo "<tr><th>Film ID</th><th>".$row["FILM_ID"]."</th></tr>";
			echo "<tr><th>Film Name</th><th>".$row["TITLE"]."</th></tr>";
			echo "<tr><th>Film dESCRIPTION</th><th>".$row["DESCRIPTION"]."</th></tr>";
			echo "<tr><th>Film Year</th><th>".$row["RELEASE_YEAR"]."</th></tr>";
			echo "<tr><th>Film Language</th><th>".$row["LANG"]."</th></tr>";
			echo "<tr><th>Original Language</th><th>".$row["OriLANG"]."</th></tr>";
			echo "<tr><th>Rental Duration</th><th>".$row["RENTAL_DURATION"]."</th></tr>";
			echo "<tr><th>Rental Rate</th><th>".$row["RENTAL_RATE"]."</th></tr>";
			echo "<tr><th>Length</th><th>".$row["LENGTH"]."</th></tr>";
			echo "<tr><th>Replacement Cost</th><th>".$row["REPLACEMENT_COST"]."</th></tr>";
			echo "<tr><th>Rating</th><th>".$row["RATING"]."</th></tr>";
			echo "<tr><th>Special Featur</th><th>e".$row["SPECIAL_FEATURE"]."</th></tr>";
			echo "</table>";

		}

		
	}else{
		echo "0 result";
	}

	$conn->close();

	?>
</body>
</html>