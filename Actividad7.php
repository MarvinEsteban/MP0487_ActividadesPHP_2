<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NovitaVsDoraemon</title>
</head>



<!--MENSAJE-->
<!--Este codigo tiene varios errores como no mostrar al ganador y no guardar los datos de la seleccion pero no he sido capaz de corregirlos, en cuanto tenga el nivel lo haré.-->
<!--MENSAJE-->


<?php
// Iniciar la sesión para mantener el estado
session_start();

// Inicializar el contador de rondas en la sesión si no existe
if (!isset($_SESSION['numeroRondas'])) {
    $_SESSION['numeroRondas'] = 0;
}

// Inicializar el límite de rondas en la sesión si no existe
if (!isset($_SESSION['limiteRondas'])) {
    $_SESSION['limiteRondas'] = 1; // Por defecto, una sola ronda
}

// Resetear el contador de rondas si se presiona "Reiniciar"
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['Reiniciar'])) {
    $_SESSION['numeroRondas'] = 0; // Reiniciar a 0
    $_SESSION['limiteRondas'] = 1; // Restablecer el límite predeterminado
}

// Si el formulario se envía con un límite de rondas
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['rondas'])) {
    $_SESSION['limiteRondas'] = intval($_POST['rondas']);
}


?>

<div class="rondaSuperior">
    <?php
    // Incrementar la ronda solo si no se ha alcanzado el límite
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['Enfrentar'])) {
        if ($_SESSION['numeroRondas'] < $_SESSION['limiteRondas']) {
            $_SESSION['numeroRondas']++;
        } else {
            echo "<p style='color: red;'>¡Se alcanzó el límite de rondas!</p>";
        }
    }
    echo "Ronda " . $_SESSION['numeroRondas'];
    ?>
</div>

<?php

// Inicializar puntajes si no existen
if (!isset($_SESSION['puntajeJugador1'])) {
    $_SESSION['puntajeJugador1'] = 0;
}
if (!isset($_SESSION['puntajeJugador2'])) {
    $_SESSION['puntajeJugador2'] = 0;
}

// Resetear la sesión al pulsar "Reiniciar"
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['Reiniciar'])) {
    $_SESSION['puntajeJugador1'] = 0;
    $_SESSION['puntajeJugador2'] = 0;
}

// Si el formulario se envía con un nuevo límite de rondas
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['rondas'])) {
    $_SESSION['limiteRondas'] = intval($_POST['rondas']);
}

// Lógica del enfrentamiento
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['Enfrentar'])) {
    if ($_SESSION['numeroRondas'] < $_SESSION['limiteRondas']) {


        // Lanzamiento de dados
        $dadoJugador1 = rand(1, 6);
        $dadoJugador2 = rand(1, 6);

        // Sumar al puntaje total
        $_SESSION['puntajeJugador1'] += $dadoJugador1;
        $_SESSION['puntajeJugador2'] += $dadoJugador2;

        // Mostrar los resultados
        $mensaje = "Ronda {$_SESSION['numeroRondas']}:<br>";
        $mensaje .= "Jugador 1 lanzó un $dadoJugador1<br>";
        $mensaje .= "Jugador 2 lanzó un $dadoJugador2<br>";

        // Determinar el ganador si se alcanza el límite de rondas
        if ($_SESSION['numeroRondas'] == $_SESSION['limiteRondas']) {
            if ($_SESSION['puntajeJugador1'] > $_SESSION['puntajeJugador2']) {
                $mensaje = "<br><strong>¡Jugador 1 gana con {$_SESSION['puntajeJugador1']} puntos!</strong>";
            } elseif ($_SESSION['puntajeJugador2'] > $_SESSION['puntajeJugador1']) {
                $mensaje = "<br><strong>¡Jugador 2 gana con {$_SESSION['puntajeJugador2']} puntos!</strong>";
            } else {
                $mensaje = "<br><strong>¡Empate con {$_SESSION['puntajeJugador1']} puntos cada uno!</strong>";
            }
        }
    }
}
?>


<body class="body">
    <form method="post" enctype="multipart/form-data">
        <div class="contenedor"></div>
        <div class="border">
            <div class="opcionesJugador">
                <div class="jugador1">
                    Personaje
                    <select type="text" id="personajes" name="jugador1" size="2"
                        style="background-color: blueviolet; font-size: 90%; color: white;">
                        <option value="Doraemon">Doraemon</option>
                        <option value="Nobita">Nobita</option>
                    </select> <br> <br>
                </div>
                <div class="jugador2">
                    Personaje
                    <select type="text" id="personajes" name="jugador2" size="2"
                        style="background-color: blue; font-size: 90%; color: white;">
                        <option value="Doraemon">Doraemon</option>
                        <option value="Nobita">Nobita</option>
                    </select> <br> <br>
                </div>
            </div>
            <div class="opcionesObjeto">
                <div class="objeto1">
                    Objeto
                    <select type="text" id="objeto2" name="objeto1" size="2"
                        style="background-color: blueviolet; font-size: 90%; color: white;">
                        <option value="Sartén 1d8">Sartén 1d8</option>
                        <option value="Dorayaki 2d4">Dorayaki 2d4</option>
                    </select> <br> <br>
                </div>
                <div class="objeto2">
                    Objeto
                    <select type="text" id="objeto2" name="objeto2" size="2"
                        style="background-color: blue; font-size: 90%; color: white;">
                        <option value="Sartén 1d8">Sartén 1d8</option>
                        <option value="Dorayaki 2d4">Dorayaki 2d4</option>
                    </select> <br> <br>
                </div>
            </div>
            <div class="rondasEnfrentar">
                <div class="rondas">
                    Rondas
                    <input type="number" id="rondas" name="rondas" min="1"
                        value="<?php echo $_SESSION['limiteRondas']; ?>">
                </div>
                <div class="enfrentar">
                    <input type="submit" value="Enfrentar" name="Enfrentar"
                        style="background-color: green; color: white; font-size: 100%">
                    <input type="submit" value="Reiniciar" name="Reiniciar"
                        style="background-color: red; color: white; font-size: 100%">
                </div>
            </div>
        </div>
    </form>

    <div class="fotos">
        <div class="fotoDoraemon">
            <img src="Doraemon.webp" alt="FotoDoraemon" id="fotoDoraemon">
        </div>
        <div class="fotoNobita">
            <img src="Novita.jpg" alt="FotoNobita" id="fotoNobita">
        </div>
    </div>
    <div class="resultados">
        <?php
        if (isset($mensaje)) {
            echo "<div style='text-align: center; margin-top: 20px; font-size: 18px; font-weight: bold;'>$mensaje</div>";
        }
        ?>

    </div>
</body>
<div class="elecciones">
    <?php
    // Verificar si el formulario fue enviado
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Obtener las elecciones de los jugadores
        $jugador1 = $_POST['jugador1'] ?? 'No seleccionado';
        $jugador2 = $_POST['jugador2'] ?? 'No seleccionado';

        // Mostrar las elecciones
        echo "<h2>Elecciones de los jugadores:</h2>";
        echo "<p><strong>Jugador 1:</strong> $jugador1</p>";
        echo "<p><strong>Jugador 2:</strong> $jugador2</p>";
    }
    ?>
    <?php
    // Verificar si el formulario fue enviado
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Obtener las elecciones de los jugadores
        $objeto1 = $_POST['objeto1'] ?? 'No seleccionado';
        $objeto2 = $_POST['objeto2'] ?? 'No seleccionado';

        // Mostrar las elecciones
        echo "<h2>Elección de objeto:</h2>";
        echo "<p><strong>Jugador 1:</strong> $objeto1</p>";
        echo "<p><strong>Jugador 2:</strong> $objeto2</p>";
    }
    ?>
    <div style="text-align: center; margin-top: 10px;">
        <p style="color:green; font-size: 150%"><strong>Puntaje acumulado:</strong></p>
        <p><strong>Jugador 1:</strong> <?php echo $_SESSION['puntajeJugador1']; ?> puntos</p>
        <p><strong>Jugador 2:</strong> <?php echo $_SESSION['puntajeJugador2']; ?> puntos</p>
    </div>
</div>


<style>
    .body {
        margin: 30px;
        /*border: solid 2px;*/
    }

    .border {
        border: solid 2px;
    }

    .rondaSuperior {
        text-align: center;
        font-size: 48px;
        font-weight: bold;
        margin-bottom: 30px;
    }

    .opcionesJugador {
        display: flex;
        justify-content: space-around;
        font-size: 150%;

        border: solid 2px;
        text-align: center;

    }

    .opcionesObjeto {
        display: flex;
        justify-content: space-around;
        font-size: 150%;
        text-align: center;

        border: solid 2px;

    }

    .rondasEnfrentar {
        display: flex;
        justify-content: space-evenly;
        font-size: 150%;
        margin-top: 5%;
    }

    .jugador1 {
        justify-content: flex-start;
        color: blueviolet;
        border: solid 2px;
        padding-top: 10px;
        padding-right: 292px;

        padding-left: 216px;

    }

    .jugador2 {
        justify-content: flex-end;
        color: blue;
        border: solid 2px;
        padding-top: 10px;
        padding-left: 292px;
        padding-right: 218px;
    }

    .objeto1 {
        justify-content: flex-end;
        color: blueviolet;
        border: solid 2px;
        padding-top: 10px;
        padding-right: 294px;
        padding-left: 216px;

    }

    .objeto2 {
        justify-content: flex-end;
        color: blue;
        border: solid 2px;
        padding-top: 10px;

        padding-left: 293px;
        padding-right: 218px;
    }

    .rondas {
        justify-content: flex-start;
        margin-right: 5%;
        margin-bottom: 3%;
    }

    .Enfrentar {
        justify-content: flex-end;


    }

    .fotos {
        display: flex;
        justify-content: space-between;
        padding-right: 70px;
        padding-left: 70px;

    }

    .elecciones {
        text-align: center;
    }
</style>

</body>

</html>