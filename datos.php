
   <?php 

   $wsdl ='http://www.webservicex.net/country.asmx?WSDL';
 
      $soap = new SoapClient($wsdl);
      $data =$soap->GetCountries();





$DOM = new DOMDocument();
$DOM->loadHTML("$data->GetCountriesResult");
  
     
$Header = $DOM->getElementsByTagName('name');



//#Get header name of the table
foreach($Header as $NodeHeader) 
{

        $aDataTableHeaderHTML[] = $NodeHeader->textContent;
}
print_r($aDataTableHeaderHTML);

?>
