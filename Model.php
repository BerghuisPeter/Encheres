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

function getPersonne($login)
{
    $conn = connexionDB();

    $stmt = $conn->prepare('SELECT * FROM personne WHERE LoginP = "'.$login.'"');

    $stmt->execute();

    $resultat = $stmt->fetch();

    $stmt = null;
    $conn = null;

    return $resultat;
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

function getIDPersonne($login)
{
    $conn = connexionDB();

    $stmt = $conn->prepare('SELECT CodeP FROM personne WHERE LoginP = "' . $login . '"');

    $stmt->execute();

    $resultat = $stmt->fetch();

    $stmt = null;
    $conn = null;

    return $resultat;
}

function getMesVentes($idPersonne)
{
    $conn = connexionDB();

    $stmt = $conn->prepare('SELECT * FROM vente WHERE CodeResp = ' . $idPersonne);

    $stmt->execute();

    $resultat = $stmt->fetchAll();

    $stmt = null;
    $conn = null;

    return $resultat;
}

function insertVente($nomV, $dateV, $tempsDV, $tempsFV, $idResp)
{
    $conn = connexionDB();

    $stmt = $conn->prepare("INSERT INTO `vente`(`DateV`, `NomV`, `HeureDV`, `HeureFV`, `CodeResp`) VALUES (:dateV, :nomV, :heureD, :heureF, :idResp )");
    $stmt->bindParam(':nomV', $nomV);
    $stmt->bindParam(':dateV', $dateV);
    $stmt->bindParam(':heureD', $tempsDV);
    $stmt->bindParam(':heureF', $tempsFV);
    $stmt->bindParam(':idResp', $idResp);

    $stmt->execute();

    $stmt = null;
    $conn = null;
}

function getVente($CodeV)
{
    $conn = connexionDB();

    $stmt = $conn->prepare('SELECT * FROM vente WHERE CodeV = ' . $CodeV);

    $stmt->execute();

    $resultat = $stmt->fetch();

    $stmt = null;
    $conn = null;

    return $resultat;
}

function modifieVente($codeV, $nomV, $dateV, $tempsDV, $tempsFV)
{
    $conn = connexionDB();

    $stmt = $conn->prepare("UPDATE vente SET  DateV = :dateV, NomV = :nomV, HeureDV = :heureD, HeureFV = :heureF WHERE CodeV = :codeV");
    $stmt->bindParam(':nomV', $nomV);
    $stmt->bindParam(':dateV', $dateV);
    $stmt->bindParam(':heureD', $tempsDV);
    $stmt->bindParam(':heureF', $tempsFV);
    $stmt->bindParam(':codeV', $codeV);

    $stmt->execute();

    $stmt = null;
    $conn = null;
}

function getProduitsDeLaVente($codeV)
{
    $conn = connexionDB();

    $stmt = $conn->prepare("SELECT * FROM vendre, produit WHERE vendre.CodePr = produit.CodePr AND vendre.CodeV = " . $codeV);

    $stmt->execute();

    $resultat = $stmt->fetchAll();

    $stmt = null;
    $conn = null;

    return $resultat;
}

function supprimerProduitDeLaVente($idProduit, $idVente)
{
    $conn = connexionDB();

    $stmt = $conn->prepare("DELETE FROM vendre WHERE CodeV = :idVente AND CodePr = :idProduit");
    $stmt->bindParam(':idProduit', $idProduit);
    $stmt->bindParam(':idVente', $idVente);

    $stmt->execute();

    $stmt = null;
    $conn = null;
}

function getProduitNonVendu($codeV)
{
    $conn = connexionDB();

    $stmt = $conn->prepare("SELECT * FROM produit WHERE produit.CodePr NOT IN (SELECT vendre.CodePr FROM vendre WHERE vendre.CodeV = ".$codeV.");");

    $stmt->execute();

    $resultat = $stmt->fetchAll();

    $stmt = null;
    $conn = null;

    return $resultat;
}

function addProduitAuVente($idProduit, $idVente)
{
    $conn = connexionDB();

    $stmt = $conn->prepare("INSERT INTO vendre (CodeV, CodePr) VALUES (:idVente, :idProduit)");
    $stmt->bindParam(':idProduit', $idProduit);
    $stmt->bindParam(':idVente', $idVente);

    $stmt->execute();

    $stmt = null;
    $conn = null;
}

function updateProfil($codeP, $nom, $prenom, $newPwd)
{
    $conn = connexionDB();

    if ($newPwd == "")
        $stmt = $conn->prepare("UPDATE personne SET NomP=:nom, PrenomP=:prenom WHERE CodeP = :codeP");

    else {
        $mdp = hashPwd($newPwd);
        $stmt = $conn->prepare("UPDATE personne SET NomP=:nom, PrenomP=:prenom, MdpP=:mdp WHERE CodeP = :codeP");
        $stmt->bindParam(':mdp', $mdp);
        $_SESSION['MdpP'] = $mdp;
    }

    $stmt->bindParam(':codeP', $codeP);
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':prenom', $prenom);

    $stmt->execute();

    $_SESSION['NomP'] = $nom;
    $_SESSION['PrenomP'] = $prenom;

    $stmt = null;
    $conn = null;
}

function getProduitsEnVente()
{
    $conn = connexionDB();

    // ToDo get last bid value too.
    $stmt = $conn->prepare("SELECT * FROM produit, vendre, vente WHERE produit.CodePr = vendre.CodePr AND vendre.CodeV = vente.CodeV AND DateV = CURDATE() AND HeureFV > CURRENT_TIME;");

    $stmt->execute();

    $resultat = $stmt->fetchAll();

    $stmt = null;
    $conn = null;

    return $resultat;
}