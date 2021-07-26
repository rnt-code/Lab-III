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
        <title>registrar venta</title>
    </head>
    <body>
        <?php
            include("conexion.php");
            $idcomp = $_POST["id_comprador"];
            $idinmu = $_POST["id_inmueble"];
            $pvent = $_POST["precio_venta"];
            $fecha = $_POST["fecha"];

            $sql = "SELECT tipo FROM inmueble WHERE id_inmueble=$idinmu";
            $res = mysqli_query($conexion, $sql);
            $veci = mysqli_fetch_array($res);

            $tipo = $veci[0];
            //echo"<br>".$tipo;

            //registro el alta venta
            $sql2 = "INSERT INTO venta (id_comprador, id_inmueble, precioventa, fecha) 
            VALUES ($idcomp, $idinmu, $pvent, '$fecha')";

            $res2 = mysqli_query($conexion, $sql2);
            
            if($res2) {

                if($tipo == "casa") {
                    header("Refresh: 0; url=form_alta_casa.php");
                }
                else {
                    if($tipo == "departamento") {
                        header("Refresh: 0; url=form_alta_departamento.php");
                    }
                    else {
                        //es terreno
                        header("Refresh: 0; url=form_alta_terreno.php");
                    }
                }

            }
            else {
                echo"<br>El registro de venta falló";
            }
        ?>
        <header></header>
        <main>
        
        </main>
        <footer></footer>
    </body>
</html>
