<?php
require_once('funciones/mysql.php');
$xmlDoc=new DOMDocument();




//get the q parameter from URL
$q=$_GET["q"];
$sqlSelectImagenes=" SELECT * FROM `usuario` WHERE usernameUsuario LIKE  '%".$q."%'";


$resultSelect=ejecutaSQL($sqlSelectImagenes);
$totalDatosDevueltos=totalFilasConsulta($resultSelect);
$_arrDatos=obtenerDatosConsulta($resultSelect);


     do{

      //echo $_arrDatos['nombreUsuario'];//Titulo
      echo "<a href='http://localhost/proyectoFinalWeb/perfilesUsuarios.php?Usuario=".$_arrDatos['nombreUsuario']."'>".$_arrDatos['nombreUsuario']."</a>"."<br>";//URL


 
      }while ( $_arrDatos = obtenerDatosConsulta($resultSelect));

?>