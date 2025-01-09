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
        $number1 = htmlspecialchars(string: $_POST['number1']);
        $number2 = htmlspecialchars(string: $_POST['number2']);

        echo "Numero 1: " . $number1 . "<br> Numero 2: " . $number2 . "<br><br>";

        echo "Lista de menor a mayor";
        for ($i = $number1; $i <= $number2; $i++) {
            echo "<li style='color:Blue;'>" . $i . "</li>";

        }
        echo "<br>";
        echo "Lista de mayor a menor";
        for ($i = $number2; $i >= $number1; $i--) {
            echo "<li style='color:Tomato;'>" . $i . "</li>";
        }
    }
    ?>
    <form method="post">
        Introduce numeros entre 0 y 20 <br> <br>
        <label for="number1">Numero 1</label>
        <input type="number" id="number1" name="number1" min="0" max="20" required> <br> <br>

        <label for="number2">Numero 2</label>
        <input type="number" id="number2" name="number2" min="0" max="20" required> <br> <br>

        <input type="submit" value="Enviar">



    </form>


</body>

</html>