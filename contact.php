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
    <title>Contact</title>
</head>


<body>
    <?php
    include SITE_ROOT . 'admin/app/views/header.php'
    ?>
    <main class="container p-1">
        <div class="row">
            <h1>Contact</h1>
        </div>

    </main>
    <?php
    include SITE_ROOT . "admin/app/views/footer.php"
    ?>
</body>

</html>