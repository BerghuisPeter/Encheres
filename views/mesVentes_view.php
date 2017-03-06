<html>
<head>
    <title>Ventes</title>
</head>
<body>
<h1>Mes Ventes</h1>

<?php
if (!empty($ventes)) {
    echo "<form action='../controllers/vente_controller.php' method='post'><ul>";
    foreach ($ventes as $vente) {
        echo "<li>";
        echo $vente['NomV'];
        echo "<input type='hidden' value='" . $vente['CodeV'] . "' name='CodeV' />";
        echo "  <button type='submit'>Gérer</button>";
        echo "</li>";
    }
    echo "</ul></form>";
} else
    echo "pas de ventes créé";
?>

<hr/>
<br>

<form action="../controllers/mesVentes_controller.php" method="post">
    nom <input type="text" name="nomV" placeholder="nom de la vente..."><br>
    date <input type="text" name="dateV" placeholder="date et heure de la vente..."><br>
    temps début <input type="text" name="heureDV" placeholder="heure de début de la vente"><br>
    temps fin <input type="text" name="heureFV" placeholder="heure de fin de la vente"><br>
    <button type="submit" name="btnAjouterVente">ajouter vente</button>
</form>

</body>
</html>