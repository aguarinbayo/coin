<script type="text/javascript">
$(document).ready(function(){

    $("#submit").click(function(){
        var data= $('#form').serializeArray();



$.ajax({
  type : "GET",
  url : "actualizar.php",
  data :{json:JSON.stringify(data),id:2},
  success : function( data ){
   window.location='../coin/panel/panel.php';
  }
});

});

});



</script>

<div class="col-md-12">
	<div class="row">
		<div class="col-md-12">
			<h1>Monedas recomendadas</h1>
	
		</div>	
<form id="form" class="col-md-12">
		<div class="row">
<?php
$array = array("BTC","XRP","ETH","LTC","XMR","DASH");

for($i=0;$i<count($array);$i++){
	$data[$i] = json_decode( file_get_contents('https://api.hitbtc.com/api/2/public/currency/'.$array[$i]), true );
?>
<div class="col-md-4 <?php echo $data[$i]["id"] ?>" >
	<div class="row">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-6">
					<input type="hidden" name="<?php echo $data[$i]["fullName"] ?>" value="<?php echo $data[$i]["id"] ?>">
				<?php echo $data[$i]["fullName"] ?>	
				</div>
				<div class="col-md-6">
					<button id="<?php echo $data[$i]["id"] ?>" class="eliminar">eliminar</button>
				</div>
			</div>
			
		</div>
	</div>
</div>

<?php
}
?>
</div>
</form>
<div class="col-md-12">	
	<button id="submit">Guardar</button>	
</div>

	</div>
</div>

<script type="text/javascript">
	

	$(".eliminar").click(function(){

		var id= $(this).attr("id");
		$("."+id).remove();
	});
</script>
