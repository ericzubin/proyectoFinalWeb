<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
   "http://www.w3.org/TR/html4/strict.dtd">
<HTML>
   <HEAD>
      <TITLE>Inicio de sesión</TITLE>
   </HEAD>
   	<body>
<script>
function realizaProceso(valorCaja1, valorCaja2){
        var parametros = {
                "valorCaja1" : valorCaja1,
                "valorCaja2" : valorCaja2
        };
        $.ajax({
                data:  parametros,
                url:   'ejemplo_ajax_proceso.php',
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
<div >
  <div ></div>

<form id="form1" name="form1"   method="post" action="index.php">
  <div class="form-group">
     <label for="inputUser3" class="">Usuario</label>
      <input type="text" name="usuario" id="usuario"  class=""  placeholder="Usuario"/>
 <br/>

  </div>
  <div class="form-group">
     <label for="inputPassword3" class="" >Contraseña</label>      
<input type="password" class="" id="contrasena" placeholder="Password" name="contrasena">

  </div>
<br>

  </div>
 <br/>
  <div class=""></div>
       <input type="submit" name="Ingresar"  value="Ingresar"  class=""/>
       <input type="button" href="javascript:;" onclick="realizaProceso($('#valor1').val(), $('#valor2').val());retu" value="Ingresar"/>


</form>
 <br/>
 <br/>
 <br/>
  <div class=""></div>
 
 <p class="" >Registrarse<a href="Registarse.php"> aqui</a></p>

</div>

</body>

</HTML>