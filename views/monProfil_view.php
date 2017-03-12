<html>
<head>
    <title>Mon profile</title>
</head>
<body>
    <h1>mon profil</h1>
    <form action="../controllers/monProfil_controller.php" method="post">
        <table>
            <tr><td>Login</td><td><?php echo $login ?></td></tr>
            <tr><td>nom</td><td><input type="text" name="nom" value="<?php echo $nom ?>"></td></tr>
            <tr><td>prenom</td><td><input type="text" name="prenom" value="<?php echo $prenom ?>"></td></tr>
            <tr><td>email</td><td><input type="email" name="email" value="<?php echo $email ?>"></td></tr>
            <tr><td>nouvelle mot de passe</td><td><input type="password" name="newPwd"></td></tr>
            <tr><td>mot de passe actuelle</td><td><input type="text" name="oldPwd"></td></tr>
        </table>
        <button type="submit" name="btnValiderChangements">valider changements</button>
    </form>
    <?php echo $message?>
</body>
</html>