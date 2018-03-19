<?php

include_once('Conexion.php');

$archivo =unserialize($_GET['dato']);
$conx= new ConnectionMySQL();
$conx->CreaConexion();

$correo=$archivo['correo'];
$ver="SELECT*FROM usuario WHERE correo='$correo'";

$validator=$conx->ExecuteQuery($ver);

if($validator->num_rows > 0){
	echo "ya esta registrado";
}else{
$query="INSERT INTO usuario VALUES(NULL,'".$archivo['nombre']."','".$archivo['apellido']."','".$archivo['correo']."','".$archivo['telefono']."','".$archivo['identificacion']."','".$archivo['tarjeta']."','".$archivo['password']."','".$archivo['Pais']."','".$archivo['nombre_Pais']."','".$archivo['nombre_moneda']."','".$archivo['codigo_moneda']."','".$archivo['code_tel']."')";



$result = $conx->ExecuteQuery($query);

$conx->CerrarConexion();
echo "<script type='text/javascript'>
  window.location='../../coin/panel/panel.php';
</script>";

}


?>