<?php
session_start();
require __DIR__ . "/inc/config.php"
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <?php
    include __DIR__ . "/inc/meta.php"
    ?>
    <title>PHP training</title>
</head>


<body>
    <?php
    include __DIR__ . "/inc/header.php"
    ?>
    <main class="container p-1">
        <div class="row">
            <h1>5 EUROS</h1>
        </div>
        <div class="row">
            <?php 
                include 'func/func-crud.php';
                afficherTableau(readAllUsers('microservices'));
            ?>
        </div>
    </main>
    <?php
    include __DIR__ . "/inc/footer.php"
    ?>
</body>

</html>