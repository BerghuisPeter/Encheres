<?php
session_start();

include "../Model.php";

$errorMessage = "";

if (isset($_POST['btnInscrire'])) {
    if (isset($_POST['nom'])) {
        $nom = $_POST['nom'];
    }
    if (isset($_POST['prenom'])) {
        $prenom = $_POST['prenom'];
    }
    if (isset($_POST['login'])) {
        $login = $_POST['login'];
    }
    if (isset($_POST['email'])) {
        $email = $_POST['email'];
    }
    if (isset($_POST['mdp'])) {
        $mdp = $_POST['mdp'];
    }

    if ($nom == "" ||
        $prenom == "" ||
        $login == "" ||
        $email == "" ||
        $mdp == ""
    )
        $errorMessage = " tous les champs doivent être remplis";
    else {
        $emailPresent = verifieSiEmailPresentDansLaBDD($email);
        $loginPresent = verifieSiLoginPresentDansLaBDD($login);

        if (!$emailPresent && !$loginPresent) {
            insertPersonne($nom, $prenom, $login, $email, $mdp);

            $_SESSION['CodeP'] = getIDPersonne($login);
            $_SESSION['NomP'] = $nom;
            $_SESSION['PrenomP'] = $prenom;
            $_SESSION['LoginP'] = $login;
            $_SESSION['EmailP'] = $email;
            $_SESSION['MdpP'] = $mdp;
            $_SESSION['RoleP'] = "propriétaire";

            header('Location: ../views/confirmationInscription_view.php');
            die();
        }

        if ($emailPresent)
            $errorMessage = "Votre email est déjà présent dans la bdd.<br/>";

        if ($loginPresent)
            $errorMessage = $errorMessage . "Ce login et déjà pris.<br/>";
    }
}

include("../views/inscrire_view.php");