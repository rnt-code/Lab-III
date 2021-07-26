<?php 
    include("conexion.php");

    $empadmin = $_POST["emp_administradora"];
    $servluz = 0;
    $servgas = 0;
    $servagua = 0;
    $servcloac = 0;

    //traigo el id_venta
    $sql = "SELECT MAX(id_venta) AS id FROM venta";
    //echo"<br>".$sql2;
    $res = mysqli_query($conexion, $sql);
    $vec = mysqli_fetch_array($res);
    if($vec) {
        $idventa = $vec[0]; //id_venta
        //echo"<br>id_venta: ".$idventa;
    }
    //traigo id_inmueble y el pvi de la última venta
    $sql1 = "SELECT id_inmueble, precioventa FROM venta WHERE id_venta=$idventa";
    $res1 = mysqli_query($conexion, $sql1);
    $vec1 = mysqli_fetch_array($res1);
    if($vec1) {
        $idinmu = $vec1[0]; //id_inmueble
        $pvi = $vec1[1]; //precio de venta inicial (pvi)
        //echo"<br>precio de venta inicial: ".$pvi;
    }
    //---------------------------------------------------------------//

    //Calculo el precio final (pvf)
    $pvf = $pvi;
    //comisión
    $comision = $pvf*0.1;

    $sql1 = "UPDATE venta SET comision=$comision WHERE id_venta=$idventa";
    $res1 = mysqli_query($conexion, $sql1);

    if($res1) {
        echo"<br>Registro de comisión exitoso";
        //header("Refresh: 3; url=index.php");
    }
    else {
        echo"<br>Registro de comisión falló";
        
    }
    //------------------------------------//

    $sql = "INSERT INTO inmueble (empadministradora, serv_luz, serv_gas, serv_agua, serv_cloaca) 
    VALUES ('$empadmin', $servluz, $servgas, $servagua, $servcloac)";
    
    $res = mysqli_query($conexion, $sql);

    if($res) {
        echo"<br>Registro de venta exitoso";
        //header("Refresh: 3; url=index.html");
        echo"<br>Precio de venta final: ".$pvf;
    }
    else {
        echo"<br>Registro de venta falló";
    }
?>
<p><a href="index.html">Menú</a></p>