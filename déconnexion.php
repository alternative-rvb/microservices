<?php 
session_start();
session_unset();
require 'admin/inc/config.php';
// session_destroy();

// Message pour le développeur
$_SESSION['status'] = '❌ Déconnecté';

header('Location:'.WEB_ROOT);
?>