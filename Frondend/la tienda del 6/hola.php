<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servidor = "localhost";
$usuario = "root";
$clave = "";
$baseDeDatos = "latiendadelseis";

$enlace = mysqli_connect($servidor, $usuario, $clave, $baseDeDatos);

if(!$enlace){
    die("Error en la conexión: " . mysqli_connect_error());
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Regístrate | La Tienda del 6</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <link rel="stylesheet" href="css/login.css">
</head>
<body class="login-page">

  <!-- Contenido de tu HTML igual -->
  <section class="login-section">
    <div class="login-container">
      <div class="login-box">
        <h2>Regístrate</h2>

        <form action="#" method="post">
          <label for="name">Nombre*</label>
          <input type="text" id="name" name="name" required>

          <label for="email">Correo electrónico*</label>
          <input type="email" id="email" name="email" required>

          <label for="password">Contraseña*</label>
          <input type="password" id="password" name="password" required>

          <button type="submit" class="btn" name="registrar">REGÍSTRATE</button>
        </form>
      </div>
    </div>
  </section>

</body>
</html>

<?php
if(isset($_POST['registrar'])){
    $NombreCom = $_POST['name'];
    $Correo = $_POST['email'];
    $Password = $_POST['password'];

    $insertarDatos = "INSERT INTO usuario (nombre, correo, password)
                      VALUES ('$NombreCom', '$Correo', '$Password')";

    $ejecutarInsertar = mysqli_query($enlace, $insertarDatos);

    if($ejecutarInsertar){
        echo "<script>alert('Registro exitoso');</script>";
    } else {
        echo "Error al registrar: " . mysqli_error($enlace);
    }
}
?>