<html>
<head>
    <title>Ventes</title>
</head>
<body>
<h1>Mes Ventes</h1>

<?php
if (!empty($ventes)) {
    echo "<ul>";
    foreach ($ventes as $vente) {
        echo "<li>";
        echo $vente['NomV'] . " " . $vente['CodeV'];
        echo "  <a href='../controllers/vente_controller.php?CodeV=" . $vente['CodeV'] . "'><button type='button'>Gérer vente</button></a>";
        echo "</li>";
    }
    echo "</ul>";
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