<?php
require __DIR__ . "./inc/config.php";
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <?php
    include __DIR__ . "./inc/meta.php";
    ?>
    <title>PHP Info</title>
</head>

<body>
    <?php
    include __DIR__ . "./inc/header.php";
    ?>
    <main class="container">
        <div class="row">
            <h1>PHP INFO</h1>
        </div>
        <div class="row">
            <?php
            ob_start();
            phpinfo();
            $pinfo = ob_get_contents();
            ob_end_clean();

            $pinfo = preg_replace('%^.*<body>(.*)</body>.*$%ms', '$1', $pinfo);
            echo $pinfo;
            ?>
        </div>
    </main>
    <?php
    include __DIR__ . "/inc/footer.php";
    ?>
</body>

</html>