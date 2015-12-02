<?php
require_once('funciones/mysql.php');
$xmlDoc=new DOMDocument();




//get the q parameter from URL
$q=$_GET["q"];
 
$sqlSelectImagenes="SELECT * from usuario WHERE 'usernameUsuario' LIKE '".$q."'";

$resultSelect=ejecutaSQL($sqlSelectImagenes);
$totalDatosDevueltos=totalFilasConsulta($resultSelect);
$_arrDatos=obtenerDatosConsulta($resultSelect);
    echo $_arrDatos['nombreUsuario'];//Titulo
    echo "http://localhost/proyectoFinalWeb/perfilesUsuarios.php?Usuario=".$_arrDatos['nombreUsuario'];//URL

?>