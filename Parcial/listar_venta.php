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
        <title>listar ventas</title>
    </head>
    <body>
        <header>
            <h1>Listado de Ventas (punto 2)</h1>
        </header>
        <main>
        <?php
            include("conexion.php");
            
            $sql = "SELECT p.nombreyapellido, i.fecha_registro, i.suptotal, i.supconstruida, i.precio, v.fecha, v.precioventa, v.comision, c.nombreyapellido  
            FROM propietario p, inmueble i, venta v, comprador c
            WHERE p.id_propietario=i.id_propietario 
            AND i.id_inmueble=v.id_inmueble 
            AND v.id_comprador=c.id_comprador";

            //echo"<br>".$sql;

            $res = mysqli_query($conexion, $sql);
            $fila = mysqli_fetch_row($res);

            if($fila > 0) {
            ?>
            <table>
                <tr>
                    <th>p.Propietario</th>
                    <th>i.Fecha registro</th>
                    <th>i.Sup total</th>
                    <th>i.Super. construida</th>
                    <th>i.Precio solicitado</th>
                    <th>v.Fecha venta</th>
                    <th>v.Precio venta</th>
                    <th>v.Comisión</th>
                    <th>c.Comprador</th>
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
                    <td><?php echo $vec[6];?></td>
                    <td><?php echo $vec[7];?></td>
                    <td><?php echo $vec[8];?></td>
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