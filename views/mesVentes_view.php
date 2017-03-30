<html>
<head>
    <title>Ventes</title>
</head>
<body>
<a href="../controllers/accueil_controller.php">retour</a>
<h1>Mes Ventes</h1>

<?php
if (!empty($ventes)) {
    echo "<table>";
    foreach ($ventes as $vente) {
        echo "<tr>";
        echo "<td>".$vente['NomV']."</td>";
        echo "<td>" . $vente['DateV'] . "</td>";
        echo "<td>"."<a href='../controllers/venteResponsable_controller.php?CodeV=" . $vente['CodeV'] . "'><button type='button'>Gérer vente</button></a></td>";
        echo "</tr>";
    }
    echo "</table>";
} else
    echo "pas de ventes créé";
?>

<hr/>
<br>

<form action="../controllers/mesVentes_controller.php" method="post">
    <table>
        <tr>
            <td>nom</td>
            <td><input type="text" name="nomV" placeholder="nom de la vente..."></td>
        </tr>
        <tr>
            <td>date</td>
            <td><input type="text" name="dateV" placeholder="date et heure de la vente..."></td>
        </tr>
        <tr>
            <td>temps début</td>
            <td><input type="text" name="heureDV" placeholder="heure de début de la vente"></td>
        </tr>
        <tr>
            <td>temps fin</td>
            <td><input type="text" name="heureFV" placeholder="heure de fin de la vente"></td>
        </tr>
    </table>
    <?php echo $message . "<br>"; ?>
    <button type="submit" name="btnAjouterVente">ajouter vente</button>
</form>

</body>
</html>