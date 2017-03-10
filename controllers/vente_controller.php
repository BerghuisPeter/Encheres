<?php
session_start();

include "../Model.php";

if ($_SESSION['RoleP'] != "responsable") {
    header("Location: accueil_controller.php");
}

$codeV = $_REQUEST['CodeV'];
$message = "";

if (!isset($_POST['nomV'])) {
    $vente = getVente($codeV);
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

if (isset($_POST['btnModifieVente'])) {
    modifieVente($codeV, $nomV, $dateV, $heureDV, $heureFV);
    $message = "modification enrégistrées";
}

if (isset($_POST['btnSupprimerProduitVente'])) {
    $codePr = $_POST['CodePr'];

    supprimerPRoduitDeLaVente($codePr, $codeV);
    $message = "produit enlèver";
}

$produits = getProduitsDeLaVente($codeV);

include("../views/venteResponsable_view.php");