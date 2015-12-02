<?php require_once('funciones/mysql.php'); 

	$_strNombre = $_POST['nombre'];
	$_strEmail =$_POST['email'];
	$_strUsuario = $_POST['usuario'];
	$_strContrasena = md5( $_POST['usuario'] . $_POST['pass'] );
					   					   
	$_strInsertUsuario = "INSERT INTO usuario (nombreUsuario, emailUsuario, usernameUsuario,passwordUsuario) 
	VALUES ('$_strNombre', '$_strEmail', '$_strUsuario', '$_strContrasena');";
	//echo $_strInsertUsuario;				   
	$_intResultadoInsertUsuario = ejecutaSQL ($_strInsertUsuario);

if($_intResultadoInsertUsuario=1)
{
  echo "funciona";
}


?>