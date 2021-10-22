<?php
require 'inc/config.php';
include SITE_ROOT . '/admin/func/crud-microservices.php';


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
	include SITE_ROOT . "/admin/inc/meta.php";
	?>
	<title>CREATE UPDATE</title>
</head>

<body>
	<?php
	require SITE_ROOT . "/admin/inc/header.php";
	// var_dump($data);
	?>
	<main class="container">
		<form class="" action="func/control-microservices.php" method="POST" enctype="multipart/form-data">

			<input type="hidden" name="id" value="<?= $id ?>" />
			<input type="hidden" name="action" value="<?= $action ?>" />
			<div class="mb-3">
				<label class="form-label" for="titre">Titre :</label>
				<input class="form-control" type="text" id="titre" name="titre" value="<?= isset($data['Titre']) ? $data['Titre'] : NULL ?>">
			</div>
			<div class="mb-3">
				<label class="form-label" for="contenu">Contenu :</label>
				<textarea class="form-control" id="contenu" name="contenu" style="min-height:20vh;"><?= isset($data['Contenu']) ? $data['Contenu'] : NULL ?></textarea>
			</div>
			<div class="mb-3">
				<label class="form-label" for="prix">Prix :</label>
				<input class="form-control" type="text" name="prix" value="<?= isset($data['Prix']) ? $data['Prix'] : NULL ?>">
			</div>
			<div class="mb-3">
				<label class="form-label" for="userID">Utilisateur :</label>
				<input class="form-control" type="text" name="userID" value="<?= isset($data['user_id']) ? $data['user_id'] : NULL ?>">
			</div>
			<div class="mb-3">
				<label class="form-label" for="image">Ajouter une image :</label>
				<input id="image" class="form-control" type="file" name="image" ><br />
			</div>
			<button class="btn btn-primary" type="submit"><?= $libelle ?></button>
		</form>
		<br>
		<?php if ($action != "CREATE") : ?>
			<form class="" action="func/control-microservices.php" method="POST">
				<input type="hidden" name="action" value="DELETE" />
				<input type="hidden" name="id" value="<?= $data['microservice_id'] ?>" />
				<button class="btn btn-danger" type="submit"><i class="bi bi-trash"></i> Supprimer</button>
			</form>
		<?php endif ?>
	</main>
	<?php
	include SITE_ROOT . "/admin/inc/footer.php";
	?>
</body>

</html>