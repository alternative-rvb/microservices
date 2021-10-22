<?php
session_start();
require 'admin/inc/config.php'
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <?php
    include SITE_ROOT . "/inc/meta.php"
    ?>
    <title>Microservices</title>
</head>


<body>
    <?php
    include SITE_ROOT . "/inc/header.php"
    ?>
    <main class="container p-1">
        <div class="row">
            <h1>Microservices</h1>
        </div>
        <div class="row">
            <?php 
                include 'admin/func/func-home.php';
                afficherTableau(readAllUsers('microservices'));
            ?>
        </div>
    </main>
    <?php
    include SITE_ROOT . "/inc/footer.php"
    ?>
</body>

</html>