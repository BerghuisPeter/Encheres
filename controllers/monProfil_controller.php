<?php

session_start();

include "../Model.php";

$idSession = $_SESSION['CodeP'];

include ("../views/monProfil_view.php");

