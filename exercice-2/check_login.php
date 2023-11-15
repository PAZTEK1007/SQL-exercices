<?php
session_start();

if (isset($_POST['button']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];


    $bdd = new PDO('mysql:host=localhost;dbname=becode;charset=utf8', 'root', 'root');
    
    $req = $bdd->prepare('SELECT * FROM user WHERE username = ? AND password <= ?');
    $req->execute(array($username, sha1($password)));
    $user = $req->fetch();

    if ($user AND password_verify($password, $user['password']))
    {
        echo "Vous êtes connecté.";
        $_SESSION['username'] = $username;
        
        header('location: read.php');
        exit;
    
    }
    else
    {
        echo "Mot de passe incorrect.";
    }
}
else
{
    echo "Utilisateur non trouvé";

}


?>
