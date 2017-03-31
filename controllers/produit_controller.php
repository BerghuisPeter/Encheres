<?php

session_start();

include "../Model.php";

if (isset($_SESSION['CodeP'])) {
    if ($_SESSION['RoleP'] != "participant")
        header("Location: accueil_controller.php");
} else
    header("Location: connexion_controller.php");

$message = "";
$produit = getProduit($_GET['CodePr'], $_GET['CodeV']);
$codeV = $_GET['CodeV'];
$dernierEncher = getDernierEncher($codeV, $produit['CodePr']);

if (empty($dernierEncher))
    $dernierPrixEncher = $produit['PrixInitial'];
else
    $dernierPrixEncher = $dernierEncher['PrixE'];


if (isset($_POST['btnEncherir'])) {
    $valeurMinimale = $_POST['valeurMinimale'];
    if ($_POST['encher'] == "" || $_POST['encher'] <= $valeurMinimale)
        $message = "veuillez saisir une valeur supérieur à " . $valeurMinimale;

    else {
        insertEncher($_POST['encher'], $codeV, $produit['CodePr']);
        $message = "Votre enchère est enregistrée!";
        $dernierEncher = getDernierEncher($codeV, $produit['CodePr']);
        $dernierPrixEncher = $dernierEncher['PrixE'];
    }
}

include("../views/produit_view.php");