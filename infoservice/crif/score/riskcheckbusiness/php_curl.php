<?php
/**
 * PHP Beispiel - Crif Bonitätsauskunkt (Produkt RiskCheckBusiness)
 * Anfrage an die mediaFinanz REST API v2.1
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
$bValidate = true;

#-----------------------------------------------------------------------------------------------------------------------

/**
 * Beispiel-JSON-Datensatz
 * Crif Bonitätsanfrage an die mediaFinanz REST API v2.1
 * @see https://api.mediafinanz.de/docs/v2.1/crif_request_score_riskcheckbusiness/
 */
$sJsonBody = '{
    "Order": {
      "CustomerReference": "7910-3",
      "ProofOfInterest": 3,
      "ReportFormat": "NONE"
    },
    "Company": {
      "CompanyName": "Mustermann GmbH",
      "CommercialRegisterNumber": "HRB 230807",
      "VAT_ID": "DE123456789"
    },
    "Address": {
      "Street": "Weiße Breite",
      "HouseNumber": "5-7",
      "PostalCode": "49084",
      "City": "Osnabrück",
      "CountryCode": "DE"
    }
}';

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
$aHeader[] = 'Content-Type: application/json';

$rCurl = curl_init();
curl_setopt($rCurl, CURLOPT_URL, 'https://test.api.mediafinanz.de/v2.1/infoservice/crif/score/riskcheckbusiness/');
curl_setopt($rCurl, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($rCurl, CURLOPT_HTTPHEADER, $aHeader);
curl_setopt($rCurl, CURLOPT_POSTFIELDS, $sJsonBody);
curl_setopt($rCurl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($rCurl, CURLOPT_CONNECTTIMEOUT, 30);
curl_setopt($rCurl, CURLOPT_TIMEOUT, 30);

#-----------------------------------------------------------------------------------------------------------------------

// Response
$sResponse = curl_exec($rCurl);
echo $sResponse  . PHP_EOL;

// potential Errors
$sError = curl_error($rCurl);
var_dump($sError);
