<?php 


	require_once('funciones/mysql.php');
	require_once('funciones/sesiones.php'); 
	//validaSesion();

    $_idUser=$_SESSION['t01usuario']['idUsuarios'];
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
echo $porciones[0]."<br>"; // porción1
echo $porciones[1]; // porción2





?> 



