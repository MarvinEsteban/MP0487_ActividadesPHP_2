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
        $numero1 = htmlspecialchars(string: $_POST['numero1']);
        $numero2 = htmlspecialchars(string: $_POST['numero2']);


        echo "Welcome " . $name . "!" . "<br>";
        if ($numero1 % 2 == 0) {
            echo $numero1 . " is pair";
        } else {
            echo $numero1 . " is odd ";
        }
        if ($numero2 % 2 == 0) {
            echo " and " . $numero2 . " is pair";
        } else {
            echo " and " . $numero2 . " is odd";
        }

        if ($numero1 > $numero2) {

            for ($i = $numero2; $i <= $numero1; $i++) {
                if ($i % 2 == 0) {

                    echo "<div style='color:Green;'>" . $i . "</div>";

                } else {

                    echo "<div style='color:Orange;'>" . $i . "</div>";

                }
            }
        } else if ($numero2 > $numero1) {
            for ($i = $numero1; $i <= $numero2; $i++) {
                if ($i % 2 == 0) {
                    echo "<div style='color:Green;'>" . $i . "</div>";

                } 
                else {


                    echo "<div style='color:Orange;'>" . $i . "</div>";


                }

            }
        }

    }
    echo "<br>"







        ?>

    <h2>Introduce tu nombre y apellido</h2>
    <form method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="name" required> <br> <br>

        <label for="numero1">Numero 1:</label>
        <input type="number" id="numero1" name="numero1" required> <br> <br>

        <label for="numero2">Numero 2:</label>
        <input type="number" id="numero2" name="numero2" required> <br> <br>
        <input type="submit" value="Enviar">



    </form>