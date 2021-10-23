<?php
session_start();
require 'admin/inc/config.php'
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <?php
    include SITE_ROOT . 'admin/inc/meta.php'
    ?>
    <title>Microservices</title>
</head>


<body>
    <?php
    include SITE_ROOT . 'admin/inc/header.php'
    ?>
    <main class="container">
        <div class="row">
            <h1>Microservices</h1>
        </div>
        <div class="row">
            <?php 
                include 'admin/func/home.php';
                afficherTableau(readAllUsers('microservices','utilisateurs'));
            ?>
        </div>
    </main>
    <?php
    include SITE_ROOT . "admin/inc/footer.php"
    ?>
</body>

</html>