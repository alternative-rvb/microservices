<?php

// ANCHOR Connexion à la Base de donnée

function getDatabaseConnexion()
{
    $dataBase = 'microservices';
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

// ANCHOR READ Afficher un utilisateur

function readUser($table, $id)
{
    try {
        $connexion = getDatabaseConnexion();
        $sql = "SELECT * from $table where microservice_id = '$id' ";
        $req = $connexion->query($sql);
        $row = $req->fetchAll();
        // return $row[0];
        if (!empty($row)) {
            return $row[0];
        }
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
}

// ANCHOR CREATE Créer un utilisateur

function createUser($table, $titre, $contenu, $prix, $image, $userID)
{

    try {
        $connexion = getDatabaseConnexion();
        // FIXME Attention 5 valeurs
        $sql = "INSERT INTO $table (Titre, Contenu, Prix, Image, user_id) VALUES (?, ?, ?, ?, ?)";
        $req = $connexion->prepare($sql);
        $req->execute(array($titre, $contenu, $prix, $image, $userID));
    } catch (PDOException $e) {
        echo $req . "<br>" . $e->getMessage();
    }
}

// ANCHOR UPDATE Modifier un utilisateur

function updateUser($table, $id, $titre, $contenu, $prix, $image, $userID)
{
    try {
        $connexion = getDatabaseConnexion();
        // FIXME Attention aux noms des colonnes
        if (!empty($image)) {
            $sql="UPDATE $table SET Titre = ?, Contenu = ?, Prix = ?, Image = ?, user_id = ? WHERE microservice_id = ? ";
            $req = $connexion->prepare($sql);
            $req->execute(array($titre, $contenu, $prix, $image, $userID, $id));
        }else {
            $sql="UPDATE $table SET Titre = ?, Contenu = ?, Prix = ?,  user_id = ? WHERE microservice_id = ? ";
            $req = $connexion->prepare($sql);
            $req->execute(array($titre, $contenu, $prix, $userID, $id));
        }
    } catch (PDOException $e) {
        echo $req . "<br>" . $e->getMessage();
    }
}

// ANCHOR DELETE Supprimer un utilisateur

function deleteUser($table, $id)
{
    try {
        $connexion = getDatabaseConnexion();
        $sql = "DELETE FROM $table WHERE microservice_id = '$id' ";
        $req = $connexion->query($sql);
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
}

// ANCHOR Afficher l'en-tête de la table

function getHeaderTable($table)
{
    try {
        $connexion = getDatabaseConnexion();
        $sql = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA='microservices' AND TABLE_NAME = '$table'";
        $req = $connexion->query($sql);
        $row = $req->fetchAll();
        return $row;
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
}

// ANCHOR Afficher un tableau

function afficherTableau($headers, $rows)
{
?>
    <table class="table table-hover">
        <thead>
            <tr>
                <?php
                foreach ($headers as $header) :
                ?>
                    <th scope="col"><?= $header['COLUMN_NAME'] ?></th>
                <?php
                endforeach;
                ?>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($rows as $row) :
                // var_dump(array_key_first($row) ? 'yes' : $row);
            ?>
                <tr class="position-relative">

                            <td scope="col">
                            <a class="btn btn-link stretched-link text-decoration-none" href="microservices.php?id=<?= $row['microservice_id'] ?>"><i class="bi bi-pencil-square"></i> <?= $row['microservice_id'] ?></a> 
                            </td>
                            <td scope="col">
                                <?= $row['Titre'] ?>
                            </td>
                            <td scope="col">
                                <?= $row['Contenu'] ?>
                            </td>
                            <td scope="col">
                                <?= $row['Prix'] ?>
                            </td>
                            <td scope="col">
                                <?= insertImage($row['Image']) ?>
                            </td>
                            <td scope="col">
                                <?= $row['user_id'] ?>
                            </td>
                </tr>
                <?php
            endforeach;
            ?>
            <!-- <a class="btn btn-link stretched-link text-decoration-none" href="microservices.php?id=<?= $row[$i] ?>"><i class="bi bi-pencil-square"></i> <?= $row[$i] ?></a> -->
        </tbody>

    </table>
<?php
}
