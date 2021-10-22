<?php

// ANCHOR Connexion à la Base de donnée

function getDatabaseConnexion()
{
    $dataBase = '1bdd';
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
        $sql = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA='1bdd' AND TABLE_NAME = '$table'";
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
    <table class="table table-striped table-hover">
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
            ?>
                <tr class="position-relative">
                    <?php
                    for ($i = 0; $i < count($headers); $i++) :
                        if ($i == 0) :
                    ?>
                            <td scope="col">
                                <a class="btn btn-link stretched-link text-decoration-none" href="microservices.php?id=<?= $row[$i] ?>"><i class="bi bi-pencil-square"></i> <?= $row[$i] ?></a>
                            </td>
                        <?php

                        else :
                        ?>
                            <td scope="col">
                                <?= $row[$i] ?>
                            </td>
                    <?php
                        endif;
                    endfor;
                    ?>
                </tr>
            <?php
            endforeach;
            ?>
        </tbody>

    </table>
<?php
}