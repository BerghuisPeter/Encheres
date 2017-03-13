<html>
<head>
    <title>Créer Profile</title>
</head>
<body>
<a href="../controllers/accueil_controller.php">retour</a>
<form action="../controllers/inscrire_controller.php" method="post">
    <input type="text" name="nom" placeholder="nom..." value="<?php if (isset($_POST['nom'])) {
        echo $nom;
    } ?>"><br>
    <input type="text" name="prenom" placeholder="prenom..." value="<?php if (isset($_POST['prenom'])) {
        echo $prenom;
    } ?>"><br>
    <input type="text" name="login" placeholder="login..." value="<?php if (isset($_POST['login'])) {
        echo $login;
    } ?>"><br>
    <input type="email" name="email" placeholder="email..." value="<?php if (isset($_POST['email'])) {
        echo $email;
    } ?>"><br>
    <input type="password" name="mdp" placeholder="mot de passe..."><br>
    <button name="btnInscrire" type="submit">S'inscrire</button>
</form>
<?php echo $errorMessage; ?>
</body>
</html>
