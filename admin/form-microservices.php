<?php
require __DIR__ . '/inc/config.php';
include __DIR__ . '/func/func-crud.php';


// var_dump($id);

$id = isset($_GET["id"]) ? $_GET["id"] : NULL;
if (!empty($id)) {
	$data = readUser('microservices', $id);
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
	// var_dump($data);
	?>
	<main class="container">
		<form class="" action="func/create-update.php" method="POST">

			<input type="hidden" name="id" value="<?= $id ?>" />
			<input type="hidden" name="action" value="<?= $action ?>" />
			<div class="mb-3">
				<label class="form-label" for="titre">Titre :</label>
				<input class="form-control" type="text" id="titre" name="titre" value="<?= isset($data['titre']) ? $data['titre'] : NULL ?>">
			</div>
			<div class="mb-3">
				<label class="form-label" for="auteur">Auteur :</label>
				<input class="form-control" type="text" id="auteur" name="auteur" value="<?= isset($data['auteur']) ? $data['auteur'] : NULL ?>">
			</div>
			<div class="mb-3">
				<label class="form-label" for="contenu">Contenu :</label>
				<textarea class="form-control" id="contenu" name="contenu"><?= isset($data['contenu']) ? $data['contenu'] : NULL ?></textarea>
			</div>
			<div class="mb-3">
				<label class="form-label" for="prix">Prix :</label>
				<input class="form-control" type="text" name="prix" value="<?= isset($data['prix']) ? $data['prix'] : NULL ?>">
			</div>
			<button class="btn btn-primary" type="submit"><?= $libelle ?></button>
		</form>
		<br>
		<?php if ($action != "CREATE") : ?>
			<form class="" action="func/create-update.php" method="POST">
				<input type="hidden" name="action" value="DELETE" />
				<input type="hidden" name="id" value="<?= $data['microservice_id'] ?>" />
				<button class="btn btn-danger" type="submit"><i class="bi bi-trash"></i> Supprimer</button>
			</form>
		<?php endif ?>
	</main>
	<?php
	include __DIR__ . "/inc/footer.php";
	?>
</body>

</html>