<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="background.css">
	<title>FilmInformation</title>
</head>
<body >
	<a href="Administer.php">Administer &nbsp;</a><br>
	<a href="Welcome.php">Back</a>
	<?php
	require 'ConnectDB.php';
	$gets = $_GET["FILMID"];
	echo "$gets";

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
	echo "<a> Administer </a>";

	echo "<h1 style=\"text-align:center\">The Film Information</h1>";

	if($res->num_rows > 0){
		echo "<table width=70% align=\"center\" border='2'>";
		echo "<tr>";
		echo "<th>ID</th><th>Title</th><th>Description</th><th>Year</th><th>Film Language</th><th>Original Language</th><th>Rental Duration</th><th>Rental Rate</th><th>Length</th><th>Replacement Cost</th><th>Rating</th><th>Special Feature</th>";
		echo "</tr>";
		while ($row=$res->fetch_assoc()) {
			echo "<tr>";
			echo "<th>".$row["FILM_ID"]."</th>"."<th>".$row["TITLE"]."</th>"."<th>".$row["DESCRIPTION"]."</th>"."<th>".$row["RELEASE_YEAR"]."</th>"."<th>".$row["LANG"]."</th>"."<th>".$row["OriLANG"]."</th>"."<th>".$row["RENTAL_DURATION"]."</th>"."<th>".$row["RENTAL_RATE"]."</th>"."<th>".$row["LENGTH"]."</th>"."<th>".$row["REPLACEMENT_COST"]."</th>"."<th>".$row["RATING"]."</th>"."<th>".$row["SPECIAL_FEATURE"]."</th>";
			echo "</tr>";
		}

		echo "</table>";
	}else{
		echo "0 result";
	}

	$conn->close();

	?>
</body>
</html>