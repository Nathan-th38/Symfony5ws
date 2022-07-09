<?php
function displayRequestResponse(SoapClient $soapClient) : void {
	echo 'Request : <br/><xmp>',
    $soapClient->__getLastRequestHeaders(),$soapClient->__getLastRequest(),
    '</xmp>';
	echo 'Response : <br/><xmp>',
    $soapClient->__getLastResponseHeaders(),$soapClient->__getLastResponse(),
    '</xmp>';
}

require('SecteurSoap.php');
use \App\Soap\SecteurSoap;

require('StructureSoap.php');
use \App\Soap\StructureSoap;

$soapClient = null;
try {

    ini_set("soap.wsdl_cache_enabled", "0");

    /*$opts = array(
        'http' => array(
            'user_agent' => 'PHPSoapClient',
			//'header' => 'Content-Type: text/xml'
        )
    );
    $context = stream_context_create($opts);*/

    $options=array(
		'trace'=>1,
		'exceptions' => 1,
		'connection_timeout' => 180, 
		'encoding'=>'UTF-8', 
		'soap_version'=>SOAP_1_1,
        //'stream_context' => $context,
        'cache_wsdl' => WSDL_CACHE_NONE/*,
		'use' => SOAP_LITERAL,
		'style' => SOAP_DOCUMENT*/);

    $soapClient =  new \SoapClient('http://localhost:8000/soap?wsdl', $options);
	//header('Content-Type: text/xml');
	//$soapClient->__setSoapHeaders(new SoapHeader('Content-Type','text/xml'));
	
    $functions = $soapClient->__getFunctions();
    echo '<p>'.var_dump ($functions).'</p>';
    
	//displayRequestResponse($soapClient);
	
	//header('Content-Type: text/xml');
	//$soapClient->__setSoapHeaders(new SoapHeader('Content-Type','text/xml'));
	
	$result = $soapClient->__soapcall('sayHello', array('name' => 'Jean'));
	echo '<p>'.$result.'</p>';
	displayRequestResponse($soapClient);
	
    $result = $soapClient->sumHello(2,5);
    echo '<p>'.$result.'</p>';
	displayRequestResponse($soapClient);
	
    $result = $soapClient->sumFloats(2.2,5.3,3.7);
    echo '<p>'.$result.'</p>';
	displayRequestResponse($soapClient);

    $sector = new SecteurSoap(3,'');
    echo '<p>'.var_dump($sector).'</p>';
    $result = $soapClient->getSecteurLibelle($sector);
	echo '<p>'.var_dump($result).'</p>';
    if ($result != null) {
        echo '<p>'.$result->id.' : '.$result->libelle.'</p>';
    }
	displayRequestResponse($soapClient);

    $structure = new StructureSoap(2,'');
    echo '<p>'.var_dump($structure).'</p>';
    $result = $soapClient->getStructureNom($structure);
    echo '<p>'.var_dump($result).'</p>';
    if ($result != null) {
        echo '<p>'.$result->id.' : '.$result->nom.'</p>';
    }
    displayRequestResponse($soapClient);

} catch(SoapFault $fault){
	// <xmp> tag displays xml output in html
    if ($soapClient != null) {
        displayRequestResponse($soapClient);
    }
    echo '<p><br/> Error Message : <p/>';
    echo '<p>'.$fault->getMessage().'</p>';
    echo '<p>'.$fault->getTraceAsString().'</p>';
	echo '<p>'.var_dump($fault).'</p>';
}
?>
