<?php
$filtres[] = '.';
$filtres[] = '..';
$filtres[] = '.git';
$filtres[] = '.gitignore';
$filtres[] = '.bdd';
$filtres[] = 'css';
$filtres[] = 'func';
$filtres[] = 'inc';
$filtres[] = 'README.md';
$filtres[] = 'index.php';
$filtres[] = 'uploads';
$filtres[] = 'connexion.php';
$filtres[] = 'déconnexion.php';
$filtres[] = 'admin';
$filtres[] = 'app';


function creationMenu($filtres)
{

    $links = scandir('./');
?>
    <nav class="navbar navbar-expand-lg navbar-dark p-0">
        <div class="container-fluid p-0 justify-content-start">
            <a class="navbar-brand " href="<?= WEB_ROOT ?>">
                Microservices
            </a>
            <button class="navbar-toggler my-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div id="navbarSupportedContent" class="collapse navbar-collapse">
                <!-- ANCHOR -->
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <?php
                    foreach ($links as $link) :
                        // Filtres 
                        if (!in_array($link, $filtres)) :
                    ?>
                            <li class="nav-item">
                                <a class="nav-link <?= activeLink($link) ?>" href="<?= $link ?>"><?= toTitle($link) ?></a>
                            </li>
                    <?php
                        endif;
                    endforeach;

                    ?>
                </ul>
            </div>
        </div>
    </nav>
<?php
}

?>