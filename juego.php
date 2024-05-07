<?php

session_start();

if (isset($_POST['reiniciar'])) {
    session_unset();
    session_destroy();
    header("Location: index.php");
    exit();
}

$_SESSION['jugador1'] = $_GET['nombre1'];
$_SESSION['jugador2'] = $_GET['nombre2'];
$_SESSION['jugador3'] = $_GET['nombre3'];

$jugadores_numeros = array(
    $_SESSION['jugador1'] => 1,
    $_SESSION['jugador2'] => 2,
    $_SESSION['jugador3'] => 3
);

$_SESSION['turno'] = isset($_SESSION['turno']) ? $_SESSION['turno'] : $_SESSION['jugador1'];

$_SESSION['tiradas'] = isset($_SESSION['tiradas']) ? $_SESSION['tiradas'] : [
    $_SESSION['jugador1'] => 0,
    $_SESSION['jugador2'] => 0,
    $_SESSION['jugador3'] => 0
];

$total_avanzado = isset($_SESSION['total_avanzado']) ? $_SESSION['total_avanzado'] : [];
$avanzar = '';
$jugador_actual = $_SESSION['jugador1'];
$_SESSION['posiciones'] = "";

if (isset($_POST['dado'])) {
    $jugador_actual = $_POST['jugador_actual'];
    $avanzar = $_POST['dado'];
    $total_avanzado[$jugador_actual] = isset($total_avanzado[$jugador_actual]) ? $total_avanzado[$jugador_actual] + $avanzar : $avanzar;
    $_SESSION['posiciones'] = $total_avanzado;
    $_SESSION['tiradas'][$jugador_actual]++;

    if ($jugador_actual === $_SESSION['jugador1']) {
        $_SESSION['turno'] = $_SESSION['jugador2'];
    } elseif ($jugador_actual === $_SESSION['jugador2']) {
        $_SESSION['turno'] = $_SESSION['jugador3'];
    } else {
        $_SESSION['turno'] = $_SESSION['jugador1'];
    }

    $_SESSION['total_avanzado'] = $total_avanzado;
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SERPIENTES Y ESCALERAS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
   
   <style>
        body {
            background-image: url(./fondo3.jpg);
            background-size: cover;
            background-repeat: no-repeat;
        }
        .jugador1 {
            background-color: orange;
        }

        .jugador2 {
            background-color: greenyellow;
        }

        .jugador3 {
            background-color: skyblue;
        }

        .jugador-actual {
            box-decoration-break: slice;
        }
        table,
        td,
        tr {
            border: solid 1px black;
            text-align: center;
        }

        .fichas-jugadores {
            margin-bottom: 20px;
        }

        .ficha-jugador {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            border: 1px solid black;
            margin-bottom: 10px;
            text-align: center;
        }
        
    </style>
</head>
        
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-3 formulario">
                <?php
                ?>
                
                <form action="#" method="post">
                    <?php echo "<h4> Está jugando: " . $_SESSION['turno'];
                    "</h4>" ?>
                    <br><br>
                    <div>
                        <label for="contador">Lanzamientos</label>
                        <input type="number" class="form-control" value="<?php echo $_SESSION['tiradas'][$jugador_actual]; ?>" readonly>
                    </div><br>
                    <div>
                        <label for="dado">Dado</label><br>
                        <input type="number" class="form-control" name="dado" value="<?php echo rand(1, 12); ?>" readonly>
                    </div>
                    <input type="hidden" name="jugador_actual" value="<?php echo $_SESSION['turno']; ?>">
                    <button type="submit" class="btn btn-primary">Lanzar</button>
                </form>
                
                <?php
                if (isset($_SESSION['posiciones']) && $_SESSION['posiciones'] != "" ) {
                    $jugador_actual = $_POST['jugador_actual'] ?? $_SESSION['turno'];
                    if ($_SESSION['posiciones'][$jugador_actual] > 0) {
                        $posicion_actual = $_SESSION['posiciones'][$jugador_actual];
                        if ($posicion_actual == 2) {
                            $_SESSION['posiciones'][$jugador_actual] = 22;
                            echo "<h4 class='text-black text-justify'> ".$jugador_actual. " estabas en la posición 2 y subes a la posición 22 </h4>";
                        } elseif ($posicion_actual == 15) {
                            $_SESSION['posiciones'][$jugador_actual] = 47;
                            echo "<h5 class='text-black text-justify'> ".$jugador_actual. " estabas en la posición 15 y subes a la posición 47 </h5>";
                        } elseif ($posicion_actual == 32) {
                            $_SESSION['posiciones'][$jugador_actual] = 12;
                            echo "<h5 class='text-black text-justify'> ".$jugador_actual. " estabas en la posición 32 y bajas a la posición 12 </h5>";
                        } elseif ($posicion_actual == 57) {
                            $_SESSION['posiciones'][$jugador_actual] = 39;
                            echo "<h5 class='text-black text-justify'> ".$jugador_actual. " estabas en la posición 57 y bajas a la posición 39 </h5>";
                        } elseif ($posicion_actual == 46) {
                            $_SESSION['posiciones'][$jugador_actual] = 75;
                            echo "<h5 class='text-black text-justify'> ".$jugador_actual. " estabas en la posición 46 y subes a la posición 75 </h5>";
                        } elseif ($posicion_actual == 90) {
                            $_SESSION['posiciones'][$jugador_actual] = 68;
                            echo "<h5 class='text-black text-justify'> ".$jugador_actual. " estabas en la posición 90 y bajas a la posición 68 </h5>";
                        } elseif ($posicion_actual == 59) {
                            $_SESSION['posiciones'][$jugador_actual] = 78;
                            echo "<h5 class='text-black text-justify'> ".$jugador_actual. " estabas en la posición 59 y subes a la posición 78 </h5>";
                        } elseif ($posicion_actual == 97) {
                            $_SESSION['posiciones'][$jugador_actual] = 84;
                            echo "<h5 class='text-black text-justify'> ".$jugador_actual. " estabas en la posición 90 y bajas a la posición 68 </h5>";
                        } elseif ($posicion_actual >= 100) {
                            $_SESSION['posiciones'][$jugador_actual] = 100;
                            ?>
                            
                            <form action="#" method="post" id="formulario">
                                <h5>¡FELICITACIONES! Llegaste a la meta <?php echo $jugador_actual; ?></h5>
                                <input type="hidden" value="GANASTE" name="reiniciar">
                                <button type="submit" id="boton" class="btn btn-primary">REINICIAR </button>
                            </form>
                            <?php
                            $_SESSION['total_avanzado'] = $total_avanzado;
                            session_regenerate_id();
                        } else {

                            echo "<br><br>". $jugador_actual. " <h5> Avanzaste </h5> " . $avanzar . " <h5> lugares </h5> ";
                        }
                    }
                }
                ?>
            </div>
            
            <div class="col-2 jugadores">
                <h2 class="text-center">Participantes</h2><br><br>
                <div class="fichas-jugadores">
                    <?php echo $_SESSION['jugador1'] . "<br>"; ?>
                    <div class="ficha-jugador jugador1"></div>
                    <?php echo $_SESSION['jugador2'] . "<br>"; ?>
                    <div class="ficha-jugador jugador2"></div>
                    <?php echo $_SESSION['jugador3'] . "<br>"; ?>
                    <div class="ficha-jugador jugador3"></div>
                </div>
                <?php
                ?>
            </div>
            
            <div class="col-7">
                
                <?php
                $fila_columas = 10;
                $contador = 100;
                $colores = ['green', 'yellow', 'white', 'blue', 'red'];
                ?>
                
                <img src="estrella.png" style="z-index: 2; position: absolute; width: 40px; height: 40px; margin-top: 0%; margin-left: 0%; ">

                <img src="escalera.png" style="z-index: 2; position: absolute; width: 150px; height: 150px; margin-top: 34%; margin-left: 2%; ">

                <img src="escalera2.png" style="z-index: 2; position: absolute; width: 150px; height: 300px; margin-top: 22%; margin-left: 23%; ">

                <img src="escalera.png" style="z-index: 2; position: absolute; width: 150px; height: 250px; margin-top: 10%; margin-left: 20%; ">
                
                <img src="escalera2.png" style="z-index: 2; position: absolute; width: 100px; height: 250px; margin-top: 7%; margin-left: 6%; ">

                <img src="serpiente2.png" style="z-index: 2; position: absolute; width: 150px; height: 150px; margin-top: 29%; margin-left: 33%; ">
                
                <img src="serpiente.png" style="z-index: 2; position: absolute; width: 150px; height: 150px; margin-top: 20%; margin-left: 6%; ">

                <img src="serpiente.png" style="z-index: 2; position: absolute; width: 150px; height: 150px; margin-top: 7%; margin-left: 34%; ">

                <img src="serpiente2.png" style="z-index: 2; position: absolute; width: 100px; height: 100px; margin-top: 1%; margin-left: 12%; ">
                
                <?php
                echo "<table style='z-index: 1;' >";
                
                for ($i = 0; $i < $fila_columas; $i++) {
                    $a = 9;
                    echo "<tr>";
                    for ($j = 0; $j < $fila_columas; $j++) {
                        $color = rand(0, count($colores) - 1);
                        $color_elegido = $colores[$color];

                        if ($i % 2 != 0) {
                            $contador2 = $contador - ($a - $j);
                            $casilla = $contador2;
                        } else {
                            $casilla = $contador;
                        }

                        $ficha_mostrada = '';
                        if (($_SESSION['posiciones']) != '') {
                            foreach ($_SESSION['posiciones'] as $jugador => $posicion) {

                                if ($posicion == $casilla) {
                                    $numero_jugador = $jugadores_numeros[$jugador];
                                    $clase_jugador = 'jugador' . $numero_jugador;
                                    $ficha_mostrada = "<div style='z-index: 2;' class='ficha-jugador $clase_jugador'></div>";
                                }
                            }
                        }
                        
                        if ($ficha_mostrada != '') {
                            echo "<td style='width: 70px; height: 70px; background-color: $color_elegido;' class='jugador-actual'>$ficha_mostrada</td>";
                        } else {
                            echo "<td style=' width: 70px; height: 70px; background-color: $color_elegido;'><h3>$casilla</h3></td>";
                        }
                        $a--;
                        $contador--;
                    }
                    echo "</tr>";
                }

                echo "</table>";
                
                ?>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>