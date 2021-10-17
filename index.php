<?php
session_start();
require __DIR__ . "/inc/config.php";
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <?php
    include __DIR__ . "/inc/meta.php";
    ?>
    <title>PHP training</title>
</head>


<body>
    <?php
    include __DIR__ . "/inc/header.php";
    ?>
    <main class="container p-1">
        <div class="row">
            <h1>CRUD</h1>
            <?php

            ?>
        </div>

        <div class="row">
            <?php
            include 'func/func-crud.php';

            afficherTableau(getHeaderTable('php-users','utilisateurs'), readAllUsers('php-users','utilisateurs'));
            
            ?>

            <a class="btn btn-primary" href="form-user.php">Ajouter un utilisateur</a>

            <?php
            // var_dump($_SESSION);
            if (!empty($_SESSION)) {
                echo $_SESSION['message'];
                session_unset();
            }

            ?>
        </div>

    </main>
    <?php
    include __DIR__ . "/inc/footer.php";
    ?>
</body>

</html>