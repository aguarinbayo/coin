<?php
include_once('../c_conexion/Conexion.php');


$data= json_decode( $_GET["json"] , true);
foreach ($data as $datas) {
	$dt[]=$datas["value"];
}
$id = $_GET["id"];

$td=serialize($dt);

var_dump($data);

$conx= new ConnectionMySQL();
$conx->CreaConexion();

$ver="SELECT*FROM panel WHERE cod_usuario='$id'";

$validator=$conx->ExecuteQuery($ver);


if($validator->num_rows > 0){


	$query="UPDATE panel SET monedas='$td' WHERE cod_usuario='$id'";
	$result = $conx->ExecuteQuery($query);

	$conx->CerrarConexion();
echo "<script type='text/javascript'>
  window.location='../../coin/panel/panel.php';
</script>";

}else{
	$query="INSERT INTO panel VALUES(NULL,'".$td."','".$id."')";
	$result = $conx->ExecuteQuery($query);

	$conx->CerrarConexion();
echo "<script type='text/javascript'>
  window.location='../../coin/panel/panel.php';
</script>";

}
	
?>