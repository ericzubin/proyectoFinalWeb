<?php 
	require_once('funciones/mysql.php');
	require_once('funciones/sesiones.php'); 
	//validaSesion();
$_intId =$_SESSION['t01usuario']['idusuario'];
$_stringNombre= $_SESSION['t01usuario']['nombreUsuario'];  

  //  $_idUser=$_SESSION['t01usuario']['idUsuario'];
?> 
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
   "http://www.w3.org/TR/html4/strict.dtd">
<HTML>
   <HEAD>
      <TITLE>Pagina PrincipalL</TITLE>
            <link rel="stylesheet" type="text/css" href="css/plantillaPaginaWeb.css">
   </HEAD>
   <BODY>
    <div id="barraSuperior">
            <a href="salir.php">Cerrar Sesion</a>
           <h2 id="usuario"><a href="perfilPropio.php">Usuario: <?php  echo $_stringNombre; ?> </a> </h2>   
      <form id="Busqueda">
      <input type="text" size="30" onkeyup="showResult(this.value)">
      <div id="livesearch"></div> 
      </form>
      <br>
      <br>
    <a href="paginaPrincipal.php"> <img src="img/Logo.jpg" id="logo"></a>

   
    </div>
<div id="Centro">
  
<div id="links">
    <?php
    $_strSelectUsuarioFotos = "SELECT * FROM archivo"; 
    $_rsConsultaUsuario = ejecutaSQL( $_strSelectUsuarioFotos );
    $_arrDatoUsuario = obtenerDatosConsulta ( $_rsConsultaUsuario );
      do{
//video    y   image
if($_arrDatoUsuario['tipoIMagen']=="image")
{

     echo "<div id='elemento'><a href="."'img/imagenesUsuarios/".$_arrDatoUsuario['NombreArchivo']."''>".
        "<img src="."'img/imagenesUsuarios/".$_arrDatoUsuario['NombreArchivo'] . "' id='elementoGrafico' >
    </a></div>";
      
}
if($_arrDatoUsuario['tipoIMagen']=="video"){
  echo "<div id='elemento'><video  id='elementoGrafico1' controls>
  <source src='img/imagenesUsuarios/".$_arrDatoUsuario['NombreArchivo']."' type='video/mp4'>
</video></div>";
}
 
 
      }while ( $_arrDatoUsuario = obtenerDatosConsulta($_rsConsultaUsuario ));
        /*
foreach ($_arrDatoUsuario as $_datosUsuarios => $valor) {
                    echo "CLAVE $_datosUsuarios  VALOR $valor";

            }        
*/

 
          


 ?>
 </div>
  </div>

    
    
    <script>
      //Busqueda mientras va tecleando
function showResult(str) {
  if (str.length==0) { 
    document.getElementById("livesearch").innerHTML="";
    document.getElementById("livesearch").style.border="0px";
    return;
  }
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("livesearch").innerHTML=xmlhttp.responseText;
      document.getElementById("livesearch").style.border="1px solid #A5ACB2";
    }
  }
  xmlhttp.open("GET","livesearch.php?q="+str,true);
  xmlhttp.send();
}
</script>  
   </BODY>
</HTML>