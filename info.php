<?php
require __DIR__ . "./func/config.php";
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
    <main class="p--1">
        <?php
        echo '<h1>PHP INFO</h1>';

        ob_start();
        phpinfo();
        $pinfo = ob_get_contents();
        ob_end_clean();

        $pinfo = preg_replace('%^.*<body>(.*)</body>.*$%ms', '$1', $pinfo);
        echo $pinfo;
        ?>
    </main>
    <?php
    include __DIR__ . "/inc/footer.php";
    ?>
</body>

</html>