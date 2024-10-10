<?php
    session_start();
    echo "Bienvenido, ". $_SESSION['nombre'] . ", de " . $_SESSION['pais'] . ". Tienes " . $_SESSION['edad'] . " años y tu email es: " .$_SESSION['email'];
?>