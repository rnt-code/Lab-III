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
        <title>alta departamento</title>
    </head>
    <body>
        <?php
            include("conexion.php");
            $sql = "SELECT * FROM propietario";
            $res = mysqli_query($conexion, $sql);
        ?>
        <header>
            <h1>Alta departamento</h1>
        </header>
        <main>
            <form method="post" action="registrar_alta_departamento.php">
                <table>
                    <tr>
                        <td><label for="emp_administradora">Empresa administradora: </label></td>
                        <td><input type="text" name="emp_administradora" id="emp_administradora"></td>
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