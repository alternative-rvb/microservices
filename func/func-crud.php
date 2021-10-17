<?php

// ANCHOR Connexion à la Base de donnée

function getDatabaseConnexion($dataBase)
{
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

function readAllUsers($dataBase, $table)
{
    try {
        $connexion = getDatabaseConnexion($dataBase);
        $sql = "SELECT * FROM $table";
        // -> appel d'une méthode - voir objet - on accède à une fonction
        $stmt = $connexion->query($sql);
        $row = $stmt->fetchAll();
        return $row;
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
}

// ANCHOR READ Afficher un utilisateur

function readUser($dataBase, $table, $id)
{
    try {
        $connexion = getDatabaseConnexion($dataBase);
        $sql = "SELECT * from $table where id = '$id' ";
        $stmt = $connexion->query($sql);
        $row = $stmt->fetchAll();
        // return $row[0];
        if (!empty($row)) {
            return $row[0];
        }
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
}

// ANCHOR CREATE Créer un utilisateur

function createUser($dataBase, $table, $nom, $prenom, $age, $email)
{
    // INSERT INTO `utilisateurs` (`id`, `nom`, `prenom`, `age`, `email`) VALUES (NULL, 'Muche', 'Mich', '25', 'mich.muche@gmx.com');
    try {
        $connexion = getDatabaseConnexion($dataBase);
        $sql = "INSERT INTO $table (Nom, Prénom, Âge, Email) 
                VALUES ('$nom', '$prenom', '$age' ,'$email')";
        $connexion->exec($sql);
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
}

// ANCHOR UPDATE Modifier un utilisateur

function updateUser($dataBase, $table, $id, $nom, $prenom, $age, $email)
{
    try {
        $connexion = getDatabaseConnexion($dataBase);
        $sql = "UPDATE $table set 
                    Nom = '$nom',
                    Prénom = '$prenom',
                    Âge = '$age',
                    Email = '$email' 
                    where id = '$id' ";
        $stmt = $connexion->query($sql);
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
}

// ANCHOR DELETE Supprimer un utilisateur

function deleteUser($dataBase, $table, $id)
{
    try {
        $connexion = getDatabaseConnexion($dataBase);
        $sql = "DELETE from $table where id = '$id' ";
        $stmt = $connexion->query($sql);
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
}

// ANCHOR Afficher l'en-tête de la table

function getHeaderTable($dataBase, $table)
{
    try {
        $connexion = getDatabaseConnexion($dataBase);
        $sql = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA='$dataBase' 
        AND TABLE_NAME = '$table'";
        $stmt = $connexion->query($sql);
        $row = $stmt->fetchAll();
        return $row;
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
}

// ANCHOR Afficher un tableau

function afficherTableau($headers, $rows)
{
?>
    <table class="table">
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
                                <a class="btn btn-link stretched-link text-decoration-none" href="form-user.php?id=<?= $row[$i] ?>"><i class="bi bi-pencil-square"></i> <?= $row[$i] ?></a>
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
