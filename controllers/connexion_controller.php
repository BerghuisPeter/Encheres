<?php
session_start();

include "../functions.php";

if (isset($_POST['btnConnecter']))
{
    if (verifieMotDePasse($_POST['login'], $_POST['mdp']))
    {
        echo "Valid";
    }
    else
        echo "nope";
}

include ("../views/connexion_view.php");

?>