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
            <h1>TEST</h1>
            <?php

            // include '/func/func-custom.php';
            date_fr();
            ?>
        </div>

        <div class="row">
            <?php
            include 'func/func-crud.php';
            afficherTableau(getHeaderTable('mysql-training', 'utilisateurs'), readAllUsers('mysql-training', 'utilisateurs'));

            var_dump(toTitle($_SERVER['SCRIPT_NAME']));
            // activeLink($suffixe, $url);

            ?>
        </div>


    </main>
    <?php
    include __DIR__ . "/inc/footer.php";
    ?>
</body>

</html>