<?php
include 'db/data.php';
if (isset($_POST['submitClient'])) 
{
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $birthDate = $_POST['birthDate'];
    $card = $_POST['card'];
    $cardNumber = $_POST['cardNumber'];
    $typeCard = $_POST['typeCard'];

    if ($card == 'on') 
    {
        $card = 1;
    } 
    else 
    {
        $card = 0;
    }
    if ($cardNumber == '') 
    {
        $cardNumber = NULL;
    }

    switch ($typeCard == 0){
        case 1:
            $typeCard = 1;
            break;
        case 2:
            $typeCard = 2;
            break;
        case 3:
            $typeCard = 3;
            break;
        case 4:
            $typeCard = 4;
            break;
    }

    $stmt = $bdd->prepare("INSERT INTO clients(firstName, lastName, birthDate, card, cardNumber) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$firstName, $lastName, $birthDate, $card, $cardNumber]);

    $stmt = $bdd->prepare("INSERT INTO cards(cardNumber, cardTypesId) VALUES (?, ?)");
    $stmt->execute([$cardNumber, $typeCard]);

    header('location: index.php');
    exit;
}

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

    

    $stmt = $bdd->prepare("INSERT INTO shows(title, performer, date, showTypesId, firstGenresId, secondGenreId, duration, startTime) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([$title, $artist, $date, $showType, $firstGenres, $secondGenres, $duration, $startTime]);

    header('location: index.php');
    exit;

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Ajouter un client</h3>
    <form action="" method="post">
        <div id="formContainer">
            <input type="text" name="firstName" placeholder="Prénom">
            <input type="text" name="lastName" placeholder="Nom">
            <input type="date" name="birthDate" placeholder="Date de naissance">
            <label for="card">Carte de fidélité</label>
            <input type="checkbox" name="card"> 
            <input type="text" name="cardNumber" placeholder="Numéro de carte de fidélité">
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
    <h3>Ajouter un spectacle</h3>
    <form action="" method="post">
        <div id="formShowContainer">
            <input type="text" name="title" placeholder="Titre">
            <input type="text" name="artist" placeholder="Artiste">
            <input type="date" name="date" placeholder="Date">
            <input type="time" name="duration">
            <input type="time" name="startTime">

            <label for="showType">Type de spectacle</label>
            <select name="showType">
                <?php
                    foreach($bdd->query("SELECT * FROM showtypes") as $row)
                    {
                        echo '<option value="' . $row['id'] . '">' . $row['type'] . '</option>';
                    }
                ?>
            </select>
            <label for="firstGenres">Genre 1</label>
            <select name="firstGenres">
                <?php
                    foreach($bdd->query("SELECT * FROM genres") as $row)
                    {
                        echo '<option value="' . $row['id'] . '">' . $row['genre'] . '</option>';
                    }
                ?>
            </select>
            <label for="secondGenres">Genre 2</label>
            <select name="secondGenres">
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
    <h3>Supprimer un client</h3>
    <table>
        <?php
        foreach($bdd->query('SELECT * FROM clients WHERE id BETWEEN 24 AND 25')as $row) 
        {
            echo '<tr>';
            echo '<td>' . $row['firstName'] . '</td>';
            echo '<td>' . $row['lastName'] . '</td>';
            echo '<td>' . $row['birthDate'] . '</td>';
            echo '<td>' . '<a href="/exercice-3/delete.php?id=' .$row['id'] . '">'.'Delete'.'</a>' .'</td>';
            echo '</tr>';
            
        }
        ?>
    </table>
</body>
</html>