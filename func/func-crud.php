<?php

// ANCHOR Connexion à la Base de donnée

function getDatabaseConnexion()
{
    $dataBase= 'php-users';
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
        $sql = "SELECT * FROM $table";
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
    <div class="col-md-4 p-2">
        <div class="border border-dark p-2 h-100">
            <h3><?= $row['titre'] ?></h3>
            <p><small><?= $row['user_id'] ?></small></p>
            <p><?= $row['contenu'] ?></p>
            <p>
                <a class="btn btn-light" href="#">À partir de <?= $row['prix'] ?> €</a>
            </p>
        </div>
    </div>
<?php
endforeach;
}
