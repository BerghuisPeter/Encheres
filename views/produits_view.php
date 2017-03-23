<?php

    if (!empty($produits))
    {
        echo "<table>";
        echo "<tr><th>Titre</th><th>dernièr Encher</th><th>vente termine dans</th><th>image</th><th>bouton</th></tr>";
        foreach ($produits as $produit)
        {
            echo "<tr>";


            echo "<td>".$produit['NomPr']."</td>";
            echo "<td>".$produit['PrixE']." €</td>";
            $dateAujourdhui = new DateTime();
            $tempsFuture = new DateTime(date_format($dateAujourdhui, 'Y-m-d')." ".$produit['HeureFV']);
            $interval = $tempsFuture->diff($dateAujourdhui);
            echo "<td>".$interval->format("%h h %i min")."</td>";
            echo "<td><img src='../".$produit['PhotoPr']."' height='100px'></td>";
            echo "<td><a href='../controllers/produit_controller.php?CodePr=" . $produit['CodePr'] . "&CodeV=" . $produit['CodeV'] . "'><button>voir Produit</button></a></td>";

            echo "</tr>";
        }
        echo "</table>";
    }
    else
    {
        echo "aucune produits en vente pour le moment";
    }



?>


