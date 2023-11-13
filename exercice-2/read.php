<?php
try {
  $bdd = new PDO('mysql:host=localhost;dbname=becode;charset=utf8', 'root', 'root');
}
catch (Exception $e) {     
  die('Erreur : ' . $e->getMessage());
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
     <?php
      foreach($bdd->query('SELECT * FROM hiking') as $row) {
       
        echo "<tr>";
        echo "<td>".$row['name']."</td>";
        echo "<td>".$row['difficulty']."</td>";
        echo "<td>".$row['distance']."</td>";
        echo "<td>".$row['duration']."</td>";
        echo "<td>".$row['height_difference']."</td>";
        echo "</tr>";
      }
     ?>
    </table>
  </body>
</html>
