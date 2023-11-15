<?php
include 'db/data.php';

$query = $bdd->prepare('SELECT * FROM clients WHERE id = 5');
$query->execute();
$clientData = $query->fetch();

if (isset($_POST['submitClient']))
{
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $birthDate = $_POST['birthDate'];
    $card = $_POST['card'];
    $cardNumber = $_POST['cardNumber'];


   if($card == 'on')
    {
         $card = 1;
    }
    else
    {
        $card = 0;
    }
    if($cardNumber == '')
    {
        $cardNumber = NULL;
    }


    $updateQuery = $bdd->prepare('UPDATE clients SET lastName=?, firstName=?, birthDate=? WHERE id=?');
    $updateQuery->execute([$lastName, $firstName, $birthDate, 5]);
    
    echo "Client mis à jour avec succès.";

}
else
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier</title>
</head>
<body>
<h3>Modifier un client</h3>
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
</body>
</html>