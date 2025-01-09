<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = htmlspecialchars($_POST["name"]);
        $surname = htmlspecialchars(string: $_POST['surname']);

        echo "Nombre: " . $name . "<br> Apellido: " . $surname;
    }

    ?>


    <form method="post">
        Datos personales <br> <br>
        <label for="nombre">Nombre</label><br>

        <input type="text" id="nombre" name="name" required> <br>

        <label for="apellido">Apellido</label><br>
        <input type="text" id="apellido" name="surname" required> <br> <br>

        <input type="submit" value="Enviar">



    </form>









</body>

</html>