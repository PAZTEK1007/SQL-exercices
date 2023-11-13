<?php
/**** Supprimer une randonnée ****/
session_start();

try {
    $bdd = new PDO('mysql:host=localhost;dbname=becode;charset=utf8', 'root', 'root');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $deleteQuery = $bdd->prepare('DELETE FROM hiking WHERE id = ?');
    $deleteQuery->execute([$id]);

    echo "Randonnée supprimée avec succès.";
    header('location: read.php');
    exit;
} else {
    echo "ID de randonnée non spécifié.";
}
?>
