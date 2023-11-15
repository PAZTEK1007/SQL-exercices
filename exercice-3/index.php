<?php
include 'db/data.php';
$reponse = $bdd->query('SELECT * FROM clients');


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <div id="exercice1">
            <h3>Exercice 1 // Liste des clients</h3>
            <th>Prénom</th>
            <th>Nom</th>
            <th>Date de naissance</th>
            <?php
        foreach($bdd->query("SELECT * FROM clients") as $row) 
        {
            echo '<tr>';
            echo '<td>' . $row['firstName'] . '</td>';
            echo '<td>' . $row['lastName'] . '</td>';
            echo '<td>' . $row['birthDate'] . '</td>';
            echo '</tr>';
        }
            ?>
        </div>
    </table>
    <table>
        <div id="exercice2">
            <h3>Exercice 2 // Types de spectacles</h3>
            <th>Type</th>
            <?php
        foreach($bdd->query("SELECT * FROM showTypes") as $row)
        {
            echo '<tr>';
            echo '<td>' . $row['type'] . '</td>';
            echo '</tr>';
        }
            ?>
        </div>
    </table>
    <table>
        <div id="exercice3">
            <h3>Exercice 3 // 20 premiers clients</h3>
            <th>Prénom</th>
            <th>Nom</th>
            <?php
        foreach($bdd->query("SELECT * FROM clients LIMIT 20") as $row)
        {
            echo '<tr>';
            echo '<td>' . $row['firstName'] . '</td>';
            echo '<td>' . $row['lastName'] . '</td>';
            echo '</tr>';
        }
            ?>
        </div>
    </table>
    <table>
        <div id="exercice4">
            <h3>Exercice 4 // Clients avec carte de fidélité</h3>
            <th>Prénom</th>
            <th>Nom</th>
            <th>Carte de fidélité</th>
            <th>Numéro de carte</th>
            <?php
        foreach($bdd->query("SELECT * FROM clients WHERE card = 1") as $row)
        {
            echo '<tr>';
            echo '<td>' . $row['firstName'] . '</td>';
            echo '<td>' . $row['lastName'] . '</td>';
            echo '<td>' . $row['card'] . '</td>';
            echo '<td>' . $row['cardNumber'] . '</td>';
            echo '</tr>';
        }
        ?>
        </div>
    </table>
    <div id ="exercice5">
        <h3>Exercice 5 // Clients dont le nom commence par M</h3>
        <?php
    foreach($bdd->query("SELECT * FROM clients WHERE lastName LIKE 'M%' ORDER BY lastName ASC") as $row)
    {        
        echo '<p>' . "nom : "  . $row['lastName'] . '</p>';
        echo '<p>' . "Prénom : " . $row['firstName'] . '</p>';


    }
        ?>
    </div>
    <div id="exercice6">
        <h3>Exercice 6 // Spectacles</h3>
        <?php
        foreach($bdd->query("SELECT * FROM shows WHERE title = title ORDER BY title ASC" ) as $row)
        {
           echo '<p>' . $row['title'] . ' par ' . $row['performer'] . ', le ' . $row['date'] . ' à ' . $row['startTime'] . '</p>';
        }
        ?>
    </div>
    <div id="exercice7">
        <h3>Exercice 7 // Clients</h3>
        <?php
        foreach($bdd->query("SELECT * FROM clients") as $row)
        {
            if ($row['card'] == 1)
            {
                echo '<div class="client">';
                echo '<p>' . 'Nom : ' . $row['lastName'] . '</p>';
                echo '<p>' . 'Prénom : ' . $row['firstName'] . '</p>';
                echo '<p>' . 'Date de naissance : ' . $row['birthDate'] . '</p>';
                echo '<p>' . 'Carte de fidélité : ' . 'Oui' . '</p>';
                echo '<p>' . 'Numéro de carte : ' . $row['cardNumber'] . '</p>';
                echo '</div>';
            }
            else
            {
                echo '<div class="client">';
                echo '<p>' . 'Nom : ' . $row['lastName'] . '</p>';
                echo '<p>' . 'Prénom : ' . $row['firstName'] . '</p>';
                echo '<p>' . 'Date de naissance : ' . $row['birthDate'] . '</p>';
                echo '<p>' . 'Carte de fidélité : ' . 'Non' . '</p>';
                echo '</div>';
            }

        }
     
        ?>
    </div>
</body>
</html>