
<div class="row">
	<div class="col-md-12">
			<h1>Agregar monedas</h1>
	</div>
	<div class="col-md-12">
			<p>Seleccione las monedas con las que quiere trabajar</p>
	</div>

</div>
<div class="row">
	

<?php
$data = json_decode( file_get_contents('https://api.hitbtc.com/api/2/public/currency'), true );
for($i=0;$i<count($data);$i++):
	if($data[$i]["fullName"])
?>

<div class="col-md-3">
<input type="checkbox" id="" name="<?php echo $data[$i]["fullName"]; ?>" value="<?php echo $data[$i]["id"]; ?>"><label><?php echo($data[$i]["fullName"]) ?>(<?php echo($data[$i]["id"]) ?>)</label>
</div>

<?php
endfor;
?>

</div>