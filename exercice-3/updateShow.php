<?php
include 'db/data.php';

$sql = "SELECT * FROM clients WHERE id = 22";
$result = $bdd->prepare($sql);
$result->execute();
$clientData = $result->fetch();



if (isset($_POST['submitClient']))
{
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $birthDate = $_POST['birthDate'];
    $card = $_POST['card'];
    $cardNumber = $_POST['cardNumber'];
    $typeCard = $_POST['typeCard'];

   

    $updateQuery = $bdd->prepare('UPDATE clients SET lastName=?, firstName=?, birthDate=?, card=?, cardNumber=? WHERE id=?');
    $updateQuery->execute([ $lastName, $firstName, $birthDate, $card, $cardNumber, 22]);
    
    echo "Client mis à jour avec succès.";

}

$query = $bdd->prepare('SELECT * FROM shows WHERE id = 1');
$query->execute();
$hikingData = $query->fetch();

if (isset($_POST['submitShow'])) 
{

    $title = $_POST['title'];
    $artist = $_POST['artist'];
    $date = $_POST['date'];
    $duration = $_POST['duration'];
    $startTime = $_POST['startTime'];
    $showType = $_POST['showType'];
    $firstGenres = $_POST['firstGenres'];
    $secondGenres = $_POST['secondGenres'];


    $updateQuery = $bdd->prepare('UPDATE shows SET title=?, performer=?, date=?, showTypesId=?, firstGenresId=?,  secondGenreId=?, duration=?, startTime=? WHERE id=?');
    $updateQuery->execute([$title, $artist, $date, $showType, $firstGenres, $secondGenres, $duration, $startTime, 1]);	

    echo "Spectacle mise à jour avec succès.";

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier</title>
</head>
<body>
<h3>Ajouter un client</h3>
    <form action="" method="post">
        <div id="formContainer">
            <input type="text" name="firstName" value="<?php echo $clientData['firstName'] ?>">
            <input type="text" name="lastName" value="<?php echo $clientData['lastName'] ?>">
            <input type="date" name="birthDate" value="<?php echo $clientData['birthDate'] ?>">
            <label for="card">Carte de fidélité</label>
            <input type="checkbox" name="card" value="<?php echo $clientData['card'] ?>"> 
            <input type="text" name="cardNumber" value="<?php echo $clientData['cardNumber'] ?>">
            <select name="typeCard">
                <option value="0">Aucune</option>
                <option value="1">Fidélité</option>
                <option value="2">Famille Nombreuse</option>
                <option value="3">Etudiant</option>
                <option value="4">Employé</option>
            </select>
            <input type="submit" name="submitClient" value="Envoyer">
        </div>
    </form>
<h3>Modifier un spectacle</h3>
    <form action="" method="post">
        <div id="formShowContainer">
            <input type="text" name="title" value="<?php echo $hikingData['title'] ?>">
            <input type="text" name="artist" value="<?php echo $hikingData['performer'] ?>">
            <input type="date" name="date" value="<?php echo $hikingData['date'] ?>">
            <label for="duration">Durée</label>
            <input type="time" name="duration" value="<?php echo $hikingData['duration'] ?>">
            <label for="startTime">Heure de début</label>
            <input type="time" name="startTime" value="<?php echo $hikingData['startTime'] ?>">

            <label for="showType">Type de spectacle</label>
            <select name="showType" value="<?php echo $hikingData['showTypesId'] ?>">
                <?php
                    foreach($bdd->query("SELECT * FROM showtypes") as $row)
                    {
                        echo '<option value="' . $row['id'] . '">' . $row['type'] . '</option>';
                    }
                ?>
            </select>
            <label for="firstGenres">Genre 1</label>
            <select name="firstGenres" value="<?php echo $hikingData['firstGenresId'] ?>">
                <?php
                    foreach($bdd->query("SELECT * FROM genres") as $row)
                    {
                        echo '<option value="' . $row['id'] . '">' . $row['genre'] . '</option>';
                    }
                ?>
            </select>
            <label for="secondGenres">Genre 2</label>
            <select name="secondGenres" value="<?php echo $hikingData['secondGenreId'] ?>">
                <?php
                    foreach($bdd->query("SELECT * FROM genres") as $row)
                    {
                        echo '<option value="' . $row['id'] . '">' . $row['genre'] . '</option>';
                    }
                ?>
            </select>
            <input type="submit" name="submitShow" value="Envoyer">
        </div>
    </form>
</body>
</html>