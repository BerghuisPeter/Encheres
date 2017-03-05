<?php
session_start();

include "../Model.php";

if ($_SESSION['RoleP'] != "responsable") {
    header("Location: accueil_controller.php");
}

$CodeV = $_POST['CodeV'];

if (!isset($_POST['nomV'])) {
    $vente = getVente($CodeV);
    $nomV = $vente['NomV'];
    $dateV = $vente['DateV'];
    $heureDV = $vente['HeureDV'];
    $heureFV = $vente['HeureFV'];
} else {
    $nomV = $_POST['nomV'];
    $dateV = $_POST['dateV'];
    $heureDV = $_POST['heureDV'];
    $heureFV = $_POST['heureFV'];
}

$message = "";

if (isset($_POST['btnModifieVente'])) {
    modifieVente($CodeV, $nomV, $dateV, $heureDV, $heureFV);
    $message = "modification enrégistrées";
}

include("../views/venteResponsable_view.php");