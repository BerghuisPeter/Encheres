<html>
<head>
    <title>produits</title>
</head>
<body>

<a href="../controllers/accueil_controller.php">retour</a>
<h1>les produits en vente</h1>


<?php

if (!empty($produits)) {
    echo "<table>";
    echo "<tr><th>Titre</th><th>dernière Enchère</th><th>vente terminée dans</th><th>image</th><th>bouton</th></tr>";
    foreach ($produits as $produit) {
        echo "<tr>";


        echo "<td>".$produit['NomPr']."</td>";
        $dernierEncherQuery = getDernierEncher($produit['CodeV'], $produit['CodePr']);

        if (empty($dernierEncherQuery))
            $dernierEncher = $produit['PrixInitial'];
        else
            $dernierEncher = $dernierEncherQuery['PrixE'];

        echo "<td>" . $dernierEncher . " €</td>";
        $dateAujourdhui = new DateTime();
        $tempsFuture = new DateTime(date_format($dateAujourdhui, 'Y-m-d')." ".$produit['HeureFV']);
        $interval = $tempsFuture->diff($dateAujourdhui);
        echo "<td>".$interval->format("%h h %i min")."</td>";
        echo "<td><img src='../".$produit['PhotoPr']."' height='100px'></td>";
        echo "<td><a href='../controllers/produit_controller.php?CodePr=" . $produit['CodePr'] . "&CodeV=" . $produit['CodeV'] . "'><button>voir Produit</button></a></td>";

        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "aucun produits en vente pour le moment";
}

?>

</body>
</html>
