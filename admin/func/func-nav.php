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


function creationMenu($filtres)
{

    $links = scandir('./');
?>
    <nav class="navbar navbar-expand-lg navbar-dark p-0">
        <div class="container-fluid p-0">
        <a class="navbar-brand" href="../index.php">5 EUROS - ADMIN</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div id="navbarSupportedContent" class="collapse navbar-collapse">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <a class="nav-link <?= activeLink('index.php') ?>" href="../index.php">Home</a>

                    <?php
                    foreach ($links as $link) :
                        // Filtres 
                        if (!in_array($link, $filtres)) :
                    ?>
                            <a class="nav-link <?= activeLink($link) ?>" href="<?= $link ?>"><?= toTitle($link) ?></a>
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