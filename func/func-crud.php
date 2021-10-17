<?php

function getDatabaseConnexion()
{
    $host = 'localhost';
    $dataBase = 'php-users';
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
function readAllUsers()
{
    try {
        $connexion = getDatabaseConnexion();
        $sql = 'SELECT * FROM utilisateurs';
        // -> appel d'une méthode - voir objet - on accède à une fonction
        $stmt = $connexion->query($sql);
        $row = $stmt->fetchAll();
        return $row;
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
}

function readUser($id)
{
    try {
        $connexion = getDatabaseConnexion();
        $sql = "SELECT * from utilisateurs where id = '$id' ";
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
function createUser($nom, $prenom, $age, $email)
{
    // INSERT INTO `utilisateurs` (`id`, `nom`, `prenom`, `age`, `email`) VALUES (NULL, 'Muche', 'Mich', '25', 'mich.muche@gmx.com');
    try {
        $connexion = getDatabaseConnexion();
        $sql = "INSERT INTO utilisateurs (Nom, Prénom, Âge, Email) 
                VALUES ('$nom', '$prenom', '$age' ,'$email')";
        $connexion->exec($sql);
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
}
function updateUser($id, $nom, $prenom, $age, $email)
{
    try {
        $connexion = getDatabaseConnexion();
        $sql = "UPDATE utilisateurs set 
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
function deleteUser($id)
{
    try {
        $connexion = getDatabaseConnexion();
        $sql = "DELETE from utilisateurs where id = '$id' ";
        $stmt = $connexion->query($sql);
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
}

function getHeaderTable()
{
    try {
        $connexion = getDatabaseConnexion();
        $sql = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'utilisateurs'";
        $stmt = $connexion->query($sql);
        $row = $stmt->fetchAll();
        return $row;
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
}

function getNewUser()
{
    $user['id'] = "";
    $user['Nom'] = "";
    $user['Prénom'] = "";
    $user['Âge'] = "";
    $user['Email'] = "";
    return $user;
}

// SECURITY

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

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
                <tr>
                    <?php
                    for ($i = 0; $i < count($headers); $i++) :
                        if ($i == 0) :
                    ?>
                            <td scope="col">
                                <a href="form-user.php?id=<?= $row[$i] ?>"><?= $row[$i] ?></a>
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
