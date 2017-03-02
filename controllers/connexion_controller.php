<?php
    session_start();

    include "../Model.php";

    $errorMessage = "";

    if (isset($_POST['login'])){$login = $_POST['login'];}
    if (isset($_POST['mdp'])){$mdp = $_POST['mdp'];}

    if (isset($_POST['btnConnecter']))
    {
        //ToDo vérifie que les champs sont pas vide

        if (verifieMotDePasse($login, $mdp))
        {
            $personne = getPersonne($login);

            $_SESSION['NomP'] = $personne['NomP'];
            $_SESSION['PrenomP'] = $personne['PrenomP'];
            $_SESSION['LoginP'] = $personne['LoginP'];
            $_SESSION['EmailP'] = $personne['EmailP'];
            $_SESSION['MdpP'] = $personne['MdpP'];
            $_SESSION[RoleP] = $personne['RoleP'];

            header("Location: accueil_controller.php");
            die();
        }
        else
            $errorMessage = "Nope, mdp ou login incorect";
    }

    include ("../views/connexion_view.php");