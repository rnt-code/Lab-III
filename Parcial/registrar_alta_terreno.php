<?php 
    include("conexion.php");

    if(isset($_POST["serv_luz"])) {
        $servluz = $_POST["serv_luz"];
    }
    else {
        $servluz = 0;
    }
    if(isset($_POST["serv_gas"])) {
        $servgas = $_POST["serv_gas"];
    }
    else {
        $servgas = 0;
    }
    if(isset($_POST["serv_agua"])) {
        $servagua = $_POST["serv_agua"];
    }
    else {
        $servagua = 0;
    }
    if(isset($_POST["serv_cloaca"])) {
        $servcloac = $_POST["serv_cloaca"];
    }
    else {
        $servcloac = 0;
    }

    /*
    echo"<br>serv luz: ".$servluz;
    echo"<br>serv gas: ".$servgas;
    echo"<br>serv agua: ".$servagua;
    echo"<br>serv cloaca: ".$servcloac;
    */

    $totserv = $servluz + $servgas + $servagua + $servcloac;
    //echo"<br>tot serv: ".$totserv;

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

    if($totserv == 4) {
        //todos los servicio
        $pvf = $pvi;
    }
    else {
        if($totserv == 3) {
            //un servicio menos, descuento del 2%
            $pvf = $pvi*0.98;
        }
        else {
            if($totserv == 2) {
                //dos servicio menos, descuento del 4% 
                $pvf = $pvi*0.96;
            }
            else {
                if($totserv == 1) {
                    //tres servicio menos, descuento del 6%
                    $pvf = $pvi*0.94;
                }
                else {
                    if($totserv == 0) {
                        //cuatro servicios menos, descuento del 8% 
                        $pvf = $pvi*0.92;
                    }
                }
            }
        }
    }
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

    $sql = "INSERT INTO inmueble (serv_luz, serv_gas, serv_agua, serv_cloaca) 
    VALUES ($servluz, $servgas, $servagua, $servcloac)";

    $res = mysqli_query($conexion, $sql);

    if($res) {
        echo"<br>Registro de venta exitoso";
        //header("Refresh: 3; url=index.php");
        echo"<br>Precio de venta final: ".$pvf;
    }
    else {
        echo"<br>Registro de venta falló";
        
    }
?>
<p><a href="index.html">Menú</a></p>