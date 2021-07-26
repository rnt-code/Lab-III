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
		<title>alta venta</title>
	</head>
	<body>
		<?php
			include("conexion.php");
			$sql = "SELECT * FROM comprador";
			$resultado = mysqli_query($conexion, $sql);

			$sql2 = "SELECT * FROM inmueble";
			$resultado2 = mysqli_query($conexion, $sql2);
		?>
		<header>
			<h1>Registrar venta (punto 1)</h1>
		</header>
		<main>
			<form method="post" action="registrar_venta.php">
				<table>
					<tr>
						<td><label for="id_comprador">ID Comprador-nombre: </label></td>
						<td>
							<select name="id_comprador" id="id_comprador">
								<?php
									while($vec = mysqli_fetch_array($resultado)) {
									?>
									<option value="<?php echo $vec[0];?>"><?php echo $vec[0]."-".$vec[1];?></option>
									<?php
									}
								?>
							</select>
						</td>
					</tr>
					<tr>
						<td><label for="id_inmueble">ID Inmueble-tipo-precio solic.: </label></td>
						<td>
							<select name="id_inmueble" id="id_inmueble">
								<?php
									while($veci = mysqli_fetch_array($resultado2)) {
									?>
									<option value="<?php echo $veci[0];?>"><?php echo $veci[0]."-".$veci[2]."-".$veci[11];?></option>
									<?php
									}
								?>
							</select>
						</td>
					</tr>
					<tr>
						<td><label for="precio_venta">Precio venta: </label></td>
						<td><input type="text" name="precio_venta" id="precio_venta" required></td>
					</tr>
					<tr>
						<td><label for="fecha">Fecha: </label></td>
						<td><input type="date" name="fecha" id="fecha" required></td>
					</tr>
					<tr>
						<td><input type="submit" name="enviar" id="enviar" value="Enviar"></td>
					</tr>
				</table>
			</form>
		</main>
		<footer>
			<p><a href="index.html">Menú</a></p>
		</footer>
	</body>
</html>