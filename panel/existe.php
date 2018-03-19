<div class="col-md-12">
	<div class="row">
		<?php 

			$id=2;
			$conx= new ConnectionMySQL();
			$conx->CreaConexion();

			$ver="SELECT*FROM panel WHERE cod_usuario='$id'";
			$validator=$conx->ExecuteQuery($ver);

			while ($row = $validator->fetch_assoc()){

				?>
					<div class="col-md-12">
	<div class="row">
		<div class="col-md-6">
			<h1>Monedas</h1>
	
		</div>	
		<div class="col-md-6">
			<a href="nuevo.php"><button>nueva moneda</button></a>
		</div>
<form id="form" class="col-md-12">
		
<div class="row">

<?php
$array = unserialize($row['monedas']);

for($i=0;$i<count($array);$i++){
	$data[$i] = json_decode( file_get_contents('https://api.hitbtc.com/api/2/public/currency/'.$array[$i]), true );
?>
<a href="info.php?info=<?php echo $data[$i]["id"] ?>" class="col-md-4 <?php echo $data[$i]["id"] ?> pagina">

	<div class="row">

				<div class="col-md-10">
					<div class="row">
						
					<input type="hidden" name="<?php echo $data[$i]["fullName"] ?>" value="<?php echo $data[$i]["id"] ?>">
					<div class="col-md-12"><?php echo $data[$i]["fullName"] ?></div>
					<div class="col-md-12"><?php echo $data[$i]["payoutFee"] ?></div>
				</div>

			</div>
				<div class="col-md-2">
					<div class="row">
						<button id="<?php echo $data[$i]["id"] ?>" class="eliminar col-md-12">x</button>
					</div>
					
				</div>
		
	</div>

</a>
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

				<?php
			}
		?>
	</div>
</div>

<script type="text/javascript">
	

	$(".eliminar").click(function(){

		var id= $(this).attr("id");
		$("."+id).remove();
	});
</script>