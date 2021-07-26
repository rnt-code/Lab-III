<?php

function Edad($fecha) {
	list($Ynac,$mnac,$dnac) = explode("-",$fecha);

	echo"<br>Año: ".$Ynac;
	echo"<br>Mes: ".$mnac;
	echo"<br>Día: ".$dnac;

	
	echo"<br>Mes y día de cumple: ".$mnac.$dnac;
	echo"<br>Mes y día de hoy: ".date("md");
	/*
	echo"<br>date('md'): ".date("md");
	echo"<br>date('Y'): ".date("Y");
	echo"<br>date('Y-1'): ".date("Y")-$Y-1;
	echo"<br>date('Y-1'): ".date("Y")-$Y; 
	*/

	if(date("md") < $mnac.$dnac) {
		echo"<br>Ya cumplió años";
	}
	else {
		echo"<br>No cumplió años aún";
	}

	//return( date("md") < $m.$d ? date("Y")-$Y-1 : date("Y")-$Y );
}

$fecha_nac=$_POST["fnac"];

echo"<br>Edad= ".Edad($fecha_nac);

echo"<br>Hoy: ".date("Ymd");

?>
