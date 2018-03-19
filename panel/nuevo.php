	<script type="text/javascript" src="../jquery-3.1.1.min.js"></script>

>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<script type="text/javascript">
$(document).ready(function(){

    $("#submit").click(function(){
        var data= $('#form').serializeArray();



$.ajax({
  type : "GET",
  url : "actualizar.php",
  data :{json:JSON.stringify(data),id:2},
  success : function( data ){
  console.log(data);
  // window.location='../../coin/panel/panel.php';
  }
});

});

});



</script>

<div class="row">
	<div class="col-md-12">
			<h1>Agregar monedas</h1>
	</div>
	<div class="col-md-12">
			<p>Seleccione las monedas con las que quiere trabajar</p>
	</div>

</div>
<from class="row" id="from">
	

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

</from>

<div class="row">
	<div class="col-md-12">
		<button id="submit">Guardar</button>
	</div>
</div>