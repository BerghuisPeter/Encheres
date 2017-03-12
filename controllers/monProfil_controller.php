<?php

session_start();

include "../Model.php";

$idSession = $_SESSION['CodeP'];
$nom = $_SESSION['NomP'];
$prenom = $_SESSION['PrenomP'];
$login = $_SESSION['LoginP'];
$email = $_SESSION['EmailP'];
$message = "";

if (isset($_POST['nom'])){ $nom = $_POST['nom'];}
if (isset($_POST['prenom'])){ $prenom = $_POST['prenom'];}
if (isset($_POST['email'])){ $email = $_POST['email'];}
if (isset($_POST['oldPwd'])){ $oldPwd = $_POST['oldPwd'];}
if (isset($_POST['newPwd'])){ $newPwd = $_POST['newPwd'];}


if (isset($_POST['btnValiderChangements']) && $oldPwd != "")
{
    echo hashPwd($newPwd);
    if (verifieMotDePasse($login, $oldPwd))
    {
        updateProfil($idSession, $nom, $prenom, $email, $newPwd);
        $message = "Modifications enrégistrer";
    }
    else
    {
        $message = "votre mot de passe actuelle ne correspond pas avec le mot de passe trouvé dans notre système";
    }
}
else
    $message = "veiller rentrer votre mot de passe actuelle pour confirmer les changements";

include ("../views/monProfil_view.php");