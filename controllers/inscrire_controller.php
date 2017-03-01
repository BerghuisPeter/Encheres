<?php
    session_start();

    include "../functions.php";

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

    include ("../views/inscrire_view.php");
?>