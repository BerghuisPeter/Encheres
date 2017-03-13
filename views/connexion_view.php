<html>
<head>
    <title>login</title>
</head>
<body>
<a href="../controllers/accueil_controller.php">retour</a>
<form action="../controllers/connexion_controller.php" method="post">
    <input type="text" name="login" placeholder="Login..." value="<?php if (isset($_POST['login'])) {
        echo $login;
    } ?>"><br>
    <input type="password" name="mdp" placeholder="mot de passe..."><br>
    <button name="btnConnecter" type="submit">Se connecter</button>
</form>
<?php echo $errorMessage; ?>
<br>
<br>
<a href="inscrire_controller.php">
    <button>créer profile</button>
</a>
</body>
</html>
