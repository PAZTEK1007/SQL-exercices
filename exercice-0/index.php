<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=weatherapp;charset=utf8', 'root', 'root');
} catch (Exception $e) {
    
    die('Erreur : ' . $e->getMessage());
}

if (isset($_GET['submit'])) {
    $city = $_GET['city'];
    $max = $_GET['max'];
    $min = $_GET['min'];


    $stmt = $bdd->prepare("INSERT INTO meteo(city, max, min) VALUES (?, ?, ?)");
    $stmt->execute([$city, $max, $min]);

    header('location: index.php');
    exit;
}

if (isset($_GET['deletebtn'])) {
  
    if (isset($_GET['delete'])) {
        $cityToDelete = $_GET['delete'];

        $stmt = $bdd->prepare("DELETE FROM meteo WHERE city = ?");
        $stmt->execute([$cityToDelete]);
        echo "La ligne a été supprimée.";
    }

}


echo "Weather APP";
foreach ($bdd->query('SELECT * FROM meteo') as $row) {
    echo "<form method='get' action=''>";
    echo "<br>";
    echo $row['city'];
    echo " : ";
    echo $row['max'];
    echo "°C";
    echo $row['min'];
    echo "°C";
    echo "<input type='checkbox' name='delete' value='".$row['city']."'>";
    echo "<input type='submit' name='deletebtn' value='Delete'>";
    echo "</form>";
}

?>

<br>
<h3>Add a city</h3>
<form method="get" action="">
<div class="form-group">
    <label for="city">City</label>
    <input type="text" name="city" id="city">
    <label for="max">Max</label>
    <input type="text" name="max" id="max">
    <label for="min">Min</label>
    <input type="text" name="min" id="min">
    <input type="submit" name="submit" value="Envoyer">
</form>
