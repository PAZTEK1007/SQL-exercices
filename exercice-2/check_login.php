<?php
session_start();

$user_valide = "admin";
$pwd_valide = "Azerty00";

    if (isset($_POST['username']) && isset($_POST['password'])) {

        if ($user_valide == $_POST['username'] && $pwd_valide == $_POST['password']) {

            session_start ();
            $_SESSION['username'] = $_POST['username'];
            $_SESSION['password'] = $_POST['password'];

            header ('location: read.php');
        }
        else {
            // Le visiteur n'a pas été reconnu comme étant membre de notre site. On utilise alors un petit javascript lui signalant ce fait
            echo '<body onLoad="alert(\'Membre non reconnu...\')">';
        }
    }
    else {
        echo 'Les variables du formulaire ne sont pas déclarées.';
    }
}
?>
