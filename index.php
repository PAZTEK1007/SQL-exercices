<?php
try {
    // On se connecte à MySQL
    $bdd = new PDO('mysql:host=localhost;dbname=weather;charset=utf8', 'root', 'root');
} catch (Exception $e) {
    // En cas d'erreur, on affiche un message et on arrête tout
    die('Erreur : ' . $e->getMessage());
}

if (isset($_GET['submit'])) {
    $city = $_GET['city'];
    $max = $_GET['max'];
    $min = $_GET['min'];

    // Utilisation de requête préparée pour l'insertion
    $stmt = $bdd->prepare("INSERT INTO meteo(city, max, min) VALUES (?, ?, ?)");
    $stmt->execute([$city, $max, $min]);

    header('location: index.php');
    exit;
}


if (isset($_GET['del'])) {
    $stmt = $bdd->prepare("DELETE FROM meteo WHERE city = ? ;");
    $stmt->execute([$_GET['city']]);

    header('location: index.php');
    exit;
}


// Affichage des résultats
echo "Weather APP";
foreach ($bdd->query('SELECT * FROM meteo') as $row) {
    echo "<br>";
    echo $row['city'];
    echo " : ";
    echo $row['max'];
    echo "°C";
    echo $row['min'];
    echo "°C";
    echo '<input type="submit" name="del">';
}
?>
<br>
<h3>Add a city</h3>
<form method="get" action="">
<input type="submit" name='delete' value="delete">
<div class="form-group">
    <label for="city">City</label>
    <input type="text" name="city" id="city">
    <label for="max">Max</label>
    <input type="text" name="max" id="max">
    <label for="min">Min</label>
    <input type="text" name="min" id="min">

    <input type="submit" name="submit" value="Envoyer">
</form>
