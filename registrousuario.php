<?php
include 'conexion.php';
$link = conectar();

$identificacion_usuario = $_REQUEST['idusuario'];
$nombre_usuario = $_REQUEST['nombre'];
$apellido_usuario = $_REQUEST['apellido'];
$correo_usuario = $_REQUEST['correo'];
$telefono_usuario = $_REQUEST['telefono'];
$tarjetacredito_usuario = $_REQUEST['tcredito'];
$ciudad_usuario = $_REQUEST['ciudad'];
$moneda_usuario = $_REQUEST['moneda'];
$password = $_REQUEST['password'];

$sql = 'INSERT INTO `usuario`
        (`idusuario`,`nombre`,`apellido`,`correo`,`telefono`,`tcredito`, `ciudad_idciudad`, `moneda_idmoneda`)

VALUES ("'.$identificacion_usuario.'",
        "'.$nombre_usuario.'",
        "'.$apellido_usuario.'",
        "'.$correo_usuario.'",
        "'.$telefono_usuario.'",
        "'.$tarjetacredito_usuario.'",
        "'.$ciudad_usuario.'",
        "'.$moneda_usuario.'")';

$result = mysqli_query($link,$sql) or die ("ERROR en la Consulta $sql".mysqli_error($link));

$sql = 'INSERT INTO `ciudad`
        (`cod_ciudad`,`nombre`)

VALUES ("'.$ciudad_usuario.'","'.$ciudad_usuario.'")';
$result = mysqli_query($link,$sql) or die ("ERROR en la Consulta $sql".mysqli_error($link));

$sql = 'INSERT INTO `moneda`
        (`cod_moneda`,`nombre`)

VALUES ("'.$moneda_usuario.'","'.$moneda_usuario.'")';
$result = mysqli_query($link,$sql) or die ("ERROR en la Consulta $sql".mysqli_error($link));

$sql = 'INSERT INTO `login`
        (`correo_ingreso`, `password`, `usuario_identificacion`)

VALUES ("'.$correo_usuario.'","'.$password.'","'.$identificacion_usuario.'")';
$result = mysqli_query($link,$sql) or die ("ERROR en la Consulta $sql".mysqli_error($link));

echo "<script type='text/javascript'>
  alert('Usuario ingresado con exito al sistema al sistema');
  window.location='crearusuario.php';
</script>";

 ?>
