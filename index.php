<?php
session_start();

include "functions.php";

if (isset($_POST['btnConnecter']))
{
    if (verifieMotDePasse($_POST['login'], $_POST['mdp']))
    {
        echo "Valid";
    }
    else
        echo "nope";
}

?>

<html>
<head>
    <title>login</title>
</head>
<body>
<form action="index.php" method="post">
    <input type="text" name="login" placeholder="Login..."><br>
    <input type="password" name="mdp" placeholder="mot de passe..."><br>
    <button name="btnConnecter" type="submit">Se connecter</button>
</form>
<br>
<br>
<a href="creerProfile.php"><button>créer profile</button></a>
</body>
</html>
