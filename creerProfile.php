<?php
    session_start();

    include "functions.php";

    if (isset($_POST['nom'])){$nom = $_POST['nom'];}
    if (isset($_POST['prenom'])){$prenom = $_POST['prenom'];}
    if (isset($_POST['login'])){$login = $_POST['login'];}
    if (isset($_POST['email'])){$email = $_POST['email'];}
    if (isset($_POST['mdp'])){$mdp = $_POST['mdp'];}

    if (isset($_POST['btnInscrire']))
    {
        $emailPresent = verifieSiEmailPresentDansLaBDD($email);
        $loginPresent = verifieSiLoginPresentDansLaBDD($login);

        if (!$emailPresent && !$loginPresent)
        {
            $_SESSION['NomP'] = $nom;
            $_SESSION['PrenomP'] = $prenom;
            $_SESSION['LoginP'] = $login;
            $_SESSION['EmailP'] = $email;
            $_SESSION['MdpP'] = $mdp;

            insertPersonne($nom, $prenom, $login, $email, $mdp);

            header('accueil.php');
            die();
        }

        if ($emailPresent)
            echo "votre email est déjà présent dans la bdd <br/>";

        if ($loginPresent)
            echo "ce login et déjà prise. <br/>";
    }

?>

<html>
<head>
    <title>Créer Profile</title>
</head>
<body>
<form action="creerProfile.php" method="post">
    <input type="text" name="nom" placeholder="nom..."><br>
    <input type="text" name="prenom" placeholder="prenom..."><br>
    <input type="text" name="login" placeholder="login..."><br>
    <input type="email" name="email" placeholder="email..."><br>
    <input type="password" name="mdp" placeholder="mot de passe..."><br>
    <button name="btnInscrire" type="submit">S'inscrire</button>
</form>
</body>
</html>

