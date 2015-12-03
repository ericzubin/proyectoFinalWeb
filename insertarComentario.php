<?php require_once('funciones/mysql.php'); 

	$_comentario= $_POST['comentario'];
	$_usuario =$_POST['usuario'];
	$_idImagen = $_POST['idImagen'];

			    $_strSelectUsuarioFotos = "SELECT idUsuario FROM usuario WHERE nombreUsuario = '$_usuario'";
    $_rsConsultaUsuario = ejecutaSQL( $_strSelectUsuarioFotos );
    $_arrDatoUsuario = obtenerDatosConsulta ( $_rsConsultaUsuario );


echo "ID ".$_arrDatoUsuario[idUsuario];

	$_strInsertUsuario = "INSERT INTO comentario VALUES(null,'$_comentario',".$_arrDatoUsuario[idUsuario].",$_idImagen) ";
	//echo $_strInsertUsuario;				   
	$_intResultadoInsertUsuario = ejecutaSQL ($_strInsertUsuario);

if($_intResultadoInsertUsuario=1)
{
  echo "funciona";
}


?>