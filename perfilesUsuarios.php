<?php 
	require_once('funciones/mysql.php');
	require_once('funciones/sesiones.php'); 
	//validaSesion();
$_intId =$_SESSION['t01usuario']['idusuario'];
$_stringNombre= $_SESSION['t01usuario']['nombreUsuario'];  
  $user=$_GET['Usuario'];
  //  $_idUser=$_SESSION['t01usuario']['idUsuario'];
?> 
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
   "http://www.w3.org/TR/html4/strict.dtd">
<HTML>
   <HEAD>
      <TITLE><?php  $_stringNombreUsuario;?></TITLE>
   </HEAD>
               <link rel="stylesheet" type="text/css" href="css/plantillaPaginaWeb.css">
                   <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script>
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
  <h2 id="UsuarioPerfil">Perfil del usuario: <?php echo $user;?> </h2>
<div id="links">
    <?php

    $_strSelectUsuarioFotos = "  SELECT * FROM `archivo` WHERE idUsuario IN (SELECT idUsuario FROM `usuario` WHERE usernameUsuario ="."'"."$user"."')";
$_rsConsultaUsuario = ejecutaSQL( $_strSelectUsuarioFotos );
    $_arrDatoUsuario = obtenerDatosConsulta ( $_rsConsultaUsuario );
    //SELECT comentario FROM comentario WHERE idImegen=17;
    $_intPosicion=1;
      do{
//video    y   image
if($_arrDatoUsuario['tipoIMagen']=="image")
{
  

     echo "<div id='elemento'><a href="."'img/imagenesUsuarios/".$_arrDatoUsuario['NombreArchivo']."''>".
        "<img src="."'img/imagenesUsuarios/".$_arrDatoUsuario['NombreArchivo'] . "' id='elementoGrafico' >
    </a></div>";
      $_strSelectComentarios = "SELECT comentario FROM comentario WHERE idImegen=".$_arrDatoUsuario['idArchivo'].""; 

    $_rsConsultaComentario = ejecutaSQL( $_strSelectComentarios );
    $_arrDatoComentario = obtenerDatosConsulta ( $_rsConsultaComentario );
    do{
      echo " <p>Comentario:". $_arrDatoComentario['comentario']."</p>";

    }while ( $_arrDatoComentario = obtenerDatosConsulta($_rsConsultaComentario ));
     echo "  <input type='hidden' name='id_user".$_intPosicion."' id='id_user".$_intPosicion."' value='".$_stringNombre ."'>";
       echo "  <input type='hidden' name='id_imagen'".$_intPosicion." id='id_imagen".$_intPosicion."' value='".$_arrDatoUsuario['idArchivo'] ."'>";
  

      echo "<input type='text' name='comentario' id='comentario".$_intPosicion."' placeholder='comentario'><br> <button name='registro' onclick='realizaProceso(".$_intPosicion.")'>Comentar </button>";
          $_intPosicion++;
}
if($_arrDatoUsuario['tipoIMagen']=="video"){
  echo "<div id='elemento'><video  id='elementoGrafico1' controls>
  <source src='img/imagenesUsuarios/".$_arrDatoUsuario['NombreArchivo']."' type='video/mp4'>
</video></div>";

  echo "  <input type='hidden' name='id_user".$_intPosicion."' id='id_user".$_intPosicion."' value='".$_stringNombre ."'>";
       echo "  <input type='hidden' name='id_imagen'".$_intPosicion." id='id_imagen".$_intPosicion."' value='".$_arrDatoUsuario['idArchivo'] ."'>";
  

      echo "<input type='text' name='comentario' id='comentario".$_intPosicion."' placeholder='comentario'><br> <button name='registro' onclick='realizaProceso(".$_intPosicion.")'>Comentar </button>";
            $_strSelectComentarios = "SELECT comentario FROM comentario WHERE idImegen=".$_arrDatoUsuario['idArchivo'].""; 

    $_rsConsultaComentario = ejecutaSQL( $_strSelectComentarios );
    $_arrDatoComentario = obtenerDatosConsulta ( $_rsConsultaComentario );
    do{
      echo " <p>Comentario:". $_arrDatoComentario['comentario']."</p>";

    }while ( $_arrDatoComentario = obtenerDatosConsulta($_rsConsultaComentario ));
      $_intPosicion++;
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

function realizaProceso(intPosition){
                                 console.log(document.getElementById('comentario'+intPosition).value);
                               console.log(document.getElementById('id_user'+intPosition).value);
                                  console.log(document.getElementById('id_imagen'+intPosition).value);
        var parametros = {

                "comentario" : document.getElementById('comentario'+intPosition).value,
                "usuario" : document.getElementById('id_user'+intPosition).value,
                "idImagen" : document.getElementById('id_imagen'+intPosition).value
                
                
                
        };
        $.ajax({
                data:  parametros,
                url:   'insertarComentario.php',
                type:  'post',
                beforeSend: function () {
                        $("#resultado").html("Procesando, espere por favor...");

                },
                success:  function (response) {
                        $("#resultado").html(response);

                }
        });
}
</script>  
   </BODY>
</HTML>


