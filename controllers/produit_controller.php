<?php

session_start();

include "../Model.php";

$message = "";
$produit = getProduit($_GET['CodePr']);
$codeV = $_GET['CodeV'];
$dernierEncher = getDernierEncher($produit['CodeV'], $produit['CodePr']);

if (empty($dernierEncher))
    $dernierPrixEncher = $dernierEncher['PrixE'];
else
    $dernierPrixEncher = $dernierEncher['PrixE'];


if (isset($_POST['btnEncherir'])) {
    $valeurMinimale = $_POST['valeurMinimale'];
    if ($_POST['encher'] == "" || $_POST['encher'] <= $valeurMinimale)
        $message = "veuillez saisir une valeur supérieur à " . $valeurMinimale;

    else {
        insertEncher($_POST['encher'], $codeV, $produit['CodePr']);
        $message = "Votre encher est enregistré!";
    }
}

include("../views/produit_view.php");