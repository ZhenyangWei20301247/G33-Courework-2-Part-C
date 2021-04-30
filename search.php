<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="background.css">
	<title>Search Result</title>
</head>
<body>
<?php
	require "ConnectDB.php";
	require 'CheckDevice.php';

	echo "<a href=\"Administer.php\">Administer &nbsp;</a>";
	echo "<a href=\"Welcome.php\">Back</a><br>";

if(isset($_GET["film"])){
	$film=$_GET["film"];
}else{
	$film="#";
}

$searchMode=$_GET["filmStatus"];
$year=$_GET["year"];
$language=$_GET["language"];
$rating=$_GET["rating"];
$rrate=$_GET["rrate"];
$line=$_GET["line"];
$order=$_GET["order"];
$orderby=$_GET["orderby"];
$url=$_SERVER['HTTP_HOST'];
$target=isMobile();
$SQL="SELECT film.FILM_ID ,film.TITLE, film.RENTAL_RATE ,film.RELEASE_YEAR,film.RATING,film.DESCRIPTION,film.LENGTH FROM film ORDER BY rand() LIMIT {$line};";
//echo "$rrate";


if($searchMode=="1"){
	if(isset($_GET["film"])){
		echo "Empty Search!";
		echo "<br>You need to enter the film name for accurately search";
		echo "<br><a href='Welcome.php'>Back</a>";
		exit;
	}else{
		$sql="SELECT film.FILM_ID ,film.TITLE, film.RENTAL_RATE ,film.RELEASE_YEAR,film.RATING,film.DESCRIPTION,film.LENGTH FROM film WHERE film.TITLE='{$film}';";
	}
	
}else{
	//RANDOM MODE, FILM, LANGUAGE, RATING, RATE, LINE, >3, ASC
	if($rrate==1 && $order=="ASC"){
		$sql="SELECT film.FILM_ID ,film.TITLE, film.RENTAL_RATE ,film.RELEASE_YEAR,film.RATING,film.DESCRIPTION,film.LENGTH FROM film WHERE RELEASE_YEAR={$year} AND LANGUAGE_ID={$language} AND RATING='{$rating}' AND RENTAL_RATE<3 ORDER BY '{$orderby}' ASC LIMIT {$line};";
	}elseif ($rrate==1 && $order=="DESC") {//RANDOM MODE, FILM, LANGUAGE, RATING, RATE, LINE, >3, DESC
		$sql="SELECT film.FILM_ID ,film.TITLE, film.RENTAL_RATE ,film.RELEASE_YEAR,film.RATING,film.DESCRIPTION,film.LENGTH FROM film WHERE RELEASE_YEAR={$year} AND LANGUAGE_ID={$language} AND RATING='{$rating}' AND RENTAL_RATE<3 ORDER BY '{$orderby}' DESC LIMIT {$line};";
	}elseif ($rrate==0 && $order=="ASC") {//RANDOM MODE, FILM, LANGUAGE, RATING, RATE, LINE, <3, ASC
		$sql="SELECT film.FILM_ID ,film.TITLE, film.RENTAL_RATE ,film.RELEASE_YEAR,film.RATING,film.DESCRIPTION,film.LENGTH FROM film WHERE RELEASE_YEAR={$year} AND LANGUAGE_ID={$language} AND RATING='{$rating}' AND RENTAL_RATE>=3 ORDER BY '{$orderby}' ASC LIMIT {$line};";
	}elseif ($rrate==0 && $order=="DESC") {
		$sql="SELECT film.FILM_ID ,film.TITLE, film.RENTAL_RATE ,film.RELEASE_YEAR,film.RATING,film.DESCRIPTION,film.LENGTH FROM film WHERE RELEASE_YEAR={$year} AND LANGUAGE_ID={$language} AND RATING='{$rating}' AND RENTAL_RATE>=3 ORDER BY '{$orderby}' DESC LIMIT {$line};";
	}else{
		echo "ERROR";
		echo "$sql";
		exit;
	}
}

//echo "$sql";

$result=$conn->query($sql);
if($result->num_rows > 0){
	echo "<table border='1'>";
		echo "<tr>";
		echo "<th>Title</th><th>Rental Rate</th><th>Year</th><th>Rating</th><th>Description</th><th>Length</th>";
		echo "</tr>";
		while ($row = $result->fetch_assoc()) {
			$id=$row["FILM_ID"];
			echo "<tr>";
			echo "<th>".$row["TITLE"]."</th>"."<th>".$row["RENTAL_RATE"]."</th>"."<th>".$row["RELEASE_YEAR"]."</th>"."<th>".$row["RATING"]."</th>"."<th>".$row["DESCRIPTION"]."</th>"."<th>".$row["LENGTH"]."</th>";			
			if(!$target){
				echo "<td style='width:100px;'><button onclick=\"JavaScript:window.location.href='FilmInfo.php?FILMID=$id'\"> Details</button> </td>";
			}else{
				echo "<td style='width:100px;'><button onclick=\"JavaScript:window.location.href='mFilmInfo.php?FILMID=$id'\"> Details</button> </td>";
			}

			echo "</tr>";
		}
		echo "</table>";
	}else{
		echo "0 result";
	}
	echo "<br><a href='Welcome.php'>Back</a>";

	$conn->close();


?>
</body>
</html>