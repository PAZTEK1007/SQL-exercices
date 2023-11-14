<?php
/**** Supprimer une randonnée ****/
session_start();

include './db/data.php';

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
