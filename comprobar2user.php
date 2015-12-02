<?php 


	require_once('funciones/mysql.php');

	
?> 
    
<?php
$_stringUsuario=$_POST['b'];
$_sql="SELECT * FROM usuario WHERE usernameUsuario = '".$_stringUsuario."'";

$_stringResultado=ejecutaSQl($_sql);
$_intCantidad=totalFilasConsulta($_stringResultado);
if($_intCantidad==1)
{
	echo "1";
}
else
{
	echo "2";
}



?>