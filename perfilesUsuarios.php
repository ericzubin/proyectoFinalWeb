<?php 
	require_once('funciones/mysql.php');
	require_once('funciones/sesiones.php'); 
	//validaSesion();

  //  $_idUser=$_SESSION['t01usuario']['idUsuario'];
?> 
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
   "http://www.w3.org/TR/html4/strict.dtd">
<HTML>
   <HEAD>
      <TITLE><?php  $_stringNombreUsuario;?></TITLE>
   </HEAD>
   <BODY>
    <div>
            <a href="salir.php">Cerrar Sesion</a>
      <img src="">
      <form>
      <input type="text" size="30" onkeyup="showResult(this.value)">
      <div id="livesearch"></div> 
      </form>
      <h2><?php  ?></h2>
    </div>
    <h2></h2>
    <img src="">
    <div>

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







