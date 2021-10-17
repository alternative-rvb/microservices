<?php
$links = [
    "Accueil" => "index.php",
    "Info" => "info.php",
];
// var_dump(count($links) - 1);
?>
<header class="bg-dark mb-5 p-2">
    <div class="container">
        <div class="row">
            <nav class="navbar navbar-expand-lg navbar-dark p-0">
                <div class="container-fluid p-0">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div id="navbarSupportedContent" class="collapse navbar-collapse">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <?php
                            $i = 0;
                            foreach ($links as $key => $link) :
                            ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="./<?= $link ?>"><?= $key  ?><a>
                                </li>
                            <?php
                            endforeach;
                            ?>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</header>