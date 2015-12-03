<?php require_once('funciones/mysql.php');
	require_once('funciones/sesiones.php'); 

 ?>
<?php
if ( array_key_exists("Ingresar", $_POST) ) {
			
	if ( isset( $_POST['usuario'] ) && isset( $_POST['contrasena'] ) ) {
		$_strUsuario = $_POST['usuario'];	
		$_strContrasena = md5( $_strUsuario . $_POST['contrasena'] );
		$_strSelectUsuario = "SELECT * FROM usuario WHERE usernameUsuario = '$_strUsuario' AND passwordUsuario = '$_strContrasena' ";
		$_rsConsultaUsuario = ejecutaSQL( $_strSelectUsuario );
		$_arrDatoUsuario = obtenerDatosConsulta ( $_rsConsultaUsuario );
		
		if( $_arrDatoUsuario['usernameUsuario'] ==  $_POST['usuario'] && $_arrDatoUsuario['passwordUsuario'] == $_strContrasena)
		{
			// Iniciamos la sesion
			session_start();
			$_SESSION['fecha_ingreso'] = time();
			$_SESSION['t01usuario'] = $_arrDatoUsuario;
			
			header("Location: paginaPrincipal.php");
		}
		else{
			echo "<center><h3>Usuario y/o Contraseña Incorrecta</h3></center>";
		}
	}

	liberarDatosSelect ( $_rsConsultaUsuario );
}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
   "http://www.w3.org/TR/html4/strict.dtd">
<HTML>
   <HEAD>
      <TITLE>Inicio de sesión</TITLE>
      <link rel="stylesheet" type="text/css" href="css/InicioRegistro.css">
<link href='https://fonts.googleapis.com/css?family=PT+Sans' rel='stylesheet' type='text/css'>
   </HEAD>
   	<body>
		    <img src="img/Logo.jpg" id="logo">

<div id="cuerpoCentral" >

<h1>Inicio de sesion</h1>
<form id="form1" name="form1"   method="post" action="index.php">
  <div class="form-group">
     <label for="inputUser3" class="">Usuario</label>
      <input type="text" name="usuario" id="usuario"  class=""  placeholder="Usuario"/>
 <br/>

  </div>
  <div class="form-group">
     <label for="inputPassword3" class="" >Contraseña</label>      
<input type="password" class="" id="contrasena" placeholder="Password" name="contrasena">

  </div>
<br>


 <br/>

       <input type="submit" name="Ingresar"  value="Ingresar"  class=""/>



</form>
 <br/>

 <p class="" >Registrarse<a href="registro.html"> aqui</a></p>
  </div>


</body>

</HTML>
