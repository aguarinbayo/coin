<?php


$var_pais=$_POST['pais'];
$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$correo=$_POST['correo'];
$tel=$_POST['tel'];
$identificacion= $_POST['identificacion'];
$tarjeta= $_POST['tarjeta'];
$pass= sha1($_POST['pass']);
$repass=sha1($_POST['repass']);

if(isset($nombre) && !empty($nombre)):
if(isset($pass) && isset($repass) && $pass==$repass):
$wsdl ='http://www.webservicex.net/country.asmx?WSDL';
$params=array(
  'CountryName'=>$var_pais
);

$soap = new SoapClient($wsdl);
$call = new SoapClient($wsdl);

$data =$soap->GetCurrencyByCountry($params);
$data_call =$call->GetISD($params);


$DOM_country= new DOMDocument();
$DOM_call= new DOMDocument();

@$DOM_call->loadHTML("$data_call->GetISDResult"); 

@$DOM_country->loadHTML("$data->GetCurrencyByCountryResult"); 

$data_code_name = $DOM_call->getElementsByTagName('code'); 

$data_country_name = $DOM_country->getElementsByTagName('countrycode');
$data_name_name = $DOM_country->getElementsByTagName('name');
$data_currency_name = $DOM_country->getElementsByTagName('currency');
$data_currencycode_name = $DOM_country->getElementsByTagName('currencycode');




foreach($data_country_name as $Nodedata_country) 
{

        $data_country_name_html[] = $Nodedata_country->textContent;
}

foreach($data_name_name as $Nodedata_name) 
{

        $data_name_name_html[] = $Nodedata_name->textContent;
}

foreach($data_currency_name as $Nodedata_currency) 
{

        $data_currency_name_html[] = $Nodedata_currency->textContent;
}

foreach($data_currencycode_name as $Nodedata_currencycode) 
{

        $data_currencycode_name_html[] = $Nodedata_currencycode->textContent;
}




foreach($data_code_name as $Nodedata_code) 
{

        $data_code_name_html[] = $Nodedata_code->textContent;
}


$datos_regis=array(
	'nombre'=>$nombre,
	'apellido'=>$apellido,
	'correo'=>$correo,
	'telefono'=>$tel,
	'identificacion'=>$identificacion,
	'tarjeta'=>$tarjeta,
	'password'=>$pass,
	'Pais'=>$data_country_name_html[0],
	'nombre_Pais'=>$data_name_name_html[0],
	'nombre_moneda'=>$data_currency_name_html[0],
	'codigo_moneda'=>$data_currencycode_name_html[0],
	'code_tel'=>$data_code_name_html[0]

);

$datas_seri=serialize($datos_regis);


	header("location:http://".$_SERVER['SERVER_NAME']."/web/c_conexion/registro.php?dato=".$datas_seri);

else:
	echo "contrase;a no conside";
endif;

else:
	echo "Nombre es obligatorio";
endif;

?>
