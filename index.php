<?php
session_start();
require __DIR__ . "/func/config.php";
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
            <?php

            setlocale(LC_TIME, 'fr_FR');
            date_default_timezone_set('Europe/Paris');
            echo '<h1>CRUD</h1>';
            echo '<p>' . utf8_encode(strftime('%A %d %B %Y, %H:%M')) . '</p>';
            ?>
        </div>

        <div class="row">
            <?php
            include 'func/func-crud.php';

            afficherTableau(getHeaderTable(), readAllUsers());
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