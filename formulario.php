<?php

    $error_nom = $error_email = $error_edad = '';

    $lista_paises = ["Argentina", "Bolivia", "Canadá"  ,
                     "Dinamarca", "España",   "Francia",];

    $nom_regex     = "/^[a-zA-Z\s]+$/";
    $email_regex   = "/[\w._]+@[\w.]+\.[a-zA-Z]{2,4}/";
    $edad_regex    = "/^[\d]+$/";

    $test = '';

    if(!empty($_POST['enviado'])){

        if(empty($_POST['nombre'])){
            $error_nom = 'No has introducido un valor en el campo.';
        }else if (!preg_match($nom_regex, $_POST['nombre'])){
            $error_nom = 'Has introducido un nombre no válido';
        }

        if(empty($_POST['email'])){
            $error_email = 'No has introducido un valor en el campo.';
        }else if (!preg_match($email_regex, $_POST['email'])){
            $error_email= 'Has introducido un email no válido';
        }

        if(empty($_POST['edad'])){
            $error_edad = 'No has introducido un valor en el campo.';
        }else if (!preg_match($edad_regex, $_POST['edad'])){
            $error_edad = 'Has introducido un edad no válido';
        }

        if(empty($error_nom) && empty($error_email) &empty($error_edad)){
            session_start();
            $_SESSION['nombre'] = $_POST['nombre'];
            $_SESSION['email']  = $_POST['email'];
            $_SESSION['edad']   = $_POST['edad'];
            $_SESSION['pais']   = $_POST['pais'];
            header("location: informacion.php");
        }
    };

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="formulario.php" method="POST">
        <input type="hidden" name="enviado" value="1">

        <label for="nombre">Nombre: </label>
        <input type="text" name="nombre" id="nombre" placeholder="Introduce tu nombre">
        
        <?php
            echo $error_nom;
        ?>
        <br>

        <label for="email">Email: </label>
        <input type="text" name="email" id="email" placeholder="Introduce tu email">
        
        <?php
            echo $error_email;
        ?>
        <br>

        <label for="edad">Edad:</label>
        <input type="text" name="edad" id="edad" placeholder="Introduce tu edad">

        <?php
            echo $error_edad;
        ?>
        <br>
        
        

        <label for="pais">Filtrar por género:</label>
        <select name="pais" id="pais">
            <?php
                foreach($lista_paises as $pais){
                    echo  "<option value='". $pais ."'>" . $pais ."</option>";
                }
            ?>
        </select>
        <br>
        
        <input type = "submit">
    </form>

    <?php
        echo $test;
    ?>
</body>
</html>