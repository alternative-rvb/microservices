<?php
// ANCHOR Connexion à la Base de donnée
function getDatabaseConnexion()
{
    $dataBase = 'm2';
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dataBase;charset=utf8", $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }
}
// ANCHOR READ Afficher tous les utilisateurs
function readAllUsers($tableMicroservices, $tableUsers, $tableCategories)
{
    try {
        $connexion = getDatabaseConnexion();
        $sql = "SELECT $tableMicroservices.Titre, $tableMicroservices.Contenu, $tableMicroservices.Prix, $tableMicroservices.Image, $tableUsers.Prénom, $tableUsers.Nom AS uName, $tableCategories.Nom AS uCat FROM $tableMicroservices LEFT JOIN $tableUsers ON $tableMicroservices.user_id = $tableUsers.user_id LEFT JOIN $tableCategories ON $tableMicroservices.category_id = $tableCategories.category_id ORDER BY microservice_id DESC";
        // -> appel d'une méthode - voir objet - on accède à une fonction
        $req = $connexion->query($sql);
        $row = $req->fetchAll();
        return $row;
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
}
// ANCHOR Afficher un tableau
function afficherTableau($rows)
{
    foreach ($rows as $row) :
?>
        <article class="col-md-4 p-2">
            <div class="border border-dark h-100">
                <div>
                    <?= insertImage($row['Image']) ?>
                </div>
                <div class="p-2">
                    <h3><?= $row['Titre'] ?></h3>

                    <?php
                    if (!empty($row['Prénom']) && !empty($row['uName']) && !empty($row['uCat'])) :
                    ?>
                        <p class="fw-bolder">
                            <i class="bi bi-person-circle"></i> <?= $row['Prénom'] ?> <?= $row['uName'] ?> <i class="bi bi-tag-fill"></i> <?= $row['uCat'] ?>
                        </p>
                    <?php
                    else :
                    ?>
                        <p>Anonymous</p>
                    <?php
                    endif;
                    ?>
                    </p>
                    <p><?= $row['Contenu'] ?></p>
                    <p>
                        <a class="btn btn-light" href="#">À partir de <?= $row['Prix'] ?> €</a>
                    </p>
                </div>
            </div>
        </article>
<?php
    endforeach;
}
