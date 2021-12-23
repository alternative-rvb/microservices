<?php
session_start();
require 'admin/app/config.php'
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <?php
    include SITE_ROOT . 'admin/app/views/meta.php'
    ?>
    <title>Microservices</title>
</head>


<body>
    <?php
    include SITE_ROOT . 'admin/app/views/header.php'
    ?>
    <main class="container">
        <div class="row">
            <h1>Tous les microservices</h1>
        </div>
        <div class="row">
            <?php
            include 'admin/app/views/home.php';
            afficherTableau(readAllUsers('microservices', 'utilisateurs'));
            ?>
        </div>
    </main>
    <?php
    include SITE_ROOT . "admin/app/views/footer.php"
    ?>
</body>

</html>