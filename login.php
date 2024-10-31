<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport"> <!--configura la visualización en dispositivos móviles,
  asegurando que el diseño se adapte al ancho de la pantalla.-->
  <title>Login - Historia Clínica Digital</title>
  <meta name="description" content="">
  <meta name="keywords" content=""><!--Espacios reservados para la descripción y las palabras clave del sitio, 
  útiles para SEO (optimización en motores de búsqueda)-->

  <!-- Favicons --> 
   <!--Establecen el icono que se muestra en la pestaña del navegador y en dispositivos Apple cuando se añade a la pantalla de inicio-->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <!-- Conecta con Google Fonts para cargar las fuentes Roboto, Poppins y Raleway, mejorando la tipografía del sitio -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
   <!--Importa hojas de estilo CSS de librerías externas como Bootstrap, AOS (Animate On Scroll), 
   FontAwesome (íconos), GLightbox (ventanas emergentes), y Swiper (deslizadores)-->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet"> <!--Carga el archivo CSS principal que contiene estilos específicos del sitio-->

</head>

<body class="index-page">

<?php
$email=$_POST['email'];/* Obtiene el valor del campo de entrada usuario del formulario enviado por el método POST.*/
$password=$_POST['password'];/* Obtiene el valor del campo de entrada password del formulario enviado por el método POST.*/

include("conexion.php");/* Incluye el archivo conexion.php, que generalmente contiene el código para conectar a la base de datos. 
Esto permite que el script tenga acceso a la conexión a la base de datos.*/

$consulta=mysqli_query($conexion, "SELECT nombre, apellido, email FROM cuentas WHERE email='$email' AND password='$password'");
/*  Ejecuta una consulta SQL en la base de datos. Busca en la tabla cuentas aquellos registros donde el usuario 
y password coincidan con los valores ingresados por el usuario. El resultado se almacena en la variable $consulta.*/

$resultado=mysqli_num_rows($consulta);/*Cuenta el número de filas devueltas por la consulta. 
Si hay coincidencias (es decir, si el usuario y la contraseña son correctos), el valor será mayor que cero.*/

if($resultado!=0){/*Comienza una estructura condicional que verifica si hay al menos 
	un resultado en la consulta (es decir, si el usuario existe)*/
	$respuesta=mysqli_fetch_array(result: $consulta);
	/* Extrae una fila de resultados de la consulta y la almacena como un array asociativo en $respuesta*/
	
	$_SESSION['nombre']=$respuesta['nombre'];/*Almacena el nombre del usuario en la sesión */
	$_SESSION['apellido']=$respuesta['apellido'];/* Almacena el apellido del usuario en la sesión*/
  
  header('Location: starter-page.html');
  

}else{/* Si no hay resultados (es decir, si las credenciales no coinciden)*/
	echo "No es un usuario registrado";/*Muestra un mensaje indicando que las credenciales no son válidas*/
	include ("form_registro.php");/*Muestra un mensaje indicando que las credenciales no son válidas*/
}

?>

</body>

</html>