<html>
<head>
    <title><?php echo $nomV ?></title>
</head>
<body>
<h1><?php echo $nomV ?></h1>

<form action="../controllers/vente_controller.php" method="post">
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

<?php
if (!empty($produits)) {
    echo "<form action='../controllers/vente_controller.php' method='post'><ul>";
    echo "<input type='hidden' value='" . $codeV . "' name='CodeV' />";
    foreach ($produits as $produit) {
        echo "<li>";
        echo $produit['NomPr'];
        echo "<input type='hidden' value='" . $produit['CodePr'] . "' name='CodePr' />";
        echo "  <button type='submit' name='btnSupprimerProduitVente'>Supprimer de la vente</button>";
        echo "</li>";
    }
    echo "</ul></form>";
} else
    echo "pas de produits associer à cette vente";
?>

</body>
</html>