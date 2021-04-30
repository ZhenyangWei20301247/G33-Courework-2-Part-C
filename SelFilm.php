<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="background.css">
	<title>Search a film</title>
</head>
<body>
	<?php
	require "ConnectDB.php";

	$filmID=$_GET["filmID"];
	

    $sql="SELECT MAX(film.FILM_ID) as maxs FROM film;";
	$res=$conn->query($sql);
	if($res->num_rows > 0){
		while($row = $res->fetch_assoc()){
			if($filmID>$row["maxs"]||$filmID<0){
				exit("Film ID not in Range");
			}
		}
	}





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
    FILM.FILM_ID ={$filmID}";



	$res=$conn->query($sql);
	if(!$res->num_rows){
		echo "<br>Film ID is not existed";
		echo "<br><a href=\"Administer.php\">Back</a>";
		exit;
	}
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

	?>

	<a href="Administer.php" style="font-size: 15">Back</a>

</body>
</html>