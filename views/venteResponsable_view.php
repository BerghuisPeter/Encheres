<html>
<head>
    <title><?php echo $nomV ?></title>
</head>
<body>
<a href="../controllers/mesVentes_controller.php">retour</a>
<h1><?php echo $nomV ?></h1>

<form action="../controllers/venteResponsable_controller.php?CodeV=<?php echo $codeV ?>" method="post">
    <table>
        <tr>
            <td>nom</td>
            <td><input type="text" name="nomV" placeholder="nom de la vente..." value="<?php echo $nomV ?>"></td>
        </tr>
        <tr>
            <td>date</td>
            <td><input type="text" name="dateV" placeholder="date et heure de la vente..." value="<?php echo $dateV ?>"></td>
        </tr>
        <tr>
            <td>temps début</td>
            <td><input type="text" name="heureDV" placeholder="heure de début de la vente"
                        value="<?php echo $heureDV ?>"></td>
        </tr>
        <tr>
            <td>temps fin</td>
            <td><input type="text" name="heureFV" placeholder="heure de fin de la vente"
                                 value="<?php echo $heureFV ?>"></td>
        </tr>
    </table>
    <button type="submit" name="btnModifieVente">enrégistrer modifications</button>
</form>
<?php echo $message ?>

<hr>

<form action="../controllers/venteResponsable_controller.php?CodeV=<?php echo $codeV ?>" method="post">
    <?php
        if (!empty($produitsNonVendu))
        {
            echo "<select name='produitNonVendu'>";
            foreach ($produitsNonVendu as $produitNonVendu)
            {
                echo "<option value='".$produitNonVendu['CodePr']."'>".$produitNonVendu['NomPr']." - ".$produitNonVendu['PrixInitial']."</option>";
            }
            echo "</select>  ";
            echo "<button type='submit' name='btnAjoutProduit'>ajouter produit au vente</button>";
        }
        else
            echo "aucun produit disponible ou ils font tous partie de la vente déja";
    ?>
</form>

<hr>

<?php
if (!empty($produits)) {
    echo "<form action='../controllers/venteResponsable_controller.php?CodeV=".$codeV."' method='post'><ul>";
    echo "<table>";
    foreach ($produits as $produit) {
        echo "<tr>";
        echo "<td>".$produit['NomPr']."</td>";
        echo "<td>".$produit['PrixInitial']." €</td>";
        echo "<td><input type='hidden' value='" . $produit['CodePr'] . "' name='CodePr' />";
        echo "  <button type='submit' name='btnSupprimerProduitVente'>Supprimer de la vente</button></td>";
        echo "</tr>";
    }
    echo "</table></form>";
} else
    echo "pas de produits associer à cette vente";
?>

</body>
</html>