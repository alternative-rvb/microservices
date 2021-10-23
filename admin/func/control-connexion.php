<?php
session_start();
require '../inc/config.php';
include SITE_ROOT . 'admin/func/functions.php';
include SITE_ROOT . 'admin/func/crud-utilisateurs.php';

echo '$_REQUEST';
var_dump($_REQUEST);

session_unset();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $valid = true;
    // $email = filter_var(test_input($_POST['email']), FILTER_VALIDATE_EMAIL);
    $email = test_input($_POST['email']);
    $password = $_POST['password'];

    if (empty($email)) {
        $_SESSION['Message'] = '⚠ Veuillez entrer votre adresse e-mail';
        $valid = false;
            header('Location:'.WEB_ROOT.'connexion.php');
    }
    if (empty($password)) {
        $_SESSION['Message'] = '⚠ Veuillez entrer votre Mot de passe';
        $valid = false;
            header('Location:'.WEB_ROOT.'connexion.php');
    }

    if ($valid) {
        $req = readUserID('utilisateurs', $email, $password);
        
        if (!empty($req)) {
            foreach ($req as $item) {
                if ($item['Email'] == $email && $item['Password'] == $password) {

                    $_SESSION['Pseudo'] = $item['Prénom'] . ' ' . $item['Nom'];
                    $_SESSION['Role'] = $item['Rôle'];
                    $_SESSION['Message'] = "✅ Connecté";
                    header('Location:'.WEB_ROOT);
                }
            }
        } else {
            $_SESSION['Message'] = "⚠ Identifiant ou Mot de passe inconnu";
            header('Location:'.WEB_ROOT.'connexion.php');
        }
    }
}

echo '$_SESSION';
var_dump($_SESSION);

?>

<a href="<?= WEB_ROOT . 'connexion.php' ?>">Retour</a>