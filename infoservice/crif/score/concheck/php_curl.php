<?php
/**
 * PHP Beispiel - Crif Bonitätsauskunkt (Produkt ConCheck)
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

// Standard Report ohne PDF
$sReportFormat = 'NONE';

// Standard Report mit PDF
//$sReportFormat = 'PDF';

#-----------------------------------------------------------------------------------------------------------------------

/**
 * Beispiel-JSON-Datensatz
 * Crif Bonitätsanfrage an die mediaFinanz REST API v2.1
 * @see https://api.mediafinanz.de/docs/v2.1/crif_request_score_concheck/
 */
$sJsonBody = '{
    "Order": {
      "CustomerReference": "6910-2",
      "ProofOfInterest": 3,
      "ReportFormat": "'.$sReportFormat.'"
    },
    "Person": {
      "Title": "Prof. Dr.",
      "FirstName": "Max",
      "LastName": "Mustermann",
      "Gender": "m",
      "BirthDate": "2001-05-08"
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
curl_setopt($rCurl, CURLOPT_URL, 'https://test.api.mediafinanz.de/v2.1/infoservice/crif/score/concheck/');
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

$aResponse = json_decode($sResponse, true);

if($sReportFormat == 'PDF'
    && isset($aResponse['DataBase64Encoded'])
    && !empty($aResponse['DataBase64Encoded'])) {
    $sPdf = $aResponse['DataBase64Encoded'];

    $sTestPdf = base64_decode($sPdf);
    $sFileName = date('Y-m-d_H:i:s') . '_ConCheck.pdf';
    file_put_contents($sFileName, $sTestPdf);
}
else
{
    echo var_export($aResponse, true);
}

// potential Errors
$sError = curl_error($rCurl);

if(!empty($sError)) {
    var_dump($sError);
}