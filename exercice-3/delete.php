<?php
include 'db/data.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];


    $delQuery = $bdd->prepare('DELETE FROM clients WHERE id = ?');
    $delQuery->execute([$id]);
    echo "Client supprimé avec succès.";
}
else
{
    echo "Erreur lors de la suppression du client.";
}
?>