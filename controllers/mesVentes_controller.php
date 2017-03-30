<?php
session_start();

include "../Model.php";

if (isset($_SESSION['CodeP'])) {
    if ($_SESSION['RoleP'] != "responsable")
        header("Location: accueil_controller.php");
} else
    header("Location: connexion_controller.php");

$message = "";

if (isset($_POST['btnAjouterVente'])) {
    // ToDo peut on avoir des dates qui se chevauchent? des doublons de nom?
    $okHeures = true;

    if (isset($_POST['nomV']))
        $nomV = $_POST['nomV'];

    if (isset($_POST['dateV']))
        $dateV = $_POST['dateV'];

    if (isset($_POST['heureDV'])) {
        $heureDV = $_POST['heureDV'];
        if (!preg_match("/(2[0-4]|[01][1-9]|10):([0-5][0-9])/", $heureDV))
            $okHeures = false;
    }

    if (isset($_POST['heureFV'])) {
        $heureFV = $_POST['heureFV'];
        if (!preg_match("/(2[0-4]|[01][1-9]|10):([0-5][0-9])/", $heureFV))
            $okHeures = false;
    }
    if ($nomV == "" ||
        $dateV == "" ||
        $heureDV == "" ||
        $heureFV == ""
    )
        $message = "veuillez vérifier que tous les champs ne sont pas vides";

    if ($okHeures) {
        insertVente($nomV, $dateV, $heureDV, $heureFV, $_SESSION['CodeP']);
        $message = "vente ajouté!";
    } else {
        $message = "Les horraires doivent etre du type HH:MM (ex: 06:30)";
    }

}

$ventes = getMesVentes($_SESSION['CodeP']);

include("../views/mesVentes_view.php");