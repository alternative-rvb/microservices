<?php
session_start();
require __DIR__ . '/../inc/config.php';
include __DIR__ . './func-custom.php';
include __DIR__ . './func-crud.php';

var_dump($_REQUEST);

// define variables and set to empty values
// $name = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$action = $_POST["action"];
	$id = $_POST["id"];
	if ($action != "DELETE") {
		$nom = test_input($_POST["nom"]);
		$prenom = test_input($_POST["prenom"]);
		$age = test_input((int)$_POST["age"]);
		$email = test_input($_POST["email"]);
	}

	session_unset();
	switch ($action):
		case 'CREATE':
			createUser('php-users', 'utilisateurs', $nom, $prenom, $age, $email);
			echo $_SESSION['message'] = '<p class="text-success my-2">Utilisateur créé</p>';
			header('Location: ../index.php');
			break;
		case 'UPDATE':
			updateUser('php-users', 'utilisateurs', $id, $nom, $prenom, $age, $email);
			echo $_SESSION['message'] = '<p class="text-success my-2">Utilisateur mis à jour</p>';
			header('Location: ../index.php');
			break;
		case 'DELETE':
			deleteUser('php-users', 'utilisateurs', $id);
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