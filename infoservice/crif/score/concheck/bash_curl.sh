#!/bin/bash

# Beispiel Curl Command - Crif Bonitätsauskunkt (Produkt ConCheck)
# Anfrage an die mediaFinanz REST API v2.1
# @see https://api.mediafinanz.de/docs/v2.1/openapi/gui/

#-----------------------------------------------------------------------------------------------------------------------

#
# Zugangsdaten erhalten Sie bei mediaFinanz GmbH
# @see https://api.mediafinanz.de/docs/v2.1/account/
#
sUuid='12345678-1234-1234-1234-123456789012';
sUser='';
sPassword='';

#-----------------------------------------------------------------------------------------------------------------------

#
# Curl Command
# Crif Bonitätsanfrage an die mediaFinanz REST API v2.1
# @see https://api.mediafinanz.de/docs/v2.1/crif_request_score_concheck/
# @see https://api.mediafinanz.de/docs/v2.1/openapi/#validate-option
#
curl -X 'POST' \
  'https://test.api.mediafinanz.de/v2.1/infoservice/crif/score/concheck/' \
  -H "uuid: $sUuid" \
  -H "user: $sUser" \
  -H "password: $sPassword" \
  -H 'validate: 1' \
  -H 'accept: application/json' \
  -H 'Content-Type: application/json' \
  -d '{
    "Order": {
      "CustomerReference": "6910-21",
      "ProofOfInterest": 3,
      "ReportFormat": "NONE"
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