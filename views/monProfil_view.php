<html>
<head>
    <title>Mon profile</title>
</head>
<body>
<a href="../controllers/accueil_controller.php">retour</a>
    <h1>mon profil</h1>
    <form action="../controllers/monProfil_controller.php" method="post">
        <table>
            <tr><td>Login</td><td><?php echo $login ?></td></tr>
            <tr>
                <td>email</td>
                <td><?php echo $email ?></td>
            </tr>
            <tr><td>nom</td><td><input type="text" name="nom" value="<?php echo $nom ?>"></td></tr>
            <tr><td>prenom</td><td><input type="text" name="prenom" value="<?php echo $prenom ?>"></td></tr>
            <tr>
                <td>nouveau mot de passe</td>
                <td><input type="password" name="newPwd"></td>
            </tr>
            <tr>
                <td>mot de passe actuel</td>
                <td><input type="text" name="oldPwd"></td>
            </tr>
        </table>
        <button type="submit" name="btnValiderChangements">valider changements</button>
    </form>
    <?php echo $message?>
</body>
</html>