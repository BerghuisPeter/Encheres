<html>
<head>
    <title><?php echo $nomV ?></title>
</head>
<body>
<h1><?php echo $nomV ?></h1>

<form action="../controllers/vente_controller.php" method="post">
    <input type="hidden" name="CodeV" value="<?php echo $CodeV ?>">
    nom <input type="text" name="nomV" placeholder="nom de la vente..." value="<?php echo $nomV ?>"><br>
    date <input type="text" name="dateV" placeholder="date et heure de la vente..." value="<?php echo $dateV ?>"><br>
    temps début <input type="text" name="heureDV" placeholder="heure de début de la vente"
                       value="<?php echo $heureDV ?>"><br>
    temps fin <input type="text" name="heureFV" placeholder="heure de fin de la vente"
                     value="<?php echo $heureFV ?>"><br>
    <button type="submit" name="btnModifieVente">enrégistrer modifications</button>
</form>
<?php echo $message ?>
<hr>
<br>


</body>
</html>