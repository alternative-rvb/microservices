<?php
session_start();
require "inc/config.php";
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <?php
    include SITE_ROOT . "/admin/inc/meta.php";
    ?>
    <title>Microservices</title>
</head>


<body>
    <?php
    include SITE_ROOT . "/admin/inc/header.php";
    ?>
    <main class="container p-1">
        <div class="row">
            <h1>Microservices</h1>
            <?php
            date_fr();
            ?>
        </div>

        <div class="row">
            <?php
            include 'func/func-crud-microservices.php';

            afficherTableau(getHeaderTable('microservices'), readAllUsers('microservices'));

            ?>

            <a class="btn btn-primary" href="form-microservices.php"><i class="bi bi-plus-square"></i> Ajouter</a>

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
    include SITE_ROOT . "/admin/inc/footer.php";
    ?>
</body>

</html>