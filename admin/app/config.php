<?php
// var_dump($_SERVER);

// $project = '/microservices/';
$project = '/';

define('SITE_ROOT', $_SERVER['DOCUMENT_ROOT'] . $project);
// var_dump(SITE_ROOT);

define('WEB_ROOT', $project);

define('IMAGES_ROOT', $project . 'uploads/images/');
// var_dump(IMAGES_ROOT);
