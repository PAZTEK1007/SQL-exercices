<?php
include './db/data.php';

session_start ();

if (isset($_SESSION['username']) && isset($_SESSION['password'])) {

	echo '<body>';
	echo 'Votre login est '.$_SESSION['username'].' et votre mot de passe est '.$_SESSION['password'].'.';
	echo '<br />';

	
	echo '<a href="logout.php">Déconnection</a>';
}
else {
	echo 'Les variables ne sont pas déclarées.';
}

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Randonnées</title>
    <link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
  </head>
  <body>
    <h1>Liste des randonnées</h1>
    <table>
      <!-- Afficher la liste des randonnées -->
      <th> Nom </th>
      <th> Difficulté </th>
      <th> Distance </th>
      <th> Durée </th>
      <th> Dénivelé </th>
      <th> Disponibilité </th>
     <?php
      foreach($bdd->query('SELECT * FROM hiking') as $row) {
       
        echo "<tr>";
        echo "<td>".$row['name']."</td>";
        echo "<td>".$row['difficulty']."</td>";
        echo "<td>".$row['distance']."</td>";
        echo "<td>".$row['duration']."</td>";
        echo "<td>".$row['height_difference']."</td>";
        echo "<td>".$row['available']."</td>";
        echo '<td>' . '<a href="/exercice-2/update.php?id=' .$row['id'] . '">'.'Modifier'.'</a>' .'</td>';
        echo '<td>' . '<a href="/exercice-2/delete.php?id=' .$row['id'] . '">'.'Delete'.'</a>' .'</td>';
        echo "</tr>";
      }
     ?>
    </table>
  </body>
</html>
