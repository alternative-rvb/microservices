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
            <?php

            setlocale(LC_TIME, 'fr_FR');
            date_default_timezone_set('Europe/Paris');
            echo '<h1>TEST</h1>';
            echo '<p>' . utf8_encode(strftime('%A %d %B %Y, %H:%M')) . '</p>';
            ?>
        </div>

        <div class="row">
            <?php
            include 'func/func-crud.php';
            afficherTableau(getHeaderTable('mysql-training','utilisateurs'), readAllUsers('php-users','utilisateurs'));
            ?>
        </div>


    </main>
    <?php
    include __DIR__ . "/inc/footer.php";
    ?>
</body>

</html>