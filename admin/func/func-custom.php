<?php
$test = 'foo-_bar.php';

// ANCHOR DATE

function date_fr(){
    setlocale(LC_TIME, 'fr_FR');
    date_default_timezone_set('Europe/Paris');
    echo '<p>' . utf8_encode(strftime('%A %d %B %Y, %H:%M')) . '</p>';
}

// ANCHOR SECURITY

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// ANCHOR SOUS DOSSIER

function activeLink($url)
{
    if (toTitle($url) == toTitle($_SERVER['SCRIPT_NAME'])) {
        return 'active';
    }
}

// ANCHOR Title Case

function toTitle($string)
{
    $string = test_input($string);
    $string = pathinfo($string)['filename'];
    $string = str_replace(['-', '_'], ' ', $string);
    $string = preg_replace('/\s+/', ' ', $string);
    $string = ucwords($string);
    return $string;
}

function moveImage($image) {
    if (isset($image) and $image['error'] == 0) {

        echo "====> Fichier reçu 👍<br>";
    
        // Testons si le fichier n'est pas trop gros
        if ($image['size'] <= 5000000) {
            echo "====> Taille Fichier < 5Mo 👍<br>";
    
            // Testons si l'extension est autorisée
            $infosfichier = pathinfo($image['name']);
            $extension_upload = $infosfichier['extension'];
            $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
    
            if (in_array($extension_upload, $extensions_autorisees)) {
                echo "====> Extension Autorisée 👍<br>";
    
                // On peut valider le fichier et le stocker définitivement
    
                move_uploaded_file($image['tmp_name'], SITE_ROOT.'uploads/images/' . basename($image['name']));
                //  FIXME Attention la même image peut pas être téléversée 2 fois
                return $image['name'];
                echo "====> Téléversement terminé 👍<br>";
            } else {
                echo "⚠ Erreur: Ce format de fichier n'est pas autorisé";
            }
        } else {
            echo "⚠ Erreur: le fichier dépasse 1 Mo";
        }
    }
}

function insertimage($image) {
    if (!empty($image)) {
        echo '<img src="'.$image.'" alt="Lorem" width="150">';
    }
}