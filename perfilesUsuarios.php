<?php 
	require_once('funciones/mysql.php');
	require_once('funciones/sesiones.php'); 
	validaSesion();

    $_idUser=$_SESSION['t01usuario']['idUsuario'];
	$_stringNombreUsuario=$_GET['Usuario'];
?> 
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
   "http://www.w3.org/TR/html4/strict.dtd">
<HTML>
   <HEAD>
      <TITLE><?php  $_stringNombreUsuario;?></TITLE>
   </HEAD>
   <BODY>
      <div>
      <img src="">
      <input id="labelBusqueda">
      <h2><?php  ?></h2>
    </div>
   </BODY>
</HTML>