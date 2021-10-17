<?php
require __DIR__ . '/func/config.php';
include __DIR__ . '/func/func-crud.php';


// var_dump($id);

$id = isset($_GET["id"]) ? $_GET["id"] : NULL;
if (!empty($id)) {
	$user = readUser($id);
	$action = "UPDATE";
	$libelle = "Mettre a jour";
} else {
	$action = "CREATE";
	$libelle = "Créer";
}

?>
<!DOCTYPE html>
<html lang="fr">

<head>
	<?php
	include __DIR__ . "/inc/meta.php";
	?>
	<title>CREATE UPDATE</title>
</head>

<body>
	<?php
	require __DIR__ . "/inc/header.php";
	// var_dump($user);
	?>
	<main class="container">
		<form class="" action="create-update.php" method="POST">

			<input type="hidden" name="id" value="<?= $id ?>" />
			<input type="hidden" name="action" value="<?= $action ?>" />
			<div class="mb-3">
				<label class="form-label" for="name">Nom :</label>
				<input class="form-control" type="text" id="nom" name="nom" value="<?= isset($user['Nom'])? $user['Nom'] : NULL ?>">
			</div>
			<div class="mb-3">
				<label class="form-label" for="prenom">Prénom :</label>
				<input class="form-control" type="text" id="prenom" name="prenom" value="<?= isset($user['Prénom'])? $user['Prénom'] : NULL ?>">
			</div>
			<div class="mb-3">
				<label class="form-label" for="age">Âge :</label>
				<input class="form-control" type="text" id="age" name="age" value="<?= isset($user['Âge'])? $user['Âge'] : NULL ?>">
			</div>
			<div class="mb-3">
				<label class="form-label" for="email">email :</label>
				<input class="form-control" name="email" placeholder="<?= isset($user['Email'])? $user['Email'] : NULL ?>">
			</div>
			<button class="btn btn-primary" type="submit"><?= $libelle ?></button>
		</form>
		<br>
		<?php if ($action != "CREATE") : ?>
			<form class="" action="create-update.php" method="POST">
				<input type="hidden" name="action" value="DELETE" />
				<input type="hidden" name="id" value="<?= $user['id'] ?>" />
				<button class="btn btn-primary" type="submit">Supprimer</button>
			</form>
		<?php endif ?>
	</main>
	<?php
	include __DIR__ . "/inc/footer.php";
	?>
</body>

</html>