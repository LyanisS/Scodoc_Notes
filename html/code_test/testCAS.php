Authentification en cours ...
<style>
	body{
		background: #f0f0f0;
		font-family: arial;
	}
</style>

<?php
	/* Debug */
	error_reporting(E_ALL);
	ini_set('display_errors', '1');

	$path = realpath(dirname(__FILE__) . '/../..');
	include_once "$path/includes/base_path.php";
	base_path("code_test/testCAS.php");
	require_once $path.'/includes/default_config.php';
	
	/* CAS config */
	require_once $path . '/lib/CAS/CAS.php';
	require_once $path . '/config/cas_config.php';

	phpCAS::setLogger();
	phpCAS::setVerbose(true);
	
	$client_service_name = "https://$_SERVER[HTTP_HOST]$base_path";
	phpCAS::client(CAS_VERSION_2_0, $cas_host, $cas_port, $cas_context, $client_service_name);
	phpCAS::setNoCasServerValidation();

	/* Authentification */
	phpCAS::forceAuthentication();
	
	$attribs= phpCAS::getAttributes();

	echo "<h3>C'est bien authentifié, votre identifiant est :</h3><b>";
	echo phpCAS::getUser();
	
	echo '<br><br><hr><br>Informations sur le CAS : </b><pre>';
	var_dump($attribs);
?>