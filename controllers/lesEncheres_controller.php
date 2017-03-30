<?php

session_start();

include "../Model.php";

if (isset($_SESSION['CodeP'])) {
    if ($_SESSION['RoleP'] != "participant")
        header("Location: accueil_controller.php");
} else
    header("Location: connexion_controller.php");

include("../views/lesEncheres_view.php");

$produits = getProduitsEnVente();


include("../views/lesEncheres_view.php");

?>

</body>
</html>
