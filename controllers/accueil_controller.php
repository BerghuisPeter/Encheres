<?php

session_start();

include "../Model.php";

$nom = "";
$prenom = "";
if (isset($_SESSION['NomP'])) {
    $nom = $_SESSION["NomP"];
    $prenom = $_SESSION["PrenomP"];

    include("../views/accueileConnecte_view.php");

    switch ($_SESSION['RoleP']) {
        case "participant":
            include("../views/menuParticipant_view.php");
            break;
        case "responsable":
            include("../views/menuResponsable_view.php");
            break;
        default:
            // ToDo si il s'agit d'une administrateur ou propriétaire
            echo "bonjour administrateur ou propriétaire!";
    }
} else
    include("../views/accueil_view.php");