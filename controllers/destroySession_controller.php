<?php

    session_start();

    session_destroy();

    header("Location: ../controllers/accueil_controller.php");