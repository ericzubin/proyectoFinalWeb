<?php 
	//require_once('funciones/mysql.php');
	//require_once('funciones/sesiones.php'); 
	//validaSesion();

    $_idUser=$_SESSION['t01usuario']['idUsuario'];
	$_stringNombreUsuario=$$_GET['Usuario'];
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
      <a href="salir.php">Cerrar Sesion</a>
    </div>
    <form action="procesar.php" method="post" enctype="multipart/form-data" id="form1" name="form1">
<p>
	Archivo 
<input type="file" name="foto" id="textfield" >
</p> 
<p> 
<input type="submit" name="button" id="button" value="Enviar" >
</p>
</form>
   </BODY>
</HTML>