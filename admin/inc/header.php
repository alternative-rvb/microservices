<?php
include SITE_ROOT . 'admin/func/functions.php';
include SITE_ROOT . 'admin/func/nav.php';

?>
<header class="bg-dark mb-5 p-2">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-sm-8 col-md-8 my-2">
                <?php
                creationMenu($filtres);
                ?>
            </div>
            <div class="col-sm-4 col-md-4 align-items-center my-2">
                <?php
                if (isset($_SESSION['Role']) && $_SESSION['Role'] == 1) :
                ?>

                    <!-- ANCHOR Connecté -->
                    <div class="dropdown text-sm-end">
                        <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                            <?= isset($_SESSION['Pseudo']) ? '<i class="bi bi-person-circle"></i> ' . $_SESSION['Pseudo'] : 'Anonymous' ?>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton2">
                            <li><a class="dropdown-item" href="<?= WEB_ROOT . 'admin/' ?>">Admin</a></li>
                            <li><a class="dropdown-item disabled" href="#">Setting</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="<?= WEB_ROOT . 'déconnexion.php' ?>">Déconnexion</a></li>
                        </ul>
                    </div>
                <?php
                else :
                ?>
                    <!-- ANCHOR Déconnecté-->
                    <div class="text-end">
                        <a class="link-light disabled" href="#">Inscription</a>
                        <a class="link-light " href="<?= WEB_ROOT . 'connexion.php' ?>">Connexion</a>
                    </div>
                <?php
                endif;
                ?>
            </div>
        </div>
    </div>
</header>