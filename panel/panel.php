

<?php include_once("../c_conexion/Conexion.php"); ?>

<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript" src="../jquery-3.1.1.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<title></title>
</head>
<body>
	<div class="container">
		<div class="row">
<?php
$conx= new ConnectionMySQL();
$conx->CreaConexion();

$ver="SELECT usuario.idusuario, panel.cod_usuario FROM usuario JOIN panel ON usuario.idusuario=panel.cod_usuario WHERE panel.cod_usuario=2";
$validator=$conx->ExecuteQuery($ver);

if($validator->num_rows > 0){

echo "exite";
}else{
	include_once("nuevo.php");
}
?>
</div>
	</div>
</body>
</html>

