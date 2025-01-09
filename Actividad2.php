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
        $numero1 = htmlspecialchars(string: $_POST['numero1']);
        $numero2 = htmlspecialchars(string: $_POST['numero2']);

        echo "Numero 1: " . $numero1 . "<br> Numero 2: " . $numero2 . "<br>";

        if ($numero1 > $numero2) {
            echo $numero1 . " es mayor que " . $numero2;
        } else if ($numero1 < $numero2) {
            echo $numero1 . " es menor que " . $numero2;
        } else {
            echo "Los dos numeros son iguales";
        }
    }
    ?>
    <form method="post">
        Introduce numeros <br><br>
        <label for="numero1">Numero 1</label> <br>
        <input type="number" id="numero1" name="numero1" required> <br>

        <label for="numero2">Numero 2</label><br>
        <input type="number" id="numero2" name="numero2" required> <br> <br>

        <input type="submit" value="Enviar">



    </form>
</body>

</html>