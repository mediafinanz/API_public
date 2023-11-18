<?php
/**
 * PHP Beispiel
 * Statusabfrage einer Forderung an die mediaFinanz REST API v2.1
 * @see https://api.mediafinanz.de/docs/v2.1/openapi/gui/
 */

#-----------------------------------------------------------------------------------------------------------------------

/**
 * Zugangsdaten erhalten Sie bei mediaFinanz GmbH
 * @see https://api.mediafinanz.de/docs/v2.1/account/
 */
$sUuid = '12345678-1234-1234-1234-123456789012';
$sUser = '';
$sPassword = '';

// validate gegen OpenApi true|false
// @see https://api.mediafinanz.de/docs/v2.1/openapi/#validate-option
$bValidate = false;

#-----------------------------------------------------------------------------------------------------------------------

/*
 * Aktenzeichen, mit der die Anfrage erfolgen soll
 * @see https://api.mediafinanz.de/docs/v2.1/inkasso_request_collect_claim_status/
 */
//$az = '12345678910';
$az = '69694201028';


#-----------------------------------------------------------------------------------------------------------------------

/*
 * Curl Request in PHP absetzen
 */

$aHeader = array();

// Zugangsdaten
$aHeader[] = 'uuid: ' . $sUuid; # UUID client
$aHeader[] = 'user: ' . $sUser; # user
$aHeader[] = 'password: ' . $sPassword; # password

// validate gegen OpenApi true|false
// @see https://api.mediafinanz.de/docs/v2.1/faq/#anfrage-ueberpruefen
(true === $bValidate) ? $aHeader[] = 'validate: 1' : false;

$aHeader[] = 'Accept: application/json';

$rCurl = curl_init();
// Aktenzeichen im Path übergeben
curl_setopt($rCurl, CURLOPT_URL, 'https://test.api.mediafinanz.de/v2.1/collect/claim/' . $az . '/status/');
curl_setopt($rCurl, CURLOPT_CUSTOMREQUEST, 'GET');
curl_setopt($rCurl, CURLOPT_HTTPHEADER, $aHeader);
curl_setopt($rCurl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($rCurl, CURLOPT_CONNECTTIMEOUT, 30);
curl_setopt($rCurl, CURLOPT_TIMEOUT, 30);

#-----------------------------------------------------------------------------------------------------------------------

// Response
$sResponse = curl_exec($rCurl);
echo $sResponse . PHP_EOL;

// potential Errors
$sError = curl_error($rCurl);
var_dump($sError);
