
<script type="text/javascript" src="jquery-3.1.1.min.js"></script>
<script type="text/javascript">

$(document).ready(function(){

    $("#submit").click(function(){
        var data= $('#form').serialize();
       
  $.post( "validar.php",data,function( datas ){
    $("#cargaexterna").html(datas);
  });
        });
      });
</script>


   <?php 

   $wsdl ='http://www.webservicex.net/country.asmx?WSDL';
 
      $soap = new SoapClient($wsdl);
      $data =$soap->GetCountries();





$DOM = new DOMDocument();
@$DOM->loadHTML("$data->GetCountriesResult");
  
     
$Header = $DOM->getElementsByTagName('name');



//#Get header name of the table
foreach($Header as $NodeHeader) 
{

        $aDataTableHeaderHTML[] = $NodeHeader->textContent;
}
  

?>


      <form action="" method="POST" id="form">

        <div>
        <input type="text" name="nombre" placeholder="nombre">
        </div>
        <div>
        <input type="text" name="apellido" placeholder="apellido">
        </div>
        <div>
        <input type="email" name="correo" placeholder="correo">
        </div>
        <div>
        <input type="number" name="tel" placeholder="telefono">
        </div>
        <div>
        <input type="number" name="identificacion" placeholder="Cedula">
        </div>
		 <div>
        <input type="text" name="tarjeta" placeholder="Tarjeta de credito">
        </div>
		
		<div>
          <select name="pais" id="ciudad">
              <?php 
		
             for($i=0;$i<count($aDataTableHeaderHTML);$i++):
             
               
               echo "<option value=".$aDataTableHeaderHTML[$i].">".$aDataTableHeaderHTML[$i]." </option>" ;
               

              endfor;
?>
          </select>
        </div>
        <div>
        <input type="password" name="pass" placeholder="password">
        </div>
        <div>
        <input type="password" name="repass" placeholder="Repetir contrase;a">
        </div>
       
        
      </form>
      <button id="submit"> enviar</button>
			<div id="cargaexterna">
			
			</div>
<style type="text/css">
   .cargar img,.cargar2 img{
      width: 100%;
    max-width: 50px;
    float: left;
    margin-left: 38%;
   }
</style>

