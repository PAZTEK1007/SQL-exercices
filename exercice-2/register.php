<?php
session_start();
include './db/data.php';
if (isset($_POST['button'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $lastname = $_POST['lastname'];
    $name = $_POST['name'];
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO user (username, email, firstname, lastname, password) VALUES ('$username', '$email', '$name', '$lastname', '$hashedPassword')";
    $req = $bdd->prepare($sql);
    $req->execute();

    echo "Enregistrement effectué.";
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Register</title>
    <link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
</head>
<body>

<form action="" method="post">
    <h3>Register an account</h3>
    <a href="login.php">Login</a>
    <div>
        <label for="username">Identifiant</label>
        <input type="text" name="username">
    </div>
    <div>
        <label for="password">Mot de passe </label>
        <input type="password" name="password">
    </div>
    <div>
        <label for="email">Email </label>
        <input type="email" name="email">
    </div>
    <div>
        <label for="lastname">Nom </label>
        <input type="text" name="lastname">
    </div>
    <div>
        <label for="name">Prenom </label>
        <input type="text" name="name">
    </div>
    <div>
        <button type="submit" name="button">Se connecter</button>
    </div>
</form>
</body>
</html>