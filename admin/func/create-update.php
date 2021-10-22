<?php
session_start();
require __DIR__ . '/../inc/config.php';
include __DIR__ . './func-custom.php';
include __DIR__ . './func-crud.php';

var_dump($_REQUEST);

// define variables and set to empty values
// $titre = $auteur = $contenu = $prix = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$action = $_POST["action"];
	$id = $_POST["id"];
	if ($action != "DELETE") {
		$titre = test_input($_POST["titre"]);
		$auteur = test_input($_POST["auteur"]);
		$contenu = test_input($_POST["contenu"]);
		$prix = (float)test_input($_POST["prix"]);
	}

	session_unset();
	switch ($action):
		case 'CREATE':
			createUser('microservices', $titre, $auteur, $contenu, $prix);
			echo $_SESSION['message'] = '<p class="text-success my-2">Utilisateur créé</p>';
			header('Location: ../index.php');
			break;
		case 'UPDATE':
			updateUser('microservices', $id, $titre, $auteur, $contenu, $prix);
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