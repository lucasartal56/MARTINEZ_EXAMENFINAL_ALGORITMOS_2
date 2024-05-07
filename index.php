
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenida|Formulario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body{
            background-image: url(./fondo.jpg);
            background-size: cover;
            background-repeat: no-repeat;
        }
        .contenedor{
            justify-content: center;
            text-align: center;
            display: flex;
        }
        .formulario{
            background-image: url(./fondo2.jpg);
            background-size: cover;
            background-repeat: no-repeat;
            padding: 4%;
            border: solid 2px black;
            border-radius: 20px;
            margin-top: 5%;
        }
    </style>
</head>

<body>

    <div class="contenedor" >
        <form action="juego.php" method="get" class="formulario">
            <h1>BIENVENIDO AL JUEGO</h1>    
            <h2>Ingrese el nombre de los participantes</h2>
            <div>
                <label for="nombre1">Jugador 1</label><br>
                <input type="text" name="nombre1" class="form-control" required>
            </div>
            <br>
            <div>
                <label for="nombre2">Jugador 2</label><br>
                <input type="text" name="nombre2" class="form-control" required>
            </div>
            <br>
            <div>
                <label for="nombre3">Jugador 3</label><br>
                <input type="text" name="nombre3" class="form-control" required>
            </div><br>
            <button type="submit" class="btn btn-primary" >¡COMENZAR!</button>
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>