<html>
    <head>
        <title><?php echo $produit['NomPr']?></title>
    </head>
    <body>
    <a href="../controllers/lesEncheres_controller.php">retour</a>

    <h1><?php echo $produit['NomPr'] ?></h1>

    <img src="../<?php echo $produit['PhotoPr'] ?>">
    <hr>

    <div>
        <form action="../controllers/produit_controller.php?CodePr=<?php echo $_GET['CodePr'] . "&CodeV=" . $_GET['CodeV'] ?>"
              method="post">
            dernièr encher: <?php echo $dernierPrixEncher . " €" ?><br>
            <input type="text" name="valeurMinimale" value="<?php echo $dernierPrixEncher ?>" hidden>
            <input type="text" name="encher"
                   placeholder=" <?php echo "supérieur à " . $dernierPrixEncher . " € ..." ?>">
            <button type="submit" name="btnEncherir">Enchérir</button>
            <p><?php echo $message ?></p>
        </form>
        <?php
        $dateAujourdhui = new DateTime();
        $tempsFuture = new DateTime(date_format($dateAujourdhui, 'Y-m-d') . " " . $produit['HeureFV']);
        $interval = $tempsFuture->diff($dateAujourdhui);
        echo "temps restant: " . $interval->format("%h h %i min") . "<br>";
        ?>
        prix initial: <?php echo $produit['PrixInitial'] ?> €<br>
        propriétaire: <?php echo $produit['NomP'] . " " . $produit['PrenomP'] ?><br>
    </div>
    </body>
</html>