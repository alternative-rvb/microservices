<?php

// ANCHOR Connexion à la Base de donnée

function getDatabaseConnexion()
{
    $dataBase= '1bdd';
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

function readAllUsers($table)
{
    try {
        $connexion = getDatabaseConnexion();
        $sql = "SELECT * FROM $table ORDER BY microservice_id DESC";
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
                <?= insertImage($row['Image'])?>
            </div>
            <div class="p-2">
                <h3><?= $row['Titre'] ?></h3>
                <p><small><?= $row['user_id'] ?></small></p>
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
