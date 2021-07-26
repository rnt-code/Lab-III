<?php
    include("conexion.php");

    $supconst = $_POST["superf_construida"];
    //echo"<br>Superf const: ".$supconst;

    $empadmin = "";
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

    //traigo la suptotal para ese id_inmueble
    $sql2 = "SELECT suptotal FROM inmueble WHERE id_inmueble=$idinmu";
    $res2 = mysqli_query($conexion, $sql2);
    $vec2 = mysqli_fetch_array($res2);
    if($vec2) {
        $suptot = $vec2[0]; //superficie total
        //echo"<br>Sup total: ".$suptot;
    }

    //Calculo el precio final (pvf)
    if($supconst < $suptot*0.6) {
        $pvf = $pvi*0.95;
    }
    else {
        $pvf = $pvi;
    }
    //echo"<br>precio venta final: ".$pvf;
    //comisión
    $comision = $pvf*0.1;
    //echo"<br>comisión: ".$comision;

    $sql1 = "UPDATE venta SET comision=$comision WHERE id_venta=$idventa";
    $res1 = mysqli_query($conexion, $sql1);

    if($res1) {
        echo"<br>Registro de comisión exitoso";
        //header("Refresh: 3; url=index.php");
    }
    else {
        echo"<br>Registro de comisión falló";
        
    }

    $sql = "INSERT INTO inmueble (supconstruida, empadministradora, serv_luz, serv_gas, serv_agua, serv_cloaca) 
    VALUES ($supconst, '$empadmin', $servluz, $servgas, $servagua, $servcloac)";
    //echo("<br>".$sql);

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