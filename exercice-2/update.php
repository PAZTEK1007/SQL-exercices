<?php
session_start();

include './db/data.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = $bdd->prepare('SELECT * FROM hiking WHERE id = ?');
    $query->execute([$id]);
    $hikingData = $query->fetch();

    if (isset($_POST['button'])) {
        $name = $_POST['name'];
        $difficulty = $_POST['difficulty'];
        $distance = $_POST['distance'];
        $duration = $_POST['duration'];
        $height_difference = $_POST['height_difference'];
		$available = $_POST['available'];

        $updateQuery = $bdd->prepare('UPDATE hiking SET name=?, difficulty=?, distance=?, duration=?, height_difference=?,  available=? WHERE id=?');
        $updateQuery->execute([$name, $difficulty, $distance, $duration, $height_difference, $available, $id]);

        echo "Randonnée mise à jour avec succès.";
    }
} else {
    echo "ID de randonnée non spécifié.";
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
			<input type="text" name="name" value="<?php echo $hikingData['name']; ?>">	
		</div>

		<div>
			<label for="difficulty">Difficulté</label>
			<select name="difficulty">
				<option value="très facile" <?php if ($hikingData['difficulty'] == 'très facile') echo 'selected'; ?>>Très facile</option>
				<option value="facile" <?php if ($hikingData['difficulty'] == 'facile') echo 'selected'; ?>>Facile</option>
				<option value="moyen" <?php if ($hikingData['difficulty'] == 'moyen') echo 'selected'; ?>>Moyen</option>
				<option value="difficile" <?php if ($hikingData['difficulty'] == 'difficile') echo 'selected'; ?>>Difficile</option>
				<option value="très difficile" <?php if ($hikingData['difficulty'] == 'très difficile') echo 'selected'; ?>>Très difficile</option>
			</select>
		</div>
		
		<div>
			<label for="distance">Distance</label>
			<input type="text" name="distance" value="<?php echo $hikingData['distance']; ?>">
		</div>
		<div>
			<label for="duration">Durée</label>
			<input type="duration" name="duration" value="<?php echo $hikingData['duration']; ?>">
		</div>
		<div>
			<label for="height_difference">Dénivelé</label>
			<input type="text" name="height_difference" value="<?php echo $hikingData['height_difference']; ?>">
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
