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
        <title>listar modificar venta</title>
    </head>
    <body>
        <header>
            <h1>Modificar venta (punto 3)</h1>
        </header>
        <main>
        <?php
            include("conexion.php");
            
            $sql = "SELECT * FROM venta";

            $res = mysqli_query($conexion, $sql);
            $fila = mysqli_fetch_row($res);

            if($fila > 0) {
            ?>
            <table>
                <tr>
                    <th>Id venta</th>
                    <th>Id comprador</th>
                    <th>Id inmueble</th>
                    <th>Precio venta</th>
                    <th>Fecha venta</th>
                    <th>Comision</th>
                    <th>Modificar</th>
                </tr>
                <?php
                while($vec = mysqli_fetch_array($res)) {
                ?>
                <tr>
                    <td><?php echo $vec[0];?></td>
                    <td><?php echo $vec[1];?></td> 
                    <td><?php echo $vec[2];?></td> 
                    <td><?php echo $vec[3];?></td> 
                    <td><?php echo $vec[4];?></td>
                    <td><?php echo $vec[5];?></td>
                    <td><a href="form_modificar_venta.php?idventa=<?php echo $vec[0];?>">Modificar</a></td>
                </tr>
                <?php        
                }
                ?>
            </table>
            <?php
            }
            else {
                echo"<br>No hay elementos para mostrar";
            }
        ?>                             
        </main>
        <footer>
            <p><a href="index.html">Menú</a></p>
        </footer>
    </body>
</html>