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

// ANCHOR READ Afficher un utilisateur

function readUserID($table, $email, $password)
{
    try {
        $connexion = getDatabaseConnexion();
        $sql = "SELECT Prénom, Nom, Email, Password, Rôle from $table where Email = '$email' AND Password = '$password'";
        $req = $connexion->query($sql);
        $row = $req->fetchAll();
        // return $row[0];
        if (!empty($row)) {
            return $row;
        }
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
}