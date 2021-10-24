<?php
session_start();
require '../inc/config.php';
include SITE_ROOT . 'admin/func/functions.php';
include SITE_ROOT . 'admin/func/crud-microservices.php';

echo '$_REQUEST';
var_dump($_REQUEST);
echo '$_FILES';
var_dump($_FILES);


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$action = $_POST['action'];
	$id = $_POST['id'];
	if ($action != 'DELETE') {
		$titre = test_input($_POST['titre']);
		$contenu = test_input($_POST['contenu']);
		$prix = (float)test_input($_POST['prix']);
		$image = test_input(moveImage($_FILES['image']));
		$userID = (int) test_input($_POST['userID']);
		$categoryID = (int) test_input($_POST['categoryID']);
	}

	// var_dump( $id,$titre, $contenu, $prix, $image, $userID, $categoryID);
	// session_unset();
	switch ($action):
		case 'CREATE':
			createUser('microservices', $titre, $contenu, $prix, $image, $userID, $categoryID);
			echo $_SESSION['message'] = '<p class="text-success my-2">Utilisateur créé</p>';
			header('Location:'.WEB_ROOT.'admin/');
			break;
		case 'UPDATE':
			updateUser('microservices', $id, $titre, $contenu, $prix, $image, $userID, $categoryID);
			echo $_SESSION['message'] = '<p class="text-success my-2">Utilisateur mis à jour</p>';
			header('Location:'.WEB_ROOT.'admin/');
			break;
		case 'DELETE':
			deleteUser('microservices', $id);
			echo $_SESSION['message'] = '<p class="text-success my-2">Utilisateur supprimé</p>';
			header('Location:'.WEB_ROOT.'admin/');
			break;

		default:
			echo '<p>⚠ un problême est survenu</p>';
			break;
	endswitch;
}
?>

<a href="<?= WEB_ROOT.'admin/' ?>">Admin</a>