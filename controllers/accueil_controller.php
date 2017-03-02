<?php

    session_start();

    include "../Model.php";

    $nom = "";
    $prenom = "";
    if (isset($_SESSION['NomP']))
    {
        $nom = $_SESSION["NomP"];
        $prenom = $_SESSION["PrenomP"];

        include ("../views/accueileConnecte.php");
    }

    else
        include ("../views/accueil_view.php");