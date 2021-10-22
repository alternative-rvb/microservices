<?php
session_start();
require __DIR__ . '/../inc/config.php';
include __DIR__ . './func-custom.php';
include __DIR__ . './func-crud.php';

var_dump($_REQUEST);


if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$action = $_POST["action"];
	$id = $_POST["id"];
	if ($action != "DELETE") {
		$titre = test_input($_POST["titre"]);
		$contenu = test_input($_POST["contenu"]);
		$prix = (float)test_input($_POST["prix"]);
		$userID = (int) test_input($_POST["userID"]);
	}

	session_unset();
	switch ($action):
		case 'CREATE':
			createUser('microservices', $titre, $contenu, $prix, $userID);
			echo $_SESSION['message'] = '<p class="text-success my-2">Utilisateur créé</p>';
			header('Location: ../index.php');
			break;
		case 'UPDATE':
			updateUser('microservices', $id, $titre, $contenu, $prix, $userID);
			echo $_SESSION['message'] = '<p class="text-success my-2">Utilisateur mis à jour</p>';
			header('Location: ../index.php');
			break;
		case 'DELETE':
			deleteUser('microservices', $id);
			echo $_SESSION['message'] = '<p class="text-success my-2">Utilisateur supprimé</p>';
			header('Location: ../index.php');
			break;

		default:
			echo '<p>⚠ un problême est survenu</p>';
			break;
	endswitch;
}
?>

<a href='index.php'>Liste des utilisateurs</a>