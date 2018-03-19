<?php
$dato=$_GET['info'];

$info= json_decode( file_get_contents('https://api.hitbtc.com/api/2/public/symbol', true ));

var_dump(file_get_contents($info));
?>