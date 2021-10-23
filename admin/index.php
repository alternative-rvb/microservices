<?php
session_start();
include 'inc/config.php'
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
    <main class="container">
        <div class="row">
            <h1>Microservices</h1>
            <?php
            date_fr();
            ?>
        </div>

        <div class="row">
            <?php
            include 'func/crud-microservices.php';

            afficherTableau(getHeaderTable('microservices'), readAllUsers('microservices'));

            ?>

            <a class="btn btn-primary" href="microservices.php"><i class="bi bi-plus-square"></i> Ajouter</a>

            <?php
            // var_dump($_SESSION);
            
                echo !empty($_SESSION['message']) ? $_SESSION['message'] : '';
                // session_unset();
            

            ?>
        </div>

    </main>
    <?php
    include SITE_ROOT . "/admin/inc/footer.php";
    ?>
</body>

</html>