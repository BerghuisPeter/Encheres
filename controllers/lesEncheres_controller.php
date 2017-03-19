<?php

session_start();

include "../Model.php";

include("../views/lesEncheres_view.php");

$produits = getProduitsEnVente();

include ("../views/produits_view.php");

?>

</body>
</html>
