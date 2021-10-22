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
$filtres[] = 'admin';
$filtres[] = 'uploads';

function creationMenu($filtres)
{

    $links = scandir('./');
?>
    <nav class="navbar navbar-expand-lg navbar-dark p-0">
        <div class="container-fluid p-0">
        <a class="navbar-brand" href="index.php">5 EUROS</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div id="navbarSupportedContent" class="collapse navbar-collapse">
                <ul class="navbar-nav w-100">
                <a class="nav-link <?= activeLink('index.php') ?>" href="index.php">Home</a>

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
                    <a class="nav-link <?= activeLink('admin') ?>" href="admin" style="margin-left:auto!important;">ADMIN</a>
                </ul>
            </div>
        </div>
    </nav>
<?php
}

?>