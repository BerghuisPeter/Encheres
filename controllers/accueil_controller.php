<?php

session_start();

include "../Model.php";

if (!isset($_SESSION['CodeP']))
    header("Location: connexion_controller.php");


$nom = $_SESSION["NomP"];
$prenom = $_SESSION["PrenomP"];

include("../views/accueilConnecte_view.php");

switch ($_SESSION['RoleP']) {
    case "participant":
        include("../views/menuParticipant_view.php");
        break;
    case "responsable":
        include("../views/menuResponsable_view.php");
        break;
    case "administrateur":
        echo "bonjour administrateur! (partie jsp)";
        break;
    case "propriétaire":
        echo "bonjour propriétaire! (partie jsp)";
        break;
}
