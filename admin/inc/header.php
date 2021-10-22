<?php
include SITE_ROOT.'admin/func/functions.php';
include SITE_ROOT.'admin/func/nav.php';

?>
<header class="bg-dark mb-5 p-2">
    <div class="container">
        <div class="row">
            <?php
            creationMenu($filtres);
            ?>
        </div>
    </div>
</header>