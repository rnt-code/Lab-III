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
        <title>alta casa</title>
    </head>
    <body>
        <?php
            include("conexion.php");
            //traigo el id_venta
            $sql = "SELECT MAX(id_venta) AS id FROM venta";
            //echo"<br>".$sql2;
            $res = mysqli_query($conexion, $sql);
            $vec = mysqli_fetch_array($res);
            if($vec) {
                $idventa = $vec[0]; //id_venta
                //echo"<br>id_venta: ".$idventa;
            }

            $sql1 = "SELECT id_inmueble FROM venta WHERE id_venta=$idventa";
            $res1 = mysqli_query($conexion, $sql1);
            $vec1 = mysqli_fetch_array($res1);
            if($vec1) {
                $idinmu = $vec1[0]; //id_inmueble
            }

            //traigo la suptotal para ese id_inmueble
            $sql2 = "SELECT suptotal FROM inmueble WHERE id_inmueble=$idinmu";
            $res2 = mysqli_query($conexion, $sql2);
            $vec2 = mysqli_fetch_array($res2);
            if($vec2) {
                $suptot = $vec2[0]; //superficie total
                //echo"<br>Sup total: ".$suptot;
            }

        ?>
        <header>
            <h1>Alta Casa</h1>
        </header>
        <main>
            <form method="post" action="registrar_alta_casa.php">
                <table>
                    <tr>
                        <td><label for="sup_total">Superficie total</label></td>
                        <td><input type="text" name="sup_total" value="<?php echo $suptot;?>"></td>
                    </tr>
                    <tr>
                        <td><label for="superf_construida">Superficie construida: </label></td>
                        <td><input type="text" name="superf_construida" id="superf_construida"></td>
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