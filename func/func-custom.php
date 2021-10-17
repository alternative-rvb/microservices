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

function activeLink($suffixe, $url)
{
    $realURL = $suffixe . $url;
    // var_dump('$realURL => '.$realURL);
    // var_dump('$_SERVER => '.$_SERVER['SCRIPT_NAME']);
    if ($realURL == $_SERVER['SCRIPT_NAME']) {
        return true;
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

// var_dump(toTitle($test));
