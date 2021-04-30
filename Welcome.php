<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="background.css">
	<title>Welcome to Movie Shop!</title>
</head>
<body>
	<h1>Welcome to Movie Shop Website!!!</h1><br>
	<a href="Administer.php">Adiminister &nbsp;</a><br>


	<?php 
	require 'ConnectDB.php';
	require 'CheckDevice.php';

	$url=$_SERVER['HTTP_HOST'];
	$target=isMobile();
	$sql="SELECT film.FILM_ID ,film.TITLE, film.RENTAL_RATE ,film.RELEASE_YEAR,film.RATING,film.DESCRIPTION,film.LENGTH FROM film ORDER BY rand() LIMIT 5;";//Write Query
	 $result = $conn->query($sql);

	echo "Film you may like: <br>";

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


	$conn->close();

	?>

	<p>I am looking for:</p>
	<form action="search.php" method="get">
		<table border="1">
			<tr>
				<th>I want to see: <input type="text" name="film"></th>
			</tr>
			<tr>
				<th>Searching Mode:</th>
				<th>Search By Given Film Name<input type="radio" name="filmStatus" value="1" checked></td>
				<th>Just Random!!!<input type="radio" name="filmStatus" value="0"></td>
			</tr>
			<tr>
				<th>Year:</th>
				<td>2006<input type="radio" name="year" value="2006" checked></td>
			</tr>
			<tr>
				<th>Language:</th>
				<td>English<input type="radio" name="language" value="1" checked></td>
			</tr>
			<tr>
				<th>Rating:</th>
				<td>G<input type="radio" name="rating" value="G" checked></td>
				<td>PG<input type="radio" name="rating" value="PG"></td>
				<td>PG-13<input type="radio" name="rating" value="PG-13"></td>
				<td>R<input type="radio" name="rating" value="R"></td>
				<td>NC-17<input type="radio" name="rating" value="NC-17"></td>
			</tr>
			<tr>
				<th>Rental Rate:</th>
				<td>More than $3<input type="radio" name="rrate" value="1" checked></td>
				<td>Less than $3<input type="radio" name="rrate" value="0"></td>
			</tr>
			<tr>
				<td>Return Lines:</td>
				<td>10 Lines<input type="radio" name="line" value="10" checked></td>
				<td>25 Lines<input type="radio" name="line" value="25"></td>
				<td>50 Lines<input type="radio" name="line" value="50"></td>
				<td>100 Lines<input type="radio" name="line" value="100"></td>
			</tr>
			<tr>
				<td>Order By</td>
				<td>Title<input type="radio" name="orderby" value="TITLE" checked></td>
				<td>Rental Rate<input type="radio" name="orderby" value="RENTAL_RATE"></td>
			</tr>
			<tr>
				<td>Ascending:<input type="radio" name="order" value="ASC" checked=></td>
				<td>Descending:<input type="radio" name="order" value="DESC"></td>
			</tr>
			<tr>
				<th><input type="submit" value="Search!"></th>
			</tr>
		</table>
	</form>

</body>
</html>