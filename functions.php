<?php

function connexionDB()
{
    $servername = "mysql";
    $host = "127.0.0.1";
    $username = "root";
    $password = "";
    $bd = "encheres";

    try {
        $conn = new PDO($servername . ':host=' . $host . ';dbname=' . $bd, $username, $password);
    } catch (PDOException $e)
    {
        echo "pdo error" . $e->getMessage();
    }

    return $conn;
}

function hashPwd($pwd)
{



    return password_hash($pwd, PASSWORD_BCRYPT);
}

function generateSalt()
{
    $salt = uniqid(mt_rand(), true);
    return $salt;
}

function verifieSiEmailPresentDansLaBDD($email)
{
    $conn = connexionDB();

    $stmt = $conn->prepare('SELECT EmailP FROM personne WHERE EmailP = "'.$email.'"');

    $stmt->execute();

    if ($stmt->rowCount() > 0)
        return true;

    $stmt = null;
    $conn = null;

    return false;
}

function verifieSiLoginPresentDansLaBDD($login)
{
    $conn = connexionDB();

    $stmt = $conn->prepare('SELECT LoginP FROM personne WHERE LoginP = "'.$login.'"');

    $stmt->execute();

    if ($stmt->rowCount() > 0)
        return true;

    $stmt = null;
    $conn = null;

    return false;
}

function insertPersonne($nom, $prenom, $login, $email, $mdp)
{
    $conn = connexionDB();

    $hashedMdp = hashPwd($mdp);

    $stmt = $conn->prepare("INSERT INTO `personne`(`NomP`, `PrenomP`, `EmailP`, `LoginP`, `MdpP`) VALUES (:nom, :prenom, :mail, :login, :mdp)");
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':prenom', $prenom);
    $stmt->bindParam(':mail', $email);
    $stmt->bindParam(':login', $login);
    $stmt->bindParam(':mdp', $hashedMdp);

    $stmt->execute();

    $stmt = null;
    $conn = null;
}

function verifieMotDePasse($login, $mdp)
{
    $conn = connexionDB();

    $stmt = $conn->prepare("SELECT MdpP FROM personne WHERE LoginP = '".$login."'");
    $stmt->execute();
    $resultat = $stmt->fetch();

    if ($stmt->rowCount() == 0) // pas de login trouvé
        return false;

    $mdpBD = $resultat[0];

    if (password_verify($mdp, $mdpBD))
        return true;
}