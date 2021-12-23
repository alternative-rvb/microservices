<?php
session_start();
include 'app/config.php'
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <?php
    include SITE_ROOT . "/admin/app/views/meta.php";
    ?>
    <title>Microservices</title>
</head>


<body>
    <?php
    include SITE_ROOT . "/admin/app/views/header.php";
    ?>
    <main class="container">
        <div class="row">
            <h1>Microservices</h1>
            <?php
            date_fr();
            ?>
        </div>
        <?php
        if (isset($_SESSION['Role']) && $_SESSION['Role'] == 1) :
        ?>
            <div class="row">
                <?php
                include 'app/models/crud-microservices.php';

                afficherTableau(getHeaderTable('microservices'), readAllUsers('microservices'));

                ?>

                <a class="btn btn-primary" href="microservices.php"><i class="bi bi-plus-square"></i> Ajouter</a>

                <?php
                // var_dump($_SESSION);

                echo !empty($_SESSION['message']) ? $_SESSION['message'] : '';
                // session_unset();


                ?>
            </div>
        <?php
        else :
        ?>
            <div class="alert alert-danger" role="alert">
                Veuillez vous connecter !
                <a class="link-primary" href="<?= WEB_ROOT.'/connexion.php' ?>">CONNEXION</a>
            </div>
        <?php
        endif;
        ?>
    </main>
    <?php
    include SITE_ROOT . "/admin/app/views/footer.php";
    ?>
</body>

</html>