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
    <title>Connexion</title>
</head>


<body>
    <?php
    include SITE_ROOT . 'admin/inc/header.php'
    ?>
    <main class="container p-1">
        <div class="row">
            <h1>Connexion</h1>
        </div>
        <div class="row">
            <form action="<?= WEB_ROOT . 'admin/func/control-connexion.php' ?>" method="POST">
                <div class="mb-3">
                    <label for="email" class="form-label">Email :</label>
                    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email">
                    <div id="emailHelp" class="form-text">Nous ne partagerons jamais votre email avec quelqu'un d'autre.</div>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Mot de passe :</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>

                <button type="submit" class="btn btn-primary">Connexion</button>
            </form>
        </div>
        <div class="row py-2">
            <?php
            if (!empty($_SESSION['Message'])) :
            ?>
                <p><?= $_SESSION['Message'] ?></p>
            <?php
            endif;
            ?>
        </div>
    </main>
    <?php
    include SITE_ROOT . "admin/inc/footer.php"
    ?>
</body>

</html>