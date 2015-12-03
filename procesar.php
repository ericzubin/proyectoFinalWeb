<?php 


	require_once('funciones/mysql.php');
	require_once('funciones/sesiones.php'); 
	//validaSesion();

	$_idUser =$_SESSION['t01usuario']['idusuario'];
$_stringNombre= $_SESSION['t01usuario']['nombreUsuario'];  

?> 
    
 <p class="" ><a href="formularioSubirImagen.php">Atras</></p>

<?php

//$_stringUser=$_SESSION['t01usuario']['username'];
$temp = $_FILES['foto']['tmp_name']; // tmp name (no se puede cambiar el nombre nos devuelve la ubicación temporal del archivo. 
$name = $_FILES['foto']['name']; // nombre original del archivo 
$tamanoBytes = $_FILES['foto']['size']; // En bytes 
$tipoFile = $_FILES['foto']['type'];
// VALIDAR PESO DEL ARCHIVO. LIMITAR SUBIDA POR PESO 
// LIMITAMOS A 300KB 
//echo $tipoFile;

$porciones = explode("/", $tipoFile);



// VALOR ALEATORIO CON EL QUE SE ALMACENARÁ EL ARCHIVO 
$str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890"; 
$cad = ""; 
// 18 ES EL LARGO DEL STRING RANDOM, ESTE SERÁ EL TAMAÑO DEL NOMBRE DEL ARCHIVO 
for($i=0;$i<18;$i++) { 
$cad .= substr($str,rand(0,62),1); 
}

// REEMPLAZAR EN CASO DE NOMBRE COMPUESTOS LOS ESPACIOS POR GUIÓN BAJO 
//$alea1 = str_replace(" ","_",$alea1);

$alea1 = $cad.".".$porciones[1]; 
//echo "Alea: " .$alea1 ."<br/>";

//copy($temp,$alea1); 


// AHORA GUARDAMOS EL ARCHVO EN UNA BASE DE DATOS.
//Usuarios_idUsuarios
//$_idUser
//$_stringNombre=$_POST['nombreArchivo'];
//echo $_stringSQL;


		//Insertar Imagen 
	//$_stringSQL="INSERT INTO `imagenes`(`idImagenes`, `nombreImagenes`, `idNegocio`) VALUES (null,'$alea1',$_idUser)";
  $_stringSQL="INSERT INTO `archivo`(`idArchivo`, `NombreArchivo`, `idUsuario`,`tipoIMagen`) VALUES (null,'$alea1',$_idUser,'$porciones[0]')";
	$result = ejecutaSQL($_stringSQL);

// Imagen:     image

// Podemos recuperar el último id guardado mediante 
//echo "MYSQL: " .mysql_insert_id($con);

// Indicamos el directorio donde se guardará el archivo 
$dir="img/imagenesUsuarios";


move_uploaded_file ($temp,"$dir/$alea1");
echo "<img src=\"$dir/$alea1\" alt=\"Fotografia de la noticia.\" name=\"fotoNoticia\" align=\"middle\" width=\"400\" height=\"200\" />";


?> 



