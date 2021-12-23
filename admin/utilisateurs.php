<?php
require 'app/config.php';
include SITE_ROOT . '/admin/app/models/crud-microservices.php';

// ANCHOR Instructions

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <?php
    include SITE_ROOT . "/admin/app/views/meta.php";
    ?>
    <title>Utilisateurs</title>
</head>

<body>
    <?php
    require SITE_ROOT . "/admin/app/views/header.php";

    ?>
    <main class="container">
        <div class="row">
            <h1>Utilisateurs</h1>
            <?php
            date_fr();
            ?>
        </div>
        <div class="row">

            <!-- ANCHOR FORM -->

            <?php
            // ANCHOR Instructions
            ?>
        </div>
    </main>
    <?php
    include SITE_ROOT . "/admin/app/views/footer.php";
    ?>
</body>

</html>