<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/png" href="icon/favicon.ico">
        <link rel="stylesheet" href="css/styles.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="js/script.js"></script>	
        <title>alta terreno</title>
    </head>
    <body>
        <?php
            include("conexion.php");
            $sql = "SELECT * FROM propietario";
            $res = mysqli_query($conexion, $sql);
        ?>
        <header>
            <h1>Alta Terreno</h1>
        </header>
        <main>
            <form method="post" action="registrar_alta_terreno.php">
                <table>
                    <tr>
                        <td><label for="serv_luz">Servicio de luz: </label></td>
                        <td><input type="checkbox" name="serv_luz" id="serv_luz" value="1"></td>
                    </tr>
                    <tr>
                        <td><label for="serv_gas">Servicio de gas: </label></td>
                        <td><input type="checkbox" name="serv_gas" id="serv_gas" value="1"></td>
                    </tr>
                    <tr>
                        <td><label for="serv_agua">Servicio de agua: </label></td>
                        <td><input type="checkbox" name="serv_agua" id="serv_agua" value="1"></td>
                    </tr>
                    <tr>
                        <td><label for="serv_cloaca">Servicio de cloaca: </label></td>
                        <td><input type="checkbox" name="serv_cloaca" id="serv_cloaca" value="1"></td>
                    </tr>
                    <tr>
                        <td><input type="submit" value="Enviar"></td>
                    </tr>
                </table>
            </form>
        </main>
        <footer></footer>
    </body>
</html>