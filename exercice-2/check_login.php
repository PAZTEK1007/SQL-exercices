<?php
session_start();

if (isset($_POST['button']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];

    $bdd = new PDO('mysql:host=localhost;dbname=becode;charset=utf8', 'root', 'root');
   
    $req = $bdd->prepare('SELECT username FROM user WHERE username = ? AND password <= ?');
    $req->execute(array($username, sha1($password)));

    if ($result->rowCount() > 0) 
    {
        $data = $result->fetchAll();
        if (password_verify($password, $data['password'])) 
        { 
        echo "Vous êtes connecté.";
        $_SESSION['username'] = $username;
        header('location: read.php');
        exit;
        } 
        else
        {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO user (username, password) VALUES ('$username', '$password')";
        $req = $bdd->prepare($sql);
        $req->execute();
        echo "Enregistrement effectué.";
        }
    }
}
?>
