<?php
session_start();

include "../Model.php";

if ($_SESSION['RoleP'] != "responsable") {
    header("Location: accueil_controller.php");
}

if (isset($_POST['nomV'])) {
    $nomV = $_POST['nomV'];
}
if (isset($_POST['dateV'])) {
    $dateV = $_POST['dateV'];
}
if (isset($_POST['heureDV'])) {
    $heureDV = $_POST['heureDV'];
}
if (isset($_POST['heureFV'])) {
    $heureFV = $_POST['heureFV'];
}

if (isset($_POST['btnAjouterVente'])) {
    // ToDo vérifier si champs pas null. peut on avoir des dates qui se chevauchent? des doublons de nom?

    insertVente($nomV, $dateV, $heureDV, $heureFV, $_SESSION['CodeP']);
}

include("../views/mesVentes_view.php");