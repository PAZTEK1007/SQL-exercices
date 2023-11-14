<?php
include '/db/data.php';

if(isset($_POST['button'])){
	$name = $_POST['name'];
	$difficulty = $_POST['difficulty'];
	$distance = $_POST['distance'];	
	$duration = $_POST['duration'];
	$height_difference = $_POST['height_difference'];
	$avaible = $_POST['available'];

	$stmt = $bdd->prepare("INSERT INTO hiking(name, difficulty, distance, duration, height_difference, avaible) VALUES (?, ?, ?, ?, ?, ?)");
	$stmt->execute([$name, $difficulty, $distance, $duration, $height_difference, $available]);

	header('location: create.php');
	echo "The hiking has been added with success";
	exit;
}	

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Ajouter une randonnée</title>
	<link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
</head>
<body>
	<a href="/exercice-2/read.php">Liste des données</a>
	<h1>Ajouter</h1>
	<form action="" method="post">
		<div>
			<label for="name">Name</label>
			<input type="text" name="name" value="">
		</div>

		<div>
			<label for="difficulty">Difficulté</label>
			<select name="difficulty">
				<option value="très facile">Très facile</option>
				<option value="facile">Facile</option>
				<option value="moyen">Moyen</option>
				<option value="difficile">Difficile</option>
				<option value="très difficile">Très difficile</option>
			</select>
		</div>

		<div>
			<label for="distance">Distance</label>
			<input type="text" name="distance" value="">
		</div>
		<div>
			<label for="duration">Durée</label>
			<input type="time" name="duration" value="">
		</div>
		<div>
			<label for="height_difference">Dénivelé</label>
			<input type="text" name="height_difference" value="">
		</div>
		<div>
			<label for="available">Disponible</label>
			<select name="available">
				<option value="très facile">Très facile</option>
				<option value="facile">Facile</option>
				<option value="moyen">Moyen</option>
				<option value="hard">Difficile</option>
				<option value="very hard">Très difficile</option>
			</select>
		</div>

		<button type="submit" name="button">Envoyer</button>
	</form>
</body>
</html>
